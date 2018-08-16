<?php

class Cadastro extends Controller {

    function __construct() {
        parent::__construct();
		 $this->view->js = array('public/bs/js/ckeditor/ckeditor.js','views/cadastro/lib.js');
    }
    
    function index() {
		Session::init();
		Session::set("itemativo","cadastro");
		$this->view->title = 'UNIMAR - Cadastros';
		$this->view->render('header');
        $this->view->render('cadastro/index');
		$this->view->render('footer');
    }
}