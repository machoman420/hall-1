<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="span5">
	<?php if(!$rooms) echo '<p class="text-error">Invalid room id</p>';
	else {
		foreach($rooms as $room){?>
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
					<table class="table">
						<tbody>
							<?php foreach($students as $student){?>
							<tr>
								<td><a href="<?php echo site_url('student').'/show?id='.$student->NAME;?>"><?php echo $student->NAME;?></a></td>
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
	<?php } } ?>
</div>



