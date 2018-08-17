<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?=$this->title;?></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?=URL?>public/bs/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?=URL?>public/bs/css/sb-admin.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="<?=URL?>public/bs/css/plugins/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?=URL?>bs/css/main.css">
	
	<!--<script src="<?=URL?>public/bs/js/jquery.min.js"></script>-->
	<script src="<?=URL?>public/bs/js/jquery-1.12.3.min.js"></script>
	<script src="<?=URL?>public/bs/js/bootstrap.min.js"></script>
   
    <?php 
	Session::init();
	$itemativo=Session::get("itemativo");
	$cadastro="";
	$consulta="";
	$contato="";
	switch($itemativo){
		case "cadastro":$cadastro="active";break;
		case "quadra":$consulta="active";break;
		case "contato":$contato="active";break;
	}
        
        if (isset($this->js)) {
            foreach ($this->js as $js){
                echo '<script type="text/javascript" src="'.URL.$js.'"></script>';
                echo("\n");
            }   
        }
	
	if (isset($this->css)) {
            foreach ($this->css as $css) {
                echo '<link rel="stylesheet" href="'.URL.$css.'">';
		echo("\n");
            }
        }
    ?>
</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo(URL);?>" >e-Limites</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Usuário <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?=URL?>login"><i class="fa fa-fw fa-power-off"></i> Sair</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="<?=$consulta?>">
                        <a href="<?php echo(URL);?>"><i class="fa fa-fw fa-dashboard"></i> Consulta Limites <i class="fa fa-fw fa-caret-down"></i></a>
                    </li>
		    <li class="<?=$cadastro?>">
                        <a href="<?=URL?>cadastro/index"><i class="fa fa-fw fa-file"></i> Cadastros</a>
                    </li>
                    <li class="<?=$contato?>">
                        <a href="<?=URL?>contato/index"><i class="fa fa-fw fa-file"></i> Contatos</a>
                    </li>
                </ul>
            </div>
        </nav>
   


    