
$(document).ready(function () {
    $("#inventory-update-form").submit(function (e) {
        e.preventDefault();
        var formDate =$("#inventory-update-form").serialize();
        var token  =$("#_token").val();
        $.ajax({
            url: base+'/newInventoryType/updateInventory',
            type: 'POST',
            data: formDate,
            headers: {
                "X-CSRF-Token": token,
            },

            beforeSend: function(arr, $form, options) {
                var clickedBtn = $("#up-inventory");
                clickedBtn.attr('data-text', clickedBtn.html()).html('Saving...').attr('disabled', true);
            },
            success: function(data, statusText, xhr, $form) {
                if(data.success){

                    $("#response-message").hide().html('<div class="alert alert-' + data.alert + ' alert-dismissable"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> ' + data.message + ' </div>');
                    $("#response-message").slideDown();

                }else{
                    var errList = '<ul>';
                    $.each(data.errors, function(index, error){
                        errList += '<li>'+error+'</li>';
                    });
                    errList += '</ul>'
                    $("#response-message").hide().html('<div class="alert alert-' + data.alert + ' alert-dismissable"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> ' + errList + ' </div>');
                    $("#response-message").slideDown();
                }
                var clickedBtn = $("#up-inventory");
                clickedBtn.attr('data-text', clickedBtn.html()).html('Submit').prop("disabled",false);

            },
            error: function(data) {

            },
            complete: function() {


            }
        });

    });


});

