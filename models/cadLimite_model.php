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
	
    public function loadCEP() {  
	
        $cep = $_POST["cepLimite"];
	if($cep!=0){	
            $result=$this->db->select('select id,cep,logradouro,num_inicial,num_final,bairro,unidade,area,micro_area,lado from limite where cep=:par_cep',array(":par_cep"=>$cep));
            $result = json_encode($result);
            echo($result);
	}
    }
    
    public function loadLogradouro() {  
	
        $logradouro = $_POST["lograLimite"];
        if(!empty($logradouro)){ //Se não é vazio	
            $result=$this->db->select('select id,cep,logradouro,num_inicial,num_final,bairro,unidade,area,micro_area,lado from limite where lower(logradouro)=lower(:par_logradouro)',array(":par_logradouro"=>$logradouro));
            $result = json_encode($result);
            echo($result);
	}
    }
    
    public function del($ra=null) {  
	/*	
        $ra=(int)$ra;
        $this->db->delete('angular.aluno',"ra='$ra'");

        echo "Aluno Removido com Sucesso!";*/
    }
	
    public function insert() { //INCLUIR NOVO LIMITE
	
        //PROTEÇÃO CONTRA INJECTION - consiste em injetar scripts maliciosos, fazendo com que a página vulnerável fique a controle do atacante
        $POST = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        
        $CEP = $POST["txtCadCEP"];
        //$CEP = "'$CEP'";
        $IBGE = $POST["txtIBGE"];
        $logradouro = $POST["txtLogradouro"];
        //$logradouro = "'$logradouro'";
        $num_inicial = $POST["txtNumIni"];
        $num_final = $POST["txtNumFim"];
        $lado = $POST["cbbLado"];
        $bairro = $POST["txtBairro"];
        $cidade = $POST["txtCidade"];
        $unidade = $POST["unidades"];
        $uf = $POST["txtUF"];
        $area = $POST["txtArea"];
        $micro_area = $POST["txtMicroArea"];
        //echo "$CEP","$IBGE","$logradouro","$num_inicial","$num_final","$lado","$bairro","$cidade","$unidade","$uf","$area","$micro_area";
        
        $result= $this->db->select('select cep,logradouro from limite where cep=:par_cep and logradouro=:par_logradouro',array("par_cep"=>$CEP, "par_logradouro"=>$logradouro));
        
        if(count($result)==0){
        
            $dados=array("cep"=>$CEP,"IBGE"=>$IBGE,"logradouro"=>$logradouro,"num_inicial"=>$num_inicial,"num_final"=>$num_final,"lado"=>$lado,"bairro"=>$bairro,
                "cidade"=>$cidade,"unidade"=>$unidade,"uf"=>$uf,"area"=>$area,"micro_area"=>$micro_area);

            $this->db->insert('limite', $dados);
            echo "Dados Inseridos com Sucesso!";
       }
       else{
           echo("Limite de CEP $CEP e Logradouro $logradouro já cadastrado!");
       }
        
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
