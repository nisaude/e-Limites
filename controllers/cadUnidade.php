<?php

class cadUnidade extends Controller {
    
    function __construct() {
        parent::__construct();
        
        Auth::autentica();
        $this->view->js = array('views/cadUnidade/unidade.js');
    }
    
    function index() {
        Session::init();
        Session::set("itemativo","cadUnidades");
        $this->view->title = 'e-Limites - Cadastrar Unidade';
        $this->view->render('header');
        $this->view->render('cadUnidade/index');
        $this->view->render('footer');
    }
    
    function insert() {
        $this->model->insert();
    }
    
    function lista() {
        $this->model->lista();
    }
	
    function del() {
        $this->model->del();
    }
	
    function loadData() {
        $this->model->loadData();
    }
	
    function update() {
        $this->model->update();
    }
}
