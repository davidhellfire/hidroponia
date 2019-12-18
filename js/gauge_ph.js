    google.charts.load('current', {'packages':['gauge']});
    google.charts.setOnLoadCallback(drawChart);
 
    function drawChart() {
      var dados_ph = $('#last_ph').val();//recebe ultimo valor do ph gravado em BD
      var val = parseInt(dados_ph);//converte valor string vindo do vetor de objeto JSON para integer
      console.log(dados_ph);

      var data = google.visualization.arrayToDataTable([
        ['Label', 'Value'],
        ['pH', val],
        ]);

      var options = {
        min:0, max:14,
        width: 250, height: 200,
        redFrom: 0, redTo: 5.5,
        yellowFrom:6.5, yellowTo: 14,
        greenFrom:5.5, greenTo: 6.5,
        minorTicks: 7
      };

      var chart = new google.visualization.Gauge(document.getElementById('gauge_ph'));

      chart.draw(data, options);//primeira renderização do relogio

    }