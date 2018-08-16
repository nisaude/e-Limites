<?php

class Index extends Controller {

    function __construct() {
	Auth::autentica();
        parent::__construct();
	$this->view->js = array('views/index/lib.js');
    }
    
    function index() {
	
        Session::init();
	Session::set("itemativo","quadra");
        
        $this->view->title = 'Controller Index';
	$this->view->render('header');
        $this->view->render('index/index');
	$this->view->render('footer');
    }
}