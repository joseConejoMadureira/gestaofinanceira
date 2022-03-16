var xmlhttp = new XMLHttpRequest(),
    method = "GET",
    url = "/gauge";

xmlhttp.open(method, url, !0),
    (xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === XMLHttpRequest.DONE && 200 === xmlhttp.status) {
            var t = JSON.parse(xmlhttp.responseText);
            google.charts.load("current", {
                packages: ["gauge"],
            }),
                google.charts.setOnLoadCallback(function () {
                    var e = google.visualization.arrayToDataTable([
                            ["Label", "value"],
                            ["patrimonio", 0],
                        ]),
                        a = {
                            redFrom: 0,
                            redTo: t.investimentos,
                            yellowFrom: t.equiinic,
                            yellowTo: t.equifim,
                            minorTicks: 5,
                            max: t.meta,
                        },
                        o = new google.visualization.Gauge(document.getElementById("chart_div"));
                    e.setValue(0, 1, t.patrimonio), o.draw(e, a);
                });
        }
        console.log("gauge" + xmlhttp.status);
    }),
    xmlhttp.send();
