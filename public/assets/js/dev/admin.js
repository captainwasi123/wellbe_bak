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


    $(document).on('click', '.addItemAddons', function() {
        $('#addon_item_add').append('<div class="row"><div class="col-md-4 col-lg-4 col-sm-6 col-xs-12"> <div class="form-field2"><input type="text" placeholder="Enter type" name="duration[]" required></div></div> <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12"> <div class="form-field2"><input type="text" placeholder="Enter price" name="price[]" style="padding-left: 50px;" required><span class="static-tag1 col-black"> NZ$  </span></div></div> <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12"> <div class="form-field2"><a href="javascript:void(0)" class="pull-right col-black removeItemAddon" style="margin-top: 12px;"> <i class="fa fa-trash"> </i> </a></div></div>   </div>');
    });

    $(document).on('click', '.removeItemAddon', function() {
        $(this).parent().parent().parent().remove();
    });





});
