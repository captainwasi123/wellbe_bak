$(document).ready(function() {
    'use strict'

    var ref = $('meta[name=host]').attr('content');


    $(document).on('click', '.cart-btn1', function(){
       var totalAmount = parseFloat($('#totalAmountTray').val());
       var totalDuration = parseFloat($('#totalDurationTray').val());
       var currAmount = parseFloat($(this).data('price'));
       var currDuration = parseFloat($(this).data('duration'));

       var color = $( this ).css( "background-color" );
       if (color == 'rgb(93, 78, 109)') {
            var disAmount = totalAmount+currAmount;
            var disDuration = totalDuration+currDuration;
            $('#totalAmountTray').val(disAmount);
            $('#totalAmountTrayDisplay').html("From: $"+disAmount);

            $('#totalDurationTray').val(disDuration);
            $('#totalDurationTrayDisplay').html(disDuration+" mins");
          $(this).html('Added');
       }else{
            var disAmount = totalAmount-currAmount;
            var disDuration = totalDuration-currDuration;
            $('#totalAmountTray').val(disAmount);
            $('#totalAmountTrayDisplay').html("From: $"+disAmount);

            $('#totalDurationTray').val(disDuration);
            $('#totalDurationTrayDisplay').html(disDuration+" mins");
          $(this).html('Add');
       }
    });


    $(document).on('click', '.filterCat', function() {
        var val = $(this).data('val');
        insertParam('cat', val);
    });


    $(document).on('click', '.serviceDetails', function() {
        var id = $(this).data('id');

        $('.serviceDetailsModal').modal('show');
        $('#serviceDetailsModalBody').html('<img src="' + ref + '/public/assets/web/new/images/loaderr.gif"/>');
        $.get(ref + "/treatments/services/" + id, function(data) {
            $('#serviceDetailsModalBody').html(data);
        });
    });

    $(document).on('click', '.addServiceToCart', function(){
        var id = $(this).data('id');
        $('#serviceDetailsModalBody').html('<img src="' + ref + '/public/assets/web/new/images/loaderr.gif"/>');
        $.get(ref + "/treatments/services/addons/" + id, function(data) {
            $('#serviceDetailsModalBody').html(data);
        });
    });

    $(document).on('click', '.removeItemCart', function() {
        var id = $(this).data('id');

        if (confirm("Are you sure you would like to remove this item from your cart?")) {
            window.location.href = ref + "/treatments/services/removeItem/" + id;
        }
    });


    //View User Profile
    $(document).on('click', '.viewUserProfile', function() {
        var id = $(this).data('id');

        $('.userProfileModal').modal('show');
        $('#userProfileModalBody').html('<img src="' + ref + '/public/assets/web/new/images/loaderr.gif"/>');
        $.get(ref + "/treatments/booking/profile/" + id, function(data) {
            $('#userProfileModalBody').html(data);
        });
    });

    $(document).on('change', '.timeslot', function() {
        let time = $(this).data('time');
        let prac = $(this).data('prac');
        let date = $('#booking_date').val();
        $('#step1Summary').html('<img src="' + ref + '/public/assets/web/new/images/loaderr.gif"/>');
        $.post(ref + "/treatments/booking/step_1/summary", { 'id': prac, 'time': time, 'date': date, '_token': $('meta[name="token"]').attr('content') })
            .done(function(data) {
                $('#step1Summary').html(data);
                //console.log(data);
            });

        $("#checkout_btn").removeAttr("type");
    });


    //Profile Tabs
    $(document).on('click', '.nav-tabs .nav-link', function(e){
        e.preventDefault();
        $(this).tab("show");
    })
});



function insertParam(key, value) {
    key = encodeURIComponent(key);
    value = encodeURIComponent(value);

    // kvp looks like ['key1=value1', 'key2=value2', ...]
    var kvp = document.location.search.substr(1).split('&');
    let i = 0;

    for (; i < kvp.length; i++) {
        if (kvp[i].startsWith(key + '=')) {
            let pair = kvp[i].split('=');
            pair[1] = value;
            kvp[i] = pair.join('=');
            break;
        }
    }

    if (i >= kvp.length) {
        kvp[kvp.length] = [key, value].join('=');
    }

    // can return this or...
    let params = kvp.join('&');

    // reload page with new params
    document.location.search = params;
}


function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

$('#treatmentForm').submit(function(event) {
    event.preventDefault(); 
    
    var $form = $(this);
    var values = getFormData($form);

    if(values['lat'] == '' || values['long'] == ''){
        alert('Please enter the valid address!');
    }else{
        $(this).unbind('submit').submit();
    }

});

$('#mtreatmentForm').submit(function(event) {
    event.preventDefault(); 
    
    var $form = $(this);
    var values = getFormData($form);

    if(values['lat'] == '' || values['long'] == ''){
        alert('Please enter the valid address!');
    }else{
        $(this).unbind('submit').submit();
    }

});


function getFormData($form){
    var unindexed_array = $form.serializeArray();
    var indexed_array = {};

    $.map(unindexed_array, function(n, i){
        indexed_array[n['name']] = n['value'];
    });

    return indexed_array;
}