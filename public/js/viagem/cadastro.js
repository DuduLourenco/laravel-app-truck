var lucro, valor, gastos, manutencao;


$(function(){    
    $('#dtPrazo').mask('00/00/0000');
    $('#dsValorInfo').mask('##.#00,00', { reverse: true });
    $("#dsLucroInfo").mask('R$', { reverse: true });
    $("#hrPrazo").mask("00:00");
});



function finalizaViagem() {

    dtPrazo = $("#dtPrazo").val();
    hrPrazo = $("#hrPrazo").val();
    valorV = $("#dsValorInfo").val();    

    if (dtPrazo.trim() == "" || valorV.trim() == "" || hrPrazo.trim() == "") {
        mensagemAlerta("Preencha todos os campos!");
        return;
    }

    if (!validaData(formataData(dtPrazo))) {
        mensagemAlerta("Data incorreta!");
        return;
    }

    if (!validaHora(hrPrazo)) {
        mensagemAlerta("Hora incorreta!");
        return;
    } 
    
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

    if (lucro > (gastos * 0.5)) {
        $("#dsResultado").val("A Viagem É Vantajosa");
        $("#dsResultado").css("color", "green");
    } else {
        $("#dsResultado").val("A Viagem NÃO é Vantajosa");
        $("#dsResultado").css("color", "red");
    }

}