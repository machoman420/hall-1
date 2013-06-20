<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('loggedin'))redirect('login','refresh');
		$this->load->model('user_model');
	}
	
	function index(){
		$data['alevel']=$this->get_level();
		$this->load->model('student_model');
		$this->load->model('room_model');
		$data['totstudent']=$this->student_model->get_all_count();
		$data['attached']=$this->student_model->get_attached_count();
		$data['resident']=$this->student_model->get_resident_count();
		$data['alumni']=$this->student_model->get_alumni_count();
		$data['tot']=$this->room_model->get_all_room_count();
		$data['totseat']=$this->room_model->get_tot_seat();
		$data['totavailable']=$this->room_model->get_tot_available();
		$this->load->view('home_view',$data);
	}
	
	function logout(){
		if($this->session->userdata('loggedin'))$this->session->unset_userdata('loggedin');
		redirect('login','refresh');
	}
	
	function change_password(){
		$data= array();
		$data['alevel']=$this->get_level();
		$this->load->view('change_password_view',$data);
	}
	
	
	function check_password(){
		$ary = $this->session->userdata('loggedin');
		$id = $ary['id'];
		$this->load->library('form_validation');
		$data['passold'] = $this->input->post('old');
		$data['passnew'] = $this->input->post('new1');
		$data['passnew1'] = $this->input->post('new2');
		$this->form_validation->set_rules('old','Old Password','trim|xss_clean|required');
		$this->form_validation->set_rules('new1','New Password','trim|xss_clean|required');
		$this->form_validation->set_rules('new2','Repeat Password','trim|xss_clean|required');
		if(!$this->form_validation->run()){
			$data['error']=validation_errors('<p class="text-error">','</p>');
			$this->load->view('change_password_view',$data);
			$data['alevel']=$this->get_level();
			return ;
		}
		if($data['passnew']!=$data['passnew1']){
			$data['error']='<p class="text-error">Passwords do not match</p>';
			$data['alevel']=$this->get_level();
			$this->load->view('change_password_view',$data);
			return ;
		}
		
		$db = array();
		$db['PASSWORD']=md5($data['passnew']);
		$this->user_model->update($id,$db);
		$data =array();
		$data['success']='Password was changed successfully';
		$data['alevel']=$this->get_level();
		$this->load->view('change_password_view',$data);
	}
	
	
	function view(){
		$ary = $this->session->userdata('loggedin');
		$id = $ary['id'];
		$data = array();
		$this->load->model('admin_model');
		$data['info'] = $this->admin_model->get($id);
		$data['alevel']=$this->get_level();
		$this->load->view('admin_profile_view',$data);
	}
	
	
	function update(){
		$ary = $this->session->userdata('loggedin');
		$id = $ary['id'];
		$data = array();
		$this->load->model('admin_model');
		$info = $this->admin_model->get($id);
		foreach($info as $i){
			$data['name']=$i->NAME;
			$data['contact']=$i->CONTACT_NO;
			$data['address']=$i->ADDRESS;
			$data['email']=$i->EMAIL;
			$data['desig']=$i->DESIGNATION;
		}
		$data['alevel']=$this->get_level();
		$this->load->view('update_admin_view',$data);
	}
	
	function check_update(){
		$ary = $this->session->userdata('loggedin');
		$id = $ary['id'];
		$data = array();
		$this->load->library('form_validation');
		
		$data['name']=$this->input->post('name');
		$data['desig']=$this->input->post('desig');
		$data['contact']=$this->input->post('contact');
		$data['address']=$this->input->post('address');
		$data['email']=$this->input->post('email');
		
		$this->form_validation->set_rules('name','Name','trim|xss_clean|required');
		$this->form_validation->set_rules('desig','Designation','trim|xss_clean|required');
		$this->form_validation->set_rules('contact','Contact no','trim|xss_clean|required|integer');
		$this->form_validation->set_rules('address','Address','trim|xss_clean|required');
		$this->form_validation->set_rules('email','Email','trim|xss_clean|required|valid_email');
		if(!$this->form_validation->run()){
			$data['error']=validation_errors('<p class="text-error">','</p>');
			$data['alevel']=$this->get_level();
			$this->load->view('update_admin_view',$data);
			return;
		}
			$config['upload_path'] = './images/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '0';
			$config['max_height'] = '0';
			$config['max_width'] = '0';


			$this->load->library('upload');
			$this->upload->initialize($config);
			$prev='';
			if ($this->upload->do_upload('userfile')) {
				$tmp = $this->upload->data();
				$data['image_path']='/images/'.$tmp['file_name'];
			}
		
		$dbval = array();
		$dbval['NAME']=$data['name'];
		$dbval['ADDRESS']=$data['address'];
		$dbval['EMAIL']=$data['email'];
		$dbval['DESIGNATION']=$data['desig'];
		$dbval['CONTACT_NO']=$data['contact'];
		if(isset($data['image_path']))
			$dbval['IMAGE']=$data['image_path'];
		
		$this->load->model('admin_model');
		if($this->admin_model->update($id,$dbval))
		$data['success']= 'Data has been successfully updated';
		else $data['error']='<p class="text-error">Data couldn\'t updated. Try again... </p>';
		$data['alevel']=$this->get_level();
		$this->load->view('update_admin_view',$data);
	}
	
	
	function create(){
		$data['alevel']=$this->get_level();
		$this->load->view('create_admin_view',$data);
	}
	
	function check_create(){
		$ary = $this->session->userdata('loggedin');
		$id = $ary['id'];
		$data = array();
		$this->load->library('form_validation');
		
		$data['id']=$this->input->post('id');
		$data['name']=$this->input->post('name');
		$data['desig']=$this->input->post('desig');
		$data['contact']=$this->input->post('contact');
		$data['address']=$this->input->post('address');
		$data['email']=$this->input->post('email');
		$data['auth']=$this->input->post('auth');
		
		$this->form_validation->set_rules('id','ID','trim|xss_clean|required');
		$this->form_validation->set_rules('name','Name','trim|xss_clean|required');
		$this->form_validation->set_rules('desig','Designation','trim|xss_clean|required');
		$this->form_validation->set_rules('contact','Contact no','trim|xss_clean|required|integer');
		$this->form_validation->set_rules('address','Address','trim|xss_clean|required');
		$this->form_validation->set_rules('email','Email','trim|xss_clean|required|valid_email');
		if(!$this->form_validation->run()){
			$data['error']=validation_errors('<p class="text-error">','</p>');
			$data['alevel']=$this->get_level();
			$this->load->view('create_admin_view',$data);
			return;
		}
			$config['upload_path'] = './images/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '0';
			$config['max_height'] = '0';
			$config['max_width'] = '0';


			$this->load->library('upload');
			$this->upload->initialize($config);
			$prev='';
			if ($this->upload->do_upload('userfile')) {
				$tmp = $this->upload->data();
				$data['image_path']='/images/'.$tmp['file_name'];
			}
		
		$dbval = array();
		$dbval['ID']=$data['id'];
		$dbval['NAME']=$data['name'];
		$dbval['ADDRESS']=$data['address'];
		$dbval['EMAIL']=$data['email'];
		$dbval['DESIGNATION']=$data['desig'];
		$dbval['CONTACT_NO']=$data['contact'];
		$dbval['AUTH_LEVEL']=$data['auth'];
		if(isset($data['image_path']))
			$dbval['IMAGE']=$data['image_path'];
		
		$this->load->model('admin_model');
		if($this->admin_model->insert($dbval)){
			$data=array();
			$data['success']= 'Account has been successfully created';
		}else $data['error']='<p class="text-error">Account couldn\'t be created. Try again... </p>';
		$data['alevel']=$this->get_level();
		$this->load->view('create_admin_view',$data);
		
	}
	
	
	function change_auth(){
		if($this->get_level()<3)redirect('home');
		$id = $this->input->get('id');
		$data['AUTH_LEVEL'] = $this->input->get('auth');
		$this->load->model('admin_model');
		$this->admin_model->update($id,$data);
		$this->load->view('success_view',array('success'=>"The Authication level change was successful",'alevel'=>$this->get_level()));
	}
	
	
	function  get_level(){
		$ary = $this->session->userdata('loggedin');
		return $ary['auth'];
	}
	
	function show_list(){
		$data = array();
		$data['alevel']=$this->get_level();
		$this->load->model('admin_model');
		$data['list'] = $this->admin_model->get_list();
		$this->load->view('admin_list_view',$data);
	}
}


?>
