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
		
        $ra=(int)$ra;
        $this->db->delete('angular.aluno',"ra='$ra'");

        echo "Aluno Removido com Sucesso!";
    }
	
    public function insert() { //INCLUIR NOVO LIMITE
	/*	
        $CEP = $_POST["txtCadCEP"];
        $IBGE = $_POST["txtIBGE"];
        $lograduro = $_POST["txtLogradouro"];
        $num_inicial = $_POST["txtNumIni"];
        $num_final = $_POST["txtNumFim"];
        $lado = $_POST["cbbUnidade"];
        $bairro = $_POST["txtBairro"];
        $cidade = $_POST["txtCidade"];
        $unidade = $_POST["unidades"];
        $uf = $_POST["txtUF"];
        $area = $_POST["txtArea"];
        $micro_area = $_POST["txtMicroArea"];
        */
        $result = "Teste";
        //$result= $this->db->select('select cep,logradouro from limite where lower(cep)=lower(:par_cep) and lower(logradouro)=lower(:par_logradouro)', array("par_cep"=>$CEP, "par_logradouro"=>$lograduro));
        echo($result);
        /*
        if(count($result)==0){
        
            $dados=array("cnes"=>$CNES,"descricao"=>$descricao,"cep"=>$cep,"endereco"=>$endereco,"bairro"=>$bairro,"cidade"=>$cidade);

            $this->db->insert('unidade', $dados);
            echo "Dados Inseridos com Sucesso!";
       }
       else{
           echo("Unidade [$CNES] já cadastrado!");
       }*/
        
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
