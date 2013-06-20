<?php include('header.php');?>
<?php include('navbar.php');?>





<div class="span6 offset1"  d="content-area">
	<h3>Your Profile</h3>
	<table class="table table-striped table-bordered">
		<tbody>
			<?php $id=-1;
			if(!$info) echo ' <tr ><td class="text-error">Invalid admin id</td></tr>';else{ 
				foreach($info as $i){
					$id=$i->ID;
				?>
			<tr>
				<td>ID</td>
				<td><?php echo $id;?></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><?php echo ucfirst($i->NAME);?></td>
			</tr>
			<tr>
				<td>Designation</td>
				<td><?php echo $i->DESIGNATION;?></td>
			</tr>
			<tr>
				<td>Contact No</td>
				<td><?php echo $i->CONTACT_NO;?></td>
			</tr>
			<tr>
				<td>Address</td>
				<td><?php echo $i->ADDRESS;?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><?php echo $i->EMAIL;?></td>
			</tr>
			<tr>
				<td>Image</td>
				<td><img src="<?php echo base_url().$i->IMAGE;?>" style="max-height:300px;max-width:300px;"></td>
			</tr>
			<?php }  }?>
		</tbody>
	</table>
	<?php if($id!=-1){ ?>
	<div class="span6" >
		<p class="pull-right">
		<a class="btn btn-primary" href="<?php echo site_url('home/update');?>">Update </a>
		<a class="btn" href="<?php echo site_url('home/change_password');?>">Change password</a>
		</p>
	</div>
	<?php }  ?>
	
</div>


<?php include('footer.php');?>
