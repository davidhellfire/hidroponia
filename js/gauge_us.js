google.charts.load('current', {'packages':['gauge']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var dados_us = $('#last_us').val();//recebe ultimo valor do us gravado em BD
      var val = parseInt(dados_us);//converte valor string vindo do vetor de objeto JSON para integer

      var data = google.visualization.arrayToDataTable([
        ['Label', 'Value'],
        ['uS', val],
        ]);

      var options = {
        min:0, max:6000,
        width: 450, height: 200,
        redFrom: 0, redTo: 3500,
        yellowFrom:4500, yellowTo: 6000,
        greenFrom:3500, greenTo: 4500,
        minorTicks: 15
      };

      var chart = new google.visualization.Gauge(document.getElementById('gauge_uS'));

      chart.draw(data, options);

    }