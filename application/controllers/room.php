<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Room extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('loggedin'))redirect('login','refresh');
		$this->load->model('room_model');
		$this->load->model('student_model');
	}
	
	function index(){
		echo 'hic';
	}
	
	function  get_level(){
		$ary = $this->session->userdata('loggedin');
		if(isset($ary['auth']))
		return $ary['auth'];
		return 2;
	}
	
	
	function show(){
		$data=array();
		$data['title']='room_list';
		$order = $this->input->get('order');
		$by = $this->input->get('q');
		$id = $this->input->get('id');
		if($id){
			$data['rooms']=$this->room_model->get_room($id);
			$data['students']=$this->student_model->get_students_in($id);
			$data['alevel']=$this->get_level();
			$this->load->view('show_room_view',$data);
			return;
		}else if($order && $by){
			$data['rooms']=$this->room_model->get_all_ordered($order,$by);
		}else $data['rooms']=$this->room_model->get_all();
		$data['alevel']=$this->get_level();
		$this->load->view('list_room_view',$data);
	}
	
	function showEmpty(){
		$data = array();
		$data['title'] = 'room_list';
		$data['rooms']=$this->room_model->get_empty_list();
		$data['total']=$this->room_model->get_tot_seat();
		$data['occupied']=$this->room_model->get_occupied_seat();
		$data['alevel']=$this->get_level();
		$this->load->view('list_empty_room_view',$data);
	}
	
	function create(){
		$data=array();
		$data['title']='create_room';
		$data['room_no']='';
		$data['block']='none';
		$data['max_std']='4';
		$data['floor']='none';
		$data['bed']='4';
		$data['lamp']='4';
		$data['table']='4';
		$data['chair']='4';
		$data['locker']='4';
		$data['alevel']=$this->get_level();
		$this->load->view('create_room_view',$data);
	}
	
	function bulk_create(){
		$data = array();
		$data['alevel']=$this->get_level();
		$this->load->view('bulk_create_room_view',$data);
	}
	
	function check_bulk(){
		$start = $this->input->post('sroom');
		$end = $this->input->post('eroom');
		$data = array();
		$data['MAX_STD'] = $this->input->post('max-std');
		$data['RTYPE'] = 'resident';
		$data['RBLOCK'] =$this->input->post('block');
		$data['RFLOOR'] =$this->input->post('floor');
		$data['STDCOUNT']=0;
		$data['TABLECOUNT']=$this->input->post('table');
		$data['CHAIRCOUNT']=$this->input->post('chair');
		$data['BEDCOUNT']=$this->input->post('bed');
		$data['LAMPCOUNT']=$this->input->post('lamp');
		$data['LOCKERCOUNT']=$this->input->post('locker');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('sroom','Start Room No','trim|xss_clean|required');
		$this->form_validation->set_rules('eroom','Last Room No','trim|xss_clean|required');
		$this->form_validation->set_rules('max-std','Maximum no of students','trim|xss_clean|integer');
		$this->form_validation->set_rules('chair','Chairs','trim|xss_clean|integer');
		$this->form_validation->set_rules('table','Tables','trim|xss_clean|integer');
		$this->form_validation->set_rules('locker','Lockers','trim|xss_clean|integer');
		$this->form_validation->set_rules('bed','Beds','trim|xss_clean|integer');
		$this->form_validation->set_rules('lamp','Lamps','trim|xss_clean|integer');
		if(!$this->form_validation->run()){
			$data['error'] = validation_errors('<p class="text-error">','</p>');
			$data['alevel']=$this->get_level();
			$this->load->view('bulk_create_room_view',$data);
			return;
		}
		if(intval($start)>intval($end)){
			$data['error'] = 'End room number cannot be less than Start room no.';
			$data['alevel']=$this->get_level();
			$this->load->view('bulk_create_room_view',$data);
			return;
		}
		for ($i = $start; $i <= $end ; $i++)
		{
			$data['ID']=$i;
			$this->room_model->insert($data);
		}
		$data['alevel']=$this->get_level();
		$this->load->view('bulk_create_room_view',array('success'=>'Room from '.$start.' to '.$end.' created successfully'));
	}
	
	
	
	
	function check_create(){
		$data = array();
		$data['room_no'] = $this->input->post('room-no');
		$data['max-std'] = $this->input->post('max-std');
		$data['RTYPE'] = 'resident';
		$data['block'] =$this->input->post('block');
		$data['floor'] =$this->input->post('floor');
		$data['stdcount']=0;
		$data['table']=$this->input->post('table');
		$data['chair']=$this->input->post('chair');
		$data['bed']=$this->input->post('bed');
		$data['lamp']=$this->input->post('lamp');
		$data['locker']=$this->input->post('locker');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('room-no','Room No','trim|xss_clean|required');
		$this->form_validation->set_rules('chair','Chairs','trim|xss_clean|integer');
		$this->form_validation->set_rules('table','Tables','trim|xss_clean|integer');
		$this->form_validation->set_rules('locker','Lockers','trim|xss_clean|integer');
		$this->form_validation->set_rules('bed','Beds','trim|xss_clean|integer');
		$this->form_validation->set_rules('lamp','Lamps','trim|xss_clean|integer');
		if(!$this->form_validation->run()){
			$data['error']=validation_errors('<p class="text-error">','</p>');
			$data['alevel']=$this->get_level();
			$this->load->view('create_room_view',$data);
			return ;
		}
		
		$dbval=array();
		$dbval['ID']=$data['room_no'];
		$dbval['RBLOCK']=$data['block'];
		$dbval['RFLOOR']=$data['floor'];
		$dbval['MAX_STD']=$data['max-std'];
		$dbval['BEDCOUNT']=$data['bed'];
		$dbval['LOCKERCOUNT']=$data['locker'];
		$dbval['CHAIRCOUNT']=$data['chair'];
		$dbval['TABLECOUNT']=$data['table'];
		$dbval['LAMPCOUNT']=$data['lamp'];
		$dbval['RTYPE']='resident';
		$dbval['STDCOUNT']=0;
		$this->room_model->insert($dbval);
		
		$data=array();
		$data['title']='create_room';
		$data['room_no']='';
		$data['block']='none';
		$data['max_std']='4';
		$data['floor']='none';
		$data['bed']='4';
		$data['lamp']='4';
		$data['table']='4';
		$data['chair']='4';
		$data['locker']='4';
		$data['success']="Room created successfully";
		$data['alevel']=$this->get_level();
		$this->load->view('create_room_view',$data);
	}
	
	
	function update(){
		$data=array();
		$data['title']='create_room';
		
		
		$id = $this->input->get('id');
		$re = $this->room_model->get_room($id);
		if(!$re){
			$data=array();
			$data['alevel']=$this->get_level();
			$data['error']='The room with id '.$id.' was not found. Please try again.';
			$this->load->view('fail_view',$data);
			return;
		}
		foreach($re as $room){
			$data['room_no']=$room->ID;
			$data['block']=$room->RBLOCK;
			$data['max_std']=$room->MAX_STD;
			$data['floor']=$room->RFLOOR;
			$data['bed']=$room->BEDCOUNT;
			$data['lamp']=$room->LAMPCOUNT;
			$data['table']=$room->TABLECOUNT;
			$data['chair']=$room->CHAIRCOUNT;
			$data['locker']=$room->LOCKERCOUNT;
		}
		$data['alevel']=$this->get_level();
		$this->load->view('update_room_view',$data);
	}
	
	function check_update(){
		//~ echo 'hic1';
		$data = array();
		$data['title']='create_room';
		$data['room_no']=$this->input->post('room-no');
		$data['block']=$this->input->post('block');
		$data['max_std']=$this->input->post('max-std');
		$data['floor']=$this->input->post('rfloor');
		$data['bed']=$this->input->post('bed');
		$data['lamp']=$this->input->post('lamp');
		$data['locker']=$this->input->post('locker');
		$data['chair']=$this->input->post('table');
		$data['table']=$this->input->post('chair');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('room-no','Room No','trim|xss_clean|required');
		$this->form_validation->set_rules('chair','Chairs','trim|xss_clean|required|integer');
		$this->form_validation->set_rules('table','Tables','trim|xss_clean|required|integer');
		$this->form_validation->set_rules('locker','Lockers','trim|xss_clean|required|integer');
		$this->form_validation->set_rules('bed','Beds','trim|xss_clean|required|integer');
		$this->form_validation->set_rules('lamp','Lamps','trim|xss_clean|required|integer');
		
		if(!$this->form_validation->run() || !$this->room_model->check_max($data['room_no'],$data['max_std'])){
			//~ echo 'hhh';
			$data['message']=validation_errors('<p class="text-error">','</p>');
			$data['alevel']=$this->get_level();
			$this->load->view('update_room_view',$data);
			return ;
		}
		
		//~ echo 'hic2';
		$dbval=array();
		$dbval['RBLOCK']=$data['block'];
		$dbval['RFLOOR']=$data['floor'];
		$dbval['MAX_STD']=$data['max_std'];
		$dbval['BEDCOUNT']=$data['bed'];
		$dbval['LOCKERCOUNT']=$data['locker'];
		$dbval['CHAIRCOUNT']=$data['chair'];
		$dbval['TABLECOUNT']=$data['table'];
		$dbval['LAMPCOUNT']=$data['lamp'];
		$this->room_model->update($data['room_no'],$dbval);
		
		
		//~ echo 'hic3';
		
		$data['message']="Room updated successfully";
		$data['alevel']=$this->get_level();
		$this->load->view('update_room_view',$data);
	}
	
	
	
	function delete(){
		$id=$this->input->get('id');
		if(!$id || !$this->room_model->get_room($id)){
			echo 'No room was found with the provided id';
			return;
		}else if($this->room_model->allocated($id)){
			echo 'Please unattached all the students in this room before deleting it';
			return;
		}
		$this->room_model->delete($id);
		echo '<p class="text-success">Data successfully deleted</p>';
	}

	function show_delete(){
		$data=array();
		$id = $this->input->get('id');
		$data['rooms']=$this->room_model->get_room($id);
		$data['students']=$this->student_model->get_students_in($id);
		if(!$data['rooms']){
			echo 'No room was found with the provided id';
		}else {
			$data['alevel']=$this->get_level();
			$this->load->view('delete_room_view',$data);
		}
	}
	
	
	function export($var=-11){
		$file = 'room-list.xls';    
		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=$file");
		if($var==-1)
		$data = $this->room_model->get_all();
		else $data = $this->room_model->get_empty_list();
		echo '<table><tbody>';
		$test = '<tr><td>Room No</td><td>Max No of students</td><td>No of Students</td><td>Available Seats</td><td>Block</td><td>Floor</td><td>Students</td></tr>';
		echo $test;
		foreach($data as $row){
			echo '<tr>';
			echo '<td>'.$row->ID.'</td>';
			echo '<td>'.$row->MAX_STD.'</td>';
			echo '<td>'.$row->STDCOUNT.'</td>';
			echo '<td>'.($row->MAX_STD-$row->STDCOUNT).'</td>';
			echo '<td>'.$row->RBLOCK.'</td>';
			echo '<td>'.$row->RFLOOR.'</td>';

			$stds = $this->student_model->get_students_in($row->ID);
			foreach($stds as $std){
				echo '<td>'.$std->NAME.'('.$std->ID.')</td>';
			}
			echo '</tr>';

		}
		echo '</tbody></table>';
	}
	

	
}

?>
