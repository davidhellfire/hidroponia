google.charts.load('current', {packages: ['corechart', 'line']});
    google.charts.setOnLoadCallback(drawBackgroundColor);

    function drawBackgroundColor() {
      var data = new google.visualization.DataTable();
      data.addColumn('date', 'X');
      data.addColumn('number', 'pH');
      

    //  var dados_ph = <?php echo $dados;?>;//recebe dados formatados em JSON via PHP e grava na variavel JS dados_ph

      var dados_ph = $('.results').val();
      dados_ph = JSON.parse(dados_ph);
      //console.log(dados_us);

      for (var i = dados_ph.length - 1; i >= 0; i--){    
        var val = parseInt(dados_ph[i].ph);//converte para inteiro valor da pH

        var mySQLDate = dados_ph[i].dthmedicao;
        var data_med = new Date(Date.parse(mySQLDate.replace('-','/','g')));//converte data padrao mySQL para padrão JS

        data.addRows([
          [data_med,val]
          ]);
       }//laco para inserção e apresentacao dos ponto de pH no grafico de linhas
       

       var options = {
        hAxis: {
          title: 'Tempo'
        },
        vAxis: {
          title: 'pH'
        },
        backgroundColor: '#ffffff'
      };

      var chart = new google.visualization.AreaChart(document.getElementById('grafico_pH'));
      chart.draw(data, options);
    }