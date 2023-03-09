
<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $config['sitename']; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="theme-color" content="<?php echo $config['colorsv']; ?>">
	<link rel="icon" href="<?php echo $config['site']; ?>/assets/images/favicon.png" sizes="32x32">
    <link href="<?php echo $config['site']; ?>/assets/css/fontawesome-all.css" rel="stylesheet">
    <link href="<?php echo $config['site']; ?>/assets/css/prism.css" rel="stylesheet">
    <link href="<?php echo $config['site']; ?>/assets/css/style.css" type="text/css" rel="stylesheet">
	<link href="<?php echo $config['site']; ?>/assets/css/ghpages-materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
	<link href="<?php echo $config['site']; ?>/assets/css/sweetalert2.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="<?php echo $config['site']; ?>/assets/js/jquery.timeago.min.js"></script>
    <script src="<?php echo $config['site']; ?>/assets/js/prism.js"></script>
    <script src="<?php echo $config['site']; ?>/assets/js/lunr.min.js"></script>
    <script src="<?php echo $config['site']; ?>/assets/js/materialize.js"></script>
    <script src="<?php echo $config['site']; ?>/assets/js/init.js"></script>
    <script src="<?php echo $config['site']; ?>/assets/js/sweetalert2.all.min.js"></script>
	<script src="<?php echo $config['site']; ?>/assets/highcharts/code/highcharts.js"></script>
	<script src="<?php echo $config['site']; ?>/assets/highcharts/code/modules/exporting.js"></script>
	<script src="<?php echo $config['site']; ?>/assets/highcharts/code/modules/export-data.js"></script>
	<script src="<?php echo $config['site']; ?>/assets/highcharts/code/js/themes/sunset.js"></script>
    <script src="<?php echo $config['site']; ?>/assets/js/style.js"></script>
  </head>
  <body style="background: #dedede !important;">
  <nav style="background-color: <?php echo $config['colorsv']; ?> !important;">
    <div class="nav-wrapper">
    <div class="container">
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li style="margin-right: 10px;">
			 <div id="resultadoBusquedaX"></div>
			 <input id="busquedaX" style="color: #fff;background: url(<?php echo $config['site']; ?>/images/search.png) 9% 50% no-repeat #00000047;border-bottom: 0px;text-align: center;" autocomplete="off" onKeyUp="buscarX();" id="search" type="search">
			</li>
		<li><a href="<?php echo $config['site']; ?>/index.php?page=home">Inicio</a></li>
		<?php if($user['view_comerciales'] == '1'){ ?>
		<li><a class="dropdown-trigger" href="#!" data-target="gerentes">Comerciales</a></li>
		  <ul id='gerentes' class='dropdown-content' style="height: auto !important;margin-top: 63px;">
		    <li class="header-desplegable-li"><a class="header-desplegable-a" href="<?php echo $config['site']; ?>/index.php?page=gerentes">Buscar</a></li>
			<li class="header-desplegable-li"><a class="header-desplegable-a" href="<?php echo $config['site']; ?>/index.php?page=extra_adds">Añadir subgerente</a></li>
			<li class="divider"></li>
		    <li class="header-desplegable-li"><a class="header-desplegable-a" href="<?php echo $config['site']; ?>/excel/Exportador_comerciales.php">Exportar comerciales</a></li>
		  </ul>
		<?php } ?>
		<li><a class="dropdown-trigger" href="#!" data-target="contratos">Contratos</a></li>
		  <ul id='contratos' class='dropdown-content' style="height: auto !important;margin-top: 63px;">
		    <li class="header-desplegable-li"><a class="header-desplegable-a" href="<?php echo $config['site']; ?>/index.php?page=avisos">Avisos</a></li>
		    <li class="header-desplegable-li"><a class="header-desplegable-a" href="<?php echo $config['site']; ?>/index.php?page=all_contracts">Buscar contratos</a></li>
		    <li class="header-desplegable-li"><a class="header-desplegable-a" href="<?php echo $config['site']; ?>/contrato_nuevo.php">Nuevo contrato</a></li>
		    <li class="header-desplegable-li"><a class="header-desplegable-a" href="<?php echo $config['site']; ?>/index.php?page=produccion">Producción</a></li>
		    <li class="header-desplegable-li"><a class="header-desplegable-a" href="<?php echo $config['site']; ?>/index.php?page=ver_estados">Consultar estados</a></li>
		    <!--li class="header-desplegable-li"><a class="header-desplegable-a" href="<?php echo $config['site']; ?>/index.php?page=importar_contratos">Importar contratos (antigua plantilla)</a></li-->
		    <li class="header-desplegable-li"><a class="header-desplegable-a" href="<?php echo $config['site']; ?>/index.php?page=importar_contratos">Importar contratos (nueva plantilla)</a></li>
		    <?php if($user['view_estados_contratos'] == '1'){ ?>
			<li class="divider"></li>
		    <li class="header-desplegable-li"><a class="header-desplegable-a" href="<?php echo $config['site']; ?>/ic.php">Actualizar estados</a></li>
		    <li class="header-desplegable-li"><a class="header-desplegable-a" href="<?php echo $config['site']; ?>/index.php?page=cambios_de_estado">Cambios de estado</a></li>
		    <?php } ?>
		  </ul>
        <li><a class="dropdown-trigger" href="#!" data-target="voids">Void</a></li>
		  <ul id='voids' class='dropdown-content' style="height: auto !important;margin-top: 63px;">
		    <li class="header-desplegable-li"><a class="header-desplegable-a" href="<?php echo $config['site']; ?>/index.php?page=all_voids">Todos los voids</a></li>
		    <li class="header-desplegable-li"><a class="header-desplegable-a" href="<?php echo $config['site']; ?>/index.php?page=add_void">Nuevo void</a></li>
		  </ul>
        <li><a href="<?php echo $config['site']; ?>/index.php?page=exportar">Exportar</a></li>
		<?php if($user['view_pagos'] == '1'){ ?>
		<li><a class="dropdown-trigger" href="#!" data-target="fase3">Pagos</a></li>
		  <ul id='fase3' class='dropdown-content' style="height: auto !important;margin-top: 63px;">
		    <li class="header-desplegable-li"><a class="header-desplegable-a" href="<?php echo $config['site']; ?>/index.php?page=pagos">Gerentes</a></li>
		    <li class="header-desplegable-li"><a class="header-desplegable-a" href="#">Comisiones</a></li>
		    <li class="header-desplegable-li"><a class="header-desplegable-a" href="#">Pagos</a></li>
		  </ul>
		<?php } ?>
		<li><a class="dropdown-trigger" href="#!" data-target="user_<?php echo $user['username']; ?>"><b><?php echo $user['nombre']; ?></b></a></li>
		  <ul id='user_<?php echo $user['username']; ?>' class='dropdown-content' style="height: auto !important;margin-top: 63px;">
		    <li><a href="<?php echo $config['site']; ?>/index.php?page=settings">Ajustes</a></li>
		    <li><a href="<?php echo $config['site']; ?>/logout.php">Salir</a></li>
		  </ul>
      </ul>
    </div>
    </div>
  </nav>

  <ul class="sidenav" id="mobile-demo">
    <li><a href="sass.html">Sass</a></li>
    <li><a href="badges.html">Components</a></li>
    <li><a href="collapsible.html">Javascript</a></li>
    <li><a href="mobile.html">Mobile</a></li>
  </ul>
	<br>
	<div id="cargarmensajesxd"></div>
	<div class="container">
     
	 
  <div class="fixed-action-btn click-to-toggle">
    <a class="btn-floating btn-large" style="background-color: #9C213C !important;">
      <i class="material-icons" style="color: #fff !important;">info</i>
    </a>
    <ul>
      <li class="tooltipped" data-position="left" data-delay="50" data-tooltip="Buscar avisos"><a class="btn-floating red modal-trigger" href="#veravisos"><i class="material-icons">warning</i></a></li>
	  <li class="tooltipped" data-position="top" data-delay="50" data-tooltip="Contratos importados"><a class="btn-floating red modal-trigger" href="#contratosimportados"><i class="material-icons">search</i></a></li>
      <!--li class="tooltipped" data-position="top" data-delay="50" data-tooltip="I am a tooltip"><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
      <li class="tooltipped" data-position="top" data-delay="50" data-tooltip="I am a tooltip"><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
      <li class="tooltipped" data-position="top" data-delay="50" data-tooltip="I am a tooltip"><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li-->
    </ul>
  </div>
  
  <div id="contratosimportados" class="modal modal-fixed-footer">
    <div class="modal-content">
      <div class="row">
		<div class="col s12 m12">
		  <div class="card" style="box-shadow: none;text-align: center;">
            <div class="card-content grey-text">
			 <input id="busquedaCI" style="background: #eaeaea;border-bottom: 0px;text-align: center;" autocomplete="off" onKeyUp="buscar_contratosCI();" id="search" type="search">
			 <div id="resultadoBusquedaCI"></div>
            </div>
          </div>
		</div>
      </div>
	  
<script>
function myFunction() {
	// Declare variables
	var input, filter, ul, li, a, i;
	input = document.getElementById('myInput');
	filter = input.value.toUpperCase();
	ul = document.getElementById("myUL");
	li = ul.getElementsByTagName('li');

	// Loop through all list items, and hide those who don't match the search query
	for (i = 0; i < li.length; i++) {
		a = li[i].getElementsByTagName("a")[0];
		if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
			li[i].style.display = "";
		} else {
			li[i].style.display = "none";
		}
	}
}
</script>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Cerrar consulta</a>
    </div>
  </div>
  
  <div id="veravisos" class="modal modal-fixed-footer">
    <div class="modal-content">
      <div class="row">
		<div class="col s12 m12">
		  <div class="card" style="box-shadow: none;text-align: center;">
            <div class="card-content grey-text">
			 <input id="busquedaVA" style="background: #eaeaea;border-bottom: 0px;text-align: center;" autocomplete="off" onKeyUp="buscar_contratosVA();" id="search" type="search">
			 <div id="resultadoBusquedaVA"></div>
            </div>
          </div>
		</div>
      </div>
	  
<script>
function myFunction() {
	// Declare variables
	var input, filter, ul, li, a, i;
	input = document.getElementById('myInput');
	filter = input.value.toUpperCase();
	ul = document.getElementById("myUL");
	li = ul.getElementsByTagName('li');

	// Loop through all list items, and hide those who don't match the search query
	for (i = 0; i < li.length; i++) {
		a = li[i].getElementsByTagName("a")[0];
		if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
			li[i].style.display = "";
		} else {
			li[i].style.display = "none";
		}
	}
}
</script>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Cerrar consulta</a>
    </div>
  </div>
  
<!--div class="preloader-background">
  <div class="preloader-wrapper big active">
    <div class="spinner-layer spinner-red-only">
      <div class="circle-clipper left">
        <div class="circle"></div>
      </div><div class="gap-patch">
        <div class="circle"></div>
      </div><div class="circle-clipper right">
        <div class="circle"></div>
      </div>
    </div>
  </div>
</div-->

<script>
$(document).ready(function() {
$("#cargarmsgchatx").load("assets/GET/chat.php");
var refreshId = setInterval(function() {
$("#cargarmsgchatx").load('assets/GET/chat.php?randval='+ Math.random());
}, 1000);
$.ajaxSetup({ cache: false });
});

$(document).ready(function() {
$("#count_contratos").load("assets/GET/count_contratos.php");
var refreshId = setInterval(function() {
$("#count_contratos").load('assets/GET/count_contratos.php?randval='+ Math.random());
}, 30000);
$.ajaxSetup({ cache: false });
});

$(document).ready(function() {
$("#comercialestotal").load("assets/GET/comercialestotal.php");
var refreshId = setInterval(function() {
$("#comercialestotal").load('assets/GET/comercialestotal.php?randval='+ Math.random());
}, 120000);
$.ajaxSetup({ cache: false });
});

$(document).ready(function() {
$("#count_contratos_voids").load("assets/GET/count_contratos_voids.php");
var refreshId = setInterval(function() {
$("#count_contratos_voids").load('assets/GET/count_contratos_voids.php?randval='+ Math.random());
}, 3000);
$.ajaxSetup({ cache: false });
});

$(document).ready(function() {
$("#count_cig").load("assets/GET/count_cig.php");
var refreshId = setInterval(function() {
$("#count_cig").load('assets/GET/count_cig.php?randval='+ Math.random());
}, 3000);
$.ajaxSetup({ cache: false });
});

$(document).ready(function() {
$("#avisillos").load("assets/GET/avisos.php");
var refreshId = setInterval(function() {
$("#avisillos").load('assets/GET/avisos.php?randval='+ Math.random());
}, 1000);
$.ajaxSetup({ cache: false });
});
</script>
<?php if($_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] == ''. $_SERVER['SERVER_ADDR'] .'/alertas'){} else { ?>
<!--div id="avisillos"></div-->
<?php } ?>