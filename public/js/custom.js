
$(document).ready(function () {
    $("#select-catagory").selectize({
        create: true,
        sortField: "text",

    });
    $("#select-name").selectize({
        create: true,
        sortField: "text",

    });
    $("#select-item").selectize({
        create: true,
        sortField: "text",

    });
    $("#select-bot-name").selectize({
        create: true,
        sortField: "text",

    });  $("#select-height").selectize({
        create: true,
        sortField: "text",

    });

    init_DataTables();
    function init_DataTables() {
        if (typeof ($.fn.DataTable) === 'undefined') {
            return;
        }
        var handleDataTableButtons = function () {
            if ($("#jstable").length) {
                $("#jstable").DataTable({
                    dom: "Blfrtip",
                    keys: true,
                    buttons: [
                        {
                            extend: "copy",
                            className: "btn-sm"
                        },
                        {
                            extend: "csv",
                            className: "btn-sm"
                        },
                        {
                            extend: "excel",
                            className: "btn-sm"
                        },
                        {
                            extend: "pdfHtml5",
                            className: "btn-sm"
                        },
                        {
                            extend: "print",
                            className: "btn-sm"
                        },
                    ],
                    responsive: true
                });

            }

            if ($("#jstable2").length) {
                $("#jstable2").DataTable({
                    dom: "Blfrtip",

                    keys: true,
                    buttons: [

                    ],
                    responsive: true
                });
            }

        };


        TableManageButtons = function () {
            "use strict";
            return {
                init: function () {
                    handleDataTableButtons();
                }
            };
        }();
        TableManageButtons.init();
    };



    $("#role-create").submit(function (e) {
         e.preventDefault();
         var formDate =$("#role-create").serialize();
         var token  =$("#_token").val();

        $.ajax({

            url: base+'/role/create',
            type: 'POST',
            data: formDate,
            headers: {
                "X-CSRF-Token": token,
            },

            beforeSend: function(arr, $form, options) {
                var clickedBtn = $("#roleCreateSubmit");
                clickedBtn.attr('data-text', clickedBtn.html()).html('Saving...').attr('disabled', true);
            },
            success: function(data, statusText, xhr, $form) {
                if(data.success){

                    $("#response").hide().html('<div class="alert alert-' + data.alert + ' alert-dismissable"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> ' + data.message + ' </div>');
                    $("#response").slideDown();


                }else{

                    var errList = '<ul>';
                    $.each(data.errors, function(index, error){
                        errList += '<li>'+error+'</li>';
                    });
                    errList += '</ul>'
                    $("#response").hide().html('<div class="alert alert-' + data.alert + ' alert-dismissable"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> ' + errList + ' </div>');
                    $("#response").slideDown();
                }
                var clickedBtn = $("#roleCreateSubmit");
                clickedBtn.attr('data-text', clickedBtn.html()).html('Submit').prop("disabled",false);

            },
            error: function(data) {

            },
            complete: function() {
                // btn.html(btn.data('text')).removeClass('disabled');
                // edit.removeClass('disabled');
            }
        });

    });



    $("#role-edit-submit").submit(function (e) {
        e.preventDefault();
        var formDate =$("#role-edit-submit").serialize();
        var token  =$("#_token").val();


        $.ajax({

            url: base+'/roles/edit',
            type: 'POST',
            data: formDate,
            headers: {
                "X-CSRF-Token": token,
            },

            beforeSend: function(arr, $form, options) {
                var clickedBtn = $("#role-update");
                clickedBtn.attr('data-text', clickedBtn.html()).html('Updating...').attr('disabled', true);
            },
            success: function(data, statusText, xhr, $form) {
                if(data.success){

                    $("#response").hide().html('<div class="alert alert-' + data.alert + ' alert-dismissable"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> ' + data.message + ' </div>');
                    $("#response").slideDown();


                }else{

                    var errList = '<ul>';
                    $.each(data.errors, function(index, error){
                        errList += '<li>'+error+'</li>';
                    });
                    errList += '</ul>'
                    $("#response").hide().html('<div class="alert alert-' + data.alert + ' alert-dismissable"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> ' + errList + ' </div>');
                    $("#response").slideDown();
                }
                var clickedBtn = $("#role-update");
                clickedBtn.attr('data-text', clickedBtn.html()).html('Submit').prop("disabled",false);

            },
            error: function(data) {

            },
            complete: function() {
                // btn.html(btn.data('text')).removeClass('disabled');
                // edit.removeClass('disabled');
            }
        });

    });


    $('table .del-role-btn').click(function(e){

        e.preventDefault();
        var btn = $(this);
        var edit = $(this).parent().children('a');
        var row = $(this).parent().parent('tr');
        var form_ID = $(this).data('delform');
        $(this).parent().parent('tr').attr('style', 'background-color:#FFECEE');

        if(confirm('Are you sure you want to delete this record?')){
            var formData = $('#'+form_ID).serialize();
            var token = $('#'+form_ID+' input[name="_token"]').val();
            var id = $('#'+form_ID+' input[name="id"]').val();
             console.log(formData);
            $.ajax( {
                url: base+"/roles/delete",
                type: 'POST',
                data: formData,
                headers: {
                    "X-CSRF-Token": token,
                },
                beforeSend: function(arr, $form, options) {
                    btn.attr('data-text', btn.html()).html('Wait...').addClass('disabled');
                    edit.addClass('disabled');
                },
                success: function(data) {
                    if(data.success){
                        row.remove();
                    }
                },
                error: function(data) {

                },
                complete: function() {
                    btn.html(btn.data('text')).removeClass('disabled');
                    edit.removeClass('disabled');
                }
            });
        }else{
            $(this).parent().parent().removeAttr('style');
        }
    });

    $("#user-create").submit(function (e) {
        e.preventDefault();
        var formDate =$("#user-create").serialize();
        var token  =$("#_token").val();

        $.ajax({

            url: base+'/users/create',
            type: 'POST',
            data: formDate,
            headers: {
                "X-CSRF-Token": token,
            },

            beforeSend: function(arr, $form, options) {
                var clickedBtn = $("#roleCreateSubmit");
                clickedBtn.attr('data-text', clickedBtn.html()).html('Saving...').attr('disabled', true);
            },
            success: function(data, statusText, xhr, $form) {
                if(data.success){

                    $("#response").hide().html('<div class="alert alert-' + data.alert + ' alert-dismissable"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> ' + data.message + ' </div>');
                    $("#response").slideDown();


                }else{

                    var errList = '<ul>';
                    $.each(data.errors, function(index, error){
                        errList += '<li>'+error+'</li>';
                    });
                    errList += '</ul>'
                    $("#response").hide().html('<div class="alert alert-' + data.alert + ' alert-dismissable"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> ' + errList + ' </div>');
                    $("#response").slideDown();
                }
                var clickedBtn = $("#roleCreateSubmit");
                clickedBtn.attr('data-text', clickedBtn.html()).html('Submit').prop("disabled",false);

            },
            error: function(data) {

            },
            complete: function() {
                // btn.html(btn.data('text')).removeClass('disabled');
                // edit.removeClass('disabled');
            }
        });

    });

    $('table .del-role-btn').click(function(e){

        e.preventDefault();
        var btn = $(this);
        var edit = $(this).parent().children('a');
        var row = $(this).parent().parent('tr');
        var form_ID = $(this).data('delform');
        $(this).parent().parent('tr').attr('style', 'background-color:#FFECEE');

        if(confirm('Are you sure you want to delete this record?')){
            var formData = $('#'+form_ID).serialize();
            var token = $('#'+form_ID+' input[name="_token"]').val();
            var id = $('#'+form_ID+' input[name="id"]').val();
            console.log(formData);
            $.ajax( {
                url: base+"/roles/delete",
                type: 'POST',
                data: formData,
                headers: {
                    "X-CSRF-Token": token,
                },
                beforeSend: function(arr, $form, options) {
                    btn.attr('data-text', btn.html()).html('Wait...').addClass('disabled');
                    edit.addClass('disabled');
                },
                success: function(data) {
                    if(data.success){
                        row.remove();
                    }
                },
                error: function(data) {

                },
                complete: function() {
                    btn.html(btn.data('text')).removeClass('disabled');
                    edit.removeClass('disabled');
                }
            });
        }else{
            $(this).parent().parent().removeAttr('style');
        }
    });

    $("#user-edit-form").submit(function (e) {
        e.preventDefault();
        var formDate =$("#user-edit-form").serialize();
        var token  =$("#_token").val();

        $.ajax({

            url: base+'/users/edit',
            type: 'POST',
            data: formDate,
            headers: {
                "X-CSRF-Token": token,
            },

            beforeSend: function(arr, $form, options) {
                var clickedBtn = $("#user-edit");
                clickedBtn.attr('data-text', clickedBtn.html()).html('Saving...').attr('disabled', true);
            },
            success: function(data, statusText, xhr, $form) {
                if(data.success){

                    $("#response").hide().html('<div class="alert alert-' + data.alert + ' alert-dismissable"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> ' + data.message + ' </div>');
                    $("#response").slideDown();


                }else{

                    var errList = '<ul>';
                    $.each(data.errors, function(index, error){
                        errList += '<li>'+error+'</li>';
                    });
                    errList += '</ul>'
                    $("#response").hide().html('<div class="alert alert-' + data.alert + ' alert-dismissable"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> ' + errList + ' </div>');
                    $("#response").slideDown();
                }
                var clickedBtn = $("#user-edit");
                clickedBtn.attr('data-text', clickedBtn.html()).html('Submit').prop("disabled",false);

            },
            error: function(data) {

            },
            complete: function() {
                // btn.html(btn.data('text')).removeClass('disabled');
                // edit.removeClass('disabled');
            }
        });

    });

    $('table .del-user-btn').click(function(e){

        e.preventDefault();
        var btn = $(this);
        var edit = $(this).parent().children('a');
        var row = $(this).parent().parent('tr');
        var form_ID = $(this).data('delform');
        $(this).parent().parent('tr').attr('style', 'background-color:#FFECEE');

        if(confirm('Are you sure you want to delete this record?')){
            var formData = $('#'+form_ID).serialize();
            var token = $('#'+form_ID+' input[name="_token"]').val();
            var id = $('#'+form_ID+' input[name="id"]').val();
            console.log(formData);
            $.ajax( {
                url: base+"/users/delete",
                type: 'POST',
                data: formData,
                headers: {
                    "X-CSRF-Token": token,
                },
                beforeSend: function(arr, $form, options) {
                    btn.attr('data-text', btn.html()).html('Wait...').addClass('disabled');
                    edit.addClass('disabled');
                },
                success: function(data) {
                    if(data.success){
                        row.remove();
                    }
                },
                error: function(data) {

                },
                complete: function() {
                    btn.html(btn.data('text')).removeClass('disabled');
                    edit.removeClass('disabled');
                }
            });
        }else{
            $(this).parent().parent().removeAttr('style');
        }
    });

    $("#main-category-create").submit(function (e) {
        e.preventDefault();
        var formDate =$("#main-category-create").serialize();
        var token  =$("#_token").val();

        console.log('klfsjlfdjaklf');
        $.ajax({

            url: base+'/mainCategory/create',
            type: 'POST',
            data: formDate,
            headers: {
                "X-CSRF-Token": token,
            },

            beforeSend: function(arr, $form, options) {
                var clickedBtn = $("#roleCreateSubmit");
                clickedBtn.attr('data-text', clickedBtn.html()).html('Saving...').attr('disabled', true);
            },
            success: function(data, statusText, xhr, $form) {
                if(data.success){

                    $("#response").hide().html('<div class="alert alert-' + data.alert + ' alert-dismissable"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> ' + data.message + ' </div>');
                    $("#response").slideDown();


                }else{

                    var errList = '<ul>';
                    $.each(data.errors, function(index, error){
                        errList += '<li>'+error+'</li>';
                    });
                    errList += '</ul>'
                    $("#response").hide().html('<div class="alert alert-' + data.alert + ' alert-dismissable"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> ' + errList + ' </div>');
                    $("#response").slideDown();
                }
                var clickedBtn = $("#roleCreateSubmit");
                clickedBtn.attr('data-text', clickedBtn.html()).html('Submit').prop("disabled",false);

            },
            error: function(data) {

            },
            complete: function() {
                // btn.html(btn.data('text')).removeClass('disabled');
                // edit.removeClass('disabled');
            }
        });

    });

    $("#main-category-edit-submit").submit(function (e) {
        e.preventDefault();
        var formDate =$("#main-category-edit-submit").serialize();
        var token  =$("#_token").val();

         console.log('lkflsadflk');
        $.ajax({

            url: base+'/mainCategory/edit',
            type: 'POST',
            data: formDate,
            headers: {
                "X-CSRF-Token": token,
            },

            beforeSend: function(arr, $form, options) {
                var clickedBtn = $("#user-edit");
                clickedBtn.attr('data-text', clickedBtn.html()).html('Saving...').attr('disabled', true);
            },
            success: function(data, statusText, xhr, $form) {
                if(data.success){

                    $("#response").hide().html('<div class="alert alert-' + data.alert + ' alert-dismissable"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> ' + data.message + ' </div>');
                    $("#response").slideDown();


                }else{

                    var errList = '<ul>';
                    $.each(data.errors, function(index, error){
                        errList += '<li>'+error+'</li>';
                    });
                    errList += '</ul>'
                    $("#response").hide().html('<div class="alert alert-' + data.alert + ' alert-dismissable"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> ' + errList + ' </div>');
                    $("#response").slideDown();
                }
                var clickedBtn = $("#user-edit");
                clickedBtn.attr('data-text', clickedBtn.html()).html('Submit').prop("disabled",false);

            },
            error: function(data) {

            },
            complete: function() {
                // btn.html(btn.data('text')).removeClass('disabled');
                // edit.removeClass('disabled');
            }
        });

    });

    $('table .del-main-category-btn').click(function(e){

        e.preventDefault();
        var btn = $(this);
        var edit = $(this).parent().children('a');
        var row = $(this).parent().parent('tr');
        var form_ID = $(this).data('delform');
        $(this).parent().parent('tr').attr('style', 'background-color:#FFECEE');

        if(confirm('Are you sure you want to delete this record?')){
            var formData = $('#'+form_ID).serialize();
            var token = $('#'+form_ID+' input[name="_token"]').val();
            var id = $('#'+form_ID+' input[name="id"]').val();

            $.ajax( {
                url: base+"/mainCategory/delete",
                type: 'POST',
                data: formData,
                headers: {
                    "X-CSRF-Token": token,
                },
                beforeSend: function(arr, $form, options) {
                    btn.attr('data-text', btn.html()).html('Wait...').addClass('disabled');
                    edit.addClass('disabled');
                },
                success: function(data) {
                    if(data.success){
                        row.remove();
                    }
                },
                error: function(data) {

                },
                complete: function() {
                    btn.html(btn.data('text')).removeClass('disabled');
                    edit.removeClass('disabled');
                }
            });
        }else{
            $(this).parent().parent().removeAttr('style');
        }
    });

    $("#sub-category-create").submit(function (e) {
        e.preventDefault();
        var formDate =$("#sub-category-create").serialize();
        var token  =$("#_token").val();

        console.log('sub');
        $.ajax({

            url: base+'/subCategory/create',
            type: 'POST',
            data: formDate,
            headers: {
                "X-CSRF-Token": token,
            },

            beforeSend: function(arr, $form, options) {
                var clickedBtn = $("#roleCreateSubmit");
                clickedBtn.attr('data-text', clickedBtn.html()).html('Saving...').attr('disabled', true);
            },
            success: function(data, statusText, xhr, $form) {
                if(data.success){

                    $("#response").hide().html('<div class="alert alert-' + data.alert + ' alert-dismissable"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> ' + data.message + ' </div>');
                    $("#response").slideDown();


                }else{

                    var errList = '<ul>';
                    $.each(data.errors, function(index, error){
                        errList += '<li>'+error+'</li>';
                    });
                    errList += '</ul>'
                    $("#response").hide().html('<div class="alert alert-' + data.alert + ' alert-dismissable"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> ' + errList + ' </div>');
                    $("#response").slideDown();
                }
                var clickedBtn = $("#roleCreateSubmit");
                clickedBtn.attr('data-text', clickedBtn.html()).html('Submit').prop("disabled",false);

            },
            error: function(data) {

            },
            complete: function() {
                // btn.html(btn.data('text')).removeClass('disabled');
                // edit.removeClass('disabled');
            }
        });

    });

    $("#sub-category-edit-submit").submit(function (e) {
        e.preventDefault();
        var formDate =$("#sub-category-edit-submit").serialize();
        var token  =$("#_token").val();

        $.ajax({

            url: base+'/subCategory/edit',
            type: 'POST',
            data: formDate,
            headers: {
                "X-CSRF-Token": token,
            },

            beforeSend: function(arr, $form, options) {
                var clickedBtn = $("#user-edit");
                clickedBtn.attr('data-text', clickedBtn.html()).html('Saving...').attr('disabled', true);
            },
            success: function(data, statusText, xhr, $form) {
                if(data.success){

                    $("#response").hide().html('<div class="alert alert-' + data.alert + ' alert-dismissable"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> ' + data.message + ' </div>');
                    $("#response").slideDown();


                }else{

                    var errList = '<ul>';
                    $.each(data.errors, function(index, error){
                        errList += '<li>'+error+'</li>';
                    });
                    errList += '</ul>'
                    $("#response").hide().html('<div class="alert alert-' + data.alert + ' alert-dismissable"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> ' + errList + ' </div>');
                    $("#response").slideDown();
                }
                var clickedBtn = $("#user-edit");
                clickedBtn.attr('data-text', clickedBtn.html()).html('Submit').prop("disabled",false);

            },
            error: function(data) {

            },
            complete: function() {
                // btn.html(btn.data('text')).removeClass('disabled');
                // edit.removeClass('disabled');
            }
        });

    });

    $('table .del-sub-category-btn').click(function(e){

        e.preventDefault();
        var btn = $(this);
        var edit = $(this).parent().children('a');
        var row = $(this).parent().parent('tr');
        var form_ID = $(this).data('delform');
        $(this).parent().parent('tr').attr('style', 'background-color:#FFECEE');

        if(confirm('Are you sure you want to delete this record?')){
            var formData = $('#'+form_ID).serialize();
            var token = $('#'+form_ID+' input[name="_token"]').val();
            var id = $('#'+form_ID+' input[name="id"]').val();

            $.ajax( {
                url: base+"/subCategory/delete",
                type: 'POST',
                data: formData,
                headers: {
                    "X-CSRF-Token": token,
                },
                beforeSend: function(arr, $form, options) {
                    btn.attr('data-text', btn.html()).html('Wait...').addClass('disabled');
                    edit.addClass('disabled');
                },
                success: function(data) {
                    if(data.success){
                        row.remove();
                    }
                },
                error: function(data) {

                },
                complete: function() {
                    btn.html(btn.data('text')).removeClass('disabled');
                    edit.removeClass('disabled');
                }
            });
        }else{
            $(this).parent().parent().removeAttr('style');
        }
    });

    $('form .create-items').click(function(e){
        e.preventDefault();
        var btn = $(this);
        var form_ID = $(this).data('delform');
            var token = $('#_token').val();
            var formData = new FormData($('#'+form_ID)[0]);
            console.log(formData);


        $.ajax({

            url: base+"/createItems/create",
            type: 'POST',
            data: formData,
            processData: false,
            contentType : false,
            cache:false,
            headers: {
                "X-CSRF-Token": token,
            },

            beforeSend: function(arr, $form, options) {
                var clickedBtn = $("#submit-new-item");
                clickedBtn.attr('data-text', clickedBtn.html()).html('Saving...').attr('disabled', true);
            },
            success: function(data, statusText, xhr, $form) {
                if(data.success){

                    $("#response").hide().html('<div class="alert alert-' + data.alert + ' alert-dismissable"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> ' + data.message + ' </div>');
                    $("#response").slideDown();

                }else{

                    var errList = '<ul>';
                    $.each(data.errors, function(index, error){
                        errList += '<li>'+error+'</li>';
                    });
                    errList += '</ul>'
                    $("#response").hide().html('<div class="alert alert-' + data.alert + ' alert-dismissable"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> ' + errList + ' </div>');
                    $("#response").slideDown();
                }
                var clickedBtn = $("#submit-new-item");
                clickedBtn.attr('data-text', clickedBtn.html()).html('Submit').prop("disabled",false);

            },
            error: function(data) {

            },
            complete: function() {
                // btn.html(btn.data('text')).removeClass('disabled');
                // edit.removeClass('disabled');
            }
        });

    });

    $("#main_category-select").change(function (e) {
        var formDate =$("#manage-items").serialize();
        var token  =$("#_token").val();
  ;


        $.ajax({

            url: base+'/manageItem/submit',
            type: 'POST',
            data: formDate,
            headers: {
                "X-CSRF-Token": token,
            },

            beforeSend: function(arr, $form, options) {
                var clickedBtn = $("#submit-new-item");
                clickedBtn.attr('data-text', clickedBtn.html()).html('Submitting...').attr('disabled', true);
            },
            success: function(respond, statusText, xhr, $form) {
                if(respond){

                    $('#sub-category').html(respond);



                }else{

                    var errList = '<ul>';
                    $.each(data.errors, function(index, error){
                        errList += '<li>'+error+'</li>';
                    });
                    errList += '</ul>'
                    $("#response").hide().html('<div class="alert alert-' + data.alert + ' alert-dismissable"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> ' + errList + ' </div>');
                    $("#response").slideDown();
                }
                var clickedBtn = $("#submit-new-item");
                clickedBtn.attr('data-text', clickedBtn.html()).html('Submit').prop("disabled",false);

            },
            error: function(data) {

            },
            complete: function() {
                // btn.html(btn.data('text')).removeClass('disabled');
                // edit.removeClass('disabled');
            }
        });

    });

    $("#manage-items").submit(function (e) {
        console.log('fsdafsa');
        e.preventDefault();
        var formDate =$("#manage-items").serialize();
        var token  =$("#_token").val();

        $.ajax({

            url: base+'/manageItem/items',
            type: 'POST',
            data: formDate,
            headers: {
                "X-CSRF-Token": token,
            },

            beforeSend: function(arr, $form, options) {
                var clickedBtn = $("#submit-new-item");
                clickedBtn.attr('data-text', clickedBtn.html()).html('Saving...').attr('disabled', true);
            },
            success: function(respond, statusText, xhr, $form) {

                if(respond){
                    console.log(respond);
                   $("#fetching-data").html(respond);

                }else{

                    var errList = '<ul>';
                    $.each(data.errors, function(index, error){
                        errList += '<li>'+error+'</li>';
                    });
                    errList += '</ul>'
                    $("#response").hide().html('<div class="alert alert-' + data.alert + ' alert-dismissable"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> ' + errList + ' </div>');
                    $("#response").slideDown();
                }
                var clickedBtn = $("#submit-new-item");
                clickedBtn.attr('data-text', clickedBtn.html()).html('Submit').prop("disabled",false);

            },
            error: function(data) {

            },
            complete: function() {
                // btn.html(btn.data('text')).removeClass('disabled');
                // edit.removeClass('disabled');
            }
        });

    });

    $("#main_category-select-for-edt").change(function (e) {
        var formDate =$("#item-edit-form").serialize();
        var token  =$("#_token").val();
        ;


        $.ajax({

            url: base+'/manageItem/submit',
            type: 'POST',
            data: formDate,
            headers: {
                "X-CSRF-Token": token,
            },

            beforeSend: function(arr, $form, options) {
                var clickedBtn = $("#submit-new-item");
                clickedBtn.attr('data-text', clickedBtn.html()).html('Submitting...').attr('disabled', true);
            },
            success: function(respond, statusText, xhr, $form) {
                if(respond){

                    $('#sub-category').html(respond);



                }else{

                    var errList = '<ul>';
                    $.each(data.errors, function(index, error){
                        errList += '<li>'+error+'</li>';
                    });
                    errList += '</ul>'
                    $("#response").hide().html('<div class="alert alert-' + data.alert + ' alert-dismissable"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> ' + errList + ' </div>');
                    $("#response").slideDown();
                }
                var clickedBtn = $("#submit-new-item");
                clickedBtn.attr('data-text', clickedBtn.html()).html('Submit').prop("disabled",false);

            },
            error: function(data) {

            },
            complete: function() {
                // btn.html(btn.data('text')).removeClass('disabled');
                // edit.removeClass('disabled');
            }
        });

    });

    $("#item-edit-form").submit(function (e) {
        e.preventDefault();

        var formData = new FormData($("#item-edit-form")[0]);
        var token  =$("#_token").val();

        $.ajax({

            url: base+'/items/editItem',
            type: 'POST',
            data: formData,
            processData: false,
            contentType : false,
            cache:false,
            headers: {
                "X-CSRF-Token": token,
            },

            beforeSend: function(arr, $form, options) {
                var clickedBtn = $("#user-edit");
                clickedBtn.attr('data-text', clickedBtn.html()).html('Saving...').attr('disabled', true);
            },
            success: function(data, statusText, xhr, $form) {
                if(data.success){

                    $("#response").hide().html('<div class="alert alert-' + data.alert + ' alert-dismissable"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> ' + data.message + ' </div>');
                    $("#response").slideDown();


                }else{

                    var errList = '<ul>';
                    $.each(data.errors, function(index, error){
                        errList += '<li>'+error+'</li>';
                    });
                    errList += '</ul>'
                    $("#response").hide().html('<div class="alert alert-' + data.alert + ' alert-dismissable"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> ' + errList + ' </div>');
                    $("#response").slideDown();
                }
                var clickedBtn = $("#user-edit");
                clickedBtn.attr('data-text', clickedBtn.html()).html('Submit').prop("disabled",false);

            },
            error: function(data) {

            },
            complete: function() {
                // btn.html(btn.data('text')).removeClass('disabled');
                // edit.removeClass('disabled');
            }
        });

    });
    $("#sub_category-select").change(function (e) {
        var formDate =$("#plants-newitems-create").serialize();
        var token  =$("#_token").val();
        $.ajax({
            url: base+'/newInventoryType/getFiltersPlants',
            type: 'POST',
            data: formDate,
            headers: {
                "X-CSRF-Token": token,
            },
            beforeSend: function(arr, $form, options) {
                var clickedBtn = $("#submit-new-item");
            },
            success: function(respond, statusText, xhr, $form) {
                if(respond){

                    $('#plant-filters').html(respond);

                }else{
                    var errList = '<ul>';
                    $.each(data.errors, function(index, error){
                        errList += '<li>'+error+'</li>';
                    });
                    errList += '</ul>'
                    $("#response").hide().html('<div class="alert alert-' + data.alert + ' alert-dismissable"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> ' + errList + ' </div>');
                    $("#response").slideDown();
                }
                var clickedBtn = $("#submit-new-item");
                clickedBtn.attr('data-text', clickedBtn.html()).html('Submit').prop("disabled",false);

            },
            error: function(data) {

            },
            complete: function() {
                // btn.html(btn.data('text')).removeClass('disabled');
                // edit.removeClass('disabled');
            }
        });

    });
    $("#sub_category-select-chemical").change(function (e) {
        var formDate =$("#chemical-newitems-create").serialize();
        var token  =$("#_token").val();
        $.ajax({
            url: base+'/newInventoryType/getFiltersPlants',
            type: 'POST',
            data: formDate,
            headers: {
                "X-CSRF-Token": token,
            },
            beforeSend: function(arr, $form, options) {

            },
            success: function(respond, statusText, xhr, $form) {

                if(respond){

                    $('#chemical-filters').html(respond);

                }

            },
            error: function(data) {

            },
            complete: function() {

            }
        });

    });

    $("#plants-newitems-create").submit(function (e) {
        e.preventDefault();
        var formDate =$("#plants-newitems-create").serialize();
        var token  =$("#_token").val();
        console.log(formDate);
        console.log('call again');

        $.ajax({

            url: base+'/newInventoryType/findInventory',
            type: 'POST',
            data: formDate,
            headers: {
                "X-CSRF-Token": token,
            },

            beforeSend: function(arr, $form, options) {
                var clickedBtn = $("#find-in-btn");
                clickedBtn.attr('data-text', clickedBtn.html()).html('Saving...').attr('disabled', true);
            },
            success: function(data, statusText, xhr, $form) {
                if(data){

                     $("#feched-inventory").html(data);

                }else{

                    var errList = '<ul>';
                    $.each(data.errors, function(index, error){
                        errList += '<li>'+error+'</li>';
                    });
                    errList += '</ul>'
                    $("#response").hide().html('<div class="alert alert-' + data.alert + ' alert-dismissable"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> ' + errList + ' </div>');
                    $("#response").slideDown();
                }
                var clickedBtn = $("#find-in-btn");
                clickedBtn.attr('data-text', clickedBtn.html()).html('Submit').prop("disabled",false);

            },
            error: function(data) {

            },
            complete: function() {
                // btn.html(btn.data('text')).removeClass('disabled');
                // edit.removeClass('disabled');
            }
        });

    });
    $("#chemical-newitems-create").submit(function (e) {
        e.preventDefault();
        var formDate =$("#chemical-newitems-create").serialize();
        var token  =$("#_token").val();
        console.log(formDate);


        $.ajax({

            url: base+'/newInventoryType/findInventory',
            type: 'POST',
            data: formDate,
            headers: {
                "X-CSRF-Token": token,
            },

            beforeSend: function(arr, $form, options) {
                var clickedBtn = $("#find-in-btn");
                clickedBtn.attr('data-text', clickedBtn.html()).html('Saving...').attr('disabled', true);
            },
            success: function(data, statusText, xhr, $form) {
                if(data){

                    $("#feched-chemical-inventory").html(data);

                }

            },
            error: function(data) {

            },
            complete: function() {

            }
        });

    });
    $("#sub_category-select-tool").change(function (e) {
        var formDate =$("#tools-newitems-create").serialize();
        var token  =$("#_token").val();
        console.log(formDate);
        $.ajax({
            url: base+'/newInventoryType/getFiltersPlants',
            type: 'POST',
            data: formDate,
            headers: {
                "X-CSRF-Token": token,
            },
            beforeSend: function(arr, $form, options) {

            },
            success: function(respond, statusText, xhr, $form) {

                if(respond){

                    $('#tool-filters').html(respond);

                }

            },
            error: function(data) {

            },
            complete: function() {

            }
        });

    });
    $("#tools-newitems-create").submit(function (e) {
        e.preventDefault();
        var formDate =$("#tools-newitems-create").serialize();
        var token  =$("#_token").val();



        $.ajax({

            url: base+'/newInventoryType/findInventory',
            type: 'POST',
            data: formDate,
            headers: {
                "X-CSRF-Token": token,
            },

            beforeSend: function(arr, $form, options) {
                var clickedBtn = $("#find-in-btn");
                clickedBtn.attr('data-text', clickedBtn.html()).html('Saving...').attr('disabled', true);
            },
            success: function(data, statusText, xhr, $form) {
                if(data){

                    $("#feched-tools-inventory").html(data);

                }

            },
            error: function(data) {

            },
            complete: function() {

            }
        });

    });


    $("#sub_category-select-accessories").change(function (e) {
        var formDate =$("#accessories-newitems-create").serialize();
        var token  =$("#_token").val();
        console.log(formDate);
        $.ajax({
            url: base+'/newInventoryType/getFiltersPlants',
            type: 'POST',
            data: formDate,
            headers: {
                "X-CSRF-Token": token,
            },
            beforeSend: function(arr, $form, options) {

            },
            success: function(respond, statusText, xhr, $form) {

                if(respond){

                    $('#accessories-filters').html(respond);

                }

            },
            error: function(data) {

            },
            complete: function() {

            }
        });

    });
    $("#accessories-newitems-create").submit(function (e) {
        e.preventDefault();
        var formDate =$("#accessories-newitems-create").serialize();
        var token  =$("#_token").val();



        $.ajax({

            url: base+'/newInventoryType/findInventory',
            type: 'POST',
            data: formDate,
            headers: {
                "X-CSRF-Token": token,
            },

            beforeSend: function(arr, $form, options) {
                var clickedBtn = $("#find-in-btn");
                clickedBtn.attr('data-text', clickedBtn.html()).html('Saving...').attr('disabled', true);
            },
            success: function(data, statusText, xhr, $form) {
                if(data){

                    $("#feched-accessories-inventory").html(data);

                }

            },
            error: function(data) {

            },
            complete: function() {

            }
        });

    });

});

