$(document).ready(function(){

	"use strict";
	var ref = $('meta[name=host]').attr('content');

	//Order View

	$(document).on('click', '.orderModal', function(){
		var id = $(this).data('id');

		$('.orderView').modal('show');
		$('#orderViewContent').html('<img src="../public/assets/images/loader.gif">');

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
	

});