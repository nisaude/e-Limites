<?php

class Login extends Controller {

    function __construct() {
        parent::__construct();
        
        $this->view->js = array('views/login/lib.js');	
    }
    
    function index() {
        Session::init();
	Session::destroy();
        $this->view->title = 'controller Login';
	$this->view->render('login/header');
        $this->view->render('login/index');
	$this->view->render('login/footer');
    }
	
    function login(){
        $this->model->login();
    }
}