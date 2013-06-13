<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function  insert($data){
		$this->db->insert('student',$data);
	}
	
	
	function  delete($id){
		$this->db->where('id',$id);
		$this->db->delete('student');
	}
	
	function update($id,$data){
		$this->db->where('id',$id);
		$this->db->update('student',$data);
	}
	
	function get_students_in($room){
		$s = 'select * from student where room='.$room;
		$q = $this->db->query($s);
		if($q->num_rows())return $q->result();
		return array();
	}
	
	function get_all($start=0,$c=10000){
		$s = 'select * from student limit '.$start.', '.$c;
		$q = $this->db->query($s);
		if($q->num_rows())return $q->result();
		return array();
	}
	
	function get_all_ordered($order,$by,$start=0,$c=10000){
		$s = 'select * from student order by '.$by.' '.by.' '.$order.' limit '.$start.', '.$c;
		$q = $this->db->query($s);
		if($q->num_rows())return $q->result();
		return array();
	}
	
	function get_student($id){
		$s = 'select * from student where id = "'.$id.'" limit 1';
		$q = $this->db->query($s);
		if($q->num_rows())return $q->result();
		return array();
	}
	
	
	function get_room($id){
		$s = 'select room from student where id='.$id;
		$q = $this->db->query($s);
		$re = $q->result();
		foreach($re as $x) return $x->room;
		return  false;
	}
	
	function get_image($id){
		$this->db->select('image_path');
		$this->db->where('id',$id);
		$this->db->from('student');
		$q = $this->db->get();
		if($q->num_rows()>0){
			foreach($q->result() as $x)return $x->image_path;
		}
		return '';
	}
	
	function get($s){
		$q = $this->db->query($s);
		if($q->num_rows()>0)return $q->result();
		return false;
	}
}

?>
