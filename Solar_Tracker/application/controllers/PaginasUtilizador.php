<?php
// Indice 

// 1- Apresenta Pagina Perfil Administrador
// 2- Apresenta Pagina Perfil Empresa Administrador
// 3- Apresenta Pagina Funcionarios Empresa Administrador
// 4- Apresenta Pagina Gerir Empresa Administrador
// 5- Apresenta Pagina Configuracao Empresa Administrador

include_once(APPPATH.'core/Logged_Validation.php');

class PaginasUtilizador extends Logged_Validation{
    public function __construct() {
        parent::__construct();
    
    
        if(!$this->session->userdata('loggin')) {
    
            $this->session->set_flashdata('no_access', 'Não tem permissão para a página seguinte.');
            
            
    }
}
    // Pagina Perfil Administrador
    public function perfilUtilizador() {
        $dataUtilizador["paginaSelecionada"] = "Interface_views/perfilUtilizador";
        $this->load->view("Interface_layout/sidebar", $dataUtilizador);
    }

    // Pagina Perfil Empresa Administrador
    public function painelUtilizador() {
        $dataUtilizador["paginaSelecionada"] = "Interface_views/painelUtilizador";
        $this->load->view("Interface_layout/sidebar", $dataUtilizador);
    }

    public function gestaoUtilizador() {
        $dataUtilizador["paginaSelecionada"] = "Interface_views/gestaoUtilizador";
        $this->load->view("Interface_layout/sidebar", $dataUtilizador);
    }

    public function gestaoEliminados() {
        $dataUtilizador["paginaSelecionada"] = "Interface_views/gestaoEliminados";
        $this->load->view("Interface_layout/sidebar", $dataUtilizador);
    }

    public function gestaoAprovados() {
        $dataUtilizador["paginaSelecionada"] = "Interface_views/gestaoAprovados";
        $this->load->view("Interface_layout/sidebar", $dataUtilizador);
    }
    
    // Pagina Funcionarios Empresa Administrador
    public function funcionariosEmpresa() {
        $dataInterface["paginaSelecionada"] = "Administrador/Tools/Empresa/FuncionariosEmpresa";
        $this->load->view("Layouts/Layout_Admin/interface", $dataInterface);
    }
    
    public function calendario (){
        $dataInterface["paginaSelecionada"] = "Administrador/Tools/Calendario";
        $this->load->view("Layouts/Layout_Admin/interface", $dataInterface);
    }


    public function mudar_foto(){
        $detalhesFotoUpdate = [ 
            'upload_path' => './Upload/',
            'allowed_types' => 'gif|jpg|png',
            'file_name' => $this->session->userdata('nomeAdmin')
        ];
        $this->load->library('upload',$detalhesFotoUpdate);
        $this->upload->do_upload('fotoUpdate');	
        $propriedadesFotoUpload = $this->upload->data();
        
					$config['image_library'] = 'gd2';
    				$config['source_image'] = $propriedadesFotoUpload['full_path'];
    				$config['maintain_ratio'] = TRUE;
    				$config['width'] = 200;
    				$config['height'] = 200;
    				$this->load->library('image_lib', $config); 
    				$this->image_lib->resize();
        if($this->user_model->update_ImagemPerfil($propriedadesFotoUpload, $this->session->userdata('emailAdmin'))){
            $dataInterface["paginaSelecionada"] = "Tools/Perfil_Utilizador/Perfil";
        $this->load->view("Layout/interface", $dataInterface);
        }
    }

    // Pagina Gerir Empresa Administrador
    public function paginaGerirEmpresa(){
        $dataInterface["paginaSelecionada"] = "Administrador/Tools/Empresa/Gerir_Empresa";
        $this->load->view("Layouts/Layout_Admin/interface", $dataInterface);
    }

    // Pagina Configurar Empresa Administrador
    public function paginaConfigurarEmpresa($idEmpresa){
        $dataInterface["paginaSelecionada"] = "Administrador/Tools/Empresa/Configurar_Empresa";
        $dataInterface["idEmpresa"] = $idEmpresa;
        $this->load->view("Layouts/Layout_Admin/interface", $dataInterface);
    }
    
    public function paginaCriarEmpresa(){
        $dataInterface["paginaSelecionada"] = "Administrador/Tools/Empresa/criarEmpresa";
        $this->load->view("Layouts/Layout_Admin/interface", $dataInterface);
    }
}