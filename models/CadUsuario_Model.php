<?php

class CadUsuario_Model extends Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function lista() {  
        
        $result=$this->db->select('select id,nome,senha from usuario order by id');
			
        $result = json_encode($result);
		
	echo $result;
    }
    
    public function salvar() { //insert
		
        /*
	php://input --> permite ler os dados do corpo da requisicao http
	No angular os dados são passados como json no corpo do http
	*/
	
	$usuario = json_decode(file_get_contents('php://input'),true);     
		          
        $this->db->insert('angular.usuario', array('nome'=>$usuario[".Nome"],
                          'senha'=>$usuario[".Senha"]));
        
        echo "Dados Inseridos com Sucesso";
    }  
}
