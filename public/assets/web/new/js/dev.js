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