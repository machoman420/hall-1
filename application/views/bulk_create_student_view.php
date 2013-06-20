<?php include('header.php');?>
<?php include('navbar.php');?>





<div class="span9 offset1"  id="content-area">
	<div class="span9">
		<?php if(isset($success))echo '<p class="text-success">'.$success.'</p>'; ?>
		<form id="cform" class="well form-inline" action="<?php echo site_url('student'); ?>/check_bulk_create" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			<legend>Add severel stduents with default values</legend>
			<p class="text-info">All fields are required</p>
			<fieldset>
				<div style="padding:10px;" id="d0">
					<p>
					<input name="student_no[]" id="student-no" type="text" placeholder="Student ID"/>
					<input name="name[]" id="name" type="text" placeholder="Name"/>

					<select name="stype[]" >
						<option value="none"> Select Student Type</option>
						<option value="resident">Resident</option>
						<option value="attached">Attached</option>
						<option value="alumni">Alumni</option>
					</select>
					</p><p>
					<select name="dept[]">
						<option value="none" >Select department</option>
						<?php $lst =array('EEE','CSE','CE','ME','MME','NAME','ARCHI','IPE','URP','WRE','ChE');
						foreach($lst as $item){
						?>
						<option value="<?php echo $item; ?>" ><?php echo $item;?></option>
						<?php } ?>
					</select>
					<select name="level[]">
						<option value="-1" >Level</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					</select>
					<select name="term[]">
						<option value="-1">Term</option>
						<option value="1">1</option>
						<option value="2">2</option>
					</select>
					</p>
					<hr>
				</div>
				
				<div class="span3 offset5" style="padding-bottom:10px" id="where">
					<a class="btn btn-danger" id="removelast"><strong>-</strong> Remove Last</a>
					<a class="btn btn-success" id="addmore"><strong>+</strong> Add Another</a>
				</div>

					<input type="submit" value="Submit" name="submit" class="btn btn-large btn-info" onclick="return confirm('Create the students?')">

			</fieldset>
		</form>	
	</div>
</div>






<script>
	$(document).ready(function(){
		var str1 ='<div style="padding:10px;" id="d';
		var str2 = '"><p>\
					<input name="student_no[]" id="student-no" type="text" placeholder="Student ID"/>\
					<input name="name[]" id="name" type="text" placeholder="Name"/>\
					<select name="stype[]" >\
						<option value="none">Select Student Type</option>\
						<option value="resident">Resident</option>\
						<option value="attached">Attached</option>\
						<option value="alumni">Alumni</option>\
					</select>\
					</p><p>\
					<select name="dept[]">\
						<option value="none" >Select department</option>\
						<?php $lst =array('EEE','CSE','CE','ME','MME','NAME','ARCHI','IPE','URP','WRE','ChE');
						foreach($lst as $item){
						?>
						<option value="<?php echo $item; ?>" ><?php echo $item;?></option>\
						<?php } ?>
					</select>\
					<select name="level[]">\
						<option value="-1" >Level</option>\
						<option value="1">1</option>\
						<option value="2">2</option>\
						<option value="3">3</option>\
						<option value="4">4</option>\
					</select>\
					<select  name="term[]">\
						<option value="-1">Term</option>\
						<option value="1">1</option>\
						<option value="2">2</option>\
					</select>\
					</p>\
					<hr>\
				</div>';
		var cnt = 1;
		$("#addmore").click(function(){
			$("#where").before(str1+cnt+str2);
			cnt++;
			});
			
		$("#removelast").click(function(){
			if(cnt==1)return;
			$("#d"+(cnt-1)).remove();
			cnt--;
			});
			
		});
		
		
</script>


<?php include('footer.php');?>
