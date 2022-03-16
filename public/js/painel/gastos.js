//gasto ano
var gastosAno = new XMLHttpRequest();
gastosAno.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        var saldoAtualizado = "";
        gastosAno = this.response.toString();
        document.getElementById("gasto_ano").innerHTML =
            "Gastos Ano: " +
            currency(gastosAno.toString(), {
                separator: " ",
            }).format();
        document.getElementById("gasto_ano").style.display = "";
    }
};

gastosAno.open("GET", "/gastoAno", true);
gastosAno.send();

//gasto mensal
var gastosMes = new XMLHttpRequest();
gastosMes.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        var saldoAtualizado = "";
        gastosMes = this.response.toString();
        document.getElementById("gasto_mes").innerHTML =
            "Gastos Mes: " +
            currency(gastosMes.toString(), {
                separator: " ",
            }).format();
        document.getElementById("gasto_mes").style.display = "";
    }
};

gastosMes.open("GET", "/lancamentos_gastos_mensal", true);
gastosMes.send();
