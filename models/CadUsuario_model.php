<?php

class CadUsuario_model extends Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function lista() {  
        $result=$this->db->select('select id,nome from usuario order by id');
		
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
	
    public function del() {  
		
        $id = $_POST["idusuario"];
	        
        if($id!=0){	
           
            $result=$this->db->delete("usuario", "id=".$id);
            
            echo("Usuário removido com sucesso!");
	}
    }
	
    public function loadData() {  
		
	$id = $_POST["idusuario"];
	if($id!=0){	
            $result=$this->db->select('select id,nome from usuario where id=:par_id',array(":par_id"=>$id));
            $result = json_encode($result);
            echo($result);
	}
    }
	
    public function edit() {
	
        $id=$_POST["txtCadUsuarioId"];
        $nome=$_POST["txtCadUsuarioNome"];
        $senha=$_POST["txtCadUsuarioSenha"];
        
        $senha=hash("sha256",$senha);
        
        $dados=array('id'=>$id, 'nome'=>$nome, 'senha'=>$senha);
        
        $this->db->update('usuario', $dados,"id='$id'");
        
        echo("Usuário alterado com sucesso!");
        
    }
}
