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

$this->load->view('painel',$dados);


}else{


redirect('Inicio');


}

}


 public function sair(){
		

			$this->session->set_userdata("id", "");
            $this->session->set_userdata("usuario", "");
            redirect('Inicio');
		

	}

	}