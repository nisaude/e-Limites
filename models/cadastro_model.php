<?php

class Cadastro_Model extends Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    function inserir(){
    
        /* INSERT SQL
         * INSERT INTO limite (cep, logradouro, num_inicial, num_final, bairro, unidade, area, micro_area) 
         * VALUES ('17.500-000','Rua dos Testes','0','100','Jardim Teste','USF Aeroporto','B','12');
         */
        
        $this->db->insert("INSERT INTO limite (cep, logradouro, num_inicial, num_final, bairro, unidade, area, micro_area) VALUES ('17.500-000','Rua dos Testes','0','100','Jardim Teste','USF Aeroporto','B','12');");
        
    /*  php://input --> permite ler os dados do corpo da requisicao http
	No angular os dados são passados como json no corpo do http */
        
        $limite = json_decode(file_get_contents('php://input'),true);
        
        $this->db->insert('angular.limite', array('cep' =>$limite["CEP"],'logradouro'=>$limite["Logradouro"],'num_inicial'=>$limite["NumIni"]));
        echo "Dados Inseridos com Sucesso";
    }
}
