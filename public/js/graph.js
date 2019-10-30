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

window.onload = grafico();

function grafico () {
    var lucros = JSON.parse(showGetResult());
    var arrayLucros = [];
    var spam = $("#timeSpam").val();
    var spamT = "";
    for (let index = 0; index < lucros.length; index++) {
        if(spam==1){
            if(lucros[index].dsStatus == "Feita" && new Date(lucros[index].dtPrazo).getTime() > new Date(Date.now()).getTime()-(3.154*Math.pow(10,10))){
                arrayLucros.push({ label: lucros[index].dtPrazo,  y: this.parseFloat(lucros[index].dsLucro) });
                spamT="Anual";
            }
        }else if(spam==2){
            if(lucros[index].dsStatus == "Feita" && new Date(lucros[index].dtPrazo).getTime() > new Date(Date.now()).getTime()-(2.628*Math.pow(10,9))){
                arrayLucros.push({ label: lucros[index].dtPrazo,  y: this.parseFloat(lucros[index].dsLucro) });
                spamT="Mensal";
            }
        }else{
            if(lucros[index].dsStatus == "Feita" ){
                arrayLucros.push({ label: lucros[index].dtPrazo,  y: this.parseFloat(lucros[index].dsLucro) });
                spamT="Total";
            }
        }

    }
    arrayLucros.push({ label: "Lucro "+spamT, isIntermediateSum: true});
    var chart = new CanvasJS.Chart("chartContainer", {
        theme: "light1", // "light1", "ligh2", "dark1", "dark2"
        animationEnabled: true,
        title: {
            text: "Balanço "+spamT
        },
        axisY: {
            title: "Lucro",
            prefix: "R$",
            lineThickness: 1
        },
        data: [{
            type: "column",
            indexLabel: "{y}",
            indexLabelFontColor: "#FFFF00",
            indexLabelPlacement: "inside",
            yValueFormatString: "#,##0.00",
            dataPoints: arrayLucros
        }]
    });
    chart.render();
    }

