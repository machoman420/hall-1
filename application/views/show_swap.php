
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<table class="table table-striped table-bordered">
				<tbody>
					<tr><th></th>
						<th>Student 1</th>
						<th>Student 2</th>
					</tr>
					<tr>
						<td>
							<table class="table table-striped table-bordered">
								<tbody>
									
									<tr><td>NAME</td></tr>
									<tr><td>ID</td></tr>
									<tr><td>ROOM</td></tr>
									<tr><td>DEPT</td></tr>
									<tr><td>LEVEL</td></tr>
									<tr><td>TERM</td></tr>
									<tr><td>CONTACT</td></tr>
									
								</tbody>
							</table>
						</td>
						<td>
							<table class="table table-striped table-bordered">
								<tbody>
									<?php foreach ($s1 as $item){ ?>
									<tr><td><?php echo $item->NAME;?></td></tr>
									<tr><td><?php echo $item->ID;?></td></tr>
									<tr><td><?php echo $item->ROOM;?></td></tr>
									<tr><td><?php echo $item->DEPT;?></td></tr>
									<tr><td><?php echo $item->SLEVEL;?></td></tr>
									<tr><td><?php echo $item->TERM;?></td></tr>
									<tr><td><?php echo $item->CONTACT;?></td></tr>
									<?php } ?>
								</tbody>
							</table>
						</td>
						<td>
							<table class="table table-striped table-bordered">
								<tbody>
									<?php foreach ($s2 as $item){ ?>
									<tr><td><?php echo $item->NAME;?></td></tr>
									<tr><td><?php echo $item->ID;?></td></tr>
									<tr><td><?php echo $item->ROOM;?></td></tr>
									<tr><td><?php echo $item->DEPT;?></td></tr>
									<tr><td><?php echo $item->SLEVEL;?></td></tr>
									<tr><td><?php echo $item->TERM;?></td></tr>
									<tr><td><?php echo $item->CONTACT;?></td></tr>
									<?php } ?>
								</tbody>
							</table>
						</td>
					</tr>
				</tbody>
			</table>
