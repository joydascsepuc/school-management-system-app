<div class="container-fluid p-5">
	<div class="row">
		<div class="col table table-responsive text-center pl-0 pr-0 table-striped">
			<table class="table" id="datatable">
			  <thead>
			    <tr>
			      <th scope="col">Name</th>					      
			      <th scope="col">Gender</th>
			      <th scope="col">Date of Birth</th>				      				      
			      <th scope="col">In Class</th>
			      <th scope="col">Gurdian Name</th>
			      <th scope="col">Mobile</th>         
			      <th>Actions :</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach ($students as $student): ?>
				    <tr>
				      <td><a href="<?php echo base_url(); ?>students/getDetails/<?php echo $student['id'];?>"><?php echo $student['name']; ?></a></td>						      
				      <td><?php echo $student['gender']; ?></td>
				      <td><?php echo $student['birth_date']; ?></td>
				      <td><?php echo $student['in_class']; ?></td>
				      <td><?php echo $student['local_g_name']; ?></td>						    
				      <td><?php echo $student['gmobile']; ?></td>


				      <td>
				      	<a class="text-secondary font-weight-bold" href="<?php echo base_url(); ?>students/loadEditInfo/<?php echo $student['id']; ?>"><i class="far fa-edit"></i></a> |
			      		<a class="text-danger font-weight-bold" href="#"><i class="far fa-trash-alt"></i></a>
			      	  </td>
				    </tr>
			    <?php endforeach; ?>
			  </tbody>
			</table>	
		</div>		
	</div>
</div>