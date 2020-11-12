<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>

<html>
<head>

  <title>Conectar</title>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>



  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/inicio.css'); ?>">
  
</head>

<body background="<?php echo base_url('public/imagens/fundo_site.jpg');?>">

  

  <div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
<div class="alert alert-warning" style="z-index: 1; position: absolute; width: 100%">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Warning!</strong><?php if ($this->session->userdata("errologin")!="") {echo " ".$this->session->userdata("errologin"); }else{
    echo"<script> $('.alert-warning').alert('close');</script> ";
  }?>
</div>
<div class="alert alert-success" style="z-index: 1; position: absolute; width: 100%">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong><?php if ($this->session->userdata("cadastroOK")!="") {echo " ".$this->session->userdata("cadastroOK");}else{
    echo"<script> $('.alert-success').alert('close');</script> ";
  }?>
</div>
<?php $teste =10; ?>

<div class="alert alert-primary" role="alert" style="z-index: 1; position: absolute; width: 100%">
  This is a primary alert with <a href="#" class="alert-link">an example link</a><?php if ($teste == 9) {echo "  . Give it a click if you like.";}else{
    echo"<script> $('.alert-primary').alert('close');</script> ";
  }?>
</div>




<div class="container-xl">

  <form id="formulario"  class="form-signin" action="<?php echo site_url('inicio/login'); ?>  " method="post">

   <img src="<?php echo base_url('public/imagens/economize.png'); ?>"> 
   
   <div class="form-group">
    <input type="E-mail" placeholder="E-mail" class="form-control" id="exampleInputEmail1" name="text_email" aria-describedby="emailHelp">
  </div>
  
  <div class="form-group">
    <input type="password" placeholder="Senha" class="form-control" id="exampleInputPassword1" name="text_senha">
  </div>
  
  <button id="entrar" type="submit" class="btn btn-dark btn-sm">Entrar</button>

  <a id="esq" href="<?php echo site_url('recuperarsenha'); ?>">Esqueceu a senha clique aqui</a>


</form>


</div>



<script type="text/javascript">

  //history.forward();

  function aviso() {
    $('.alert-warning').alert('close');
    $('.alert-success').alert('close');
  }


</script>

</body>

</html>
