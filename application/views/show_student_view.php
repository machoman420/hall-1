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
		<a href="<?php echo site_url('student');?>/show" id="next" style="display:none" class="btn">Close</a>
		<a href="#" class="btn btn-success" id="delete-student"> Confirm &amp; delete </a>
		<a href="#" class="btn" data-dismiss="modal" id="close-btn">Cancel</a>
	</div>
</div>



<div class="span8">
	<?php if(!$students) echo '<p class="text-error">Invalid room id</p>';
	else {
		$sid =-1;
		foreach($students as $student){
			$sid = $student->ID;
			?>
	<table class="table table-striped table-bordered">
		<tbody>
			<tr>
				<td>Student type</td>
				<td><?php echo ucfirst($student->STYPE);?></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><?php echo ucfirst($student->NAME);?></td>
			</tr>
			<tr>
				<td>Student No</td>
				<td><?php echo $student->ID;?></td>
			</tr>
			<?php if($student->STYPE == 'resident'){?>
			<tr>
				<td>Room No</td>
				<td><?php if($student->ROOM==1) echo 'No room assigned yet.';else echo $student->ROOM;?></td>
			</tr>
			<?php } ?>
			<tr>
				<td>Department</td>
				<td><?php echo $student->DEPT;?></td>
			</tr>
			<?php if($student->STYPE!='alumni'){?>
			<tr>
				<td>Level</td>
				<td><?php echo $student->SLEVEL;?></td>
			</tr>
			<tr>
				<td>Term</td>
				<td><?php echo $student->TERM;?></td>
			</tr>
			<tr>
				<td>CGPA</td>
				<td><?php if($student->CGPA<=0) echo 'Not provided'; else  echo $student->CGPA;?></td>
			</tr>
			<?php } ?>
			<tr>
				<td>Contact No.</td>
				<td><?php if($student->CONTACT<=0) echo 'Not provided'; else echo $student->CONTACT;?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><?php echo $student->EMAIL;?></td>
			</tr>
			<tr>
				<td>Gurdian Contact No.</td>
				<td><?php  if($student->GURDIAN_CONTACT<=0) echo 'Not provided'; else echo $student->GURDIAN_CONTACT;?></td>
			</tr>
			<tr>
				<td>Permanent Address</td>
				<td><?php echo $student->PERMANENT_ADDRESS;?></td>
			</tr>
			<tr>
				<td>Current Address</td>
				<td><?php echo $student->CURRENT_ADDRESS;?></td>
			</tr>
			<tr>
				<td>Picture</td>
				<td><img style="max-height:300px;max-width:300px;" src="<?php echo base_url().$student->IMAGE;?>"></td>
			</tr>
		</tbody>
	</table>
		<?php } ?> 
	
	<div class="span3 offset6">
		<p>
			<a class="btn"  href="<?php echo site_url('student').'/update/'.$student->ID;?>">Update</a>
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
					$("#close-btn").attr("style","display:none");
					$("#next").attr("style","display:visible");
					mark = 0;
				}).fail(function(){
					$(".modal-body").html("Failed to delete the specified student");
					$("#delete-student").attr("disabled","");
					$("#close-btn").text("Close");
					});
			});
		
			
		});
</script>
	
</div>


<?php include('footer.php');?>
