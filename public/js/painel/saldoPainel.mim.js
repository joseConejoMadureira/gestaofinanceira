var xhttp = new XMLHttpRequest();
(xhttp.onreadystatechange = function () {
    if (4 == this.readyState && 200 == this.status) {
        var t = "";
        (t = this.response.toString()) < 0
            ? ((document.getElementById("saldoMesNegativo").innerHTML =
                  "Saldo Mes: " +
                  currency(t.toString(), {
                      separator: " ",
                  }).format()),
              (document.getElementById("saldoMesNegativo").style.display = ""))
            : ((document.getElementById("saldoMesPositivo").innerHTML =
                  "Saldo Mes: " +
                  currency(t.toString(), {
                      separator: " ",
                  }).format()),
              (document.getElementById("saldoMesPositivo").style.display = ""));
    }
}),
    xhttp.open("GET", "/saldoMes", !0),
    xhttp.send();

var saldoAcoesAno = new XMLHttpRequest();
(saldoAcoesAno.onreadystatechange = function () {
    if (4 == this.readyState && 200 == this.status) {
        var t = "";
        (t = this.response.toString()) < 0
            ? ((document.getElementById("saldoAnoNegativo").innerHTML =
                  "Saldo Ano: " +
                  currency(t.toString(), {
                      separator: " ",
                  }).format()),
              (document.getElementById("saldoAnoNegativo").style.display = ""))
            : ((document.getElementById("saldoAnoPositivo").innerHTML =
                  "Saldo Ano: " +
                  currency(t.toString(), {
                      separator: " ",
                  }).format()),
              (document.getElementById("saldoAnoPositivo").style.display = ""));
    }
}),
    saldoAcoesAno.open("GET", "/saldoAno", !0),
    saldoAcoesAno.send();
