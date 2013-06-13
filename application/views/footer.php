	<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
</div>

<div class="navbar">
	<p class="text-center muted">
		&copy; 2013 Hall management
	</p>
</div>
</div>
<script src="<?php echo base_url();?>assets/js/jquery.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-dropdown.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-modal.js"></script>
<script>
	$(document).ready(function(){
		$("#rm-create").click(function(){
			$.get("<?php echo site_url('room');?>/create",function(data){
				$("#content-area").html(data);
				});
			});
		
		$("#rm-list").click(function(){
			$.get("<?php echo site_url('room');?>/show",function(data){
				$("#content-area").html(data);
				});
		});
		
		$("#rm-update").click(function(){
			var rid = $("#rid").val();
			$.get("<?php echo site_url('room');?>/update?id="+rid,function(data){
				$("#content-area").html(data);
				});
		});
		
		$("#rm-delete").click(function(){
			$.get("<?php echo site_url('room');?>/show",function(data){
				$("#content-area").html(data);
				});
		});
		
		
		$("#std-list").click(function(){
			$.get("<?php echo site_url('student');?>/show",function(data){
				$("#content-area").html(data);
				});
		});
		
		
		$("#std-create").click(function(){
			$.get("<?php echo site_url('student');?>/create",function(data){
				$("#content-area").html(data);
				});
			});
		
		$("#std-update").click(function(){
			var sid=$("#sid").val();
			$.get("<?php echo site_url('student')?>/update/"+sid,function(data){
				$("#content-area").html(data);
				});
			});
		
		$("#std-delete").click(function(){
			$.get("<?php echo site_url('student');?>/show",function(data){
				$("#content-area").html(data);
				});
			});
		
		$("#std-swap").click(function(){
			$.get("<?php echo site_url('student')?>/swap",function(data){
				$("#content-area").html(data);
				});
			});
		
		$("#searchbtn").click(function(){
			
			var adrs="<?php echo site_url('search');?>";
			var qval = $("#squery").val();
			if(qval=='' || qval==null)qval='';
			if($("#in").val()=='student'){
				$.post(adrs+"/student",{
					'q':qval,
					'level':$("#level").val(),
					'term':$("#term").val(),
					},function(data,status){
						$("#content-area").html(data);
						//~ $("#squery").val(' ');
						}).fail(function(){alert('Sorry, failed to search');});
			}else{
				$.post(adrs+"/room",{
					'q':qval
					},function(data,status){
						$("#content-area").html(data);
						//~ $("#squery").val(' ');
						}).fail(function(){alert('Sorry, failed to search');});
			}
		});
		
			
		});
</script>


</body>
</html>
