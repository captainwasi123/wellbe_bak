$(document).ready(function(){

	"use strict";

	//Add Service

	$(document).on('click', '.addService', function(){
		var id = $(this).data('id');
		$('#cat_id').val(id);
		$('.addServiceModal').modal('show');
	});

	//Load Services

	$(document).on('click', '.viewService', function(){
		var id = $(this).data('id');
		$('#service_block').html('<img src="../public/assets/images/loader.gif">');

		$.get( "service/load/"+id, function( data ) {
		  $('#service_block').html( data );
		});
	});

	$(document).on('click', '.serviceDetail', function(){
		var id = $(this).data('id');
		$('#service_detail_block').html('<img src="../public/assets/images/loader.gif">');

		$.get( "service/detail/"+id, function( data ) {
		  $('#service_detail_block').html( data );
		});
	});

	// Delete Service

	$(document).on('click', '.deleteService', function(){
		var href = $(this).data('href');

		if(confirm('Are you sure want to delete this?')){
			window.location.href = href;
		}	
	});

	//Edit Service

	$(document).on('click', '.editService', function(){
		var id = $(this).data('id');

		$('.editServiceModal').modal('show');
		$('#editServiceModalBody').html('<img src="../public/assets/images/loader.gif">');

		$.get( "service/edit/"+id, function( data ) {
		  $('#editServiceModalBody').html( data );
		});
	});

	//Add Service Addons

	$(document).on('click', '.addAddons', function(){
		var id = $(this).data('id');
		$('#service_id').val(id);
		$('.addAddonModal').modal('show');
	});

	$(document).on('click', '.addItemAddons', function(){
		$('#addon_item_add').append('<div class="row"><div class="col-md-4 col-lg-4 col-sm-6 col-xs-12"> <div class="form-field2"><input type="text" placeholder="Enter type" name="duration[]" required></div></div> <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12"> <div class="form-field2"><input type="text" placeholder="Enter price" name="price[]" style="padding-left: 50px;" required><span class="static-tag1 col-black"> NZ$  </span></div></div> <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12"> <div class="form-field2"><input type="radio" name="default" value="0"><a href="javascript:void(0)" class="pull-right col-black removeItemAddon" style="margin-top: 12px;"> <i class="fa fa-trash"> </i> </a></div></div>   </div>');
	});

	$(document).on('click', '.removeItemAddon', function(){
		$(this).parent().parent().parent().remove();
	});


});