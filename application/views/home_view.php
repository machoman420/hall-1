<?php include('header.php');?>
<?php include('navbar.php');?>





<div class="span10 offset1"  id="content-area">
	<div class="row">
	<div class="span4" style="padding-top:50px;">
		<div class="well">
			<img src="<?php echo base_url();?>/images/logo.png">
		</div>
	</div>
	
	<div class="span5" style="padding-top:50px;">
		<table class="table table-bordered table-striped">
			<tbody>
				<tr>
					<td>Total Number of Rooms</td>
					<td><?php echo $tot;?></td>
				</tr>
				<tr>
					<td>Total Number of Seats</td>
					<td><?php echo $totseat;?></td>
				</tr>
				<tr>
					<td>Total Number of Available Seats</td>
					<td><?php echo $totavailable;?></td>
				</tr>
			</tbody>
		</table>
		<div style="padding-top:50px;"></div>
		<table class="table table-bordered table-striped">
			<tbody>
				<tr>
					<td>Total Number of Students</td>
					<td><?php echo $totstudent;?></td>
				</tr>
				<tr>
					<td>Attached Students</td>
					<td><?php echo $attached;?></td>
				</tr>
				<tr>
					<td>Resident Students</td>
					<td><?php echo $resident;?></td>
				</tr>
				<tr>
					<td>Alumni</td>
					<td><?php echo $alumni;?></td>
				</tr>
			</tbody>
		</table>
	</div>
	</div>
</div>


<?php include('footer.php');?>
