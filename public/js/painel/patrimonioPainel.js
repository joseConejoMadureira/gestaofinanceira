var xmlhttp = new XMLHttpRequest(),
    method = "GET",
    url = "/gauge";

xmlhttp.open(method, url, true);
xmlhttp.timeout = 2000;
xmlhttp.onreadystatechange = function () {
    if (xmlhttp.readyState === XMLHttpRequest.DONE && xmlhttp.status === 200) {
        var json = JSON.parse(xmlhttp.responseText);

        google.charts.load("current", { packages: ["gauge"] });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Label", "value"],
                ["patrimonio", 0],
            ]);

            var options = {
                redFrom: 0,
                redTo: json["investimentos"],
                yellowFrom: json["equiinic"],
                yellowTo: json["equifim"],
                minorTicks: 5,
                max: json["meta"],
            };

            var chart = new google.visualization.Gauge(document.getElementById("chart_div"));
            data.setValue(0, 1, json["patrimonio"]);
            chart.draw(data, options);
        }
    }
};

xmlhttp.send();
