<style type="text/css">
	a[id="input"]{
	    padding-bottom: 1.1px;
	}
</style>


<div class="container p-5">
	<?php echo form_open('positions/addPosition');?>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<label for="name">Name of Position</label>
				<input type="text" name="name" autocomplete="off" id="name" class="form-control">
			</div>
			<div class="col-md-4"></div>
		</div>

		<div class="row mt-5">
			<div class="col-md-3"></div>
		    <div class="col-md-7">
		    	<p class="font-weight-bold mt-2">Add Designations :</p>
		    <div class="content-process table-responsive pull pull-left">
		      <table class="table">
		        <thead>
		          <tr>
		            <th>Name</th>
		            <th>Add</th>
		          </tr>
		        </thead>
		        <tbody id="cartItem">
		          <tr>
		            <td>
		              <input type="text" id="dname" autocomplete="off" class="form-control" placeholder="" name="dname">
		            </td>
		            <td>
		              <a href="#" class="btn btn-outline-danger" id="input">+</a>
		            </td>
		          </tr>
		        </tbody>
		      </table>
		    </div>
		  </div>
		  <div class="col-md-2"></div>
		</div>
		<div class="row mt-3">
			<div class="col-md-5"></div>
			<div class="col-md-2">
				<button type="submit" class="btn btn-outline-primary btn-block">Add</button>
			</div>
			<div class="col-md-5"></div>
		</div>
	</form>
</div>


<script type="text/javascript">
	var base_url = "<?php echo base_url(); ?>";

  	$("#input").on("click",function(){
    	var name = $("#dname").val();
    if(name !== null){
        $.ajax({
            url: base_url + 'positions/addDesignationList',
            data: {
                'name' : name,
            },
            type: 'POST',
            success: function(data){
            var html="";
            var res = $.parseJSON(data);
            $(".cart-value").remove();
            $.each(res.data, function(key,value) {
                var display = '<tr class="cart-value" id="'+ key +'">' +
                            '<td class="width-90">'+ value.name +'</td>' +
                            '<td class="width-10"><span class="btn btn-danger btn-sm delete-item" data-cart="'+ key +'">x</span></td>' +
                            '</tr>';
                $("#cartItem tr:last").after(display);
            });
            
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
        $.get(base_url + 'positions/deleteDesignationList/'+rowid,
            function(data,status){
                if(status == 'success'  && data != 'false'){
                    $("#"+rowid).remove();
                    /*console.log(data);
                    $("#total").text('Tk '+data);*/
                }
            }
        );
    });
</script>