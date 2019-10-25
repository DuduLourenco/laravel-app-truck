$(function(){    
    $('#dtPrazo').mask('00/00/0000');
    $('#hrPrazo').mask('00:00');
    $('#dsValor').mask('##.#00,00', { reverse: true });
});

function calculaLucro(){
    gastos = $("#dsGastos").val().toString().replace(".", "").replace(",", ".");
    valor =  $("#dsValor").val().toString().replace(".", "").replace(".", "").replace(".", "");
    valor = valor.toString().replace(",", ".")
    lucro = valor - gastos;
    lucro = arredonda(lucro);
    $("#dsLucro").val("R$ " + lucro);

    if (lucro > 0) {
        $("#dsResultado").val("A Viagem É Vantajosa");
        $("#dsResultado").css("color", "green");
    } else {
        $("#dsResultado").val("A Viagem NÃO Vantajosa");
        $("#dsResultado").css("color", "red");
    }

}