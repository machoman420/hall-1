<?php include('header.php');?>
<?php include('navbar.php');?>





<div class="span8 offset1"  id="content-area">
	<form class="form-horizontal" action="<?php echo site_url('home');?>/check_password" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<legend>Change password</legend>
		<?php if(isset($success))echo '<p class="text-success">'.$success.'</p>'; ?>
		<?php if(isset($error))echo $error; ?>
		<div class="control-group" id="div-old">
			<label class="control-label" for="old" >Old Password</label>
			<div class="span4">
				<input name="old" id="old" type="password" class="input-xlarge" <?php if(isset($passold))echo 'value="'.$passold.'"';?>/>
			</div>
		</div>
		<div class="control-group" id="div-new1">
			<label class="control-label" for="new1" >New Password</label>
			<div class="span4">
				<input name="new1" id="new1" type="password" class="input-xlarge" <?php if(isset($passnew))echo 'value="'.$passnew.'"';?>/>
			</div>
		</div>
		 
		<div class="control-group" id="div-new2">
			<label class="control-label" for="new2" >Re-enter new password</label>
			<div class="span4">
				<input name="new2" id="new2" type="password" class="input-xlarge" <?php if(isset($passnew))echo 'value="'.$passnew1.'"';?>/>
			</div>
			<p class="help-block" id="help-new2"></p>
		</div>
		
		
		<div class="form-actions" >
			<input type="submit" name="submit" value="Submit" id="fsubmit" class="btn btn-primary" onclick="return docheck()">
		</div>
		
	</form>
</div>



<script>
	$(document).ready(function(){
		var mark=0;
		function check(){
			if($("#new1").val()!=$("#new2").val()){
				$("#div-new2").addClass("error");
				$("#help-new2").html("<p class=\"text-error\">Passwords do not match</p>");
				mark = 0;
			}else {
				$("#div-new2").addClass("success");
				$("#help-new2").html("<p class=\"text-success\">Passwords matched</p>");
				mark = 1;
			}
		}
		
		$("#new1").change(function(){
			check();
			});
		$("#new2").change(function(){
			check();
			});
		
		$("#old")change(function(){
			if($("#old").val()=='' && $("#old").val()==null)mark=0;
			alert('hic');
			});
			
		
		
		function docheck(){
			if(mark==0){
				alert("Please Correct the errors");
				return false;
			}
			if($("#old").val()=='' || $("#old").val()==null){
				$("#div-old").addClass("error");
				mark = 0;
				return false;
			}
			return true;
		}
		
		});
		
		
</script>



<?php include('footer.php');?>
