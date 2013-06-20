<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Search extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('room_model');
		$this->load->model('student_model');
	}


	function  get_level(){
		$ary = $this->session->userdata('loggedin');
		if(isset($ary['auth']))
		return $ary['auth'];
		return 2;
	}
	
	function index(){
		//~ echo 'hic';
		if(!$this->input->get('in')){
			redirect('home');
		}
		
		$in = $this->input->get('in');
		$q = $this->input->get('q');
		$data = array();
		if($in=='room'){
			$block = $this->input->get('block');
			$floor = $this->input->get('floor');
			$data['rooms'] =$this->process_room($q,$floor,$block);
			$data['alevel']=$this->get_level();
			$this->load->view('search_room_view',$data);
		}else if($in=='student'){
			$dept = $this->input->get('dept');
			$level = $this->input->get('level');
			$term = $this->input->get('term');
			$data['students'] = $this->process_student($q,$dept,$level,$term);
			$data['alevel']=$this->get_level();
			$this->load->view('search_student_view',$data);
		}else {
			$data['students'] = $this->process_student($q,'any','any','any');
			$data['rooms'] = $this->process_room($q,'any','any');
			$data['alevel']=$this->get_level();
			$this->load->view('search_any_view',$data);
		}
	}
	
	
	function process_room($q,$f, $b){
		$s='select * from room where id like \'%'.$q.'%\'';
		if($f=='')$f='any';
		if($b=='')$b='any';
		if($f!='any') $s = $s.' and rfloor=\''.$f.'\'';
		if($b!='any') $s = $s.' and rblock=\''.$b.'\'';
		return $this->room_model->get_query($s);
	}
	
	function process_student($q,$d,$l,$t){
		$s = 'select * from student where (id like \'%'.$q.'%\' or name like \'%'.$q.'%\')';
		if($d=='') $d='any';
		if($l=='')$l='any';
		if($t=='')$t='any';
		if($d !='any') $s = $s.' and dept=\''.$d.'\'';
		if($l !='any') $s = $s.' and slevel=\''.$l.'\'';
		if($t !='any') $s = $s.' and term=\''.$t.'\'';
		
		return $this->student_model->get_query($s);
	}
	
	
	
}

?>
