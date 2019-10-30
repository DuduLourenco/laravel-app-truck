$(function(){    
    $('#dtPrazo').mask('00/00/0000');
    $('#dsValorInfo').mask('##.#00,00', { reverse: true });
});

$("#hrPrazo").mask("AB:CD", {
    translation: {
      "A": { pattern: /[0-2]/, optional: false},
      "B": { pattern: /[0-3]/, optional: false},
      "C": { pattern: /[0-5]/, optional: false},
      "D": { pattern: /[0-9]/, optional: false}
    }
});

function finalizaViagem() {
    
    dtPrazo = $("#dtPrazo").val();
    dtPrazo = formataData(dtPrazo);
    $("#dtPrazo").val(dtPrazo);

    gastos = $("#dsGastos").val().toString().replace(".", "").replace(",", ".");
    $("#dsGastos").val(gastos);

    valor =  $("#dsValorInfo").val().toString().replace(".", "").replace(".", "").replace(".", "");
    valor = valor.toString().replace(",", ".");
    $("#dsValor").val(valor);

    $("#form").submit();
}

function calculaLucro(){

    gastos = $("#dsGastos").val().toString().replace(".", "").replace(",", ".");
    valor =  $("#dsValorInfo").val().toString().replace(".", "").replace(".", "").replace(".", "");
    valor = valor.toString().replace(",", ".");
    manutencao = ($("#dsDistancia").val()/1000) * 0.65;
    lucro = valor - gastos - manutencao;
    alert(manutencao);
    lucro = arredonda(lucro);
    $("#dsLucroInfo").val("R$ " + lucro);
    $("#dsLucro").val(lucro);

    if (lucro > 0) {
        $("#dsResultado").val("A Viagem É Vantajosa");
        $("#dsResultado").css("color", "green");
    } else {
        $("#dsResultado").val("A Viagem NÃO Vantajosa");
        $("#dsResultado").css("color", "red");
    }

}