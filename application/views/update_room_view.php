<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div id="confirmation" class="modal hide fade in" style="display: none; ">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">×</a>
		<h3>Check and click confirm to update</h3>
	</div>
	<div class="modal-body">
		<table class="table table-striped">
			<tbody>
				<tr>
					<td>Room no</td>
					<td id="crm"></td>
				</tr>
				<tr>
					<td>Max no of students</td>
					<td id="cstd"></td>
				</tr>
				<tr>
					<td>Floor</td>
					<td id="cfloor"></td>
				</tr>
				<tr>
					<td>Block</td>
					<td id="cblock"></td>
				</tr>
				<tr>
					<td>Tables</td>
					<td id="ctable"></td>
				</tr>
				<tr>
					<td>Chairs</td>
					<td id="cchair"></td>
				</tr>
				<tr>
					<td>Beds</td>
					<td id="cbed"></td>
				</tr>
				<tr>
					<td>Lockers</td>
					<td id="clocker"></td>
				</tr>
				<tr>
					<td>Lamps</td>
					<td id="clamp"></td>
				</tr>
			</tbody>
		</table>
		
		
		

	</div>
	<div class="modal-footer">
		<a href="#" class="btn btn-success" id="create-room" data-dismiss="modal"> Confirm &amp; update  </a>
		<a href="#" class="btn" data-dismiss="modal">Cancel</a>
	</div>
</div>





<div class="span7">
	<form class="form-horizontal" action="#" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<legend>Fill in the from to update the room</legend>
		<?php if(isset($message))echo '<p class="text-info">'.$message.'</p>'; ?>
		<div class="control-group">
			<label class="control-label" for="room-no" >Room no</label>
			<div class="span4">
				<input name="room-no" id="room-no" type="text" class="input-xlarge" value="<?php echo $room_no;?>"/>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="max-std" >No of maximum students</label>
			<div class="span4">
				<select name="max-std" id="max-std">
					<?php for($i=1;$i<=20;$i++){?>
					<option value="<?php echo $i;?>" <?php if($i==$max_std) echo 'selected="selected"';?>><?php echo $i;?></option>
					<?php } ?>
					<option value="1000">Gono room</option>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="block" >Block</label>
			<div class="span4">
				<select name="block" id="block">
					<option value="north" <?php if($block=='north')echo 'selected="selected"';?>>North</option>
					<option value="south" <?php if($block=='south')echo 'selected="selected"';?>>South</option>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="floor" >Floor</label>
			<div class="span4">
				<select name="floor" id="floor">
					<option value="0" <?php if($floor=='0')echo 'selected="selected"';?>>Ground</option>
					<option value="1" <?php if($floor=='1')echo 'selected="selected"';?>>1st</option>
					<option value="2" <?php if($floor=='2')echo 'selected="selected"';?>>2nd</option>
					<option value="3" <?php if($floor=='3')echo 'selected="selected"';?>>3rd</option>
					<option value="4" <?php if($floor=='4')echo 'selected="selected"';?>>4th</option>
					<option value="5" <?php if($floor=='5')echo 'selected="selected"';?>>5th</option>
					<option value="6" <?php if($floor=='6')echo 'selected="selected"';?>>6th</option>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="table" >No of tables</label>
			<div class="span4">
				<input name="table" id="table" type="text" class="input-xlarge" value="<?php echo $table;?>"/>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="chair" >No of chairs</label>
			<div class="span4">
				<input name="chair" id="chair" type="text" class="input-xlarge" value="<?php echo $chair;?>"/>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="bed" >No of beds</label>
			<div class="span4">
				<input name="bed" id="bed" type="text" class="input-xlarge" value="<?php echo $bed;?>"/>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="locker" >No of lockers</label>
			<div class="span4">
				<input name="locker" id="locker" type="text" class="input-xlarge" value="<?php echo $locker;?>"/>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="lamp" >No of lamps</label>
			<div class="span4">
				<input name="lamp" id="lamp" type="text" class="input-xlarge" value="<?php echo $lamp;?>"/>
			</div>
		</div>
	</form>
	<div class="form-actions"> 	
		<p><a data-toggle="modal" href="#confirmation" class="btn btn-primary" id="previewbtn">Update</a></p>
	</div>
</div>

<script>
	$(document).ready(function(){
		$("#previewbtn").click(function(){
			$("#crm").text($("#room-no").val());
			$("#cstd").text($("#max-std").val());
			$("#cfloor").text($("#floor").val());
			$("#cblock").text($("#block").val());
			$("#cbed").text($("#bed").val());
			$("#cchair").text($("#chair").val());
			$("#ctable").text($("#table").val());
			$("#clamp").text($("#lamp").val());
			$("#clocker").text($("#locker").val());
			});
		$("#create-room").click(function(){
			$.post("<?php echo site_url('room');?>/check_update",{
				room_no: $("#room-no").val(),
				block: $("#block").val(),
				rfloor: $("#floor").val(),
				max_std: $("#max-std").val(),
				bed: $("#bed").val(),
				locker: $("#locker").val(),
				lamp: $("#lamp").val(),
				chair: $("#chair").val(),
				table: $("#table").val()
				},function(data,status){
					$("#content-area").html(data);
					});
			});
		});
</script>

