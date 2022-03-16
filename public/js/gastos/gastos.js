google.charts.load("current", { packages: ["corechart", "line"] });
google.charts.setOnLoadCallback(drawBasic);

var saldoGraficoMensalGastos;
var saldoGraficoGastos = new XMLHttpRequest();
saldoGraficoGastos.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        saldoGraficoMensalGastos = JSON.parse(this.responseText);
    }
};

saldoGraficoGastos.open("GET", "/gastoGrafico", true);
saldoGraficoGastos.send();

function drawBasic() {
    var data = new google.visualization.DataTable();
    data.addColumn("string", "X");
    data.addColumn("number", "Valor");
    var mes = ["pula", "jan", "fev", "mar", "abr", "mai", "jun", "jul", "ago", "set", "out", "nov", "dez"];

    for (var i = 1; i < saldoGraficoMensalGastos.length; i++) {
        data.addRow([mes[i], Math.abs(saldoGraficoMensalGastos[i])]);
    }

    var options = {
        hAxis: {
            title: "Valor",
        },
        vAxis: {
            title: "$$",
        },
        colors: ["red", "#004411"],
    };

    var linha = new google.visualization.LineChart(document.getElementById("chart_div_linha"));

    linha.draw(data, options);
}
