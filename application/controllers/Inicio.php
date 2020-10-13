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
      

       $user = $this->session->userdata("usuario");
       
       $usersize = strlen($user);

       if ($usersize > 0) {
		
		redirect('Painel');

	}else{

	   $dados = array('aviso' => "" );
       $this->load->view('inicio',$dados);

	}


	}



    public function login(){
		//receber dados dentro de um array
	 // $dados['informacoes'] = $this->input->post();
	  $email = $this->input->post('text_email');
	  $senha = $this->input->post('text_senha');

	  $tamanhoDoEmail = strlen($email);
	  $tamanhoDaSenha = strlen($senha);


if ($tamanhoDoEmail==0) {

	$dados = array('aviso' =>"");

	  	$this->load->view('inicio',$dados);

}elseif ($tamanhoDaSenha==0) {
	
 $dados = array('aviso' =>"");

	  	$this->load->view('inicio',$dados);

}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      
      $dados = array('aviso' =>"formato de email invalido!");

	  	$this->load->view('inicio',$dados);


}else{


   $this->load->model('UsuarioModel');

   //retornar dados salvos atraves do model cadastromodel
   $busca = $this->UsuarioModel->carregar_dados(); 

   foreach  ( $busca -> result_array ()  as  $row ){

   	if (password_verify($senha, $row['senha']) & $row['email'] == $email){

   $id = $row['id_usuario'];


    //variavel de sessao
   $this->session->set_userdata("usuario", $email);
   $this->session->set_userdata("id", $id);
   $email = ""; $senha = "";

    redirect('Painel');


}else{

    $dados = array('aviso' => "Verificar E-mail /ou senha inseridos");
    $this->load->view('inicio',$dados);
    $emailValido=false;


                }
           } 
       }

   }

}