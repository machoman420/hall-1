<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="span5">
	<?php if(!$students) echo '<p class="text-error">Invalid room id</p>';
	else {
		foreach($students as $student){?>
	<table class="table table-striped table-bordered">
		<tbody>
			<tr>
				<td>Name</td>
				<td><?php echo $student->NAME;?></td>
			</tr>
			<tr>
				<td>Student No</td>
				<td><?php echo $student->ID;?></td>
			</tr>
			<tr>
				<td>Room No</td>
				<td><?php echo $student->ROOM;?></td>
			</tr>
			<tr>
				<td>Department</td>
				<td><?php echo $student->DEPT;?></td>
			</tr>
			<tr>
				<td>Level</td>
				<td><?php echo $student->SLEVEL;?></td>
			</tr>
			<tr>
				<td>Term</td>
				<td><?php echo $student->TERM;?></td>
			</tr>
			
		</tbody>
	</table>
	<?php } } ?>
</div>
