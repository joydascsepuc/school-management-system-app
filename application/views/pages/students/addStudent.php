<div class="container-fluid">
	<?php echo form_open('students/addStudent');?>
	<div class="row">
		<div class="col-md-6 p-5">
			<h5>Student Information</h5>
			<div class="row">
				<div class="col-sm-6">
					<label for="sname">Name</label>
					<input type="text" id="sname" name="sname" class="form-control" autocomplete="off" required autofocus>
				</div>
				<div class="col-sm-6">
					<label for="dOfB" class="form-label">Date of Birth</label>
    				<input class="form-control" name="dOfB" type="date" value="" id="dOfB" required autocomplete="off">
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-sm-6">
					<label for="brn" class="form-label">Birth Registration Number(BRN)</label>
    				<input class="form-control" type="number" value="" id="brn" name="brn" required autocomplete="off">
				</div>
				<div class="col-sm-6">
					<label for="gender">Gender</label>
					<select id="gender" class="form-control" name="gender" required>
				       <option selected value="">Choose...</option>
				       <?php foreach($genders as $gender): ?>
				       	<option value="<?=$gender['id']?>"><?=$gender['name'];?></option>
				       <?php endforeach; ?>
				    </select>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-sm-6">
					<label for="fname">Father's Name</label>
					<input type="text" id="fname" name="fname" class="form-control" autocomplete="off" required>
				</div>
				<div class="col-sm-6">
					<label for="mname">Mother's Name</label>
					<input type="text" id="mname" name="mname" class="form-control" autocomplete="off" required>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-sm-6">
					<label for="fmobile">Father's Mobile No</label>
					<input type="number" id="fmobile" name="fmobile" class="form-control" autocomplete="off" required>
				</div>
				<div class="col-sm-6">
					<label for="mmobile">Mother's Mobile No</label>
					<input type="number" id="mmobile" name="mmobile" class="form-control" autocomplete="off" required>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-sm-6">
					<label for="fProfession">Father's Profession</label>
					<select id="fProfession" class="form-control" name="f_profession" required>
				       <option selected value="">Choose...</option>
				       <?php foreach($professions as $profession): ?>
				       	<option value="<?=$profession['id']?>"><?=$profession['name'];?></option>
				       <?php endforeach; ?>
				    </select>
				</div>
				<div class="col-sm-6">
					<label for="mProfession">Mother's Profession</label>
					<select id="mProfession" class="form-control" name="m_profession" required>
				       <option selected value="">Choose...</option>
				       <?php foreach($professions as $profession): ?>
				       	<option value="<?=$profession['id']?>"><?=$profession['name'];?></option>
				       <?php endforeach; ?>
				    </select>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-sm-6">
					<label for="fYincome">Father's Yearly Est. Income</label>
					<input type="number" id="fYincome" name="fYincome" class="form-control" autocomplete="off" required>
				</div>
				<div class="col-sm-6">
					<label for="mYincome">Mother's Yearly Est. Income</label>
					<input type="number" id="mYincome" name="mYincome" class="form-control" autocomplete="off" required>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-sm-6">
					<label for="permanentAdd">Permanent Address</label>
					<textarea class="form-control" name="permanentAdd" id="permanentAdd" style="height: 100px;" required></textarea>
				</div>
				<div class="col-sm-6">
					<label for="presentAdd">Present Address</label>
					<textarea class="form-control" name="presentAdd" id="presentAdd" style="height: 100px;" required></textarea>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-sm-12">
					<label for="lastSchoolName">Last School Name (If required)</label>
					<input type="text" id="lastSchoolName" name="lastSchoolName" class="form-control" autocomplete="off">
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-sm-6">
					<label for="class">Admitting In</label>
					<select id="class" class="form-control" name="class" required>
				       <option selected value="">Choose...</option>
				       <?php foreach($classes as $class): ?>
				       	<option value="<?=$class['id']?>"><?=$class['name'];?></option>
				       <?php endforeach; ?>
				    </select>
				</div>
				<div class="col-sm-6">
					<div class="row">
						<div class="col-sm-6">
							<label for="shift">Shift</label>
							<select id="shift" class="form-control" name="shift" required>
						       <option selected value="">Choose...</option>
						       <?php foreach($shifts as $shift): ?>
						       	<option value="<?=$shift['id']?>"><?=$shift['name'];?></option>
						       <?php endforeach; ?>
						    </select>
						</div>
						<div class="col-sm-6">
							<label for="section">Section</label>
							<select id="section" class="form-control" name="section" required>
						       <option selected value="">Choose...</option>
						       <?php foreach($sections as $section): ?>
						       	<option value="<?=$section['id']?>"><?=$section['name'];?></option>
						       <?php endforeach; ?>
						    </select>
						</div>
					</div>
				</div>
			</div>

		</div>
		<div class="col-md-6 p-5">
			<h5>Local Gurdian Information</h5>
			<div class="row">
				<div class="col-sm-6">
					<label for="gname">Gurdian Name</label>
				    <input type="text" name="gname" class="form-control" autocomplete="off" required>
				</div>
				<div class="col-sm-6">
					<label for="relationWith">Relation With Student</label>
				    <select id="relationWith" class="form-control" name="relationWith" required>
				       <option selected value="">Choose...</option>
				       <?php foreach($relations as $relation): ?>
				       	<option value="<?=$relation['id']?>"><?=$relation['name'];?></option>
				       <?php endforeach; ?>
				    </select>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-sm-12">
					<label for="nIDcard" class="form-label">National ID Card Number</label>
    				<input class="form-control" type="number" value="" id="nIDcard" name="nIDcard" autocomplete="off">
    				<br>
    				<span class="font-weight-bold">Or,</span>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-sm-12">
					<label for="gbrn" class="form-label">Birth Registration Number (BRN)</label>
    				<input class="form-control" type="number" value="" id="gbrn" name="gbrn"autocomplete="off">
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-sm-12">
					<label for="gaddress">Address</label>
					<textarea class="form-control" id="gaddress" name="gaddress" style="height: 257px;" required></textarea>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-sm-6">
					<label for="gmobile">Mobile No </label>
					<input type="number" minlength="11" maxlength="11" id="gmobile" name="gmobile" class="form-control" autocomplete="off" required>
				</div>
				<div class="col-sm-6">
					<label for="gmobile2">Alternate Mobile No </label>
					<input type="number" minlength="11" maxlength="11" id="gmobile2" name="gmobile2" class="form-control" autocomplete="off">
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-sm-12">
					<label for="gemail">E-mail (If have any)</label>
					<input type="email" id="gemail" name="gemail" class="form-control" autocomplete="off" placeholder="example: email@email.com">
				</div>
			</div>
		</div>
	</div>
	<div class="row mb-4">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<button class="btn btn-outline-primary btn-block font-weight-bold" type="submit">Submit Application</button>
		</div>
		<div class="col-sm-4"></div>
	</div>
	</form>
</div>