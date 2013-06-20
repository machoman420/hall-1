<?php include('header.php');?>
<?php include('navbar.php');?>





<div class="span10"  id="content-area">
	
		
<div id="rconfirmation" class="modal hide fade in" style="display: none; ">
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



	
<div class="span4 pull-left">
	<h4 >Search results in rooms</h4>
	<table class="table table-striped table-bordered">
		<tbody>
			<tr>
				<th><a href="">Room No</a></th>
				<th><a href="" >Current no of students</a></th>
				<th><a href="" >Block</a></th>
				<th><a href="" >Floor</a></th>
				<th></th>
			</tr>
		<?php 
		if(!$rooms)echo '<p class="text-error">No results</p>';
		else
		foreach($rooms as $rm){ 
			if($rm->ID<2)continue;
		?>
			<tr style="border-top:2x #dddddd solid;">
				<td><a href="<?php echo site_url()?>" class="room" name="<?php echo $rm->ID;?>"><?php echo $rm->ID;?></a></td>
				<td><?php echo $rm->STDCOUNT;?></td>
				<td><?php echo $rm->RBLOCK;?></td>
				<td><?php echo $rm->RFLOOR;?></td>
				<td><a href="<?php echo site_url('room/update').'?id='.$rm->ID;?>" class="update" name="<?php echo $rm->ID;?>">Update</a></br><a href="#confirmation" data-toggle="modal" class="rdelete" name="<?php echo $rm->ID;?>">Delete</a></td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</div>




	
<div id="sconfirmation" class="modal hide fade in" style="display: none; ">
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





<div class="span4 pull-right">
	<h4 > Search results in students</h4>
	<table width="90%" class="table table-striped table-bordered">
		<tbody>
			<tr>
				<th><a href="" id="id">Name</a></th>
				<th><a href="" id="name">Student Id</a></a></th>
				<th><a href="" id="name">Student Type</a></a></th>
				<th><a href="" id="dept">Department</a></th>
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
				
				
				<td><?php echo $std->DEPT;?></td>
				<td><a href="<?php echo site_url('student/update').'/'.$std->ID;?>" class="update" name="<?php echo $std->ID;?>">Update</a></br><a href="#sconfirmation" data-toggle="modal" class="sdelete" name="<?php echo $std->ID;?>">Delete</a></td>
			</tr>
		<?php } }?>
		</tbody>
	</table>
</div>





<script>
	$(document).ready(function(){
		var a=0,b=0,c=0,d=0,e=0;
		
		
		$(".rdelete").click(function(){
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
		
		$(".sdelete").click(function(){
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
