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
	


	
	public function index(){

		$id = $this->session->userdata("id");

		$email = $this->session->userdata("usuario");

		if (strlen($email)!=0) {
			
			$dados = array('email' => $email);
			$this->buscar_financas_Usuario();
			$this->load->view('painel',$dados);
			$this->session->set_userdata("avisoSenha","");



		}else{


			redirect('Inicio');
			exit();


		}

	}


	public function sair(){
		

		$this->session->set_userdata("id", "");
		$this->session->set_userdata("usuario", "");
		$this->session->set_userdata("valorReceitaFixaAtual","");
		$this->session->set_userdata("valorDespesaFixaAtual","");
		$this->session->set_userdata("valorsaldo","");
		redirect('Inicio');
		exit();
		

	}


	public function alterarSenha(){
		
		$senhaA= $this->input->post('senhaA');
		$senhaB= $this->input->post('senhaB');
		$senhaC=$this->input->post('senhaC');
		$email = $this->session->userdata("usuario");
		$id = $this->session->userdata("id");
		$this->load->model('UsuarioModel');

		


		$busca = $this->UsuarioModel->carregar_dados(); 

		foreach  ( $busca -> result_array ()  as  $row ){

			if ($senhaB == $senhaC) {

				if (password_verify($senhaA, $row['senha']) & $row['email'] == $email){

					$senhaCRT = password_hash($senhaC, PASSWORD_BCRYPT);
					$this->UsuarioModel->alterar_senha($senhaCRT,$id);
					redirect('Painel');
					exit();
				


				} 
			}
		}

		if($senhaB != $senhaC){

			$this->session->set_userdata("avisoSenha", "a nova senha nao correspode na confirmação");
			redirect('Painel');
			exit();

		}else{
			$this->session->set_userdata("avisoSenha", "Erro ao atualizar senha");
			redirect('Painel');
			exit();
		}

	}


	public function desativar_conta(){


		$id = $this->session->userdata("id");
		$this->load->model('UsuarioModel');
		$this->UsuarioModel->desativar_usuario($id);
		$this->sair();

	}


	private function buscar_financas_Usuario(){
		
		$this->load->model('FinancasModel');
		$dados = $this->FinancasModel->carregar_financas();

		foreach ($dados -> result_array() as $row) {

			if ($this->session->userdata("usuario") == $row['email']) {

				$valorReceita= $row['renda_fixa_mensal'];
				$valorDespesa= $row['despesa_fixa_mensal'];
				$saldo= $row['saldo'];


				$valorFormatadoReceita = number_format($valorReceita, 2, ',', '.');
				$valorFormatadoDespesa = number_format($valorDespesa, 2, ',', '.');
				$valorFormatadoSaldo = number_format($saldo, 2, ',', '.');

				$this->session->set_userdata("valorReceitaFixaAtual",$valorFormatadoReceita);
				$this->session->set_userdata("valorDespesaFixaAtual",$valorFormatadoDespesa);
				$this->session->set_userdata("valorsaldo",$valorFormatadoSaldo);

				
				



			}



		}




	}


public function data()
{

$one= new DateTime('2012-06-01');
$two = new DateTime('2012-07-10');
 
// Resgata diferença entre as datas
$dateInterval = $one->diff($two);
echo $dateInterval->days;
echo '........';
echo date("d/m/Y");

}


}