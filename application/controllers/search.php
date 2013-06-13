<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Search extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('room_model');
		$this->load->model('student_model');
	}

	function index(){
		echo 'hic';
	}

	public function room(){
		$q = $this->input->post('q');
		$data = array();
		//~ $q = '211';
		$data['rooms']=$this->room_model->get_rooms_like($q);
		$this->load->view('search_room_view',$data);
	}

	public function student(){
		//~ $q='wr';
		$q = $this->input->post('q');
		$level = $this->input->post('level');
		$term = $this->input->post('term');

		$data = array();
		if($q=='' && $level=='0' && $term=='0'){
			$data['students']=$this->student_model->get_all();
		}else if($q=='' && $level=='0' && $term!='0'){
			$data['students']=$this->student_model->get('select * from student where term='.$term);
		}else if($q=='' && $level!='0' && $term=='0'){
			$data['students']=$this->student_model->get('select * from student where level='.$level);
		}else if($q=='' && $level!='0' && $term!='0'){
			$data['students']=$this->student_model->get('select * from student where term='.$term.' level '.$level);
		}else if($q!='' && $level=='0' && $term=='0'){
			$data['students']=$this->student_model->get('select * from student where id="'.$q.'" or name like "'.$q.'%"');
		}else if($q!='' && $level=='0' && $term!='0'){
			$data['students']=$this->student_model->get('select * from student where term='.$term.' and (id="'.$q.'" or name like "'.$q.'%")');
		}else if($q!='' && $level!='0' && $term=='0'){
			$data['students']=$this->student_model->get('select * from student where level='.$level.' and (id="'.$q.'" or name like "'.$q.'%")');
		}else if($q!='' && $level!='0' && $term!='0'){
			$data['students']=$this->student_model->get('select * from student where term='.$term.' and level='.$level.' and (id="'.$q.'" or name like "'.$q.'%)"');
		}
		$this->load->view('search_student_view',$data);
	}

}

?>
