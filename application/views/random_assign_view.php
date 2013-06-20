<?php include('header.php');?>
<?php include('navbar.php');?>



<div class="span10">
	
	
<div class="span6"  id="content-area">
	<?php if(isset($message)) echo '<p class="text-error">'.$message.'</p>'?>
	<form id="create-form" action="<?php echo site_url('student'); ?>/check_assign" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<?php 
		if(!$students){
			echo '<p class="text-error">No unassigned students</p>';
			$students = array();
		} ?>
		<table class="table table-striped table-bordered">
			<tbody>
				<tr>
				<th>Name </th>
				<th>Student ID</th>
				<th></th>
				</tr>
		<?php 
			foreach($students as $std){
		?>
		<tr>
			<td><?php echo ucfirst($std->NAME);?></td>
			<td><?php echo $std->ID;?></td>
			<td><input type="checkbox" name='students[]' value='<?php echo $std->ID;?>'></td>
		</tr>
		
		<?php } ?>
			</tbody>
		</table>
		<input type="submit" class="btn pull-right" name="submit" value="Assign random rooms"/>
	</form>
</div>


<div class="span3 offset6" style="position:fixed">
		<p class="text-info">Total number of avaiable seats is<strong> <?php echo $total;?></strong></p>
		<p class="text-info">If you select more then <?php echo $total;?> students, <strong>only  <?php echo $total;?> students will be assigned.</strong></p>
		<p class="text-success" id="show-count"></p>
</div>



</div>

<script>
	$(document).ready(function(){
		
		var countChk = function(){
			var n = $( "input:checked" ).length;
			$("#show-count").html("<strong>"+n+"</strong> students selected so far");
		};
		
		countChk();
		
		$("input[type=checkbox]").on('click',countChk);
		});
</script>



<?php include('footer.php');?>
