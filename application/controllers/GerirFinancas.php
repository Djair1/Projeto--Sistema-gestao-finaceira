<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('fpdf/fpdf.php');

class GerirFinancas extends CI_Controller {


	


	public function adicionar_valores(){



     //descriçoes das rendas inseridas pelo usuario

		$_dr = $this->input->post("r");
		$_1dr = $this->input->post("d_1");
		$_2dr = $this->input->post("d_2");
		$_3dr = $this->input->post("d_3");
		$_4dr = $this->input->post("d_4");
		$_5dr = $this->input->post("d_5");


     //rendas do usuario

		$rendaFixaMensal = $this->input->post("renda_fixa_mensal");	
		$rendaVariavelMensal =  $this->input->post("renda_variavel_mensal");
		$rendaVariavelMensalDois = $this->input->post("renda_variavel_mensal_2");
		$rendaVariavelMensalTres = $this->input->post("renda_variavel_mensal_3");
		$rendaVariavelMensalQuatro = $this->input->post("renda_variavel_mensal_4");
		$rendaVariavelMensalCinco = $this->input->post("renda_variavel_mensal_5");

		$rfm = str_replace(',','.',str_replace('.','',$rendaFixaMensal));
		$_1rv = str_replace(',','.',str_replace('.','',$rendaVariavelMensal));
		$_2rv = str_replace(',','.',str_replace('.','',$rendaVariavelMensalDois));
		$_3rv = str_replace(',','.',str_replace('.','',$rendaVariavelMensalTres));
		$_4rv = str_replace(',','.',str_replace('.','',$rendaVariavelMensalQuatro));
		$_5rv = str_replace(',','.',str_replace('.','',$rendaVariavelMensalCinco));





////////////////////////////////////////////////////////////////////////////////////////





     //descriçoes das despesas inseridas pelo usuario

		$_dp = $this->input->post("dm");
		$_1dp = $this->input->post("dm0");
		$_2dp = $this->input->post("dm1");
		$_3dp = $this->input->post("dm2");
		$_4dp = $this->input->post("dm3");
		$_5dp = $this->input->post("dm4");


     //despesas variaveis do usuario

		$despesaFixaMensal = $this->input->post("despesa_fixa_mensal");	
		$despesaVariavelUm = $this->input->post("despesa_variavel_mensal_1");	
		$despesaVariavelDois = $this->input->post("despesa_variavel_mensal_2");	
		$despesaVariavelTres = $this->input->post("despesa_variavel_mensal_3");	
		$despesaVariavelQuatro = $this->input->post("despesa_variavel_mensal_4");	
		$despesaVariavelCinco = $this->input->post("despesa_variavel_mensal_5");	

		$dfm = str_replace(',','.',str_replace('.','',$despesaFixaMensal));
		$_1dvm = str_replace(',','.',str_replace('.','',$despesaVariavelUm));
		$_2dvm = str_replace(',','.',str_replace('.','',$despesaVariavelDois));
		$_3dvm = str_replace(',','.',str_replace('.','',$despesaVariavelTres));
		$_4dvm = str_replace(',','.',str_replace('.','',$despesaVariavelQuatro));
		$_5dvm = str_replace(',','.',str_replace('.','',$despesaVariavelCinco));
		
		$this->load->model('FinancasModel');
		$saldo = ((float)$rfm +(float)$_1rv +(float)$_2rv +(float)$_3rv +(float)$_4rv +(float)$_5rv -(float)$dfm -(float)$_1dvm -(float)$_2dvm -(float)$_3dvm -(float)$_4dvm -(float)$_5dvm);


		if ($rfm<1 & $_1rv<1 & $_2rv<1 & $_3rv<1 & $_4rv<1 & $_5rv<1 & $dfm<1 & $_1dvm<1 & $_2dvm<1 & $_3dvm<1 & $_4dvm<1 & $_5dvm<1) {
			redirect('Painel');
			exit();
		}


		$this->FinancasModel->gravar_financas_usuario($this->session->userdata("usuario"),$_dr, $rfm, $_dp, $dfm , $_1dr,floatval($_1rv), $_2dr, floatval($_2rv) , $_3dr,floatval($_3rv) , $_4dr, floatval($_4rv) , $_5dr, floatval($_5rv) , $_1dp, floatval($_1dvm) ,$_2dp,floatval($_2dvm) ,$_3dp,floatval($_3dvm) , $_4dp, floatval($_4dvm) ,$_5dp, floatval($_5dvm) ,$saldo);
		redirect('Painel');
		exit();

	}


	public function gerar_pdf_renda(){

		$hoje = date('m/y');

		$this->load->model('FinancasModel');
		$get_dados = $this->FinancasModel->carregar_financas();

		$usuario_dados = array();
		$usuario_banco = array();

		foreach ($get_dados -> result_array() as $row) {

			$email =  base64_decode($row['email']);

			if ($this->session->userdata("usuario") == $email ){

				
				$stamp = strtotime(str_replace("/","-",base64_decode($row['data'])));
				$data = date('m/y',$stamp);


				if ($hoje == $data) {
					array_push($usuario_banco,$row);
				}	

			}

		}

		$usuario_dados = array_reverse($usuario_banco);

		$zebrado = false ;

		$pdf = new FPDF();
		$pdf->Addpage('L','A4');
		$pdf->setFont('Arial','B',23);
		$pdf->MultiCell(0,0,utf8_decode('Relatório da Renda') , $border=0, $align="C", $fill=false);
		$pdf->Ln(20);

		$pdf->setFont('Arial','',9);
		$pdf->cell(20,5,utf8_decode("DATA") ,1,0,"c");

		$pdf->cell(85,5,utf8_decode("DESCRIÇÃO"),1,0,"c");
		$pdf->Cell(45,5,utf8_decode("RENDA FIXA"),1,0,"c");
		$pdf->cell(85,5,utf8_decode("DESCRIÇÃO"),1,0,"c");
		$pdf->Cell(45,5,utf8_decode("1° RENDA VARIAVEL"),1,0,"c");
		$pdf->Ln();
		


		foreach ($usuario_dados as $row) {

			if (!$zebrado){
				$pdf->SetFillColor(220,220,220);
				$pdf->cell(20,5,utf8_decode(base64_decode($row['data'])),1,0,"c",1);
				$pdf->Cell(85,5,utf8_decode(base64_decode($row['descricao_renda_fixa_mensal'])) , 1 , "L" , false,1);
				$pdf->Cell(45,5,number_format(floatval(base64_decode($row['renda_fixa_mensal'])), 2, ',', '.') , 1 , "L" , false,1);
				$pdf->cell(85,5,utf8_decode(base64_decode($row['descricao_renda_variavel_mensal_1'])) , 1 , "L" , false,1);
				$pdf->cell(45,5,number_format(floatval(base64_decode($row['renda_variavel_mensal'])), 2, ',', '.') , 1 , "L" , false,1);
				$pdf->Ln();
				$zebrado = true ;

			} else {
				$pdf->SetFillColor(255,255,255);
				$pdf->cell(20,5,utf8_decode(base64_decode($row['data'])),1,0,"c",1);
				$pdf->Cell(85,5,utf8_decode(base64_decode($row['descricao_renda_fixa_mensal'])) , 1 , "L" , false,1);
				$pdf->Cell(45,5,number_format(floatval(base64_decode($row['renda_fixa_mensal'])), 2, ',', '.') , 1 , "L" , false,1);
				$pdf->cell(85,5,utf8_decode(base64_decode($row['descricao_renda_variavel_mensal_1'])) , 1 , "L" , false,1);
				$pdf->cell(45,5,number_format(floatval(base64_decode($row['renda_variavel_mensal'])), 2, ',', '.') , 1 , "L" , false,1);
				$pdf->Ln();
				$zebrado = false ;

			}

		}


		$pdf->Ln(15);
		$pdf->setFont('Arial','',9);
		$pdf->cell(20,5,utf8_decode("DATA") ,1,0,"c");

		$pdf->cell(85,5,utf8_decode("DESCRIÇÃO"),1,0,"c");
		$pdf->Cell(45,5,utf8_decode("2° RENDA VARIAVEL"),1,0,"c");
		$pdf->cell(85,5,utf8_decode("DESCRIÇÃO"),1,0,"c");
		$pdf->Cell(45,5,utf8_decode("3° RENDA VARIAVEL"),1,0,"c");
		$pdf->Ln();
		


		foreach ($usuario_dados as $row) {

			if (!$zebrado){
				$pdf->SetFillColor(220,220,220);
				$pdf->cell(20,5,utf8_decode(base64_decode($row['data'])),1,0,"c",1);
				$pdf->Cell(85,5,utf8_decode(base64_decode($row['descricao_renda_variavel_mensal_2'])) , 1 , "L" , false,1);
				$pdf->Cell(45,5,number_format(floatval(base64_decode($row['renda_variavel_mensal_2'])), 2, ',', '.') , 1 , "L" , false,1);
				$pdf->cell(85,5,utf8_decode(base64_decode($row['descricao_renda_variavel_mensal_3'])) , 1 , "L" , false,1);
				$pdf->cell(45,5,number_format(floatval(base64_decode($row['renda_variavel_mensal_3'])), 2, ',', '.') , 1 , "L" , false,1);
				$pdf->Ln();
				$zebrado = true ;

			} else {
				$pdf->SetFillColor(255,255,255);
				$pdf->cell(20,5,utf8_decode(base64_decode($row['data'])),1,0,"c",1);
				$pdf->Cell(85,5,utf8_decode(base64_decode($row['descricao_renda_variavel_mensal_2'])) , 1 , "L" , false,1);
				$pdf->Cell(45,5,number_format(floatval(base64_decode($row['renda_variavel_mensal_2'])), 2, ',', '.') , 1 , "L" , false,1);
				$pdf->cell(85,5,utf8_decode(base64_decode($row['descricao_renda_variavel_mensal_3'])) , 1 , "L" , false,1);
				$pdf->cell(45,5,number_format(floatval(base64_decode($row['renda_variavel_mensal_3'])), 2, ',', '.') , 1 , "L" , false,1);
				$pdf->Ln();
				$zebrado = false ;}

			}



			$pdf->Ln(15);
			$pdf->setFont('Arial','',9);
			$pdf->cell(20,5,utf8_decode("DATA") ,1,0,"c");

			$pdf->cell(85,5,utf8_decode("DESCRIÇÃO"),1,0,"c");
			$pdf->Cell(45,5,utf8_decode("4° RENDA VARIAVEL"),1,0,"c");
			$pdf->cell(85,5,utf8_decode("DESCRIÇÃO"),1,0,"c");
			$pdf->Cell(45,5,utf8_decode("5° RENDA VARIAVEL"),1,0,"c");
			$pdf->Ln();
			


			foreach ($usuario_dados as $row) {

				if (!$zebrado){
					$pdf->SetFillColor(220,220,220);
					$pdf->cell(20,5,utf8_decode(base64_decode($row['data'])),1,0,"c",1);
					$pdf->Cell(85,5,utf8_decode(base64_decode($row['descricao_renda_variavel_mensal_4'])) , 1 , "L" , false,1);
					$pdf->Cell(45,5,number_format(floatval(base64_decode($row['renda_variavel_mensal_4'])), 2, ',', '.') , 1 , "L" , false,1);
					$pdf->cell(85,5,utf8_decode(base64_decode($row['descricao_renda_variavel_mensal_5'])) , 1 , "L" , false,1);
					$pdf->cell(45,5,number_format(floatval(base64_decode($row['renda_variavel_mensal_5'])), 2, ',', '.') , 1 , "L" , false,1);
					$pdf->Ln();
					$zebrado = true ;


				} else {
					$pdf->SetFillColor(255,255,255);
					$pdf->cell(20,5,utf8_decode(base64_decode($row['data'])),1,0,"c",1);
					$pdf->Cell(85,5,utf8_decode(base64_decode($row['descricao_renda_variavel_mensal_4'])) , 1 , "L" , false,1);
					$pdf->Cell(45,5,number_format(floatval(base64_decode($row['renda_variavel_mensal_4'])), 2, ',', '.') , 1 , "L" , false,1);
					$pdf->cell(85,5,utf8_decode(base64_decode($row['descricao_renda_variavel_mensal_5'])) , 1 , "L" , false,1);
					$pdf->cell(45,5,number_format(floatval(base64_decode($row['renda_variavel_mensal_5'])), 2, ',', '.') , 1 , "L" , false,1);
					$pdf->Ln();
					$zebrado = false ;}

				}


				$pdf->Ln(10);
				$pdf->setFont('Arial','',9);
				$pdf->cell(20,5,utf8_decode("DATA") ,1,0,"c");
				$pdf->cell(85,5,utf8_decode("SALDO"),1,0,"c");
				$pdf->Ln();
				

				foreach ($usuario_dados as $row) {

					if (!$zebrado){
						$pdf->SetFillColor(220,220,220);
						$pdf->cell(20,5,utf8_decode(base64_decode($row['data'])),1,0,"c",1);
						$pdf->cell(85,5,number_format(floatval(base64_decode($row['saldo'])), 2, ',', '.') , 1 , "L" , false,1);
						$pdf->Ln();
						$zebrado = true ;


					} else {
						$pdf->SetFillColor(255,255,255);
						$pdf->cell(20,5,utf8_decode(base64_decode($row['data'])),1,0,"c",1);
						$pdf->cell(85,5,number_format(floatval(base64_decode($row['saldo'])), 2, ',', '.') , 1 , "L" , false,1);
						$pdf->Ln();
						$zebrado = false ;}




					}

//$pdf->Output();

					$pdf->Output("I","Relatório da Renda.pdf",true);

				}

//number_format($valorReceita, 2, ',', '.');


			}


//redirecionar passando dados
//redirect('login/'.$username);