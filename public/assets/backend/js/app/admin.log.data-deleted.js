$(document).ready(function() {
    $('table .restore-btn').click(function(e){
        e.preventDefault();
        var btn = $(this);
        var edit = $(this).parent().children('a');
        var row = $(this).parent().parent('tr');
        var form_ID = $(this).data('form');
        $(this).parent().parent('tr').attr('style', 'background-color:#d9ffdf');
       
        if(confirm('Are you sure you want to restore this record?')){
            var formData = $('#'+form_ID).serialize();
            var token = $('#'+form_ID+' input[name="_token"]').val();
            var id = $('#'+form_ID+' input[name="id"]').val();

            $.ajax(this.href, {
                type: 'PUT',
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
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
    
    $('#showData').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var modal = $(this);
        
        modal.find('#row_id').text(button.data('id'));
        modal.find('#table_name').text(button.data('table'));
        modal.find('#table_data').text(button.data('tabledata'));
        modal.find('#user_name').text(button.data('user'));
        modal.find('#deleted_date').text(button.data('deleted'));
    })
});