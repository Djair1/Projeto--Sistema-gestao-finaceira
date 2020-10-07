<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>RecuperarSenha</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/recuperarSenha.css'); ?>">

</head>
<body  background="<?php echo base_url('public/imagens/bg2.jpg');?>">

<div id="container-xl">
  
<form id="formulario"  class="form-signin" action="<?php echo site_url('recuperarSenha/buscarUsuario'); ?>  " method="post">

	<a href="<?php echo site_url('inicio'); ?>">

 <img src="<?php echo base_url('public/imagens/economize.png'); ?>"></a> 
    
    <div class="form-group">
    
    <input type="email" placeholder="Insira o seu email" maxlength="32" class="form-control" id="exampleInputEmail1" name="text_email" aria-describedby="emailHelp">
  </div>
  
  <button id="enviar" type="submit" class="btn btn-dark btn-sm">Enviar</button>

</form>


  </div>


 <?php

       if ($aviso!="") {

          echo  "<script>alert('$aviso');</script>"; 
       
       }
        ?> 

<script type="text/javascript">
  
alert("Entre com o seu email cadastrado abaixo e voçe recebera a sua senha de acesso ao sistema .");




</script>

</body>
</html>