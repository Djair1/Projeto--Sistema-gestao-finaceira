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
	



	public function index(){
		

		$user = $this->session->userdata("usuario");
		
		$usersize = strlen($user);

		if ($usersize > 0) {
			
			redirect('Painel');
			exit();

		}else{

			$this->load->view('inicio');
			$this->session->set_userdata("errologin","");
			$this->session->set_userdata("cadastroOK","");
			
		}


	}



	public function login(){
	  //receber dados dentro de um array
	 // $dados['informacoes'] = $this->input->post();
		$email = $this->input->post('text_email');
		$senha = $this->input->post('text_senha');
		$this->session->set_userdata("email_inserido",$email);

		
		$this->load->model('UsuarioModel');
   //retornar dados salvos atraves do model cadastromodel
		$busca = $this->UsuarioModel->carregar_dados(); 

		$tamanhoDoEmail = strlen($email);
		$tamanhoDaSenha = strlen($senha);


		if ($tamanhoDoEmail==0) {


			$this->session->set_userdata("errologin","Entre com o seu E-mail");
			redirect('Inicio');
			exit();
			

		}elseif ($tamanhoDaSenha==0) {
			
			$this->session->set_userdata("errologin","Entre com a sua Senha");
			redirect('Inicio');
			exit();

		}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

			$this->session->set_userdata("errologin","E-mail inválido");
			redirect('Inicio');
			exit();


		}else{

			
			if ($busca->num_rows()==0) {
				$this->session->set_userdata("errologin","Usuário não encontrado !");
				redirect('Inicio');
				exit();
			}

			foreach  ( $busca -> result_array ()  as  $row ){

				if (password_verify($senha, $row['senha']) & $row['email'] == $email & $row['situacao']=="usuario_ativo"){

					$id = $row['id'];
                    //variaveis de sessao
					$this->session->set_userdata("usuario", $email);
					$this->session->set_userdata("id", $id);
					$this->session->set_userdata("email_inserido","");

					redirect('Painel');
					exit();


				}

			}

			$this->session->set_userdata("errologin","Verificar E-mail /ou senha inseridos");
			redirect('Inicio');
			exit();

		}

	}

public function data(){


		$one= new DateTime('2012-06-01');
		$two = new DateTime('2012-07-10');

// Resgata diferença entre as datas
		$dateInterval = $one->diff($two);
		echo $dateInterval->days;
		echo '........';
		echo date("d/m/Y");

	
	   }

	 
    }