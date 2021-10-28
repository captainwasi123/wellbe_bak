var ref = '';

$(document).ready(function() {

    "use strict";
    ref = $('meta[name=host]').attr('content');

    //Open chat

    $(document).on('click', '.chat', function() {
        var id = $(this).data('ref');

        $.get(ref + "/chat/conversation/" + id, function(data) {
            if (data == 'fail') {
                // alert('Chat will open before 4 hours of service time.!');
                alert('Chat with your practitioner is not available until 4 hours before your scheduled service start time.!');


            } else {
                $('.chat-window').html(data);
                chatScrollDown();
            }
        });
    });


    // Send Chat

    $(document).on('click', '#send', function() {
        messageSend();
    });

    $(document).on('keypress', '#chatMessage', function(e) {
        if (e.which == 13) {
            messageSend();
        }
    });
});



//Chat Ajax

function messageSend() {
    var registerUrl = ref + "/chat/send";
    var token = $('#chatToken').val();
    var chatRef = $('#chatRef').val();
    var message = $('#chatMessage').val();
    var emptychat = $('#empty').val();
    var formData = { _token: token, chatRef: chatRef, message: message };
    $.ajax({
        type: "post",
        url: registerUrl,
        data: formData,
        dataType: 'json',
        success: function(data) {
            if (emptychat == '1') {
                $('#inbox_chat').html(data.message);
            } else {
                $('#inbox_chat').append(data.message);
            }
            $('#chatMessage').val('');
            chatScrollDown();
        }
    });
}


//Chat Binding
function getMessage(id, key) {
    Pusher.logToConsole = false;
    var pusher = new Pusher(key, {
        cluster: 'ap2'
    });

    var channel = pusher.subscribe('send-chatChannel.' + id);
    channel.bind('sendChat', function(data) {
        notiSound();
        var chat_block = '<div class="incoming_msg"><div class="incoming_msg_img"> <img src="' + ref + '/' + data.image + '"> </div><div class="received_msg"><div class="received_withd_msg"><p>' + data.message + '</p><span class="time_date">' + data.timestamp + '</span></div></div></div>';

        $('.chat' + data.order_id).append(chat_block);
        chatScrollDown();
    });
}



function chatScrollDown() {
    $(".inbox_chat").scrollTop($(".inbox_chat")[0].scrollHeight);
}

function notiSound() {
    var obj = document.createElement("audio");
    obj.src = ref + "/public/assets/web/audio/noti.mp3";
    obj.play();
}