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


			$this->buscar_financas_Usuario();
			$this->carregar_alerta();
			
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


	public function salvarLembrete(){

		$texto = $this->input->post('campo_lembrete');
		$data =  $this->input->post('data');

		if (empty($texto)& empty($data)) {

			redirect('Painel');

		}else{

			$this->load->model('FinancasModel');
			$this->FinancasModel->persistirLembrete($this->session->userdata("usuario"),$texto,$data);
			redirect('Painel');

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
		$get_dados = $this->FinancasModel->carregar_financas();
		$usuario_dados = array();
		$usuario_banco = array();
		$saldoTotal=0;
		$UltimaRenda=0;
		$UltimaDespesa=0;
		$r=0;$d=0;
		


		if ($get_dados->num_rows()!=0) {

			foreach ($get_dados -> result_array() as $row) {

				$email = base64_decode($row['email']);

				if ($this->session->userdata("usuario") == $email) {
					array_push($usuario_banco,$row);
					$valorRendaFixa = floatval(base64_decode($row['renda_fixa_mensal']));
					$valorDespesaFixa = floatval(base64_decode($row['despesa_fixa_mensal']));

					$_1valorRenda = floatval(base64_decode($row['renda_variavel_mensal']));
					$_2valorRenda = floatval(base64_decode($row['renda_variavel_mensal_2']));
					$_3valorRenda = floatval(base64_decode($row['renda_variavel_mensal_3']));
					$_4valorRenda = floatval(base64_decode($row['renda_variavel_mensal_4']));
					$_5valorRenda = floatval(base64_decode($row['renda_variavel_mensal_5']));

					$_1valorDespesa = floatval(base64_decode($row['despesa_variavel_mensal']));
					$_2valorDespesa = floatval(base64_decode($row['despesa_variavel_mensal_2']));
					$_3valorDespesa = floatval(base64_decode($row['despesa_variavel_mensal_3']));
					$_4valorDespesa = floatval(base64_decode($row['despesa_variavel_mensal_4']));
					$_5valorDespesa = floatval(base64_decode($row['despesa_variavel_mensal_5']));
					$saldo =  floatval(base64_decode($row['saldo'])) ;


					$saldoTotal = $saldoTotal + $saldo;

					$Renda = $valorRendaFixa + $_1valorRenda + $_2valorRenda + $_3valorRenda + $_4valorRenda + $_5valorRenda;

					$Despesa =  $valorDespesaFixa + $_1valorDespesa + $_2valorDespesa + $_3valorDespesa+ $_4valorDespesa + $_5valorDespesa;

					
					$r = $r + $valorRendaFixa + $_1valorRenda + $_2valorRenda + $_3valorRenda + $_4valorRenda + $_5valorRenda;

					$d = $d + $valorDespesaFixa + $_1valorDespesa + $_2valorDespesa + $_3valorDespesa+ $_4valorDespesa + $_5valorDespesa;


					if ($Renda>0) {
						$UltimaRenda=$UltimaRenda + $Renda;
					}

					if ($Despesa>0) {
							$UltimaDespesa=$UltimaDespesa + $Despesa;
						}

				}

			}

			$valorFormatadoReceita = number_format($UltimaRenda, 2, ',', '.');
			$valorFormatadoDespesa = number_format($UltimaDespesa, 2, ',', '.');
			$valorFormatadoSaldo = number_format($saldoTotal, 2, ',', '.');
			$DespesaTotal = number_format($d, 2, ',', '.');
			$ReceitaTotal = number_format($r, 2, ',', '.');


			$this->session->set_userdata("valorReceitaFixaAtual",$valorFormatadoReceita);
			$this->session->set_userdata("valorDespesaFixaAtual",$valorFormatadoDespesa);
			$this->session->set_userdata("valorsaldo",$valorFormatadoSaldo);
			$this->session->set_userdata("TotalDespesa",$DespesaTotal);
			$this->session->set_userdata("TotalReceita",$ReceitaTotal);
			


			$usuario_dados = array_reverse($usuario_banco);
			$dados = array('email' => $this->session->userdata("usuario") ,'valores_financas'=> $usuario_dados);
			$this->load->view('dashboard',$dados);
			$this->session->set_userdata("avisoSenha","");


		}else{


			$this->session->set_userdata("valorReceitaFixaAtual","");
			$this->session->set_userdata("valorDespesaFixaAtual","");
			$this->session->set_userdata("valorsaldo","");
			$this->session->set_userdata("TotalDespesa","");
			$this->session->set_userdata("TotalReceita","");

			$dados = array('email' => $this->session->userdata("usuario") ,'valores_financas'=> $usuario_dados);
			$this->load->view('dashboard',$dados);
			$this->session->set_userdata("avisoSenha","");






		}

	}



	private function carregar_alerta(){

		$this->load->model('FinancasModel');
		$dados = $this->FinancasModel->buscarLembrete();
		$hoje = date('Y-m-d');
		$data;
		$lembrete;

		if ($dados -> num_rows()!=0) {

			foreach ($dados -> result_array() as $row) {

				$email = base64_decode($row['email']);

				if ($this->session->userdata("usuario") == $email) {

					$data = base64_decode($row['data']);
					$lembrete = base64_decode($row['lembrete']);



				}

			}

			if ($hoje==$data) {

				$dataF=strtotime($data);
				$dataFormat = date('d/m/Y',$dataF);

				$this->session->set_userdata('mensagemLembrete',$lembrete);
				$this->session->set_userdata('dataLembrete', $dataFormat);

			}

		}else{$this->session->set_userdata('mensagemLembrete','');
		$this->session->set_userdata('dataLembrete','');
	}






}
}