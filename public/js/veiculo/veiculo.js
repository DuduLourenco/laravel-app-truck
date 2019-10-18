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

$(function(){
    $('#nmPlacaVeiculo').mask("SSS-0A00");
    $('#anoVeiculo').mask('0000'); 
    $('#dsConsumoVeiculo').mask('00,00', {reverse: true});
});

$('#nmPlacaVeiculo').on('input', function(evt) {
    $(this).val(function(_, val) {
      return val.toUpperCase();
    });
});
