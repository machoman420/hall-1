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
		<a href="#" class="btn btn-success" id="delete-student"> Confirm &amp; delete </a>
		<a href="#" class="btn" data-dismiss="modal" id="close-btn">Cancel</a>
	</div>
</div>





<div class="span10">
	<table width="90%" class="table table-striped table-bordered">
		<tbody>
			<tr>
				<th><a href="" id="id">Name</a></th>
				<th><a href="" id="name">Student Id</a></a></th>
				<th><a href="" id="name">Student Type</a></a></th>
				<th><a href="" id="room">Room No</a></th>
				<th><a href="" id="dept">Department</a></th>
				<th><a href="" id="level">Level</a></th>
				<th><a href="" id="term">Term</a></th>
				<th></th>
			</tr>
		<?php 
		if(!isset($students) || !$students)echo '<p class="text-error">No results</p>';
		else{
		foreach($students as $std){ ?>
			<tr>
				<td><a href="<?php echo site_url('student/show').'?id='.$std->ID;?>" class="std" name="<?php echo $std->ID;?>"><?php echo ucfirst($std->NAME);?></a></td>
				<td><?php echo $std->ID;?></td>
				<td><?php echo ucfirst($std->STYPE);?></td>
				<?php 
				if($std->ROOM>1){
					?>
				<td><a href="<?php echo site_url('room').'/show?id='.$std->ROOM;?>" ><?php echo $std->ROOM;?></a></td>
				<?php } else if($std->ROOM==1)
				echo '<td>Unassigned</td>';
				else echo '<td>N/A</td>'; ?>
				
				<td><?php echo $std->DEPT;?></td>
				<?php
				if($std->STYPE=='alumni') echo '<td>N/A</td><td>N/A</td>';
				else{ ?>
				<td><?php echo $std->SLEVEL;?></td>
				<td><?php echo $std->TERM;?></td>
				<?php } ?>
				<td><a href="<?php echo site_url('student/update').'/'.$std->ID;?>" class="update" name="<?php echo $std->ID;?>">Update</a></br><a href="#confirmation" data-toggle="modal" class="delete" name="<?php echo $std->ID;?>">Delete</a></td>
			</tr>
		<?php } }?>
		</tbody>
	</table>
</div>





	
</div>


<?php include('footer.php');?>



