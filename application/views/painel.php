<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">



  <!--<meta http-equiv="refresh" content="5 ;<?php echo site_url('painel/home'); ?>"/>
    <title>Economize-dasboard</title>-->


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/painel.css'); ?>">



  </head>
  <body background="<?php echo base_url('public/imagens/fundo_site.jpg'); ?>">

    <div class="container-xl">
      <nav  class="navbar navbar-light bg-light">
        <span id="titulo" class="navbar-brand mb-0 h1">Economize</span>
        <div id="conf" class="dropdown">
          <button class="btn btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Configurações
         </button>
         <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="#" class="card-link" data-toggle="modal" data-target="#sitemodal"> Alterar senha</a>
          <a class="dropdown-item" href="<?php echo site_url('Painel/desativar_conta'); ?>">Desativar conta</a>
          <a class="dropdown-item" href="<?php echo site_url('Painel/sair'); ?>">Sair</a>
        </div>
      </div>
    </nav>

    <div class="alert alert-danger" style="z-index: 1; position: absolute; width: 1060px">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Warning!</strong><?php if ($aviso!="") {echo " ".$aviso; }else{
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
        <h1><center>R$ 0.00</center></h1>


      </div>


      <div id="d3">

        <h3><center>D3</center></h3>

      </div>


      <div id="d4">

        <h3><center>D4</center></h3>

      </div>




    </div>


  </div>



  <!--modal-->

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


          <!-- fim Modal -->

        </div>
      </dir>  
    </dir>


    <script type="text/javascript">
      function aviso() {
        $('.alert-danger').alert('close');
      }

    </script>


  </body>
  </html>

<!--<button id="btsair" onclick="javascript:window.location.href='<?php echo site_url('Painel/sair'); ?>'" class="btn btn-primary btn-sm" type="button">Sair</button>-->