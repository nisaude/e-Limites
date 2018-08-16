<?php

class Alunos extends Controller {

    function __construct() {
        parent::__construct();
       // Auth::autentica();
        $this->view->js = array('alunos/js/alunos.js');
		$this->view->angularApp="AlunosApp";
    }
    
    function index() {
        $this->view->title = 'Cadastro de Alunos';
		$this->view->render('header');
        $this->view->render('alunos/index');
		$this->view->render('footer');
    }
     function insert()
    {
        $this->model->insert();
    }
	function lista()
    {
        $this->model->lista();
    }
	
	function del($ra=null)
    {
        $this->model->del($ra);
    }
	
	
	function loadData($ra=null)
    {
        $this->model->loadData($ra);
    }
	
	function save()
    {
        $this->model->save();
    }
}