
<div id="search" class="modal hide fade in" style="display:none">
	<div class="modal-header">
		<h3>Search</h3>
	</div>
	<div class="modal-body">
		<form class="well" method="post" accept-charset="utf-8" style="background:#ffffff;border:#ffffff;">
			<label>Search for</label>
			<input name="sq" id="squery" type="text" class="input-xlarge"/>
			<label>In</label>
			<select name="in" id="in">
				<option value="student" selected="selected">Student</option>
				<option value="room">Room</option>
			</select>
			<label>Level</label>
			<select name="level">
				<option value="0" selected="selected">Any</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
			</select>
			<label>Term</label>
			<select name="level">
				<option value="0" selected="selected">Any</option>
				<option value="1">1</option>
				<option value="2">2</option>
			</select>
			<p></p>
			
		</form>
	</div>
	<div class="modal-footer">
		<button class="btn" id="searchbtn" data-dismiss="modal">Submit</button>
	</div>
</div>



<div class="navbar nabar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<ul class="nav">
				<li class="active"><a class="brand" herf="#">Hall management</a></li>
			</ul>
			<ul class="nav">
				<li><a href="<?php echo base_url();?>">Home</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						Student
						 <b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#content-area" id="std-list">Student List</a></li>
						<li><a href="#content-area" id="std-create">Add student</a></li>
						<li><a href="#content-area" id="std-delete">Delete Student</a></li>
						<li><a href="#updateStudent" data-toggle="modal">Update </a></li>
						<li><a href="#content-area" id="std-swap">Swap Students</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						Room
						 <b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#content-area" id="rm-list">Room List</a></li>
						<li><a href="#content-area" id="rm-create">Create Room</a></li>
						<li><a href="#content-area" id="rm-delete">Clear Room</a></li>
						<li><a href="#updateRoom" data-toggle="modal">Update </a></li>
					</ul>
				</li>
			</ul>
			<ul class="nav pull-right">
				<li><a href="#search" data-toggle="modal">Search</a></li>
				<li><a href="<?php echo site_url('home');?>/logout">Logout</a></li>
			</ul>
		</div>
	</div>
</div>


