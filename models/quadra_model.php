<?php

class Quadra_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    
	public function lista() 
    {  
        $result=$this->db->select('select id,img,nome,descricao from instalacoes');
		
		
		$result = json_encode($result);
		
		
		print_r($result);
    }
	
	
	function getDescricao($q){
		$result=$this->db->select('select descricao from instalacoes where id=:par_id',array(":par_id"=>$q));
				
		return $result[0]->descricao;
		
	}

	function getNome($qn){
		$result=$this->db->select('select nome from instalacoes where id=:par_id',array(":par_id"=>$qn));
				
		return $result[0]->nome;
		
	}
	
	
	public function listaEventos($q)
    {
		$result = $this->db->select("select id, 'Reserva' as title,date_format(hora_inicial,'%Y-%m-%dT%H:%i') as start,date_format(hora_final,'%Y-%m-%dT%H:%i') as fim from agenda where id_quadra=:quadra",array(":quadra"=>$q));

       
    $event_array=array();
    foreach($result as $k=>$v){
        $cor='#D46A6A';
        
        $event_array[] = array(
            'id' => $v->id,
            'title' => $v->title,
            'start' => $v->start,
            'end'   => $v->fim,
            'color'=> $cor
        );


    }
        $result = json_encode($event_array);


        echo $result;
    }
	
	public function gravaReserva()
    {	
		$di=new DateTime($_POST["di"]);
		$df=new DateTime($_POST["df"]);
		$q=(int)$_POST["quadra"];
		$dif=$df->diff($di);
		$dif=$dif->h+(($dif->i)/60);
		if(($dif > 0)&&($dif<=12)){
			$arr=array(":dtf"=>$df->format("Y-m-d H:i"),":quadra"=>$q);
			
			$result=$this->db->select("select id from agenda where id_quadra=:quadra and :dtf between hora_inicial and hora_final",$arr);
			if(count($result)==0){
			
				$arr=array("hora_inicial"=>$_POST["di"],"hora_final"=>$_POST["df"],"ra"=>"1234567","id_quadra"=>$q);
				$this->db->insert("agenda",$arr);
				echo("Horário Reservado");
			}
			else{
				echo("Horário Inválido");
			}
		}
		else{
			echo("Horário Inválido");
		}
	}
	
}