$(document).ready(function(){
	'use strict'

	var ref = $('meta[name=host]').attr('content');



	$(document).on('click', '.filterCat', function(){
		var val = $(this).data('val');
		insertParam('cat', val);
	});


	$(document).on('click', '.serviceDetails', function(){
		var id = $(this).data('id');

		$('.serviceDetailsModal').modal('show');
		$('#serviceDetailsModalBody').html('<img src="'+ref+'/public/assets/web/new/images/loader.gif"/>');
		$.get( ref+"/treatments/services/"+id, function( data ) {
		  $('#serviceDetailsModalBody').html( data );
		});
	});

	$(document).on('click', '.removeItemCart', function(){
		var id = $(this).data('id');
		
		if(confirm("Are you sure remove this item?")){
			window.location.href = ref+"/treatments/services/removeItem/"+id;
		}
	});


	//View User Profile
	$(document).on('click', '.viewUserProfile', function(){
		var id = $(this).data('id');

		$('.userProfileModal').modal('show');
		$('#userProfileModalBody').html('<img src="'+ref+'/public/assets/web/new/images/loader.gif"/>');
		$.get( ref+"/treatments/booking/profile/"+id, function( data ) {
		  $('#userProfileModalBody').html( data );
		});
	});

	$(document).on('change', '.timeslot', function(){
		let time = $(this).data('time');
		let prac = $(this).data('prac');
		let date = $('#booking_date').val();
		$('#step1Summary').html('<img src="'+ref+'/public/assets/web/new/images/loader.gif"/>');
		$.post( ref+"/treatments/booking/step_1/summary", { 'id': prac, 'time': time, 'date': date, '_token': $('meta[name="token"]').attr('content') })
		  .done(function( data ) {
		    $('#step1Summary').html( data );
		    //console.log(data);
		  });

		$("#checkout_btn").removeAttr("type");
	});
});



function insertParam(key, value) {
    key = encodeURIComponent(key);
    value = encodeURIComponent(value);

    // kvp looks like ['key1=value1', 'key2=value2', ...]
    var kvp = document.location.search.substr(1).split('&');
    let i=0;

    for(; i<kvp.length; i++){
        if (kvp[i].startsWith(key + '=')) {
            let pair = kvp[i].split('=');
            pair[1] = value;
            kvp[i] = pair.join('=');
            break;
        }
    }

    if(i >= kvp.length){
        kvp[kvp.length] = [key,value].join('=');
    }

    // can return this or...
    let params = kvp.join('&');

    // reload page with new params
    document.location.search = params;
}


function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
