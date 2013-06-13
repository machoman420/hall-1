<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="span5">
	<?php if(!$rooms) echo '<p class="text-error">Invalid room id</p>';
	else {
		foreach($rooms as $room){?>
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
	<?php } } ?>
</div>



