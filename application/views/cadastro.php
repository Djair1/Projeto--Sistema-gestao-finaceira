<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>cadastre-se</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/cadastro.css') ?>">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

</head>
<body background="<?php echo base_url('public/imagens/fundo_site.jpg'); ?>">
<?php unset($_POST['']); ?>


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

<div class="alert alert-warning">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Atencão!</strong><?php if ($aviso!="") {echo " ".$aviso; }else{
  echo"<script> $('.alert-warning').alert('close');</script> ";
  
  }?>
</div>


	<div onclick="aviso();" class="container-xl">

    <form id="formulario" class="form-signin" action="<?php echo site_url('cadastro/Realizar_cadastro'); ?>  " method="post">
<a href="<?php echo site_url('inicio'); ?>">
    <img src="<?php echo base_url('public/imagens/economize.png'); ?>"> 
    </a>
    <br></br>
    <div class="form-group">
    <input type="E-mail" autocomplete="off" placeholder="E-mail" class="form-control" id="exampleInputEmail1" name="text_email" aria-describedby="emailHelp">
    </div>

   <div class="form-group">
    <input type="Telefone" autocomplete="off" onkeypress="$(this).mask('(00) 0000-00009')" placeholder="Telefone" class="form-control" id="exampleInputTelefone1" name="text_Telefone">
    </div>

    <div class="form-group">
    <input type="password"  placeholder="Senha" class="form-control" id="exampleInputPassword1" name="text_senha">
    </div>
    

    <div class="form-group">
    <input type="password"  placeholder="Confirmar Senha" class="form-control" id="exampleInputPassword2" name="confirm_senha">
    </div>
  
  
  <div class="form-group form-check">
   <!-- <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>-->
  </div>
  
  <button id="entrar" type="submit" class="btn btn-dark btn-sm">Confirmar Cadastro</button>
  <!--<button type="submit" class="btn btn-primary">entrar</button>-->
  <!--<button id="cadastro" formaction="<?php echo site_url('welcome'); ?>" type="submit" class="btn btn-warning btn-sm">Cadastre-se</button>-->

</form>
</div>


<script type="text/javascript">
  
  //history.forward();

function aviso() {
  $('.alert-warning').alert('close');
}


</script>

</body>
</html>