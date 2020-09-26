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

	<div class="container-xl">

    <form id="formulario" class="form-signin" action="<?php echo site_url('cadastro/Realizar_cadastro'); ?>  " method="post">
<a href="<?php echo site_url('inicio'); ?>">
    <img src="<?php echo base_url('public/imagens/economize.png'); ?>"> 
    </a>
    <br></br>
    <div class="form-group">
    <input type="email" placeholder="E-mail" class="form-control" id="exampleInputEmail1" name="text_email" aria-describedby="emailHelp">
    </div>

   <div class="form-group">
    <input type="Telefone" onkeypress="$(this).mask('(00) 0000-00009')" placeholder="Telefone" class="form-control" id="exampleInputTelefone1" name="text_Telefone">
    </div>

    <div class="form-group">
    <input type="password" maxlength="32" placeholder="Senha" class="form-control" id="exampleInputPassword1" name="text_senha">
    </div>
    

    <div class="form-group">
    <input type="password" maxlength="32" placeholder="Confirmar Senha" class="form-control" id="exampleInputPassword2" name="confirm_senha">
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


<?php 

       if ($aviso!="") {

        echo  "<script>alert('$aviso');</script>"; 
       
       }


 ?>

</body>
</html>