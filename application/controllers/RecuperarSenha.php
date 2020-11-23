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
	public function index()
	{

		$this->load->view('recuperarSenha');
		$this->session->set_userdata("alerta", "");

	}

	
	public function buscarUsuario(){


		$Email = $this->input->post('text_email');
		$this->verificarEmail($Email);


	}


	private function verificarEmail($email){

		$emailinvalido=true;
		$this->load->model('UsuarioModel');

   //retornar dados salvos atraves do model cadastromodel
		$busca = $this->UsuarioModel->carregar_dados(); 

if ($busca->num_rows()==0) {
	$this->session->set_userdata("alerta", " Endereço de E-mail não encontrado !");
				redirect('RecuperarSenha');
				exit();
			}

		foreach  ( $busca -> result_array ()  as  $row ) 
		{ 

			if ($row['email']==$email) {

				$this->enviar_email( $email);
				$emailinvalido=false;

			}



		}
		if ( $emailinvalido==true & $row['email']!=$email) {
			
			
			$this->session->set_userdata("alerta", " Endereço de E-mail não encontrado. !");
			redirect('RecuperarSenha');
			exit();
		}




	}

	private function enviar_email($email)
	{

		$this->load->library('email');

		$this->email->from('example@example.com', 'Desenvolvedor');
		$this->email->to($email);
//$this->email->cc('another@another-example.com');
//$this->email->bcc('them@their-example.com');

		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');

		$this->email->send();



	}

}