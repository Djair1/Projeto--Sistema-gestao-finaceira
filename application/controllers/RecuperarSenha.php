<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RecuperarSenha extends CI_Controller {

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
	public function index(){

		$id = $this->session->userdata("id");
		$email = $this->session->userdata("usuario");

		if (strlen($email)!=0) {

			redirect('Painel');

			
		}else{


			$this->load->view('recuperarSenha');
			$this->session->set_userdata("alerta", "");


		}



	}

	
	public function buscarUsuario(){


		$Email = $this->input->post('text_email');
		$this->verificarEmail($Email);


	}


	private function verificarEmail($email){

		
		$this->load->model('UsuarioModel');
		$busca = $this->UsuarioModel->carregar_dados(); 
		$info=true;
		$senha;

		if ($busca->num_rows()==0) {
			$this->session->set_userdata("alerta", " Endereço de E-mail não encontrado !");
			redirect('RecuperarSenha');
			exit();
		}

		foreach  ( $busca -> result_array ()  as  $row ) 
		{ 

			if ($row['email']==$email) {
				$senha = $row['senha'];
				$info=false;
				$this->enviar_email( $email,$senha);

			}



		}
		if ($info) {
			$this->session->set_userdata("alerta", " Entre com o seu email já cadastrado. !");
			redirect('RecuperarSenha');
			exit();
		}

		




	}



	private function enviar_email($email,$senha){

		$this->load->library('email');

		$this->email->from('economize.cf@outlook.com', 'Desenvolvedor');
		$this->email->to($email);
		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');

		$this->email->send();


	}

}