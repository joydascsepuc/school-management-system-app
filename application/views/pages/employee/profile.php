<div class="container-fluid p-5">
	<?php foreach($data as $basic): ?>
		<div class="row">
			<div class="col-sm-6">
				<p class="font-weight-bold text-left">Basic Information</p>
			</div>
			<div class="col-sm-6">
				<a class="float-right" href="<?php echo base_url();?>employee/loadEditBasic/<?=$basic['id']?>">Update Info</a>
			</div>
		</div>
		<table class="table table-striped table-light text-center">
			<tbody>
				<tr>
		 			<th>Name</th>
		 			<td><?=$basic['name']; ?></td>
		 		</tr>
		 		<tr>
		 			<th>Email</th>
		 			<td><?=$basic['email']; ?></td>
		 		</tr>
		 		<tr>
		 			<th>Employee ID</th>
		 			<td><?=$basic['empid']; ?></td>
		 		</tr>
		 		<tr>
		 			<th>Gender</th>
		 			<td><?=$basic['gender']; ?></td>
		 		</tr>
		 		<tr>
		 			<th>Mobile No</th>
		 			<td><?=$basic['mobile']; ?></td>
		 		</tr>
		 		<tr>
		 			<th>Alternate Mobile No</th>
		 			<td><?=$basic['mobile2']; ?></td>
		 		</tr>
		 		<tr>
		 			<th>Position</th>
		 			<td><?=$basic['position']; ?></td>
		 		</tr>
		 		<tr>
		 			<th>Designation</th>
		 			<td><?=$basic['designation']; ?></td>
		 		</tr>
		 		<tr>
		 			<th>Salary</th>
		 			<td><?=$basic['salary']; ?></td>
		 		</tr>
		 		<tr>
		 			<th>Current Status</th>
		 			<td><?=$basic['is_active']; ?></td>
		 		</tr>
		 		<tr>
		 			<th>Date of Birth</th>
		 			<td><?=$basic['date_of_birth']; ?></td>
		 		</tr>
		 		<tr>
		 			<th>National ID Card Number</th>
		 			<td><?=$basic['nid']; ?></td>
		 		</tr>
		 		<tr>
		 			<th>Address</th>
		 			<td><?=$basic['address']; ?></td>
		 		</tr>
			</tbody>
		</table>
	<?php endforeach;?>
</div>