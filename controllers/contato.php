<?php

class Contato extends Controller {

    function __construct() {
        parent::__construct();
		 //$this->view->js = array('public/bs/js/ckeditor/ckeditor.js','views/cadastro/lib.js');
    }
    
    function index() {
		Session::init();
		Session::set("itemativo","contato");
		$this->view->title = 'UNIMAR - Contato';
		$this->view->render('header');
        $this->view->render('contato/index');
		$this->view->render('footer');
    }
}