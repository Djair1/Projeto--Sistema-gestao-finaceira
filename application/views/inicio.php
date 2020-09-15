<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
    

        <meta charset="UTF-8">
        <title>Conectar</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/inicio.css'); ?>">
         
              
   
    </head>
    <body>

<div class="container-xl">

    <form class="form-signin" action="<?php echo site_url('inicio/login'); ?>  " method="post">

 <img src="<?php echo base_url('public/imagens/img1.png'); ?>"> 
    
    <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" placeholder="E-mail" class="form-control" id="exampleInputEmail1" name="text_email" aria-describedby="emailHelp">
  </div>
  
  <div class="form-group">
    <label for="exampleInputPassword1">Senha</label>
    <input type="password" placeholder="Senha" class="form-control" id="exampleInputPassword1" name="text_senha">
  </div>
  
  <div class="form-group form-check">
   <!-- <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>-->
  </div>
  
  <!--<button type="submit" class="btn btn-primary">entrar</button>-->
  

  <button id="entrar" type="submit" class="btn btn-dark btn-sm">Entrar</button>

  <button id="cadastro" formaction="<?php echo site_url('welcome'); ?>" type="submit" class="btn btn-warning btn-sm">Cadastre-se</button>


</form>


</div>
  
        <?php

       if ($aviso!="") {

          echo  "<script>alert('$aviso');</script>"; 
       
       }
        
       

         
 // echo  "<script>alert('$aviso');</script>";

        ?>

   </body>

</html>
