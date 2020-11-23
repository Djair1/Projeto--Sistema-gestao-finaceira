<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FinancasModel extends CI_Model {



	public function gravar_financas_usuario($email,$_dr, $rfm, $_dp, $dfm , $_1dr, $_1rv,  $_2dr, $_2rv, $_3dr, $_3rv, $_4dr, $_4rv, $_5dr, $_5rv, $_1dp,$_1dvm,$_2dp,$_2dvm,$_3dp, $_3dvm, $_4dp,$_4dvm,$_5dp,$_5dvm ,$saldo){


		$dadosCriptografados = array();


		$dados = [$email, $_dr, $rfm, $_dp, $dfm , $_1dr, $_1rv,  $_2dr, $_2rv, $_3dr, $_3rv, $_4dr, $_4rv, $_5dr, $_5rv, $_1dp,$_1dvm,$_2dp,$_2dvm,$_3dp, $_3dvm, $_4dp,$_4dvm,$_5dp,$_5dvm  ,$saldo,date("d/m/Y")];


		foreach ($dados as $row) {

			array_push($dadosCriptografados, base64_encode($row));

		}

		


		$this->db->query('INSERT INTO financas(email,
			descricao_renda_fixa_mensal,
			renda_fixa_mensal,
			descricao_despesa_fixa_mensal,
			despesa_fixa_mensal,
			descricao_renda_variavel_mensal_1,
			renda_variavel_mensal,
			descricao_renda_variavel_mensal_2,
			renda_variavel_mensal_2,
			descricao_renda_variavel_mensal_3,
			renda_variavel_mensal_3 ,
			descricao_renda_variavel_mensal_4 ,
			renda_variavel_mensal_4 ,
			descricao_renda_variavel_mensal_5,
			renda_variavel_mensal_5 ,

			descricao_despesa_variavel_mensal_1,
			despesa_variavel_mensal,
			descricao_despesa_variavel_mensal_2 ,
			despesa_variavel_mensal_2 ,
			descricao_despesa_variavel_mensal_3 ,
			despesa_variavel_mensal_3 ,
			descricao_despesa_variavel_mensal_4 ,
			despesa_variavel_mensal_4 ,
			descricao_despesa_variavel_mensal_5 ,
			despesa_variavel_mensal_5 ,
			saldo ,
			data ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',$dadosCriptografados);


		
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




	public function carregar_financas(){


		
		return $query = $this->db->query('SELECT * FROM financas');



	}



}