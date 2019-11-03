$(document).ready(function(){
    $('#dsValor').mask('###0.00', { reverse: true });
});
function showGetResult()
{

     var result = null;
     var scriptUrl = 'listarGastos/'+ $("#cpfUsuario").val();
     $.ajax({
        url: scriptUrl,
        type: 'get',
        dataType: 'html',
        async: false,
        success: function(data) {
            result = data;
        }
     });

    return result;
}

function finalizaGastos() {
    bootbox.confirm({
        message: "Você tem certeza que deseja registrar este gasto?",
        size: 'small',
        callback: function(result){
            if(result){
                $("#form").submit();
            }
        }
    });
}

window.onload = graficoDonut();
function graficoDonut(){
    var gastos = JSON.parse(showGetResult());
    var gastosArray=[];
    var Estadia=0;
    var Alimentacao=0;
    var Outros=0;
    var Manutencao=0;
    var Combustivel=0;
    for (let index = 0; index < gastos.length; index++) {
        // if( new Date(gastos[index].dtGasto).getTime() > new Date(Date.now()).getTime()-(2.628*Math.pow(10,9))){
        //     gastos+=gastos[index].dsValor  ), x: periodo });
        // }
        if( gastos[index].dsTipo=="Estadia"){
        Estadia+=gastos[index].dsValor;
    }else if( gastos[index].dsTipo=="Alimentação"){
        Alimentacao+=gastos[index].dsValor;
    }else if( gastos[index].dsTipo=="Manutenção"){
        Manutencao+=gastos[index].dsValor;
    }else if( gastos[index].dsTipo=="Combustível"){
        Combustivel+=gastos[index].dsValor;
    }else {
        Outros+=gastos[index].dsValor;
    }

    }
    if (Estadia > 0) {
        gastosArray.push({y:Estadia, label:"Estadia"});
    }
    if (Manutencao > 0) {
        gastosArray.push({y:Manutencao, label:"Manutenção"});
    }
    if (Combustivel > 0) {
        gastosArray.push({y:Combustivel, label:"Combustível"});
    }
    if (Outros > 0) {
        gastosArray.push({y:Outros, label:"Outros"});
    }
    
    
    
    

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            data: [{
                type: "doughnut",
                startAngle: 60,
                //innerRadius: 60,
                indexLabelFontSize: 17,
                indexLabel: "{label} - #percent%",
                toolTipContent: "<b>{label}:</b> R$ {y} (#percent%)",
                dataPoints: gastosArray
            }]
        });
        chart.render();
        
        }



function depositar(){
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    bootbox.prompt({
        size: "small",
        inputType: "number",
        title: "Qual valor você deseja depositar?",

        callback: function(result){
            var scriptUrl = 'depositarCofrinho';
            $.ajax({
                url: scriptUrl,
                type: 'POST',
                data: {valor:parseFloat(result), usuario:$("#cpfUsuario").val()},
                dataType: 'JSON',
                async: false,

            });
            window.location.href=window.location.href;
        }
    });
}
