<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div id="confirmation" class="modal hide fade in" style="display: none; ">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">×</a>
		<h3>Check and click confirm to delete</h3>
	</div>
	<div class="modal-body" style="max-width:600px">
		
	</div>
	<div class="modal-footer">
		<a href="#" class="btn btn-success" id="delete-student"> Confirm &amp; delete </a>
		<a href="#" class="btn" data-dismiss="modal" id="close-btn">Cancel</a>
	</div>
</div>





<div class="span10">
	<table width="90%" class="table table-striped">
		<tbody>
			<tr>
				<th><a href="#content-area" id="id">Name</a></th>
				<th><a href="#content-area" id="name">Student Id</a></a></th>
				<th><a href="#content-area" id="room">Room No</a></th>
				<th><a href="#content-area" id="dept">Department</a></th>
				<th><a href="#content-area" id="level">Level</a></th>
				<th><a href="#content-area" id="term">Term</a></th>
				<th></th>
			</tr>
		<?php 
		if(!isset($students) || !$students)echo '<p class="text-error">No results</p>';
		else{
		foreach($students as $std){ ?>
			<tr>
				<td><a href="#content-area" class="std" name="<?php echo $std->id;?>"><?php echo $std->name;?></a></td>
				<td><?php echo $std->id;?></td>
				<td><a href="#content-area" class="room-no" name="<?php echo $std->room;?>"><?php echo $std->room;?></a></td>
				<td><?php echo $std->dept;?></td>
				<td><?php echo $std->level;?></td>
				<td><?php echo $std->term;?></td>
				<td><a href="#content-area" class="update" name="<?php echo $std->id;?>">Update</a></br><a href="#confirmation" data-toggle="modal" class="delete" name="<?php echo $std->id;?>">Delete</a></td>
			</tr>
		<?php } }?>
		</tbody>
	</table>
</div>


<script>
	$(document).ready(function(){
		var a=0,b=0,c=0,d=0,e=0,f=0;
		var mark=0;
		$("#id").click(function(){
			var x="asc";
			if(a==1){
				a=0;
				x="asc";
			}else a=1;
			$.get("<?php echo site_url('student');?>/show?q=id&order="+x,function(data){
				$("#content-area").html(data);
				});
			});
			
		$("#name").click(function(){
			var x="asc";
			if(b==1){
				b=0;
				x="asc";
			}else b=1;
			$.get("<?php echo site_url('student');?>/show?q=name&order="+x,function(data){
				$("#content-area").html(data);
				});
			});
			
			
		$("#dept").click(function(){
			var x="asc";
			if(c==1){
				c=0;
				x="asc";
			}else c=1;
			$.get("<?php echo site_url('student');?>/show?q=dept&order="+asc,function(data){
				$("#content-area").html(data);
				});
			});
			
			
		$("#level").click(function(){
			var x="asc";
			if(d==1){
				d=0;
				x="asc";
			}else d=1;
			$.get("<?php echo site_url('student');?>/show?q=level&order="+asc,function(data){
				$("#content-area").html(data);
				});
			});
			
			
		$("#term").click(function(){
			var x="asc";
			if(e==1){
				e=0;
				x="asc";
			}else e=1;
			$.get("<?php echo site_url('student');?>/show?q=term&order="+asc,function(data){
				$("#content-area").html(data);
				});
			});
			
			
		$("#room").click(function(){
			var x="asc";
			if(f==1){
				f=0;
				x="asc";
			}else f=1;
			$.get("<?php echo site_url('student');?>/show?q=room&order="+asc,function(data){
				$("#content-area").html(data);
				});
			});
			
		$(".room-no").click(function(){
			var id = $(this).attr("name");
			$.get("<?php echo site_url('room')?>/show?id="+id,function(data){
				$("#content-area").html(data);
				});
				
			});
		
		$(".std").click(function(){
			var id = $(this).attr("name");
			$.get("<?php echo site_url('student');?>/show?id="+id,
				function(data){
					$("#content-area").html(data);
				});
			});
		
		$(".update").click(function(){
			var id = $(this).attr("name");
			$.get("<?php echo site_url('student');?>/update/"+id,
				function(data){
					$("#content-area").html(data);
				});
			});
		
		
		$(".delete").click(function(){
			var id = $(this).attr("name");
			$.get("<?php echo site_url('student');?>/show_delete?id="+id,
				function(data){
					if(data=='No students found with the provided id')mark =0;
					else mark = 1;
					$(".modal-body").html(data);
					$("#delete-student").attr("name",id);
				});
			});
		
		$("#delete-student").click(function(){
			if(mark==0)return;
			var sid = $(this).attr("name");
			$.get("<?php echo site_url('student');?>/delete?id="+sid,function(data){
					$(".modal-body").html(data);
					$("#delete-student").attr("disabled","");
					$("#close-btn").text("Close");
					mark = 0;
				});
			});
		
		$("#close-btn").click(function(){
			$.get("<?php echo site_url('student');?>/show",
				function(data){
					$("#content-area").html(data);
				});
			});
		
		
		});
</script>
