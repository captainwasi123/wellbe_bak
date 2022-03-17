$(document).ready(function() {

    "use strict";
    var ref = $('meta[name=host]').attr('content');

    //Order View

    $(document).on('click', '.orderModal', function() {
        var id = $(this).data('id');

        $('.orderView').modal('show');
        $('#orderViewContent').html('<img src="' + ref + '/public/assets/images/loaderr.gif">');

        $.get(ref + "/admin/view/" + id, function(data) {
            $('#orderViewContent').html(data);
        });
    });


    $(document).on('click', '.orderCancel', function() {
        var id = $(this).data('ref');
        $('.orderView').modal('hide');
        $('.orderModalCancel').modal('show');

        $('#oid').val(id);
    });


    $(document).on('keyup', '#addAddonPrice', function(){
        var price = parseFloat($(this).val());
        var gst = parseFloat($('#mtp_gst').val());
        var com = parseFloat($('#mtp_com').val());
        var sale = ((price/100)*gst)+price;
        var com = price-((price/100)*com);

        $('#addAddonSalePrice').val(sale.toFixed(2));
        $('#addAddonTakeHome').val(com.toFixed(2));
    });

    $(document).on('keyup', '#editAddonPrice', function(){
        var price = parseFloat($(this).val());
        var gst = parseFloat($('#mtp_gst').val());
        var com = parseFloat($('#mtp_com').val());
        var sale = ((price/100)*gst)+price;
        var com = price-((price/100)*com);

        $('#editAddonSalePrice').val(sale.toFixed(2));
        $('#editAddonTakeHome').val(com.toFixed(2));
    });

    $(document).on('click', '.comEdit', function(){
        $('.defaultComBlock').css({display: 'none'});
        $('.editComBlock').css({display: 'block'});
    });

    $(document).on('click', '.refundEdit', function(){
        $('.defaultRefundBlock').css({display: 'none'});
        $('.editRefundBlock').css({display: 'block'});
    });

    $(document).on('click', '.amountEdit', function(){
        $('.defaultPractAmountBlock').css({display: 'none'});
        $('.editPractAmountBlock').css({display: 'block'});
        $('.defaultCustAmountBlock').css({display: 'none'});
        $('.editCustAmountBlock').css({display: 'block'});
    });

    $(document).on('click', '.saveAmountPercentage', function(){
        var id = $('#orderId').val();
        var token = $('#token').val();
        var practAmount = parseInt($('#practAmount').val());
        var custAmount = parseInt($('#custAmount').val());
        if((practAmount+custAmount) <= 100){
            var data = {_token: token, oid: id, practAmount: practAmount, custAmount:custAmount};
            $.post(ref+'/admin/practAmountEdit', data, function(response) {
                $('#practAmount').val(response.data.practAmount);
                $('#custAmount').val(response.data.custAmount);
                $('.defaultPractAmountBlock strong').html(response.data.practAmount+'%');
                $('.defaultCustAmountBlock strong').html(response.data.custAmount+'%');

                $('.defaultPractAmountBlock').css({display: 'block'});
                $('.editPractAmountBlock').css({display: 'none'});
                $('.defaultCustAmountBlock').css({display: 'block'});
                $('.editCustAmountBlock').css({display: 'none'});

            }, 'json');
        }else{
            alert('Payment percentages cannot exceed 100% of the booking amount.');
        }
    });

    $(document).on('click','#bulkMarkCompleted', function() {
        var array = [];
        $("input:checkbox[name=orderIds]:checked").each(function() {
            array.push($(this).val());
        });
        var token = $('#token').val();
        $.ajax({
           type: "POST",
           data: {_token: token,status:'1', ids:array},
           url: ref+'/admin/completed/mark',
           success: function(msg){
            window.location.href = ref+'/admin/completed/marked';
           }
        });
    });

    $(document).on('click','#bulkUnmarkCompleted', function() {
        var array = [];
        $("input:checkbox[name=orderIds]:checked").each(function() {
            array.push($(this).val());
        });
        var token = $('#token').val();
        $.ajax({
           type: "POST",
           data: {_token: token,status:'0', ids:array},
           url: ref+'/admin/completed/mark',
           success: function(msg){
            window.location.href = ref+'/admin/completed/marked';
           }
        });
    });


    //Practitioner

    $(document).on('change', '.disableUser', function() {
        var id = $(this).data('ref');
        if (this.checked) {
            $('.assumeUserModal').modal('show');
            $('#apid').val(id);


        } else {
            $('.disableUserModal').modal('show');
            $('#dpid').val(id);


        }


    });


    //Services

    $(document).on('keyup', '#addServicePrice', function(){
        var price = parseFloat($(this).val());
        var gst = parseFloat($('#mtp_gst').val());
        var com = parseFloat($('#mtp_com').val());
        var sale = ((price/100)*gst)+price;
        var com = price-((price/100)*com);

        $('#addServiceSalePrice').val(sale.toFixed(2));
        $('#addServiceTakehomePrice').val(com.toFixed(2));
    });


    $(document).on('keyup', '#editServicePrice', function(){
        var price = parseFloat($(this).val());
        var gst = parseFloat($('#mtp_gst').val());
        var com = parseFloat($('#mtp_com').val());
        var sale = ((price/100)*gst)+price;
        var com = price-((price/100)*com);

        $('#editServiceSalePrice').val(sale.toFixed(2));
        $('#editServiceTakehomePrice').val(com.toFixed(2));
    });





    //mark as paid

    $(document).on('click', '.markasPaid', function() {
        var id = $(this).data('ref');

        if (confirm("Are you sure want to mark as paid?")) {
            window.location.href = ref + "/admin/booking/markaspaid/" + id;
        }
    });

    $(document).on('click', '.unmarkasPaid', function() {
        var id = $(this).data('ref');

        if (confirm("Are you sure want to unmark as paid?")) {
            window.location.href = ref + "/admin/booking/unmarkaspaid/" + id;
        }
    });


    //mark as paid ---- Customer

    $(document).on('click', '.cust_markasPaid', function() {
        var id = $(this).data('ref');

        if (confirm("Are you sure want to mark as paid?")) {
            window.location.href = ref + "/admin/bookingCancel/customer/mark/" + id;
        }
    });

    $(document).on('click', '.cust_unmarkasPaid', function() {
        var id = $(this).data('ref');

        if (confirm("Are you sure want to unmark as paid?")) {
            window.location.href = ref + "/admin/bookingCancel/customer/unmark/" + id;
        }
    });


    //mark as paid ---- Practitioner

    $(document).on('click', '.pract_markasPaid', function() {
        var id = $(this).data('ref');

        if (confirm("Are you sure want to mark as paid?")) {
            window.location.href = ref + "/admin/bookingCancel/practitioner/mark/" + id;
        }
    });

    $(document).on('click', '.pract_unmarkasPaid', function() {
        var id = $(this).data('ref');

        if (confirm("Are you sure want to unmark as paid?")) {
            window.location.href = ref + "/admin/bookingCancel/practitioner/unmark/" + id;
        }
    });



    //Practitioner Manage Category

    $(document).on('click', '.manageCategory', function() {
        var id = $(this).data('id');

        $('.manageCategoryModal').modal('show');
        $('#manageCategoryModalBody').html('<img src="' + ref + '/public/assets/images/loaderr.gif">');

        $.get(ref + "/admin/practitioners/manageCategory/" + id, function(data) {
            $('#manageCategoryModalBody').html(data);
        });
    });



    //Services
    //Add Service
    $(document).on('click', '.addService', function() {
        var id = $(this).data('id');
        $('#cat_id').val(id);
        $('.addServiceModal').modal('show');
    });

    // Delete Service

    $(document).on('click', '.deleteService', function() {
        var id = $(this).data('id');

        if (confirm('Are you sure want to delete this?')) {
            window.location.href = ref + "/admin/services/delete/" + id;
        }
    });

    // Disable Service

    $(document).on('click', '.disableService', function() {
        var id = $(this).data('id');

        if (confirm('Are you sure want to disable this?')) {
            window.location.href = ref + "/admin/services/disable/" + id;
        }
    });
    // Disable Service

    $(document).on('click', '.enableService', function() {
        var id = $(this).data('id');

        if (confirm('Are you sure want to enable this?')) {
            window.location.href = ref + "/admin/services/enable/" + id;
        }
    });

    //Edit Service

    $(document).on('click', '.editService', function() {
        var id = $(this).data('id');

        $('.editServiceModal').modal('show');
        $('#editServiceModalBody').html('<img src="' + ref + '/public/assets/images/loaderr.gif">');

        $.get(ref + "/admin/services/edit/" + id, function(data) {
            $('#editServiceModalBody').html(data);
        });
    });

    //Service Detail
    $(document).on('click', '.serviceDetail', function() {
        var id = $(this).data('id');
        $('#service_detail_block').html('<img src="' + ref + '/public/assets/images/loaderr.gif">');

        $.get(ref + "/admin/services/detail/" + id, function(data) {
            $('#service_detail_block').html(data);
        });
    });

    //Service Addons
    $(document).on('click', '.addAddons', function() {
        var id = $(this).data('id');
        $('#service_id').val(id);
        $('.addAddonModal').modal('show');
    });

    //Delete Service Addons
    $(document).on('click', '.deleteServiceAddon', function() {
        var id = $(this).data('id');

        if (confirm('Are you sure want to delete this?')) {
            window.location.href = ref + "/admin/services/addons/delete/" + id;
        }
    });

    $(document).on('click', '.editServiceAddon', function() {
        var id = $(this).data('id');
        $.get(ref+'/admin/services/addons/edit/'+id, function(data){
            $('#addon_item_edit').html(data);
            $('.editAddonModal').modal('show');
        });
    });

    //Enable Service Addons
    $(document).on('click', '.enableServiceAddon', function() {
        var id = $(this).data('id');

        if (confirm('Are you sure want to enable this?')) {
            window.location.href = ref + "/admin/services/addons/enable/" + id;
        }
    });

    //Disable Service Addons
    $(document).on('click', '.disableServiceAddon', function() {
        var id = $(this).data('id');

        if (confirm('Are you sure want to disable this?')) {
            window.location.href = ref + "/admin/services/addons/disable/" + id;
        }
    });


    $(document).on('click', '.addItemAddons', function() {
        $('#addon_item_add').append('<div class="row"><div class="col-md-4 col-lg-4 col-sm-6 col-xs-12"> <div class="form-field2"><input type="text" placeholder="Enter type" name="duration[]" required></div></div> <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12"> <div class="form-field2"><input type="text" placeholder="Enter price" name="price[]" style="padding-left: 50px;" required><span class="static-tag1 col-black"> NZ$  </span></div></div> <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12"> <div class="form-field2"><a href="javascript:void(0)" class="pull-right col-black removeItemAddon" style="margin-top: 12px;"> <i class="fa fa-trash"> </i> </a></div></div>   </div>');
    });

    $(document).on('click', '.removeItemAddon', function() {
        $(this).parent().parent().parent().remove();
    });





});
