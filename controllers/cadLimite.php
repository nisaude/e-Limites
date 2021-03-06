<?php

class cadLimite extends Controller{
    
    function __construct() {
        parent::__construct();
        Auth::autentica();
        $this->view->js = array('views/cadLimite/limite.js');
    }
    
    function index() {
        Session::init();
	Session::set("itemativo","cadLimites");
        $this->view->title = 'e-Limites - Cadastrar Limite';
	$this->view->render('header');
        $this->view->render('cadLimite/index');
	$this->view->render('footer');
        
    }
    
    function insert() {
        $this->model->insert();
    }
    
    function lista() {
        $this->model->lista();
    }
	
    function del($ra=null) {
        $this->model->del($ra);
    }

    function loadCEP() {
        $this->model->loadCEP();
    }
    
    function loadLogradouro() {
        $this->model->loadLogradouro();
    }
	
    function save() {
        $this->model->save();
    }
    
    function buscaUnidades() {
        $this->model->buscaUnidades();
    }
}