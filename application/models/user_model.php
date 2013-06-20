<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	//~ function insert($data){
		//~ $this->db->insert('users',$data);
	//~ }
	
	 function get_user($user, $pass) {
		$s = 'select * from users where uname=\''.$user.'\' and password=\''.md5($pass).'\'';
        $query = $this->db->query($s);
        if ($query->num_rows() == 1)
            return $query->result();
        return false;
    }

    function change_pass($user, $pass,$old) {
        if ($this->get_user($user, $old)) {
            $this->db->where('UNAME', $user);
            $data = array();
            $data['PASSWORD'] = md5($pass);
            $this->db->update('USERS', $data);
            return true;
        }
        return false;
    }
    
    function update($id,$data){
		
		$this->db->where('UNAME',$id);
		$this->db->update('USERS',$data);
	}
}

?>
