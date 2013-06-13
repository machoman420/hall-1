<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Student extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('loggedin'))redirect('login','refresh');
		$this->load->model('student_model');
		$this->load->model('room_model');
	}
	
	function index(){
		echo 'You\'re not supposed to be here.';
	}
	
	
	function show(){
		$data=array();
		$data['title']='student_list';
		$order = $this->input->get('order');
		$by = $this->input->get('q');
		$id = $this->input->get('id');
		if($id){
			$data['students']=$this->student_model->get_student($id);
			if(!$data['students']){
				echo 'No students found with the provided id';
			}else 
				$this->load->view('show_student_view',$data);
			return;
		}else if($order && $by){
			$data['students']=$this->student_model->get_all_ordered($order,$by);
		}else $data['students']=$this->student_model->get_all();
		
		
		$this->load->view('list_student_view',$data);
	}
	
	function update($id=-1){
		if($id==-1){
			$this->show();
			return;
		}
		$data=array();
		$data['title']='update_student';
		$data['rooms']=$this->room_model->get_available_room_list();
		$student = $this->student_model->get_student($id);
		if(!$student){
			echo '<h4 class="text-error">No student found with id '.$id.'. Please correct and try again.</h4>';
			return;
		}
		foreach($student as $std){
			$data['room']=$std->room;
			$data['name']=$std->name;
			$data['id']=$id;
			$data['dept']=$std->dept;
			$data['level']=$std->level;
			$data['term']=$std->term;
			$data['contact']=$std->contact;
			$data['address']=$std->address;
		}
		$this->load->view('update_student_view',$data);
	}
	
	function check_update(){
		$data=array();
		$data['title']='update_student';
		$data['rooms']=$this->room_model->get_all();
		
		$data['room']=$this->input->post('room');
		$data['name']=$this->input->post('name');
		$data['id']=$this->input->post('id');
		$data['dept']=$this->input->post('dept');
		$data['level']=$this->input->post('level');
		$data['term']=$this->input->post('term');
		$data['contact']=$this->input->post('contact');
		$data['address']=$this->input->post('address');
		$pre_room=$this->student_model->get_room($data['id']);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Name','trim|xss_clean|required');
		$this->form_validation->set_rules('id','Student ID','trim|xss_clean|required');
		$this->form_validation->set_rules('contact','Contact no','trim|xss_clean');
		$this->form_validation->set_rules('address','Address','trim|xss_clean');
		
	
		
		if(!$this->form_validation->run() || (!$this->room_model->available($data['room']) && $data['room']!=$pre_room)){
			$data['message']=validation_errors();
			$this->load->view('update_student_view',$data);
			return;
		}
		
		$dbval = array();
		$dbval['name']=$data['name'];
		$dbval['level']=$data['level'];
		$dbval['term']=$data['term'];
		$dbval['dept']=$data['dept'];
		$dbval['room']=$data['room'];
		$dbval['contact']=$data['contact'];
		$dbval['address']=$data['address'];
		$this->change_room($pre_room,$data['room']);
		$this->student_model->update($data['id'],$dbval);
		
		$data['room']='';
		$data['name']='';
		$data['id']='';
		$data['dept']='';
		$data['level']='';
		$data['term']='';
		$data['contact']='';
		$data['address']='';
		$data['message']="The student's data was successfully added";
		$this->load->view('update_student_view',$data);
	}
	
	private function change_room($from,$to){
		$this->room_model->remove_student($from);
		$this->room_model->add_student($to);
	}
	
	
	
	function create(){
		$data=array();
		$data['title']='create_student';
		$data['rooms']=$this->room_model->get_available_room_list();
		$data['room']='';
		$data['name']='';
		$data['id']='';
		$data['dept']='';
		$data['level']='';
		$data['term']='';
		$data['contact']='';
		$data['address']='';
		$this->load->view('create_student_view',$data);
	}
	
	function check_create(){
		$data=array();
		$data['title']='create_student';
		$data['rooms']=$this->room_model->get_available_room_list();
		$data['room']=$this->input->post('room');
		$data['name']=$this->input->post('name');
		$data['id']=$this->input->post('id');
		$data['dept']=$this->input->post('dept');
		$data['level']=$this->input->post('level');
		$data['term']=$this->input->post('term');
		$data['contact']=$this->input->post('contact');
		$data['address']=$this->input->post('address');
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Name','trim|xss_clean|required');
		$this->form_validation->set_rules('id','Student ID','trim|xss_clean|required');
		$this->form_validation->set_rules('contact','Contact no','trim|xss_clean');
		$this->form_validation->set_rules('address','Address','trim|xss_clean');
		
		if(!$this->form_validation->run()){
			$data['message']=validation_errors();
			$this->load->view('create_student_view',$data);
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
				$data['image_path']='/images/'.$tmp['file_name'];
			} else {
				$data['image_path']='/images/notFound.png';
				//~ $data['message']=$this->upload->display_errors();
				//~ $this->load->view('create_student_view',$data);
				//~ return;
			}
		
		$dbval = array();
		$dbval['name']=$data['name'];
		$dbval['id']=$data['id'];
		$dbval['level']=$data['level'];
		$dbval['term']=$data['term'];
		$dbval['dept']=$data['dept'];
		$dbval['room']=$data['room'];
		$dbval['contact']=$data['contact'];
		$dbval['address']=$data['address'];
		$dbval['image_path']=$data['image_path'];
		$this->student_model->insert($dbval);
		$this->room_model->add_student($dbval['room']);
		
		$data['message']="The student's data was successfully added";
		$this->load->view('create_student_view',$data);
	}
	
	function swap(){
		$data=array();
		$data['title']='swap_student';
		$data['id1']='';
		$data['id2']='';
		$this->load->view('swap_student_view',$data);
	}
	
	
	function show_swap(){
		$s1  = $this->input->get('s1');
		$s2  = $this->input->get('s2');
		$data = array();
		$data['title']='swap_student';
		
		
		$data['s1']=$this->student_model->get_student($s1);
		$data['s2']=$this->student_model->get_student($s2);
		
		if(!$data['s1'] || !$data['s2']){
			echo '<p class="text-error">The student id was invalid or doesn\'t exist</p>';
			return ;
		}
		
		$this->load->view('show_swap',$data);
	}
	
	function check_swap(){
		$s1 = $this->input->post('s1');
		$s2 = $this->input->post('s2');
		
		
		$r1 = $this->student_model->get_room($s1);
		$r2 = $this->student_model->get_room($s2);
		$data = array();
		$data['room']=$r2;
		$this->student_model->update($s1,$data);
		$data = array();
		$data['room']=$r1;
		$this->student_model->update($s2,$data);
		
		echo '<p class="text-success">The room change was successfull</p>';
		$data = array();
		$data['title']='swap_student';
		
		
		$data['s1']=$this->student_model->get_student($s1);
		$data['s2']=$this->student_model->get_student($s2);
		
		if(!$data['s1'] || !$data['s2']){
			echo '<p class="text-error">The student id was invalid or doesn\'t exist</p>';
			return ;
		}
		
		$this->load->view('show_swap',$data);
	}
	
	
	
	function delete(){
		$id=$this->input->get('id');
		if(!$id || !$this->student_model->get_student($id)){
			echo 'No students found with the provided id';
			return;
		}
		$rm = $this->student_model->get_room($id);
		$img = $this->student_model->get_image($id);
		unlink('.'.$img);
		$this->student_model->delete($id);
		$this->room_model->remove_student($rm);
		
		echo '<p class="text-success">Data successfully deleted</p>';
	}

	function show_delete(){
		$data=array();
		$id = $this->input->get('id');
		$data['students']=$this->student_model->get_student($id);
		if(!$data['students']){
			echo 'No students found with the provided id';
		}else 
			$this->load->view('delete_student_view',$data);

	}
	
	
	function export(){
		$file = 'student-list.xls';    
		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=$file");
		$data = $this->student_model->get_all();
		echo '<table><tbody>';
		$test = '<tr><td>Student Id</td><td>Name</td><td>Department</td><td>Level</td><td>Term</td><td>Contact No.</td><td>Room No.</td><td>Address</td></tr>';
		echo $test;
		foreach($data as $row){
			echo '<tr>';
			echo '<td>'.$row->id.'</td>';
			echo '<td>'.$row->name.'</td>';
			echo '<td>'.$row->dept.'</td>';
			echo '<td>'.$row->level.'</td>';
			echo '<td>'.$row->term.'</td>';
			echo '<td>'.$row->contact.'</td>';
			echo '<td>'.$row->room.'</td>';
			echo '<td>'.$row->address.'</td>';
			echo '</tr>';
		}
		echo '</tbody></table>';
	}
	
}

?>
