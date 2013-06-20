<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php include('header.php');?>
<?php include('navbar.php');?>



<div class="span9 offset1"  id="content-area">

<div id="confirmation" class="modal hide fade in" style="display: none; ">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">×</a>
		<h3>Check and click confirm to delete</h3>
	</div>
	<div class="modal-body" style="max-width:600px">
		
	</div>
	<div class="modal-footer">
		<a href="<?php echo site_url('room');?>/show" class="btn" id="next" style="display:none">Close</a>
		<a href="#" class="btn btn-success" id="delete-room"> Confirm &amp; delete </a>
		<a href="#" class="btn" data-dismiss="modal" id="close-btn">Cancel</a>
	</div>
</div>



<div class="span6">
	<?php if(!$rooms) echo '<p class="text-error">Invalid room id</p>';
	else {
		$rid=-1;
		foreach($rooms as $room){
			$rid = $room->ID;
			?>
	<table class="table table-striped table-bordered">
		<tbody>
			<tr>
				<td>Room No</td>
				<td><?php echo $room->ID;?></td>
			</tr>
			<tr>
				<td>Block</td>
				<td><?php echo $room->RBLOCK;?></td>
			</tr>
			<tr>
				<td>Floor</td>
				<td><?php echo $room->RFLOOR;?></td>
			</tr>
			<tr>
				<td>Max students</td>
				<td><?php echo $room->MAX_STD;?></td>
			</tr>
			<tr>
				<td>No. of students</td>
				<td><?php echo $room->STDCOUNT;?></td>
			</tr>
			<tr>
				<td>Students</td>
				<td>
					<?php if(!$students)echo 'No students alloted currently';else{?>
					<table class="table table-striped table-bordered">
						<tbody>
							<?php foreach($students as $student){?>
							<tr>
								<td><a href="<?php echo site_url('student').'/show?id='.$student->ID;?>"><?php echo $student->NAME;?></a></td>
								<td><?php echo $student->ID;?></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td>Tables</td>
				<td><?php echo $room->TABLECOUNT;?></td>
			</tr>
			<tr>
				<td>Chairs</td>
				<td><?php echo $room->CHAIRCOUNT;?></td>
			</tr>
			<tr>
				<td>Beds</td>
				<td><?php echo $room->BEDCOUNT;?></td>
			</tr>
			<tr>
				<td>Lockers</td>
				<td><?php echo $room->LOCKERCOUNT;?></td>
			</tr>
			<tr>
				<td>Lamps</td>
				<td><?php echo $room->LAMPCOUNT;?></td>
			</tr>
			
		</tbody>
	</table>
		<?php } ?> 
			
	<div class="span3 offset4">
		<p>
			<a class="btn" href="<?php echo site_url('room').'/update?id='.$room->ID;?>">Update</a>
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
					$("#close-btn").attr("style","display:none");
					$("#next").attr("style","display:visible");
					mark = 0;
				}).fail(function(){
					$(".modal-body").html("Failed to delete. Try again later.");
					$("#delete-room").attr("disabled","");
					$("#close-btn").text("Close");
					});
			});
		
		
		
		
		});
</script>

</div>


<?php include('footer.php');?>

