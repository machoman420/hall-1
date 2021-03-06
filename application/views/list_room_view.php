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





<div class="span9">
	
	<div class="span8"style="padding-left:70px;padding-bottom:10px;">
		<p><a  class="btn btn-large btn-primary pull-right" href="<?php echo site_url('room');?>/export">Download All the data as Excel worksheet</a><p></p></p>
		
	</div>
	
	<table width="90%" class="table table-striped table-bordered">
		<tbody>
			<tr>
				<th><a href="<?php echo site_url('room').'/show?q=id&order=asc';?>" id="rm-no">Room No</a></th>
				<th><a href="<?php echo site_url('room');?>/show?q=max_std&order=asc" id="mx-std">Max no of Students</a></th>
				<th><a href="<?php echo site_url('room');?>/show?q=stdcount&order=asc" id="cur-std">Current no of students</a></th>
				<th><a href="<?php echo site_url('room');?>/show?q=rblock&order=asc" id="block">Block</a></th>
				<th><a href="<?php echo site_url('room');?>/show?q=rfloor&order=asc" id="floor">Floor</a></th>
				<th></th>
			</tr>
		<?php foreach($rooms as $rm){ 
			if($rm->ID<=1)continue;
			?>
			<tr style="border-top:2x #dddddd solid;">
				<td><a href="<?php echo site_url('room').'/show?id='.$rm->ID;?>" ><?php echo $rm->ID;?></a></td>
				<td><?php echo $rm->MAX_STD;?></td>
				<td><?php echo $rm->STDCOUNT;?></td>
				<td><?php echo ucfirst($rm->RBLOCK);?></td>
				<td><?php echo ucfirst($rm->RFLOOR);?></td>
				<td>
					<a href="<?php echo site_url('room').'/update?id='.$rm->ID;?>">Update</a></br>
					<a href="#confirmation" data-toggle="modal" class="delete" name="<?php echo $rm->ID;?>">Delete</a>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</div>


<script>
	$(document).ready(function(){
		var a=0,b=0,c=0,d=0,e=0;
		
		
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
