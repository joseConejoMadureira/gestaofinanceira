var saldoGraficoMensalPatrimonio;
var saldoGraficoMensalPatrimonioHTTP = new XMLHttpRequest();
saldoGraficoMensalPatrimonioHTTP.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        saldoGraficoMensalPatrimonio = JSON.parse(this.responseText);
        saldoGraficoMensalPatrimonio.shift();
        var ctx = document.getElementById("myChart").getContext("2d");
        var myChart = new Chart(ctx, {
            type: "line",
            data: {
                labels: ["jan", "fev", "marc", "abr", "mai", "jun", "jul", "ago", "set", "out", "nov", "dez"],
                datasets: [
                    {
                        label: "saldo",
                        data: saldoGraficoMensalPatrimonio,

                        borderColor: "rgb(75, 192, 192)",
                        tension: 0.1,
                    },
                ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });
        var myChart = new Chart(document.getElementById("myChart"), config);
    }
};

saldoGraficoMensalPatrimonioHTTP.open("GET", "/graficoPatrimonio", true);
saldoGraficoMensalPatrimonioHTTP.send();
