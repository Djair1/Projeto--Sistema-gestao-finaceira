<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>

<html>
<head>

  <meta charset="utf-8">
  <title>Conectar</title>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<link rel="shortcut icon" href="<?php echo base_url('public/imagens/icone.ico'); ?>" type="image/x-icon" />

<link rel="stylesheet" type="text/css" media="screen and (min-width: 320px) " href="<?php echo base_url('public/css/inicio_small.css'); ?>">

<link rel="stylesheet" type="text/css" media="screen and (min-width: 1024px)" href="<?php echo base_url('public/css/inicio.css'); ?>">
  
  
</head>

<body background="<?php echo base_url('public/imagens/fundo_site.jpg');?>">

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
</div>
<div class="container-xl">

  <form id="formulario"  class="form-signin" action="<?php echo site_url('inicio/login'); ?>  " method="post">

 <div id="alerta_user" class="alert alert-danger alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong> </strong><?php if ($this->session->userdata("errologin")!="") {echo"  ".$this->session->userdata("errologin"); }else{
    echo"<script> $('.alert-danger').alert('close');</script> ";
  }?>
</div>

<div id="alerta_user" class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong> </strong><?php if ($this->session->userdata("cadastroOK")!="") {echo"  ".$this->session->userdata("cadastroOK"); }else{
    echo"<script> $('.alert-success').alert('close');</script> ";
  }?>
</div>

   <img src="<?php echo base_url('public/imagens/economize.png'); ?>"> 
   
   <div class="form-group">
    <input type="E-mail" placeholder="E-mail" class="form-control" id="exampleInputEmail1" name="text_email" aria-describedby="emailHelp">
  </div>
  
  <div class="form-group">
    <input type="password" placeholder="Senha" class="form-control" id="exampleInputPassword1" name="text_senha">
  </div>
  
  <button id="entrar" type="submit" class="btn btn-dark btn-sm">Entrar</button>

  <a id="esq" href="<?php echo site_url('recuperarSenha'); ?>">Esqueceu a senha clique aqui</a>


</form>

<script type="text/javascript">
  

document.getElementById('exampleInputEmail1').value="<?php echo $this->session->userdata("email_inserido");?>";


</script>

</div>


</body>
</html>
