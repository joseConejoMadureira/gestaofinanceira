var totalDespesas,
    totalDespesasHTTP = new XMLHttpRequest();
(totalDespesasHTTP.onreadystatechange = function () {
    if (4 == this.readyState && 200 == this.status) {
        (totalDespesas = this.response.toString()),
            (document.getElementById("totalDespesas").innerHTML = "Total: " + currency(totalDespesas.toString(), { separator: " " }).format()),
            (totalDespesas *= 12),
            (document.getElementById("totalDespesasAno").innerHTML = "Ano Total: " + currency(totalDespesas.toString(), { separator: " " }).format());
    }
}),
    totalDespesasHTTP.open("GET", "/getTotal", !0),
    totalDespesasHTTP.send();
