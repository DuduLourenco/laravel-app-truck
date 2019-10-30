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


window.onload = graficoColStack();
function graficoColStack(){
    var gastos = JSON.parse(showGetResult());
    var Estadia=[];
    var Alimentacao=[];
    var TrocaOleo=[];
    var Manutencao=[];
    var Combustivel=[];
    for (let index = 0; index < gastos.length; index++) {
        // if( new Date(gastos[index].dtGasto).getTime() > new Date(Date.now()).getTime()-(2.628*Math.pow(10,9))){
        //     gastos.push({ y: this.parseFloat(gastos[index].dsValor  ), x: periodo });
        // }
        if( gastos[index].dsTipo=="Estadia"){
                Estadia.push({ y: this.parseFloat(gastos[index].dsValor), x:new Date(new Date(gastos[index].dtGasto).getFullYear(),new Date(gastos[index].dtGasto).getMonth()) });
        }else if( gastos[index].dsTipo=="Alimentação"){
            Alimentacao.push({ y: this.parseFloat(gastos[index].dsValor), x:new Date(new Date(gastos[index].dtGasto).getFullYear(),new Date(gastos[index].dtGasto).getMonth()) });
        }else if( gastos[index].dsTipo=="Troca de Óleo"){
            TrocaOleo.push({ y: this.parseFloat(gastos[index].dsValor),x: new Date(new Date(gastos[index].dtGasto).getFullYear(),new Date(gastos[index].dtGasto).getMonth()) });
        }else if( gastos[index].dsTipo=="Manutenção"){
            Manutencao.push({ y: this.parseFloat(gastos[index].dsValor), x:new Date(new Date(gastos[index].dtGasto).getFullYear(),new Date(gastos[index].dtGasto).getMonth()) });
        }else if( gastos[index].dsTipo=="Combustível"){
            Combustivel.push({ y: this.parseFloat(gastos[index].dsValor), x:new Date(new Date(gastos[index].dtGasto).getFullYear(),new Date(gastos[index].dtGasto).getMonth()) });
        }
    }
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        axisX: {
            interval: 1,
            intervalType: "Month"
        },
        axisY:{
            valueFormatString:"R$##0,00",
            gridColor: "#B6B1A8",
            tickColor: "#B6B1A8"
        },
        toolTip: {
            shared: true,
            content: toolTipContent
        },
        data: [{
            type: "stackedColumn",
            showInLegend: true,
            color: "#EE820F",
            name: "Combustível",
            dataPoints: Combustivel

            },
            {
                type: "stackedColumn",
                showInLegend: true,
                name: "Manutenção",
                color: "#B80B0B",
                dataPoints: Manutencao

            },
            {
                type: "stackedColumn",
                showInLegend: true,
                name: "Troca de Óleo",
                color: "#E5D212",
                dataPoints: TrocaOleo

            },
            {
                type: "stackedColumn",
                showInLegend: true,
                name: "Estadia",
                color: "#12B819",
                dataPoints: Estadia

            },
            {
                type: "stackedColumn",
                showInLegend: true,
                name: "Alimentação",
                color: "#1449E3",
                dataPoints: Alimentacao

        }]
    });
    chart.render();

    function toolTipContent(e) {
        var str = "";
        var total = 0;
        var str2, str3;
        for (var i = 0; i < e.entries.length; i++){
            var  str1 = "<span style= \"color:"+e.entries[i].dataSeries.color + "\"> "+e.entries[i].dataSeries.name+"</span>: R$<strong>"+e.entries[i].dataPoint.y+"</strong><br/>";
            total = e.entries[i].dataPoint.y + total;
            str = str.concat(str1);
        }
        str2 = "<span style = \"color:DodgerBlue;\"><strong>"+(e.entries[0].dataPoint.x).getFullYear()+"/"+(e.entries[0].dataPoint.x).getMonth()+"</strong></span><br/>";
        total = Math.round(total * 100) / 100;
        str3 = "<span style = \"color:Tomato\">Total:</span><strong> R$"+total+"</strong><br/>";
        return (str2.concat(str)).concat(str3);
    }
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
                success:function(){
                    document.location.reload(true);
                },
                error:function(data){
                    window.alert(JSON.stringify(data));
                }
            });
        }
    });
}

function retirar(){
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    bootbox.prompt({
        size: "small",
        inputType: "number",
        title: "Qual valor você deseja retirar?",

        callback: function(result){
            var scriptUrl = 'depositarCofrinho';
            $.ajax({
                url: scriptUrl,
                type: 'POST',
                data: {valor:-parseFloat(result), usuario:$("#cpfUsuario").val()},
                dataType: 'JSON',
                async: false,
                success:function(){
                    document.location.reload(true);
                },
                error:function(data){
                    window.alert(JSON.stringify(data));
                }
            });
        }
    });
}
