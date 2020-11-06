<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GerirFinancas extends CI_Controller {


	public function adicionar_valores(){


      //descriçoes das rendas inseridas pelo usuario
		$_dr = $this->input->post("r");
        $_0dr = $this->input->post("d_0");
        $_1dr = $this->input->post("d_1");
        $_2dr = $this->input->post("d_2");
        $_3dr = $this->input->post("d_3");
        $_4dr = $this->input->post("d_4");



     //rendas do usuario

        $rendaFixaMensal = $this->input->post("renda_fixa_mensal");	
        $rendaVariavelMensal = $this->input->post("renda_variavel_mensal");
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
        $_0dp = $this->input->post("dm0");
        $_1dp = $this->input->post("dm1");
        $_2dp = $this->input->post("dm2");
        $_3dp = $this->input->post("dm3");
        $_4dp = $this->input->post("dm4");


     //despesas variaveis do usuario

        $despesaFixaMensal = $this->input->post("despesa_fixa_mensal");	
        $despesaVariavelUm = $this->input->post("despesa_variavel_mensal_1");	
        $despesaVariavelDois = $this->input->post("despesa_variavel_mensal_2");	
        $despesaVariavelTres = $this->input->post("despesa_variavel_mensal_3");	
        $despesaVariavelQuatro = $this->input->post("despesa_variavel_mensal_4");	
        $despesaVariavelCinco = $this->input->post("despesa_variavel_mensal_5");	


        $dfm = str_replace(',','.',str_replace('.','',$despesaFixaMensal));
        $dvm = str_replace(',','.',str_replace('.','',$despesaVariavelMensalUm));
         $dvm = str_replace(',','.',str_replace('.','',$despesaVariavelMensalDois));
          $dvm = str_replace(',','.',str_replace('.','',$despesaVariavelMensalTres));
           $dvm = str_replace(',','.',str_replace('.','',$despesaVariavelMensalQuatro));
            $dvm = str_replace(',','.',str_replace('.','',$despesaVariavelMensalCinco));


		
		
        $this->load->model('FinancasModel');


          //$saldo = $rfm+$rvm-$dfm-$dvm;
            $saldo = ((float)$rfm+(float)$rvm-(float)$dfm-(float)$dvm);
            $this->FinancasModel->gravar_financas_usuario($this->session->userdata("usuario"),$rfm,$rvm,$dfm,$dvm,$saldo);

            redirect('Painel');
		    exit();
			}
		
		}
	

//redirecionar passando dados
//redirect('login/'.$username);

