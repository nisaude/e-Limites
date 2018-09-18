<?php

class cadastro extends Controller{
    
    function __construct() {
        parent::__construct();
        //Auth::autentica();
        $this->view->js = array('cadastro/limite.js');
	$this->view->angularApp="LimitesApp";
    }
    
    function index() {
        Session::init();
	Session::set("itemativo","cadastro");
        $this->view->title = 'e-Limites - Cadastrar';
	$this->view->render('header');
        $this->view->render('cadastro/index');
	$this->view->render('footer');
    }
    
    function insert(){
        $this->model->insert();
    }
    
    function lista(){
        $this->model->lista();
    }
	
    function del($ra=null){
        $this->model->del($ra);
    }
	
    function loadData($ra=null){
        $this->model->loadData($ra);
    }
	
    function save(){
        $this->model->save();
    }
}