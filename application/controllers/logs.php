<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Logs extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('log_model');
	}
	
	
	function student($s){
		if($s=='update'){
			$file = 'student_update_log.xls';    
			header("Content-type: application/vnd.ms-excel");
			header("Content-Disposition: attachment; filename=$file");
			$v = $this->log_model->get_student_update();
			echo '<table>';
			echo '<tbody>';
			echo '<tr><td>Date</td><td>User</td><td>Detail</td></tr>';
			foreach($v as $t){
				echo '<tr>';
				echo '<td>'.$t->UNAME.'</td>';
				echo '<td>'.$t->UPDATE_DATE.'</td>';
				echo '<td>'.$t->MAINLOG.'</td>';
				echo '</tr>';
			}
			echo '</tbody>';
			echo '</table>';
		}else if($s=='insert'){
			$file = 'student_insert_log.xls';    
			header("Content-type: application/vnd.ms-excel");
			header("Content-Disposition: attachment; filename=$file");
			$v = $this->log_model->get_student_insert();
			echo '<table>';
			echo '<tbody>';
			echo '<tr><td>Date</td><td>User</td><td>Detail</td></tr>';
			foreach($v as $t){
				echo '<tr>';
				echo '<td>'.$t->UNAME.'</td>';
				echo '<td>'.$t->INSERT_DATE.'</td>';
				echo '<td>'.$t->MAINLOG.'</td>';
				echo '</tr>';
			}
			echo '</tbody>';
			echo '</table>';
		}else echo '404 : not found';
	}
	
	
	function room($s){
		if($s=='update'){
			$file = 'room_update_log.xls';    
			header("Content-type: application/vnd.ms-excel");
			header("Content-Disposition: attachment; filename=$file");
			$v = $this->log_model->get_room_update();
			echo '<table>';
			echo '<tbody>';
			echo '<tr><td>Date</td><td>User</td><td>Detail</td></tr>';
			foreach($v as $t){
				echo '<tr>';
				echo '<td>'.$t->UNAME.'</td>';
				echo '<td>'.$t->UPDATE_DATE.'</td>';
				echo '<td>'.$t->MAINLOG.'</td>';
				echo '</tr>';
			}
			echo '</tbody>';
			echo '</table>';
		}else if($s=='insert'){
			$file = 'room_insert_log.xls';    
			header("Content-type: application/vnd.ms-excel");
			header("Content-Disposition: attachment; filename=$file");
			$v = $this->log_model->get_room_insert();
			echo '<table>';
			echo '<tbody>';
			echo '<tr><td>Date</td><td>User</td><td>Detail</td></tr>';
			foreach($v as $t){
				echo '<tr>';
				echo '<td>'.$t->UNAME.'</td>';
				echo '<td>'.$t->UPDATE_DATE.'</td>';
				echo '<td>'.$t->MAINLOG.'</td>';
				echo '</tr>';
			}
			echo '</tbody>';
			echo '</table>';
		}else echo '404 : not found';
	}
}
