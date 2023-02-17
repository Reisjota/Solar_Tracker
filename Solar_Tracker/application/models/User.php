<?php 

class user extends CI_Model{

    // 1
    public function criarUtilizador(){
        $passwordEncriptada = password_hash($this->input->post('pass'),PASSWORD_DEFAULT);
        $camposBaseDadosPrincipal = array(
            'nomeUser' => $this->input->post('nome'),
            'emailUser' => $this->input->post('email'),
            'passwordUser' => $passwordEncriptada,
            'fotoUser' => 'http://www.solartracker.pt/Solar_Tracker/Upload/default.jpg',
            'descricaoUser' => 'Altera aqui a tua descrição pessoal.',
            'alterarPass' => '0'
        );
        $this->db->insert('registados' , $camposBaseDadosPrincipal);

        $destinatarioEmail = $this->input->post('email'); // Destinatario Email
        $assuntoEmail = "Registo Solar Tracker"; // Assunto Email 

        // Corpo Email
        $corpoEmail = "<html>
                <head>
                <title>Registo</title>
                </head>
                <body>

                <p>O seu pedido de registo foi efetuado com sucesso!</p>
                <p>Terá que esperar pela validação do administrador para usufruir do site.</p>";

            // Headers
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: <suporte@solartracker.pt>" . "\r\n";
            return mail($destinatarioEmail,$assuntoEmail,$corpoEmail,$headers);
    }
     // 1
     public function permi(){
        $this->db->where("emailUser",$this->session->userdata('emailUser')); // Condição WHERE = variavel de sessao logada
        $camposBaseDados = array(
            'nomeUser' => $this->input->post('nomeUser'),
            'primeironomeUser' => $this->input->post('primeironomeUser'),
            'ultimonomeUser' => $this->input->post('ultimonomeUser'),
            'moradaUser' => $this->input->post('moradaUser'),
            'cidadeUser' => $this->input->post('cidadeUser'),
            'paisUser' => $this->input->post('paisUser'),
            'codigopostalUser' => $this->input->post('codigopostalUser'),
            'descricaoUser' => $this->input->post('textarea'),
        ); // Campos a alterar e respetivo valor 
        $this->session->set_userdata($camposBaseDados); // Atualiza as variaveis de sessao do utilizador
        return $this->db->update('utilizadores' , $camposBaseDados);
    }
    // 2 
    public function alterarPerfil($data){
        $this->db->where("emailUser",$this->session->userdata('emailUser')); // Condição WHERE = variavel de sessao logada
        if ($data == false){
            $camposBaseDados = array(
                'nomeUser' => $this->input->post('nomeUser'),
                'primeironomeUser' => $this->input->post('primeironomeUser'),
                'ultimonomeUser' => $this->input->post('ultimonomeUser'),
                'moradaUser' => $this->input->post('moradaUser'),
                'cidadeUser' => $this->input->post('cidadeUser'),
                'paisUser' => $this->input->post('paisUser'),
                'codigopostalUser' => $this->input->post('codigopostalUser'),
                'descricaoUser' => $this->input->post('textarea'),
            ); // Campos a alterar e respetivo valor 
        }
        else{
            $camposBaseDados = array(
                'nomeUser' => $this->input->post('nomeUser'),
                'primeironomeUser' => $this->input->post('primeironomeUser'),
                'ultimonomeUser' => $this->input->post('ultimonomeUser'),
                'moradaUser' => $this->input->post('moradaUser'),
                'cidadeUser' => $this->input->post('cidadeUser'),
                'paisUser' => $this->input->post('paisUser'),
                'codigopostalUser' => $this->input->post('codigopostalUser'),
                'descricaoUser' => $this->input->post('textarea'),
                'fotoUser' => $data['img'],
            ); // Campos a alterar e respetivo valor 
        }
        $this->session->set_userdata($camposBaseDados); // Atualiza as variaveis de sessao do utilizador
        return $this->db->update('utilizadores' , $camposBaseDados);
    }

    public function enviaremail($email){
        $destinatarioEmail = $email; // Destinatario Email
        $assuntoEmail = "Recuperação de password"; // Assunto Email 
        // Corpo Email
        $corpoEmail = "<html>
                <head>
                <title>Recuperação de password</title>
                </head>
                <body>

                <p>Para alterar a sua password, terá de acessar ao seguinte link: <a href = 'http://www.solartracker.pt/Solar_Tracker/PaginaInicio/paginaAlterarPasswordd/".$this->user->buscarEmail($email)."'>Link</a></p>";

            // Headers
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: <suporte@solartracker.pt>" . "\r\n";
            mail($destinatarioEmail,$assuntoEmail,$corpoEmail,$headers);

            $this->db->where("emailUser",$email);
            $camposBaseDados = array(
                'alterarPass' => '1'
            );
            return $this->db->update('utilizadores' , $camposBaseDados);

    }

    public function confirmarPassword($idUser){
        $this->db->select("*");
        $this->db->from("utilizadores");
        $this->db->where('idUser',$idUser);
        $query = $this->db->get()->row()->alterarPass;

        if ($query == '1'){
            return true;
        }
        else{
            return false;
        }
    }

    public function alterarUtilizador($idUser){
        $this->db->where("idUser",$idUser);
        $opcoes = ['cost' => 12]; //password hash
        $passwordAdminEncriptada = password_hash($this->input->post('password'),PASSWORD_BCRYPT,$opcoes); // Password Encriptada
        $camposBaseDados = array(
            'passwordUser' => $passwordAdminEncriptada,
            'alterarPass' => '0'
        );
        return $this->db->update('utilizadores' , $camposBaseDados);
    }
    
    // 4
    public function login_utilizador($email , $password){
        $this->db->where("emailUser",$email); // Condição WHERE = $emailAdmin
        $resultado = $this->db->get("utilizadores"); // Resultados provenientes da query
        if( $resultado->num_rows() == 1){
            $db_password = $resultado->row()->passwordUser;
            if (password_verify($password,$db_password)) {
                $dadosUser = array(
                "idUser" => $resultado->row()->idUser,
                "nomeUser" => $resultado->row()->nomeUser,
                "emailUser" => $resultado->row()->emailUser,
                "primeironomeUser" => $resultado->row()->primeironomeUser,
                "ultimonomeUser" => $resultado->row()->ultimonomeUser,
                "moradaUser" => $resultado->row()->moradaUser,
                "cidadeUser" => $resultado->row()->cidadeUser,
                "paisUser" => $resultado->row()->paisUser,
                "codigopostalUser" => $resultado->row()->codigopostalUser,
                "descricaoUser" => $resultado->row()->descricaoUser,
                "fotoUser" => $resultado->row()->fotoUser,
                "permi" => $resultado->row()->permissaoUser,
                "loggin" => true
                );
            $this->session->set_userdata($dadosUser); // Atribui variaveis de sessão ao Utilizador 
            return 	$resultado->row()->idUser ; // Retorna o Id do Admin
            }
            else  return false ; // Caso a password esteja errada 
        }
        else{
            return false ; // Caso não exista utilizador com o mesmo email
        }	
    }

    public function login_utilizador_registado($email){
        $this->db->where("emailUser",$email); // Condição WHERE = $emailAdmin
        $resultado = $this->db->get("registados"); // Resultados provenientes da query
        if( $resultado->num_rows() == 1){
            return true;
        }
        else{
            return false ; // Caso não exista utilizador com o mesmo email
        }	
    }

    // Modelo para validar o utilizador 
    public function validar_utilizador($emailAdmin){
        $this->db->where("emailAdmin",$emailAdmin);
        $resultado = $this->db->get("adminempresa");
        if($resultado->num_rows() == 1){
            if($resultado->row()->validarAdmin == false){
                $data = array(
                    'validarAdmin' => true
                );
             return $this->db->update('adminempresa', $data);
            }
            else{
                return false ;
            }
        }
    }

    public function verificar_email($email){
        $this->db->where("emailUser",$email);
        $resultado = $this->db->get("utilizadores");
        if($resultado->num_rows() >= 1) {
            $this->session->set_flashdata("emailRepetido", "O seu email já foi registado, tente outro");
            return false ;
        }
        else return true ;
    }

    public function verificar_email_nao($email){
        $this->db->where("emailUser",$email);
        $resultado = $this->db->get("utilizadores");
        if($resultado->num_rows() == 0) {
            $this->session->set_flashdata("emailEncontrado", "Não foi encontrado nenhum utilizador com o email introduzido.");
            return false;
        }
        else return true;
    }
    public function update_ImagemPerfil($detalhesfotoUptate,$emailAdmin){
        $this->db->where("emailAdmin",$emailAdmin );
        $resultado = $this->db->get("adminempresa");
        if($resultado->num_rows() == 1 ){
            $data = array (
                'fotoAdmin' =>  base_url('Upload') .'/'. $detalhesfotoUptate['file_name'] 
            );
            $this->session->set_userdata('fotoAdmin',$data['fotoAdmin']);
            return $this->db->update('adminempresa', $data);
        }
        else{
            return false ;
        }
    }
    public function alterar_administrador(){
     
        $this->db->where("emailAdmin",$this->session->userdata('emailAdmin')); // Condição WHERE = variavel de sessao logada
        $camposBaseDados = array(
            'nomeAdmin' => $this->input->post('nomeAdministrador'),
            'telemovelAdmin' => $this->input->post('telemovelAdministrador'),
        ); // Campos a alterar e respetivo valor 
        $this->session->set_userdata($camposBaseDados); // Atualiza as variaveis de sessao do utilizador
        return $this->db->update('adminempresa' , $camposBaseDados); 

        
    }

    public function eliminar_user($idUtilizador){
        if ($this->db->query("INSERT INTO eliminados SELECT * FROM utilizadores WHERE idUser = $idUtilizador")){
            if($this->db->delete('utilizadores', array('idUser' => $idUtilizador))){
                return $this->db->delete('utilizadores', array(
                    'idUser' => $idUtilizador
                ));  
            }
        }
    }
    public function aprovar_user($idUtilizador){
        if ($this->db->query("INSERT INTO utilizadores(`nomeUser`, `passwordUser`, `emailUser`, `fotoUser`, `primeironomeUser`, `ultimonomeUser`, `moradaUser`, `cidadeUser`, `paisUser`, `codigopostalUser`, `descricaoUser`, `permissaoUser`) SELECT `nomeUser`, `passwordUser`, `emailUser`, `fotoUser`, `primeironomeUser`, `ultimonomeUser`, `moradaUser`, `cidadeUser`, `paisUser`, `codigopostalUser`, `descricaoUser`, `permissaoUser` FROM registados WHERE idUser = $idUtilizador")){
            $email = $this->db->select('emailUser')->where('idUser', $idUtilizador)->limit(1)->get('registados')->row()->emailUser;
            $destinatarioEmail = $email; // Destinatario Email
            $assuntoEmail = "Registo Solar Tracker"; // Assunto Email 

            // Corpo Email
            $corpoEmail = "<html>
                    <head>
                    <title>Registo</title>
                    </head>
                    <body>

                    <p>O seu pedido de registo foi aprovado!</p>
                    <p>Poderá fazer login na sua conta e começar a utilizar o site.</p>";

                // Headers
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "From: <suporte@solartracker.pt>" . "\r\n";
                mail($destinatarioEmail,$assuntoEmail,$corpoEmail,$headers);
            if($this->db->delete('registados', array('idUser' => $idUtilizador))){
                return $this->db->delete('registados', array(
                    'idUser' => $idUtilizador
                ));  
            }
        }
    }
    public function recuperar_user($idUtilizador){
        if ($this->db->query("INSERT INTO utilizadores(`nomeUser`, `passwordUser`, `emailUser`, `fotoUser`, `primeironomeUser`, `ultimonomeUser`, `moradaUser`, `cidadeUser`, `paisUser`, `codigopostalUser`, `descricaoUser`, `permissaoUser`) SELECT `nomeUser`, `passwordUser`, `emailUser`, `fotoUser`, `primeironomeUser`, `ultimonomeUser`, `moradaUser`, `cidadeUser`, `paisUser`, `codigopostalUser`, `descricaoUser`, `permissaoUser` FROM eliminados WHERE idUser = $idUtilizador")){
            if($this->db->delete('eliminados', array('idUser' => $idUtilizador))){
                return $this->db->delete('eliminados', array(
                    'idUser' => $idUtilizador
                ));  
            }
        }
    }

    public function buscarEmail($email){
        $this->db->where("emailUser",$email);
        return $this->db->get('utilizadores')->row()->idUser;
    }

    public function tornarAdmin($idUser){
        $this->db->where("idUser",$idUser);
        $camposBaseDados = array(
            'permissaoUser' => 1
        );
        return $this->db->update('utilizadores' , $camposBaseDados);
    }

    public function rebaixarAdmin($idUser){
        $this->db->where("idUser",$idUser);
        $camposBaseDados = array(
            'permissaoUser' => 0
        );
        return $this->db->update('utilizadores' , $camposBaseDados);
    }

    public function alterarUser($idUser){
        $this->db->where("idUser",$idUser);
        $camposBaseDados = array(
            'nomeUser' => $this->input->post('nomeUser'),
            'emailUser' => $this->input->post('emailUser'),
        );
        return $this->db->update('utilizadores' , $camposBaseDados);
    }

    public function email_igual($id){
        $this->db->where("emailUser",$this->input->post('emailUser'));
        $this->db->where("idUser",$id);
        $resultado = $this->db->get("utilizadores");
        if($resultado->num_rows() >= 1) {
            return true;
        }
        else return false;
    }

    public function verificar_emaill($id){
        $this->db->where("emailUser",$this->input->post('emailUser'));
        $this->db->where('idUser !=' , $id);
        $resultado = $this->db->get("utilizadores");
        if($resultado->num_rows() >= 1) {
            return false ;
        }
        else return true ;
    }
}