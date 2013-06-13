
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<table width="90%" class="table">
				<tbody>
					<tr>
						<th>Student 1</th>
						<th>Student 2</th>
					</tr>
					<tr>
						<td>
							<table class="table table-striped">
								<tbody>
									<?php foreach ($s1 as $item){ ?>
									<tr><td><?php echo $item->name;?></td></tr>
									<tr><td><?php echo $item->id;?></td></tr>
									<tr><td><?php echo $item->room;?></td></tr>
									<tr><td><?php echo $item->dept;?></td></tr>
									<tr><td><?php echo $item->level;?></td></tr>
									<tr><td><?php echo $item->term;?></td></tr>
									<tr><td><?php echo $item->contact;?></td></tr>
									<?php } ?>
								</tbody>
							</table>
						</td>
						<td>
							<table class="table table-striped">
								<tbody>
									<?php foreach ($s2 as $item){ ?>
									<tr><td><?php echo $item->name;?></td></tr>
									<tr><td><?php echo $item->id;?></td></tr>
									<tr><td><?php echo $item->room;?></td></tr>
									<tr><td><?php echo $item->dept;?></td></tr>
									<tr><td><?php echo $item->level;?></td></tr>
									<tr><td><?php echo $item->term;?></td></tr>
									<tr><td><?php echo $item->contact;?></td></tr>
									<?php } ?>
								</tbody>
							</table>
						</td>
					</tr>
				</tbody>
			</table>
