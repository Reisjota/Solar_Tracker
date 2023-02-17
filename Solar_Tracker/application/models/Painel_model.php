<?php 

class painel_model extends CI_Model{

    // 1
    public function numero_registos(){
        $query = $this->db->query('SELECT * FROM dadospainel ORDER BY idDado DESC');
        return intval($query->row()->idDado);
    }

    public function voltagem_media(){
        $voltagem = 0;
        $query = $this->db->query("SELECT * FROM dadospainel");

        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $voltagem = $voltagem + floatval($row->voltagemPainel);
            }
        }

        return floatval($voltagem / $this->painel_model->numero_registos());
    }

    public function movimentos_verticais(){
        $query = $this->db->query('SELECT * FROM dadospainel ORDER BY idDado DESC');
        return intval($query->row()->numeroMovimentosVertical);
    }

    public function movimentos_horizontais(){
        $query = $this->db->query('SELECT * FROM dadospainel ORDER BY idDado DESC');
        return intval($query->row()->numeroMovimentosHorizontal);
    }

    public function voltagem_segunda(){
        $query = $this->db->query('SELECT SUM(voltagemPainel) as soma FROM dadosPainel WHERE WEEKDAY(dataDados) = 0 AND YEARWEEK(datadados) = YEARWEEK(NOW());');
        return floatval($query->row()->soma);
    }

    public function voltagem_terça(){
        $query = $this->db->query('SELECT SUM(voltagemPainel) as soma FROM dadosPainel WHERE WEEKDAY(dataDados) = 1 AND YEARWEEK(datadados) = YEARWEEK(NOW());');
        return floatval($query->row()->soma);
    }

    public function voltagem_quarta(){
        $query = $this->db->query('SELECT SUM(voltagemPainel) as soma FROM dadosPainel WHERE WEEKDAY(dataDados) = 2 AND YEARWEEK(datadados) = YEARWEEK(NOW());');
        return floatval($query->row()->soma);
    }

    public function voltagem_quinta(){
        $query = $this->db->query('SELECT SUM(voltagemPainel) as soma FROM dadosPainel WHERE WEEKDAY(dataDados) = 3 AND YEARWEEK(datadados) = YEARWEEK(NOW());');
        return floatval($query->row()->soma);
    }

    public function voltagem_sexta(){
        $query = $this->db->query('SELECT SUM(voltagemPainel) as soma FROM dadosPainel WHERE WEEKDAY(dataDados) = 4 AND YEARWEEK(datadados) = YEARWEEK(NOW());');
        return floatval($query->row()->soma);
    }

    public function voltagem_sabado(){
        $query = $this->db->query('SELECT SUM(voltagemPainel) as soma FROM dadosPainel WHERE WEEKDAY(dataDados) = 5 AND YEARWEEK(datadados) = YEARWEEK(NOW());');
        return floatval($query->row()->soma);
    }

    public function voltagem_domingo(){
        $query = $this->db->query('SELECT SUM(voltagemPainel) as soma FROM dadosPainel WHERE WEEKDAY(dataDados) = 6 AND YEARWEEK(datadados) = YEARWEEK(NOW());');
        return floatval($query->row()->soma);
    }

    public function voltagem_janeiro(){
        $query = $this->db->query('SELECT SUM(voltagemPainel) as soma FROM dadosPainel WHERE MONTHNAME(dataDados) = "January" AND YEAR(dataDados) = YEAR(CURDATE());');
        return floatval($query->row()->soma);
    }

    public function voltagem_fevereiro(){
        $query = $this->db->query('SELECT SUM(voltagemPainel) as soma FROM dadosPainel WHERE MONTHNAME(dataDados) = "February" AND YEAR(dataDados) = YEAR(CURDATE());');
        return floatval($query->row()->soma);
    }

    public function voltagem_março(){
        $query = $this->db->query('SELECT SUM(voltagemPainel) as soma FROM dadosPainel WHERE MONTHNAME(dataDados) = "March" AND YEAR(dataDados) = YEAR(CURDATE());');
        return floatval($query->row()->soma);
    }

    public function voltagem_abril(){
        $query = $this->db->query('SELECT SUM(voltagemPainel) as soma FROM dadosPainel WHERE MONTHNAME(dataDados) = "April" AND YEAR(dataDados) = YEAR(CURDATE());');
        return floatval($query->row()->soma);
    }

    public function voltagem_maio(){
        $query = $this->db->query('SELECT SUM(voltagemPainel) as soma FROM dadosPainel WHERE MONTHNAME(dataDados) = "May" AND YEAR(dataDados) = YEAR(CURDATE());');
        return floatval($query->row()->soma);
    }

    public function voltagem_junho(){
        $query = $this->db->query('SELECT SUM(voltagemPainel) as soma FROM dadosPainel WHERE MONTHNAME(dataDados) = "June" AND YEAR(dataDados) = YEAR(CURDATE());');
        return floatval($query->row()->soma);
    }

    public function voltagem_julho(){
        $query = $this->db->query('SELECT SUM(voltagemPainel) as soma FROM dadosPainel WHERE MONTHNAME(dataDados) = "July" AND YEAR(dataDados) = YEAR(CURDATE());');
        return floatval($query->row()->soma);
    }

    public function voltagem_agosto(){
        $query = $this->db->query('SELECT SUM(voltagemPainel) as soma FROM dadosPainel WHERE MONTHNAME(dataDados) = "August" AND YEAR(dataDados) = YEAR(CURDATE());');
        return floatval($query->row()->soma);
    }

    public function voltagem_setembro(){
        $query = $this->db->query('SELECT SUM(voltagemPainel) as soma FROM dadosPainel WHERE MONTHNAME(dataDados) = "September" AND YEAR(dataDados) = YEAR(CURDATE());');
        return floatval($query->row()->soma);
    }

    public function voltagem_outubro(){
        $query = $this->db->query('SELECT SUM(voltagemPainel) as soma FROM dadosPainel WHERE MONTHNAME(dataDados) = "October" AND YEAR(dataDados) = YEAR(CURDATE());');
        return floatval($query->row()->soma);
    }

    public function voltagem_novembro(){
        $query = $this->db->query('SELECT SUM(voltagemPainel) as soma FROM dadosPainel WHERE MONTHNAME(dataDados) = "November" AND YEAR(dataDados) = YEAR(CURDATE());');
        return floatval($query->row()->soma);
    }

    public function voltagem_dezembro(){
        $query = $this->db->query('SELECT SUM(voltagemPainel) as soma FROM dadosPainel WHERE MONTHNAME(dataDados) = "December" AND YEAR(dataDados) = YEAR(CURDATE());');
        return floatval($query->row()->soma);
    }
}