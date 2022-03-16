var gastosAno = new XMLHttpRequest();
(gastosAno.onreadystatechange = function () {
    if (4 == this.readyState && 200 == this.status) {
        (gastosAno = this.response.toString()), (document.getElementById("gasto_ano").innerHTML = "Gastos Ano: " + currency(gastosAno.toString(), { separator: " " }).format()), (document.getElementById("gasto_ano").style.display = "");
    }
}),
    gastosAno.open("GET", "/gastoAno", !0),
    gastosAno.send();
var gastosMes = new XMLHttpRequest();
(gastosMes.onreadystatechange = function () {
    if (4 == this.readyState && 200 == this.status) {
        (gastosMes = this.response.toString()), (document.getElementById("gasto_mes").innerHTML = "Gastos Mes: " + currency(gastosMes.toString(), { separator: " " }).format()), (document.getElementById("gasto_mes").style.display = "");
    }
}),
    gastosMes.open("GET", "/lancamentos_gastos_mensal", !0),
    gastosMes.send();
