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

	//  $tamanhoDoEmail = strlen($email);
	  $tamanhoDaSenha = strlen($senha);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      
      $dados = array('aviso' =>"verificar o endereço de email inserido");

	  	$this->load->view('inicio',$dados);

}elseif ($tamanhoDaSenha<8 | $tamanhoDaSenha>32) {

	  	$dados = array('aviso' =>"Sua senha deve conter no mínimo 8 caracteres (até 32)");

	  	$this->load->view('inicio',$dados);
	  
 }else{

     echo("perfeito");
	  	
	  }
	  

		
	}



}