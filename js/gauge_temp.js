google.charts.load('current', {'packages':['gauge']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var dados_temp = $('#last_temp').val();//recebe ultimo valor do temperatura gravado em BD
      var val = parseInt(dados_temp);//converte valor string vindo do vetor de objeto JSON para integer

      var data = google.visualization.arrayToDataTable([
        ['Label', 'Value'],
        ['Temp.', val]
        ]);

      var options = {
        min:0, max:50,
        width: 450, height: 200,
        redFrom: 40, redTo: 50,
        yellowFrom:0, yellowTo: 20,
        greenFrom:20, greenTo: 40,
        minorTicks: 5
      };

      var chart = new google.visualization.Gauge(document.getElementById('gauge_temp'));

      chart.draw(data, options);

    }