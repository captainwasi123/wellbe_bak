$(document).ready(function(){

	"use strict";
	var ref = $('meta[name=host]').attr('content');

	//Order View

	$(document).on('click', '.orderModal', function(){
		var id = $(this).data('id');

		$('.orderView').modal('show');
		$('#orderViewContent').html('<img src="'+ref+'/public/assets/images/loader.gif">');

		$.get( ref+"/admin/view/"+id, function( data ) {
		  $('#orderViewContent').html( data );
		});
	});

	
	$(document).on('click', '.orderCancel', function(){
		var id = $(this).data('ref');
		$('.orderView').modal('hide');
		$('.orderModalCancel').modal('show');

		$('#oid').val(id);
	});



	//Practitioner

	$(document).on('change', '.disableUser', function(){
		var id = $(this).data('ref');
		if(this.checked){
			$('.assumeUserModal').modal('show');
			$('#apid').val(id);
		}else{
			$('.disableUserModal').modal('show');
			$('#dpid').val(id);
		}
	});

	//mark as paid

	$(document).on('click', '.markasPaid', function(){
		var id = $(this).data('ref');

		if(confirm("Are you sure want to mark as paid?")){
			window.location.href = ref+"/admin/booking/markaspaid/"+id;
		}
	});

	$(document).on('click', '.unmarkasPaid', function(){
		var id = $(this).data('ref');

		if(confirm("Are you sure want to unmark as paid?")){
			window.location.href = ref+"/admin/booking/unmarkaspaid/"+id;
		}
	});


	//mark as paid ---- Customer

	$(document).on('click', '.cust_markasPaid', function(){
		var id = $(this).data('ref');

		if(confirm("Are you sure want to mark as paid?")){
			window.location.href = ref+"/admin/bookingCancel/customer/mark/"+id;
		}
	});

	$(document).on('click', '.cust_unmarkasPaid', function(){
		var id = $(this).data('ref');

		if(confirm("Are you sure want to unmark as paid?")){
			window.location.href = ref+"/admin/bookingCancel/customer/unmark/"+id;
		}
	});


	//mark as paid ---- Practitioner

	$(document).on('click', '.pract_markasPaid', function(){
		var id = $(this).data('ref');

		if(confirm("Are you sure want to mark as paid?")){
			window.location.href = ref+"/admin/bookingCancel/practitioner/mark/"+id;
		}
	});

	$(document).on('click', '.pract_unmarkasPaid', function(){
		var id = $(this).data('ref');

		if(confirm("Are you sure want to unmark as paid?")){
			window.location.href = ref+"/admin/bookingCancel/practitioner/unmark/"+id;
		}
	});
	

});