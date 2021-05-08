$(document).ready(function(){

	"use strict";
	var ref = $('meta[name=host]').attr('content');

	//Open chat

	$(document).on('click', '.chat', function(){
		var id = $(this).data('ref');

		$.get( ref+"/chat/conversation/"+id, function( data ) {
		  $('.chat-window').html( data );
		  $(".inbox_chat").scrollTop($(".inbox_chat")[0].scrollHeight);
		});
	});


	// Send Chat

	$(document).on('click', '#send', function(){
	    
	    var registerUrl = ref+"/chat/send";
	    var token = $('#chatToken').val();
	    var chatRef = $('#chatRef').val();
	    var message = $('#chatMessage').val();
	    var formData = {_token:token, chatRef:chatRef, message:message};
	    $.ajax({
	        type: "post",
	        url: registerUrl,
	        data: formData,
	        dataType: 'json',
	        success: function (data) {
	        	$('#inbox_chat').append(data.message);
	            $('#chatMessage').val('');
	            $(".inbox_chat").scrollTop($(".inbox_chat")[0].scrollHeight);
	        }
	    });

	});
});



	
