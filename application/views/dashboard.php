<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>dashboard</title>

	<meta charset="utf-8">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>

	<link rel="shortcut icon" href="<?php echo base_url('public/imagens/icone.ico'); ?>" type="image/x-icon" />

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/dashboard.css'); ?>">


	<script type="text/javascript"
	src="https://www.google.com/jsapi"></script>

  <script type="text/javascript">
    
function aviso() {
      $('.alert-danger').alert('close');
    }

function adreceita(){

  $('#mdreceita').modal('show');

}

function addespesa(){

  $('#mddespesa').modal('show');

}    
  </script>

</head>
<body>
	<div id="info">
		<center><p>Economi$e</p></center>	
	</div>	


	<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
		<h5 class="my-0 mr-md-auto font-weight-normal">Economize</h5>
		<nav class="my-2 my-md-0 mr-md-3">
			<a class="p-2 text-dark" href="" data-toggle='modal' data-target='#mddesativar_conta'>Desativar Conta </a>
			<a class="p-2 text-dark" href="" data-toggle= 'modal' data-target='#sitemodal'>Atualizar Senha</a>
			<a class="p-2 text-dark" href="<?php echo site_url('Painel/sair'); ?>">Sair</a>
		</nav>
		<a class="btn btn-outline-primary" onclick="adreceita();">Cadastrar Finanças</a>
	</div>


<div class="alert alert-danger" style="z-index: 3; position: absolute; width: 100%">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Atenção !</strong><?php if ($this->session->userdata("avisoSenha")!="") {echo " ".$this->session->userdata("avisoSenha");}else{
    echo"<script> $('.alert-danger').alert('close');</script> ";
  }?>
</div>



	
<img id="fundo" src="<?php echo base_url('public/imagens/slide/02.jpg');?>">
<div id="painel" class=".container">
<div id="menu" class="vertical-menu">
  <a href="#" class="active">MENU</a>
  <a href="#"> Lembretes</a>
  <a href="#" data-toggle= 'modal' data-target='#h_renda'> Histórico de Renda</a>
  <a href="#" data-toggle= 'modal' data-target='#h_despesa'> Histórico de Despesas</a>
  <a href="<?php echo site_url('GerirFinancas/gerar_pdf_renda')  ?>" > Gerar relatório Atual</a>
</div>



<div id="valores">
  <br>
<h1>Dashboard </h1>
<p>Bem vindo <?php echo  $email ; ?></p>
<br>


<br><br>
<div class="container">
  <div class="row">
    <div1 class="col-sm">
      <center><p1><?php if ($this->session->userdata("valorReceitaFixaAtual")!=""){echo "R$" .$this->session->userdata("valorReceitaFixaAtual");}else{echo "R$ 0.00";}?></p1></center>
      <center><p2>Média da Renda</p2></center>
    </div1>

    <div1 class="col-sm">
      <center><p1><?php if ($this->session->userdata("valorDespesaFixaAtual")!=""){echo "R$" .$this->session->userdata("valorDespesaFixaAtual");}else{echo "R$ 0.00";}?></p1></center>
       <center><p2> Média da Despesa</p2></center> 
    </div1>

    <div1 class="col-sm">
      <center><p1><?php if ($this->session->userdata("valorsaldo")!=""){echo "R$" .$this->session->userdata("valorsaldo");}else{echo "R$ 0.00";}?></p1></center>
      <center><p2>Saldo Total Atual</p2></center> 
    </div1>
  </div>
</div>


</div>

	<div id="c1" >
<div id="grafico">
  
  <div id="chart_div"></div>

</div>
<div id="grafico1">
  <h4>GRAFICO FINANÇAS</h4>
</div>
<div id="grafico2">
  
<h5>example</h5>

</div>

<div id="rodape"></div>

</div>



  </div>

<!--modal alterar senha-->

<div class="modal" data-backdrop="static" id="sitemodal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!----------------------------------------------------------->

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-size: 25px;margin-left: 155px">Alterar Senha</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="<?php echo site_url('Painel/alterarSenha'); ?>  " method="post">
          <br>
          <div class="form-group">
            <label for="exampleInputPassword1">Senha Atual</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Atual" name="senhaA">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword2">Nova senha</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Nova" name="senhaB">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword2">Confirmar senha</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirmação" name="senhaC">
          </div>
          <br>
          <hr>
          <button style="width:470px ;height:35px ;font-size: 17px; border-radius: 5px ; background-color: #4682B4;" type="submit"  class="btn btn-primary">SALVAR</button>
        </form>

      </div>
      
    </div>  
  </div>
</div>

<!-- fim Modal -->


<!--modal adicionar finanças-->

<div class="modal" data-backdrop="static" id="mdreceita" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document" style="padding-top:0px ; padding-left: 220px">
    <div class="modal-content" style="width:900px ;right:400px ">
      <!----------------------------------------------------------->

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal_Label_cadastro_renda" style="margin-left:280px ">CADASTRO RENDA/ DESPESA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="<?php echo site_url('GerirFinancas/adicionar_valores'); ?>  " method="post">

          <br>

          <div class="form-group">
            <label for="exampleInput" style="margin-left: 340px;">RENDA FIXA MENSAL</label>
            <br><br>
            <label for="exampleInput">Faça uma breve descrição sobre sua renda fixa mensal, com seu devido valor para auxiliar nas suas futuras analises.</label>
            <br><br>
            <div class="row">
              <div class="col">
                <input type="text" name="r" class="form-control" placeholder="Descrição" style="width: 450px" maxlength="50">
              </div>
              <div class="col">
               <input type="text" placeholder="R$" class="form-control" name="renda_fixa_mensal" maxlength="10" onkeypress="$(this).mask('#.##0,00', {reverse: true})" style="width: 150px" >
             </div>
           </div>
         </div>
         <br>
         <hr>
         <br>
         <div class="form-group">
          <label for="exampleInput" style="margin-left: 320px;">RENDA VARIAVEL MENSAL</label>
          <br><br>
          <label for="exampleInput">Da mesma forma descreva sua renda variável mensal com seu devido valor, você poderá inserir até (5) rendas variáveis com seus respectivos valores.</label><br>

          <br>

          <div class="row" id="linha_renda">
            <div class="col">
              <input type="text" id="r1" name="d_1"  class="form-control" placeholder="1° renda variavel (Opcional)" style="width: 450px" maxlength="50">
            </div>
            <div class="col">
              <input type="text" id="rv1" placeholder="R$" class="form-control" name="renda_variavel_mensal" maxlength="10" onkeypress="$(this).mask('#.##0,00', {reverse: true})"  style="width: 150px ;margin-bottom:3px; " >
            </div>
            <div class="col">  
             <button type="button" onclick="addRendaVariavel();" class="btn btn-primary" id="add-campo" style="margin-top: 2px;width:35px; height: 35px;border-radius: 20px;" >+</button>

             <button type="button" onclick="subRendaVariavel();" class="btn btn-dark" id="add-campo" style="margin-top: 2px;width:35px; height: 35px;border-radius: 20px; color: white" >-</button>

           </div>
         </div>




         <div class="row" id="linha_renda2">
          <div class="col">
            <input type="text" id="r2" name="d_2"  class="form-control" placeholder="2° renda variavel (Opcional)" style="width: 450px" maxlength="50">
          </div>
          <div class="col">
            <input type="text" id="rv2" placeholder="R$" class="form-control" name="renda_variavel_mensal_2" maxlength="10" onkeypress="$(this).mask('#.##0,00', {reverse: true})"  style="width: 150px ;margin-bottom:3px; " >
          </div>
        </div>


        <div class="row" id="linha_renda3">
          <div class="col">
            <input type="text" id="r3" name="d_3"  class="form-control" placeholder="3° renda variavel (Opcional)" style="width: 450px" maxlength="50">
          </div>
          <div class="col">
            <input type="text" id="rv3" placeholder="R$" class="form-control" name="renda_variavel_mensal_3" maxlength="10" onkeypress="$(this).mask('#.##0,00', {reverse: true})"  style="width: 150px ;margin-bottom:3px; " >
          </div>
        </div>


        <div class="row" id="linha_renda4">
          <div class="col">
            <input type="text" id="r4" name="d_4"  class="form-control" placeholder="4° renda variavel (Opcional)" style="width: 450px" maxlength="50">
          </div>
          <div class="col">
            <input type="text" id="rv4" placeholder="R$" class="form-control" name="renda_variavel_mensal_4" maxlength="10" onkeypress="$(this).mask('#.##0,00', {reverse: true})"  style="width: 150px ;margin-bottom:3px; " >
          </div>
        </div>


        <div class="row" id="linha_renda5">
          <div class="col">
            <input type="text" id="r5" name="d_5"  class="form-control" placeholder="5° renda variavel (Opcional)" style="width: 450px" maxlength="50">
          </div>
          <div class="col">
            <input type="text" id="rv5" placeholder="R$" class="form-control" name="renda_variavel_mensal_5" maxlength="10" onkeypress="$(this).mask('#.##0,00', {reverse: true})"  style="width: 150px ;margin-bottom:3px; " >
          </div>
        </div>
      </div>
      <br>
      <hr>

      <br>
      <div class="form-group">
        <label for="exampleInput" style="margin-left: 38%">DESPESA FIXA MENSAL</label>
        <br><br>
        <label for="exampleInput">Faça uma breve descrição sobre sua Despesa fixa mensal, com seu devido valor para auxiliar nas suas futuras analises.</label><br>

        <br>
        <div class="row">
          <div class="col">
            <input type="text"  name="dm" class="form-control" placeholder="Descrição" style="width: 450px"  maxlength="50" >
          </div>
          <div class="col">
            <input type="text" name="despesa_fixa_mensal" placeholder="R$" class="form-control" maxlength="10" onkeypress="$(this).mask('#.##0,00', {reverse: true})"  style="width: 150px ;margin-bottom:3px;" >
          </div>
        </div>

      </div>
      <br>
      <br>
      <hr>
      <br>


      <div class="form-group">
        <label for="exampleInput" style="margin-left: 36%">DESPESA VARIAVEL MENSAL</label>
        <br><br>
        <label for="exampleInput">Descreva também sua despesa variável mensal com seu devido valor, você poderá inserir até (5) despesas variáveis com seus respectivos valores.</label><br><br>


        <div class="row" id="linha_despesa_1">
          <div class="col">
            <input type="text" name="dm0" class="form-control" placeholder="1° despesa variavel (Opcional)" style="width: 450px"  maxlength="50">
          </div>
          <div class="col">
            <input type="text" placeholder="R$" class="form-control" name="despesa_variavel_mensal_1" maxlength="10" onkeypress="$(this).mask('#.##0,00', {reverse: true})"  style="width: 150px ;margin-bottom:3px; " >
          </div>
          <div class="col">  
           <button type="button" onclick="addDespesaVariavel();" class="btn btn-primary" id="add-campo" style="margin-top: 2px;width:35px; height: 35px;border-radius: 20px;" >+</button>

           <button type="button" onclick="subDespesaVariavel();" class="btn btn-dark" id="add-campo" style="margin-top: 2px;width:35px; height: 35px;border-radius: 20px; color: white" >-</button>

         </div>
       </div>

       <div class="row" id="linha_despesa_2">
        <div class="col">
          <input type="text" id="lp2" name="dm1" class="form-control" placeholder="2° despesa variavel (Opcional)" style="width: 450px"  maxlength="50">
        </div>
        <div class="col">
          <input type="text" id="lv2"  placeholder="R$" class="form-control" name="despesa_variavel_mensal_2" maxlength="10" onkeypress="$(this).mask('#.##0,00', {reverse: true})"  style="width: 150px ;margin-bottom:3px; ">
        </div>
      </div>
      

      <div class="row" id="linha_despesa_3">
        <div class="col">
          <input type="text" id="lp3" name="dm2" class="form-control" placeholder="3° despesa variavel (Opcional)" style="width: 450px" maxlength="50">
        </div>
        <div class="col">
          <input type="text" id="lv3"  placeholder="R$" class="form-control" name="despesa_variavel_mensal_3" maxlength="10" onkeypress="$(this).mask('#.##0,00', {reverse: true})"  style="width: 150px ;margin-bottom:3px;">
        </div>
      </div>
      

      <div class="row" id="linha_despesa_4">
        <div class="col">
          <input type="text" id="lp4" name="dm3" class="form-control" placeholder="4° despesa variavel (Opcional)" style="width: 450px"  maxlength="50">
        </div>
        <div class="col">
          <input type="text" id="lv4"  placeholder="R$" class="form-control" name="despesa_variavel_mensal_4" maxlength="10" onkeypress="$(this).mask('#.##0,00', {reverse: true})"  style="width: 150px ;margin-bottom:3px; ">
        </div>
      </div>


      <div class="row" id="linha_despesa_5">
        <div class="col">
          <input type="text" id="lp5" name="dm4" class="form-control" placeholder="5° despesa variavel (Opcional)" style="width: 450px"  maxlength="50">
        </div>
        <div class="col">
          <input type="text" id="lv5" placeholder="R$" class="form-control" name="despesa_variavel_mensal_5" maxlength="10" onkeypress="$(this).mask('#.##0,00', {reverse: true})"  style="width: 150px ;margin-bottom:3px; "  maxlength="50">
        </div>
      </div>
    </div>

    <br>
    <br>
    <hr>
    <div class="row">
      <div class="col">
       <button type="reset" style="margin-left: 54%; width:180px;height: 35px "  class="btn btn-outline-secondary">LIMPAR</button>
       <button type="submit" style="width:180px;margin-left: 15px;height: 35px"  class="btn btn-outline-primary">SALVAR</button>
     </div>

   </div>

 </form>

</div>

</div>  
</div>
</div>


<!-- fim Modal -->

<!--modal Desativar conta-->

<div class="modal" id="mddesativar_conta" tabindex="-1" role="dialog" style="padding-top: 150px">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <!----------------------------------------------------------->

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel_1" style="margin-left: 130px;">DESATIVAR CONTA!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="<?php echo site_url('Painel/desativar_conta'); ?>  " method="post">
          <div class="form-group">
            <br>
            <label for="exampleInput"><p5 style="margin-left: 5px;">Ao clicar no botão desativar sua conta será desativada permanentemente, desta forma será necessário realizar um novo cadastro para poder efetuar um novo login.</label>
              <br>
            </div>
            <hr>
            <br>
            <button id="btdesativar" type="submit"  class="btn btn-primary" style="width:470px ;height:35px ;font-size: 17px; border-radius: 5px;border-color: white ;background-color: red">DESATIVAR</button>

          </form>

        </div>

      </div>  
    </div>
  </div>
  <!-- fim Modal -->



<!--modal historico de renda-->

<div class="modal" data-backdrop="static" id="h_renda" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document" style="overflow-y: initial;">
    <div class="modal-content" style="width:1200px; height:550px; right:350px">
      <!----------------------------------------------------------->

      <div class="modal-header">
        <h2 class="modal-title" style="margin-left: 450px">Histórico_da_Renda</h2>
        <br>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="height: 550px; overflow-y: auto;">

        

<table BORDER=1>
  
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


 foreach ($valores_financas as $row) { 

if (floatval(base64_decode($row['renda_fixa_mensal'])) + floatval(base64_decode($row['renda_variavel_mensal'])) + floatval(base64_decode($row['renda_variavel_mensal_2'])) + floatval(base64_decode( $row['renda_variavel_mensal_3'])) + floatval(base64_decode($row['renda_variavel_mensal_4'])) + floatval(base64_decode($row['renda_variavel_mensal_5'])) > 0){

  ?>

<tr>


<td><center><?= base64_decode($row['data']); ?></center></td>

<td><?= base64_decode($row['descricao_renda_fixa_mensal']); ?></td>

<td style="background-color:#DCDCDC"><center><?= number_format(floatval(base64_decode($row['renda_fixa_mensal'])), 2, ',', '.');?> R$</center></td>

<td><?= base64_decode($row['descricao_renda_variavel_mensal_1']); ?></td>

<td style="background-color:#DCDCDC"><center><?=number_format(floatval(base64_decode($row['renda_variavel_mensal'])), 2, ',', '.');?> R$</center></td>

<td><?= base64_decode($row['descricao_renda_variavel_mensal_2']); ?></td>

<td style="background-color:#DCDCDC"><center><?=number_format(floatval(base64_decode($row['renda_variavel_mensal_2'])), 2, ',', '.');?> R$</center></td>

<td><?= base64_decode($row['descricao_renda_variavel_mensal_3']); ?></td>

<td style="background-color:#DCDCDC"><center><?=number_format(floatval(base64_decode( $row['renda_variavel_mensal_3'])), 2, ',', '.') ;?> R$</center></td>

<td><?= base64_decode($row['descricao_renda_variavel_mensal_4']); ?></td>

<td style="background-color:#DCDCDC"><center><?=number_format(floatval(base64_decode($row['renda_variavel_mensal_4'])), 2, ',', '.') ;?> R$</center></td>

<td><?=base64_decode($row['descricao_renda_variavel_mensal_5']); ?></td>

<td style="background-color:#DCDCDC"><center><?=number_format(floatval(base64_decode($row['renda_variavel_mensal_5'])), 2, ',', '.') ;?> R$</center></td>

<td style="background-color:#A9A9A9"><center><?=number_format(floatval(base64_decode($row['saldo'])));?> R$</center></td>



</tr>


<?php }} ?>

</table>






      </div>
      
    </div>  
  </div>
</div>


<!-- fim Modal -->





<!--modal historico de despesa-->

<div class="modal" data-backdrop="static" id="h_despesa" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document" style="overflow-y: initial;">
    <div class="modal-content" style="width:1200px ; height:550px; right: 350px">
      <!----------------------------------------------------------->

      <div class="modal-header">
        <h2 class="modal-title"style="margin-left: 450px">Histórico_de_Despesas</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="height: 550px; overflow-y: auto;">



<table BORDER=1>
  

<tr>


<th><center>DATA</center></th>
<th><center>DESCRIÇÃO</center></th>
<th><center>DESPESA FIXA</center></th>
<th><center>DESCRIÇÃO</center></th>
<th><center>1° DESPESA VARIAVEL</center></th>
<th><center>DESCRIÇÃO</center></th>
<th><center>2° DESPESA VARIAVEL</center></th>
<th><center>DESCRIÇÃO</center></th>
<th><center>3° DESPESA VARIAVEL</center></th>
<th><center>DESCRIÇÃO</center></th>
<th><center>4° DESPESA VARIAVEL</center></th>
<th><center>DESCRIÇÃO</center></th>
<th><center>5° DESPESA VARIAVEL</center></th>
<th><center>SALDO</center></th>


</tr>


<?php 


 foreach ($valores_financas as $row) {

if (floatval(base64_decode($row['despesa_fixa_mensal']))+floatval(base64_decode($row['despesa_variavel_mensal']))+floatval(base64_decode($row['despesa_variavel_mensal_2'])) + floatval(base64_decode($row['despesa_variavel_mensal_3'])) + floatval(base64_decode($row['despesa_variavel_mensal_4'])) + floatval(base64_decode($row['despesa_variavel_mensal_5'])) > 0) {
  
  ?>


<tr>


<td><center><?= base64_decode($row['data']) ; ?></center></td>

<td><?= base64_decode($row['descricao_despesa_fixa_mensal']) ; ?></td>

<td style="background-color:#DCDCDC"><center><?= number_format(floatval(base64_decode($row['despesa_fixa_mensal'])) , 2, ',', '.');?> R$</center></td>

<td><?= base64_decode($row['descricao_despesa_variavel_mensal_1']) ; ?></td>

<td style="background-color:#DCDCDC"><center><?=number_format(floatval(base64_decode($row['despesa_variavel_mensal'])) , 2, ',', '.');?> R$</center></td>

<td><?= base64_decode($row['descricao_despesa_variavel_mensal_2']); ?></td>

<td style="background-color:#DCDCDC"><center><?=number_format(floatval(base64_decode($row['despesa_variavel_mensal_2'])) , 2, ',', '.');?> R$</center></td>

<td><?= base64_decode( $row['descricao_despesa_variavel_mensal_3']); ?></td>

<td style="background-color:#DCDCDC"><center><?=number_format(floatval(base64_decode($row['despesa_variavel_mensal_3'])), 2, ',', '.') ;?> R$</center></td>

<td><?= base64_decode($row['descricao_despesa_variavel_mensal_4']); ?></td>

<td style="background-color:#DCDCDC"><center><?=number_format(floatval(base64_decode($row['despesa_variavel_mensal_4'])), 2, ',', '.') ;?> R$</center></td>

<td><?= base64_decode($row['descricao_despesa_variavel_mensal_5']); ?></td>

<td style="background-color:#DCDCDC"><center><?=number_format(floatval(base64_decode($row['despesa_variavel_mensal_5'])), 2, ',', '.') ;?> R$</center></td>

<td style="background-color:#A9A9A9"><center><?=number_format(floatval(base64_decode($row['saldo'])));?> R$</center></td>



</tr>


<?php } } ?>

</table>






      </div>
      
    </div>  
  </div>
</div>


<!-- fim Modal -->


<script type="text/javascript">
  
////////////////////////////////o campo e ocultado/////////////////////////////////////////////////////

$("#linha_renda2").css("display", "none");
$("#linha_renda3").css("display", "none");
$("#linha_renda4").css("display", "none");
$("#linha_renda5").css("display", "none");


$("#linha_despesa_2").css("display", "none");
$("#linha_despesa_3").css("display", "none");
$("#linha_despesa_4").css("display", "none");
$("#linha_despesa_5").css("display", "none");

/////////////////////////////// o campo reaparece////////////////////////////////////////////////////

var ouvinte=0; 

function addRendaVariavel () {

  ouvinte=ouvinte+1;


  switch(ouvinte){

    case 1:
    $("#linha_renda2").css("display", "");
    break;

    case 2:
    $("#linha_renda3").css("display", "");
    break;

    case 3:
    $("#linha_renda4").css("display", "");
    break;

    case 4:
    $("#linha_renda5").css("display", "");
    break;

    case 5:
    ouvinte=4;

  }


}

function subRendaVariavel () {

  switch(ouvinte){
    case 1:
    document.getElementById('r2').value="";
    document.getElementById('rv2').value="";
    $("#linha_renda2").css("display", "none");
    ouvinte=0;
    break;

    case 2:
    document.getElementById('r3').value="";
    document.getElementById('rv3').value="";
    $("#linha_renda3").css("display", "none");
    ouvinte=1;
    break;

    case 3:
    document.getElementById('r4').value="";
    document.getElementById('rv4').value="";
    $("#linha_renda4").css("display", "none");
    ouvinte=2;
    break;

    case 4:
    document.getElementById('r5').value="";
    document.getElementById('rv5').value="";
    $("#linha_renda5").css("display", "none");
    ouvinte=3;
    break;

  }

}


////////////////////////////////////////////////////////////////////////////////


var ouvinteDV=0;

function addDespesaVariavel () {

  ouvinteDV = ouvinteDV+1;


  switch(ouvinteDV){

    case 1:
    $("#linha_despesa_2").css("display", "");
    break;

    case 2:
    $("#linha_despesa_3").css("display", "");
    break;

    case 3:
    $("#linha_despesa_4").css("display", "");
    break;

    case 4:
    $("#linha_despesa_5").css("display", "");
    break;

    case 5:
    ouvinteDV=4;

  }


}

function subDespesaVariavel () {

  switch(ouvinteDV){
    case 1:
    document.getElementById('lp2').value="";
    document.getElementById('lv2').value="";
    $("#linha_despesa_2").css("display", "none");
    ouvinteDV=0;
    break;

    case 2:
    document.getElementById('lp3').value="";
    document.getElementById('lv3').value="";
    $("#linha_despesa_3").css("display", "none");
    ouvinteDV=1;
    break;

    case 3:
    document.getElementById('lp4').value="";
    document.getElementById('lv4').value="";
    $("#linha_despesa_4").css("display", "none");
    ouvinteDV=2;
    break;

    case 4:
    document.getElementById('lp5').value="";
    document.getElementById('lv5').value="";
    $("#linha_despesa_5").css("display", "none");
    ouvinteDV=3;
    break;

  }

}

  /////////////////////////////////////////////////////////////////////////////////////////////////////////

    //carregando modulo visualization
    google.load("visualization", "1", {packages:["corechart"]});

    //função de monta e desenha o gráfico
    function drawChart() {
  //variavel com armazenamos os dados, um array de array's
  //no qual a primeira posição são os nomes das colunas
  var data = google.visualization.arrayToDataTable([
    ['Informaçoes', 'example'],
    ['inf1',     20],
    ['inf2',      90],
    

    ]);
    //opções para exibição do gráfico
    var options = {
    title: '',//titulo do gráfico
    backgroundColor: 'transparent',
    legendTextStyle: { color: '#DCDCDC' },
    titleTextStyle: { color: '#DCDCDC' },
    //legend: 'none',
    colors: ['red', 'blue'],
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



//////////////////////////////////////////////////////////////////////////////////////////////////////






</script>




	</body>
	</html>