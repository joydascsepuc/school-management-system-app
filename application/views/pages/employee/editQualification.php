<div class="container-fluid p-5" style="margin-top: 50px;">
	<?php echo form_open('employee/updateQualification');?>
		<?php foreach($data['basic'] as $value): ?>
			<div class="row">
				<div class="col-md-3">
					<label for="elevel">Level</label>
					<?php $option = $value['e_level']; ?>
					<select id="elevel" class="form-control" name="elevel" required>
				       <option selected value="">Choose...</option>
				       <?php foreach($data['educations'] as $education): ?>
				       	<option value="<?=$education['id']?>" <?php if($option == $education['id']) echo "selected = 'selected'"?> ><?=$education['name'];?></option>
				       <?php endforeach; ?>
				    </select>
				</div>
				<div class="col-md-3">
					<label for="iname">Institute Name</label>
					<input type="text" class="form-control" name="iname" id="iname" value="<?=$value['i_name']?>">
				</div>
				<div class="col-md-3">
					<label for="result">Result</label>
					<input type="text" class="form-control" name="result" id="result" value="<?=$value['result']?>">
				</div>
				<div class="col-md-3">
					<label for="pyear">Passing Year</label>
					<input type="number" class="form-control" name="pyear" id="pyear" value="<?=$value['p_year']?>">
				</div>
				<input type="hidden" name="id" value="<?=$value['id']?>">
			</div>
		<?php endforeach;?>
		<div class="row mt-4">
			<div class="col-md-5"></div>
			<div class="col-md-2">
				<button type="submit" class="btn btn-outline-primary btn-block">Update This</button>
			</div>
			<div class="col-md-5"></div>
		</div>
	</form>
</div>