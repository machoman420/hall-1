<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//session_start();

class Mess extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('loggedin'))redirect('login','refresh');
		$this->load->model('student_model');
		$this->load->model('messinfo_model');
	}
	
	function index(){
		echo 'You\'re not supposed to be here.';
	}
	
	function create(){
		$data['alevel']=$this->get_level();
		$this->load->view('create_mess_month_view',$data);
	}
	
	
	function  get_level(){
		$ary = $this->session->userdata('loggedin');
		if(isset($ary['auth']))
		return $ary['auth'];
		return 2;
	}
	
	function check_create(){
		$data = array();
		$this->load->library('form_validation');
		$data['MESS_MONTH'] = $this->input->post('mess_month_no');
		$data['CHARGE_AMOUNT'] = $this->input->post('charge');
		$data['START_DATE'] = $this->input->post('mess_start_date');
		$data['FINISH_DATE'] = $this->input->post('mess_end_date');
		$data['FINE_START_DATE'] = $this->input->post('fine-start');
		$data['FINE_RATE'] = $this->input->post('mess_delay_fine_per_date');
		$data['STATUS'] = 1;
		$data['ID'] = date('y-m').$data['MESS_MONTH'];
		$data['DURATION']= 30;
		//~ $this->form_validation->set_rules('mess_month_no','Mess ','xss_clean|trim|required');
		$this->form_validation->set_rules('mess_start_date','Mess Start date','xss_clean|trim|required');
		$this->form_validation->set_rules('mess_end_date','Mess End date','xss_clean|trim|required');
		$this->form_validation->set_rules('fine-start','Fine start date','xss_clean|trim|required');
		$this->form_validation->set_rules('charge','Charge amount','xss_clean|trim|required');
		$this->form_validation->set_rules('mess_delay_fine_per_date','Fine per day','xss_clean|trim|required');
		if(!$this->form_validation->run()){
			$data['error']=validation_errors('<p class="text-error">','</p>');
			$data['alevel']=$this->get_level();
			$this->load->view('create_mess_month_view',$data);
			return ;
		}
		
		$this->messinfo_model->insert($data);
		$data = array();
		$data['success']='<p class="text-success">The Mess Session was successfully created</p>';
		$data['alevel']=$this->get_level();
		$this->load->view('create_mess_month_view',$data);
	}
	
	
	function show(){
	}
	
}
