<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
       $dados = array('aviso' => "" );
       $this->load->view('cadastro',$dados);
 
	   
	}

	public function Realizar_cadastro()
	{
		$email= $this->input->post('text_email');
		$telefone= $this->input->post('text_Telefone');
		$senha= $this->input->post('text_senha');
		$senhaConfirmada=$this->input->post('confirm_senha');

        $tamanhoDoEmail = strlen($email);
        $tamanhoTelefone = strlen($telefone);
        $tamanhoSenha= strlen($senha);
        $tamanhoSenhaConfirmada= strlen($senhaConfirmada);


if ($tamanhoDoEmail==0) {

	$dados = array('aviso' =>"Definir endereço de Email !");

	  	$this->load->view('cadastro',$dados);

}elseif ($tamanhoTelefone==0) {

$dados = array('aviso' =>"Defina um numero de telefone !");

	 	$this->load->view('cadastro',$dados);

}elseif ( $tamanhoTelefone < 15 ) {

$dados = array('aviso' =>"numero de telefone inválido !");

	 	$this->load->view('cadastro',$dados);

}elseif ($tamanhoSenha==0) {
	
 $dados = array('aviso' =>"Defina sua Senha !");

	 	$this->load->view('cadastro',$dados);

}elseif ($tamanhoSenhaConfirmada==0) {

	 $dados = array('aviso' =>"Confirme sua Senha !");

	  	$this->load->view('cadastro',$dados);
	

	}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      
      $dados = array('aviso' =>"verificar o endereço de email inserido");

		$this->load->view('cadastro',$dados);


}elseif ($tamanhoSenha<8 | $tamanhoSenha>32) {

	  	$dados = array('aviso' =>"Sua senha deve conter no mínimo 8 caracteres (até 32)");

		$this->load->view('cadastro',$dados);
	  
 }elseif ($senha != $senhaConfirmada) {


$dados = array('aviso' =>"as senhas digitadas não correspondem !");

	  	$this->load->view('cadastro',$dados);

 }else{

$this->cadastrar_usuario($email,$senha,$telefone);

     	}
	
   }




public function cadastrar_usuario($email,$senha,$telefone){

$emailUtilizado=true;
$this->load->model('UsuarioModel');
$busca = $this->UsuarioModel->carregar_dados(); 

   foreach  ( $busca -> result_array ()  as  $row ) {

if ($row['email']== $email) {
	
	$dados = array('aviso' =>" endereco de email já cadastrado !");
    $this->load->view('cadastro',$dados);
    $emailUtilizado=false;

}
    }

if ($emailUtilizado) {

	$this->load->model('UsuarioModel');
    $this->UsuarioModel->gravar_dados($email,$telefone,$senha);
    echo("susseso");

}
   

}




}


