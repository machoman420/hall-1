<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Log_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function get_student_insert(){
		$s = 'select * from student_insert_log';
		$q = $this->db->query($s);
		if($q->num_rows()>0)return $q->result();
		return array();
	}
	
	function  get_room_insert(){
		$s = 'select * from room_insert_log';
		$q = $this->db->query($s);
		if($q->num_rows()>0)return $q->result();
		return array();
	}
	
	function get_student_update(){
		$s = 'select * from student_update_log';
		$q = $this->db->query($s);
		if($q->num_rows()>0)return $q->result();
		return array();
	}
	
	function get_room_update(){
		$s = 'select * from room_update_log';
		$q = $this->db->query($s);
		if($q->num_rows()>0)return $q->result();
		return array();
	}
	
}
