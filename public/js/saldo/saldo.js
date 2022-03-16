var saldoGraficoMensal;
var saldoGrafico = new XMLHttpRequest();
saldoGrafico.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        saldoGraficoMensal = JSON.parse(this.responseText);
    }
};

saldoGrafico.open("GET", "/saldoGrafico", true);
saldoGrafico.send();

const labels = ["jan", "fev", "Mar", "Ap", "May", "Jun", "Jul", "ago", "set", "out", "nov", "dez"];
const data = {
    labels: labels,
    datasets: [
        {
            label: "My First dataset",
            backgroundColor: "rgb(255, 99, 132)",
            borderColor: "rgb(255, 99, 132)",
            data: saldoGraficoMensal,
        },
    ],
};
