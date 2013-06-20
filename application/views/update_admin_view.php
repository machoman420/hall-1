<?php include('header.php');?>
<?php include('navbar.php');?>





<div class="span8 offset1"  id="content-area">
	<form class="form-horizontal" action="<?php echo site_url('home');?>/check_update" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<legend>Update personal data</legend>
		<p class="text-info">All fields are required</p>
		<?php if(isset($success))echo '<p class="text-success">'.$success.'</p>'; ?>
		<?php if(isset($error))echo $error; ?>
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
		 
		<div class="control-group" id="div-">
			<label class="control-label" for="contact" >Contact No</label>
			<div class="span4">
				<input name="contact" id="contact" type="text" class="input-xlarge" <?php if(isset($contact))echo 'value="'.$contact.'"';?>/>
			</div>
			<p class="help-block" id="help-new2"></p>
		</div>
		
		<div class="control-group" id="div-">
			<label class="control-label" for="address" >Address</label>
			<div class="span4">
				<input name="address" id="address" type="text" class="input-xlarge" <?php if(isset($address))echo 'value="'.$address.'"';?>/>
			</div>
			<p class="help-block" id="help-new2"></p>
		</div>

		<div class="control-group" id="div-email">
			<label class="control-label" for="email" >Email</label>
			<div class="span4">
				<input name="email" id="email" type="text" class="input-xlarge" <?php if(isset($email))echo 'value="'.$email.'"';?>/>
			</div>
			<p class="help-block" id="help-new2"></p>
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
