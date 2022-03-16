//bbMultiestrategia

var bbMultiEstrategiaHTTP = new XMLHttpRequest();
bbMultiEstrategiaHTTP.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        var bbMultiestrategia = "";
        bbMultiestrategia = this.response.toString();
        document.getElementById("bbMultiestrategia").innerHTML = currency(bbMultiestrategia.toString(), { separator: " " }).format();
    }
};

bbMultiEstrategiaHTTP.open("GET", "/bbMultiestrategia", true);
bbMultiEstrategiaHTTP.send();
