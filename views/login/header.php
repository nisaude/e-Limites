<!DOCTYPE html>
<html ng-app="LimitesApp" lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?=$this->title;?></title>
    
    <!-- favicon -->
    <link rel="shortcut icon" href="public/bs/img/favicon.ico" />
      
    <!-- Bootstrap Core CSS -->
    <link href="<?=URL?>public/bs/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    
    <!-- Morris Charts CSS -->
    <link href="<?=URL?>public/bs/css/plugins/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?=URL?>bs/css/main.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
    <!-- Icones -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="<?=URL?>fontawesome-free-5.3.1-web/css/font-awesome.min.css" rel="stylesheet">
    <!-- Lista de icones: https://fontawesome.com/icons?d=gallery&m=free -->
    
    <!--<script src="<?=URL?>public/bs/js/jquery.min.js"></script>-->
    <script src="<?=URL?>public/bs/js/jquery-1.12.3.min.js"></script>
    <script src="<?=URL?>public/bs/js/bootstrap.min.js"></script>
	<!--
    <a href="javascript:newPopup()">Abrir popup</a>  -->
   
    <?php 
	Session::init();
	$itemativo=Session::get("itemativo");
	$cadastro="";
	$quadra="";
	$contato="";
	switch($itemativo){
		case "cadastro":$cadastro="active";break;
		case "quadra":$quadra="active";break;
		case "contato":$contato="active";break;
		
	}
        if (isset($this->js)) {
            foreach ($this->js as $js) {
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
      
       
   


    