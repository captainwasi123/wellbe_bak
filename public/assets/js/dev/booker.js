$(document).ready(function(){

	"use strict";

	//Order View

	$(document).on('click', '.orderModal', function(){
		var id = $(this).data('id');
		var ref = $(this).data('host');
		$('.orderView').modal('show');
		$('#orderViewContent').html('<img src="'+ref+'/public/assets/images/loader.gif">');

		$.get( ref+"/booker/view/"+id, function( data ) {
		  $('#orderViewContent').html( data );
		});
	});

	
	$(document).on('click', '.orderCancel', function(){
		var id = $(this).data('ref');
		$('.orderView').modal('hide');
		$('.orderModalCancel').modal('show');

		$('#oid').val(id);
	});
	

});