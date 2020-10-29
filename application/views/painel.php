<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/painel.css'); ?>">



</head>
<body class="container-xl">

  <div class="container-xl" style="position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 2;">
  <nav  class="navbar navbar-light bg-light">
    <span id="titulo" class="navbar-brand mb-0 h1">Economize</span>
    <div id="conf" class="dropdown">
      <button class="btn btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       Configurações
     </button>
     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" href="" class="card-link" data-toggle="modal" data-target="#sitemodal"> Alterar senha</a>
      <a class="dropdown-item" href="" class="card-link" data-toggle='modal' data-target='#mddesativar_conta'>Desativar conta</a>
      <a class="dropdown-item" href="<?php echo site_url('Painel/sair'); ?>">Sair</a>
    </div>
  </div>
</nav>

<div class="alert alert-danger" style="z-index: 1; position: absolute; width: 1060px">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Warning!</strong><?php if ($this->session->userdata("avisoSenha")!="") {echo " ".$this->session->userdata("avisoSenha");}else{
    echo"<script> $('.alert-danger').alert('close');</script> ";
  }?>
</div>

</div>


<div class="container-xl">

  <div id="d1">
    <img src="<?php echo base_url('public/imagens/perfil.png'); ?>">
    <br><br>
    <p1>USUÁRIO:</p1>
    <p2><center><?php echo  $email ; ?></center></p2>

      <h5><center>RENDA FIXA ATUAL</center></h5>
      <h4><center><?php if ($this->session->userdata("valorReceitaFixaAtual")!=""){echo "R$" .$this->session->userdata("valorReceitaFixaAtual");}else{echo "R$ 0.00";}?></center></h4>
      <br>

      <h5><center>DESPESA FIXA ATUAL</center></h5>
      <h4><center><?php if ($this->session->userdata("valorDespesaFixaAtual")!=""){echo "R$" .$this->session->userdata("valorDespesaFixaAtual");}else{echo "R$ 0.00";}?></center></h4>

    <!--<button id="bt1" type="button" class="btn btn-dark">Lembretes</button>-->


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



    <button id="bt2" type="button" class="btn btn-dark">Moeda Aplicada</button>


    <div id="d2">

      <h6><center>SALDO ATUAL</center></h6>
      <h1><center>R$</center></h1>


    </div>


    <div id="d3">

      <button type="button" id="receita" onclick="adreceita();" class="btn btn-light"><img style="
      margin-left: 0px;
      margin-top: 0px;
      width:35px ;
      height:35px;
      " src="<?php echo base_url('public/imagens/breceita.png');?>"> Adicionar Receita</button>

      <button type="button" id="despesa" onclick="addespesa();" class="btn btn-light"><img style="
      margin-left: 0px;
      margin-top: 0px;
      width:35px ;
      height:35px;
      " src="<?php echo base_url('public/imagens/bdespesa.png');?>"> Adicionar Despesa</button>


    </div>





    <div id="d4">

      <img style="
      width: 380px;
      height: 350px;
      margin-top: 0px;
      margin-left: 0px;
      margin-right: 0px;
      border-radius: 7px;

      " src="<?php echo base_url('public/imagens/Grafico.png'); ?>">

    </div>




  </div>


</div>



<!--modal alterar senha-->

<div class="modal" id="sitemodal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!----------------------------------------------------------->

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alterar Senha</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="<?php echo site_url('Painel/alterarSenha'); ?>  " method="post">
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

          <button type="submit"  class="btn btn-primary">Salvar</button>

        </form>

      </div>
      
    </div>  
  </div>
</div>

<!-- fim Modal -->


<!--modal adicionar receita-->

<div class="modal" id="mdreceita" tabindex="-1" role="dialog" style="padding-top: 150px">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <!----------------------------------------------------------->

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">RENDA FIXA MENSAL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="<?php echo site_url('GerirFinancas/adicionarReceita'); ?>  " method="post">
          <div class="form-group">
            <label for="exampleInput">Valor:</label>
            <br>
            <input type="text" placeholder="RS$" class="form-control" name="valor" maxlength="10" onkeypress="$(this).mask('#.##0,00', {reverse: true})">
          </div>
          <button id="btreceita" type="submit"  class="btn btn-primary">Salvar</button>

        </form>

      </div>
      
    </div>  
  </div>
</div>


<!-- fim Modal -->



<!--modal adicionar Despesa-->

<div class="modal" id="mddespesa" tabindex="-1" role="dialog" style="padding-top: 150px">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <!----------------------------------------------------------->

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DESPESA FIXA MENSAL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="<?php echo site_url('GerirFinancas/adicionarDespesa'); ?>  " method="post">
          <div class="form-group">
            <label for="exampleInput">Valor:</label>
            <br>
            <input type="text" placeholder="RS$" class="form-control" name="valor" maxlength="10" onkeypress="$(this).mask('#.##0,00', {reverse: true})">
          </div>
          <button id="btdespesa" type="submit"  class="btn btn-primary">Salvar</button>

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
        <h5 class="modal-title" id="exampleModalLabel">DESATIVAR CONTA!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="<?php echo site_url('Painel/desativar_conta'); ?>  " method="post">
          <div class="form-group">
            <label for="exampleInput">Sua conta será desativada permanentemente !</label>
            <br>
          </div>
          <button id="btdesativar" type="submit"  class="btn btn-primary">DESATIVAR</button>

        </form>

      </div>
      
    </div>  
  </div>
</div>


<!-- fim Modal -->


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


</body>
</html>

<!--<button id="btsair" onclick="javascript:window.location.href='<?php echo site_url('Painel/sair'); ?>'" class="btn btn-primary btn-sm" type="button">Sair</button>-->