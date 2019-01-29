<?php

class cadLimite_model extends Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function lista() {  
        
        $result=$this->db->select('select id,cep,logradouro,num_inicial,num_final,bairro,unidade,area,micro_area from limite order by id');	
        $result = json_encode($result);
	echo $result;
    }
	
    public function del($ra=null) {  
		
        $ra=(int)$ra;
        $this->db->delete('angular.aluno',"ra='$ra'");

        echo "Aluno Removido com Sucesso!";
    }
	
    public function loadData() {  
	
        $cep = $_POST["cepLimite"];
	if($cep!=0){	
           
            $result=$this->db->select('select id,cep,logradouro,num_inicial,num_final,bairro,unidade,area,micro_area,lado from limite where cep=:par_cep',array(":par_cep"=>$cep));
            $result = json_encode($result);
            echo($result);
	}
    }
	
    public function salvar() { //insert
		
       
        
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
    
    public function buscaUnidades() {
        $resultado_unidades=$this->db->select('select cnes, descricao from unidade order by descricao');
		
	$resultado_unidades = json_encode($resultado_unidades);
		
	echo $resultado_unidades;
    }
}
