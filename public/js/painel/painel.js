//saldo
var saldoAtualizado = "";
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        saldoAtualizado = this.response.toString();
        document.getElementById("saldo").innerHTML = currency(saldoAtualizado.toString(), { separator: " " }).format();
    }
};

xhttp.open("GET", "/saldoAtualizado", true);
xhttp.send();

//gastos mes
var gastosMes = new XMLHttpRequest();
gastosMes.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        var saldoAtualizado = "";
        gastosMes = this.response.toString();
        document.getElementById("gastoMes").innerHTML = currency(gastosMes.toString(), { separator: " " }).format();
    }
};

gastosMes.open("GET", "/lancamentos_gastos_mensal", true);
gastosMes.send();

//saldo mes

var saldoMes = new XMLHttpRequest();
saldoMes.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        var saldoAtualizado = "";
        gastosMes = this.response.toString();
        document.getElementById("saldoMes").innerHTML = currency(gastosMes.toString(), { separator: " " }).format();
    }
};

saldoMes.open("GET", "/saldoMes", true);
saldoMes.send();

//investimentos painel

var investimentosHTTP = new XMLHttpRequest();
investimentosHTTP.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        investimentos = this.response.toString();
        document.getElementById("investimentos").innerHTML = currency(investimentos.toString(), { separator: " " }).format();
    }
};

investimentosHTTP.open("GET", "/investimentos", true);
investimentosHTTP.send();

//investimentos

var anosHTTP = new XMLHttpRequest();
anosHTTP.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        var anos = "";
        anos = this.response.toString();
        document.getElementById("anos").innerHTML = anos.toString();
    }
};

anosHTTP.open("GET", "/anos", true);
anosHTTP.send();
//livre
var livrehttp = new XMLHttpRequest();
livrehttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        var livre = "";
        livre = this.response.toString();
        document.getElementById("livre").innerHTML = currency(livre.toString(), { separator: " " }).format();
    }
};

livrehttp.open("GET", "/livre", true);
livrehttp.send();