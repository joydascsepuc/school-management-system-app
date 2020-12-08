<style type="text/css">
	a[id="input"]{
	    padding-bottom: 1.1px;
	}
</style>


<div class="container-fluid p-5">
	<p class="font-weight-bold mt-5">Add Education Qualification(s) :</p>
	<?php echo form_open('employee/addQualification');?>
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

		<input type="hidden" name="empid" value="<?=$id;?>">

		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<button class="btn btn-outline-primary btn-block" type="submit">Add Qualification (s)</button>
			</div>
			<div class="col-md-4"></div>
		</div>
	</form>
</div>



<script type="text/javascript">
	var base_url = "<?php echo base_url(); ?>";

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