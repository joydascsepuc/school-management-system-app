<style type="text/css">
	
</style>



<?php echo form_open('auth/login');?>
	<div class="container-fluid" style="margin-top: 25vh; margin-bottom: 14vh;">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4" style="border: 1px solid black; padding: 2rem 2rem 4rem 2rem; border-radius: 10px;">
				<div class="row mb-5">
					<div class="col-sm-4"></div>
					<div class="col-sm-4 text-center">
						<i class="fas fa-school fa-3x"></i>
					</div>
					<div class="col-sm-4"></div>
				</div>
				<input type="text" autocomplete="off" name="username" class="form-control" placeholder="@username" style="height:35px !important;" required autofocus>
				<input type="password" autocomplete="off" name="password" class="form-control mb-2 mt-2" placeholder="@password" style="height:35px !important;" required>
				<div class="row mb-1">
					<div class="col-4"></div>
					<div class="col-4">
						<button class="btn btn-outline-secondary font-weight-bold btn-block mt-2" style="color: black;">Login&nbsp;<i class="fas fa-sign-in-alt"></i></button>
					</div>
					<div class="col-4"></div>
				</div>
				<div><?php echo $this->session->flashdata('wrong');?></div>
			</div>
			<div class="col-4"></div>
		</div>
	</div>
</form>