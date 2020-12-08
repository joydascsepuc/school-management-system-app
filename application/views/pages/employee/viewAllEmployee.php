<div class="container-fluid p-5">
	<div class="row">
		<div class="col table table-responsive text-center pl-0 pr-0 table-striped">
			<table class="table" id="datatable">
			  <thead>
			    <tr>
			      <th scope="col">Name</th>					      
			      <th scope="col">Gender</th>
			      <th scope="col">Emp-id</th>				      				      
			      <th scope="col">Mobile</th>
			      <th scope="col">Position</th>
			      <th scope="col">Designation</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach ($employees as $employee): ?>
				    <tr>
				      <td><a href="<?php echo base_url(); ?>employee/getDetails/<?php echo $employee['id'];?>"><?php echo $employee['name']; ?></a></td>						      
				      <td><?php echo $employee['gender']; ?></td>
				      <td><?php echo $employee['empid']; ?></td>
				      <td><?php echo $employee['mobile']; ?></td>
				      <td><?php echo $employee['position']; ?></td>						    
				      <td><?php echo $employee['designation']; ?></td>
				    </tr>
			    <?php endforeach; ?>
			  </tbody>
			</table>	
		</div>		
	</div>
</div>