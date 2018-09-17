<?php

class cadastro extends Controller{
    
    function __construct() {
        parent::__construct();
        //Auth::autentica();
        $this->view->js = array('cadastro/js/limites.js');
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
}
