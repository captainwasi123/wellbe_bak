var timeList = [];
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


  $(document).on('keyup', '#editServicePrice', function(){
      var price = parseFloat($(this).val());
      var str = price;
      if(CountDecimalDigits(str) > 3){
          str = str.toString();
          str = str.slice(0, (str.indexOf(".")) + 3);
          $(this).val(str);
      }else{
	      var gst = parseFloat($('#mtp_gst').val());
	      var com = parseFloat($('#mtp_com').val());
	      var sale = ((price/100)*gst)+price;
	      var com = price-((price/100)*com);

	      $('#editServiceSalePrice').val(sale.toFixed(2));
	      $('#editServiceTakehomePrice').val(com.toFixed(2));
	    }
  });
  
  $(document).on('keyup', '#editAddonPrice', function(){
      var price = parseFloat($(this).val());
      var str = price;
      if(CountDecimalDigits(str) > 3){
          str = str.toString();
          str = str.slice(0, (str.indexOf(".")) + 3);
          $(this).val(str);
      }else{
	      var gst = parseFloat($('#mtp_gst').val());
	      var com = parseFloat($('#mtp_com').val());
	      var sale = ((price/100)*gst)+price;
	      var com = price-((price/100)*com);

	      $('#editAddonSalePrice').val(sale.toFixed(2));
	      $('#editAddonTakeHome').val(com.toFixed(2));
	    }
  });
  
	// Delete Service

	$(document).on('click', '.enableService', function(){
		var id = $(this).data('id');

		if(confirm('Are you sure want to enable this?')){
			window.location.href = ref+"/practitioner/service/enable/"+id;
		}	
	});
	$(document).on('click', '.disableService', function(){
		var id = $(this).data('id');

		if(confirm('Are you sure want to disable this?')){
			window.location.href = ref+"/practitioner/service/disable/"+id;
		}	
	});

	//Edit Service

	$(document).on('click', '.editService', function(){
		var id = $(this).data('id');

		$('.editServiceModal').modal('show');
		$('#editServiceModalBody').html('<img src="'+ref+'/public/assets/images/loaderr.gif">');

		$.get( ref+"/practitioner/service/edit/"+id, function( data ) {
		  $('#editServiceModalBody').html( data );
		});
	});


	//Addon Manage
		$(document).on('click', '.enableAddon', function(){
			var id = $(this).data('id');

			if(confirm('Are you sure want to enable this?')){
				window.location.href = ref+"/practitioner/service/addons/enable/"+id;
			}	
		});
		$(document).on('click', '.disableAddon', function(){
			var id = $(this).data('id');

			if(confirm('Are you sure want to disable this?')){
				window.location.href = ref+"/practitioner/service/addons/disable/"+id;
			}	
		});
		$(document).on('click', '.editAddon', function(){
			var id = $(this).data('id');

			$('.editServiceAddonModal').modal('show');
			$('#editServiceAddonModalBody').html('<img src="'+ref+'/public/assets/images/loaderr.gif">');

			$.get( ref+"/practitioner/service/addons/edit/"+id, function( data ) {
			  $('#editServiceAddonModalBody').html( data );
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

	$('#scheduleTime').submit(function(event) {
	 	event.preventDefault(); 
	 	
	 	var $form = $(this);
		var values = getFormData($form);
	 	
	 	var weekdays = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
	 	var invalidSlot = 0;
	 	var invalidDay = '';
	 	for (var j = 0; j < weekdays.length; j++) {
	 		timeList = [];
		 	for (var i = 0; i < 7; i++) {
		 		var startTime = values['days['+weekdays[j]+']['+i+'][first_booking]'];
		 		var endTime = values['days['+weekdays[j]+']['+i+'][last_booking]'];
		 		if(startTime != null && endTime != null){
		 			// console.log(startTime+' - '+endTime);
		 			if (validate(startTime, endTime)){
		 				timeList.push({
					      startTime: startTime,
					      endTime: endTime
					    });
		 			}else{
		 				invalidSlot = 1;
		 				invalidDay = weekdays[j];
		 			}
		 		}
		 	}
	 	}
	 	if(invalidSlot == 0){
	 		$(this).unbind('submit').submit();
		}else{
			alert('Timeslot confict on '+invalidDay);
		}

	});


	$(document).on('click', '.splitShift', function(){
		var parent_tr = $(this).parent().parent().parent();
		let i = parseInt($(this).attr("data-id"));

		$(this).attr('data-id', i+1);
		var day = $(this).data('day');
		$(parent_tr).append('<tr><td></td><td></td><td> First Booking </td><td><input type="time" data-id="'+day+'-'+i+'" name="days['+day+']['+i+'][first_booking]" class="checkTime" value="09:00"></td><td> Last Booking </td><td><input type="time" name="days['+day+']['+i+'][last_booking]" id="field-'+day+'-'+i+'" class="" value="17:00"></td><td> <a href="javascript:void(0)" class="col-red removeShift"> - Remove </a> </td>  </tr>');
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
		$('#orderViewContent').html('<img src="'+ref+'/public/assets/images/loaderr.gif">');

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



function validate(sTime, eTime) {
  if (+getDate(sTime) < +getDate(eTime)) {
    var len = timeList.length;
    return len>0?(+getDate(timeList[len - 1].endTime) < +getDate(sTime) ):true;
  } else {
    return false;
  }
}

function getDate(time) {
  var today = new Date();
  var _t = time.split(":");
  today.setHours(_t[0], _t[1], 0, 0);
  return today;
}

function getFormData($form){
    var unindexed_array = $form.serializeArray();
    var indexed_array = {};

    $.map(unindexed_array, function(n, i){
        indexed_array[n['name']] = n['value'];
    });

    return indexed_array;
}

function CountDecimalDigits(number)
{
  var char_array = number.toString().split(""); // split every single char
  var not_decimal = char_array.lastIndexOf(".");
  return (not_decimal<0)?0:char_array.length - not_decimal;
}