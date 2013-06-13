<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>




<div id="confirmation" class="modal hide fade in" style="display: none; ">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">×</a>
		<h3>Check and click confirm to add</h3>
	</div>
	<div class="modal-body">
			
	</div>
	<div class="modal-footer">
		<a href="#" class="btn btn-success" id="swap-student" data-dismiss="modal"> Confirm &amp; swap  </a>
		<a href="#" class="btn" data-dismiss="modal">Cancel</a>
	</div>
</div>







<div class="span10">
	<form class="form-horizontal" action="<?php echo site_url('student'); ?>/check_update" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<fieldset>
			<legend>Enter the students id's to swap them</legend>
			<p class="text-info"><?php if(isset($message))echo $message;?></p>
			<div class="control-group">
				<label class="control-label" for="name1" >ID of the 1st student</label>
				<div class="span4">
					<input name="name1" id="name1" type="text" class="input-xlarge" value="<?php echo $id1;?>"/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="name2" >ID of the 2nd student</label>
				<div class="span4">
					<input name="name2" id="name2" type="text" class="input-xlarge" value="<?php echo $id2;?>"/>
				</div>
			</div>
		</fieldset>
	</form>
	<div class="form-actions"> 
		<p><a data-toggle="modal" href="#confirmation" class="btn btn-primary" id="previewbtn">Swap</a></p>
	</div>
</div>




<script>
	$(document).ready(function(){
		var mark=0;
		$("#previewbtn").click(function(){
			var id1,id2;
			id1 = $("#name1").val();
			id2 = $("#name2").val();
			$.get("<?php echo site_url('student');?>/show_swap?s1="+id1+"&s2="+id2,function(data){
				if(data=='<p class="text-error">The student id was invalid or doesn\'t exist</p>')mark=0;
				else mark=1;
				$(".modal-body").html(data);
				});
			});
		
		$("#swap-student").click(function(){
			if(mark==0)return;
			$.post("<?php echo site_url('student')?>/check_swap",{
				s1:$("#name1").val(),
				s2:$("#name2").val()
				},function(data,status){
					$("#content-area").html(data);
					});
			});
				
		});
		
</script>
