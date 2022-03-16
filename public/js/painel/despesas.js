var totalDespesas;
var totalDespesasHTTP = new XMLHttpRequest();
totalDespesasHTTP.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        var saldoAtualizado = "";
        totalDespesas = this.response.toString();
        document.getElementById("totalDespesas").innerHTML = "Total: " + currency(totalDespesas.toString(), { separator: " " }).format();
        totalDespesas = totalDespesas * 12;

        document.getElementById("totalDespesasAno").innerHTML = "Ano Total: " + currency(totalDespesas.toString(), { separator: " " }).format();
    }
};

totalDespesasHTTP.open("GET", "/getTotal", true);
totalDespesasHTTP.send();
