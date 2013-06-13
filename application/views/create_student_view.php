<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>


<div id="confirmation" class="modal hide fade in" style="display: none; ">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">×</a>
		<h3>Check and click confirm to add</h3>
	</div>
	<div class="modal-body">
			<table width="90%" class="table table-striped">
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
		<a href="#" class="btn btn-success" id="add-student" data-dismiss="modal"> Confirm &amp; add  </a>
		<a href="#" class="btn" data-dismiss="modal">Cancel</a>
	</div>
</div>




<div class="span7">
	<form class="form-horizontal" action="<?php echo site_url('student'); ?>/check_create" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<legend>Fill in the from to add a student</legend>
		<p class="text-info"><?php if(isset($message))echo $message;?></p>
		<div class="control-group">
			<label class="control-label" for="name" >Name of the student</label>
			<div class="span4">
				<input name="name" id="name" type="text" class="input-xlarge" value="<?php echo $name;?>"/>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="student-no" >Student no</label>
			<div class="span4">
				<input name="student-no" id="student-no" type="text" class="input-xlarge" value="<?php $sid;?>"/>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="dept" >Department</label>
			<div class="span4">
				<select name="dept" id="dept">
				<?php $lst =array('EEE','CSE','CE','ME','MME','NAME','ARCHI','IPE','URP','WRE','ChE');
				foreach($lst as $item){
				?>
				<option value="<?php echo $item; ?>" <?php if($item==$dept)echo 'selected="selected"';?>><?php echo $item;?></option>
				<?php } ?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="level" >Level</label>
			<div class="span3">
				<select id="level" name="level">
					<option value="1" <?php if($level==1)echo 'selected="selected"';?>>1</option>
					<option value="2" <?php if($level==2)echo 'selected="selected"';?>>2</option>
					<option value="3" <?php if($level==3)echo 'selected="selected"';?>>3</option>
					<option value="4" <?php if($level==4)echo 'selected="selected"';?>>4</option>
					<option value="5" <?php if($level==5)echo 'selected="selected"';?>>5</option>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="term" >Term</label>
			<div class="span3">
				<select id="term" name="term">
					<option value="1" <?php if($term==1)echo 'selected="selected"';?>>1</option>
					<option value="2"<?php if($term==2)echo 'selected="selected"';?>>2</option>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="room" >Room No.</label>
			<div class="span3">
				<select name="room" id="room">
					<?php 
					foreach($rooms as $item){
						echo '<option value="'.$item->id.'" ';
						if($room==$item)echo 'selected="selected"';
						echo '>'.$item->id.'</option>';
						}?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="contact" >Contact No.</label>
			<div class="span3">
				<input name="contact" id="contact" type="text" class="input-xlarge" value="<?php echo $contact;?>"/>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="address" >Address</label>
			<div class="span3">
				<textarea name="address" id="address" type="text"><?php echo $address;?></textarea>
			</div>
		</div>
		 <div class="control-group"  >
                <label class="control-label" >Picture</label>
                <div class="span3">
                    <input type="hidden" name="MAX_FILE_SIZE" value="100000000000" />
                    <p>  <input id="file_form" type="file" name="userfile"  size='18'/><br/></p>
                </div>
            </div>
	</form>
	<div class="form-actions"> 
		<p><a data-toggle="modal" href="#confirmation" class="btn btn-primary" id="previewbtn">Create</a></p>
	</div>
</div>


<script>
	$(document).ready(function(){
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
			var data = new FormData();
			jQuery.each($("#file_form")[0].files,function(i,file){
				data.append('userfile',file);
				});
			data.append('name',$("#name").val());
			data.append('dept',$("#dept").val());
			data.append('level',$("#level").val());
			data.append('term',$("#term").val());
			data.append('contact',$("#contact").val());
			data.append('room',$("#room").val());
			data.append('id',$("#student-no").val());
			data.append('address',$("#address").val());
			
			$.ajax({
				url:"<?php echo site_url('student')?>/check_create",
				data: data,
				cache: false,
				contentType: false,
				processData: false,
				type: 'POST',
				success: function(data){
					$("#content-area").html(data)
					}
				});
			});
			
		});
		
</script>
