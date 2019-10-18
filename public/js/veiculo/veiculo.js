$('select[name=marca]').change(function() {
    var idMarca = $(this).val();

    if (idMarca == "") {
        $('select[name=modelo]').empty();
        $('select[name=modelo]').append('<option value="" selected="selected">Modelo</option>');
    } else {
        $.get('/listModelos/' + idMarca, function (modelos) {
            $('select[name=modelo]').empty();
            $('select[name=modelo]').append('<option value="" selected="selected">Modelo</option>');
            $.each(modelos, function (key, value) {            
                $('select[name=modelo]').append('<option value=' + value.id + '>' + value.nmModelo + '</option>');
            });
        });
    }    
    
});