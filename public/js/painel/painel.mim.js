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
        document.getElementById("investimentosPainel").innerHTML = currency(investimentos.toString(), { separator: " " }).format();
    }
};

investimentosHTTP.open("GET", "/getInvestimentoAtualizado", true);
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
//investir
/*
					  var investirHTTP = new XMLHttpRequest();
					  investirHTTP.onreadystatechange = function() {
					    if (this.readyState == 4 && this.status == 200) {
					       var investir = "";
					       investir = this.response.toString();
					       document.getElementById("investir").innerHTML =    currency(investir.toString(), { separator: ' ' }).format();

					    }
					  };

					  investirHTTP.open("GET", "/investir", true);
					  investirHTTP.send();
*/

//equi fim
var equiFimHTTP = new XMLHttpRequest();
equiFimHTTP.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        var equiFim = "";
        equiFim = this.response.toString();
        document.getElementById("equiFim").innerHTML = currency(equiFim.toString(), { separator: " " }).format();
    }
};

equiFimHTTP.open("GET", "/equifim", true);
equiFimHTTP.send();
//metaabc

var metaabcHTTP = new XMLHttpRequest();
metaabcHTTP.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        var metaabc = "";
        metaabc = this.response.toString();
        document.getElementById("metaabc").innerHTML = currency(metaabc.toString(), { separator: " " }).format();
    }
};

metaabcHTTP.open("GET", "/metaabc", true);
metaabcHTTP.send();
