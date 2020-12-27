<div class="container-fluid">
	<?php echo form_open('students/updateRecord');?>
	<div class="row">
		<div class="col-md-6 p-5">
			<h5>Student Information</h5>
			<?php foreach($details['students'] as $student): ?>
			<div class="row">
				<div class="col-sm-6">
					<label for="sname">Name</label>
					<input type="text" id="sname" value="<?=$student['name']?>" name="sname" class="form-control" autocomplete="off" required>
				</div>
				<div class="col-sm-6">
					<label for="dOfB" class="form-label">Date of Birth</label>
    				<input class="form-control" value="<?=$student['birth_date']?>" name="dOfB" type="date" value="" id="dOfB" required autocomplete="off">
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-sm-6">
					<label for="brn" class="form-label">Birth Registration Number(BRN)</label>
    				<input class="form-control" type="number" value="<?=$student['birth_reg_no']?>" id="brn" name="brn" required autocomplete="off">
				</div>
				<div class="col-sm-6">
					<div class="row">
						<div class="col-sm-6">
							<label for="gender">Gender</label>
							<select id="gender" class="form-control" name="gender" required>
								<?php $option = $student['gender'];?>
						       <option selected value="">Choose...</option>
						       <?php foreach($details['genders'] as $gender): ?>
						       	<option value="<?=$gender['id']?>" <?php if ($option == $gender['id']) echo "Selected = 'selected' ";?> ><?=$gender['name'];?></option>
						       <?php endforeach; ?>
						    </select>
						</div>
						<div class="col-sm-6">
							<label for="is_active">Is Active</label>
							<select id="is_active" class="form-control" name="is_active" required>
							<?php $option = $student['is_active'];?>
						       <option selected value="">Choose...</option>
						       <?php foreach($details['actives'] as $active): ?>
						       	<option value="<?=$active['id']?>" <?php if ($option == $active['id']) echo "Selected = 'selected' ";?> ><?=$active['name'];?></option>
						    <?php endforeach; ?>
						    </select>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-sm-6">
					<label for="fname">Father's Name</label>
					<input type="text" id="fname" value="<?=$student['f_name']?>" name="fname" class="form-control" autocomplete="off" required>
				</div>
				<div class="col-sm-6">
					<label for="mname">Mother's Name</label>
					<input type="text" id="mname" value="<?=$student['m_name']?>" name="mname" class="form-control" autocomplete="off" required>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-sm-6">
					<label for="fmobile">Father's Mobile No</label>
					<input type="number" value="<?=$student['f_mobile']?>" id="fmobile" name="fmobile" class="form-control" autocomplete="off" required>
				</div>
				<div class="col-sm-6">
					<label for="mmobile">Mother's Mobile No</label>
					<input type="number" id="mmobile" value="<?=$student['m_mobile']?>" name="mmobile" class="form-control" autocomplete="off" required>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-sm-6">
					<label for="fProfession">Father's Profession</label>
					<?php $option = $student['f_profession']; ?>
					<select id="fProfession" class="form-control" name="f_profession" required>
				       <option selected value="">Choose...</option>
				       <?php foreach($details['professions'] as $profession): ?>
				       	<option value="<?=$profession['id']?>" <?php if ($option == $profession['id']) echo "Selected = 'selected' ";?> ><?=$profession['name'];?></option>
				       <?php endforeach; ?>
				    </select>
				</div>
				<div class="col-sm-6">
					<label for="mProfession">Mother's Profession</label>
					<?php $option = $student['m_profession']; ?>
					<select id="mProfession" class="form-control" name="m_profession" required>
				       <option selected value="">Choose...</option>
				       <?php foreach($details['professions'] as $profession): ?>
				       	<option value="<?=$profession['id']?>" <?php if ($option == $profession['id']) echo "Selected = 'selected' ";?> ><?=$profession['name'];?></option>
				       <?php endforeach; ?>
				    </select>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-sm-6">
					<label for="fYincome">Father's Yearly Est. Income</label>
					<input type="number" value="<?=$student['f_est_income']?>" id="fYincome" name="fYincome" class="form-control" autocomplete="off" required>
				</div>
				<div class="col-sm-6">
					<label for="mYincome">Mother's Yearly Est. Income</label>
					<input type="number" id="mYincome" value="<?=$student['m_est_income']?>" name="mYincome" class="form-control" autocomplete="off" required>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-sm-6">
					<label for="permanentAdd">Permanent Address</label>
					<textarea class="form-control" name="permanentAdd" id="permanentAdd" style="height: 100px;" required><?=$student['permanent_address'];?></textarea>
				</div>
				<div class="col-sm-6">
					<label for="presentAdd">Present Address</label>
					<textarea class="form-control" name="presentAdd" id="presentAdd" style="height: 100px;" required><?=$student['present_address'];?></textarea>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-sm-12">
					<label for="lastSchoolName">Last School Name (If required)</label>
					<input type="text" id="lastSchoolName" value="<?=$student['last_school']?>" name="lastSchoolName" class="form-control" autocomplete="off">
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-sm-6">
					<label for="class">Admitting In</label>
					<?php $option = $student['in_class']; ?>
					<select id="class" class="form-control" name="class" required>
				       <option selected value="">Choose...</option>
				       <?php foreach($details['classes'] as $class): ?>
				       	<option value="<?=$class['id']?>" <?php if ($option == $class['id']) echo "Selected = 'selected' ";?> ><?=$class['name'];?></option>
				       <?php endforeach; ?>
				    </select>
				</div>
				<div class="col-sm-6">
					<div class="row">
						<div class="col-6">
							<label for="shift">Shift</label>
							<?php $option = $student['shift']; ?>
							<select id="shift" class="form-control" name="shift" required>
						       <option selected value="">Choose...</option>
						       <?php foreach($details['shifts'] as $shift): ?>
						       	<option value="<?=$shift['id']?>" <?php if ($option == $shift['id']) echo "Selected = 'selected' ";?> ><?=$shift['name'];?></option>
						       <?php endforeach; ?>
						    </select>
						</div>
						<div class="col-6">
							<label for="section">Section</label>
							<?php $option = $student['section']; ?>
							<select id="section" class="form-control" name="section" required>
						       <option selected value="">Choose...</option>
						       <?php foreach($details['sections'] as $section): ?>
						       	<option value="<?=$section['id']?>" <?php if ($option == $section['id']) echo "Selected = 'selected' ";?> ><?=$section['name'];?></option>
						       <?php endforeach; ?>
						    </select>
						</div>
					</div>
				</div>
			</div>
		<input type="hidden" name="studentID" value="<?=$student['id']?>">
		<?php endforeach;?>
		</div>
		<div class="col-md-6 p-5">
			<h5>Local Gurdian Information</h5>
			<?php foreach($details['guardians'] as $guardian): ?>
			<div class="row">
				<div class="col-sm-6">
					<label for="gname">Gurdian Name</label>
				    <input type="text" value="<?=$guardian['name']?>" name="gname" class="form-control" autocomplete="off" required>
				</div>
				<div class="col-sm-6">
					<label for="relationWith">Relation With Student</label>
					<?php $option = $guardian['relation']; ?>
				    <select id="relationWith" class="form-control" name="relationWith" required>
				       <option selected value="">Choose...</option>
				       <?php foreach($details['relations'] as $relation): ?>
				       	<option value="<?=$relation['id']?>" <?php if ($option == $relation['id']) echo "Selected = 'selected' ";?> ><?=$relation['name'];?></option>
				       <?php endforeach; ?>
				    </select>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-sm-12">
					<label for="nIDcard" class="form-label">National ID Card Number</label>
    				<input class="form-control" value="<?=$guardian['nid']?>" type="number" value="" id="nIDcard" name="nIDcard" autocomplete="off">
    				<br>
    				<span class="font-weight-bold">Or,</span>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-sm-12">
					<label for="gbrn" class="form-label">Birth Registration Number (BRN)</label>
    				<input class="form-control" type="number" value="<?=$guardian['birth_reg_no']?>" id="gbrn" name="gbrn"autocomplete="off">
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-sm-12">
					<label for="gaddress">Address</label>
					<textarea class="form-control" id="gaddress" name="gaddress" style="height: 257px;" required><?=$guardian['address']?></textarea>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-sm-6">
					<label for="gmobile">Mobile No </label>
					<input type="number" value="<?=$guardian['mobile']?>" minlength="11" maxlength="11" id="gmobile" name="gmobile" class="form-control" autocomplete="off" required>
				</div>
				<div class="col-sm-6">
					<label for="gmobile2">Alternate Mobile No </label>
					<input type="number" value="<?=$guardian['mobile2']?>" minlength="11" maxlength="11" id="gmobile2" name="gmobile2" class="form-control" autocomplete="off">
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-sm-12">
					<label for="gemail">E-mail (If have any)</label>
					<input type="email" value="<?=$guardian['email']?>" id="gemail" name="gemail" class="form-control" autocomplete="off" placeholder="example: email@email.com">
				</div>
			</div>
		</div>
		<input type="hidden" name="guardianID" value="<?=$guardian['id']?>">
		<?php endforeach; ?>
	</div>
	<div class="row mb-4">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<button class="btn btn-outline-primary btn-block font-weight-bold" type="submit">Update Information</button>
		</div>
		<div class="col-sm-4"></div>
	</div>
	</form>
</div>