<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php include('header.php');?>
<?php include('navbar.php');?>




<div id="confirmation" class="modal hide fade in" style="display: none; ">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">×</a>
		<h3>Check and click confirm to create</h3>
	</div>
	<div class="modal-body">
		<table class="table table-striped">
			<tbody>
				<tr>
					<td>Start room no</td>
					<td id="csrm"></td>
				</tr>
				<tr>
					<td>End room no</td>
					<td id="cerm"></td>
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
		<a  class="btn btn-success" id="create-room" data-dismiss="modal"> Confirm &amp; create  </a>
		<a href="#" class="btn" data-dismiss="modal">Cancel</a>
	</div>
</div>


<div class="span9 offset1">
	<form class="form-horizontal" action="<?php echo site_url('room');?>/check_bulk" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<legend>Fill in the from to create room</legend>
		<?php if(isset($success))echo '<p class="text-success">'.$success.'</p>'; ?>
		<?php if(isset($error))echo '<p class="text-error">'.$error.'</p>'; ?>
		<div class="control-group" id="div-sroom">
			<label class="control-label" for="sroom" >Start room no</label>
			<div class="span4">
				<input name="sroom" id="sroom" type="text" class="input-xlarge"/>
			</div>
		</div>
		<div class="control-group" id="div-eroom">
			<label class="control-label" for="eroom" >Last room no</label>
			<div class="span4">
				<input name="eroom" id="eroom" type="text" class="input-xlarge" />
			</div>
		</div>
		<legend>Default values to be used</legend>
		<div class="control-group" id="div-max-std">
			<label class="control-label" for="max-std" >No of maximum students</label>
			<div class="span4">
				<input name="max-std" id="max-std" type="text" class="input-xlarge" value="4"/>
			</div>
		</div>
		<div class="control-group" id="div-block">
			<label class="control-label" for="block" >Block</label>
			<div class="span4">
				<select name="block" id="block">
					<option value="none">------------</option>
					<option value="north">North</option>
					<option value="south">South</option>
				</select>
			</div>
		</div>
		<div class="control-group" id="div-floor">
			<label class="control-label" for="floor" >Floor</label>
			<div class="span4">
				<select name="floor" id="floor">
					<option value="none">--------</option>
					<option value="1">Ground</option>
					<option value="2">1st</option>
					<option value="3">2nd</option>
					<option value="4">3rd</option>
					<option value="5">4th</option>
					<option value="6">5th</option>
					<option value="7">6th</option>
				</select>
			</div>
		</div>
		<div class="control-group" id="div-table">
			<label class="control-label" for="table" >No of tables</label>
			<div class="span4">
				<input name="table" id="table" type="text" class="input-xlarge" value="4"/>
			</div>
		</div>
		<div class="control-group" id="div-chair">
			<label class="control-label" for="chair" >No of chairs</label>
			<div class="span4">
				<input name="chair" id="chair" type="text" class="input-xlarge" value="4"/>
			</div>
		</div>
		<div class="control-group" id="div-bed">
			<label class="control-label" for="bed" >No of beds</label>
			<div class="span4">
				<input name="bed" id="bed" type="text" class="input-xlarge" value="4"/>
			</div>
		</div>
		<div class="control-group" id="div-locker">
			<label class="control-label" for="locker" >No of lockers</label>
			<div class="span4">
				<input name="locker" id="locker" type="text" class="input-xlarge" value="4"/>
			</div>
		</div>
		<div class="control-group" id="div-lamp">
			<label class="control-label" for="lamp" >No of lamps</label>
			<div class="span4">
				<input name="lamp" id="lamp" type="text" class="input-xlarge" value="4"/>
			</div>
		</div>
		<div class="form-actions" style="display:none" >
			<input type="submit" name="submit" value="Submit" id="fsubmit"  >
		</div>
	</form>
	<div class="form-actions"> 	
		<p><a data-toggle="modal" href="#confirmation" class="btn btn-primary" id="previewbtn">Create</a></p>
	</div>
</div>

<script>
	$(document).ready(function(){
		
		
		$("#sroom").change(function(){
			var x = $("#sroom").val().substr(0,1);
			$("#floor").val(x);
			$("#eroom").val(x);
			});
		
		
		$("#previewbtn").click(function(){
		//	if(!validate())return;
			$("#cerm").text($("#eroom").val());
			$("#csrm").text($("#sroom").val());
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
			$("#fsubmit").click();
			});
			
			
		function validate(){
			var m=true;
			var x=$("#sroom").val();
			if(!is_neum(x)){
				$("#div-sroom").addClass("error");
				m=false;
			}
			x=$("#eroom").val();
			if(!is_neum(x)){
				$("#div-eroom").addClass("error");
				m=false;
			}
			x=$("#table").val();
			if(!is_neum(x)){
				$("#div-ctable").addClass("error");
				m=false;
			}
			x=$("#chair").val();
			if(!is_neum(x)){
				$("#div-chair").addClass("error");
				m=false;
			}
			x=$("#locker").val();
			if(!is_neum(x)){
				$("#div-lamp").addClass("error");
				m=false;
			}
			x=$("#lamp").val();
			if(!is_neum(x)){
				$("#div-lamp").addClass("error");
				m=false;
			}
			x=$("#floor").val();
			if(x=='none'){
				$("#div-floor").addClass("error");
				m=false;
			}
			x=$("#block").val();
			if(x=='none'){
				$("#div-block").addClass("error");
				m=false;
			}
			
			return m;
		}
		
		
		});
</script>







<?php include('footer.php');?>
