<?php include('header.php');?>
<?php include('navbar.php');?>





<div id="updateStudent" class="modal hide fade in" style="display:none">
	
	<div class="modal-header">
		<h3>Update Student</h3>
	</div>
	<div class="modal-body">
		<form class="well" method="post" accept-charset="utf-8" style="background:#ffffff;border:#ffffff;">
			<label>Enter Student id</label>
			<input name="sid" id="sid" type="text" class="input-xlarge"/>
		</form>
	</div>
	<div class="modal-footer">
		<button class="btn"  id="std-update" data-dismiss="modal">Search and Update</button>
	</div>
</div>

<!-- test-->

<div id="updateRoom" class="modal hide fade in" style="display:none">
	
	<div class="modal-header">
		<h3>Update Room</h3>
	</div>
	<div class="modal-body">
		<form class="well" method="post" accept-charset="utf-8" style="background:#ffffff;border:#ffffff;">
			<label>Enter Room No</label>
			<input name="rid" id="rid" type="text" class="input-xlarge"/>
		</form>
	</div>
	<div class="modal-footer">
		<button class="btn"  id="rm-update" data-dismiss="modal">Search and Update</button>
	</div>
</div>



<div class="span12"  id="content-area">
	
</div>


<?php include('footer.php');?>
