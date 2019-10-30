var idUsuario = $("#idUsuario").val();
var tabelaViagem = $("#tabelaViagem");
var viagens = new Array();

$(document).ready(function () {
    $.ajax({

        type: 'POST',
        url: "listar/" + idUsuario,
        dataType: 'JSON',
        data: {
            "viagens": viagens
        },
        success: function (data) {
            var i = 0;
            data.forEach(viagem => {

                id = viagem.id;
                dtPrazo = formataData(viagem.dtPrazo,2);
                hrPrazo = viagem.hrPrazo;
                idVeiculo = viagem.idVeiculo;
                $.get('../veiculos/findById/' + idVeiculo, function (veiculo) {
                    nmPlacaVeiculo = veiculo.nmPlacaVeiculo;
                    if (i > 0) {
                        margTop = 60;
                    } else {
                        margTop = 0;
                    }
    
                    tabelaViagem.append(
                        "<div class='row p-t-"+margTop+"'>\
                            <div class='col-sm'>\
                                <div class='wrap-input100 m-b-16'>\
                                    <input class='input100' type='text' value='"+dtPrazo+"' readonly>\
                                    <span class='focus-input100'></span>\
                                </div>\
                            </div>\
                            <div class='col-sm'>\
                                <div class='wrap-input100 m-b-16'>\
                                    <input class='input100' type='text' value='"+hrPrazo+"' readonly>\
                                    <span class='focus-input100'></span>\
                                </div>\
                            </div>\
                            <div class='col-sm' >\
                                <div class='wrap-input100 m-b-16'>\
                                    <input class='input100' type='text' value='"+nmPlacaVeiculo+"' readonly>\
                                    <span class='focus-input100'></span>\
                                </div>\
                            </div>\
                        </div >\
                    ");
    
                    tabelaViagem.append("<div class='row'>\
                        <div class='col-3'>\
                                <button type='button' id='btnAlterar"+i+"' onclick='alterar("+ i +")'\
                            class='login100-form-btn wrap-input100'>Alterar</button>\
                        </div>\
                        <div class='col-3'>\
                            <button type='button' id='btnExcluir"+i+"' onclick='excluir("+ i +")'\
                            class='login100-form-btn wrap-input100'>Excluir</button>\
                        </div >\
                        <div class='col-6'>\
                            <button type='button' id='btnFeito"+i+"' onclick='feito("+ i +")'\
                            class='login100-form-btn wrap-input100'>Feito</button>\
                        </div >\
                    </div >\ ");
                    i++;
                });


                
            });

        },
        error: function (data) {
            mensagemAlerta('Erro ao listar Viagens');
        },
    });
});

function alterar(id){
    window.location.href = "alterar/" + id;
}

function excluir(id){
    bootbox.confirm("Excluir a viagem?", function(result){ 
        if (result) {
            window.location.href = "excluir/" + id;
        }
    });    
}

function feito(id){
    bootbox.confirm("Marcar a viagem como finalizada?", function(result){ 
        if (result) {
            window.location.href = "feito/" + id;
        }
    });    
}