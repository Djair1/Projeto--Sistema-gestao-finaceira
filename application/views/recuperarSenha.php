<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>RecuperarSenha</title>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <link rel="shortcut icon" href="<?php echo base_url('public/imagens/icone.ico'); ?>" type="image/x-icon" />

 <link rel="stylesheet" type="text/css" media="screen and (min-width: 320px) " href="<?php echo base_url('public/css/recuperarSenha_small.css'); ?>">

  <link rel="stylesheet" type="text/css" media="screen and (min-width: 1024px)" href="<?php echo base_url('public/css/recuperarSenha.css'); ?>">

</head>
<body onclick="fecharAlerta();"  background="<?php echo base_url('public/imagens/fundo_site.jpg');?>">
 <div>

  <nav id="barra" class="navbar navbar-expand-lg navbar-light bg-light">
    <a id="titulo" class="navbar-brand" href="<?php echo site_url('inicio'); ?>">Economize</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a id="in" class="nav-link active" href="<?php echo site_url('inicio'); ?>">Inicio<span class="sr-only">(current)</span></a>
        <a id="ca" class="nav-link" href="<?php echo site_url('cadastro');?>">Cadastre-se</a>
     <!-- <a class="nav-link" href="#">Pricing</a>
      <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a> -->
    </div>
  </div>
</nav>


<!---------------------------------------------------------------->


<div id="container-xl">
  <form id="formulario"  class="form-signin" action="<?php echo site_url('recuperarSenha/buscarUsuario');?>" method="post">
    
    <div id="user_alerta" class="alert alert-warning alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong> </strong><?php if ($this->session->userdata("alerta")=="") {echo" Ao clicar em enviar você receberá um e-mail com a nova senha "; }else{
    echo"<script> $('.alert-danger').alert('close');</script> ";
  }?>
</div>

    <div id="user_alerta" class="alert alert-danger alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong> </strong><?php if ($this->session->userdata("alerta")!="") {echo" ".$this->session->userdata("alerta"); }else{
    echo"<script> $('.alert-danger').alert('close');</script> ";
  }?>
</div>
    <a href="<?php echo site_url('inicio'); ?>">

     <img src="<?php echo base_url('public/imagens/economize.png'); ?>"></a> 
     
     <div class="form-group">

      <input type="E-mail" autocomplete="false" onclick="fecharAlerta();" placeholder="Insira o seu email" maxlength="32" class="form-control" id="exampleInputEmail1" name="text_email" aria-describedby="emailHelp">
    </div>
    
    <button id="enviar" type="submit" class="btn btn-dark btn-sm">Enviar</button>

  </form>

</div>

<script type="text/javascript">

  function fecharAlerta() {
    $('.alert-warning').alert('close');
  }


</script>


</body>
</html>