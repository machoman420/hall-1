<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php include('header.php');?>
<?php include('navbar.php');?>
<?php if(!isset($sort))$sort='all';?>
<?php if(!isset($order))$order='name';?>


<div class="span10"  id="content-area">
	
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





<div class="span10">
	<div class="span10">
		<h4 >Filters: </h4><p></p>
		<ul class="nav nav-pills">  
	
		<li <?php if($sort=='all') echo 'class="active"';?>><a href="<?php echo site_url('student');?>/show" >All students</a></li>
		<li <?php if($sort=='attached') echo 'class="active"';?>><a href="<?php echo site_url('student');?>/show/attached">Attached students</a></li>
		<li <?php if($sort=='resident') echo 'class="active"';?>><a href="<?php echo site_url('student');?>/show/resident">Resident students</a></li>
		<li <?php if($sort=='alumni') echo 'class="active"';?>><a href="<?php echo site_url('student');?>/show/alumni">Alumni students</a></li>
		<li <?php if($sort=='unassigned') echo 'class="active"';?>><a href="<?php echo site_url('student');?>/show/unassigned">Resident students with unassigned rooms</a></li>
		</ul>
	</div>
	<div class="span9" style="padding-left:70px;padding-bottom:10px;">
		<p><a  class="btn btn-large btn-primary pull-right" href="<?php echo site_url('student').'/export/'.$sort.'?order='.$order;?>">Download All the data as Excel worksheet</a><p></p></p>
		
	</div>
	<table width="90%" class="table table-striped table-bordered">
		<tbody>
			<tr>
				<th><a href="<?php echo site_url('student').'/show/'.$sort.'?order=name';?>" id="id">Name</a></th>
				<th><a href="<?php echo site_url('student').'/show/'.$sort.'?order=id';?>" id="name">Student Id</a></th>
				<th><a href="<?php echo site_url('student').'/show/'.$sort.'?order=stype';?>" id="stype">Student type</a></th>
				<th><a href="<?php echo site_url('student').'/show/'.$sort.'?order=room';?>" id="room">Room No</a></th>
				<th><a href="<?php echo site_url('student').'/show/'.$sort.'?order=dept';?>" id="dept">Department</a></th>
				<th><a href="<?php echo site_url('student').'/show/'.$sort.'?order=slevel';?>" id="level">Level</a></th>
				<th><a href="<?php echo site_url('student').'/show/'.$sort.'?order=term';?>" id="term">Term</a></th>
				<?php if($sort=='alumni'){?>
				<th><a href="<?php echo site_url('student').'/show/'.$sort.'?order=gdate';?>" id="gdate">Graduation Date</a></th>
				<?php } ?>
				<th></th>
			</tr>
		<?php foreach($students as $std){ ?>
			<tr>
				<td><a href="<?php echo site_url('student').'/show?id='.$std->ID; ?>" ><?php echo ucfirst($std->NAME);?></a></td>
				<td><?php echo $std->ID;?></td>
				<td><?php echo ucfirst($std->STYPE);?></td>
				<td>
					<?php if($std->ROOM>1){?>
					<a href="<?php echo site_url('room');?>/show?id=<?php echo $std->ROOM;?>" name="<?php echo $std->ROOM;?>"><?php echo $std->ROOM;?></a>
					<?php } else if($std->ROOM==1) echo 'No room assigned yet';
					else { echo 'Non-resident';} ?>
				</td>
				<td><?php echo $std->DEPT;?></td>
				<td><?php if($std->SLEVEL<=0) echo 'N/A'; else echo $std->SLEVEL;?></td>
				<td><?php if($std->TERM<=0) echo 'N/A'; else echo $std->TERM;?></td>
				<?php if($sort=='alumni'){?>
				<td><?php echo $std->GRAD_DATE;?></td>
				<?php } ?>
				<td><a href="<?php echo site_url('student').'/update/'.$std->ID;?>" name="<?php echo $std->ID;?>">Update</a></br><a href="#confirmation" data-toggle="modal" class="delete" name="<?php echo $std->ID;?>">Delete</a></td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</div>


<script>
	$(document).ready(function(){
		
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
