<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>


<div id="confirmation" class="modal hide fade in" style="display: none; ">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">×</a>
		<h3>Check and click confirm to delete</h3>
	</div>
	<div class="modal-body" style="max-width:600px">
		
	</div>
	<div class="modal-footer">
		<a href="#" class="btn btn-success" id="delete-room"> Confirm &amp; delete </a>
		<a href="#" class="btn" data-dismiss="modal" id="close-btn">Cancel</a>
	</div>
</div>





<div class="span10">
	
	<div class="span9"style="padding-left:70px;padding-bottom:10px;">
		<p><a  class="btn pull-right" href="<?php echo site_url('room');?>/export">Download All the data as Excel worksheet</a><p></p></p>
		
	</div>
	
	<table width="90%" class="table table-striped">
		<tbody>
			<tr>
				<th><a href="#content-area" id="rm-no">Room No</a></th>
				<th><a href="#content-area" id="mx-std">Max no of Students</a></th>
				<th><a href="#content-area" id="cur-std">Current no of sutdents</a></th>
				<th><a href="#content-area" id="block">Block</a></th>
				<th><a href="#content-area" id="floor">Floor</a></th>
				<th></th>
			</tr>
		<?php foreach($rooms as $rm){ ?>
			<tr style="border-top:2x #dddddd solid;">
				<td><a href="#content-area" class="room" name="<?php echo $rm->id;?>"><?php echo $rm->id;?></a></td>
				<td><?php echo $rm->max_std;?></td>
				<td><?php echo $rm->count;?></td>
				<td><?php echo $rm->block;?></td>
				<td><?php echo $rm->floor;?></td>
				<td><a href="#content-area" class="update" name="<?php echo $rm->id;?>">Update</a></br><a href="#confirmation" data-toggle="modal" class="delete" name="<?php echo $rm->id;?>">Delete</a></td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</div>


<script>
	$(document).ready(function(){
		var a=0,b=0,c=0,d=0,e=0;
		$("#rm-no").click(function(){
			var x="asc";
			if(a==1) {
				x="desc";
				a=0;
			}else a=1;
			$.get("<?php echo site_url('room');?>/show?q=id&order="+x,function(data){
				$("#content-area").html(data);
				});
			
			});
		
		$("#mx-std").click(function(){
			var x="asc";
			if(b==1) {
				x="desc";
				b=0;
			}else b=1;
			$.get("<?php echo site_url('room');?>/show?q=max_std&order="+x,function(data){
				$("#content-area").html(data);
				});
			});
		
		$("#cur-std").click(function(){
			var x="asc";
			if(c==1){
				 x="desc";
				 c=0;
			 }else c=1;
			$.get("<?php echo site_url('room');?>/show?q=count&order="+x,function(data){
				$("#content-area").html(data);
				});
			});
		
		$("#block").click(function(){
			var x="asc";
			if(d==1){
				 x="desc";
				 d=0;
			 }else d=1;
			$.get("<?php echo site_url('room');?>/show?q=block&order="+x,function(data){
				$("#content-area").html(data);
				});
			});
		
		$("#floor").click(function(){
			var x="asc";
			if(e==1) {
				x="desc";
				e=0;
			}else e=1;
			$.get("<?php echo site_url('room');?>/show?q=floor&order="+x,function(data){
				$("#content-area").html(data);
				});
			});
		
		$(".room").click(function(){
			var id= $(this).attr("name");
			$.get("<?php echo site_url('room');?>/show?id="+id,function(data){
				$("#content-area").html(data);
				});
			});
		
		$(".update").click(function(){
			var id= $(this).attr("name");
			$.get("<?php echo site_url('room');?>/update?id="+id,function(data){
				$("#content-area").html(data);
				});
			});
		
		$(".delete").click(function(){
			var id = $(this).attr("name");
			$.get("<?php echo site_url('room');?>/show_delete?id="+id,
				function(data){
					if(data=='No room was found with the provided id')mark =0;
					else mark = 1;
					$(".modal-body").html(data);
					$("#delete-room").attr("name",id);
				});
			});
		
		$("#delete-room").click(function(){
			if(mark==0)return;
			var sid = $(this).attr("name");
			$.get("<?php echo site_url('room');?>/delete?id="+sid,function(data){
					$(".modal-body").html(data);
					$("#delete-room").attr("disabled","");
					$("#close-btn").text("Close");
					mark = 0;
				});
			});
		
		$("#close-btn").click(function(){
			$.get("<?php echo site_url('room');?>/show",
				function(data){
					$("#content-area").html(data);
				});
			});
		
		
		
		
		});
</script>
