<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FinancasModel extends CI_Model {


	public function gravar_receita_usuario($email , $receita, $despesa){

		$dados = [$email , $receita, $despesa,$receita,date("d/m/Y")];

		$this->db->query('INSERT INTO financas(email,receita,despesa,saldo,data) VALUES (?,?,?,?,?)',$dados);


		
	}

	public function atualizar_receita_usuario($email,$receita){


		$this->db->query("UPDATE financas
			SET receita = '$receita'
			WHERE email = '$email'");

		
	}


	public function gravar_despesa_usuario($email , $receita, $despesa){

		$dados = [$email , $receita, $despesa];

		$this->db->query('INSERT INTO financas(email,receita,despesa) VALUES (?,?,?)',$dados);


		
	}

	public function atualizar_despesa_usuario($email,$despesa){


		$this->db->query("UPDATE financas
			SET despesa = '$despesa'
			WHERE email = '$email'");

		
	}




	public function carregar_financas()
	{

		return $query = $this->db->query('SELECT * FROM financas');


	}







}