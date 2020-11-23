<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="content-language" content="pt-br">
	<meta charset="UTF-8">
	<title>cadastre-se</title>
	

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>

<link rel="shortcut icon" href="<?php echo base_url('public/imagens/icone.ico'); ?>" type="image/x-icon" />

<link rel="stylesheet" type="text/css" media="screen and (min-width: 320px)" href="<?php echo base_url('public/css/cadastro_small.css') ?>">


<link rel="stylesheet" type="text/css" media="screen and (min-width: 1024px)" href="<?php echo base_url('public/css/cadastro.css') ?>">

</head>
<body background="<?php echo base_url('public/imagens/fundo_site.jpg'); ?>">
  <?php unset($_POST['']); ?>


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

  <form id="formulario" class="form-control" action="<?php echo site_url('cadastro/Realizar_cadastro'); ?>  " method="post">
<div id="alerta_user" class="alert alert-warning">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Atencão! </strong><?php if ($this->session->userdata("errocadastro")!="") {echo " ".$this->session->userdata("errocadastro");}else{
    echo"<script> $('.alert-warning').alert('close');</script> ";
  }?>
</div>
    <a href="<?php echo site_url('inicio'); ?>">
      <img src="<?php echo base_url('public/imagens/economize.png'); ?>"> 
    </a>
    <br></br>
    <div class="form-group">
      <input type="E-mail"  placeholder="E-mail" class="form-control" id="exampleInputEmail1" name="text_email" aria-describedby="emailHelp">
    </div>

    <div class="form-group">
      <input type="Telefone"  onkeypress="$(this).mask('(00) 0000-00009')" placeholder="Telefone" class="form-control" id="exampleInputTelefone1" name="text_Telefone">
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

  //$('form').attr('onsubmit','return false;');window.location.href='<?php //echo site_url('Cadastro'); ?>'

  function aviso() {
    $('.alert-warning').alert('close');
  }


document.getElementById('exampleInputEmail1').value="<?php echo $this->session->userdata("email_inserido");?>";
document.getElementById('exampleInputTelefone1').value="<?php echo $this->session->userdata("telefone_inserido");?>";

</script>


</body>
</html>

<!-- autocomplete="off" desativa o auto complete do formulario-->