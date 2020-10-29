<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GerirFinancas extends CI_Controller {



	public function adicionarReceita(){

		$valor = $this->input->post("valor");	

		$valorformatado = str_replace(',','.',str_replace('.','',$valor));

		$this->load->model('FinancasModel');

		$dados = $this->FinancasModel->carregar_financas();

		foreach  ( $dados -> result_array ()  as  $row ){

			if ($this->session->userdata("usuario") == $row['email']) {

				$this->FinancasModel->atualizar_receita_usuario($this->session->userdata("usuario"),$valorformatado);
				redirect('Painel');
				exit();


			}

		}
		$this->FinancasModel->gravar_receita_usuario($this->session->userdata("usuario"),$valorformatado,0);
		redirect('Painel');
		exit();

	}

//redirecionar passando dados
//redirect('login/'.$username);



public function adicionarDespesa(){

		$valor = $this->input->post("valor");	

		$valorformatado = str_replace(',','.',str_replace('.','',$valor));

		$this->load->model('FinancasModel');

		$dados = $this->FinancasModel->carregar_financas();

		foreach  ( $dados -> result_array ()  as  $row ){

			if ($this->session->userdata("usuario") == $row['email']) {

				$this->FinancasModel->atualizar_despesa_usuario($this->session->userdata("usuario"),$valorformatado);
				redirect('Painel');
				exit();


			}

		}
		$this->FinancasModel->gravar_despesa_usuario($this->session->userdata("usuario"), 0, $valorformatado);
		redirect('Painel');
		exit();

	}



}