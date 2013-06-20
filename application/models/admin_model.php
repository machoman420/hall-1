<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function insert($d){
		return $this->db->insert('ADMIN_INFO',$d);
	}
	
	function get($id){
		$s = 'select * from admin_info where id=\''.$id.'\'';
		$q = $this->db->query($s);
		if($q->num_rows()>0)return $q->result();
		return array();
	}
	
	function update($id,$d){
		$this->db->where('ID',$id);
		return $this->db->update('ADMIN_INFO',$d);
	}
	
	
	function get_auth($id){
		$s = 'select * from admin_info where id=\''.$id.'\'';
		//~ echo $s;
		$q = $this->db->query($s);
		foreach($q->result() as $r){
			//~ var_dump($r);	
			return $r->AUTH_LEVEL;
		}
	}
	
	
	function  get_list(){
		$s = 'select * from admin_info';
		$q = $this->db->query($s);
		if($q->num_rows()>0)return $q->result();
		return array();
	}
}
