google.charts.load('current', {packages: ['corechart', 'line']});
      google.charts.setOnLoadCallback(drawBackgroundColor);

      function drawBackgroundColor() {
        var data = new google.visualization.DataTable();
        data.addColumn('date', 'X');
        data.addColumn('number', 'uS');
        //data.addColumn('date', 'Y');


      //var dados_us = <?php echo $dados;?>;//recebe dados formatados em JSON via PHP e grava na variavel JS dados_us

      var dados_us = $('.results').val();
      dados_us = JSON.parse(dados_us);
      //console.log(dados_us);
      for (var i = dados_us.length - 1; i >= 0; i--){  
        var val = parseInt(dados_us[i].us);//converte para inteiro valor da US

        var mySQLDate = dados_us[i].dthmedicao;
        var data_med = new Date(Date.parse(mySQLDate.replace('-','/','g')));//converte data padrao mySQL para padrao JS

       // alert(data_med);
       data.addRows([
        [data_med,val,]
        ]);
       }//laco para inserção e apresentacao dos ponto de uS no grafico de linhas
       

       var options = {
        hAxis: {
          title: 'Tempo'
        },
        vAxis: {
          title: 'Condutividade'
        },
        backgroundColor: '#ffffff'
      };

      var chart = new google.visualization.AreaChart(document.getElementById('grafico_uS'));
      chart.draw(data, options);
    }
