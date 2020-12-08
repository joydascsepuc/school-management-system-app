<div class="container-fluid pt-5 mb-3">
	<?php 
		foreach ($details['students'] as $key => $student) {
			$stdid = $student['id'];
		}
	?>
	<a href="<?php echo base_url();?>students/loadEditInfo/<?=$stdid?>" >Edit Information</a>

	<div class="row">
		<?php foreach($details['students'] as $student) : ?>
		<div class="col-md-6 mt-4">
			<h5>Students Details</h5>
			<div class="row p-2">
				<div class="col-sm-6">
					Name : <?php echo $student['name']; ?>
				</div>
				<div class="col-sm-6">
					Gender : <?php echo $student['gender']; ?>
				</div>
			</div>
			<div class="row p-2">
				<div class="col-sm-6">
					Date of Birth : <?php echo $student['birth_date']; ?>
				</div>
				<div class="col-sm-6">
					Birth Reg No : <?php echo $student['birth_reg_no']; ?>
				</div>
			</div>
			<div class="row p-2">
				<div class="col-sm-6">
					Father's Name : <?php echo $student['f_name']; ?>
				</div>
				<div class="col-sm-6">
					Mother's Name : <?php echo $student['m_name']; ?>
				</div>
			</div>
			<div class="row p-2">
				<div class="col-sm-6">
					Father's Mobile : <?php echo $student['f_mobile']; ?>
				</div>
				<div class="col-sm-6">
					Mother's Mobile : <?php echo $student['m_mobile']; ?>
				</div>
			</div>
			<div class="row p-2">
				<div class="col-sm-6">
					Father' Profession : <?php echo $student['f_profession']; ?>
				</div>
				<div class="col-sm-6">
					Mother's Profession : <?php echo $student['m_profession']; ?>
				</div>
			</div>
			<div class="row p-2">
				<div class="col-sm-6">
					Father' Est. Income : <?php echo $student['f_est_income']; ?>
				</div>
				<div class="col-sm-6">
					Mother's Est. Income : <?php echo $student['m_est_income']; ?>
				</div>
			</div>
			<div class="row p-2">
				<div class="col-sm-6">
					Permanent Address : <?php echo $student['permanent_address']; ?>
				</div>
				<div class="col-sm-6">
					Present Address : <?php echo $student['present_address']; ?>
				</div>
			</div>
			<div class="row p-2">
				<div class="col-sm-6">
					Last School : <?php echo $student['last_school']; ?>
				</div>
				<div class="col-sm-6">
					In Class : <?php echo $student['in_class']; ?>
				</div>
			</div>
			<div class="row p-2">
				<div class="col-sm-6">
					<div class="row">
						<div class="col-sm-4">
							Shift : <?php echo $student['shift']; ?>
						</div>
						<div class="col-sm-4">
							Section : <?php echo $student['section']; ?>
						</div>
						<div class="col-sm-4"></div>
					</div>
				</div>
				<div class="col-sm-6">
					Added Date : <?php echo $student['date']; ?>
				</div>
			</div>
		</div>
		<?php endforeach; ?>

		<div class="col-md-6 mt-4">
			<h5>Local Gurdian Details</h5>
			<?php foreach($details['gurdians'] as $gurdian) : ?>
			<div class="row p-2">
				<div class="col-sm-6">
					G. Name : <?php echo $gurdian['name']; ?>
				</div>
				<div class="col-sm-6">
					Nid : <?php echo $gurdian['nid']; ?>
				</div>
			</div>
			<div class="row p-2">
				<div class="col-sm-6">
					Birth Reg No : <?php echo $gurdian['birth_reg_no']; ?>
				</div>
				<div class="col-sm-6">
					Address : <?php echo $gurdian['address']; ?>
				</div>
			</div>
			<div class="row p-2">
				<div class="col-sm-6">
					Mobile No : <?php echo $gurdian['mobile']; ?>
				</div>
				<div class="col-sm-6">
					Alternate Mobile No : <?php echo $gurdian['mobile2']; ?>
				</div>
			</div>
			<div class="row p-2">
				<div class="col-sm-6">
					email : <?php echo $gurdian['email']; ?>
				</div>
				<div class="col-sm-6">
					Relation with Student : <?php echo $gurdian['relation']; ?>
				</div>
			</div>
			<?php endforeach;?>
		</div>
	</div>
</div>