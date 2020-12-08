<div class="container-fluid p-5">
	<div class="row">
		<div class="col-md-6">
			
		</div>
		<div class="col-md-6">
			<a href="<?php echo base_url(); ?>salary/exploreSalary" class="text-primary font-weight-bold float-right">Explore Salary Sheet</a>
		</div>
	</div>
		
		
		<div class="row">
			<div class="col table table-responsive text-center pl-0 pr-0 table-bordered">
				<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">Name</th>					      
				      <th scope="col">Emp ID</th>
				      <th scope="col">Position</th>
				      <th scope="col">Designation</th>
				      <th scope="col">Salary</th>
				      <th scope="col">Pay</th>
				      <th scope="col">Amount</th>      
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $rownumbers = 0; ?>
				  	<?php echo form_open_multipart('salary/addSalary');?>
				  	<?php foreach ($employees as $employee): ?>
					    <tr>
					    	<input type="hidden" name="id[<?=$rownumbers?>]" value="<?php echo $employee['id'];?>">

						    <td><?=$employee['name']?></td>
						    <td><?=$employee['empid']?></td>
						    <td><?=$employee['position']?></td>
						    <td><?=$employee['designation']?></td>
						    <td><input type="text" readonly name="salary[<?=$rownumbers?>]" value="<?php echo $employee['salary'];?>"></td>
						    <td>
						      <select class="form-control" name="paidstatus[<?=$rownumbers?>]" required>
					            <option selected value="">Choose...</option>
					        	<?php foreach($pstatus as $p):?>
					        		<option value="<?=$p['id']?>"><?=$p['name']?></option>
					        	<?php endforeach;?>      
					          </select>
						    </td>
						    <td><input type="text" name="amount[<?=$rownumbers?>]" class="form-control" required style="width: 80%; margin-left: 10%;"></td>
					    </tr>
					<?php $rownumbers++; ?>	    
				    <?php endforeach; ?>
				    <td colspan="3"></td>
				    <td colspan="1">
				    	<select class="form-control" name="month" required>
				            <option selected value="">Choose...</option>
				            <?php foreach($months as $month):?>
				            	<option value="<?=$month['id']?>"><?=$month['name']?></option>
				            <?php endforeach; ?>
				        </select>
				    </td>
				    <?php $first = date("Y"); ?>
				    <?php date("m"); ?>
				    <td colspan="1">
				    	<select id="year" class="form-control" name="year" required>
				          <option selected value="">Choose...</option>
				          <option value="<?=$first-1;?>"><?=$first-1;?></option>
				          <option value="<?=$first;?>"><?=$first;?></option>
				          <option value="<?=$first+1;?>"><?=$first+1;?></option>
				          <option value="<?=$first+2;?>"><?=$first+2;?></option>
				        </select>
				    </td>
				    <input type="hidden" name="rownumbers" value="<?=$rownumbers;?>">
				    <td colspan="2">
				    	<button type="submit" <?php if($check == false) echo "disabled" ?> class="btn btn-outline-danger btn-block" onclick="return confirm('Are you sure? You cannot change this for this month once you submitted.');"><i class="fas fa-money-check-alt"></i>&nbsp;&nbsp;Submit Sheet</button>
				    </td>
				    </form>				    
				  </tbody>
				</table>
			</div>
		</div>
	</div>