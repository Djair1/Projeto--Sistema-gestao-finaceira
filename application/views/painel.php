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
<body>

<div  class="container-xl">

  <nav  class="navbar navbar-light bg-light">
  <span id="titulo" class="navbar-brand mb-0 h1">Economize</span>


</nav>

<!--<script type="text/javascript"> history.forward(); </script>-->


</div>




<div class="container-xl">
  
<div id="d1">
<img src="<?php echo base_url('public/imagens/perfil.png'); ?>">
<br><br>
<p1>USUÁRIO:</p1>
<br>
<p2><?php echo  $email ; ?></p2>

<button id="bt1" type="button" class="btn btn-dark">Lembretes</button>
<button id="bt2" type="button" class="btn btn-dark">Moeda Aplicada</button>
<button id="btsair" onclick="javascript:window.location.href='<?php echo site_url('Painel/sair'); ?>'" type="button" class="btn btn-danger">Sair</button>

  <div id="d2">
    


  </div>

  </div>


</div>

</body>
</html>