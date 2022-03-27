var investimentosHTTP = new XMLHttpRequest;
investimentosHTTP.onreadystatechange = function () {
    if (4 == this.readyState && 200 == this.status) {
        var t = "";
        t = this.response.toString(), document.getElementById("investimentos").innerHTML = currency(t.toString(), {
            separator: " "
        }).format()
    }
}, investimentosHTTP.open("GET", "/investimentoLabel", !0), investimentosHTTP.send();