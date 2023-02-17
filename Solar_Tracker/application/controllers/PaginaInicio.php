<?php

include_once(APPPATH.'core/Home_Validation.php');
    class PaginaInicio extends Home_Validation {
        public function __construct() {
            parent::__construct();
        
            //if($this->session->userdata('loggin')) redirect('Layouts/Layout_Admin/interface'); // quando estiver logado
            
        }

        public function paginaEntrar(){
            if ($this->session->userdata('loggin')) {
                $dataUtilizador["paginaSelecionada"] = "Interface_views/perfilUtilizador";
                $this->load->view("Interface_layout/sidebar", $dataUtilizador);
            }
            else{
	            $data["pagina_ativa"] = "Forms/login";
                $this->load->view('Inicio_layout/navbar',$data);
            }
        }

        public function paginaAlterarPassword(){
            if ($this->session->userdata('loggin')) {
                $dataUtilizador["paginaSelecionada"] = "Interface_views/perfilUtilizador";
                $this->load->view("Interface_layout/sidebar", $dataUtilizador);
            }
            else{
	            $data["pagina_ativa"] = "Forms/enviarEmail";
                $this->load->view('Inicio_layout/navbar',$data);
            }
        }

        public function paginaAlterarPasswordd($id){
            if ($this->session->userdata('loggin')) {
                $dataUtilizador["paginaSelecionada"] = "Interface_views/perfilUtilizador";
                $this->load->view("Interface_layout/sidebar", $dataUtilizador);
            }
            else{
                $data["idUser"] = $id ; 
                $this->load->view("Forms/alterarPassword",$data);
            }
        }
        
        public function paginaRegistar(){
            if ($this->session->userdata('loggin')) {
                $dataUtilizador["paginaSelecionada"] = "Interface_views/perfilUtilizador";
                $this->load->view("Interface_layout/sidebar", $dataUtilizador);
            }
            else{
                $data['pagina_ativa'] = 'Forms/registo';
                $this->load->view('Inicio_layout/navbar',$data);
            }
    

        }
    }
    
?>