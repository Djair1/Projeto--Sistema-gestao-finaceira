<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
	<title>TESTE</title>

<script type="text/javascript"
    src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
		//carregando modulo visualization
      google.load("visualization", "1", {packages:["corechart"]});

	  //função de monta e desenha o gráfico
      function drawChart() {
	//variavel com armazenamos os dados, um array de array's
	//no qual a primeira posição são os nomes das colunas
	var data = google.visualization.arrayToDataTable([
          ['Linguagem', 'Quando gosto dela'],
          ['mulheres',     20],
          ['homens',      30],
          ['outros',  1],
          ['teste', 4],
          ['nome',5],

        ]);
		//opções para exibição do gráfico
        var options = {
          		title: 'Linguagens',//titulo do gráfico
		is3D: true // false para 2d e true para 3d o padrão é false
        };
		//cria novo objeto PeiChart que recebe
		//como parâmetro uma div onde o gráfico será desenhado
        var chart = new google.visualization
        .PieChart(document.getElementById('chart_div'));
		//desenha passando os dados e as opções
        chart.draw(data, options);
      }
	//metodo chamado após o carregamento
	 google.setOnLoadCallback(drawChart);
    </script>

<style type="text/css">

#chart_div{

width:800px ;
height:800px;

}


</style>


</head>
<body>


	
<?php $val_1= 4000.50; $val_2 = 4000.50; ?>

<script type="text/javascript">
	
var teste = parseFloat("<?php echo $val_1 ; ?>"); 
var teste1 = parseFloat("<?php echo $val_2 ; ?>");

var result = teste + teste1;

document.write(result);

</script>


<div id="chart_div"></div>


</body>
</html>