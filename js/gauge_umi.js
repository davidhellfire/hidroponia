    google.charts.load('current', {'packages':['gauge']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var dados_umi = $('#last_umi').val();//pega via jquery recebe ultimo valor do umidade gravado em BD
    //  var resultado = $('.results').val();
     // resultado = JSON.parse(resultado);
      //console.log('valor:',resultado[0].temp);
     // console.log( resultado);

      var val = parseInt(dados_umi);//converte valor string vindo do vetor de objeto JSON para integer


      var data = google.visualization.arrayToDataTable([
        ['Label', 'Value'],
       //['pH', 7],
       ['Umid.', val]
       //['Temp.', 28]
       ]);

      var options = {
        width: 450, height: 200,
        redFrom: 0, redTo: 20,
        yellowFrom:20, yellowTo: 30,
        greenFrom:30, greenTo: 100,
        minorTicks: 5
      };

      var chart = new google.visualization.Gauge(document.getElementById('gauge_umi'));

      
      chart.draw(data , options);
      //setInterval(function() {
       // data.setValue(0, 1, 2 + Math.round(20 * Math.random()));
      //  chart.draw(data, options);
     // }, 3000);
   }