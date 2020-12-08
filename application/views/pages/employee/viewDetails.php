<div class="container-fluid p-5">
	<?php foreach($employees['basic'] as $basic): ?>
		<div class="row">
			<div class="col-sm-6">
				<p class="font-weight-bold text-left">Basic Information</p>
			</div>
			<div class="col-sm-6">
				<a class="float-right" href="<?php echo base_url();?>employee/loadEditBasic/<?=$basic['id']?>">Edit Basic Information</a>
				<?php $empid = $basic['id'];?>
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
		 		<tr>
		 			<th>Date Added in Software</th>
		 			<td><?=$basic['date']; ?></td>
		 		</tr>
			</tbody>
		</table>
	<?php endforeach;?>

	<div class="row mt-5">
		<div class="col-sm-6">
			<p class="font-weight-bold text-left">Education Qualification(s) :</p>
		</div>
		<div class="col-sm-6">
			<a href="<?php echo base_url();?>employee/loadAddQualification/<?=$empid?>" class="float-right">Add Qualification</a>
		</div>
	</div>
	<table class="table text-center">
		<thead>
			<tr>
				<th>Level</th>
				<th>Institite Name</th>
				<th>Result</th>
				<th>Passing Year</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($employees['qualifications'] as $q): ?>
				<tr>
					<td><?=$q['e_level']?></td>
					<td><?=$q['i_name']?></td>
					<td><?=$q['result']?></td>
					<td><?=$q['p_year']?></td>

					<td>
			      		<a class="text-secondary font-weight-bold" href="<?php echo base_url(); ?>employee/loadEditQualification/<?php echo $q['id']; ?>"><i class="far fa-edit"></i></a> |
		      			<a class="text-danger font-weight-bold" href="<?php echo base_url(); ?>employee/deleteQualification/<?php echo $q['id']; ?>"><i class="far fa-trash-alt" onclick="return confirm_alert(this);"></i></a>
		      	  </td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</div>


<script type="text/javascript">
	function confirm_alert(node) {
    	return confirm("Are You Sure?");
	}
</script>