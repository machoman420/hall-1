<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


session_start();

class Login extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('user_model');
	}
	
	function index(){
		if($this->session->userdata('loggedin'))redirect('home','refresh');
		$this->load->view('login_view');
	}
	public function verify(){
        if($this->session->userdata('loggedin'))redirect('home','refresh');
        $this->load->library('form_validation');
       
        $this->form_validation->set_rules('username','Username','required|trim|xss_clean');
        $this->form_validation->set_rules('password','Password','required|trim|xss_clean|callback_check_user'); 
        if($this->form_validation->run()==false){
            $this->load->view('login_view');
        }else{
            redirect('home','refresh');
        }
    }
    
    function check_user($pass){
        $username = $this->input->post('username');
        $result = $this->user_model->get_user($username,$pass);
        
        if($result){
            $session_array = array();
            foreach ($result as $row){
                $session_array=array(
                    'id'=>$row->id,
                    'username'=>$username
                );
                $this->session->set_userdata('loggedin',$session_array);
            }
            return true;
        }else{
            $this->form_validation->set_message('check_user','Invalid username or password');
            return false;
        }
    }
}

?>
