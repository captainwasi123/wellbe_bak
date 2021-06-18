$(document).ready(function(){

	"use strict";
	var ref = $('meta[name=host]').attr('content');
	//Add Service

	$(document).on('click', '.addService', function(){
		var id = $(this).data('id');
		$('#cat_id').val(id);
		$('.addServiceModal').modal('show');
	});

	//Load Services

	$(document).on('click', '.viewService', function(){
		var id = $(this).data('id');
		$('#service_block').html('<img src="'+ref+'/public/assets/images/loaderr.gif">');

		$.get( ref+"/practitioner/service/load/"+id, function( data ) {
		  $('#service_block').html( data );
		});
	});

	$(document).on('click', '.serviceDetail', function(){
		var id = $(this).data('id');
		$('#service_detail_block').html('<img src="'+ref+'/public/assets/images/loaderr.gif">');

		$.get( ref+"/practitioner/service/detail/"+id, function( data ) {
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
		$('#editServiceModalBody').html('<img src="'+ref+'/public/assets/images/loader.gif">');

		$.get( ref+"/practitioner/service/edit/"+id, function( data ) {
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
		$('#addon_item_add').append('<div class="row"><div class="col-md-4 col-lg-4 col-sm-6 col-xs-12"> <div class="form-field2"><input type="text" placeholder="Enter type" name="duration[]" required></div></div> <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12"> <div class="form-field2"><input type="text" placeholder="Enter price" name="price[]" style="padding-left: 50px;" required><span class="static-tag1 col-black"> NZ$  </span></div></div> <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12"> <div class="form-field2"><a href="javascript:void(0)" class="pull-right col-black removeItemAddon" style="margin-top: 12px;"> <i class="fa fa-trash"> </i> </a></div></div>   </div>');
	});

	$(document).on('click', '.removeItemAddon', function(){
		$(this).parent().parent().parent().remove();
	});


	//Schedule Spilt

	$(document).on('click', '.splitShift', function(){
		var parent_tr = $(this).parent().parent().parent();
		let i = parseInt($(this).attr("data-id"));
		$(this).attr('data-id', i+1);
		var day = $(this).data('day');
		$(parent_tr).append('<tr><td></td><td></td><td> First Booking </td><td><input type="text" name="days['+day+']['+i+'][first_booking]" class="timepicker" value="9:00 PM"></td><td> Last Booking </td><td><input type="text" name="days['+day+']['+i+'][last_booking]" class="timepicker" value="5:00 PM"></td><td> <a href="javascript:void(0)" class="col-red removeShift"> - Remove </a> </td>  </tr>');
		$('.timepicker').mdtimepicker();
	});


	$(document).on('click', '.removeShift', function(){
		$(this).parent().parent().remove();
	});

	
	$(document).on('click', '.addClosed', function(){
		var val = $('#close_date').val();
		if(val == ''){
			alert('Please select date first.');
		}else{
			$('#close_date_block').append('<h5 class="col-black"><input type="date" value="'+val+'" name="closed[]" readonly> <a href="javascript:void(0)" class="col-blue removeHoliday"> Remove </a> </h5>');
			$('#close_date').val('');
		}
	});

	$(document).on('click', '.removeHoliday', function(){
		$(this).parent().remove();
	});


	//Order View

	$(document).on('click', '.orderModal', function(){
		var id = $(this).data('id');

		$('.orderView').modal('show');
		$('#orderViewContent').html('<img src="'+ref+'/public/assets/images/loader.gif">');

		$.get( ref+"/practitioner/booking/view1/"+id, function( data ) {
		  $('#orderViewContent').html( data );
		});
	});

	$(document).on('click', '.orderCancel', function(){
		var id = $(this).data('ref');
		$('.orderView').modal('hide');
		$('.orderModalCancel').modal('show');

		$('#oid').val(id);
	});


	//Start Service
	$(document).on('click', '.orderStart', function(){
		var id = $(this).data('ref');

		$('.orderView').modal('hide');
		if(confirm('Are sure want to start service?')){
			window.location.href = ref+"/practitioner/booking/start/"+id;
		}
	});

	//Booking Completed
	$(document).on('click', '.orderComplete', function(){
		var id = $(this).data('ref');

		$('.orderView').modal('hide');
		if(confirm('Are sure want to Complete this booking?')){
			window.location.href = ref+"/practitioner/booking/complete/"+id;
		}
	});

});