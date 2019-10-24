var veiculos = new Array();
var veiculosSalvos = new Array(); //Veiculos que já estão salvos no banco
var tabelaVeiculo = $("#tabelaVeiculo");
var idUsuario = $("#idUsuario").val();
var index;

//Variáveis para criação de um Veiculo
var idModelo;
var idMarca;
var nmPlacaVeiculo;
var anoVeiculo;
var dsConsumoVeiculo;



function finalizaVeiculos() {
    $.ajax({
        url: 'cadastrar',
        type: 'POST',
        dataType: 'json',
        contentType: 'json',
        data: JSON.stringify(veiculos),
        contentType: 'application/json; charset=utf-8'
    }).done(function () {
        window.location = "../"
    });
}

$(document).ready(function () {
    valor = $(this).val();
    $.ajax({

        type: 'POST',
        url: "listar/" + idUsuario,
        dataType: 'JSON',
        data: {
            "veiculos": veiculos
        },
        success: function (data) {
            var i = 0;
            data.forEach(veiculo => {
                tabelaVeiculo.append('<div class="p-t-5 col-sm"><button id="btnVeiculo' + i + '" onclick="carregarVeiculo(' + i + ')" type="button" class="login100-form-btn wrap-input100">' + veiculo.nmPlacaVeiculo + '</button></div>');
                i++;
                //Popular o Array veiculos com o retorno
                id = veiculo.id;
                nmPlacaVeiculo = veiculo.nmPlacaVeiculo;
                anoVeiculo = veiculo.anoVeiculo;
                dsConsumoVeiculo = veiculo.dsConsumoVeiculo;
                idModelo = veiculo.idModelo;

                var novoVeiculo = {
                    id: id,
                    idModelo: idModelo,
                    nmPlacaVeiculo: nmPlacaVeiculo,
                    anoVeiculo: anoVeiculo,
                    dsConsumoVeiculo: dsConsumoVeiculo
                }

                $.get('modelos/findMarca/' + idModelo, function (marca) {
                    novoVeiculo.idMarca = marca.id;
                });

                veiculos.push(novoVeiculo);
                veiculosSalvos.push(novoVeiculo);
                //Fim
            });
        },
        error: function (data) {
            mensagemAlerta('Erro ao listar Veículos');
        },
    });
});

function adicionarVeiculo() {

    if (validaCampos()) {
        return false;
    }

    nmPlacaVeiculo = $("#nmPlacaVeiculo").val();

    $.get('findByPlaca/' + nmPlacaVeiculo, function (veiculo) {
        placaExiste = false;


        if (veiculo) {
            mensagemAlerta('Veículo com Placa já Cadastrada');
        } else {

            veiculos.forEach(veiculo => {
                if (veiculo.nmPlacaVeiculo == nmPlacaVeiculo) {
                    mensagemAlerta('Veículo com Placa já Cadastrada');
                    placaExiste = true;
                }
            });

            if (!placaExiste) {
                idModelo = $("#modelo").val();
                idMarca = $("#marca").val();

                anoVeiculo = $("#anoVeiculo").val();
                dsConsumoVeiculo = $("#dsConsumoVeiculo").val();

                var novoVeiculo = {
                    id: "",
                    idModelo: idModelo,
                    idMarca: idMarca,
                    nmPlacaVeiculo: nmPlacaVeiculo,
                    anoVeiculo: anoVeiculo,
                    dsConsumoVeiculo: dsConsumoVeiculo
                }

                veiculos.push(novoVeiculo);
                tabelaVeiculo.append('<div class="p-t-5 col-sm"><button id="btnVeiculo' + (veiculos.length - 1) + '" onclick="carregarVeiculo(' + (veiculos.length - 1) + ')" type="button" class="login100-form-btn wrap-input100">' + veiculos[veiculos.length - 1].nmPlacaVeiculo + '</button></div>');
                limparCampos();
            }

        }
    });

}

function carregarVeiculo(i) {
    limparCampos();    
    index = i;
    $("#nmPlacaVeiculo").val(veiculos[i].nmPlacaVeiculo);
    $("#spanVeiculo").html("Editar Veículo - " + veiculos[i].nmPlacaVeiculo);
    $("#anoVeiculo").val(veiculos[i].anoVeiculo);
    $("#dsConsumoVeiculo").val(veiculos[i].dsConsumoVeiculo);
    $("#marca").val(veiculos[i].idMarca);
    $("#divBtnAtualizar").attr('style', 'display : block');
    $("#btnAtualizar").attr('data-value', i);
    $("#divBtnAdicionar").attr('style', 'display : none');
    carregaModelos(veiculos[i].idModelo);
}

function editarVeiculo() {

    if (validaCampos()) {
        return false;
    }

    btnAtualizar = $("#btnAtualizar");

    nmPlacaVeiculo = $("#nmPlacaVeiculo").val();
    $.get('findByPlaca/' + nmPlacaVeiculo, function (veiculo) {

        if (veiculos[index].nmPlacaVeiculo == nmPlacaVeiculo) {

            salvarEdicao(index, nmPlacaVeiculo, veiculos[index].id);

        } else {
            if (veiculos.findIndex(veiculo => veiculo.nmPlacaVeiculo === nmPlacaVeiculo) == -1) {
                if (veiculosSalvos.findIndex(veiculoS => veiculoS.nmPlacaVeiculo === nmPlacaVeiculo) >= 0) {

                    salvarEdicao(index, nmPlacaVeiculo, veiculoS.id);

                } else {
                    if (!veiculo) {
                        salvarEdicao(index, nmPlacaVeiculo, veiculos[index].id);
                    } else {
                        mensagemAlerta('Veículo com Placa já Cadastrada');
                    }
                }
            }
        }

    });

}

function salvarEdicao(index, nmPlacaVeiculo, id = null) {

    idModelo = $("#modelo").val();
    idMarca = $("#marca").val();
    anoVeiculo = $("#anoVeiculo").val();
    dsConsumoVeiculo = $("#dsConsumoVeiculo").val();

    var atualizadoVeiculo = {
        id: id,
        idModelo: idModelo,
        idMarca: idMarca,
        nmPlacaVeiculo: nmPlacaVeiculo,
        anoVeiculo: anoVeiculo,
        dsConsumoVeiculo: dsConsumoVeiculo
    }

    veiculos[index] = atualizadoVeiculo;
    $("#divBtnAtualizar").attr('style', 'display : none');
    $("#divBtnAdicionar").attr('style', 'display : block');
    $("#btnVeiculo" + index).html(nmPlacaVeiculo);
    $("#spanVeiculo").html("Novo Veículo");
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




function limparCampos() {
    $("#modelo").val("");
    $("#marca").val("");
    $("#nmPlacaVeiculo").val("");
    $("#anoVeiculo").val("");
    $("#dsConsumoVeiculo").val("");
}

$(function () {
    $('#nmPlacaVeiculo').mask("SSS-0A00");
    $('#anoVeiculo').mask('0000');
    $('#dsConsumoVeiculo').mask('00,00', { reverse: true });
});

$('#nmPlacaVeiculo').on('input', function (evt) {
    $(this).val(function (_, val) {
        return val.toUpperCase();
    });
});

function carregaModelos($modelo = null) {

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
        }).done(function () {
            $('select[name=modelo]').val($modelo);
        });

    }
}
