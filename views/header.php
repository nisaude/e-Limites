<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Diego Fassion">
    <title><?=$this->title;?></title>
    
    <!-- favicon -->
    <link href="<?=URL?>public/bs/img/favicon.ico" rel="shortcut icon" />
       
    <!-- Bootstrap Core CSS -->
    <link href="<?=URL?>public/bs/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?=URL?>public/bs/css/sb-admin.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="<?=URL?>public/bs/css/plugins/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?=URL?>public/bs/css/main.css" rel="stylesheet">
    
    <!-- Icones -->
    <link href="<?=URL?>public/fontawesome-free-5.3.1-web/css/all.css" rel="stylesheet">
    <!-- Lista de icones: https://fontawesome.com/icons?d=gallery&m=free -->
	
    <!--<script src="<?=URL?>public/bs/js/jquery.min.js"></script>-->
    <script src="<?=URL?>public/bs/js/jquery-1.12.3.min.js"></script>
    <script src="<?=URL?>public/bs/js/bootstrap.min.js"></script>
    <<script src="<?=URL?>public/bs/js/common.js"></script>

    <?php 
	Session::init();
	$itemativo=Session::get("itemativo");
	$consulta="";
        $cadLimites="";
        $cadUsuarios="";
        $cadUnidades="";
	$contatos="";
	switch($itemativo){
            case "consulta":$consulta="active"; break;
            case "cadLimites":$cadLimites="active"; break;
            case "cadUsuarios":$cadUsuarios="active";break;
            case "cadUnidades":$cadUnidades="active";break;
            case "contatos":$contatos="active"; break;
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
                </button>    
                <a class="navbar-brand" href="<?php echo(URL);?>" >e-Limites</a>
            </div>
            <!-- Top Menu Itens -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Usuário <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?=URL?>login"><i class="fa fa-fw fa-power-off"></i> Sair </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="<?=$consulta?>">
                        <a href="<?php echo(URL);?>"><i class="fas fa-search"></i> Consultar Limites</a>
                    </li>
                    <?php 
                        Session::init();
                        $logado=Session::get("logado");
                        if($logado==true){   
                    ?>
                            <li class="<?=$cadLimites?>">
                                <a href="<?=URL?>cadLimite/index"><i class="fas fa-map-marker-alt"></i> Cadastrar Limites</a>
                            </li>   
                            <li class="<?=$cadUsuarios?>">
                                <a href="<?=URL?>cadUsuario/index"><i class="fa fa-user"></i> Cadastrar Usuário</a>
                            </li>   
                            <li class="<?=$cadUnidades?>">
                                <a href="<?=URL?>cadUnidade/index"><i class="fas fa-plus-square"></i> Cadastrar Unidade</a>
                            </li>  
                    <?php  
                        }
                    ?>
                            <li class="<?=$contatos?>">
                                <a href="<?=URL?>contato/index"><i class="fas fa-phone"></i> Contatos</a>
                            </li>
                </ul>
            </div>
        </nav>
   


    