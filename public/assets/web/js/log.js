//login

$("#login").click(function (e) {
    e.preventDefault();

    var loginUrl = $("#loginForm").attr('action');
    var email = $("#email").val();
    var password = $("#password").val();
    var loginToken = $("#loginToken").val();
    $.ajax({
        type: "post",
        url: loginUrl,
        data: {
            'email':email,
            'password':password,
            _token:loginToken,
            },
        dataType: "json",
        success: function (data) {
            if(data.status == 200){
                if(data.user_type == 2){
                    $(".modal").hide();
                    swal({
                        title: 'Logged In',
                        text: 'Successfully Logged In As A Booker',
                        icon: 'success',
                        timer: 1500,
                        showConfirmButton: false
                    }).then(function(value) {
                        window.location.href = data.route;
                    });
                }else if (data.user_type == 1) {
                    $(".modal").hide();
                    swal({
                        title: 'Logged In',
                        text: 'Successfully Logged In As A Practitioner',
                        icon: 'success',
                        timer: 1500,
                        showConfirmButton: false
                    }).then(function(value) {                            
                        window.location.href = data.route;
                    });
                }
            }else if(data.status == 500){
                $(".modal").hide();
                swal({
                    title: 'Logged In Faild',
                    text: 'Email Or Password Does Not Match Try Again!',
                    type: "error",
                    timer: 1500,
                    showCancelButton: true,
                    dangerMode: true,
                    cancelButtonClass: '#DD6B55',
                    confirmButtonColor: '#dc3545',
                    confirmButtonText: 'Cancel!',
                }).then(function(value) {
                        window.location.href = window.location.href;
                });
            }
        }
    });
});


// Register

$("#userRegister").submit(function(e){
    e.preventDefault();

    var registerUrl = $(this).attr('action');
    var formData = $(this).serialize();
    $.ajax({
        type: "post",
        url: registerUrl,
        data: formData,
        dataType: "json",
        success: function (data) {
            if(data.status == 200){
                $(".modal").hide();
                swal({
                    title: 'Registered',
                    text: data.message,
                    icon: 'success',
                    timer: 1500,
                    showConfirmButton: false
                }).then(function(value) {
                    window.location.href = window.location.href;
                });
            }else if(data.status == 500){
                $('#register_error').html('');
                $('#register_error').html('<br><div class="alert alert-danger"><strong>Alert!</strong> '+data.message+'</div>');
            }
        }
    });

});
