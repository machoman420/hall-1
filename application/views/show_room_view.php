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
	<?php if(!$rooms) echo '<p class="text-error">Invalid room id</p>';
	else {
		$rid=-1;
		foreach($rooms as $room){
			$rid = $room->id;
			?>
	<table class="table table-striped">
		<tbody>
			<tr>
				<td>Room No</td>
				<td><?php echo $room->id;?></td>
			</tr>
			<tr>
				<td>Block</td>
				<td><?php echo $room->block;?></td>
			</tr>
			<tr>
				<td>Floor</td>
				<td><?php echo $room->floor;?></td>
			</tr>
			<tr>
				<td>Max students</td>
				<td><?php echo $room->max_std;?></td>
			</tr>
			<tr>
				<td>No. of students</td>
				<td><?php echo $room->count;?></td>
			</tr>
			<tr>
				<td>Students</td>
				<td>
					<?php if(!$students)echo 'No students alloted currently';else{?>
					<table class="table">
						<tbody>
							<?php foreach($students as $student){?>
							<tr>
								<td><a href="#" name="<?php echo $student->id;?>" class="std"><?php echo $student->name;?></a></td>
								<td><?php echo $student->id;?></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td>Tables</td>
				<td><?php echo $room->table;?></td>
			</tr>
			<tr>
				<td>Chairs</td>
				<td><?php echo $room->chair;?></td>
			</tr>
			<tr>
				<td>Beds</td>
				<td><?php echo $room->bed;?></td>
			</tr>
			<tr>
				<td>Lockers</td>
				<td><?php echo $room->locker;?></td>
			</tr>
			<tr>
				<td>Lamps</td>
				<td><?php echo $room->lamp;?></td>
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
		$(".std").click(function(){
			var id = $(this).attr("name");
			$.get("<?php echo site_url('student');?>/show?id="+id,
				function(data){
					$("#content-area").html(data);
				});
			});
		var rid = <?php echo '"'.$rid.'"';?>;
		
		
		$("#update").click(function(){
			$.get("<?php echo site_url('room');?>/update?id="+rid,function(data){
				$("#content-area").html(data);
				});
			});
		
		
		
		$("#delete").click(function(){
			$.get("<?php echo site_url('room');?>/show_delete?id="+rid,
				function(data){
					if(data=='No room was found with the provided id')mark =0;
					else mark = 1;
					$(".modal-body").html(data);
					$("#delete-room").attr("name",rid);
				});
			});
		
		$("#delete-room").click(function(){
			if(mark==0)return;
			$.get("<?php echo site_url('room');?>/delete?id="+rid,function(data){
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
