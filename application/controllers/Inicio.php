<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

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
       $this->load->view('inicio',$dados);
 
	   
	}

	public function login()
	{
		//receber dados dentro de um array
	 // $dados['informacoes'] = $this->input->post();
	  $email = $this->input->post('text_email');
	  $senha = $this->input->post('text_senha');

	  $tamanhoDoEmail = strlen($email);
	  $tamanhoDaSenha = strlen($senha);


if ($tamanhoDoEmail==0) {

	$dados = array('aviso' =>"Entre com o seu  Email !");

	  	$this->load->view('inicio',$dados);

}elseif ($tamanhoDaSenha==0) {
	
 $dados = array('aviso' =>"Entre com a sua Senha !");

	  	$this->load->view('inicio',$dados);

}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      
      $dados = array('aviso' =>"verificar o endereço de email inserido");

	  	$this->load->view('inicio',$dados);


}elseif ($tamanhoDaSenha<8 | $tamanhoDaSenha>32) {


	  	$dados = array('aviso' =>"a senha possui no mínimo 8 caracteres (até 32)");

	  	$this->load->view('inicio',$dados);
	  
 }else{

    $this->realizarLogin($email,$senha);
	  	
	  }
	  
		
	}


	public function realizarLogin($email,$senha){
		
	//mostrar dados atraves de um foreach	
    // echo  $row [ 'email' ].' - '. $row['telefone'].' - '. $row['senha']; 
   $emailValido=true;
   $this->load->model('usuariomodel');

   //retornar dados salvos atraves do model cadastromodel
   $busca = $this->usuariomodel->carregar_dados(); 

   foreach  ( $busca -> result_array ()  as  $row ) 
  { 
 
if ($row['email']==$email & $row['senha']== $senha) {
	
	echo("susseso");
	$emailValido=false;


}elseif ($row['email']==$email & $row['senha']!= $senha) {
	
	$dados = array('aviso' => "senha incorreta");
    $this->load->view('inicio',$dados);
    $emailValido=false;
}

}

if ($emailValido) {
	
	$dados = array('aviso' => "usuario nao encontrado");
    $this->load->view('inicio',$dados);

}
	}
}