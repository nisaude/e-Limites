<?php

class CadUsuario_Model extends Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function lista() {  
        $result=$this->db->select('select id,nome from usuario order by nome');
		
	$result = json_encode($result);
		
	echo $result;
    }

    public function insert() {
	
        $id=$_POST["txtCadUsuarioId"];
        $nome=$_POST["txtCadUsuarioNome"];
        $senha=$_POST["txtCadUsuarioSenha"];
        
        $senha=hash("sha256",$senha);
	
        
       $result=$this->db->select('select id,nome from usuario where id=:par_id',array(":par_id"=>$id));
       
       if(count($result)==0){
        
            $dados=array("id"=>$id,"nome"=>$nome,"senha"=>$senha);

            $this->db->insert('usuario', $dados);
            echo "Dados Inseridos com Sucesso";
       }
       else{
           echo("Usuario [$id] Já cadastrado");
       }
    }
	
    public function del($ra=null) {  
		
        $ra=(int)$ra;
        $this->db->delete('angular.aluno',"ra='$ra'");
	
	echo "Aluno Removido com Sucesso!";
    }
	
    public function loadData() {  
		
	$id=$_POST["idusuario"];
	if($id!=0){	
           
            $result=$this->db->select('select id,nome from usuario where id=:par_id',array(":par_id"=>$id));
            $result = json_encode($result);
            echo($result);
	}
    }
	
    public function save() {
	
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
