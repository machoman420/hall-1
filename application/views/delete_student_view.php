<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="span5">
	<?php if(!$students) echo '<p class="text-error">Invalid room id</p>';
	else {
		foreach($students as $student){?>
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
			
		</tbody>
	</table>
	<?php } } ?>
</div>
