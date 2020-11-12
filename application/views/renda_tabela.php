<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8"/>
</head>

<style type="text/css">
	
body{

padding: 30px;

}

table{

width: 100%;
border: 1px solid #555555;
margin: 0;
padding: 0;

}

table, th, td{

border: 1px solid #555555;
border-collapse: collapse;
text-align: left;
padding: 10px;

}




</style>

<body>

<table>
  
<tr>


<th><center>DATA</center></th>
<th><center>DESCRIÇÃO</center></th>
<th><center> RENDA FIXA</center></th>
<th><center>DESCRIÇÃO</center></th>
<th><center>1° RENDA VARIAVEL</center></th>
<th><center>DESCRIÇÃO</center></th>
<th><center>2° RENDA VARIAVEL</center></th>
<th><center>DESCRIÇÃO</center></th>
<th><center>3° RENDA VARIAVEL</center></th>
<th><center>DESCRIÇÃO</center></th>
<th><center>4° RENDA VARIAVEL</center></th>
<th><center>DESCRIÇÃO</center></th>
<th><center>5° RENDA VARIAVEL</center></th>
<th><center>SALDO</center></th>


</tr>


<?php 


 foreach ($valores_financas as $row) { ?>

<tr>


<td><center><?= $row['data']; ?></center></td>

<td><?= $row['descricao_renda_fixa_mensal']; ?></td>

<td style="background-color:#DCDCDC"><center><?= number_format( $row['renda_fixa_mensal'], 2, ',', '.');?> R$</center></td>

<td><?= $row['descricao_renda_variavel_mensal_1']; ?></td>

<td style="background-color:#DCDCDC"><center><?=number_format($row['renda_variavel_mensal'], 2, ',', '.');?> R$</center></td>

<td><?= $row['descricao_renda_variavel_mensal_2']; ?></td>

<td style="background-color:#DCDCDC"><center><?=number_format( $row['renda_variavel_mensal_2'], 2, ',', '.');?> R$</center></td>

<td><?= $row['descricao_renda_variavel_mensal_3']; ?></td>

<td style="background-color:#DCDCDC"><center><?=number_format($row['renda_variavel_mensal_3'], 2, ',', '.') ;?> R$</center></td>

<td><?= $row['descricao_renda_variavel_mensal_4']; ?></td>

<td style="background-color:#DCDCDC"><center><?=number_format($row['renda_variavel_mensal_4'], 2, ',', '.') ;?> R$</center></td>

<td><?= $row['descricao_renda_variavel_mensal_5']; ?></td>

<td style="background-color:#DCDCDC"><center><?=number_format($row['renda_variavel_mensal_5'], 2, ',', '.') ;?> R$</center></td>

<td style="background-color:#A9A9A9"><center><?=number_format($row['saldo']);?> R$</center></td>



</tr>


<?php } ?>

</table>





</body>
</html>