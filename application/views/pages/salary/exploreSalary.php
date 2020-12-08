<style type="text/css">

	.btn{
		padding: .27rem .75rem .29rem .75rem;
		margin-top: 1.9rem;
	}

	.ulistStyle{
	    background-color: inherit;
	    cursor: pointer;
	    height:100px;
	    width: 100%; 
	    overflow-y:scroll;
	    position: absolute;
	}

  .liStyle{
       font-size: 13px;
    }

	#employeeIDResult{
	  position: absolute !important;
	  left: 0 !important;
	  top: 100% !important;
	  z-index: 10 !important;
	  width: 100% !important;
	}

	#employeeIDResult li {
	  color: #000;
	  padding: 0;
	  margin: 0 17px 2px 17px !important;
	}

	#employeeIDResult li:hover {
	  background-color: #4584E8;
	  color: white;
	}

	.width-20{
		width: 20%;
	}

</style>


<div class="container-fluid p-5">
	<div class="row">
		<div class="col-md-6">
			<p class="font-weight-bold">Explore By Month & Year</p>
			<div class="row">
				<div class="col-sm-6">
					<label for="month">Month</label>
					<select class="form-control" id="month" name="month" required>
			            <option selected value="">Choose...</option>
			            <?php foreach($months as $month):?>
			            	<option value="<?=$month['id']?>"><?=$month['name']?></option>
			            <?php endforeach; ?>
			        </select>
				</div>
				<div class="col-sm-6">
					<label for="year">Year</label>
					<select class="form-control" name="year" id="year" required>
			            <option selected value="">Choose...</option>
			            <?php foreach($years as $year):?>
			            	<option value="<?=$year['year']?>"><?=$year['year']?></option>
			            <?php endforeach; ?>
			        </select>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<p class="font-weight-bold">Explore By Name or Mobile</p>
			<div class="row">
				<div class="col-sm-7">
					<label for="empid">Employee Name or Mobile</label>
					<input type="text" name="empid" autocomplete="off" id="empid" class="form-control">
					<div id="employeeIDResult"></div>
					<input type="hidden" name="id" id="id">
				</div>
				<div class="col-sm-5">
					<a href="#" id="btn2" class="btn btn-block btn-outline-primary">Get Data</a>
				</div>
			</div>
		</div>
	</div>
	<div class="row mt-5">
		<div class="col-md-6">
			<table class="table table-responsive text-center" id="table1">
				
			</table>
		</div>
		<div class="col-md-6">
			<table class="table table-responsive text-center" id="table2">
				
			</table>
		</div>
	</div>



</div>







<script type="text/javascript">

	var base_url = "<?php echo base_url(); ?>"; 

	$('#empid').keyup(function(){
	var search = $(this).val();
	if(search != ''){
		
		$.ajax({
		url:base_url + '/salary/fetchEmpIDForSearch',
		method:"POST",
		data:{search:search}, 

	success:function(data) {

	 $('#employeeIDResult').fadeIn();
	 $('#employeeIDResult').html(data);
	}
	});
	}
	else{
	$('#employeeIDResult').fadeOut();
	$('#employeeIDResult').html("");
	}
	});


	$(document).on('click','#eID li',function() { 
	var eID= $(this).attr('id');
	if (eID!='') {
		
	$.ajax({
	 url:base_url + '/salary/fetchEmployee',
	 method:"POST",
	 dataType: "json",
	 data:{eID:eID},
	 success:function(response){
	 	

	   $('#empid').val(response.name);
	   $('#id').val(response.id);
	   $('#employeeIDResult').fadeOut(); 
	   
	 }
	});
	}
	else{

	$('#empid').val("");
	$('#id').val("");
	$('#employeeIDResult').fadeOut();

	}

	});

	$('#month').on('change', function(){

      var month = $("#month").val();
	  var year = $("#year").val();
      if(month == ''){
        $('#table1').html("");
      }else{
        $.ajax({
              url:base_url + 'salary/getSalarySheetOne',
              data:{
              	'month' : month,
              	'year' : year,
              },
              type: "POST",
              dataType: 'json',
              success: function(data){
                 $("#table1").html(data);
              },
          });
      	}
 	});


	$('#year').on('change', function(){

      var month = $("#month").val();
	  var year = $("#year").val();
      if(year == ''){
        $('#table1').html("");
      }else{
        $.ajax({
              url:base_url + 'salary/getSalarySheetOne',
              data:{
              	'month' : month,
              	'year' : year,
              },
              type: "POST",
              dataType: 'json',
              success: function(data){
                 $("#table1").html(data);
              },
          });
      	}
 	});


 	$('#btn2').on('click', function(){

      var id = $("#id").val();

      if(id == ''){
        $('#table1').html("");
      }else{
        $.ajax({
              url:base_url + 'salary/getSalarySheetTwo',
              data:{
              	'id' : id,
              },
              type: "POST",
              dataType: 'json',
              success: function(data){
                 $("#table2").html(data);
              },
          });
      	}
 	});

</script>