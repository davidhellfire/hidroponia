<?php
echo "The current date is ";
echo date("l F d, Y");
 $variavel = 'variavel';
 ?>


<html>
 <head>
  <title>Passar Variável PHP para Javascript</title>
 </head>
 <body>

  <script type="text/javascript">
   var mensagem = "<?php echo $variavel;?>";
   alert(mensagem);
  </script>

 </body>
</html>