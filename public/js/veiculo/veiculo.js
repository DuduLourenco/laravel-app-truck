var veiculos = new Array();
var tabelaVeiculo = $("#tabelaVeiculo");

$('select[name=marca]').change(function() {
    carregaModelos();
});

function finalizaVeiculos() {    
    $.ajax({
        url:'cadastrar',
        type: 'POST',
        dataType:'json',
        contentType: 'json',
        data: JSON.stringify(veiculos),
        contentType: 'application/json; charset=utf-8'        
    }).done(function() { 
        //window.location = "../usuarios/login"
    });;
}


function carregaModelos() {
    var idMarca = $('select[name=marca]').val();

    if (idMarca == "") {
        $('select[name=modelo]').empty();
        $('select[name=modelo]').append('<option value="" selected="selected">Modelo</option>');
    } else {
        $.get('modelos/listModelos/' + idMarca, function (modelos) {
            $('select[name=modelo]').empty();
            $('select[name=modelo]').append('<option value="" selected="selected">Modelo</option>');
            $.each(modelos, function (key, value) {            
                $('select[name=modelo]').append('<option value=' + value.id + '>' + value.nmModelo + '</option>');
            });
        });
    }  
}

function adicionarVeiculo () {   
    
    if (validaCampos()) {
        return false;
    }

    var infos = "\nDados:\n";
    idModelo = $("#modelo").val();
    idMarca = $("#marca").val();
    nmPlacaVeiculo = $("#nmPlacaVeiculo").val();
    anoVeiculo = $("#anoVeiculo").val();
    dsConsumoVeiculo = $("#dsConsumoVeiculo").val();

    var novoVeiculo = {
        idModelo: idModelo,
        idMarca: idMarca,
        nmPlacaVeiculo: nmPlacaVeiculo,
        anoVeiculo: anoVeiculo,
        dsConsumoVeiculo: dsConsumoVeiculo
    }

    veiculos.push(novoVeiculo);
    tabelaVeiculo.append('<div class="p-t-5 col-sm"><button id="btnVeiculo'+(veiculos.length - 1)+'" onclick="carregarVeiculo('+(veiculos.length - 1)+')" type="button" class="login100-form-btn wrap-input100">'+veiculos[ veiculos.length - 1 ].nmPlacaVeiculo+'</button></div>');
    limparCampos();
}

function carregarVeiculo (i) {  
    limparCampos();   
    $("#nmPlacaVeiculo").val(veiculos[i].nmPlacaVeiculo);
    $("#anoVeiculo").val(veiculos[i].anoVeiculo);
    $("#dsConsumoVeiculo").val(veiculos[i].dsConsumoVeiculo);
    $("#marca").val(veiculos[i].idMarca);
    carregaModelos(); 
    $("#divBtnAtualizar").attr('style','display : block');
    $("#btnAtualizar").attr('data-value',i);
    $("#divBtnAdicionar").attr('style','display : none'); 
    $("#modelo").val(veiculos[i].idModelo);
} 

function editarVeiculo (btnAtualizar) {

    if (validaCampos()) {
        return false;
    }

    btnAtualizar = $(btnAtualizar);
    index = btnAtualizar.data('value');

    idModelo = $("#modelo").val();
    idMarca = $("#marca").val();
    nmPlacaVeiculo = $("#nmPlacaVeiculo").val();
    anoVeiculo = $("#anoVeiculo").val();
    dsConsumoVeiculo = $("#dsConsumoVeiculo").val();

    var atualizadoVeiculo = {
        idModelo: idModelo,
        idMarca: idMarca,
        nmPlacaVeiculo: nmPlacaVeiculo,
        anoVeiculo: anoVeiculo,
        dsConsumoVeiculo: dsConsumoVeiculo
    }
    veiculos[index] = atualizadoVeiculo;
    $("#divBtnAtualizar").attr('style','display : none');
    $("#divBtnAdicionar").attr('style','display : block');
    $("#btnVeiculo"+index).html(nmPlacaVeiculo);
    limparCampos();
}


function validaCampos() {

    erro = "";
    idModelo = $("#modelo").val();
    divModelo = $("#divModelo");

    idMarca = $("#marca").val();
    divMarca = $("#divMarca");

    nmPlacaVeiculo = $("#nmPlacaVeiculo").val();
    divNmPlacaVeiculo = $("#divNmPlacaVeiculo");

    anoVeiculo = $("#anoVeiculo").val();
    divAnoVeiculo = $("#divAnoVeiculo");

    dsConsumoVeiculo = $("#dsConsumoVeiculo").val();
    divDsConsumoVeiculo = $("#divDsConsumoVeiculo");

    if (idModelo.trim() == "") {
        erro += "\ncampo:Modelo";
        divModelo.attr("data-validate", "Entre com o Modelo");
        divModelo.addClass("alert-validate");
    }

    if (idMarca.trim() == "") {
        erro += "\ncampo:Marca";
        divMarca.attr("data-validate", "Entre com a Marca");
        divMarca.addClass("alert-validate");
    }

    if (nmPlacaVeiculo.trim() == "") {
        divNmPlacaVeiculo.attr("data-validate", "Entre com a Placa");
        divNmPlacaVeiculo.addClass("alert-validate");
        erro += "\ncampo:Placa";

    } else if (nmPlacaVeiculo.trim().length != 8) {
        divNmPlacaVeiculo.attr("data-validate", "Preenchimento Incorreto");
        divNmPlacaVeiculo.addClass("alert-validate");
        erro += "\ncampo:Placa";        
    }


    if (anoVeiculo.trim() == "") {
        divAnoVeiculo.attr("data-validate", "Entre com o Ano");
        divAnoVeiculo.addClass("alert-validate");
        erro += "\ncampo:Ano";
    } else if (anoVeiculo.trim().length != 4) {
        divAnoVeiculo.attr("data-validate", "Data Inválida");
        divAnoVeiculo.addClass("alert-validate");
        erro += "\ncampo:Ano";
    }

    if (dsConsumoVeiculo.trim() == "") {
        divDsConsumoVeiculo.attr("data-validate", "Entre com o Consumo");
        divDsConsumoVeiculo.addClass("alert-validate");
        erro += "\ncampo:Consumo";
    } else if (dsConsumoVeiculo.trim().length != 5) {
        divDsConsumoVeiculo.attr("data-validate", "Preencha as Casas Decimais Exemplo: 00,00");
        divDsConsumoVeiculo.addClass("alert-validate");
        erro += "\ncampo:Consumo";
    }

    if (erro == "") {        
        return false;
    }
    return true;
}

function limparCampos () {
    $("#modelo").val("");
    $("#marca").val("");
    $("#nmPlacaVeiculo").val("");
    $("#anoVeiculo").val("");
    $("#dsConsumoVeiculo").val("");
}

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
