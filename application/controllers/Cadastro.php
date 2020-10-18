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
	public function index(){

		$user = $this->session->userdata("usuario");

		$usersize = strlen($user);

		if ($usersize > 0) {

			redirect('Painel');

		}else{

			$dados = array('aviso' => "");
			$this->load->view('cadastro',$dados);

		}




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

			$info = "Definir endereço de Email !";
            $this->erro_cadastro($info);

		}elseif ($tamanhoTelefone==0) {


			$info = "Inserir um numero de telefone !";

			$this->erro_cadastro($info);


		}elseif ( $tamanhoTelefone < 15 ) {

			$info = "numero de telefone inválido !";

			$this->erro_cadastro($info);

		}elseif ($tamanhoSenha==0) {


			$info = "Defina sua Senha !";

			$this->erro_cadastro($info);


		}elseif ($tamanhoSenhaConfirmada==0) {

			$info = "Confirme sua Senha !";

			$this->erro_cadastro($info);

		}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

			$info = "verificar o endereço de email inserido";

			$this->erro_cadastro($info);

		}elseif ($tamanhoSenha<8 | $tamanhoSenha>32) {

			$info = "Sua senha deve conter no mínimo 8 caracteres (até 32)";

			$this->erro_cadastro($info);

		}elseif ($senha != $senhaConfirmada) {

			$info = "as senhas digitadas não correspondem !";

			$this->erro_cadastro($info);

		}else{

			$this->cadastrar_usuario($email,$senha,$telefone);
			
		}

	}


	public function cadastrar_usuario($email,$senha,$telefone){

		$of = true;
		$this->load->model('UsuarioModel');
		$busca = $this->UsuarioModel->carregar_dados(); 

		foreach  ( $busca -> result_array ()  as  $row ) {

			if ($of & $row['email']== $email) {


				$info = " endereco de email já cadastrado !";
				$this->erro_cadastro($info);
				$of=false;

			}elseif ($of & password_verify($senha, $row['senha'])) {
				$info = " Senha fraca insira uma senha melhor!";
				$this->erro_cadastro($info);
				$of=false;
			}
		}

		if ($of) {

			try {

//criptografar a senha do usuario
				$senhaCriptografada = password_hash($senha, PASSWORD_BCRYPT); 

//mandando dados pro Usuariomodel
				$this->load->model('UsuarioModel');
				$this->UsuarioModel->gravar_dados($email,$telefone,$senhaCriptografada);

				$dados = array('aviso' => "",'susseso'=>"Cadastro Realizado com susseso !");
				$this->load->view('inicio',$dados);

			} catch (Exception $e) {

				$info = "Erro ao realizar o Cadastro ";
				$this->erro_cadastro($info);

			}



		}


	}

public function erro_cadastro($erro){
	
$user = $this->session->userdata("usuario");

		$usersize = strlen($user);

		if ($usersize > 0) {

			redirect('Painel');

		}else{

			$dados = array('aviso' => $erro);
			$this->load->view('cadastro',$dados);

		}


}


}







