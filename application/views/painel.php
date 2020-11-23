<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
  
<link rel="shortcut icon" href="<?php echo base_url('public/imagens/icone.ico'); ?>" type="image/x-icon" />

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/painel.css'); ?>">


  <script type="text/javascript"
    src="https://www.google.com/jsapi"></script>

  <script type="text/javascript">
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
    ['inf2',      30],
    ['inf3',  1],
    ['inf4', 4],
    ['inf5',5],
    ['inf6',10],

    ]);
    //opções para exibição do gráfico
    var options = {
              title: 'text Informaçoes',//titulo do gráfico
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

<div class="" style="position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 3;">
  <nav id="barra" class="navbar" style="background-color:#F2F2F2;">
    <span id="titulo" class="navbar-brand mb-0 h1">Economize</span>
    <div id="conf" class="dropdown">
      <button class="btn btn btn-light dropdown-toggle" type="button" id="conf" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       Configurações
     </button>
     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

      <a class="dropdown-item" href="" class="card-link" data-toggle= 'modal' data-target='#sitemodal'> Alterar senha</a>

      <a class="dropdown-item" href="" class="card-link" data-toggle='modal' data-target='#mddesativar_conta'>Desativar conta</a>
      
      <a class="dropdown-item" href="<?php echo site_url('Painel/sair'); ?>">Sair</a>

    </div>
  </div>
</nav>

<div class="alert alert-danger" style="z-index: 3; position: absolute; width: 100%">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Atenção !</strong><?php if ($this->session->userdata("avisoSenha")!="") {echo " ".$this->session->userdata("avisoSenha");}else{
    echo"<script> $('.alert-danger').alert('close');</script> ";
  }?>
</div>

</div>


<div>
<div id="chart_div"></div>
  <div id="d1">
    <img src="<?php echo base_url('public/imagens/perfil.png'); ?>">
    <br><br>
    <p1>USUÁRIO:</p1>
    <p2><center><?php echo  $email ; ?></center></p2>



    <button type="button" id="receita" onclick="adreceita();" class="btn btn-light"><img style="
    margin-top:0px; 
    margin-left: 0px;
    width:25px ;
    height:25px;
    " src="<?php echo base_url('public/imagens/breceita.png');?>"> Cadastrar Finanças</button>

    <div class="btn-group dropright">
      <button id="bt1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Lembretes
      </button>
      <div class="dropdown-menu">
        <!-- Links do menu dropright -->

        <form class="px-4 py-3">
          <div class="form-group">
            <label for="exampleDropdownFormEmail1">Endereço de email</label>
            <input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@exemplo.com">
          </div>
          <div class="form-group">
            <label for="exampleDropdownFormPassword1">Senha</label>
            <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Senha">
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="dropdownCheck">
            <label class="form-check-label" for="dropdownCheck">
              Remember me
            </label>
          </div>
          <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Novo, por aqui? Regitre-se.</a>
        <a class="dropdown-item" href="#">Esqueceu a senha?</a>
      </div>


    </div>


    <button id="bt2" type="button" class="btn btn-primary" data-toggle= 'modal' data-target='#h_renda'>Historico de Renda</button>
    <button id="bt3" type="button" class="btn btn-info" data-toggle= 'modal' data-target='#h_despesa'>Historico de Despesas</button>


    <div id="d2">

      <h6><center>SALDO ATUAL</center></h6>
      <h1><center><?php if ($this->session->userdata("valorsaldo")!=""){echo "R$" .$this->session->userdata("valorsaldo");}else{echo "R$ 0.00";}?></center></h1>


    </div>


    <div id="d3">


      <div style="height: 150px;width: 250px; margin-left: 35px;margin-top: 10px; position: absolute;">
        <h5><center>RENDA FIXA ATUAL</center></h5>
        <h4><center><?php if ($this->session->userdata("valorReceitaFixaAtual")!=""){echo "R$" .$this->session->userdata("valorReceitaFixaAtual");}else{echo "R$ 0.00";}?></center></h4>


      </div>

      <div style="margin-left: 460px;padding-top: 0px;margin-top: 10px; position: absolute;">

        <h5><center>DESPESA FIXA ATUAL</center></h5>
        <h4><center><?php if ($this->session->userdata("valorDespesaFixaAtual")!=""){echo "R$" .$this->session->userdata("valorDespesaFixaAtual");}else{echo "R$ 0.00";}?></center></h4>

      </div>
      


    </div>




    <div id="d4">


    

      
    </div>




  </div>


</div>



<!--modal alterar senha-->

<div class="modal" data-backdrop="static" id="sitemodal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!----------------------------------------------------------->

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-size: 25px">Alterar Senha</h5>
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
        <h5 class="modal-title" id="exampleModal_Label_cadastro_renda">CADASTRO RENDA/ DESPESA</h5>
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
        <h5 class="modal-title" id="exampleModalLabel_1">DESATIVAR CONTA!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="<?php echo site_url('Painel/desativar_conta'); ?>  " method="post">
          <div class="form-group">
            <br>
            <label for="exampleInput"><p style="margin-left: 5px;">Ao clicar no botão desativar sua conta será desativada permanentemente, desta forma será necessário realizar um novo cadastro para poder efetuar um novo login.</label>
              <br>
            </div>
            <hr>
            <button id="btdesativar" type="submit"  class="btn btn-primary">DESATIVAR</button>

          </form>

        </div>

      </div>  
    </div>
  </div>
  <!-- fim Modal -->



<!--modal historico de renda-->

<div class="modal" data-backdrop="static" id="h_renda" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document" style="overflow-y: initial;">
    <div class="modal-content" style="width:1200px ;right: 350px">
      <!----------------------------------------------------------->

      <div class="modal-header">
        <h5 class="modal-title">Histórico de Renda</h5>
        <button type="button" class="btn btn-link" onclick="javascript:window.location.href='<?php echo site_url('GerirFinancas/gerar_pdf_renda'); ?>'" style="margin-left:70%;color: green ">Gerar Relatório</button>
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


 foreach ($valores_financas as $row) { ?>

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


<?php } ?>

</table>






      </div>
      
    </div>  
  </div>
</div>


<!-- fim Modal -->





<!--modal historico de despesa-->

<div class="modal" data-backdrop="static" id="h_despesa" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document" style="overflow-y: initial;">
    <div class="modal-content" style="width:1200px ;right: 350px">
      <!----------------------------------------------------------->

      <div class="modal-header">
        <h5 class="modal-title">Histórico de Despesas</h5>
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


 foreach ($valores_financas as $row) { ?>

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


<?php } ?>

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

</script>

<div id="footer"></div>
  


</body>
</html>

<!--<button id="btsair" onclick="javascript:window.location.href='<?php echo site_url('Painel/sair'); ?>'" class="btn btn-primary btn-sm" type="button">Sair</button>-->