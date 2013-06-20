<?php include('header.php');?>
<?php include('navbar.php');?>





<div class="span8 offset1"  id="content-area">
	<form class="form-horizontal" action="<?php echo site_url('home');?>/check_create" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<legend>Create Admin</legend>
		<?php if(isset($success))echo '<p class="text-success">'.$success.'</p>'; ?>
		<?php if(isset($error))echo $error; ?>
		<div class="control-group" id="div-id">
			<label class="control-label" for="id" >ID</label>
			<div class="span4">
				<input name="id" id="id" type="text" class="input-xlarge" <?php if(isset($name))echo 'value="'.$id.'"';?>/>
			</div>
		</div>
		<div class="control-group" id="div-name">
			<label class="control-label" for="name" >Name</label>
			<div class="span4">
				<input name="name" id="name" type="text" class="input-xlarge" <?php if(isset($name))echo 'value="'.$name.'"';?>/>
			</div>
		</div>
		<div class="control-group" id="div-desig">
			<label class="control-label" for="desig" >Designation</label>
			<div class="span4">
				<input name="desig" id="desig" type="text" class="input-xlarge" <?php if(isset($desig))echo 'value="'.$desig.'"';?>/>
			</div>
		</div>
		 
		<div class="control-group" id="div-contact">
			<label class="control-label" for="contact" >Contact No</label>
			<div class="span4">
				<input name="contact" id="contact" type="text" class="input-xlarge" <?php if(isset($contact))echo 'value="'.$contact.'"';?>/>
			</div>
			
		</div>
		
		<div class="control-group" id="div-address">
			<label class="control-label" for="address" >Address</label>
			<div class="span4">
				<textarea name="address" id="address" type="text" class="input-xlarge" ><?php if(isset($address))echo $address;?></textarea>
			</div>
			
		</div>

		<div class="control-group" id="div-email">
			<label class="control-label" for="email" >Email</label>
			<div class="span4">
				<input name="email" id="email" type="text" class="input-xlarge" <?php if(isset($email))echo 'value="'.$email.'"';?>/>
			</div>
			
		</div>
		
		<div class="control-group" id="div-auth">
			<label class="control-label" for="auth" >Authentication Level</label>
			<div class="span4">
				<select name="auth" class="input-xlarge">
					<option value="2">Data Entry</option>
					<option value="3">Super Admin</option>
				</select>
			</div>
			
		</div>
		
		
		
		 <div class="control-group" id="div-file" >
			<label class="control-label" >Picture</label>
			<div class="span3">
				<input type="hidden" name="MAX_FILE_SIZE" value="100000000000" />
				<p>  <input id="file_form" type="file" name="userfile"  size='31'/><br/></p>
			</div>
		</div>
			
		
		<div class="form-actions" >
			<input type="submit" name="submit" value="Submit" id="fsubmit" class="btn btn-primary" onclick="return docheck()">
		</div>
		
	</form>
</div>



<?php include('footer.php');?>
