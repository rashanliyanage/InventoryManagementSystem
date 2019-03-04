$(document).ready(function() {
    $('input.method-option').on('ifChecked', function(event){
        var m = $(this).val();
        $('#'+m+'_method').prop('disabled', false);
        $('#'+m+'_name').prop('disabled', false);
    });
    $('input.method-option').on('ifUnchecked', function(event){
        var m = $(this).val();
        $('#'+m+'_method').prop('disabled', true);
        $('#'+m+'_name').prop('disabled', true);
    });

});