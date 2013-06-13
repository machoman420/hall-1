<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	
	function index(){
		if(!$this->session->userdata('loggedin'))redirect('login','refresh');
		$this->load->view('home_view');
	}
	
	function logout(){
		if($this->session->userdata('loggedin'))$this->session->unset_userdata('loggedin');
		redirect('login','refresh');
	}
}


?>
