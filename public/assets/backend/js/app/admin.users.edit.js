$(document).ready(function() {
    
    $('#selRole').change(function(e){
        e.preventDefault();
        var value = $(this).val();
        
        if(value > 2){
            $('#elOutlet').show();
            $('#elOutlet .outlet').attr('required', true).val('');
        }else{
            $('#elOutlet').hide();
            $('#elOutlet .outlet').attr('required', false).val('');
        }
    });

});