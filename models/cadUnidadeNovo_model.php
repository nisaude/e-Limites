<?php

class cadUnidadeNovo_model extends Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function lista() {
        $result= $this->db->select('select cnes, descricao, cep, endereco, bairro, cidade from unidade order by descricao');
        
        $result = json_encode($result);
		
	echo $result;
    }
    
    public function loadData() { //Chamada no botão editar 
		
	$cnes = $_POST["cnesunidade"];
	if($cnes!=0){	
           
            $result=$this->db->select('select cnes, descricao, cep, endereco, bairro, cidade from unidade where cnes=:par_cnes',array(":par_cnes"=>$cnes));
            $result = json_encode($result);
            echo($result);
	}
    }
    
    public function insert() {
        
        $CNES = $_POST["txtCadUnidCNES"];
        $descricao = $_POST["txtCadUnidDesc"];
        $cep = $_POST["txtCadUnidCEP"];
        $endereco = $_POST["txtCadUnidEnd"];
        $bairro = $_POST["txtCadUnidBairro"];
        $cidade = $_POST["txtCadUnidCidade"];
        
        $result= $this->db->select('select cnes from unidade where cnes=:par_cnes', array("par_cnes"=>$CNES));
        
        if(count($result)==0){
        
            $dados=array("cnes"=>$CNES,"descricao"=>$descricao,"cep"=>$cep,"endereco"=>$endereco,"bairro"=>$bairro,"cidade"=>$cidade);

            $this->db->insert('unidade', $dados);
            echo "Dados Inseridos com Sucesso!";
       }
       else{
           echo("Unidade [$CNES] já cadastrado!");
       }
    }
}
