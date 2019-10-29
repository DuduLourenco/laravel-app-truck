function showGetResult()
{
     var result = null;
     var scriptUrl = 'listarViagens/'+ $("#cpfUsuario").val();
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


window.onload = function () {
    var lucros = JSON.parse(showGetResult());
    var arrayLucros = [];
    for (let index = 0; index < lucros.length; index++) {
        if(lucros[index].dsStatus == "Feita"){
            arrayLucros.push({ label: lucros[index].dtPrazo,  y: this.parseFloat(lucros[index].dsLucro) });    
        }
    }
    arrayLucros.push(
        { label: "Lucro Mensal", isIntermediateSum: true});
    window.alert(JSON.stringify(arrayLucros));
    var chart = new CanvasJS.Chart("chartContainer", {
        theme: "light1", // "light1", "ligh2", "dark1", "dark2"
        animationEnabled: true,
        title: {
            text: "Balanço"
        },
        axisY: {
            title: "Balanço)",
            prefix: "R$",
            lineThickness: 0
        },
        data: [{
            type: "waterfall",
            indexLabel: "{y}",
            indexLabelFontColor: "#EEEEEE",
            indexLabelPlacement: "inside",
            yValueFormatString: "#,##0",
            dataPoints: arrayLucros
        }]
    });
    chart.render();
    
    }