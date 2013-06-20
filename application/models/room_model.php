<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Room_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function insert($data){
		$this->db->insert('ROOM',$data);
	}
	
	function update($id,$data){
		$this->db->where('ID',$id);
		$this->db->update('ROOM',$data);
	}
	
	function  delete($id){
		$this->db->where('ID',$id);
		$this->db->delete('ROOM');
	}
	
	function get_available_room_list(){
		$s = 'select id from room where max_std>stdcount order by id';
		$q = $this->db->query($s);
		if($q->num_rows()>0)return $q->result();
		return array();
	}
	
	function get_all(){
		$s = 'select * from room where id>1 order by id';
		$q = $this->db->query($s);
		if($q->num_rows()>0)return $q->result();
		return array();
	}
	
	function get_all_ordered($order,$by){
		$s = 'select * from room order by '.$by.' '.$order;
		$q = $this->db->query($s);
		if($q->num_rows()>0)return $q->result();
		return array();
	}
	
	
	function available($id){
		$s = 'select * from room where id='.$id.' and max_std>stdcount';
		$q = $this->db->query($s);
		if($q->num_rows()>0)return true;
		return false;
	}
	
	
	function get_cur_count($id){
		$s = 'select count from room where id='.$id;
		$q = $this->db->query($s);
		foreach($q->result() as $row){
			return $row->count;
		}
		return 0;
	}
	
	function add_student($id){
		$data=array();
		$data['STDCOUNT']=$this->get_cur_count($id)+1;
		$this->db->where('ID',$id);
		$this->db->update('ROOM',$data);
	}
	
	function remove_student($id){
		$data=array();
		$data['STDCOUNT']=$this->get_cur_count($id)-1;
		$this->db->where('ID',$id);
		$this->db->update('ROOM',$data);
	}
	
	
	function get_room($id){
		$s = 'select * from room where id=\''.$id.'\'';
		$q = $this->db->query($s);
		if($q->num_rows())return $q->result();
		return array();
	}
	
	
	function check_max($id,$cmax){
		$s = 'select * from room where id=\''.$id.'\' and stdcount<='.$cmax;
		$q = $this->db->query($s);
		if($q->num_rows()>0)return true;
		return false;
	}
	
	
	function allocated($id){
		$s = 'select stdcount from room where id=\''.$id.'\' and stdcount>0';
		$q = $this->db->query($s);
		if($q->num_rows()>0)return true;
		return false;
	}
	
	
	function get_rooms_like($id){
		$this->db->select('*');
		$this->db->like('ID',$id,'AFTER');
		$this->db->from('ROOM');
		$q = $this->db->get();
		if($q->num_rows()>0)return $q->result();
		return false;
	}
	
	
	function get_empty_list(){
		$q = 'select * from room where max_std>stdcount order by id';
		$re = $this->db->query($q);
		if($re->num_rows()>0)return  $re->result();
		return array();
	}
	
	function get_tot_seat(){
		$q = 'select sum(max_std) ss from room where id>1';
		$re = $this->db->query($q);
		if($re->num_rows()<=0)return  0;
		
		foreach($re->result() as $row){
			return $row->SS;
		}
		
		
		return 0;
	}
	
	
	function get_occupied_seat(){
		$q = 'select sum(stdcount) ss from room where id>1';
		$re = $this->db->query($q);
		if($re->num_rows()<=0)return  0;
		
		foreach($re->result() as $row){
			return $row->SS;
		}
		return 0;
	}
	
	function get_tot_available(){
		return $this->get_tot_seat()-$this->get_occupied_seat();
	}
	
	
	function get_a_room(){
		$q = 'select id from room where max_std>stdcount and ROWNUM<2';
		$re = $this->db->query($q);
		if($re->num_rows()<=0)return  0;
		
		foreach($re->result() as $row){
			return $row->ID;
		}
	}
	
	function get_query($s){
		$q = $this->db->query($s);
		if($q->num_rows())return $q->result();
		return array();
	}
	
	function get_all_room_count(){
		$s = 'select * from room';
		$q = $this->db->query($s);
		return $q->num_rows();
		
	}
}

?>
