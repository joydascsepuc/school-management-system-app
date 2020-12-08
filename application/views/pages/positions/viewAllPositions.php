<div class="container p-5">
	<div id="messages"></div>
	<table class="table text-center" id="manageTable">
		<thead>
			<tr>
				<th>Position Name</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>

		</tbody>
	</table>

	<!-- For Position -->
	<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title">Edit Position</h4>
	      </div>

	      <form role="form" action="<?php echo base_url('positions/updatePositionName') ?>" method="post" id="updateForm">

	        <div class="modal-body">
	          <div id="messages"></div>

	          <div class="form-group">
	            <label for="name">Position Name</label>
	            <input type="text" class="form-control" id="name" name="name" placeholder="" autocomplete="off">
	          </div>
	        </div>

	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	          <button type="submit" class="btn btn-primary">Save changes</button>
	        </div>

	      </form>

	    </div>
	  </div>
	</div>

	<!-- To Show All Designations -->
	<div class="modal fade" tabindex="-1" role="dialog" id="getModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title">All Designations</h4>
	      </div>
	        <div class="modal-body">
	          	<table class="table" id="dtable"></table>
	        </div>
	        <div class="modal-footer">
	          <button type="button" onclick="clearFunc()" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
	    </div>
	  </div>
	</div>

	<!-- For Designation -->
	<div class="modal fade" tabindex="-1" role="dialog" id="editDModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title">Edit Designation</h4>
	      </div>

	      <form role="form" action="<?php echo base_url('positions/updateDesignationName') ?>" method="post" id="updateForm1">

	        <div class="modal-body">
	          <div id="messages"></div>

	          <div class="form-group">
	            <label for="d_name">Designation Name</label>
	            <input type="text" class="form-control" id="d_name" name="d_name" placeholder="" autocomplete="off" required>
	          </div>
	        </div>

	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	          <button type="submit" class="btn btn-primary">Save changes</button>
	        </div>

	      </form>

	    </div>
	  </div>
	</div>

</div>







<script type="text/javascript">

	var manageTable;
	var base_url = "<?php echo base_url(); ?>";

	/*Load DataTable on Page Load*/
	$(document).ready(function(){
	  manageTable = $('#manageTable').DataTable({
	    'ajax': base_url + 'positions/getPositions',
	  });
	});

	function clearFunc(){
		 $("#dtable").html("");
	}

	/*For Position*/
	function editFunc(id){
	  $.ajax({
	    url: base_url + 'positions/fetchPositionDataById/'+id,
	    type: 'post',
	    dataType: 'json',
	    success:function(response){

	      $("#name").val(response.name);
	      $("#updateForm").unbind('submit').bind('submit', function(){
	        var form = $(this);

	        $(".text-danger").remove();

	        $.ajax({
	          url: form.attr('action') + '/' + id,
	          type: form.attr('method'),
	          data: form.serialize(),
	          dataType: 'json',
	          success:function(response) {
	            manageTable.ajax.reload(null, false);
	            if(response.success === true){
	              $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
	                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
	                '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
	              '</div>');

	              $("#editModal").modal('hide');
	              $("#updateForm .form-group").removeClass('has-error').removeClass('has-success');

	            }else{

	              if(response.messages instanceof Object){
	                $.each(response.messages, function(index, value){
	                  var id = $("#"+index);

	                  id.closest('.form-group')
	                  .removeClass('has-error')
	                  .removeClass('has-success')
	                  .addClass(value.length > 0 ? 'has-error' : 'has-success');

	                  id.after(value);

	                });
	              } else {
	                $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
	                  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
	                  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
	                '</div>');
	              }
	            }
	          }
	        });

	        return false;
	      });

	    }
	  });
	}

	/*To get All Designation By ID*/
	function getDFunc(id){
	  $.ajax({
	    url: base_url + 'positions/fetchDesignationDataById/'+id,
	    type: 'post',
	    dataType: 'json',
	    success:function(data){
	    	$("#dtable").html(data);
	    }
	  });
	}


	/*For Designation*/
	function editDFunc(id){
	  $("#getModal").modal('hide');
	  $.ajax({
	    url: base_url + 'positions/fetchSingleDesignationDataById/'+id,
	    type: 'post',
	    dataType: 'json',
	    success:function(response){

	      $("#d_name").val(response.name);
	      $("#updateForm1").unbind('submit').bind('submit', function(){
	        var form = $(this);

	        $(".text-danger").remove();

	        $.ajax({
	          url: form.attr('action') + '/' + id,
	          type: form.attr('method'),
	          data: form.serialize(),
	          dataType: 'json',
	          success:function(response) {
	            manageTable.ajax.reload(null, false);
	            if(response.success === true){
	              $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
	                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
	                '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
	              '</div>');

	              $("#editDModal").modal('hide');

	              $("#updateForm1 .form-group").removeClass('has-error').removeClass('has-success');

	            }else{

	              if(response.messages instanceof Object){
	                $.each(response.messages, function(index, value){
	                  var id = $("#"+index);

	                  id.closest('.form-group')
	                  .removeClass('has-error')
	                  .removeClass('has-success')
	                  .addClass(value.length > 0 ? 'has-error' : 'has-success');

	                  id.after(value);

	                });
	              } else {
	                $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
	                  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
	                  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
	                '</div>');
	              }
	            }
	          }
	        });

	        return false;
	      });

	    }
	  });
	}


</script>