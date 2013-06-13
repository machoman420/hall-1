<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Room_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function insert($data){
		$this->db->insert('room',$data);
	}
	
	function update($id,$data){
		$this->db->where('id',$id);
		$this->db->update('room',$data);
	}
	
	function  delete($id){
		$this->db->where('id',$id);
		$this->db->delete('room');
	}
	
	function get_available_room_list(){
		$s = 'select id from room where max_std>count';
		$q = $this->db->query($s);
		if($q->num_rows()>0)return $q->result();
		return array();
	}
	
	function get_all(){
		$s = 'select * from room';
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
		$s = 'select * from room where id='.$id.' and max_std>count';
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
		$data['count']=$this->get_cur_count($id)+1;
		$this->db->where('id',$id);
		$this->db->update('room',$data);
	}
	
	function remove_student($id){
		$data=array();
		$data['count']=$this->get_cur_count($id)-1;
		$this->db->where('id',$id);
		$this->db->update('room',$data);
	}
	
	
	function get_room($id){
		$s = 'select * from room where id="'.$id.'" limit 1';
		$q = $this->db->query($s);
		if($q->num_rows())return $q->result();
		return array();
	}
	
	
	function check_max($id,$cmax){
		$s = 'select * from room where id='.$id.' and count<='.$cmax;
		$q = $this->db->query($s);
		if($q->num_rows()>0)return true;
		return false;
	}
	
	
	function allocated($id){
		$s = 'select count from room where id='.$id.' and count>0';
		$q = $this->db->query($s);
		if($q->num_rows()>0)return true;
		return false;
	}
	
	
	function get_rooms_like($id){
		$this->db->select('*');
		$this->db->like('id',$id,'after');
		$this->db->from('room');
		$q = $this->db->get();
		if($q->num_rows()>0)return $q->result();
		return false;
	}
}

?>
