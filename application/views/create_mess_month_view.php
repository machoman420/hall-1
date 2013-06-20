<?php  
	//if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>
<?php include('header.php');?>
<?php include('navbar.php');?>

<div class=" span9 offset1">
<form class="form-horizontal" action="<?php echo site_url('mess');?>/check_create" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	<legend>
		Fill the following form to create a new Mess Month.
	</legend>
	<?php if(isset($error)) echo $error;?>
	<?php if(isset($success)) echo $success;?>
		<div class="control-group">
			<label class="control-label" for="mess_month_no" >Mess Month no</label>
			<div class="span4">
				<select name="mess_month_no" id="mess_month_no">
					<?php for($i=1;$i<=12;$i++){?>
						<option value="<?php echo $i;?>"> <?php echo $i;?></option>
					<?php } ?>
				</select>
			</div>
		</div>

		<div class='control-group'>
			<label class='control-label' for='charge'> Charge amount</label>
			<div class='span4'>
				<input class='input-xlarge' name="charge" type='text' id='charge' <?php if(isset($CHARGE_AMOUNT)) echo 'value="'.$CHARGE_AMOUNT.'"';else echo "value='1200'";?>/>
			</div>
		</div>	
		<div class='control-group'>
			<label class='control-label' for='mess_start_date'> Mess start date</label>
			<div class='span4'>
				<input class='input-xlarge date' name="mess_start_date" type='date' id='mess_start_date' <?php if(isset($START_DATE)) echo 'value="'.$START_DATE.'"';?>/>
			</div>
		</div>	
		<div class='control-group'>
			<label class='control-label' for='mess_end_date'> Mess end date</label>
			<div class='span4'>
				<input class='input-xlarge' type='date' name="mess_end_date" id='mess_end_date' <?php if(isset($FINISH_DATE)) echo 'value="'.$FINISH_DATE.'"';?>/>
			</div>
		</div>		
		<div class='control-group'>
			<label class='control-label' for='fine-start'> Fine start date</label>
			<div class='span4'>
				<input class='input-xlarge' type='date' id='fine-start' name="fine-start" <?php if(isset($FINE_START_DATE)) echo 'value="'.$FINE_START_DATE.'"';?>/>
			</div>
		</div>		
		<div class='control-group'>
			<label class='control-label' for='mess_delay_fine_per_date'> Mess delay fine per day</label>
			<div class='span4'>
				<input class='input-xlarge' type='text' name="mess_delay_fine_per_date" id='mess_delay_fine_per_date' <?php if(isset($FINE_PER_DAY)) echo 'value="'.$FINE_PER_DAY.'"';?>/>
			</div>
		</div>
		<div class="form-actions span4" style="display:none" >
			<input type="submit" name="submit" value="Submit" id="mess_mon_submit"  >
		</div>


</form>
<div class="form-actions"> 	
		<p><a data-toggle="modal" href="#confirmation_mess_month" class="btn btn-primary" id="previewbtn_mess_month">Create</a></p>
	</div>
</div>

<div id="confirmation_mess_month" class="modal hide fade in" style="display: none; ">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">×</a>
		<h3>Check and click confirm to create</h3>
	</div>
	<div class="modal-body">
		<table class="table table-striped">
			<tbody>
				<tr>
					<td>Mess Month no</td>
					<td id="cmess_month_no"></td>
				</tr>
				<tr>
					<td>Charge amount</td>
					<td id="ccharge_amount"></td>
				</tr>
				<tr>
					<td>Fine start Date</td>
					<td id="cfine_start_date"></td>
				</tr>
				
				<tr>
					<td>Mess Month start date</td>
					<td id="cmess_start_date"></td>
				</tr>
				<tr>
					<td>Mess Month end date</td>
					<td id="cmess_end_date"></td>
				</tr>
				<tr>
					<td>Fine per Day</td>
					<td id="cmess_delay_fine_per_date"></td>
				</tr>

			</tbody>
		</table>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn btn-success" id="create-mess-month" data-dismiss="modal"> Confirm &amp; Create  </a>
		<a href="#" class="btn" data-dismiss="modal">Cancel</a>
	</div>
</div>




<?php include('footer.php');?>
<script>
$(document).ready(function(){
	
	
	function hic(dt){
		
		var ret="";
		ret=dt.substr(3);
		ret=ret.substr(4,3)+""+ret.substr(0,4)+""+ret.substr(7);
		//~ alert(ret);
		//~ 
		//~ alert(dt.getDate());
		//~ alert(dt.getMonth());
		//~ alert(dt.getYear());
		return ret;
		
	}
	
	
	$('#mess_start_date').change(function(){
			//alert($('#mess_start_date').val());
			var now=new Date($('#mess_start_date').val());
			//alert(now);
			a=new Date();
			b=new Date();
			c=new Date();
			//alert(now);
			a=now;
			b=now;
			c=now;
			a=a.toDateString();
			
			//hic(a);
			
			$('#mess_start_date').val(hic(a));
			now.setSeconds(10*86400);
			c=now;
			c=c.toDateString();
			$('#fine-start').val(hic(c));
			now.setSeconds(20*86400);
			c=now;
			c=c.toDateString();
			
			//~ b=now;
			//alert(now);
			$('#mess_end_date').val(hic(c));
			$('#mess_delay_fine_per_date').val(10);
	});

	$("#previewbtn_mess_month").click(function(){
		$('#cmess_month_no').text($('#mess_month_no').val());
		$('#cmess_start_date').text($('#mess_start_date').val());
		$('#cmess_delay_fine_per_date').text($('#mess_delay_fine_per_date').val());
		$('#cmess_end_date').text($('#mess_end_date').val());
		$('#ccharge_amount').text($('#charge').val());
		$('#cfine_start_date').text($('#fine-start').val());
		
	});
	$("#create-mess-month").click(function(){
			$("#mess_mon_submit").click();
			});

});
</script>
