<?php

class Home extends CI_Controller {
	public function __construct() {
		parent::__construct();
		//if($this->session->userdata('loggin')) redirect('Layouts/Layout_Admin/interface'); //Se estiver logado
	}

	public function index(){
		if ($this->session->userdata('loggin')) {
			$dataUtilizador["paginaSelecionada"] = "Interface_views/perfilUtilizador";
			$this->load->view("Interface_layout/sidebar", $dataUtilizador);
		}
		else{
			$data["pagina_ativa"] = "Inicio_view/inicio_view";	
			$this->load->view('Inicio_layout/navbar',$data);

		}
	}
}
?>