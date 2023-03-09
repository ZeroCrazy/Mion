<?php
  require 'inc/core.php';
  if (isset($_SESSION['id'])) {} else {
  	header("Location: ". $config[site] ."/login.php");
  }
  $page = "Inicio";
  require 'templates/header.php';
?>

<body>
	<!-- Inicio del panel de administración -->
	
	
	<?php if($_GET['page'] == 'home'){ ?>
	  <?php require 'pages/home.php'; ?>
	<?php } ?>
	
	<!-- demo -->
	<?php if($_GET['page'] == 'demo_add_contr'){ ?>
	  <?php require 'pages/demo_add_contr.php'; ?>
	<?php } ?>
	<!-- demo -->
	
	<?php if($_GET['page'] == 'avisos'){ ?>
	  <?php require 'pages/avisos.php'; ?>
	<?php } ?>
	
	<?php if($_GET['page'] == 'menu'){ ?>
	  <?php require 'pages/menu.php'; ?>
	<?php } ?>
	
	<?php if($_GET['page'] == 'pagos'){ ?>
	  <?php require 'pages/pagos.php'; ?>
	<?php } ?>
	
	<?php if($_GET['page'] == 'produccion'){ ?>
	  <?php require 'pages/produccion.php'; ?>
	<?php } ?>
	
	<?php if($_GET['page'] == 'importar_contratos'){ ?>
	  <?php require 'pages/importar_contratos.php'; ?>
	<?php } ?>
	
	<?php if($_GET['page'] == 'importar_contratos_nuevos'){ ?>
	  <?php require 'pages/importar_contratos_nuevos.php'; ?>
	<?php } ?>
	
	<?php if($_GET['page'] == 'ver_estados'){ ?>
	  <?php require 'pages/ver_estados.php'; ?>
	<?php } ?>
	
	<?php if($_GET['page'] == 'extra_adds'){ ?>
	  <?php require 'pages/extra_adds.php'; ?>
	<?php } ?>
	
	<?php if($_GET['page'] == 'settings'){ ?>
	  <?php require 'pages/settings.php'; ?>
	<?php } ?>
	
	<?php if($_GET['page'] == 'cambios_de_estado'){ ?>
	  <?php require 'pages/cambios_de_estado.php'; ?>
	<?php } ?>
	
	<?php if($_GET['page'] == 'all_voids'){ ?>
	  <?php require 'pages/all_voids.php'; ?>
	<?php } ?>
	
	<?php if($_GET['page'] == 'edit_void_id'){ ?>
	  <?php require 'pages/edit_void_id.php'; ?>
	<?php } ?>

	<?php if($_GET['page'] == 'add_contract'){ ?>
	  <?php require 'pages/add_contract.php'; ?>
	<?php } ?>

	<?php if($_GET['page'] == 'add_void'){ ?>
	  <?php require 'pages/add_void.php'; ?>
	<?php } ?>

	<?php if($_GET['page'] == 'all_contracts'){ ?>
	  <?php require 'pages/all_contracts.php'; ?>
	<?php } ?>

	<?php if($_GET['page'] == 'edit_contract_id'){ ?>
	  <?php require 'pages/edit_contract_id.php'; ?>
	<?php } ?>
	
	<?php if($_GET['page'] == 'gerentes'){ ?>
	  <?php require 'pages/gerentes.php'; ?>
	<?php } ?>
	
	<?php if($_GET['page'] == 'edit_gerente'){ ?>
	  <?php require 'pages/edit_gerente.php'; ?>
	<?php } ?>
	
	<?php if($_GET['page'] == 'exportar'){ ?>
	  <?php require 'pages/exportar.php'; ?>
	<?php } ?>
	
	<?php if($_GET['page'] == 'create_new_user'){ ?>
	  <?php require 'pages/create_new_user.php'; ?>
	<?php } ?>
	
	<?php if($_GET['page'] == 'new_cig'){ ?>
	  <?php require 'pages/new_cig.php'; ?>
	<?php } ?>
	
	
  </body>
</html>