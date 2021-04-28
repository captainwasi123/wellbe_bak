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
	

});