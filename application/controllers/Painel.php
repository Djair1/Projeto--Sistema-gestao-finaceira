<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Painel extends CI_Controller {

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
	


	
	public function index($aviso=""){

		$id = $this->session->userdata("id");

		$email = $this->session->userdata("usuario");


		if (strlen($email)!=0) {
			
			$dados = array('email' => $email,'aviso' => $aviso);

			$this->load->view('painel',$dados);


		}else{


			redirect('Inicio');


		}

	}


	public function sair(){
		

		$this->session->set_userdata("id", "");
		$this->session->set_userdata("usuario", "");
		redirect('Inicio');
		

	}


	public function alterarSenha(){
		
		$senhaA= $this->input->post('senhaA');
		$senhaB= $this->input->post('senhaB');
		$senhaC=$this->input->post('senhaC');
		$email = $this->session->userdata("usuario");
		$id = $this->session->userdata("id");
		$this->load->model('UsuarioModel');
		$ouvinte=true;
		


		$busca = $this->UsuarioModel->carregar_dados(); 

		foreach  ( $busca -> result_array ()  as  $row ){

			if ($senhaA == $senhaB) {

				if (password_verify($senhaA, $row['senha']) & $row['email'] == $email){

					$senhaCRT = password_hash($senhaC, PASSWORD_BCRYPT);
					$this->UsuarioModel->alterar_senha($senhaCRT,$id);
					redirect('Painel');
					$ouvinte=false;


				} 
			}
		}

		if($senhaA != $senhaB){
			$info="a nova senha nao correspode na confirmação";
			$this->index($info);
			$ouvinte=false;
		}




		if ($ouvinte) {

			$info="Erro ao atualizar senha";
			$this->index($info);

		}

	}

}