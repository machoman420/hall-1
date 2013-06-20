<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function  insert($data){
		return $this->db->insert('STUDENT',$data);
	}
	
	
	function  delete($id){
		$this->db->where('ID',$id);
		$this->db->delete('STUDENT');
	}
	
	function update($id,$data){
		$this->db->where('ID',$id);
		$this->db->update('STUDENT',$data);
	}
	
	function get_students_in($room){
		$s = 'select * from student where room='.$room.' order by name';
		$q = $this->db->query($s);
		if($q->num_rows())return $q->result();
		return array();
	}
	
	function get_all($start=0,$c=10000){
		$s = 'select * from student order by name';
		$q = $this->db->query($s);
		if($q->num_rows())return $q->result();
		return array();
	}
	
	function get_query($s){
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
		$s = 'select * from student where id = \''.$id.'\'';
		$q = $this->db->query($s);
		if($q->num_rows())return $q->result();
		return array();
	}
	
	function exists($id){
		$s = 'select * from student where id = \''.$id.'\'';
		$q = $this->db->query($s);
		if($q->num_rows()>0)return true;
		return false;
	}
	
	function get_room($id){
		$s = 'select room from student where id=\''.$id.'\'';
		$q = $this->db->query($s);
		$re = $q->result();
		foreach($re as $x) return $x->ROOM;
		return  false;
	}
	
	function get_image($id){
		$this->db->select('IMAGE');
		$this->db->where('ID',$id);
		$this->db->from('STUDENT');
		$q = $this->db->get();
		if($q->num_rows()>0){
			foreach($q->result() as $x)return $x->IMAGE;
		}
		return '';
	}
	
	function get($s){
		$q = $this->db->query($s);
		if($q->num_rows()>0)return $q->result();
		return false;
	}
	
	function get_name($id){
		$q = 'select name from student where id=\''.$id.'\'';
		$re = $this->db->query($q);
		if($re->num_rows()<=0)return  '';
		
		foreach($re->result() as $row){
			return $row->NAME;
		}
	}
	
	
	function is_resident($id){
		$s = 'select * from student where id=\''.$id.'\' and stype=\'resident\'';
		$q = $this->db->query($s);
		if($q->num_rows()>0)return true;
		return false;
	}
	
	
	function get_all_count(){
		$s = 'select * from student';
		$q = $this->db->query($s);
		return $q->num_rows();
	}
	
	function get_attached_count(){
		$s = 'select * from student where stype=\'attached\'' ;
		$q = $this->db->query($s);
		return $q->num_rows();
	}
	
	function get_resident_count(){
		$s = 'select * from student where stype=\'resident\'' ;
		$q = $this->db->query($s);
		return $q->num_rows();
	}
	
	function get_alumni_count(){
		$s = 'select * from student where stype=\'alumni\'' ;
		$q = $this->db->query($s);
		return $q->num_rows();
	}
	
}

?>
