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

            if (data == "") {
                $("#spanViagem").append("NENHUMA VIAGEM PENDENTE");
            }

            data.forEach(viagem => {

                id = viagem.id;
                dtPrazo = formataData(viagem.dtPrazo, 2);
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
                        "<div class='row p-t-" + margTop + "'>\
                            <div class='col-sm'>\
                                <div class='wrap-input100 m-b-16'>\
                                    <input class='form-control' type='text' value='"+ dtPrazo + "' readonly>\
                                    <span class='focus-input100'></span>\
                                </div>\
                            </div>\
                            <div class='col-sm'>\
                                <div class='wrap-input100 m-b-16'>\
                                    <input class='form-control' type='text' value='"+ hrPrazo + "' readonly>\
                                    <span class='focus-input100'></span>\
                                </div>\
                            </div>\
                            <div class='col-sm' >\
                                <div class='wrap-input100 m-b-16'>\
                                    <input class='form-control' type='text' value='"+ nmPlacaVeiculo + "' readonly>\
                                    <span class='focus-input100'></span>\
                                </div>\
                            </div>\
                        </div >\
                    ");

                    tabelaViagem.append("<div class='row'>\
                        <div class='col-3 p-b-15'>\
                                <button type='button' id='btnAlterar"+ id + "' onclick='alterar(" + id + ")'\
                            class='btn btn-dark btn-block'>Alterar</button>\
                        </div>\
                        <div class='col-3 p-b-15'>\
                            <button type='button' id='btnExcluir"+ id + "' onclick='excluir(" + id + ")'\
                            class='btn btn-dark btn-block'>Excluir</button>\
                        </div >\
                        <div class='col-6 p-b-15'>\
                            <button type='button' id='btnFeito"+ id + "' onclick='feito(" + id + ")'\
                            class='btn btn-dark btn-block'>Feito</button>\
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

function alterar(id) {
    window.location.href = "alterar/" + id;
}

function excluir(id) {

    bootbox.confirm({
        message: "Excluir a viagem?",
        buttons: {
            confirm: {
                label: 'Sim',
                className: 'btn-dark'
            },
            cancel: {
                label: 'Não',
                className: 'btn-secondary'
            }
        },
        callback: function (result) {
            if (result) {
                window.location.href = "excluir/" + id;
            }
        }
    });
    
}

function feito(id) {

    bootbox.confirm({
        message: "Marcar a viagem como finalizada?",
        buttons: {
            confirm: {
                label: 'Sim',
                className: 'btn-dark'
            },
            cancel: {
                label: 'Não',
                className: 'btn-secondary'
            }
        },
        callback: function (result) {
            if (result) {
                window.location.href = "feito/" + id;
            }
        }
    });

}