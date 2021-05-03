$(document).ready(function(){

	"use strict";

	//Order View

	$(document).on('click', '.orderModal', function(){
		var id = $(this).data('id');

		$('.orderView').modal('show');
		$('#orderViewContent').html('<img src="../public/assets/images/loader.gif">');

		$.get( "view/"+id, function( data ) {
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
	

});