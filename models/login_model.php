<?php

class Login_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
	
	function login(){
		
		$usuario=$_POST["txtusuario"];
		$senha=$_POST["txtsenha"];
		
		$result=$this->db->select("select id,nome from usuario where nome=:par_nome and senha=sha2(:par_senha,256)",array(":par_nome"=>$usuario,":par_senha"=>$senha));
		
		if(count($result)>0){
			Session::init();
			Session::set("logado",true);
			echo("1");			
		}
		else{
			echo("0");
		}
		
	}
	
	
	
}