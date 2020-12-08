<style type="text/css">
	a[id="input"]{
	    padding-bottom: 1.1px;
	}
</style>



<div class="container mb-5" style="margin-top: 20px;">
	<?php echo form_open('employee/addEmployee');?>
	<div class="row">
		<div class="col-md-4">
			<label for="name">Name</label>
			<input type="text" id="name" name="name" class="form-control" required autofocus>
		</div>
		<div class="col-md-4">
			<label for="email">Email</label>
			<input type="email" id="email" name="email" class="form-control">
		</div>
		<div class="col-md-4">
			<label for="empid">Employee ID</label>
			<input type="text" id="empid" name="empid" class="form-control" required>
		</div>
	</div>
	<div class="row mt-2">
		<div class="col-md-4">
			<label for="gender">Gender</label>
			<select id="gender" class="form-control" name="gender" required>
		       <option selected value="">Choose...</option>
		       <?php foreach($genders as $gender): ?>
		       	<option value="<?=$gender['id']?>"><?=$gender['name'];?></option>
		       <?php endforeach; ?>
		    </select>
		</div>
		<div class="col-md-4">
			<label for="mobile">Mobile</label>
			<input type="number" name="mobile" id="mobile" class="form-control" required>
		</div>
		<div class="col-md-4">
			<label for="mobile2">Alternate Mobile</label>
			<input type="number" id="mobile2" name="mobile2" class="form-control">
		</div>
	</div>
	<div class="row mt-2">
		<div class="col-md-4">
			<label for="position">Position</label>
			<select id="position" class="form-control" name="position" required>
		       <option selected value="">Choose...</option>
		       <?php foreach($positions as $position): ?>
		       	<option value="<?=$position['id']?>"><?=$position['name'];?></option>
		       <?php endforeach; ?>
		    </select>
		</div>
		<div class="col-md-4">
			<label for="designation">Designation</label>
			<select id="designation" class="form-control" name="designation" required></select>
		</div>
		<div class="col-md-4">
			<label for="salary">Salary</label>
			<input type="number" id="salary" name="salary" class="form-control" required>
		</div>
	</div>
	<div class="row mt-2">
		<div class="col-md-4">
			<div class="row">
				<div class="col-sm-6">
					<label for="isactive">Is Active</label>
					<select id="isactive" class="form-control" name="isactive" required>
						<option selected value="">Choose...</option>
						<option value="1">Active</option>
						<option value="0">Not Active</option>
					</select>
				</div>
				<div class="col-sm-6">
					<label for="dOfB" class="form-label">Date of Birth</label>
    				<input class="form-control" name="dOfB" type="date" value="" id="dOfB" required autocomplete="off">
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<label for="nid">NID Number</label>
			<input type="number" id="nid" name="nid" class="form-control" required>
		</div>
	</div>
	<div class="row mt-2">
		<div class="col-md-12">
			<label for="address">Address</label>
			<textarea for="address" id="address" class="form-control" name="address" style="height: 95px;"></textarea>
		</div>
	</div>
	
	<p class="font-weight-bold mt-5">Add Education Qualification(s) :</p>
	<div class="row">
	    <div class="col-md-12 pull pull-left p-1">
	    <div class="content-process table-responsive">
	      <table class="table">
	        <thead>
	          <tr>
	            <th>Education Level</th>
	            <th>School/College/University</th>
	            <th>Result</th>
	            <th>Passing Year</th>
	            <th>Add</th>
	          </tr>
	        </thead>
	        <tbody id="cartItem">
	          <tr>
	            <td>
	              	<select id="elevel" class="form-control" name="elevel">
				       <option selected value="">Choose...</option>
				       <?php foreach($educations as $education): ?>
				       	<option value="<?=$education['id']?>"><?=$education['name'];?></option>
				       <?php endforeach; ?>
			    	</select>
	            </td>
	            <td>
	              <input type="text" id="iname" class="form-control" placeholder="" name="iname">
	            </td>
	            <td>
	              <input type="text" id="result" class="form-control" name="result">
	            </td>
	            <td>
	              <input type="text" id="pyear" class="form-control" placeholder="" name="pyear">
	            </td>
	            <td>
	              <a href="#" class="btn btn-outline-danger" id="input">+</a>
	            </td>
	          </tr>
	        </tbody>
	      </table>
	    </div>
	  </div>
	</div>

	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<button class="btn btn-outline-primary btn-block" type="submit">Add Employee Information</button>
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

  $("#input").on("click",function(){

        var id = $("#elevel").val();
        var iname = $("#iname").val();
        var result = $("#result").val();
        var pyear = $("#pyear").val();

        if(id !== null){
            $.ajax({
                url: base_url + 'employee/addEducationList',
                data: {
                    'id' : id,
                    'iname' : iname,                  
                    'result' : result,
                    'pyear' : pyear,
                },
                type: 'POST',
                success: function(data){
                  var html="";
                    var res = $.parseJSON(data);
                    $(".cart-value").remove();
                    $.each(res.data, function(key,value) {
                        var display = '<tr class="cart-value" id="'+ key +'">' +
                                    '<td class="width-20">'+ value.id +'</td>' +
                                    '<td class="width-10">'+ value.name +'</td>' +
                                    '<td class="width-10">'+ value.result +'</td>' +
                                    '<td class="width-10">'+ value.pyear +'</td>' +
                                    '<td class="width-10"><span class="btn btn-danger btn-sm delete-item" data-cart="'+ key +'">x</span></td>' +
                                    '</tr>';
                        $("#cartItem tr:last").after(display);

                    });


                    $("#cartItem").find("input[type=text], input[type=hidden]").val("");
                    // $("#preview").html(html);
                },
                error: function(){
                    alert('Something Error');
                }
            });
        }

        else{
            alert("Please fill in all boxes");
        }
    });



    $(document).on("click",".delete-item",function(e){
        var rowid = $(this).attr("data-cart");
        //$el.faLoading();
        $.get(base_url + 'employee/deleteEducationList/'+rowid,
            function(data,status){
                if(status == 'success'  && data != 'false'){
                    $("#"+rowid).remove();
                    console.log(data);
                    $("#total").text('Tk '+data);

                }
            }
        );
    });

</script>
