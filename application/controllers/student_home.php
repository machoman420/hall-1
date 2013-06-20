<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


session_start();

class Student_home extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	function index(){
		echo "<h3> You are not allowed to login</h3>";
		if($this->session->userdata('loggedin'))$this->session->unset_userdata('loggedin');
		//~ redirect('login','refresh');
	}
	
}

