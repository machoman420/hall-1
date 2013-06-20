<?php include('header.php');?>
<?php include('navbar.php');?>





<div class="span9 offset1"  id="content-area">
	<?php $tot = count($who);?>
	<h4 class="text-info">A total of <strong><?php echo $tot;?></strong> seat(s) assigned to <?php echo $tot;?> student(s)</h4>
	
	<div class="span7">
		<button class="btn pull-right" id="printbtn">Print Preview </button>
		<p></p>
		<table class="table table-striped table-bordered">
			<tbody>
				<tr>
					<th>Serial No</th>
					<th>Name</th>
					<th>Student ID</th>
					<th>Assigned Room</th>
				</tr>
				<?php for ($i = 0; $i < $tot; $i++)
				{ ?>
				<tr>
					<td><?php echo ($i+1);?></td>
					<td><?php echo ucfirst($name[$i]);?></td>
					<td><?php echo $who[$i];?></td>
					<td><?php echo $which[$i];?></td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
</div>




<script>
	$(document).ready(function(){
		$("#printbtn").click(function(){
			var w= window.open();
			var html = 	$("#content-area").html();
			$(w.document.body).html(html);
			});
		});
</script>



<?php include('footer.php');?>
