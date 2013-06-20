	<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
</div>

<div class="navbar">
		<hr>
	<p class="text-center muted">
		&copy; 2013 Hall management
	</p>
</div>
</div>
<script>
	$(document).ready(function(){
		
		var s = '<label>Department</label>\
			<select name="dept" id="search-dept">\
				<option value="any" selected="selected">Any</option>\
				<option value="EEE" >EEE</option>\
				<option value="CSE" >CSE</option>\
				<option value="CE" >CE</option>\
				<option value="ME" >ME</option>\
				<option value="MME" >MME</option>\
				<option value="NAME" >NAME</option>\
				<option value="ARCHI" >ARCHI</option>\
				<option value="IPE" >IPE</option>\
				<option value="URP" >URP</option>\
				<option value="WRE" >WRE</option>\
				<option value="ChE" >ChE</option>\
			</select>\
			<label>Level</label>\
			<select name="level" id="search-level">\
				<option value="any" selected="selected">Any</option>\
				<option value="1">1</option>\
				<option value="2">2</option>\
				<option value="3">3</option>\
				<option value="4">4</option>\
				<option value="5">5</option>\
			</select>\
			<label>Term</label>\
			<select name="term" id="search-term">\
				<option value="any" selected="selected">Any</option>\
				<option value="1">1</option>\
				<option value="2">2</option>\
			</select>';
		var s2='<label>Block</label>\
				<select name="block" id="block">\
					<option value="any">Any</option>\
					<option value="north" >North</option>\
					<option value="south" >South</option>\
				</select>\
				<label>Floor</label>\
				<select name="floor" id="floor">\
					<option value="any">Any</option>\
					<option value="0" >Ground</option>\
					<option value="1" >1st</option>\
					<option value="2" >2nd</option>\
					<option value="3" >3rd</option>\
					<option value="4" >4th</option>\
					<option value="5" >5th</option>\
					<option value="6" >6th</option>\
				</select>';
		$("#std-delete").click(function(){
			$.get("<?php echo site_url('student');?>/show",function(data){
				$("#content-area").html(data);
				});
			});
		
		$("#in").change(function(){
			if($("#in").val()=='student'){
				$("#inner").html(s).slideDown('slow');
			}else if($("#in").val()=='room'){
				$("#inner").html(s2);
				}else$("#inner").html("");
			});
		
		
			
		});
</script>


</body>
</html>
