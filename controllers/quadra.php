<?php
date_default_timezone_set("America/Sao_Paulo");
class Quadra extends Controller {

    function __construct() {
        parent::__construct();
		 $this->view->js = array('public/bs/js/dialog/bootstrap-dialog.min.js','public/bs/js/moment.min.js','public/bs/js/fullcalendar.min.js','public/bs/js/locale-all.js','views/quadra/lib.js');
		 $this->view->css = array('public/bs/css/fullcalendar.css','public/bs/js/dialog/bootstrap-dialog.min.css');
		 
		
    }
    
    function index($q) {
		$this->view->idQuadra=(int)$q;	
		$this->quadra=$q;
	    $this->view->descricao=$this->model->getDescricao((int)$q);		
		$this->view->nome=$this->model->getNome((int)$q);	
		Session::init();
		Session::set("itemativo","quadra");
        $this->view->title = 'UNIMAR - Quadra';
		$this->view->render('header');
        $this->view->render('quadra/index');
		$this->view->render('footer');
    }
	
	function lista(){
		
		$this->model->lista();
		
	}
	
	public function listaEventos($q)
    {	
		$q=(int)$q;
		$this->model->listaEventos($q);
	}
	
	public function gravaReserva()
    {	
		$this->model->gravaReserva();
	}
}