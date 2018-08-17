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
	
    
    <!-- Morris Charts JavaScript 
    <script src="<?=URL?>public/bs/js/morris/raphael.min.js"></script>
    <script src="<?=URL?>public/bs/js/morris/morris.min.js"></script>
    <script src="<?=URL?>public/bs/js/morris/morris-data.js"></script>-->
   
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
      
       
   


    