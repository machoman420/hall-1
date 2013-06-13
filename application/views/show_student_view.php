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



<div class="span8">
	<?php if(!$students) echo '<p class="text-error">Invalid room id</p>';
	else {
		$sid =-1;
		foreach($students as $student){
			$sid = $student->id;
			?>
	<table class="table table-striped">
		<tbody>
			<tr>
				<td>Name</td>
				<td><?php echo $student->name;?></td>
			</tr>
			<tr>
				<td>Student No</td>
				<td><?php echo $student->id;?></td>
			</tr>
			<tr>
				<td>Room No</td>
				<td><?php echo $student->room;?></td>
			</tr>
			<tr>
				<td>Department</td>
				<td><?php echo $student->dept;?></td>
			</tr>
			<tr>
				<td>Level</td>
				<td><?php echo $student->level;?></td>
			</tr>
			<tr>
				<td>Term</td>
				<td><?php echo $student->term;?></td>
			</tr>
			<tr>
				<td>Contact No.</td>
				<td><?php echo $student->contact;?></td>
			</tr>
			<tr>
				<td>Address</td>
				<td><?php echo $student->address;?></td>
			</tr>
			<tr>
				<td>Picture</td>
				<td><img style="max-height:300px;max-width:300px;" src="<?php echo base_url().$student->image_path;?>"></td>
			</tr>
		</tbody>
	</table>
		<?php } ?> 
	
	<div class="row">
		<p>
			<button class="btn" id="update" href="#content-area">Update</button>
			<button class="btn" id="delete" href="#confirmation" data-toggle="modal">Delete</button>
		</p>
	</div>
	
	
	
	<?php } ?>
	
	
</div>


<script>
	$(document).ready(function(){
		
		var sid = <?php echo '"'.$sid.'"';?>;
			
		$("#update").click(function(){
			$.get("<?php echo site_url('student')?>/update/"+sid,function(data){
				$("#content-area").html(data);
				});
			});
			
		$("#delete").click(function(){
			$.get("<?php echo site_url('student');?>/show_delete?id="+sid,
				function(data){
					if(data=='No students found with the provided id')mark =0;
					else mark = 1;
					$(".modal-body").html(data);
					$("#delete-student").attr("name",sid);
				});
			});
		
		$("#delete-student").click(function(){
			if(mark==0)return;
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
