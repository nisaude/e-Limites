<?php

class Cadastro_Model extends Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function lista() {  
        
        $result=$this->db->select('select id,cep,logradouro,num_inicial,num_final,bairro,unidade,area,micro_area from angular.limite order by id');
			
        $result = json_encode($result);
		
	echo $result;
    }
	
    public function del($ra=null) {  
		
        $ra=(int)$ra;
        $this->db->delete('angular.aluno',"ra='$ra'");

        echo "Aluno Removido com Sucesso!";
    }
	
    public function loadData($ra=null) {  
		
        $ra=(int)$ra;
        if($ra!=0){	
            //alterei aqui tambem para retornar o nome dos 
            //campos de acordo com os nomes definidos no ng-model
            $result=$this->db->select('select ra as Ra,nome as Nome,endereco as End from angular.aluno where ra=:ra',array(":ra"=>$ra));
            $result = json_encode($result);
            echo($result);
        }
    }
	
    public function salvar() { //insert
		
        /*
	php://input --> permite ler os dados do corpo da requisicao http
	No angular os dados são passados como json no corpo do http
	*/
	
	$limite = json_decode(file_get_contents('php://input'),true);     
		        
        //$this->db->insert('angular.limite', array('ra' =>$aluno["Ra"],'nome'=>$aluno["Nome"],'endereco'=>$aluno["End"]));
        
        $this->db->insert('angular.limite', array('cep'=>$cep["Cep"],'logradouro'=>$logradouro["Logradouro"],'num_inicial'=>$num_inicial["NumIni"],
                          'num_final'=>$num_final["NumFim"],'bairro'=>$bairro["Bairro"],'unidade'=>$unidade["Unidade"],'area'=>$area["Area"],
                          'micro_area'=>$micro_area["MicroArea"]));
        
        echo "Dados Inseridos com Sucesso";
    }    
    
    public function save() {  //EDITAR
	
        $limite = json_decode(file_get_contents('php://input'),true);     
		
	//$ra=(int)$aluno["Ra"];
	$cep=$limite["Cep"];
	$logradouro=$limite["Logradouro"];
        $num_inicial=$limite["NumIni"];
        $num_final=$limite["NumFim"];
        $bairro=$limite["Bairro"];
        $unidade=$limite["Unidade"];
        $area=$limite["Area"];
        $micro_area=$limite["MicroArea"];
	
	$dadosSave=array('cep'=>$cep,'logradouro'=>$logradouro,'num_inicial'=>$num_inicial,'num_final'=>$num_final,'bairro'=>$bairro,'unidade'=>$unidade,'area'=>$area,'micro_area'=>$micro_area);
		
	//print_r($limite);		        
        $this->db->update('angular.aluno', $dadosSave,"ra='$ra'");
        echo "Dados gravados com Sucesso";   
    }   
}
