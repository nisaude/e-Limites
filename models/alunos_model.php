<?php

class Alunos_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    
	public function lista() 
    {  
        $result=$this->db->select('select ra,nome,endereco from angular.aluno order by nome');
		
		
		$result = json_encode($result);
		
		
		echo $result;
    }
	

    public function insert() 
    {
		
		/*
		 php://input --> permite ler os dados do corpo da requisicao http
		 No angular os dados são passados como json no corpo do http
		*/
	
		$aluno = json_decode(file_get_contents('php://input'),true);
	     
		        
        $this->db->insert('angular.aluno', array('ra' =>$aluno["Ra"],'nome'=>$aluno["Nome"],'endereco'=>$aluno["End"]));
       echo "Dados Inseridos com Sucesso";
    }
	
	public function del($ra=null) 
    {  
		
		$ra=(int)$ra;
        $this->db->delete('angular.aluno',"ra='$ra'");
		
		echo "Aluno Removido com Sucesso!";
	}
	
	public function loadData($ra=null) 
    {  
		
		$ra=(int)$ra;
		if($ra!=0){	
			//alterei aqui tambem para retornar o nome dos 
			//campos de acordo com os nomes definidos no ng-model
			$result=$this->db->select('select ra as Ra,nome as Nome,endereco as End from angular.aluno where ra=:ra',array(":ra"=>$ra));
			$result = json_encode($result);
			echo($result);
		}
	}
	
	
	public function save() 
    {
		$aluno = json_decode(file_get_contents('php://input'),true);
	     
		
		$ra=(int)$aluno["Ra"];
		$nome=$aluno["Nome"];
		$end=$aluno["End"];
		
		$dadosSave=array('nome'=>$nome,'endereco'=>$end);
		
		//print_r($aluno);		        
       $this->db->update('angular.aluno', $dadosSave,"ra='$ra'");
       echo "Dados gravados com Sucesso";
	   
    }
}