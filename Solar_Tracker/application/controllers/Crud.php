<?php

class crud extends CI_Controller {
		// Controlador : Validar o Registo 
		public function registoBD(){
			if ($this->session->userdata('loggin')) {
				$dataUtilizador["paginaSelecionada"] = "Interface_views/perfilUtilizador";
				$this->load->view("Interface_layout/sidebar", $dataUtilizador);
			}
			else{
				// Customizar mensagens de validação Registp
				$this->form_validation->set_message('min_length','*%s não cumpre com os requisitos mínimos de carateres.');
				$this->form_validation->set_message('matches','*%s  não equivale com o campo password.');

				//Customizar regras de validação Login
				$this->form_validation->set_rules('nome', 'Nome Próprio ', 'trim|min_length[3]');
				$this->form_validation->set_rules('email', 'Email do utilizador', 'trim|min_length[3]|valid_email');
				$this->form_validation->set_rules('pass', 'Password', 'trim|min_length[3]');
				$this->form_validation->set_rules('cpass', 'Confirmar password', 'trim|min_length[3]|matches[pass]');

				if($this->form_validation->run()== false || $this->user->verificar_email($this->input->post('email')) == false){
					$data = array(
						'errosValidacaoRegisto' => validation_errors()
					);
					$this->session->set_flashdata($data);
					$data['pagina_ativa'] = 'Forms/registo';
					$this->load->view('Inicio_layout/navbar', $data);
				}
				else{
					if ($this->user->login_utilizador_registado($this->input->post('email'))){
						$this->session->set_flashdata("erroEmail", "O seu pedido de registo está a ser analisado.");
						$data['pagina_ativa'] = "Forms/registo";
						$this->load->view('Inicio_layout/navbar', $data);
					}
					else{
						if($this->user->criarUtilizador()){
							$this->session->set_flashdata("sucessoEmail", "O pedido de registo foi enviado com sucesso. Consulte o seu email.");
							$data["pagina_ativa"] = "Forms/registo";
							$this->load->view("Inicio_layout/navbar", $data);
						}
						else{
							$data['pagina_ativa'] = 'Forms/registo';
							$this->load->view('Inicio_layout/navbar', $data);
						}
					}
				}
			}
		}
					
		public function validarLogin($emailAdmin){
			$validou = $this->user_model->validar_utilizador($emailAdmin);
			if($validou) {
				$dataInterface["paginaSelecionada"] = "Tools/Perfil_Utilizador/Perfil";
				$this->load->view("Layout/interface", $dataInterface);
			}
			else{
				echo "<h1>Fail</h1>";
			}
		}

		public function paginaLogin(){
			if ($this->session->userdata('loggin')){
				$this->load->view("Layout/interface");
			}
			else{ 
				$data['pagina_ativa'] = 'Users/login';
				$this->load->view('Layout_Home/navbar', $data);
			}

		}

	// Login Utilizador 
	public function loginBD(){
		$this->session->set_flashdata("utilizadorRegistado", "");
		$this->session->set_flashdata("utilizadorNaoEncontrado", "");
		if ($this->session->userdata('loggin')) {
			$dataUtilizador["paginaSelecionada"] = "Interface_views/perfilUtilizador";
			$this->load->view("Interface_layout/sidebar", $dataUtilizador);
		}
		else{
			// Customizar mensagens de validação Login
			$this->form_validation->set_message('min_length','*%s não cumpre os requisitos mínimos de carateres');

			//Customizar regras de validação Login
			$this->form_validation->set_rules('email', 'Email Admin', 'trim|required');
			$this->form_validation->set_rules('pass', 'Password', 'trim|required');
			
			if($this->form_validation->run() == FALSE) {
				$data = array(
					'errosValidacaoLogin' => validation_errors()
				);
				$this->session->set_flashdata($data);
				$data['pagina_ativa'] = 'Forms/login';
				$this->load->view('Inicio_layout/navbar', $data);
			} 
			else {
				$emailUtilizador = $this->input->post('email');
				$passwordUtilizador = $this->input->post('pass');
				if ($this->user->login_utilizador_registado($emailUtilizador)){
					$this->session->set_flashdata("utilizadorRegistado", "O seu pedido de registo está a ser analisado.");
					$data['pagina_ativa'] = "Forms/login";
					$this->load->view('Inicio_layout/navbar', $data);
				}
				else{
					if($this->user->login_utilizador($emailUtilizador, $passwordUtilizador)){
						//Customizar mensagem de User Found
						$dataUtilizador["paginaSelecionada"] = "Interface_views/perfilUtilizador";
						$this->load->view("Interface_layout/sidebar", $dataUtilizador);
					}
					else {
						$this->session->set_flashdata("utilizadorNaoEncontrado", "*Email ou Password errados , tente outra vez.");
						$data['pagina_ativa'] = "Forms/login";
						$this->load->view('Inicio_layout/navbar', $data);
					}
				}
			}
		}
	}
	
	public function logout(){
		$this->session->sess_destroy();
		$data["pagina_ativa"] = "Inicio_view/inicio_view";	
		$this->load->view('Inicio_layout/navbar',$data);	
	}
	
	public function alterarPerfilUtilizador(){

        // Customizar mensagens de Validação
        $this->form_validation->set_message('min_length','*%s não cumpre com os requisitos mínimos de carateres.');
       
        //Customizar regras de validação Login
        $this->form_validation->set_rules('nomeUser', 'Nome do utilizador ', 'trim|min_length[3]');
		$this->form_validation->set_rules('primeironomeUser', 'Primeiro nome ', 'trim|min_length[3]');
		$this->form_validation->set_rules('ultimonomeUser', 'Último nome ', 'trim|min_length[3]');
		$this->form_validation->set_rules('moradaUser', 'Morada ', 'trim|min_length[3]');
		$this->form_validation->set_rules('cidadeUser', 'Cidade ', 'trim|min_length[3]');
		$this->form_validation->set_rules('paisUser', 'País ', 'trim|min_length[3]');
		$this->form_validation->set_rules('codigopostalUser', 'Código postal ', 'trim|min_length[3]');
        $this->form_validation->set_rules('descricaoUser', 'Descrição ', 'trim|min_length[3]');

		$config['upload_path'] = "Upload/Utilizadores/";
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['file_name'] = str_replace(' ', '_', $this->input->post('nomeUser'));
		$this->load->library('upload',$config);

        if($this->form_validation->run()== false){
            $data = array(
                'errosValidacaoPerfil' => validation_errors()
            );
            $this->session->set_flashdata($data);
        }
        else{
			if ($this->upload->do_upload('userfile')){
				$file_data = $this->upload->data();
				$data['img'] = base_url().'Upload/Utilizadores/'.$file_data['file_name'];
				if($this->user->alterarPerfil($data)) $dataUtilizador["updatePerfil"] = true;
			}
			else{
				if ($this->input->post('userfile')){
					$data = array(
						'errosValidacaoFoto' => '*O tipo de imagem não é permitido.'
					);
					$this->session->set_flashdata($data);
					$dataUtilizador["paginaSelecionada"] = "Interface_views/perfilUtilizador";
					$this->load->view('Interface_layout/sidebar', $dataUtilizador);
				}
				else{
					$data = false;
					if($this->user->alterarPerfil($data)) $dataUtilizador["updatePerfil"] = true;
				}
			}
        }

        $dataUtilizador["paginaSelecionada"] = "Interface_views/perfilUtilizador";
        $this->load->view("Interface_layout/sidebar", $dataUtilizador);
    
	}
	
	public function eliminar_utilizador($idUtilizador){
        if ($this->user->eliminar_user($idUtilizador)){
            $dataUtilizador["paginaSelecionada"] = "Interface_views/gestaoUtilizador";
        	$this->load->view("Interface_layout/sidebar", $dataUtilizador);
        }
        else return false;
	}
	public function aprovar_utilizador($idUtilizador){
        if ($this->user->aprovar_user($idUtilizador)){
            $dataUtilizador["paginaSelecionada"] = "Interface_views/gestaoAprovados";
        	$this->load->view("Interface_layout/sidebar", $dataUtilizador);
        }
        else return false;
	}
	public function recuperar_utilizador($idUtilizador){
        if ($this->user->recuperar_user($idUtilizador)){
            $dataUtilizador["paginaSelecionada"] = "Interface_views/gestaoEliminados";
        	$this->load->view("Interface_layout/sidebar", $dataUtilizador);
        }
        else return false;
	}

	public function alterarpass($idUser){
		if ($this->session->userdata('loggin')) {
			$dataUtilizador["paginaSelecionada"] = "Interface_views/perfilUtilizador";
			$this->load->view("Interface_layout/sidebar", $dataUtilizador);
		}
		else{
			// Customizar mensagens de validação Registp
			$this->form_validation->set_message('min_length','*%s não cumpre com os requisitos mínimos de carateres.');
			$this->form_validation->set_message('matches','*%s  não equivale com o campo password.');

			//Customizar regras de validação Login
			$this->form_validation->set_rules('password', 'Password', 'trim|min_length[3]');
			$this->form_validation->set_rules('cpassword', 'Confirmar password', 'trim|min_length[3]|matches[password]');

			if($this->form_validation->run()== false){
				$data = array(
					'errosValidacaoRegisto' => validation_errors()
				);
				$this->session->set_flashdata($data);
				$data["idUser"] = $idUser; 
                $this->load->view("Forms/alterarPassword",$data);
			}
			else{
				if ($this->user->confirmarPassword($idUser)){
					if($this->user->alterarUtilizador($idUser)){
						$this->session->set_flashdata("sucessoEmail", "Palavra passe alterada com sucesso");
						$data["idUser"] = $idUser; 
						$this->load->view("Forms/alterarPassword",$data);
					}
					else{
						$this->session->set_flashdata("erroEmail", "Palavra passe alterada sem sucesso");
						$data["idUser"] = $idUser; 
						$this->load->view("Forms/alterarPassword",$data);
					}
				}
				else{
					$this->session->set_flashdata("erroEmail", "Execute novo pedido de recuperação de password.");
					$data["idUser"] = $idUser; 
					$this->load->view("Forms/alterarPassword",$data);
				}
			}
		}
	}
	
	public function envioEmail(){
		if ($this->session->userdata('loggin')) {
			$dataUtilizador["paginaSelecionada"] = "Interface_views/perfilUtilizador";
			$this->load->view("Interface_layout/sidebar", $dataUtilizador);
		}
		else{
			// Customizar mensagens de validação Registp
			$this->form_validation->set_message('min_length','*%s não cumpre com os requisitos mínimos de carateres.');

			$this->form_validation->set_rules('email', 'Email do utilizador', 'trim|min_length[3]|valid_email');

			if($this->form_validation->run()== false || $this->user->verificar_email_nao($this->input->post('email')) == false){
				$data = array(
					'errosValidacaoEmail' => validation_errors()
				);
				$this->session->set_flashdata($data);
				$data['pagina_ativa'] = 'Forms/enviarEmail';
				$this->load->view('Inicio_layout/navbar', $data);
			}
			else{
				if ($this->user->enviaremail($this->input->post('email'))){
					$this->session->set_flashdata("sucessoEmail", "Email enviado com sucesso.");
					$data['pagina_ativa'] = "Forms/enviarEmail";
					$this->load->view('Inicio_layout/navbar', $data);
				}
				else{
					$this->session->set_flashdata("emailRepetido", "Email enviado sem sucesso.");
					$data['pagina_ativa'] = "Forms/enviarEmail";
					$this->load->view('Inicio_layout/navbar', $data);
				}
			}
		}
	}
	
	public function tornar_admin($idUtilizador){
		if ($this->user->tornarAdmin($idUtilizador)){
			$dataUtilizador["paginaSelecionada"] = "Interface_views/gestaoUtilizador";
        	$this->load->view("Interface_layout/sidebar", $dataUtilizador);
		}
		else{
			$dataUtilizador["paginaSelecionada"] = "Interface_views/gestaoUtilizador";
        	$this->load->view("Interface_layout/sidebar", $dataUtilizador);
		}
	}

	public function rebaixar_admin($idUtilizador){
		if ($this->user->rebaixarAdmin($idUtilizador)){
			$dataUtilizador["paginaSelecionada"] = "Interface_views/gestaoUtilizador";
        	$this->load->view("Interface_layout/sidebar", $dataUtilizador);
		}
		else{
			$dataUtilizador["paginaSelecionada"] = "Interface_views/gestaoUtilizador";
        	$this->load->view("Interface_layout/sidebar", $dataUtilizador);
		}
	}

	public function editar_utilizador($idUtilizador){
		if ($this->user->verificar_emaill($idUtilizador)){
			if ($this->user->alterarUser($idUtilizador)){
				$dataUtilizador["paginaSelecionada"] = "Interface_views/gestaoUtilizador";
				$this->load->view("Interface_layout/sidebar", $dataUtilizador);
			}
			else{
				$dataUtilizador["paginaSelecionada"] = "Interface_views/gestaoUtilizador";
				$this->load->view("Interface_layout/sidebar", $dataUtilizador);
			}
		}
		else{
			$dataUtilizador["paginaSelecionada"] = "Interface_views/gestaoUtilizador";
			$this->load->view("Interface_layout/sidebar", $dataUtilizador);
		}
	}

}

?>