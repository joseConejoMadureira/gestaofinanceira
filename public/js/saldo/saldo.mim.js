var saldoGraficoMensal;
var saldoGrafico = new XMLHttpRequest();
saldoGrafico.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        saldoGraficoMensal = JSON.parse(this.responseText);
        saldoGraficoMensal["saldo"].shift();

        var investimentos = [];

        for (var i = 1; i < saldoGraficoMensal["investimentos"].length; i++) {
            investimentos.push(saldoGraficoMensal["investimentos"][i]);
        }
        var ctx = document.getElementById("myChart").getContext("2d");

        var myChart = new Chart(ctx, {
            type: "line",
            data: {
                labels: ["jan", "fev", "marc", "abr", "mai", "jun", "jul", "ago", "set", "out", "nov", "dez"],
                datasets: [
                    {
                        label: "saldo",
                        data: saldoGraficoMensal["saldo"],
                        borderColor: "rgb(75, 192, 192)",
                        tension: 0.1,
                        yAxisID: "y",
                    },
                    {
                        label: "Investimentos",
                        data: investimentos,
                        borderColor: "rgb(255,215,0)",
                        yAxisID: "y1",
                    },
                ],
            },
            options: {
                responsive: true,
                interaction: {
                    mode: "index",
                    intersect: false,
                },
                stacked: false,
                plugins: {
                    title: {
                        display: true,
                        text: "saldo",
                    },
                },
                scales: {
                    y: {
                        type: "linear",
                        display: true,
                        position: "left",
                    },
                    y1: {
                        type: "linear",
                        display: true,
                        position: "right",

                        // grid line settings
                        grid: {
                            drawOnChartArea: false, // only want the grid lines for one axis to show up
                        },
                    },
                },
            },
        });
    }
};

saldoGrafico.open("GET", "/saldoGrafico", true);
saldoGrafico.send();
