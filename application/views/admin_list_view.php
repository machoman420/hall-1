<?php include('header.php');?>
<?php include('navbar.php');?>





<div class="span9 offset1"  id="content-area">
	<table class="table table-striped table-bordered">
		<tbody>
			<?php
			if(!$list)echo '<tr><td class="text-error">No admin found</td></tr>';
			else{ 
				?>
				<tr>
					<td>Name</td>
					<td>Designation</td>
					<td>Contact No</td>
					<?php if($alevel==3){?>
					<td>Authentication Level</td>
					<?php }?>
				</tr>
				<?php
				foreach($list as $ad){?>
			<tr>
				<td><?php echo ucfirst($ad->NAME);?></td>
				<td><?php echo $ad->DESIGNATION;?></td>
				<td><?php echo $ad->CONTACT_NO;?></td>
					<?php if($alevel==3){?>
				<td>
					<select  onchange="location = this.options[this.selectedIndex].value;" >
						<option  value="<?php echo site_url('home/change_auth').'?auth=2&id='.$ad->ID;?>" <?php if($ad->AUTH_LEVEL==2) echo 'selected="selected"';?>> Data Entry</option>
						<option value="<?php echo site_url('home/change_auth').'?auth=3&id='.$ad->ID;?>" <?php if($ad->AUTH_LEVEL==3) echo 'selected="selected"';?>>Super Admin</option>
					</select>
				</td>
				
					<?php }?>
			</tr>
			<?php
				}
			}
			?>
		</tbody>
	</table>
</div>


<?php include('footer.php');?>
