<?php

class CadUsuario extends Controller{
    
    function __construct() {
        parent::__construct();
        
        Auth::autentica();
        $this->view->js = array('views/cadUsuario/usuario.js');//Inicia o javascript
        //$this->view->angularApp = "LimitesApp";
    }
    
    function index() {
        Session::init();
        Session::set("itemativo","cadUsuarios");
        $this->view->title = 'e-Limites - Cadastrar Usuário';
        $this->view->render('header');
        $this->view->render('cadUsuario/index');
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
	
    function edit() {
        $this->model->edit();
    }
}
