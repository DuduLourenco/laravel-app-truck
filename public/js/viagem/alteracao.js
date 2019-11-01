var lucro, valor, gastos, manutencao;


$(function(){    
    calculateAndDisplayRoutes();
    $('#dtPrazo').mask('00/00/0000');
    $('#dsValorInfo').mask('##.#00,00', { reverse: true });
    $("#dsLucroInfo").mask('R$', { reverse: true });
    $("#hrPrazo").mask("00:00");
    
});

function alteraViagem() {

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

    if (lucro > 0) {
        $("#dsResultado").val("A Viagem É Vantajosa");
        $("#dsResultado").css("color", "green");
    } else {
        $("#dsResultado").val("A Viagem NÃO é Vantajosa");
        $("#dsResultado").css("color", "red");
    }

}

function calculateAndDisplayRoutes() {
    
    var dest = {
        lat: parseFloat($("#dsDestinoLat").val()),
        lng: parseFloat($("#dsDestinoLng").val())
    };
    var pos = {
        lat: parseFloat($("#dsOrigemLat").val()),
        lng: parseFloat($("#dsOrigemLng").val())
    };

    var directionsRenderer = new google.maps.DirectionsRenderer;
    var directionsService = new google.maps.DirectionsService;

    if (pos.lat != 0 && dest.lat != 0) {
        directionsService.route({
            origin: pos,
            destination: dest,
            travelMode: google.maps.TravelMode["DRIVING"]
        }, function (response, status) {
            if (status == 'OK') {
                directionsRenderer.setDirections(response);
                var rota = response.routes[0].legs[0];    
                
                            
                $("#dsOrigem").val("De: " + rota.start_address);
                $("#dsDestino").val("Para: "+ rota.end_address);

                $("#dsTempoInfo").val("Duração: " + rota.duration['text']);
                $("#dsDistanciaInfo").val("Distância: " + rota.distance['text']);                

                $("#dsDistancia").val(rota.distance['value']);
                $("#dsTempo").val(rota.duration['value']);

                $.get('../../veiculos/findById/' + $("#idVeiculo").val(), function (veiculo) {
                    $("#nmPlacaVeiculo").val("Veículo: "+veiculo.nmPlacaVeiculo);
                });

                calculaLucro();

            } else {
                window.alert('Directions request failed due to ' + status);
            }
        });
    }

}