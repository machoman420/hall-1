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
	
	
	function show(){
		$data=array();
		$data['title']='room_list';
		$order = $this->input->get('order');
		$by = $this->input->get('q');
		$id = $this->input->get('id');
		if($id){
			$data['rooms']=$this->room_model->get_room($id);
			$data['students']=$this->student_model->get_students_in($id);
			$this->load->view('show_room_view',$data);
			return;
		}else if($order && $by){
			$data['rooms']=$this->room_model->get_all_ordered($order,$by);
		}else $data['rooms']=$this->room_model->get_all();
		
		$this->load->view('list_room_view',$data);
	}
	
	
	
	function create(){
		$data=array();
		$data['title']='create_room';
		$data['room_no']='';
		$data['block']='';
		$data['max_std']='';
		$data['floor']='';
		$data['bed']='';
		$data['lamp']='';
		$data['table']='';
		$data['chair']='';
		$data['locker']='';
		
		$this->load->view('create_room_view',$data);
	}
	
	function check_create(){
		$data = array();
		$data['title']='create_room';
		$data['room_no']=$this->input->post('room_no');
		$data['block']=$this->input->post('block');
		$data['max_std']=$this->input->post('max_std');
		$data['floor']=$this->input->post('rfloor');
		$data['bed']=$this->input->post('bed');
		$data['lamp']=$this->input->post('lamp');
		$data['locker']=$this->input->post('locker');
		$data['chair']=$this->input->post('table');
		$data['table']=$this->input->post('chair');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('room_no','Room No','trim|xss_clean|required');
		$this->form_validation->set_rules('chair','Chairs','trim|xss_clean|integer');
		$this->form_validation->set_rules('table','Tables','trim|xss_clean|integer');
		$this->form_validation->set_rules('locker','Lockers','trim|xss_clean|integer');
		$this->form_validation->set_rules('bed','Beds','trim|xss_clean|integer');
		$this->form_validation->set_rules('lamp','Lamps','trim|xss_clean|integer');
		if(!$this->form_validation->run()){
			$data['message']='Please correctly enter the Room no';
			$this->load->view('create_room_view',$data);
			return ;
		}
		
		$dbval=array();
		$dbval['id']=$data['room_no'];
		$dbval['block']=$data['block'];
		$dbval['floor']=$data['floor'];
		$dbval['max_std']=$data['max_std'];
		$dbval['bed']=$data['bed'];
		$dbval['locker']=$data['locker'];
		$dbval['chair']=$data['chair'];
		$dbval['table']=$data['table'];
		$dbval['lamp']=$data['lamp'];
		$this->room_model->insert($dbval);
		
		$data['message']="Room created successfully";
		$this->load->view('create_room_view',$data);
	}
	
	
	function update(){
		$data=array();
		$data['title']='create_room';
		
		
		$id = $this->input->get('id');
		$re = $this->room_model->get_room($id);
		if(!$re){
			echo '<h4 class="text-error">The room no '.$id.' was not found. Please correct and try again.</h4>';
			return;
		}
		foreach($re as $room){
			$data['room_no']=$room->id;
			$data['block']=$room->block;
			$data['max_std']=$room->max_std;
			$data['floor']=$room->floor;
			$data['bed']=$room->bed;
			$data['lamp']=$room->lamp;
			$data['table']=$room->table;
			$data['chair']=$room->chair;
			$data['locker']=$room->locker;
		}
		$this->load->view('update_room_view',$data);
	}
	
	function check_update(){
		$data = array();
		$data['title']='create_room';
		$data['room_no']=$this->input->post('room_no');
		$data['block']=$this->input->post('block');
		$data['max_std']=$this->input->post('max_std');
		$data['floor']=$this->input->post('rfloor');
		$data['bed']=$this->input->post('bed');
		$data['lamp']=$this->input->post('lamp');
		$data['locker']=$this->input->post('locker');
		$data['chair']=$this->input->post('table');
		$data['table']=$this->input->post('chair');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('room_no','Room No','trim|xss_clean|required');
		$this->form_validation->set_rules('chair','Chairs','trim|xss_clean|required|integer');
		$this->form_validation->set_rules('table','Tables','trim|xss_clean|required|integer');
		$this->form_validation->set_rules('locker','Lockers','trim|xss_clean|required|integer');
		$this->form_validation->set_rules('bed','Beds','trim|xss_clean|required|integer');
		$this->form_validation->set_rules('lamp','Lamps','trim|xss_clean|required|integer');
		
		if(!$this->form_validation->run() || !$this->room_model->check_max($data['room_no'],$data['max_std'])){
			$data['message']='Please correctly enter the room data';
			$this->load->view('create_room_view',$data);
			return ;
		}
		
		$dbval=array();
		$dbval['block']=$data['block'];
		$dbval['floor']=$data['floor'];
		$dbval['max_std']=$data['max_std'];
		$dbval['bed']=$data['bed'];
		$dbval['locker']=$data['locker'];
		$dbval['chair']=$data['chair'];
		$dbval['table']=$data['table'];
		$dbval['lamp']=$data['lamp'];
		$this->room_model->update($data['room_no'],$dbval);
		
		$data['message']="Room updated successfully";
		$this->load->view('create_room_view',$data);
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
		}else 
			$this->load->view('delete_room_view',$data);
	}
	
	
	function export(){
		$file = 'room-list.xls';    
		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=$file");
		$data = $this->room_model->get_all();
		echo '<table><tbody>';
		$test = '<tr><td>Room No</td><td>Max No of students</td><td>No of Students</td><td>Block</td><td>Floor</td><td>Students</td></tr>';
		echo $test;
		foreach($data as $row){
			echo '<tr>';
			echo '<td>'.$row->id.'</td>';
			echo '<td>'.$row->max_std.'</td>';
			echo '<td>'.$row->count.'</td>';
			echo '<td>'.$row->block.'</td>';
			echo '<td>'.$row->floor.'</td>';

			$stds = $this->student_model->get_students_in($row->id);
			foreach($stds as $std){
				echo '<td>'.$std->name.'('.$std->id.')</td>';
			}
			echo '</tr>';

		}
		echo '</tbody></table>';
	}
	
}

?>
