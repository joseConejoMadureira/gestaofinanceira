var x = document.getElementsByClassName("moeda");
var i;
for (i = 0; i < x.length; i++) {
    x[i].innerText = currency(x[i].innerText, { separator: " " }).format();
}
