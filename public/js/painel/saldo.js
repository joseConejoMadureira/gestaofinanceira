//saldo mes
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        var saldoAtualizado = "";
        saldoAtualizado = this.response.toString();
        if (saldoAtualizado < 0) {
            document.getElementById("saldoMesNegativo").innerHTML = "Saldo Mes: " + currency(saldoAtualizado.toString(), { separator: " " }).format();
            document.getElementById("saldoMesNegativo").style.display = "";
        } else {
            document.getElementById("saldoMesPositivo").innerHTML = "Saldo Mes: " + currency(saldoAtualizado.toString(), { separator: " " }).format();
            document.getElementById("saldoMesPositivo").style.display = "";
        }
    }
};

xhttp.open("GET", "/saldoMes", true);
xhttp.send();

//saldo  ano
var saldoAcoesAno = new XMLHttpRequest();
saldoAcoesAno.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        var saldoAtualizado = "";
        saldoAtualizado = this.response.toString();
        if (saldoAtualizado < 0) {
            document.getElementById("saldoAnoNegativo").innerHTML = "Saldo Ano: " + currency(saldoAtualizado.toString(), { separator: " " }).format();
            document.getElementById("saldoAnoNegativo").style.display = "";
        } else {
            document.getElementById("saldoAnoPositivo").innerHTML = "Saldo Ano: " + currency(saldoAtualizado.toString(), { separator: " " }).format();
            document.getElementById("saldoAnoPositivo").style.display = "";
        }
    }
};

saldoAcoesAno.open("GET", "/saldoAno", true);
saldoAcoesAno.send();
//saldo Grafico
