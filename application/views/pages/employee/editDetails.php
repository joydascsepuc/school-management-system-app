<div class="container mb-5" style="margin-top: 70px;">
	<?php echo form_open('employee/updateInformation');?>
	<?php foreach($employees['basic'] as $employee): ?>
		<div class="row">
			<div class="col-md-4">
				<label for="name">Name</label>
				<input type="text" id="name" value="<?=$employee['name']?>" name="name" class="form-control" required autofocus>
			</div>
			<div class="col-md-4">
				<label for="email">Email</label>
				<input type="email" value="<?=$employee['email']?>" id="email" name="email" class="form-control">
			</div>
			<div class="col-md-4">
				<label for="empid">Employee ID</label>
				<input type="text" value="<?=$employee['empid']?>" id="empid" name="empid" class="form-control" required>
			</div>
		</div>
		<div class="row mt-2">
			<div class="col-md-4">
				<label for="gender">Gender</label>
				<?php $option = $employee['gender']; ?>
				<select id="gender" class="form-control" name="gender" required>
			       <option selected value="">Choose...</option>
			       <?php foreach($employees['genders'] as $gender): ?>
			       	<option value="<?=$gender['id']?>" <?php if($option == $gender['id']) echo "selected = 'selected'"?> ><?=$gender['name'];?></option>
			       <?php endforeach; ?>
			    </select>
			</div>
			<div class="col-md-4">
				<label for="mobile">Mobile</label>
				<input type="number" value="<?=$employee['mobile']?>" name="mobile" id="mobile" class="form-control" required>
			</div>
			<div class="col-md-4">
				<label for="mobile2">Alternate Mobile</label>
				<input type="number" value="<?=$employee['mobile2']?>" id="mobile2" name="mobile2" class="form-control">
			</div>
		</div>
		<div class="row mt-2">
			<div class="col-md-4">
				<label for="position">Position</label>
				<?php $option = $employee['position']; ?>
				<select id="position" class="form-control" name="position" required>
			       <option selected value="">Choose...</option>
			       <?php foreach($employees['positions'] as $position): ?>
			       	<option value="<?=$position['id']?>" <?php if($option == $position['id']) echo "selected = 'selected'"?> ><?=$position['name'];?></option>
			       <?php endforeach; ?>
			    </select>
			</div>
			<div class="col-md-4">
				<label for="designation">Designation</label>
				<?php $option = $employee['designation']; ?>
				<select id="designation" class="form-control" name="designation" required>
					<option selected value="">Choose...</option>
					<?php foreach($employees['designations'] as $designation): ?>
			       	<option value="<?=$designation['id']?>" <?php if($option == $designation['id']) echo "selected = 'selected'"?> ><?=$designation['name'];?></option>
			       <?php endforeach; ?>
				</select>
			</div>
			<div class="col-md-4">
				<label for="salary">Salary</label>
				<input type="number" value="<?=$employee['salary']?>" id="salary" name="salary" class="form-control" required>
			</div>
		</div>
		<div class="row mt-2">
			<div class="col-md-4">
				<div class="row">
					<div class="col-sm-6">
						<label for="isactive">Is Active</label>
						<?php $option = $employee['is_active']; ?>
						<select id="isactive" class="form-control" name="isactive" required>
							<option selected value="">Choose...</option>
							<option value="1" <?php if($option == 1) echo "selected = 'Selected'"?> >Active</option>
							<option value="0" <?php if($option == 0) echo "selected = 'Selected'"?>>Not Active</option>
						</select>
					</div>
					<div class="col-sm-6">
						<label for="dOfB" class="form-label">Date of Birth</label>
	    				<input class="form-control" value="<?=$employee['date_of_birth']?>" name="dOfB" type="date" value="" id="dOfB" required autocomplete="off">
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<label for="nid">NID Number</label>
				<input type="number" id="nid" value="<?=$employee['nid']?>" name="nid" class="form-control" required>
			</div>
		</div>
		<div class="row mt-2">
			<div class="col-md-12">
				<label for="address">Address</label>
				<textarea for="address" id="address" class="form-control" name="address" style="height: 95px;"><?=$employee['address']?></textarea>
			</div>
		</div>
		<input type="hidden" name="id" value="<?=$employee['id']?>">
	<?php endforeach;?>

	<div class="row mt-5" style="margin-bottom: 10%;">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<button class="btn btn-outline-primary btn-block" type="submit">Update Employee Information</button>
		</div>
		<div class="col-md-4"></div>
	</div>
	</form>
</div>


<script type="text/javascript">

  var base_url = "<?php echo base_url(); ?>";

	$(document).ready(function() {
	$('#position').on('change', function(){
	  var positionid = $(this).val();
	  if(positionid == '')
	  {
	    $('#designation').html("");
	  }
	  else {
	    $.ajax({
	          url:base_url + 'employee/getDesignations',
	          type: "POST",
	          data: {'positionid' : positionid},
	          dataType: 'json',
	          success: function(data){
	             $('#designation').html(data);
	          },
	      });
	  }
		});
	});

</script>
