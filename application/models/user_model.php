<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function insert($data){
		$this->db->insert('user',$data);
	}
	
	 function get_user($user, $pass) {
		$s = 'select * from user where uname="'.$user.'" and password="'.md5($pass).'"';
        $query = $this->db->query($s);
        if ($query->num_rows() == 1)
            return $query->result();
        return false;
    }

    function change_pass($user, $pass,$old) {
        if ($this->get_user($user, $old)) {
            $this->db->where('uname', $user);
            $data = array();
            $data['password'] = md5($pass);
            $this->db->update('user', $data);
            return true;
        }
        return false;
    }
}

?>
