
$(document).ready(function(){
    $('#btn-confirmar').click(function(e){
        e.preventDefault();
        var form = $('#confirmar-pendiente');
        var url = form.attr('action');
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: url,
            method: 'POST',
            data: {_method: 'PATCH', _token: csrf_token},
            success: function(result){
                console.log(result);
                // Si todo va bien, actualizamos la página sin recargar
                location.reload();
            },
            error: function(xhr, status, error){
                console.error(error);
            }
        });
    });
});
