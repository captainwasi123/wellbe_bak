$(document).ready(function(){

	"use strict";
	var ref = $('meta[name=host]').attr('content');

	//Order View

	$(document).on('click', '.orderModal', function(){
		var id = $(this).data('id');
		$('.orderView').modal('show');
		$('#orderViewContent').html('<img src="'+ref+'/public/assets/images/loaderr.gif">');

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