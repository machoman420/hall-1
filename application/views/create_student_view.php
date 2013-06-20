<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php include('header.php');?>
<?php include('navbar.php');?>




<div id="confirmation" class="modal hide fade in" style="display: none; ">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">×</a>
		<h3>Check and click confirm to add</h3>
	</div>
	<div class="modal-body">
			<table width="90%" class="table table-striped table-bordered">
				<tbody>
					<tr>
						<td width="50%">Name</td>
						<td id="cname"></td>
					</tr>
					<tr>
						<td width="50%">Student ID</td>
						<td id="cid"></td>
					</tr>
					<tr>
						<td width="50%">Department</td>
						<td id="cdept"></td>
					</tr>
					<tr>
						<td width="50%">Level</td>
						<td id="clevel"></td>
					</tr>
					<tr>
						<td width="50%">Term</td>
						<td id="cterm"></td>
					</tr>
					<tr>
						<td width="50%">Room No</td>
						<td id="croom"></td>
					</tr>
					<tr>
						<td width="50%"	>Contact No</td>
						<td id="ccontact"></td>
					</tr>
					<tr>
						<td width="50%"	>Address</td>
						<td id="caddress"></td>
					</tr>
				</tbody>
			</table>
		
	</div>
	<div class="modal-footer">
		<a  class="btn btn-success" id="add-student" data-dismiss="modal"> Confirm &amp; add  </a>
		<a href="#" class="btn" data-dismiss="modal">Cancel</a>
	</div>
</div>



<div class="span9 offset1"  id="content-area">
	<p id="hic"></p>
	<div class="span7">
		<form id="create-form" class="form-horizontal" action="<?php echo site_url('student'); ?>/check_create" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			<legend>Fill in the from to update</legend>
			<p class="text-info">* marked fields are required</p>
			<p class="text-info"><?php if(isset($message))echo $message;?></p>
			<div class="control-group" id="div-stype">
				<label class="control-label" for="style" >*** Student Type</label>
				<div class="span3">
					<select id="stype" name="stype" class="input-xlarge">
						<option value="none" <?php if($stype=='none')echo 'selected="selected"';?>>-----------</option>
						<option value="resident" <?php if($stype=='resident')echo 'selected="selected"';?>>Resident</option>
						<option value="attached" <?php if($stype=='attached')echo 'selected="selected"';?>>Attached</option>
						<option value="alumni" <?php if($stype=='alumni')echo 'selected="selected"';?>>Alumni</option>
					</select>
				</div>
			</div>
			<div class="control-group" id="div-std">
				<label class="control-label" for="student-no" >*** Student no</label>
				<div class="span4">
					<input name="student-no" id="student-no" type="text" class="input-xlarge" value="<?php $sid;?>"/>
				</div>
			</div>
			<div class="control-group" id="div-name">
				<label class="control-label" for="name" >*** Name of the student</label>
				<div class="span4">
					<input name="name" id="name" type="text" class="input-xlarge" value="<?php echo $name;?>"/>
				</div>
			</div>
			<div class="control-group" id="div-dept">
				<label class="control-label" for="dept" >*** Department</label>
				<div class="span4">
					<select name="dept" id="dept" class="input-xlarge">
					<option value="none" <?php if($dept=='') echo 'selected="selected"';?>>------------</option>
					<?php $lst =array('EEE','CSE','CE','ME','MME','NAME','ARCHI','IPE','URP','WRE','ChE');
					foreach($lst as $item){
					?>
					<option value="<?php echo $item; ?>" <?php if($item==$dept)echo 'selected="selected"';?>><?php echo $item;?></option>
					<?php } ?>
					</select>
				</div>
			</div>
			<div id="all"></div>
			<div class="control-group" id="div-cgpa">
				<label class="control-label" for="cgpa" >Cgpa</label>
				<div class="span3">
					<input name="cgpa" id="cgpa" type="text" class="input-xlarge" value="<?php echo $cgpa;?>"/>
				</div>
			</div>
			
			
			<div class="control-group" id="div-contact">
				<label class="control-label" for="contact" >Contact No.</label>
				<div class="span3">
					<input name="contact" id="contact" type="text" class="input-xlarge" value="<?php echo $contact;?>"/>
				</div>
			</div>
			<div class="control-group" id="div-gcontact">
				<label class="control-label" for="gcontact" >Gurdian Contact No.</label>
				<div class="span3">
					<input name="gcontact" id="gcontact" type="text" class="input-xlarge" value="<?php echo $gcontact;?>"/>
				</div>
			</div>
			<div class="control-group" id="div-paddress">
				<label class="control-label" for="paddress" >Permanent Address</label>
				<div class="span3">
					<textarea name="paddress" id="paddress" type="text" class="input-xlarge"><?php echo $paddress;?></textarea>
				</div>
			</div>
			<div class="control-group" id="div-caddress">
				<label class="control-label" for="caddress" >Current Address</label>
				<div class="span3">
					<textarea name="caddress" id="caddress" type="text" class="input-xlarge"><?php echo $caddress;?></textarea>
				</div>
			</div>
			
			<div class="control-group" id="div-email">
				<label class="control-label" for="email" >Email</label>
				<div class="span3">
					<input name="email" id="email" type="text" class="input-xlarge" value="<?php echo $email;?>">
				</div>
			</div>
			
			 <div class="control-group" id="div-file" >
					<label class="control-label" >Picture</label>
					<div class="span3">
						<input type="hidden" name="MAX_FILE_SIZE" value="100000000000" />
						<p>  <input id="file_form" type="file" name="userfile"  size='31'/><br/></p>
					</div>
			</div>
			
			
			<div class="form-actions" style="display:none"> 
				<p><input type="submit" value="Submit" name="submit" id="sub-btn"></p>
			</div>
			
			
		</form>
		<div class="form-actions"> 
			<p><a data-toggle="modal" href="#confirmation" class="btn btn-primary" id="previewbtn">Create</a></p>
		</div>
	</div>

</div>


<script>
	
	$(document).ready(function(){
		var mark =true;
		var depts ={};
		depts['05']='CSE';
		depts['10']='ME';
		depts['06']='EEE';
		depts['08']='IPE';
		depts['16']='WRE';
		depts['15']='URP';
		depts['12']='NAME';
		depts['01']='ARCHI';
		depts['04']='CE';
		depts['02']='ChE';
		depts['11']='MME';
		//dynamic form controll functions
		
		var part1='<div class="control-group" id="div-level">\
				<label class="control-label" for="level" >*** Level</label>\
				<div class="span3">\
					<select id="level" name="level" class="input-xlarge">\
						<option value="-1" <?php if($level=='')echo 'selected="selected"';?>>-----------</option>\
						<option value="1" <?php if($level==1)echo 'selected="selected"';?>>1</option>\
						<option value="2" <?php if($level==2)echo 'selected="selected"';?>>2</option>\
						<option value="3" <?php if($level==3)echo 'selected="selected"';?>>3</option>\
						<option value="4" <?php if($level==4)echo 'selected="selected"';?>>4</option>\
					</select>\
				</div>\
			</div>\
			<div class="control-group" id="div-term">\
				<label class="control-label" for="term" >*** Term</label>\
				<div class="span3">\
					<select id="term" name="term" class="input-xlarge">\
						<option value="none" <?php if($term=='')echo 'selected="selected"';?>>-----------</option>\
						<option value="1" <?php if($term==1)echo 'selected="selected"';?>>1</option>\
						<option value="2"<?php if($term==2)echo 'selected="selected"';?>>2</option>\
					</select>\
				</div>\
			</div>';
		
		
		
		
		$("#stype").change(function(){
			if($("#stype").val()=='none') $("#all").html("");
			if($("#stype").val()=='resident'){
				var part2='<div class="control-group" id="div-room">\
				<label class="control-label" for="room" >Room No.</label>\
				<div class="span3">\
					<select name="room" id="room" class="input-xlarge">\
						<option value="none" <?php if($room=='')echo 'selected="selected"';?>>---------</option>\
						<?php 
						foreach($rooms as $item){
						?>
						<option value="<?php echo $item->ID; ?>" <?php if($room==$item)echo 'selected="selected"';?>> <?php echo $item->ID; ?></option>\
						<?php 	} ?>
					</select>\
				</div>\
			</div>';
				$("#all").html(part1+part2).fadeIn('slow');
			}else if($("#stype").val()=='alumni'){
				$("#all").html('<div class="control-group" id="div-gdate">\
				<label class="control-label" for="gdate" >*** Graduation date</label>\
				<div class="span3">\
					<div id="dp" class="input-append date">\
						<input class="dp input-xlarge" name="gdate" <?php if(isset($gdate)) echo 'value="'.$gdate.'"';?>/>\
					</div>\
				</div>\
			</div>').fadeIn('slow');
			$(".dp").datepicker();
			}else if($("#stype").val()=='attached'){
				$("#all").html(part1).fadeIn('slow');
			}
			});
		
		
		
		
		$("#student-no").change(function(){
			var no = $("#student-no").val();
		
			if(no.length!=7)$("#div-std").addClass("error");
			else{	
				var dept = $("#student-no").val().substr(2,2);
				if(!(dept in depts)){
					$("#div-std").addClass("error");
				}else{	
					$("#dept").val(depts[dept]);
					$("#div-std").removeClass("error");
				}
			}
			});
		
		$("#dept").change(function(){
			if($("#dept").val()=='ARCHI'){
				$("#level").append('<option value="5" <?php if($level==5)echo 'selected="selected"';?>>5</option>');
			}else {
				if($("#level option:last").val()=='5')
				$("#level option:last").remove();
			}
			});
		
		
		$("#previewbtn").click(function(){
			$("#cname").text($("#name").val());
			$("#cid").text($("#student-no").val());
			$("#cdept").text($("#dept").val());
			$("#clevel").text($("#level").val());
			$("#cterm").text($("#term").val());
			$("#croom").text($("#room").val());
			$("#ccontact").text($("#contact").val());
			$("#caddress").text($("#address").val());
			});
		
		
		
		
		$("#add-student").click(function(){
			//if(validate() && mark)
			$("#sub-btn").click();
			//else alert('Please correct the errors first');
			});
		
		function validate(){
			var mm = true;
			if($("#stype").val()=='none'){
				$("#div-stype").addClass("error");
				return  false;
			}else if($("#stype").val()=='resident'){
				validate_common();
				if(!is_neum($("#room").val())){
					$("#div-room").addClass("error");
					mm = false;
				}
			}else if($("#stype").val()=='attached'){
				validate_common();
			}else if($("#stype").val()=='alumni'){
				validate_common();
				if($("#gdate").val()=='' || $("#gdate").val()==null){
					$("#div-gdate").addClass("error");
				}
			}
			return mm;
		}
		
		function chk_lt(){
			var mm = true;
			if($("#level").val()=='none'){
				mm=false;
				$("#div-level").addClass("error");
			}
			if($("#term").val()=='none'){
				mm=false;
				$("#div-term").addClass("error");
			}
			return mm;
		}
		
		function validate_common(){
			var mm = true;
			if(!is_neum($("#student-no").val())){
				$("#div-std").addClass("error");
			}
			if($("#dept").val()=='none'){
				$("#div-dept").addClass("error");
			}
			if(!is_email($("#email").val())){
				mm = false;
				$("#div-email").addClass("error");
			}
			if(!is_alphaneu("#name")){
				mm = false;
				$("#div-name").addClass("error");
			}
			
			
			if(!is_neum("#cgpa")){
				mm = false;
				$("#div-cgpa").addClass("error");
			}
			
			if(!is_neum("#contact")){
				mm = false;
				$("#div-contact").addClass("error");
			}
			
			if(!is_neum("#gcontact")){
				mm = false;
				$("#div-gcontact").addClass("error");
			}
			if(!is_neum("#student-no")){
				mm = false;
				$("#div-std").addClass("error");
			}
			return mm;
		}
		
		

		
		});
		
</script>






<?php include('footer.php');?>
