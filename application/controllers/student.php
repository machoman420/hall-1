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
	
	function  get_level(){
		$ary = $this->session->userdata('loggedin');
		if(isset($ary['auth']))
		return $ary['auth'];
		return 2;
	}
	
	
	function show($val=-1){
		$id =$this->input->get('id');
		if($id){
			$data['students']=$this->student_model->get_student($id);
			if(!$data['students']){
				$data['alevel']=$this->get_level();
				$this->load->view( 'fail_view',array('error'=>'No students found with the provided id'));
			}else {
				$data['alevel']=$this->get_level();
				$this->load->view('show_student_view',$data);
			}
			return;
		}
		if($val==-1) $val='all';
		if($val!=-1){
			 $this->filter($val);
			 return;
		 }
		 
		
	}
	
	
	function filter($val){
		if($val!='all' && $val!='resident'&& $val!='attached'&& $val!='alumni'&& $val!='unassigned') $val='all';
		$data = array();
		$data['sort']=$val;
		$order = $this->input->get('order');
		if(!$order)$order='name';
		switch($val){
			case 'all' : $data['students'] = $this->student_model->get_query('select * from student order by '.$order);
				break;
			case 'resident':  $data['students']=$this->student_model->get_query('select * from student where stype=\'resident\' order by '.$order);
				break;
			case 'attached': $data['students']=$this->student_model->get_query('select * from student where stype=\'attached\' order by '.$order);
				break;
			case 'unassigned': $data['students']=$this->student_model->get_query('select * from student where room=1 order by '.$order);
				break;
			case 'alumni': $data['students']=$this->student_model->get_query('select * from student where stype=\'alumni\' order by '.$order);
				break;
		}
		$data['order']=$order;
		$data['alevel']=$this->get_level();
		$this->load->view('list_student_view',$data);
	}
	
	
	
	function update($id=-1){
		if($this->input->get('id'))$id=$this->input->get('id');
		if($id==-1){
			$this->show();
			return;
		}
		$data=array();
		$data['title']='update_student';
		$data['rooms']=$this->room_model->get_available_room_list();
		$student = $this->student_model->get_student($id);
		if(!$student){
			$data = array('error'=> 'No student found with id '.$id.'. Please correct and try again.');
			$data['alevel']=$this->get_level();
			$this->load->view('fail_view',$data);
			return;
		}
		foreach($student as $std){
			$data['stype']=$std->STYPE;
			$data['room']=$std->ROOM;
			$data['name']=$std->NAME;
			$data['sid']=$std->ID;
			$data['dept']=$std->DEPT;
			$data['level']=$std->SLEVEL;
			$data['term']=$std->TERM;
			$data['contact']=$std->CONTACT;
			$data['gcontact']=$std->GURDIAN_CONTACT;
			$data['paddress']=$std->PERMANENT_ADDRESS;
			$data['caddress']=$std->CURRENT_ADDRESS;
			$data['gdate']=$std->GRAD_DATE;
			$data['cgpa'] =$std->CGPA;
			if($data['cgpa']<=0)$data['cgpa']=0;
			if($data['contact']<=0)$data['contact']=0;
			if($data['gcontact']<=0)$data['gcontact']=0;
			
			if($std->EMAIL=='none')$data['email']='';
			else $data['email']=$std->EMAIL;
			break;
		}
		$data['alevel']=$this->get_level();
		$this->load->view('update_student_view',$data);
	}
	
	function format_date($s){
		return date('d M y',strtotime($s));
	}
	
	
	function check_update(){
		$data=array();
		$data['title']='create_student';
		$data['rooms']=$this->room_model->get_available_room_list();
		$data['stype']=$this->input->post('stype');
		$data['room']=$this->input->post('room');
		$data['name']=$this->input->post('name');
		$data['sid']=$this->input->post('student-no');
		$data['dept']=$this->input->post('dept');
		$data['level']=$this->input->post('level');
		$data['term']=$this->input->post('term');
		$data['contact']=$this->input->post('contact');
		$data['gcontact']=$this->input->post('gcontact');
		$data['caddress']=$this->input->post('caddress');
		$data['paddress']=$this->input->post('paddress');
		$data['cgpa']=$this->input->post('cgpa');
		$data['gdate']=$this->input->post('gdate');
		$data['email']=$this->input->post('email');
		echo $data['gdate'];
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Name','trim|xss_clean|required');
		$this->form_validation->set_rules('student-no','Student ID','trim|xss_clean|required');
		$this->form_validation->set_rules('contact','Contact no','trim|xss_clean');
		$this->form_validation->set_rules('paddress','Permanent Address','trim|xss_clean');
		$this->form_validation->set_rules('gcontact','Gurdian Contact no','trim|xss_clean');
		$this->form_validation->set_rules('caddress','Currnet Address','trim|xss_clean');
		$this->form_validation->set_rules('cgpa','CGPA','trim|xss_clean');
		$this->form_validation->set_rules('gdate','Graduation Date','trim|xss_clean');
		$this->form_validation->set_rules('email','Email','trim|xss_clean|valid_email');
		
		if(!$this->form_validation->run()){
			$data['message']=validation_errors('<p class="text-error">','</p>');
			$data['alevel']=$this->get_level();
			$this->load->view('update_student_view',$data);
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
		$dbval['ID']=$data['sid'];
		$dbval['STYPE']=$data['stype'];
		if($dbval['STYPE']=='alumni'){
			$dbval['SLEVEL']=-1;
			$dbval['TERM']=-1;
		}else{
			$dbval['SLEVEL']=$data['level'];
			$dbval['TERM']=$data['term'];
		}
		$dbval['DEPT']=$data['dept'];
		$dbval['ROOM']=$data['room'];
		if($dbval['STYPE']=='resident' && $dbval['ROOM']==0) $dbval['ROOM']=1;
		$dbval['CONTACT']=$data['contact'];
		$dbval['PERMANENT_ADDRESS']=$data['paddress'];
		$dbval['CURRENT_ADDRESS']=$data['caddress'];
		if(isset($data['image_path']))
		$dbval['IMAGE']=$data['image_path'];
		$dbval['GURDIAN_CONTACT']=$data['gcontact'];
		$dbval['EMAIL']=$data['email'];
		$dbval['CGPA']=$data['cgpa'];
		
		if($data['gdate'])
		$dbval['GRAD_DATE']=$this->format_date($data['gdate']);
		else $dbval['GRAD_DATE']='01 JAN 1970';
		$this->student_model->update($data['sid'],$dbval);
		$data=array();
		$data['title']='create_student';
		$data['stype']='none';
		$data['rooms']=$this->room_model->get_available_room_list();
		$data['room']='';
		$data['name']='';
		$data['sid']='';
		$data['dept']='';
		$data['level']='';
		$data['term']='';
		$data['cgpa']='';
		$data['gdate']='';
		$data['contact']='';
		$data['email']='';
		$data['gcontact']='';
		$data['paddress']='';
		$data['caddress']='';
		$data['message']="<p class='text-success'>The student's data was successfully added</p>";
		$data['alevel']=$this->get_level();
		$this->load->view('update_student_view',$data);
	}
	
	private function change_room($from,$to){
		$this->room_model->remove_student($from);
		$this->room_model->add_student($to);
	}
	
	
	
	function create(){
		$data=array();
		$data['title']='create_student';
		$data['stype']='none';
		$data['rooms']=$this->room_model->get_available_room_list();
		$data['room']='';
		$data['name']='';
		$data['id']='';
		$data['dept']='';
		$data['level']='';
		$data['term']='';
		$data['cgpa']='';
		$data['gdate']='';
		$data['contact']='';
		$data['email']='';
		$data['gcontact']='';
		$data['paddress']='';
		$data['caddress']='';
		$data['alevel']=$this->get_level();
		$this->load->view('create_student_view',$data);
	}
	
	function check_create(){
		$data=array();
		$data['title']='create_student';
		$data['rooms']=$this->room_model->get_available_room_list();
		$data['stype']=$this->input->post('stype');
		$data['room']=$this->input->post('room');
		$data['name']=$this->input->post('name');
		$data['id']=$this->input->post('student-no');
		$data['dept']=$this->input->post('dept');
		$data['level']=$this->input->post('level');
		$data['term']=$this->input->post('term');
		$data['contact']=$this->input->post('contact');
		$data['gcontact']=$this->input->post('gcontact');
		$data['caddress']=$this->input->post('caddress');
		$data['paddress']=$this->input->post('paddress');
		$data['cgpa']=$this->input->post('cgpa');
		$data['gdate']=$this->input->post('gdate');
		$data['email']=$this->input->post('email');
		echo $data['gdate'];
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Name','trim|xss_clean|required');
		$this->form_validation->set_rules('student-no','Student ID','trim|xss_clean|required');
		$this->form_validation->set_rules('contact','Contact no','trim|xss_clean');
		$this->form_validation->set_rules('paddress','Permanent Address','trim|xss_clean');
		$this->form_validation->set_rules('gcontact','Gurdian Contact no','trim|xss_clean');
		$this->form_validation->set_rules('caddress','Currnet Address','trim|xss_clean');
		$this->form_validation->set_rules('cgpa','CGPA','trim|xss_clean|numeric');
		$this->form_validation->set_rules('gdate','Graduation Date','trim|xss_clean');
		$this->form_validation->set_rules('email','Email','trim|xss_clean|valid_email');
		
		if(!$this->form_validation->run()){
			$data['message']=validation_errors('<p class="text-error">','</p>');
			$data['alevel']=$this->get_level();
			$this->load->view('create_student_view',$data);
			return;
		}
		
		if($data['dept']=='none'){
			$data['message']='<p class="text-error">Select the department field correctly</p>';
			$data['alevel']=$this->get_level();
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
		$dbval['NAME']=$data['name'];
		$dbval['ID']=$data['id'];
		$dbval['STYPE']=$data['stype'];
		$dbval['SLEVEL']=$data['level'];
		$dbval['TERM']=$data['term'];
		$dbval['DEPT']=$data['dept'];
		$dbval['ROOM']=$data['room'];
		$dbval['CONTACT']=$data['contact'];
		$dbval['PERMANENT_ADDRESS']=$data['paddress'];
		$dbval['CURRENT_ADDRESS']=$data['caddress'];
		$dbval['IMAGE']=$data['image_path'];
		$dbval['GURDIAN_CONTACT']=$data['gcontact'];
		$dbval['EMAIL']=$data['email'];
		$dbval['CGPA']=$data['cgpa'];
		if($dbval['STYPE']=='resident' && $dbval['ROOM']==0) $dbval['ROOM']=1;
		if($data['gdate'])
		$dbval['GRAD_DATE']=$this->format_date($data['gdate']);
		else $dbval['GRAD_DATE']='01 JAN 1970';
		$this->student_model->insert($dbval);
		$data=array();
		$data['title']='create_student';
		$data['stype']='none';
		$data['rooms']=$this->room_model->get_available_room_list();
		$data['room']='';
		$data['name']='';
		$data['id']='';
		$data['dept']='';
		$data['level']='';
		$data['term']='';
		$data['cgpa']='';
		$data['gdate']='';
		$data['contact']='';
		$data['email']='';
		$data['gcontact']='';
		$data['paddress']='';
		$data['caddress']='';
		$data['message']="<p class='text-success'>The student's data was successfully added</p>";
		$data['alevel']=$this->get_level();
		$this->load->view('create_student_view',$data);
	}
	
	
	function bulk_create(){
		$data['alevel']=$this->get_level();
		$this->load->view('bulk_create_student_view',$data);
	}
	
	
	function check_bulk_create(){
		if(!$this->input->post('submit')){
			$this->bulk_create();
			return ;
		}
		
		$this->load->library('form_validation');
		$name = $this->input->post('name');
		$sid = $this->input->post('student_no');
		$stype = $this->input->post('stype');
		$dept = $this->input->post('dept');
		$level = $this->input->post('level');
		$term = $this->input->post('term');
		$tot = count($name);
		$cc =0;
		for ($i = 0; $i < $tot; $i++)
		{
			$dbval = array();
			$dbval['NAME']=$name[$i];
			$dbval['ID']=$sid[$i];
			$dbval['STYPE']=$stype[$i];
			$dbval['SLEVEL']=$level[$i];
			$dbval['TERM']=$term[$i];
			$dbval['DEPT']=$dept[$i];
			if($dbval['STYPE']=='resident')
			$dbval['ROOM']='1';
			else $dbval['ROOM']='0';
			$dbval['CONTACT']='-1';
			$dbval['PERMANENT_ADDRESS']='none';
			$dbval['CURRENT_ADDRESS']='none';
			$dbval['IMAGE']='/images/notFound.png';
			$dbval['GURDIAN_CONTACT']='-1';
			$dbval['EMAIL']='none';
			$dbval['CGPA']='-1';
			$dbval['GRAD_DATE']='01-JAN-1970';
			if($this->student_model->insert($dbval))$cc+=1;
		}
		
		$data = array();
		$data['success']='A total of '.$cc.' students\' data  was entered';
		$data['alevel']=$this->get_level();
		$this->load->view('bulk_create_student_view',$data);
		
	}
	
	
	function swap(){
		$data=array();
		$data['title']='swap_student';
		$data['id1']='';
		$data['id2']='';
		$data['alevel']=$this->get_level();
		$this->load->view('swap_student_view',$data);
	}
	
	
	function show_swap(){
		$s1  = $this->input->get('s1');
		$s2  = $this->input->get('s2');
		//~ $s1='0905003';
		//~ $s2='0905056';
		$data = array();
		$data['title']='swap_student';
		
		
		$data['s1']=$this->student_model->get_student($s1);
		$data['s2']=$this->student_model->get_student($s2);
		
		if(!$data['s1'] || !$data['s2']){
			echo '<p class="text-error">The student id was invalid or doesn\'t exist or not both of them are resident</p>';
			return ;
		}
		if(!$this->student_model->is_resident($s1) || !$this->student_model->is_resident($s2)){
			echo '<p class="text-error">The student id was invalid or doesn\'t exist or not both of them are resident</p>';
			return;
		}
		$data['alevel']=$this->get_level();
		$this->load->view('show_swap',$data);
	}
	
	function check_swap(){
		$s1 = $this->input->post('s1');
		$s2 = $this->input->post('s2');
		
		
		$r1 = $this->student_model->get_room($s1);
		$r2 = $this->student_model->get_room($s2);
		$data = array();
		$data['ROOM']=$r2;
		$this->student_model->update($s1,$data);
		$data = array();
		$data['ROOM']=$r1;
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
		$data['alevel']=$this->get_level();
		$this->load->view('show_swap',$data);
	}
	
	
	
	function delete(){
		$id=$this->input->get('id');
		if(!$id || !$this->student_model->exists($id)){
			echo '<p class="text-error"> No students found with the provided id</p>';
			return;
		}
		$rm = $this->student_model->get_room($id);
		$img = $this->student_model->get_image($id);
		if($img!='/images/notFound.png')
		unlink('.'.$img);
		$this->student_model->delete($id);
		
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
	
	
	
	
	function assign(){
		$data =array();
		$data['students'] = $this->student_model->get_query('select * from student where room=1 order by name');
		$data['total']=$this->room_model->get_tot_available();
		$data['alevel']=$this->get_level();
		$this->load->view('random_assign_view',$data);
	}
	
	function check_assign(){
		$ary = $this->input->post('students');
		if(!$ary){
			$this->assign();
			return;
		}
		$tot = $this->room_model->get_tot_available();
		$cnt = min(count($ary),$tot);
		$who = array();
		$which = array();
		$name = array();
		shuffle($ary);
		
		for ($i = 0; $i < $cnt; $i++)
		{
			$r = $this->room_model->get_a_room();
			$data = array();
			$data['ROOM'] = $r;
			$this->student_model->update($ary[$i],$data);
			$who[$i] = $ary[$i];
			$which[$i] = $r;
			$name[$i] = $this->student_model->get_name($who[$i]);
		}
		
		$this->load->view('assigned_view',array('who'=>$who,'which'=>$which,'name'=>$name,'alevel'=>$this->get_level()));
	}
	
	
	function export($val){
		$file = 'student-list.xls';    
		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=$file");
		$order = $this->input->get('order');
		if(!$order)$order='name';
		switch($val){
			case 'all' : $data = $this->student_model->get_query('select * from student order by '.$order);
				break;
			case 'resident':  $data=$this->student_model->get_query('select * from student where stype=\'resident\' order by '.$order);
				break;
			case 'attached': $data=$this->student_model->get_query('select * from student where stype=\'attached\' order by '.$order);
				break;
			case 'unassigned': $data=$this->student_model->get_query('select * from student where room=1 order by '.$order);
				break;
			case 'alumni': $data=$this->student_model->get_query('select * from student where stype=\'alumni\' order by '.$order);
				break;
		}
		echo '<table><tbody>';
		$test = '<tr><td>Student Type</td><td>Student Id</td><td>Name</td><td>Department</td><td>Level</td><td>Term</td><td>Contact No.</td><td>Room No.</td><td>Graduation Date</td><td>Permanent Address</td><td>Current Address</td></tr>';
		echo $test;
		foreach($data as $row){
			echo '<tr>';
			echo '<td>'.ucfirst($row->STYPE).'</td>';
			echo '<td>'.$row->ID.'</td>';
			echo '<td>'.ucfirst($row->NAME).'</td>';
			echo '<td>'.$row->DEPT.'</td>';
			if($row->SLEVEL==-1){
				echo '<td>N/A</td><td>N/A</td>';
			}else{
				echo '<td>'.$row->SLEVEL.'</td>';
				echo '<td>'.$row->TERM.'</td>';
			}
			echo '<td>'.$row->CONTACT.'</td>';
			if($row->ROOM==1){
				echo '<td>Room Unassigned</td>';
			}else if($row->ROOM<1){
				echo '<td>N/A</td>';
			} else echo '<td>'.$row->ROOM.'</td>';
			if($row->STYPE =='alumni'){
				echo '<td>'.$row->GRAD_DATE.'</td>';
			}else echo '<td>N/A</td>';
			echo '<td>'.$row->PERMANENT_ADDRESS.'</td>';
			echo '<td>'.$row->CURRENT_ADDRESS.'</td>';
			echo '</tr>';
		}
		echo '</tbody></table>';
	}
	
	
	
}

?>
