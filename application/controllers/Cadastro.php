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
			exit();

		}else{

           	
			$this->load->view('cadastro');
			$this->session->set_userdata("errocadastro", "");
			$this->session->set_userdata("email_inserido","");
		    $this->session->set_userdata("telefone_inserido","");


		}




	}

	public function Realizar_cadastro(){
		
        $email= $this->input->post('text_email');
		$telefone= $this->input->post('text_Telefone');
		$senha= $this->input->post('text_senha');
		$senhaConfirmada=$this->input->post('confirm_senha');

		$this->session->set_userdata("email_inserido",$email);
		$this->session->set_userdata("telefone_inserido",$telefone);

		$tamanhoDoEmail = strlen($email);
		$tamanhoTelefone = strlen($telefone);
		$tamanhoSenha= strlen($senha);
		$tamanhoSenhaConfirmada= strlen($senhaConfirmada);


		if ($tamanhoDoEmail==0) {

			
			$this->session->set_userdata("errocadastro", "Definir endereço de Email !");
			redirect('Cadastro');
			exit();
			
			

		}elseif ($tamanhoTelefone==0) {


			$this->session->set_userdata("errocadastro", "Inserir um numero de telefone !");
			redirect('Cadastro');
			exit();
			

		}elseif ( $tamanhoTelefone < 15 ) {

			$this->session->set_userdata("errocadastro", "numero de telefone inválido !");
			redirect('Cadastro');
			exit();

		}elseif ($tamanhoSenha==0) {


			$this->session->set_userdata("errocadastro", "Defina sua Senha !");
			redirect('Cadastro');
			exit();
			


		}elseif ($tamanhoSenhaConfirmada==0) {

			$this->session->set_userdata("errocadastro", "Confirme sua Senha !");
			redirect('Cadastro');
			exit();

		}elseif ($this->senhaValida($senha)==FALSE) {
			

$this->session->set_userdata("errocadastro", "A senha não pode possuir espaços e deve conter pelo menos uma letra maiúscula e um número!");
			redirect('Cadastro');
			exit();

		}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

			$this->session->set_userdata("errocadastro", "verificar o endereço de email inserido");
			redirect('Cadastro');
			exit();

		}elseif ($tamanhoSenha<8 | $tamanhoSenha>32) {

			$this->session->set_userdata("errocadastro", "Sua senha deve conter no mínimo 8 caracteres (até 32)");
			redirect('Cadastro');
			exit();

		}elseif ($senha != $senhaConfirmada) {

			$this->session->set_userdata("errocadastro", "as senhas digitadas não correspondem !");
			redirect('Cadastro');
			exit();

		}else{

            $this->cadastrar_usuario($email,$senha,$telefone);

            }

	 }


	public function cadastrar_usuario($email,$senha,$telefone){

		
		$this->load->model('UsuarioModel');
		$busca = $this->UsuarioModel->carregar_dados(); 

		foreach  ( $busca -> result_array ()  as  $row ) {

			if ($row['email']== $email) {

				$this->session->set_userdata("errocadastro", " endereco de email já cadastrado !");
				redirect('Cadastro');
				exit();

			}
		}
		try {

//criptografar a senha do usuario
			$senhaCriptografada = password_hash($senha, PASSWORD_BCRYPT); 

//mandando dados pro Usuariomodel
			$this->load->model('UsuarioModel');
			$this->UsuarioModel->gravar_dados($email,$telefone,$senhaCriptografada);

			//$dados = array('aviso' => "",'susseso'=>"Cadastro Realizado com susseso !");
			//$this->load->view('inicio',$dados);
			$this->session->set_userdata("cadastroOK","Cadastro Realizado com susseso !");
			$this->session->set_userdata("email_inserido","");
		    $this->session->set_userdata("telefone_inserido","");
			redirect('Inicio');
			exit();

		} catch (Exception $e) {


			$this->session->set_userdata("errocadastro", "Erro ao realizar o Cadastro !");
			redirect('Cadastro');
			exit();
			

		}



	}
function senhaValida($senha) {
    return preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[\w$@]{8,}$/", $senha);
}

}







