
<div id="updateStudent" class="modal hide fade in" style="display:none">
	
	<div class="modal-header">
		<h3>Update Student</h3>
	</div>
	<div class="modal-body">
		<form class="well" method="get" accept-charset="utf-8" style="background:#ffffff;border:#ffffff;" action="<?php echo site_url('student')?>/update">
			<label>Enter Student id</label>
			<input name="id" type="text" class="input-xlarge"/>
			<p></p>
			<input type="submit" class="btn" value="Search and Update"/>
		</form>
	</div>	
</div>

<div id="updateRoom" class="modal hide fade in" style="display:none">
	
	<div class="modal-header">
		<h3>Update Room</h3>
	</div>
	<div class="modal-body">
		<form class="well" method="get" accept-charset="utf-8" style="background:#ffffff;border:#ffffff;" action="<?php echo site_url('room');?>/update">
			<label>Enter Room No</label>
			<input name="id"  type="text" class="input-xlarge"/>
			<p></p>
			<input type="submit" class="btn" value="Search and Update"/>
		</form>
	</div>
	
</div>

<div id="search" class="modal hide fade in" style="display:none">
	<div class="modal-header">
		<h3>Search<a class="pull-right" href="" data-dismiss="modal">x</a></h3>
	</div>
	<div class="modal-body">
		<form class="well" method="get" accept-charset="utf-8" style="background:#ffffff;border:#ffffff;" action="<?php echo site_url('search')?>">
			<label>Search for</label>
			<input name="q" id="squery" type="text" class="input-xlarge"/>
			<label>In</label>
			<select name="in" id="in">
				<option value="any" selected="selected">Any</option>
				<option value="student" >Student</option>
				<option value="room">Room</option>
			</select>
			<div id="inner"></div>
			<p></p>
			<button type="submit" name="submit" class="btn btn-primary pull-right" value="submit" >Submit</button>
		</form>
	</div>

</div>








<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<ul class="nav">
				<li class="active"><a class="brand" herf="#" style="font-family:Comic Sans, Comic Sans MS, cursive">Hall management</a></li>
			</ul>
			<ul class="nav">
				<li><a href="<?php echo base_url();?>" style="color:#ffffff">Home</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"  style="color:#ffffff">
						Student
						 <b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo site_url('student');?>/show" id="std-list">Student List</a></li>
						<li><a href="<?php echo site_url('student'); ?>/create">Add student</a></li>
						<li><a href="<?php echo site_url('student'); ?>/bulk_create">Create Multiple Students</a></li>
						<li><a href="<?php echo site_url('student');?>/show">Delete Student</a></li>
						<li><a href="#updateStudent" data-toggle="modal">Update </a></li>
						<li><a href="<?php echo site_url('student');?>/swap">Swap Students</a></li>
						<li><a href="<?php echo site_url('student');?>/assign">Assign to rooms</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#ffffff">
						Room
						 <b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo site_url('room');?>/show" >Room List</a></li>
						<li><a href="<?php echo site_url('room');?>/showempty" >List of empty seats</a></li>
						<li><a href="<?php echo site_url('room');?>/create">Create Room</a></li>
						<li><a href="<?php echo site_url('room');?>/bulk_create">Create Multiple Rooms</a></li>
						<li><a href="<?php echo site_url('room');?>/show" >Delete Room</a></li>
						<li><a href="#updateRoom" data-toggle="modal">Update </a></li>
					</ul>
				</li>
				<li class="dropdown">
<!--
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#ffffff">
						Mess
						 <b class="caret"></b>
					</a>
-->
<!--
					<ul class="dropdown-menu">
						<li><a href="<?
							//php echo site_url('mess');
						?>/create">Create New Mess Session</a></li>
						
					</ul>
-->
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#ffffff">
						Settings
						 <b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo site_url('home');?>/view">View Profile</a></li>
						<li><a href="<?php echo site_url('home');?>/update">Update Profile</a></li>
						<li><a href="<?php echo site_url('home');?>/change_password">Change Password</a></li>
						<?php if($alevel==3){?>
						<li><a href="<?php echo site_url('home');?>/create">Create Another Admin</a></li>
						<li><a href="<?php echo site_url('home/show_list');?>">Show Admin List</a></li>
						<?php }?>
					</ul>
				</li>
			</ul>
			<ul class="nav pull-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#ffffff">
						Export logs as Excel
						 <b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo site_url('logs');?>/student/insert">Student insert log</a></li>
						<li><a href="<?php echo site_url('logs');?>/student/update">Student update log</a></li>
						<li><a href="<?php echo site_url('logs');?>/room/insert">Room insert log</a></li>
						<li><a href="<?php echo site_url('logs');?>/room/update">Room update log</a></li>
						
					</ul>
				</li>
				<li><a href="#search" data-toggle="modal" style="color:#ffffff">Search</a></li>
				<li><a href="<?php echo site_url('home');?>/logout" style="color:#ffffff">Logout</a></li>
			</ul>
		</div>
	</div>
</div>

<div style="min-height:50px"></div>




