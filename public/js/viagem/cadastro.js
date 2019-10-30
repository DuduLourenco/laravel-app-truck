var lucro, valor, gastos, manutencao;


$(function(){    
    $('#dtPrazo').mask('00/00/0000');
    $('#dsValorInfo').mask('##.#00,00', { reverse: true });
    $("#dsLucroInfo").mask('R$', { reverse: true });
});

$("#hrPrazo").mask("AB:CD", {
    translation: {
      "A": { pattern: /[0-2]/, optional: false},
      "B": { pattern: /[0-4]/, optional: false},
      "C": { pattern: /[0-5]/, optional: false},
      "D": { pattern: /[0-9]/, optional: false}
    }
});

function finalizaViagem() {
    
    dtPrazo = $("#dtPrazo").val();
    dtPrazo = formataData(dtPrazo);
    $("#dtPrazo").val(dtPrazo);

    $("#dsGastos").val(gastos);

    $("#dsValor").val(valor);

    $("#form").submit();
}

function calculaLucro(){

    gastos = $("#dsGastos").val();
    valor =  formataDinheiro($("#dsValorInfo").val());
    lucro = valor - gastos;
    lucro = arredonda(lucro,2);
    $("#dsLucroInfo").val("R$ " + lucro);
    $("#dsLucro").val(lucro);

    if (lucro > 0) {
        $("#dsResultado").val("A Viagem É Vantajosa");
        $("#dsResultado").css("color", "green");
    } else {
        $("#dsResultado").val("A Viagem NÃO é Vantajosa");
        $("#dsResultado").css("color", "red");
    }

}