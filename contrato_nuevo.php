<?php
	require 'inc/core.php';
	if (isset($_SESSION['id'])) {} else {
		header("Location: ". $config[site] ."/login.php");
	}
?>
<!doctype html>
<html lang="en">
  <head>
	<title><?php echo $config[sitename]; ?>: Crear nuevo contrato</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php echo $site; ?>/assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<link href="<?php echo $config['site']; ?>/assets/css/sweetalert2.min.css" type="text/css" rel="stylesheet" media="screen,projection">
	  <script src="<?php echo $config['site']; ?>/assets/js/sweetalert2.all.min.js"></script>
	<style>
	body {
		background: #ececec;
	}
	</style>
  </head>
  <body>
	<div class="container">
<?php if($_GET['action'] == 'new'){} else { ?>
<?php
if (isset($_POST['procedercontrato'])) {
	mysql_query("UPDATE cigs SET num = num+1 WHERE id = '1'");
	$cigsql = mysql_query("SELECT * FROM cigs WHERE id='1'");$n = mysql_fetch_assoc($cigsql);
	if($n[num] == ''){
		$numero = '1';
	} else {
		$numero = $n[num]++;
		$numero++;
	}
	if (mysql_num_rows($cigsql) == 0) {
		'001';
		$nnuummeerroo = '00' . $numero;
	} elseif($n[num] <= 9){
		'00' . $numero;
		$nnuummeerroo = '00' . $numero;
	} elseif($numero <= 99){
		'0' . $numero;
		$nnuummeerroo = '0' . $numero;
	} else {
		$numero;
		$nnuummeerroo = $numero;
	}
	$cig = "118". date(y) . date(m) . date(d) ."1". $nnuummeerroo ."";
	mysql_query("INSERT INTO contratos (user_contrato_intro,intro_dia,intro_mes,intro_ano,cig) VALUES ('$user[username]','". date(d) ."','". date(m) ."','". date(Y) ."','$cig')");
	$cid_sql = mysql_query("SELECT * FROM contratos WHERE user_contrato_intro='$user[username]' ORDER BY id DESC LIMIT 1");$cid = mysql_fetch_assoc($cid_sql);
	echo '<meta http-equiv="refresh" content="0;URL='. $config[site] .'/contrato_nuevo.php?action=new&id='. $cid[id] .'">';
}
?>
	  <br><br><br><br><br><br><br><br>
	  <div class="mx-auto" style="width: 200px;">
	    <form method="POST">
		  <button type="submit" name="procedercontrato" class="btn btn-success" style="padding: 60px 20px;border-radius: 50%;border: 2px solid rgba(0, 0, 0, 0.4);">Nuevo contrato</button>
		</form>
	  </div>
<?php } ?>
<?php if($_GET['action'] == 'new'){
$cid_sql = mysql_query("SELECT * FROM contratos WHERE id='". Filter($_GET[id]) ."' ORDER BY id DESC LIMIT 1");$cid = mysql_fetch_assoc($cid_sql);
if (mysql_num_rows($cid_sql) == 0){
	echo '
<div style="position: absolute;width: 100%;height: 100%;top: 0%;left: 0%;z-index: 10;background: rgba(0, 0, 0, 0.8);">
<div class="mx-auto" style="width: 300px;color: #fff;">
<br><br><br><br><br><br><br><br><br>
<h1>Oops...</h1>
<p>Ha surgido un error...</p>
<p>En 10 segundos serás redireccionado</p>
</div>
</div>
<SCRIPT LANGUAGE="JavaScript"> 
<!-- 
function KeyPress() { 
} 
document.onkeydown = KeyPress; 
//--> 
</SCRIPT> 
	';
	echo '<meta http-equiv="refresh" content="10;URL='. $config[site] .'/contrato_nuevo.php">';
}
if (isset($_POST['tipo_contrato_negocios'])) {
	$tipo_contrato_negocios = $_POST['tipo_contrato_negocios'];
	mysql_query("UPDATE contratos SET tipo_contrato='$tipo_contrato_negocios', formula='', formula1='', formula2='', funciona='' WHERE id='$_GET[id]'");
	echo '<meta http-equiv="refresh" content="0;URL='. $config[site] .'/contrato_nuevo.php?action=new&id='. $cid[id] .'">';
}
if (isset($_POST['tipo_contrato_hogares'])) {
	$tipo_contrato_hogares = $_POST['tipo_contrato_hogares'];
	mysql_query("UPDATE contratos SET tipo_contrato='$tipo_contrato_hogares', formula='', formula1='', formula2='', funciona='' WHERE id='$_GET[id]'");
	echo '<meta http-equiv="refresh" content="0;URL='. $config[site] .'/contrato_nuevo.php?action=new&id='. $cid[id] .'">';
}
if (isset($_POST['formula_luz'])) {
	$formula_luz = $_POST['formula_luz'];
	mysql_query("UPDATE contratos SET formula='$formula_luz', formula1='', formula2='', funciona='' WHERE id='$_GET[id]'");
	echo '<meta http-equiv="refresh" content="0;URL='. $config[site] .'/contrato_nuevo.php?action=new&id='. $cid[id] .'">';
}
if (isset($_POST['formula_marca'])) {
	$formula_marca = $_POST['formula_marca'];
	mysql_query("UPDATE contratos SET formula='$formula_marca', formula1='', funciona='' WHERE id='$_GET[id]'");
	echo '<meta http-equiv="refresh" content="0;URL='. $config[site] .'/contrato_nuevo.php?action=new&id='. $cid[id] .'">';
}
if (isset($_POST['formula_gas'])) {
	$formula_gas = $_POST['formula_gas'];
	mysql_query("UPDATE contratos SET formula='$formula_gas', formula1='', formula2='', funciona='' WHERE id='$_GET[id]'");
	echo '<meta http-equiv="refresh" content="0;URL='. $config[site] .'/contrato_nuevo.php?action=new&id='. $cid[id] .'">';
}
if (isset($_POST['formula_compromisoluz'])) {
	$formula_compromisoluz = $_POST['formula_compromisoluz'];
	mysql_query("UPDATE contratos SET formula='$formula_compromisoluz', formula1='', formula2='', funciona='' WHERE id='$_GET[id]'");
	echo '<meta http-equiv="refresh" content="0;URL='. $config[site] .'/contrato_nuevo.php?action=new&id='. $cid[id] .'">';
}
if (isset($_POST['formula_dual'])) {
	$formula_dual = $_POST['formula_dual'];
	mysql_query("UPDATE contratos SET formula='$formula_dual', formula1='', formula2='', funciona='' WHERE id='$_GET[id]'");
	echo '<meta http-equiv="refresh" content="0;URL='. $config[site] .'/contrato_nuevo.php?action=new&id='. $cid[id] .'">';
}
if (isset($_POST['formula_maxahorro'])) {
	$formula_maxahorro = $_POST['formula_maxahorro'];
	mysql_query("UPDATE contratos SET formula='$formula_maxahorro', formula1='', formula2='', funciona='' WHERE id='$_GET[id]'");
	echo '<meta http-equiv="refresh" content="0;URL='. $config[site] .'/contrato_nuevo.php?action=new&id='. $cid[id] .'">';
}
if (isset($_POST['formula_planahorro'])) {
	$formula_planahorro = $_POST['formula_planahorro'];
	mysql_query("UPDATE contratos SET formula='$formula_planahorro', formula1='dual', formula2='', funciona='' WHERE id='$_GET[id]'");
	echo '<meta http-equiv="refresh" content="0;URL='. $config[site] .'/contrato_nuevo.php?action=new&id='. $cid[id] .'">';
}
if (isset($_POST['formula_sinmaxahorro'])) {
	$formula_sinmaxahorro = $_POST['formula_sinmaxahorro'];
	mysql_query("UPDATE contratos SET formula1='$formula_sinmaxahorro', formula2='', funciona='' WHERE id='$_GET[id]'");
	echo '<meta http-equiv="refresh" content="0;URL='. $config[site] .'/contrato_nuevo.php?action=new&id='. $cid[id] .'">';
}
if (isset($_POST['formula_conmaxahorro'])) {
	$formula_conmaxahorro = $_POST['formula_conmaxahorro'];
	mysql_query("UPDATE contratos SET formula1='$formula_conmaxahorro', formula2='', funciona='' WHERE id='$_GET[id]'");
	echo '<meta http-equiv="refresh" content="0;URL='. $config[site] .'/contrato_nuevo.php?action=new&id='. $cid[id] .'">';
}
if (isset($_POST['formula_conmaxahorro_luz'])) {
	$formula_conmaxahorro_luz = $_POST['formula_conmaxahorro_luz'];
	mysql_query("UPDATE contratos SET formula2='$formula_conmaxahorro_luz', funciona='' WHERE id='$_GET[id]'");
	echo '<meta http-equiv="refresh" content="0;URL='. $config[site] .'/contrato_nuevo.php?action=new&id='. $cid[id] .'">';
}
if (isset($_POST['formula_conmaxahorro_dual'])) {
	$formula_conmaxahorro_dual = $_POST['formula_conmaxahorro_dual'];
	mysql_query("UPDATE contratos SET formula2='$formula_conmaxahorro_dual', funciona='' WHERE id='$_GET[id]'");
	echo '<meta http-equiv="refresh" content="0;URL='. $config[site] .'/contrato_nuevo.php?action=new&id='. $cid[id] .'">';
}
if (isset($_POST['formula_sinmaxahorro_luz'])) {
	$formula_sinmaxahorro_luz = $_POST['formula_sinmaxahorro_luz'];
	mysql_query("UPDATE contratos SET formula2='$formula_sinmaxahorro_luz', funciona='' WHERE id='$_GET[id]'");
	echo '<meta http-equiv="refresh" content="0;URL='. $config[site] .'/contrato_nuevo.php?action=new&id='. $cid[id] .'">';
}
if (isset($_POST['formula_sinmaxahorro_gas'])) {
	$formula_sinmaxahorro_gas = $_POST['formula_sinmaxahorro_gas'];
	mysql_query("UPDATE contratos SET formula2='$formula_sinmaxahorro_gas', funciona='' WHERE id='$_GET[id]'");
	echo '<meta http-equiv="refresh" content="0;URL='. $config[site] .'/contrato_nuevo.php?action=new&id='. $cid[id] .'">';
}
if (isset($_POST['formula_sinmaxahorro_dual'])) {
	$formula_sinmaxahorro_dual = $_POST['formula_sinmaxahorro_dual'];
	mysql_query("UPDATE contratos SET formula2='$formula_sinmaxahorro_dual', funciona='' WHERE id='$_GET[id]'");
	echo '<meta http-equiv="refresh" content="0;URL='. $config[site] .'/contrato_nuevo.php?action=new&id='. $cid[id] .'">';
}
if (isset($_POST['funciona_si'])) {
	$funciona_si = $_POST['funciona_si'];
	mysql_query("UPDATE contratos SET funciona='$funciona_si', cod_verificacion_posterior='verificacion' WHERE id='$_GET[id]'");
	echo '<meta http-equiv="refresh" content="0;URL='. $config[site] .'/contrato_nuevo.php?action=new&id='. $cid[id] .'">';
}
if (isset($_POST['funciona_no'])) {
	$funciona_no = $_POST['funciona_no'];
	mysql_query("UPDATE contratos SET funciona='$funciona_no', cod_verificacion_posterior='verificacion' WHERE id='$_GET[id]'");
	echo '<meta http-equiv="refresh" content="0;URL='. $config[site] .'/contrato_nuevo.php?action=new&id='. $cid[id] .'">';
}
if (isset($_POST['codv_si'])) {
	$codv_si = $_POST['codv_si'];
	mysql_query("UPDATE contratos SET cod_verificacion_posterior='$codv_si' WHERE id='$_GET[id]'");
	echo '<meta http-equiv="refresh" content="0;URL='. $config[site] .'/contrato_nuevo.php?action=new&id='. $cid[id] .'">';
}
if (isset($_POST['codv_no'])) {
	$codv_no = $_POST['codv_no'];
	mysql_query("UPDATE contratos SET cod_verificacion_posterior='$codv_no' WHERE id='$_GET[id]'");
	echo '<meta http-equiv="refresh" content="0;URL='. $config[site] .'/contrato_nuevo.php?action=new&id='. $cid[id] .'">';
}
?>
<br>
<div class="container">
  <div class="row">
	<?php if($cid['fecha_venta']){ ?>
	<div style="position: fixed;z-index: 9999;left: 1%;">
	<p>
	  <a class="btn btn-primary" data-toggle="collapse" href="#moreinfo" role="button" aria-expanded="false" aria-controls="collapseExample">
		<i class="fas fa-info"></i>
	  </a>
	</p>
	<div class="collapse" id="moreinfo" style="margin-left: 60px;">
	  <div class="card card-body">
		<?php if($cid['plan_destino_luz'] == ''){ ?><?php echo $cid['plan_destino_gas']; ?><?php } else { ?><?php echo $cid['plan_destino_luz']; ?><?php } ?><hr>
		<b>Introductor:</b> <?php echo $cid['user_contrato_intro']; ?><hr>
		<b>Fecha introducido:</b> <?php echo date("d/m/Y H:i", $cid['fecha_contrato_intro']); ?><hr>
		<?php if($cid['cod_verificacion_posterior'] == 'verificacion'){
			echo '<b>VERIFICACIÓN</b>';
		} else {
			echo '<b>POSTERIOR</b>';
		} ?><hr>
		<b>Estado:</b> <?php echo $cid['estado_contrato']; ?>
	  </div>
	</div>
	</div>
	
	<div style="position: fixed;z-index: 9999;left: 1%;top: 10%;">
	<p>
	  <a class="btn btn-danger" data-toggle="collapse" href="#deletecontrato" role="button" aria-expanded="false" aria-controls="collapseExample">
		<i class="far fa-trash-alt"></i>
	  </a>
	</p>
	<div class="collapse" id="deletecontrato" style="margin-left: 60px;">
	  <div class="card card-body">
		<center><b>ELIMINAR CONTRATO</b></center>
		<hr>
		Estás a punto de eliminar el contrato de <?php echo $cid['nombre_titular']; ?>.<br>¿Estás seguro de hacerlo? El cambio se guardará en el historial.<br>
		<br>
		<?php
		if (isset($_POST['eliminar_contrato'])) {
			mysql_query("DELETE FROM contratos WHERE id='$cid[id]'");
			echo '<meta http-equiv="refresh" content="0;URL='. $config[site] .'/contrato_nuevo.php">';
		}
		?>
		<center>
		  <form method="POST">
			<button type="submit" name="eliminar_contrato" class="btn btn-danger">Eliminar definitivamente</button>
		  </form>
		</center>
	  </div>
	</div>
	</div>
	
	<div style="position: fixed;z-index: 9999;left: 1%;top: 17%;">
	<p>
	  <a class="btn btn-warning" data-toggle="collapse" href="#convertvoid" role="button" aria-expanded="false" aria-controls="collapseExample">
		<i class="fas fa-exclamation-triangle"></i>
	  </a>
	</p>
	<div class="collapse" id="convertvoid" style="margin-left: 60px;">
	  <div class="card card-body">
		<center><b>CONVERTIR EN VOID</b></center>
		<hr>
<?php
if (isset($_POST["convertir_void"])) {
	$motivo = $_POST["motivo"];
	mysql_query("INSERT INTO contratos_voids (fecha_venta,gerente,subgerente,oficina,codigo_comercial,nombre_titular,apellidos_titular,dni_cif_titular,plan_destino_luz,plan_destino_gas,plan_destino_fun,cups_luz,cups_gas,cod_verificacion_posterior,cod_verificacion,cig,estado,motivo,we_dia,we_mes,we_ano,intro_dia,intro_mes,intro_ano,intro_user,telefono_pref_1,tipo_contrato,formula,formula1,formula2,funciona,vers_funciona,modal_funciona,subgerente2) VALUES ('". substr($cid['fecha_venta'], -4, 4) . '-' . substr($cid['fecha_venta'], -7, 2) . '-' . substr($cid['fecha_venta'], -10, 2) ."','$cid[gerente]','$cid[subgerente]','$cid[oficina]','$cid[codigo_comercial]','$cid[nombre_titular]','$cid[apellidos_titular]','$cid[dni_cif_titular]','$cid[plan_destino_luz]','$cid[plan_destino_gas]','$cid[plan_destino_fun]','$cid[cups_luz]','$cid[cups_gas]','$cid[cod_verificacion_posterior]','$cid[cod_verificacion]','$cid[cig]','','$motivo','$cid[we_dia]','$cid[we_mes]','$cid[we_ano]','$cid[intro_dia]','$cid[intro_mes]','$cid[intro_ano]','$cid[user_contrato_intro]','$cid[telefono_pref_1]','$cid[tipo_contrato]','$cid[formula]','$cid[formula1]','$cid[formula2]','$cid[funciona]','$cid[vers_funciona]','$cid[modal_funciona]','$cid[subgerente2]')");
	mysql_query("DELETE FROM contratos WHERE id='$cid[id]'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/contrato_nuevo.php?action=new&id='. $cid[id] .'";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
?>
		Estás apunto de convertir el contrato de <?php echo $cid['nombre_titular']; ?> en un void..<br> para ello tendrás que poner un motivo válido.<br><br>
		<center>
		  <form method="POST">
			<div class="input-group mb-3">
			  <div class="input-group-prepend">
				<span class="input-group-text" id="motivovoid">Motivo</span>
			  </div>
			  <input type="text" name="motivo" class="form-control" placeholder="Introduce el motivo del void..." aria-label="Username" aria-describedby="motivovoid" required>
			</div>
			<button type="submit" name="convertir_void" class="btn btn-warning">Proceder conversión</button>
		  </form>
		</center>
	  </div>
	</div>
	</div>
	<?php } ?>
	
		
	<div style="position: fixed;z-index: 9999;left: 1%;top: 25%;">
	<p>
	  <a class="btn btn-info" href="<?php echo $site; ?>/" role="button">
		<i class="fas fa-long-arrow-alt-left"></i>
	  </a>
	</p>
	</div>

	
	<div class="col-6">
	  <form method="POST">
		<button type="submit" name="tipo_contrato_negocios" value="NEGOCIOS" class="<?php if($cid['tipo_contrato'] == 'NEGOCIOS'){ echo 'btn btn-danger'; }else{ echo'btn btn-dark'; } ?>" style="width: 100%;" role="button">NEGOCIOS</button>
	  </form>
	</div>
	<div class="col-6">
	  <form method="POST">
		<button type="submit" name="tipo_contrato_hogares" value="HOGARES" class="<?php if($cid['tipo_contrato'] == 'HOGARES'){ echo 'btn btn-danger'; }else{ echo'btn btn-dark'; } ?>" style="width: 100%;" role="button">HOGARES</button>
	  </form>
	</div>
	<?php if($cid['tipo_contrato']){ ?>
	<br><br>
	<div class="col-<?php if($cid['tipo_contrato'] == 'NEGOCIOS'){ ?>1<?php } else { ?>2<?php } ?>">
	  <form method="POST">
	    <button type="submit" name="formula_luz" value="luz" class="<?php if($cid['formula'] == 'luz'){ echo 'btn btn-danger'; }else{ echo 'btn btn-dark'; } ?>" style="width: 100%;" role="button">LUZ</button>
	  </form>
	</div>
	<div class="col-2">
	  <form method="POST">
		<button type="submit" name="formula_marca" value="marca" class="<?php if($cid['formula'] == 'marca'){ echo 'btn btn-danger'; }else{ echo'btn btn-dark'; } ?>" style="width: 100%;" role="button">CARREFOUR</button>
	  </form>
	</div>
	<div class="col-<?php if($cid['tipo_contrato'] == 'NEGOCIOS'){ ?>1<?php } else { ?>2<?php } ?>">
	  <form method="POST">
		<button type="submit" name="formula_gas" value="gas" class="<?php if($cid['formula'] == 'gas'){ echo 'btn btn-danger'; }else{ echo'btn btn-dark'; } ?>" style="width: 100%;" role="button">GAS</button>
	  </form>
	</div>
	<?php if($cid['tipo_contrato'] == 'NEGOCIOS'){ ?>
	<div class="col-2">
	  <form method="POST">
		<button type="submit" name="formula_compromisoluz" value="compromisoluz" class="<?php if($cid['formula'] == 'compromisoluz'){ echo 'btn btn-danger'; }else{ echo'btn btn-dark'; } ?>" style="width: 100%;" role="button">COMPROMISO LUZ</a>
	  </form>
	</div>
	<?php } ?>
	<div class="col-2">
	  <form method="POST">
		<button type="submit" name="formula_dual" value="dual" class="<?php if($cid['formula'] == 'dual'){ echo 'btn btn-danger'; }else{ echo'btn btn-dark'; } ?>" style="width: 100%;" role="button">DUAL</a>
	  </form>                 
	</div>                    
	<div class="col-2">       
	  <form method="POST">    
		<button type="submit" name="formula_maxahorro" value="maxahorro" class="<?php if($cid['formula'] == 'maxahorro'){ echo 'btn btn-danger'; }else{ echo'btn btn-dark'; } ?>" style="width: 100%;" role="button">MÁXIMO AHORRO</a>
	  </form>                 
	</div>                    
	<div class="col-2">       
	  <form method="POST">    
		<button type="submit" name="formula_planahorro" value="planahorro" class="<?php if($cid['formula'] == 'planahorro'){ echo 'btn btn-danger'; }else{ echo'btn btn-dark'; } ?>" style="width: 100%;" role="button">PLAN AHORRO</a>
	  </form>
	</div>
	<?php if($cid['formula'] == 'compromisoluz'){ ?>
	<br><br>
	<div class="col-6">
	  <form method="POST">
		<button type="submit" name="funciona_si" value="si" class="<?php if($cid['funciona'] == 'si'){ echo 'btn btn-danger'; }else{ echo'btn btn-dark'; } ?>" style="width: 100%;" role="button"><b>CON</b> FUNCIONA</button>
	  </form>
	</div>
	<div class="col-6">
	  <form method="POST">
		<button type="submit" name="funciona_no" value="no" class="<?php if($cid['funciona'] == 'no'){ echo 'btn btn-danger'; }else{ echo'btn btn-dark'; } ?>" style="width: 100%;" role="button"><b>SIN</b> FUNCIONA</button>
	  </form>
	</div>
	<?php } ?>
	<?php if($cid['formula'] == 'luz'){ ?>
	<br><br>
	<div class="col-6">
	  <form method="POST">
		<button type="submit" name="funciona_si" value="si" class="<?php if($cid['funciona'] == 'si'){ echo 'btn btn-danger'; }else{ echo'btn btn-dark'; } ?>" style="width: 100%;" role="button"><b>CON</b> FUNCIONA</button>
	  </form>
	</div>
	<div class="col-6">
	  <form method="POST">
		<button type="submit" name="funciona_no" value="no" class="<?php if($cid['funciona'] == 'no'){ echo 'btn btn-danger'; }else{ echo'btn btn-dark'; } ?>" style="width: 100%;" role="button"><b>SIN</b> FUNCIONA</button>
	  </form>
	</div>
	<?php } ?>
	<?php if($cid['formula'] == 'dual'){ ?>
	<br><br>
	<div class="col-6">
	  <form method="POST">
		<button type="submit" name="formula_sinmaxahorro" value="sinmaxahorro" class="<?php if($cid['formula1'] == 'sinmaxahorro'){ echo 'btn btn-danger'; }else{ echo'btn btn-dark'; } ?>" style="width: 100%;" role="button"><b>SIN</b> MÁXIMO AHORRO</button>
	  </form>
	</div>
	<div class="col-6">
	  <form method="POST">
		<button type="submit" name="formula_conmaxahorro" value="conmaxahorro" class="<?php if($cid['formula1'] == 'conmaxahorro'){ echo 'btn btn-danger'; }else{ echo'btn btn-dark'; } ?>" style="width: 100%;" role="button"><b>CON</b> MÁXIMO AHORRO</button>
	  </form>
	</div>
	<?php if($cid['formula1']){ ?>
	<br><br>
	<div class="col-6">
	  <form method="POST">
		<button type="submit" name="funciona_si" value="si" class="<?php if($cid['funciona'] == 'si'){ echo 'btn btn-danger'; }else{ echo'btn btn-dark'; } ?>" style="width: 100%;" role="button"><b>CON</b> FUNCIONA</button>
	  </form>
	</div>
	<div class="col-6">
	  <form method="POST">
		<button type="submit" name="funciona_no" value="no" class="<?php if($cid['funciona'] == 'no'){ echo 'btn btn-danger'; }else{ echo'btn btn-dark'; } ?>" style="width: 100%;" role="button"><b>SIN</b> FUNCIONA</button>
	  </form>
	</div>
	<?php } ?>
	<?php } ?>
	<?php if($cid['formula'] == 'gas'){ ?>
	<br><br>
	<div class="col-6">
	  <form method="POST">
		<button type="submit" name="funciona_si" value="si" class="<?php if($cid['funciona'] == 'si'){ echo 'btn btn-danger'; }else{ echo'btn btn-dark'; } ?>" style="width: 100%;" role="button"><b>CON</b> FUNCIONA</button>
	  </form>
	</div>
	<div class="col-6">
	  <form method="POST">
		<button type="submit" name="funciona_no" value="no" class="<?php if($cid['funciona'] == 'no'){ echo 'btn btn-danger'; }else{ echo'btn btn-dark'; } ?>" style="width: 100%;" role="button"><b>SIN</b> FUNCIONA</button>
	  </form>
	</div>
	<?php } ?>
	<?php if($cid['formula'] == 'maxahorro'){ ?>
	<br><br>
	<div class="col-6">
	  <form method="POST">
		<button type="submit" name="funciona_si" value="si" class="<?php if($cid['funciona'] == 'si'){ echo 'btn btn-danger'; }else{ echo'btn btn-dark'; } ?>" style="width: 100%;" role="button"><b>CON</b> FUNCIONA</button>
	  </form>
	</div>
	<div class="col-6">
	  <form method="POST">
		<button type="submit" name="funciona_no" value="no" class="<?php if($cid['funciona'] == 'no'){ echo 'btn btn-danger'; }else{ echo'btn btn-dark'; } ?>" style="width: 100%;" role="button"><b>SIN</b> FUNCIONA</button>
	  </form>
	</div>
	<?php } ?>
	<?php if($cid['formula'] == 'planahorro'){ ?>
	<br><br>
	<div class="col-6">
	  <form method="POST">
		<button type="submit" name="funciona_si" value="si" class="<?php if($cid['funciona'] == 'si'){ echo 'btn btn-danger'; }else{ echo'btn btn-dark'; } ?>" style="width: 100%;" role="button"><b>CON</b> FUNCIONA</button>
	  </form>
	</div>
	<div class="col-6">
	  <form method="POST">
		<button type="submit" name="funciona_no" value="no" class="<?php if($cid['funciona'] == 'no'){ echo 'btn btn-danger'; }else{ echo'btn btn-dark'; } ?>" style="width: 100%;" role="button"><b>SIN</b> FUNCIONA</button>
	  </form>
	</div>
	<?php } ?>
	<?php if($cid['formula'] == 'marca'){ ?>
	<br><br>
	<div class="col-6">
	  <form method="POST">
		<button type="submit" name="formula_sinmaxahorro" value="sinmaxahorro" class="<?php if($cid['formula1'] == 'sinmaxahorro'){ echo 'btn btn-danger'; }else{ echo'btn btn-dark'; } ?>" style="width: 100%;" role="button"><b>SIN</b> MÁXIMO AHORRO</button>
	  </form>
	</div>
	<div class="col-6">
	  <form method="POST">
		<button type="submit" name="formula_conmaxahorro" value="conmaxahorro" class="<?php if($cid['formula1'] == 'conmaxahorro'){ echo 'btn btn-danger'; }else{ echo'btn btn-dark'; } ?>" style="width: 100%;" role="button"><b>CON</b> MÁXIMO AHORRO</button>
	  </form>
	</div>
	<?php if($cid['formula1'] == 'sinmaxahorro'){ ?>
	<br><br>
	<div class="col-4">
	  <form method="POST">
		<button type="submit" name="formula_sinmaxahorro_luz" value="luz" class="<?php if($cid['formula2'] == 'luz'){ echo 'btn btn-danger'; }else{ echo'btn btn-dark'; } ?>" style="width: 100%;" role="button">LUZ</button>
	  </form>
	</div>
	<div class="col-4">
	  <form method="POST">
		<button type="submit" name="formula_sinmaxahorro_gas" value="gas" class="<?php if($cid['formula2'] == 'gas'){ echo 'btn btn-danger'; }else{ echo'btn btn-dark'; } ?>" style="width: 100%;" role="button">GAS</button>
	  </form>
	</div>
	<div class="col-4">
	  <form method="POST">
		<button type="submit" name="formula_sinmaxahorro_dual" value="dual" class="<?php if($cid['formula2'] == 'dual'){ echo 'btn btn-danger'; }else{ echo'btn btn-dark'; } ?>" style="width: 100%;" role="button">DUAL</button>
	  </form>
	</div>
	<?php if($cid['formula2']){ ?>
	<br><br>
	<div class="col-6">
	  <form method="POST">
		<button type="submit" name="funciona_si" value="si" class="<?php if($cid['funciona'] == 'si'){ echo 'btn btn-danger'; }else{ echo'btn btn-dark'; } ?>" style="width: 100%;" role="button"><b>CON</b> FUNCIONA</button>
	  </form>
	</div>
	<div class="col-6">
	  <form method="POST">
		<button type="submit" name="funciona_no" value="no" class="<?php if($cid['funciona'] == 'no'){ echo 'btn btn-danger'; }else{ echo'btn btn-dark'; } ?>" style="width: 100%;" role="button"><b>SIN</b> FUNCIONA</button>
	  </form>
	</div>
	<?php } ?>
	<?php } ?>
	<?php if($cid['formula1'] == 'conmaxahorro'){ ?>
	<br><br>
	<div class="col-6">
	  <form method="POST">
		<button type="submit" name="formula_conmaxahorro_luz" value="luz" class="<?php if($cid['formula2'] == 'luz'){ echo 'btn btn-danger'; }else{ echo'btn btn-dark'; } ?>" style="width: 100%;" role="button">LUZ</button>
	  </form>
	</div>
	<div class="col-6">
	  <form method="POST">
		<button type="submit" name="formula_conmaxahorro_dual" value="dual" class="<?php if($cid['formula2'] == 'dual'){ echo 'btn btn-danger'; }else{ echo'btn btn-dark'; } ?>" style="width: 100%;" role="button">DUAL</button>
	  </form>
	</div>
	<?php if($cid['formula2']){ ?>
	<br><br>
	<div class="col-6">
	  <form method="POST">
		<button type="submit" name="funciona_si" value="si" class="<?php if($cid['funciona'] == 'si'){ echo 'btn btn-danger'; }else{ echo'btn btn-dark'; } ?>" style="width: 100%;" role="button"><b>CON</b> FUNCIONA</button>
	  </form>
	</div>
	<div class="col-6">
	  <form method="POST">
		<button type="submit" name="funciona_no" value="no" class="<?php if($cid['funciona'] == 'no'){ echo 'btn btn-danger'; }else{ echo'btn btn-dark'; } ?>" style="width: 100%;" role="button"><b>SIN</b> FUNCIONA</button>
	  </form>
	</div>
	<?php } ?>
	<?php } ?>
	<?php } ?>
	<?php } ?>
	<?php if($cid['funciona']){ ?>
	<br><br>
	<div class="col-6">
	  <form method="POST">
		<button type="submit" name="codv_si" value="verificacion" class="<?php if($cid['cod_verificacion_posterior'] == 'verificacion'){ echo 'btn btn-danger'; }else{ echo'btn btn-dark'; } ?>" style="width: 100%;" role="button">CÓDIGO DE <b>VERIFICACIÓN</b></button>
	  </form>
	</div>
	<div class="col-6">
	  <form method="POST">
		<button type="submit" name="codv_no" value="posterior" class="<?php if($cid['cod_verificacion_posterior'] == 'posterior'){ echo 'btn btn-danger'; }else{ echo'btn btn-dark'; } ?>" style="width: 100%;" role="button">CÓDIGO DE VERIFICACIÓN <b>POSTERIOR</b></button>
	  </form>
	</div>
	<?php } ?>
  </div>
</div>
	<br>
	<?php if($cid['cod_verificacion_posterior']){
	if (isset($_POST['guardarcontrato'])) {
		// Subgerente
		$subgerente2 = strtoupper($_POST["subgerente2"]);
		
		// Validador de cuenta bancaria
		$ccc_1 = strtoupper($_POST["ccc_1"]);
		$ccc_2 = strtoupper($_POST["ccc_2"]);
		$ccc_3 = strtoupper($_POST["ccc_3"]);
		$ccc_4 = strtoupper($_POST["ccc_4"]);
		
		// Datos esenciales
		$cod_verificacion = str_replace("V", "", $_POST["cod_verificacion"]);
		$codigo_comercial = strtoupper($_POST["codigo_comercial"]);
		$cg_sql = mysql_query("SELECT * FROM click_comerciales WHERE codigo_interno='$codigo_comercial'");$cg = mysql_fetch_assoc($cg_sql);
		$impl_explicito = strtoupper($_POST["impl_explicito"]);
		$fecha_we = $_POST["fecha_we"];
		$we_dia = substr($fecha_we, 8, 2);
		$we_mes = substr($fecha_we, 5, 2);
		$we_ano = substr($fecha_we, 0, 4);
		$consumo_pyme = $_POST["consumo_pyme"];
		
		// Datos del Cliente
		$nombre_titular = strtoupper(Filter($_POST['nombre_titular']));
		$apellidos_titular = str_replace("'", "", strtoupper(Filter($_POST["apellidos_titular"])));
		$dni_cif_titular = strtoupper($_POST["dni_cif_titular"]);
		$telefono_pref_1 = strtoupper($_POST["telefono_pref_1"]);
		$telefono_pref_2 = strtoupper($_POST["telefono_pref_2"]);
		$correo_electron = strtoupper($_POST["correo_electron"]);
		
		// Datos del Representante
		$representante_nombre = strtoupper(Filter($_POST["representante_nombre"]));
		$representante_apellidos = strtoupper(Filter($_POST["representante_apellidos"]));
		$dni_cif_representante = strtoupper($_POST["dni_cif_representante"]);
		$relacion_representante_titular = strtoupper($_POST["relacion_representante_titular"]);
		
		// Direcciones » Punto de suministro
		$tipo_via_ps = strtoupper($_POST["tipo_via_ps"]);
		$calle_ps = strtoupper(addslashes(Filter($_POST["calle_ps"])));
		$numero_ps = strtoupper($_POST["numero_ps"]);
		$escalera_ps = strtoupper($_POST["escalera_ps"]);
		$piso_ps = strtoupper($_POST["piso_ps"]);
		$letra_ps = strtoupper($_POST["letra_ps"]);
		$cod_postal_ps = strtoupper($_POST["cod_postal_ps"]);
		$poblacion_ps = strtoupper(addslashes($_POST["poblacion_ps"]));
		$municipio_ps_sql = mysql_query("SELECT * FROM contratos_provincias WHERE codigo_postal='". substr($cod_postal_ps, 0, 2) ."'");$municipio_ps = mysql_fetch_assoc($municipio_ps_sql);
		
		// Direcciones » Cliente
		$cliente_tipo_via_otra = strtoupper($_POST["cliente_tipo_via_otra"]);
		$cliente_calle_otra = strtoupper(addslashes(Filter($_POST["cliente_calle_otra"])));
		$cliente_numero_otra = strtoupper($_POST["cliente_numero_otra"]);
		$cliente_escalera_otra = strtoupper($_POST["cliente_escalera_otra"]);
		$cliente_piso_otra = strtoupper($_POST["cliente_piso_otra"]);
		$cliente_letra_otra = strtoupper($_POST["cliente_letra_otra"]);
		$cliente_cod_postal_otra = strtoupper($_POST["cliente_cod_postal_otra"]);
		$cliente_poblacion_otra = strtoupper(addslashes($_POST["cliente_poblacion_otra"]));
		$cliente_municipio_otra_sql = mysql_query("SELECT * FROM contratos_provincias WHERE codigo_postal='". substr($cliente_cod_postal_otra, 0, 2) ."'");$cliente_municipio_otra = mysql_fetch_assoc($cliente_municipio_otra_sql);
		
		// Direcciones » Envío de facturas
		$tipo_via_ef_otra = strtoupper($_POST["tipo_via_ef_otra"]);
		$calle_ef_otra = strtoupper(addslashes(Filter($_POST["calle_ef_otra"])));
		$numero_ef_otra = strtoupper($_POST["numero_ef_otra"]);
		$escalera_ef_otra = strtoupper($_POST["escalera_ef_otra"]);
		$piso_ef_otra = strtoupper($_POST["piso_ef_otra"]);
		$letra_ef_otra = strtoupper($_POST["letra_ef_otra"]);
		$cod_postal_ef_otra = strtoupper($_POST["cod_postal_ef_otra"]);
		$poblacion_ef_otra = strtoupper(addslashes($_POST["poblacion_ef_otra"]));
		$municipio_ef_otra_sql = mysql_query("SELECT * FROM contratos_provincias WHERE codigo_postal='". substr($cod_postal_ef_otra, 0, 2) ."'");$municipio_ef_otra = mysql_fetch_assoc($municipio_ef_otra_sql);
		
		// Datos del Punto de Suministro
		$cups_luz = strtoupper($_POST["cups_luz"]);
		$cups_gas = strtoupper($_POST["cups_gas"]);
		$cnae = strtoupper($_POST["cnae"]);
		$tarjeta_socia = strtoupper($_POST["tarjeta_socia"]);
		$fecha_venta = $_POST["fecha_venta"];
		$fecha_dia = substr($fecha_venta, 8, 2);
		$fecha_mes = substr($fecha_venta, 5, 2);
		$fecha_ano = substr($fecha_venta, 0, 4);
		
		// Suministro de electricidad
		$maximetro = strtoupper($_POST["maximetro"]);
		$tipo_alta_luz = $_POST["tipo_alta_luz"];
		$tarifa_ref_luz = strtoupper($_POST["tarifa_ref_luz"]);
		$potencia_p1 = str_replace(",", ".", $_POST["potencia_p1"]);
		$potencia_p2 = str_replace(",", ".", $_POST["potencia_p2"]);
		$potencia_p3 = str_replace(",", ".", $_POST["potencia_p3"]);
		$descuento_luz = str_replace(",", ".", $_POST["descuento_luz"]);
		
		
		// Suministro de gas natural
		$tipo_alta_gas = $_POST["tipo_alta_gas"];
		$tarifa_ref_gas = str_replace(",", ".", $_POST["tarifa_ref_gas"]);
		$descuento_gas = str_replace(",", ".", $_POST["descuento_gas"]);
		
		// Servicios
		$marca_aparato_climatizacion = strtoupper($_POST["marca_aparato_climatizacion"]);
		$marca_caldera = strtoupper($_POST["marca_caldera"]);
		$vers_funciona = strtoupper($_POST["vers_funciona"]);
		$modal_funciona = strtoupper($_POST["modal_funciona"]);
		
		// Clima
		if($marca_aparato_climatizacion == ""){
			$contrata_opcion_clima = "NO";
		} else {
			$contrata_opcion_clima = "SI";
		}
		
	// Producto
		// Luz
		if($cid["formula"] == "luz"){
			if($cid["funciona"] == "si"){
				$plan_destino_luz = "FORMULA LUZ ". strtoupper($cid[tipo_contrato]) ." CON FUNCIONA";
			} else {
				$plan_destino_luz = "FORMULA LUZ ". strtoupper($cid[tipo_contrato]) ."";
			}
		}
		// Carrefour
		if($cid["formula"] == "marca"){
			if($cid["formula1"] == "conmaxahorro"){
				if($cid["formula2"] == "luz"){
					if($cid["funciona"] == "si"){
						$plan_destino_luz = "MARCA LUZ CON FUNCIONA MAXIMO AHORRO";
						$plan_destino_fun = "MARCA LUZ CON FUNCIONA MAXIMO AHORRO";
					} else {
						$plan_destino_luz = "MARCA LUZ MAXIMO AHORRO";
						$plan_destino_fun = "MARCA LUZ MAXIMO AHORRO";
					}
				}
				if($cid["formula2"] == "dual"){
					if($cid["funciona"] == "si"){
						$plan_destino_luz = "MARCA DUAL CON FUNCIONA MAXIMO AHORRO";
						$plan_destino_gas = "MARCA DUAL CON FUNCIONA MAXIMO AHORRO";
						$plan_destino_fun = "MARCA DUAL CON FUNCIONA MAXIMO AHORRO";
					} else {
						$plan_destino_luz = "MARCA DUAL MAXIMO AHORRO";
						$plan_destino_gas = "MARCA DUAL MAXIMO AHORRO";
						$plan_destino_fun = "";
					}
				}
			} else { // Sin maximo ahorro
				if($cid["formula2"] == "luz"){
					if($cid["funciona"] == "si"){
						$plan_destino_luz = "MARCA LUZ CON FUNCIONA";
						$plan_destino_fun = "MARCA LUZ CON FUNCIONA";
					} else {
						$plan_destino_luz = "MARCA LUZ";
						$plan_destino_fun = "";
					}
				}
				if($cid["formula2"] == "gas"){
					if($cid["funciona"] == "si"){
						$plan_destino_gas = "MARCA GAS CON FUNCIONA";
						$plan_destino_fun = "MARCA GAS CON FUNCIONA";
					} else {
						$plan_destino_gas = "MARCA GAS";
						$plan_destino_fun = "";
					}
				}
				if($cid["formula2"] == "dual"){
					if($cid["funciona"] == "si"){
						$plan_destino_gas = "MARCA DUAL CON FUNCIONA";
						$plan_destino_fun = "MARCA DUAL CON FUNCIONA";
					} else {
						$plan_destino_gas = "MARCA DUAL";
						$plan_destino_fun = "";
					}
				}
			}
		}
		// Gas
		if($cid["formula"] == "gas"){
			if($cid["funciona"] == "si"){
				$plan_destino_gas = "FORMULA GAS ". strtoupper($cid[tipo_contrato]) ." CON FUNCIONA";
				$plan_destino_fun = "FORMULA GAS ". strtoupper($cid[tipo_contrato]) ." CON FUNCIONA";
			} else {
				$plan_destino_gas = "FORMULA GAS ". strtoupper($cid[tipo_contrato]) ."";
			}
		}
		// Dual
		if($cid["formula"] == "dual"){
			if($cid["formula1"] == "conmaxahorro"){
				if($cid["formula2"] == ""){
					if($cid["funciona"] == "si"){
						$plan_destino_luz = "FORMULA GAS+LUZ CON FUNCIONA MAXIMO AHORRO";
						$plan_destino_gas = "FORMULA GAS+LUZ CON FUNCIONA MAXIMO AHORRO";
						$plan_destino_fun = "FORMULA GAS+LUZ CON FUNCIONA MAXIMO AHORRO";
					} else {
						$plan_destino_luz = "FORMULA GAS+LUZ MAXIMO AHORRO";
						$plan_destino_gas = "FORMULA GAS+LUZ MAXIMO AHORRO";
					}
				}
			} else {
				if($cid["formula2"] == ""){
					if($cid["funciona"] == "si"){
						$plan_destino_luz = "FORMULA GAS+LUZ CON FUNCIONA";
						$plan_destino_gas = "FORMULA GAS+LUZ CON FUNCIONA";
						$plan_destino_fun = "FORMULA GAS+LUZ CON FUNCIONA";
					} else {
						$plan_destino_luz = "FORMULA GAS+LUZ";
						$plan_destino_gas = "FORMULA GAS+LUZ";
					}
				}
			}
		}
		// Máximo ahorro
		if($cid["formula"] == "maxahorro"){
			if($cid["funciona"] == "si"){
				$plan_destino_luz = "FORMULA MAXIMO AHORRO 24H CON FUNCIONA";
				$plan_destino_fun = "FORMULA MAXIMO AHORRO 24H CON FUNCIONA";
			} else {
				$plan_destino_luz = "FORMULA MAXIMO AHORRO 24H";
			}
		}
		// Plan ahorro
		if($cid["formula"] == "planahorro"){
			if($cid["formula1"] == "dual"){
				if($cid["funciona"] == "si"){
					$plan_destino_luz = "FORMULA AHORRO DUAL CON FUNCIONA";
					$plan_destino_gas = "FORMULA AHORRO DUAL CON FUNCIONA";
					$plan_destino_fun = "FORMULA AHORRO DUAL CON FUNCIONA";
				} else {
					$plan_destino_luz = "FORMULA AHORRO DUAL";
					$plan_destino_gas = "FORMULA AHORRO DUAL";
				}	
			}
		}
		// Compromiso luz
		if($cid["tipo_contrato"] == "NEGOCIOS"){
			if($cid["formula"] == "compromisoluz"){
				if($cid["formula1"] == ""){
					if($cid["formula2"] == ""){
						if($cid["funciona"] == "si"){
							$plan_destino_luz = "COMPROMISO LUZ CON FUNCIONA";
							$plan_destino_fun = "COMPROMISO LUZ CON FUNCIONA";
						} else {
							$plan_destino_luz = "COMPROMISO LUZ";
						}
					}
				}
			}
		}
		
		
		if($cid["funciona"] == "si"){
			if($cid["formula"] == "luz") {
				$vers_funciona = "SOLO LUZ";
				$modal_funciona = strtoupper($cid['tipo_contrato']);
			}
			if($cid["formula"] == "compromisoluz") {
				$vers_funciona = "SOLO LUZ";
				$modal_funciona = strtoupper($cid['tipo_contrato']);
			}
			if($cid["formula"] == "maxahorro") {
				$vers_funciona = "SOLO LUZ";
				$modal_funciona = strtoupper($cid['tipo_contrato']);
			}
			if($cid["formula"] == "gas") {
				$vers_funciona = "DUAL";
				$modal_funciona = "PLUS";
			}
			if($cid["formula"] == "dual") {
				$vers_funciona = "DUAL";
				$modal_funciona = "PLUS";
			}
			if($cid["formula"] == "planahorro") {
				$vers_funciona = "DUAL";
				$modal_funciona = "PLUS";
			}
			if($cid["formula"] == "marca") {
				if($cid["formula2"] == "luz") {
					$vers_funciona = "SOLO LUZ";
					$modal_funciona = strtoupper($cid['tipo_contrato']);
				}
				if($cid["formula2"] == "gas") {
					$vers_funciona = "DUAL";
					$modal_funciona = "PLUS";
				}
				if($cid["formula2"] == "dual") {
					$vers_funciona = "DUAL";
					$modal_funciona = "PLUS";
				}
			}
		} else {
			$vers_funciona = "";
			$modal_funciona = "";
		}
		
		
		// Extensión cups de luz
		$cups_luzx = $cups_luz;
		$es_cups = substr($cups_luzx, 0, 6);
		$xd = $cups_luzx . $findme[$es_cups];
		
		mysql_query("UPDATE contratos SET gerente='$cg[gerente]', subgerente='$cg[subgerente]', oficina='$cg[oficina]', subgerente2='$subgerente2', ccc_1='$ccc_1', ccc_2='$ccc_2', ccc_3='$ccc_3', ccc_4='$ccc_4', 
		cod_verificacion='$cod_verificacion', codigo_comercial='$codigo_comercial', impl_explicito='$impl_explicito', we_dia='$we_dia', we_mes='$we_mes', 
		we_ano='$we_ano', consumo_pyme='$consumo_pyme', nombre_titular='$nombre_titular', apellidos_titular='$apellidos_titular', dni_cif_titular='$dni_cif_titular', telefono_pref_1='$telefono_pref_1', 
		telefono_pref_2='$telefono_pref_2', correo_electron='$correo_electron', representante_nombre='$representante_nombre', representante_apellidos='$representante_apellidos', 
		dni_cif_representante='$dni_cif_representante', relacion_representante_titular='$relacion_representante_titular', tipo_via_ps='$tipo_via_ps', calle_ps='$calle_ps', numero_ps='$numero_ps', 
		escalera_ps='$escalera_ps', piso_ps='$piso_ps', letra_ps='$letra_ps', cod_postal_ps='$cod_postal_ps', poblacion_ps='$poblacion_ps', 
		municipio_ps='$municipio_ps[provincia]', cliente_tipo_via_otra='$cliente_tipo_via_otra', cliente_calle_otra='$cliente_calle_otra', 
		cliente_numero_otra='$cliente_numero_otra', cliente_escalera_otra='$cliente_escalera_otra', cliente_piso_otra='$cliente_piso_otra', 
		cliente_letra_otra='$cliente_letra_otra', cliente_cod_postal_otra='$cliente_cod_postal_otra', cliente_poblacion_otra='$cliente_poblacion_otra', 
		cliente_municipio_otra='$cliente_municipio_otra[provincia]', tipo_via_ef_otra='$tipo_via_ef_otra', calle_ef_otra='$calle_ef_otra', numero_ef_otra='$numero_ef_otra', escalera_ef_otra='$escalera_ef_otra', piso_ef_otra='$piso_ef_otra', letra_ef_otra='$letra_ef_otra', cod_postal_ef_otra='$cod_postal_ef_otra', poblacion_ef_otra='$poblacion_ef_otra', 
		municipio_ef_otra='$municipio_ef_otra[provincia]', cups_luz='$xd', cups_gas='$cups_gas', cnae='$cnae', tarjeta_socia='$tarjeta_socia', 
		fecha_venta='$fecha_dia/$fecha_mes/$fecha_ano', maximetro='$maximetro', tipo_alta_luz='$tipo_alta_luz', tarifa_ref_luz='$tarifa_ref_luz', potencia_p1='$potencia_p1', potencia_p2='$potencia_p2', potencia_p3='$potencia_p3', 
		descuento_luz='$descuento_luz', tipo_alta_gas='$tipo_alta_gas', tarifa_ref_gas='$tarifa_ref_gas', descuento_gas='$descuento_gas', 
		marca_aparato_climatizacion='$marca_aparato_climatizacion', marca_caldera='$marca_caldera', 
		contrata_opcion_clima='$contrata_opcion_clima', vers_funciona='$vers_funciona', modal_funciona='$modal_funciona', 
		plan_destino_luz='$plan_destino_luz', plan_destino_gas='$plan_destino_gas', plan_destino_fun='$plan_destino_fun', fecha_contrato_intro='". time() ."' WHERE id='$_GET[id]'");
		
		
		$mensaje = '
		<div class="alert alert-success" role="alert">
		 <center>CIG:<br><span style="text-align: center;font-size: 34px;">'. $cid[cig] .'</span></center><br>
		 <center><a href="'. $config['site'] .'/contrato_nuevo.php">NUEVO CONTRATO</a></center>
		</div>
		';
		echo '<meta http-equiv="refresh" content="30;URL='. $config[site] .'/contrato_nuevo.php">';
	}
	?>
	<!--div style="background: #fff;padding: 10px;position: fixed;top: 40%;left: 0%;z-index: 9999;"> 
	luz:<?php echo $cid['plan_destino_luz']; ?><br>
	gas:<?php echo $cid['plan_destino_gas']; ?><br>
	fun:<?php echo $cid['plan_destino_fun']; ?><br>
	vers:<?php echo $cid['vers_funciona']; ?><br>
	modal:<?php echo $cid['modal_funciona']; ?>
	</div-->
	<div class="container">
	<form method="POST" class="was-validated" onsubmit="location.refresh(true);">
	<div class="row">
	<div class="col-12">
	<?php echo $mensaje; ?>
<div class="card">
  <h5 class="card-header">Subgerente</h5>
  <div class="card-body">
    <p class="card-text">
	<div class="input-group mb-3">
	  <div class="input-group-prepend">
		<label class="input-group-text" for="subgerente2">Subgerente</label>
	  </div>
	  <select class="custom-select" id="subgerente2" name="subgerente2" required>
		<?php if($cid['subgerente2']){ ?>
			<option value="<?php echo $cid['subgerente2']; ?>" selected><?php echo $cid['subgerente2']; ?></option>
			<?php $gg_sql = mysql_query("SELECT * FROM click_gerentes_introductores ORDER BY subgerente"); while($g = mysql_fetch_assoc($gg_sql)){ ?>
			<option value="<?php echo $g['subgerente']; ?>"><?php echo $g['subgerente']; ?></option>
			<?php } ?>
		<?php } elseif($cid['subgerente2'] === NULL){ ?>
			<?php $Varxd12 = mysql_query("SELECT * FROM contratos WHERE user_contrato_intro='$user[username]' AND subgerente2 IS NOT NULL ORDER BY id DESC LIMIT 1");$last_subgerencia_user = mysql_fetch_assoc($Varxd12); ?>
			<option value="<?php echo $last_subgerencia_user['subgerente2']; ?>" selected><?php echo $last_subgerencia_user['subgerente2']; ?></option>
			<?php $gg_sql = mysql_query("SELECT * FROM click_gerentes_introductores ORDER BY subgerente"); while($g = mysql_fetch_assoc($gg_sql)){ ?>
			<option value="<?php echo $g['subgerente']; ?>"><?php echo $g['subgerente']; ?></option>
			<?php } ?>
		<?php } else { ?>
			<option value="" selected disabled>Escoge un subgerente</option>
			<?php $gg_sql = mysql_query("SELECT * FROM click_gerentes_introductores ORDER BY subgerente"); while($g = mysql_fetch_assoc($gg_sql)){ ?>
			<option value="<?php echo $g['subgerente']; ?>"><?php echo $g['subgerente']; ?></option>
			<?php } ?>
		<?php } ?>
	  </select>
	</div>
	</p>
  </div>
  <h5 class="card-header">Validador de cuenta bancaria</h5>
  <div class="card-body">
    <p class="card-text">
	<div id="statusccc"></div>
    <div class="input-group">
    <div class="input-group-prepend">
      <span class="input-group-text">CCC</span>
    </div>
    <input type="text" value="<?php echo $cid['ccc_1']; ?>" autocomplete="off" maxlength="4" data-length="4" required name="ccc_1" id="entidad" pattern="[0-9]{4}" onkeyup="if (this.value.length == this.getAttribute('maxlength')) oficina.focus()" aria-label="ccc_1" class="form-control">
    <input type="text" value="<?php echo $cid['ccc_2']; ?>" autocomplete="off" maxlength="4" data-length="4" required name="ccc_2" id="oficina" pattern="[0-9]{4}" onkeyup="if (this.value.length == this.getAttribute('maxlength')) dc.focus()" aria-label="ccc_2" class="form-control">
    <input type="text" value="<?php echo $cid['ccc_3']; ?>" autocomplete="off" maxlength="2" data-length="2" required name="ccc_3" id="dc" pattern="[0-9]{2}" onkeyup="if (this.value.length == this.getAttribute('maxlength')) ncuenta.focus()" aria-label="ccc_3" class="form-control">
    <input type="text" value="<?php echo $cid['ccc_4']; ?>" autocomplete="off" maxlength="10" data-length="10" required name="ccc_4" id="ncuenta" pattern="[0-9]{10}" aria-label="ccc_4" class="form-control">
    <!--div class="input-group-append">
      <button class="btn btn-outline-secondary statusccc" type="button" onclick="validaycalculaIBAN();">Validar</button>
    </div-->
    <div class="input-group-append">
	  <input type="text" value="" id="checkvalidator" style="width: 0px;" <?php if($cid['ccc_1']){ ?><?php } else { ?>required<?php } ?>>
      <input type="button" id="buttoncheckvalidator" class="btn btn-outline-secondary statusccc" type="button" onclick="validaycalculaIBAN();" value="Validar">
	  <script type="text/javascript">
		$(function () {
			$('#buttoncheckvalidator').on('click', function () {
				var checkvalidator = $('#checkvalidator');
				checkvalidator.val('1');    
			});
		});
	  </script>	  
    </div>
    </div>
	</p>
  </div>
  <h5 class="card-header">Datos esenciales</h5>
  <div class="card-body">
	<br>
	<div class="row">
	  <div class="col-4">
	  <div id="resultadoCV" style="position: absolute;margin-top: -39px;margin-left: -1px;"></div>
		<div class="input-group mb-3">
		  <div class="input-group-prepend">
			<span class="input-group-text" id="cod_verificacion">C. Verificación</span>
		  </div>
		  <input autocomplete="off" value="<?php echo $cid['cod_verificacion']; ?>" onkeyup="if (this.value.length == this.getAttribute('maxlength')) search.focus();codverificacion();" id="busquedaCV" name="cod_verificacion" pattern="[0-9]{14}" type="text" class="form-control" placeholder="Código de verificacion" aria-label="Código de verificacion" aria-describedby="cod_verificacion" maxlength="14" data-length="14" required>

		</div>
	  </div>
	  <div class="col-4">
	  <div id="resultadoCC" style="position: absolute;margin-top: -32px;margin-left: -1px;"></div>
		<div class="input-group mb-3">
		  <div class="input-group-prepend">
			<span class="input-group-text">Comercial</span>
		  </div>
		  <div class="search-results" style="position: absolute;margin-top: -23px;margin-left: 10px;width: 500px;"></div>
		  <input autocomplete="off" value="<?php echo $cid['codigo_comercial']; ?>" onKeyUp="codigocomercial();" placeholder="Código de comercial" id="search" name="codigo_comercial" pattern="[0-9]{5}" type="text" class="form-control" maxlength="5" data-length="5" required>
		</div>
	  </div>
	  <div class="col-4">
		<div class="input-group mb-3">
		  <div class="input-group-prepend">
			<label class="input-group-text" for="impl_explicito">Cons. expl.</label>
		  </div>
		  <select class="custom-select" id="impl_explicito" name="impl_explicito" required>
			<?php if($cid['impl_explicito']){ ?>
			<option value="<?php echo $cid['impl_explicito']; ?>" selected><?php echo $cid['impl_explicito']; ?></option>
			<?php } else { ?>
				<option value="" disabled selected>Escoge una opción...</option>
			<?php } ?>
			<option value="SI">Sí</option>
			<option value="NO">No</option>
		  </select>
		</div>
	  </div>
	  <div class="col-4">
	  <?php $Varxd13 = mysql_query("SELECT * FROM contratos WHERE user_contrato_intro='$user[username]' AND we_dia IS NOT NULL ORDER BY id DESC LIMIT 1");$last_we_user = mysql_fetch_assoc($Varxd13); ?>
		<div class="input-group mb-3">
		  <div class="input-group-prepend">
			<span class="input-group-text">Weekend</span>
		  </div>
		  <input name="fecha_we" max="<?php echo date('Y'); ?>-<?php echo date('m'); ?>-<?php echo date('d'); ?>" <?php if($cid['we_dia']){ ?>value="<?php echo $cid['we_ano']; ?>-<?php echo $cid['we_mes']; ?>-<?php echo $cid['we_dia']; ?>"<?php } elseif($cid['we_dia'] === NULL){ ?>value="<?php echo $last_we_user['we_ano']; ?>-<?php echo $last_we_user['we_mes']; ?>-<?php echo $last_we_user['we_dia']; ?>"<?php } else {} ?> type="date" class="form-control" maxlength="10" data-length="10" required>
		</div>
	  </div>
	  <div class="col-4">
		<div class="input-group mb-3">
		  <div class="input-group-prepend">
			<span class="input-group-text">C.I.G</span>
		  </div>
		  <input value="<?php echo $cid['cig']; ?>" type="text" class="form-control" disabled>
		</div>
	  </div>
	  <?php if($cid['tipo_contrato'] == 'NEGOCIOS'){ ?>
	  <div class="col-4">
		<div class="input-group mb-3">
		  <div class="input-group-prepend">
			<span class="input-group-text">CONSUMO PYME</span>
		  </div>
		  <input value="<?php echo $cid['consumo_pyme']; ?>" name="consumo_pyme" type="text" class="form-control" required>
		</div>
	  </div>
	  <?php } ?>
	</div>
  </div>
  <h5 class="card-header">Datos del Cliente</h5>
  <div class="card-body">
    <p class="card-text">
	<div class="row">
	  <div class="col-4">
		<div class="input-group mb-3">
		  <div class="input-group-prepend">
			<span class="input-group-text">Nombre</span>
		  </div>
		  <input name="nombre_titular" value="<?php echo $cid['nombre_titular']; ?>" type="text" class="form-control" required>
		</div>
	  </div>
	  <div class="col-4">
		<div class="input-group mb-3">
		  <div class="input-group-prepend">
			<span class="input-group-text">Apellidos</span>
		  </div>
		  <input name="apellidos_titular" value="<?php echo $cid['apellidos_titular']; ?>" type="text" class="form-control" required>
		</div>
	  </div>
	  <div class="col-4">
		<div class="input-group mb-3">
		  <div class="input-group-prepend">
			<span class="input-group-text">DNI/NIE/CIF</span>
		  </div>
		  <input name="dni_cif_titular" type="text" value="<?php echo $cid['dni_cif_titular']; ?>" class="form-control" maxlength="9" data-length="9" required>
		</div>
	  </div>
	  <div class="col-4">
		<div class="input-group mb-3">
		  <div class="input-group-prepend">
			<span class="input-group-text">Teléfono 1</span>
		  </div>
		  <input name="telefono_pref_1" value="<?php echo $cid['telefono_pref_1']; ?>" type="text" class="form-control" pattern="[0-9]{9}" maxlength="9" data-length="9" required>
		</div>
	  </div>
	  <div class="col-4">
		<div class="input-group mb-3">
		  <div class="input-group-prepend">
			<span class="input-group-text">Teléfono 2</span>
		  </div>
		  <input name="telefono_pref_2" value="<?php echo $cid['telefono_pref_2']; ?>" type="text" class="form-control" pattern="[0-9]{9}" maxlength="9" data-length="9">
		</div>
	  </div>
	  <div class="col-4">
		<div class="input-group mb-3">
		  <div class="input-group-prepend">
			<span class="input-group-text">Correo</span>
		  </div>
		  <input name="correo_electron" value="<?php echo $cid['correo_electron']; ?>" type="email" class="form-control">
		</div>
	  </div>
	  <div class="col-12">
		<p>
		  <a class="btn btn-danger" style="width: 100%;" data-toggle="collapse" href="#representante" role="button" aria-expanded="true" aria-controls="representante">
			Añadir representante
		  </a>
		</p>
		<div class="collapse" id="representante">
		  <div class="card card-body" style="margin-bottom: 13px;">
			<h5 class="card-header" style="background: transparent;border: none;">Datos del Representante</h5>
			<div class="row">
			  <div class="col-6">
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text">Nombre</span>
				  </div>
				  <input name="representante_nombre" value="<?php echo $cid['representante_nombre']; ?>" type="text" class="form-control">
				</div>
			  </div>
			  <div class="col-6">
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text">Apellidos</span>
				  </div>
				  <input name="representante_apellidos" value="<?php echo $cid['representante_apellidos']; ?>" type="text" class="form-control">
				</div>
			  </div>
			  <div class="col-4">
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text">DNI/NIE/CIF</span>
				  </div>
				  <input name="dni_cif_representante" value="<?php echo $cid['dni_cif_representante']; ?>" type="text" maxlength="9" data-length="9" class="form-control">
				</div>
			  </div>
			  <div class="col-8">
			<div class="input-group mb-3">
			  <div class="input-group-prepend">
				<label class="input-group-text" for="relacion_representante_titular">Relación con Cliente</label>
			  </div>
			  <select class="custom-select" id="relacion_representante_titular" name="relacion_representante_titular">
			  <?php if($cid['relacion_representante_titular']){ ?>
				<option value="<?php echo $cid['relacion_representante_titular']; ?>" selected><?php echo $cid['relacion_representante_titular']; ?></option>
			  <?php } else { ?>
				<option value="" disabled selected>Selecciona una opción</option>
			  <?php } ?>
				<option value="PAREJA REGISTRADA / CONYUGE">PAREJA REGISTRADA / CONYUGE</option>
				<option value="ASCENDIENTE / DESCENDIENTE">ASCENDIENTE / DESCENDIENTE</option>
				<option value="APODERADO">APODERADO</option>
			  </select>
			</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>
	</p>
  </div>
  <h5 class="card-header">Direcciones</h5>
  <div class="card-body">
	<br>
	<div class="row">
	  <div class="col-12">
<p>
  <a class="btn btn-dark" data-toggle="collapse" href="#puntodesuministro" role="button" aria-expanded="true" aria-controls="puntodesuministro">Punto de suministro</a>
  <button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#cliente" aria-expanded="false" aria-controls="cliente">Cliente</button>
  <button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#facturas" aria-expanded="false" aria-controls="facturas">Envío de facturas</button>
</p>
<div class="row">
  <div class="col-12" style="margin-bottom: 10px;">
    <div class="collapse show multi-collapse" id="puntodesuministro">
      <div class="card card-body">
		<h5 class="card-header" style="background: transparent;border: none;">Punto de suministro</h5>
		<div class="row">
			<div class="col-3">
			  <div class="input-group mb-3">
			  <div class="input-group-prepend">
			  	<span class="input-group-text">Vía</span>
			  </div>
			  <input name="tipo_via_ps" value="<?php echo $cid['tipo_via_ps']; ?>" type="text" class="form-control" required>
			  </div>
			</div>
			<div class="col-6">
			  <div class="input-group mb-3">
			  <div class="input-group-prepend">
			  	<span class="input-group-text">Dirección</span>
			  </div>
			  <input name="calle_ps" value="<?php echo $cid['calle_ps']; ?>" type="text" class="form-control" required>
			  </div>
			</div>
			<div class="col-3">
			  <div class="input-group mb-3">
			  <div class="input-group-prepend">
			  	<span class="input-group-text">Nº / Dupl</span>
			  </div>
			  <input name="numero_ps" value="<?php echo $cid['numero_ps']; ?>" type="text" class="form-control">
			  </div>
			</div>
			<div class="col-3">
			  <div class="input-group mb-3">
			  <div class="input-group-prepend">
			  	<span class="input-group-text">Escalera</span>
			  </div>
			  <input name="escalera_ps" value="<?php echo $cid['escalera_ps']; ?>" type="text" class="form-control">
			  </div>
			</div>
			<div class="col-3">
			  <div class="input-group mb-3">
			  <div class="input-group-prepend">
			  	<span class="input-group-text">Piso</span>
			  </div>
			  <input name="piso_ps" value="<?php if($cid['piso_ps']){ ?><?php echo $cid['piso_ps']; ?><?php } else { ?>#<?php } ?>" type="text" class="form-control" required>
			  </div>
			</div>
			<div class="col-3">
			  <div class="input-group mb-3">
			  <div class="input-group-prepend">
			  	<span class="input-group-text">Letra / Mano</span>
			  </div>
			  <input name="letra_ps" value="<?php echo $cid['letra_ps']; ?>" type="text" class="form-control">
			  </div>
			</div>
			<div class="col-3">
			  <div class="input-group mb-3">
			  <div class="input-group-prepend">
			  	<span class="input-group-text">Código postal</span>
			  </div>
			  <input onKeyUp="provincia();" id="busquedaPPS" name="cod_postal_ps" value="<?php echo $cid['cod_postal_ps']; ?>" type="text" pattern="[0-9]{5}" maxlength="5" data-length="5" class="form-control" required>
			  </div>
			</div>
			<div class="col-6">
			  <div class="input-group mb-3">
			  <div class="input-group-prepend">
			  	<span class="input-group-text">Población</span>
			  </div>
			  <input name="poblacion_ps" value="<?php echo $cid['poblacion_ps']; ?>" type="text" class="form-control" required>
			  </div>
			</div>
			<script>
			function provincia() {
				var textoBusqueda = $("input#busquedaPPS").val();
			 
				 if (textoBusqueda != "") {
					$.post("assets/GET/buscar_provincia.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
						$("#resultadoProvincia").html(mensaje);
					 }); 
				 } else { 
					$("#resultadoProvincia").html('Rellena el código postal...');
					};
			};
			</script>
		    <div class="col-6">
		  	  <div class="input-group mb-3">
		  	    <div class="input-group-prepend">
		  	  	<span class="input-group-text">Provincia</span>
		  	    </div>
				<div style="position: absolute;margin-left: 100px;z-index: 123;margin-top: 7px;" id="resultadoProvincia"><?php echo $cid['municipio_ps']; ?></div>
				<input disabled autocomplete="off" pattern="[0123456789]{5}" type="text" class="form-control" maxlength="5" data-length="5">
		  	  </div>
		    </div>
		</div>
      </div>
    </div>
  </div>
  <div class="col-12" style="margin-bottom: 10px;">
    <div class="collapse multi-collapse" id="cliente">
      <div class="card card-body">
        <h5 class="card-header" style="background: transparent;border: none;">Cliente</h5>
		<div class="row">
			<div class="col-3">
			  <div class="input-group mb-3">
			  <div class="input-group-prepend">
			  	<span class="input-group-text">Vía</span>
			  </div>
			  <input name="cliente_tipo_via_otra" value="<?php echo $cid['cliente_tipo_via_otra']; ?>" type="text" class="form-control">
			  </div>
			</div>
			<div class="col-6">
			  <div class="input-group mb-3">
			  <div class="input-group-prepend">
			  	<span class="input-group-text">Dirección</span>
			  </div>
			  <input name="cliente_calle_otra" value="<?php echo $cid['cliente_calle_otra']; ?>" type="text" class="form-control">
			  </div>
			</div>
			<div class="col-3">
			  <div class="input-group mb-3">
			  <div class="input-group-prepend">
			  	<span class="input-group-text">Nº / Dupl</span>
			  </div>
			  <input name="cliente_numero_otra" value="<?php echo $cid['cliente_numero_otra']; ?>" type="text" class="form-control">
			  </div>
			</div>
			<div class="col-3">
			  <div class="input-group mb-3">
			  <div class="input-group-prepend">
			  	<span class="input-group-text">Escalera</span>
			  </div>
			  <input name="cliente_escalera_otra" value="<?php echo $cid['cliente_escalera_otra']; ?>" type="text" class="form-control">
			  </div>
			</div>
			<div class="col-3">
			  <div class="input-group mb-3">
			  <div class="input-group-prepend">
			  	<span class="input-group-text">Piso</span>
			  </div>
			  <input name="cliente_piso_otra" value="<?php echo $cid['cliente_piso_otra']; ?>" type="text" class="form-control">
			  </div>
			</div>
			<div class="col-3">
			  <div class="input-group mb-3">
			  <div class="input-group-prepend">
			  	<span class="input-group-text">Letra / Mano</span>
			  </div>
			  <input name="cliente_letra_otra" value="<?php echo $cid['cliente_letra_otra']; ?>" type="text" class="form-control">
			  </div>
			</div>
			<div class="col-3">
			  <div class="input-group mb-3">
			  <div class="input-group-prepend">
			  	<span class="input-group-text">Código postal</span>
			  </div>
			  <input onKeyUp="provincia2();" id="busquedaPSC" value="<?php echo $cid['cliente_cod_postal_otra']; ?>" name="cliente_cod_postal_otra" type="text" pattern="[0-9]{5}" maxlength="5" data-length="5" class="form-control">
			  </div>
			</div>
			<div class="col-6">
			  <div class="input-group mb-3">
			  <div class="input-group-prepend">
			  	<span class="input-group-text">Población</span>
			  </div>
			  <input name="cliente_poblacion_otra" value="<?php echo $cid['cliente_poblacion_otra']; ?>" type="text" class="form-control">
			  </div>
			</div>
			<script>
			function provincia2() {
				var textoBusqueda = $("input#busquedaPSC").val();
			 
				 if (textoBusqueda != "") {
					$.post("assets/GET/buscar_provincia.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
						$("#resultadoProvincia2").html(mensaje);
					 }); 
				 } else { 
					$("#resultadoProvincia2").html('Rellena el código postal...');
					};
			};
			</script>
		    <div class="col-6">
		  	  <div class="input-group mb-3">
		  	    <div class="input-group-prepend">
		  	  	<span class="input-group-text">Provincia</span>
		  	    </div>
				<div style="position: absolute;margin-left: 100px;z-index: 123;margin-top: 7px;" id="resultadoProvincia2"><?php echo $cid['cliente_municipio_otra']; ?></div>
				<input disabled autocomplete="off" pattern="[0123456789]{5}" type="text" class="form-control" maxlength="5" data-length="5">
		  	  </div>
		    </div>
		</div>
      </div>
    </div>
  </div>
  <div class="col-12">
    <div class="collapse multi-collapse" id="facturas">
      <div class="card card-body">
        <h5 class="card-header" style="background: transparent;border: none;">Envío de facturas</h5>
		<div class="row">
			<div class="col-3">
			  <div class="input-group mb-3">
			  <div class="input-group-prepend">
			  	<span class="input-group-text">Vía</span>
			  </div>
			  <input name="tipo_via_ef_otra" value="<?php echo $cid['tipo_via_ef_otra']; ?>" type="text" class="form-control">
			  </div>
			</div>
			<div class="col-6">
			  <div class="input-group mb-3">
			  <div class="input-group-prepend">
			  	<span class="input-group-text">Dirección</span>
			  </div>
			  <input name="calle_ef_otra" value="<?php echo $cid['calle_ef_otra']; ?>" type="text" class="form-control">
			  </div>
			</div>
			<div class="col-3">
			  <div class="input-group mb-3">
			  <div class="input-group-prepend">
			  	<span class="input-group-text">Nº / Dupl</span>
			  </div>
			  <input name="numero_ef_otra" value="<?php echo $cid['numero_ef_otra']; ?>" type="text" class="form-control">
			  </div>
			</div>
			<div class="col-3">
			  <div class="input-group mb-3">
			  <div class="input-group-prepend">
			  	<span class="input-group-text">Escalera</span>
			  </div>
			  <input name="escalera_ef_otra" value="<?php echo $cid['escalera_ef_otra']; ?>" type="text" class="form-control">
			  </div>
			</div>
			<div class="col-3">
			  <div class="input-group mb-3">
			  <div class="input-group-prepend">
			  	<span class="input-group-text">Piso</span>
			  </div>
			  <input name="piso_ef_otra" value="<?php echo $cid['piso_ef_otra']; ?>" type="text" class="form-control">
			  </div>
			</div>
			<div class="col-3">
			  <div class="input-group mb-3">
			  <div class="input-group-prepend">
			  	<span class="input-group-text">Letra / Mano</span>
			  </div>
			  <input name="letra_ef_otra" value="<?php echo $cid['letra_ef_otra']; ?>" type="text" class="form-control">
			  </div>
			</div>
			<div class="col-3">
			  <div class="input-group mb-3">
			  <div class="input-group-prepend">
			  	<span class="input-group-text">Código postal</span>
			  </div>
			  <input onKeyUp="provincia3();" id="busquedaPSEF" name="cod_postal_ef_otra" value="<?php echo $cid['cod_postal_ef_otra']; ?>" type="text" pattern="[0-9]{5}" maxlength="5" data-length="5" class="form-control">
			  </div>
			</div>
			<div class="col-6">
			  <div class="input-group mb-3">
			  <div class="input-group-prepend">
			  	<span class="input-group-text">Población</span>
			  </div>
			  <input name="poblacion_ef_otra" value="<?php echo $cid['poblacion_ef_otra']; ?>" type="text" class="form-control">
			  </div>
			</div>
			<script>
			function provincia3() {
				var textoBusqueda = $("input#busquedaPSEF").val();
			 
				 if (textoBusqueda != "") {
					$.post("assets/GET/buscar_provincia.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
						$("#resultadoProvincia3").html(mensaje);
					 }); 
				 } else { 
					$("#resultadoProvincia3").html('Rellena el código postal...');
					};
			};
			</script>
		    <div class="col-6">
		  	  <div class="input-group mb-3">
		  	    <div class="input-group-prepend">
		  	  	<span class="input-group-text">Provincia</span>
		  	    </div>
				<div style="position: absolute;margin-left: 100px;z-index: 123;margin-top: 7px;" id="resultadoProvincia3"><?php echo $cid['municipio_ef_otra']; ?></div>
				<input disabled autocomplete="off" pattern="[0123456789]{5}" type="text" class="form-control" maxlength="5" data-length="5">
		  	  </div>
		    </div>
		</div>
      </div>
    </div>
  </div>
</div>
	  </div>
	</div>
  </div>
  <h5 class="card-header">Datos del Punto de Suministro</h5>
  <div class="card-body">
  <?PHP
	//$consultaBusquedax = 'ES0080103217563001RT';
	//$cups_luzx = $consultaBusquedax;
	//$es_cups = substr($cups_luzx, 0, 6);
	//$xd = $cups_luzx . $findme[$es_cups];
	//echo $xd;
  ?>
  <br>
    <div class="row">
		<div class="col-6">
		  <div class="input-group mb-3">
		  <div id="resultadoCL" style="position: absolute;margin-top: -29px"></div>
		    <div class="input-group-prepend">
		  	<span class="input-group-text">Cups luz</span>
		    </div>
			<input <?php if($cid['cups_luz'] == ''){ ?>pattern="[A-Z0-9]{20}" maxlength="20" data-length="20"<?php } else { ?>pattern="[A-Z0-9]{20}" maxlength="22" data-length="22"<?php } ?> onKeyUp="cupsluz();" value="<?php echo $cid['cups_luz']; ?>" onblur="valida_cups(this.value)" id="busquedaCL" name="cups_luz" type="text" class="form-control" <?php if($cid['formula'] == 'luz'){ echo 'required'; } ?><?php if($cid['formula'] == 'dual'){ echo 'required'; } ?><?php if($cid['formula2'] == 'luz'){ echo 'required'; } ?><?php if($cid['formula2'] == 'dual'){ echo 'required'; } ?><?php if($cid['formula'] == 'maxahorro'){ echo 'required'; } ?>>
		  </div>
		</div>
		<div class="col-6">
		  <div class="input-group mb-3">
		  <div id="resultadoCG" style="position: absolute;margin-top: -29px"></div>
		    <div class="input-group-prepend">
		  	<span class="input-group-text">Cups gas</span>
		    </div>
			<input pattern="[A-Z0-9]{20}" onKeyUp="cupsgas();" value="<?php echo $cid['cups_gas']; ?>" onblur="valida_cups2(this.value)" id="busquedaCG" name="cups_gas" type="text" class="form-control" maxlength="20" data-length="20" <?php if($cid['formula2'] == 'gas'){ echo 'required'; } ?><?php if($cid['formula2'] == 'dual'){ echo 'required'; } ?><?php if($cid['formula'] == 'dual'){ echo 'required'; } ?><?php if($cid['formula'] == 'gas'){ echo 'required'; } ?>>
		  </div>
		</div>
		<div class="col-<?php if($cid['tipo_contrato'] == 'NEGOCIOS'){ ?>4<?php } else { ?>6<?php } ?>">
		  <div class="input-group mb-3">
		    <div class="input-group-prepend">
		  	<span class="input-group-text">CNAE</span>
		    </div>
			<input pattern="[0-9]{4}" <?php if($cid['tipo_contrato'] == 'HOGARES'){ echo 'value="9820"'; } else { ?>value="<?php echo $cid['cnae']; ?>"<?php } ?> name="cnae" type="text" class="form-control" maxlength="4" data-length="4" required>
		  </div>
		</div>
		<?php if($cid['formula'] == 'marca'){ ?>
		<div class="col-4">
		  <div class="input-group mb-3">
		  <div id="resultadoCG" style="position: absolute;margin-top: -29px"></div>
		    <div class="input-group-prepend">
		  	<span class="input-group-text">Carrefour</span>
		    </div>
			<input pattern="[0-9]{13}" name="tarjeta_socia" value="<?php echo $cid['tarjeta_socia']; ?>" type="text" class="form-control" maxlength="13" data-length="13" required>
		  </div>
		</div>
		<?php } ?>
	    <div class="col-<?php if($cid['tipo_contrato'] == 'NEGOCIOS'){ ?>4<?php } else { ?>6<?php } ?>">
	  	<div class="input-group mb-3">
	  	  <div class="input-group-prepend">
	  		<span class="input-group-text">Fecha venta</span>
	  	  </div>
		  <?php $mesx = date('m')-3; ?>
	  	  <input name="fecha_venta" min="<?php echo date('Y'); ?>-<?php if(strlen($mesx) == '1'){ echo '0' . $mesx; } else { echo $mesx; } ?>-<?php echo date('d'); ?>" max="<?php echo date('Y'); ?>-<?php echo date('m'); ?>-<?php echo date('d')+5; ?>" value="<?php if($cid['we_dia']){ ?><?php echo $cid['we_ano'] . '-' . $cid['we_mes'] . '-' . $cid['we_dia']; ?><?php } ?>" type="date" class="form-control" maxlength="10" data-length="10" required>
	  	</div>
	    </div>
    </div>
  </div>
  <h5 class="card-header">Suministro de electricidad</h5>
  <div class="card-body">
    <p class="card-text">
	<div class="row">
	  <div class="col-4">
		<div class="input-group mb-3">
		  <div class="input-group-prepend">
			<label class="input-group-text" for="maximetro">Maxímetro</label>
		  </div>
		  <select class="custom-select" id="maximetro" name="maximetro" <?php if($cid['formula'] == 'dual'){ echo 'required'; } ?><?php if($cid['formula'] == 'luz'){ echo 'required'; } ?><?php if($cid['formula2'] == 'luz'){ echo 'required'; } ?><?php if($cid['formula2'] == 'dual'){ echo 'required'; } ?><?php if($cid['formula'] == 'maxahorro'){ echo 'required'; } ?>>
			<?php if($cid['maximetro']){ ?>
			<option value="<?php echo $cid['maximetro']; ?>" selected><?php echo $cid['maximetro']; ?></option>
			<?php } else { ?>
				<option value="" disabled selected>Escoge una opción...</option>
			<?php } ?>
			<option value="Si">Sí</option>
			<option value="No">No</option>
		  </select>
		</div>
	  </div>
	  <div class="col-4">
		<div class="input-group mb-3">
		  <div class="input-group-prepend">
			<label class="input-group-text" for="tipo_alta_luz">Alta luz</label>
		  </div>
		  <select class="custom-select" id="tipo_alta_luz" name="tipo_alta_luz" <?php if($cid['formula'] == 'dual'){ echo 'required'; } ?><?php if($cid['formula'] == 'luz'){ echo 'required'; } ?><?php if($cid['formula2'] == 'luz'){ echo 'required'; } ?><?php if($cid['formula2'] == 'dual'){ echo 'required'; } ?><?php if($cid['formula'] == 'maxahorro'){ echo 'required'; } ?>>
			<?php if($cid['tipo_alta_luz']){ ?>
			<option value="<?php echo $cid['tipo_alta_luz']; ?>" selected><?php echo $cid['tipo_alta_luz']; ?></option>
			<?php } else { ?>
				<option value="" disabled selected>Escoge una opción...</option>
			<?php } ?>
			<option value="AD">AD</option>
			<option value="CC">CC</option>
			<option value="CC con CT">CC con CT</option>
			<option value="CC con MT">CC con MT</option>
			<option value="CC con CT y MT">CC con CT y MT</option>
			<option value="CT">CT</option>
			<option value="MT">MT</option>
			<option value="NA">NA</option>
			<option value="CT con MT">CT con MT</option>
		  </select>
		</div>
	  </div>
	  <div class="col-4">
		<div class="input-group mb-3">
		  <div class="input-group-prepend">
			<label class="input-group-text" for="tarifa_ref_luz">Tarifa de Acceso</label>
		  </div>
		  <select class="custom-select" id="tarifa_ref_luz" name="tarifa_ref_luz" <?php if($cid['formula'] == 'dual'){ echo 'required'; } ?><?php if($cid['formula'] == 'luz'){ echo 'required'; } ?><?php if($cid['formula2'] == 'luz'){ echo 'required'; } ?><?php if($cid['formula2'] == 'dual'){ echo 'required'; } ?><?php if($cid['formula'] == 'maxahorro'){ echo 'required'; } ?>>
			<?php if($cid['tarifa_ref_luz']){ ?>
			<option value="<?php echo $cid['tarifa_ref_luz']; ?>" selected><?php echo $cid['tarifa_ref_luz']; ?></option>
			<?php } else { ?>
				<option value="" disabled selected>Escoge una opción...</option>
			<?php } ?>
			<option value="2.0A">2.0A</option>
			<option value="2.0DHA">2.0DHA</option>
			<option value="2.1A">2.1A</option>
			<option value="2.1DHA">2.1DHA</option>
			<option value="3.0A">3.0A</option>
		  </select>
		</div>
	  </div>
	  <div class="col-3">
	    <div class="input-group mb-3">
	      <div class="input-group-prepend">
	    	<span class="input-group-text">POTENCIA1</span>
	      </div>
	      <input name="potencia_p1" value="<?php echo $cid['potencia_p1']; ?>" type="text" class="form-control" <?php if($cid['formula'] == 'dual'){ echo 'required'; } ?><?php if($cid['formula'] == 'luz'){ echo 'required'; } ?><?php if($cid['formula2'] == 'luz'){ echo 'required'; } ?><?php if($cid['formula2'] == 'dual'){ echo 'required'; } ?><?php if($cid['formula'] == 'maxahorro'){ echo 'required'; } ?>>
	    </div>
	  </div>
	  <div class="col-3">
	    <div class="input-group mb-3">
	      <div class="input-group-prepend">
	    	<span class="input-group-text">POTENCIA2</span>
	      </div>
	      <input name="potencia_p2" value="<?php echo $cid['potencia_p2']; ?>" type="text" class="form-control">
	    </div>
	  </div>
	  <div class="col-3">
	    <div class="input-group mb-3">
	      <div class="input-group-prepend">
	    	<span class="input-group-text">POTENCIA3</span>
	      </div>
	      <input name="potencia_p3" value="<?php echo $cid['potencia_p3']; ?>" type="text" class="form-control">
	    </div>
	  </div>
	  <div class="col-3">
	    <div class="input-group mb-3">
	      <div class="input-group-prepend">
	    	<span class="input-group-text">Descuento LUZ</span>
	      </div>
	      <input name="descuento_luz" value="<?php echo $cid['descuento_luz']; ?>" type="text" class="form-control" <?php if($cid['formula'] == 'dual'){ echo 'required'; } ?><?php if($cid['formula'] == 'luz'){ echo 'required'; } ?><?php if($cid['formula2'] == 'luz'){ echo 'required'; } ?><?php if($cid['formula2'] == 'dual'){ echo 'required'; } ?><?php if($cid['formula'] == 'maxahorro'){ echo 'required'; } ?>>
	    </div>
	  </div>
	</div>
	</p>
  </div>
  
  <h5 class="card-header">Suministro de gas natural</h5>
  <div class="card-body">
    <p class="card-text">
	<div class="row">
	  <div class="col-4">
		<div class="input-group mb-3">
		  <div class="input-group-prepend">
			<label class="input-group-text" for="tipo_alta_gas">Alta gas</label>
		  </div>
		  <select class="custom-select" id="tipo_alta_gas" name="tipo_alta_gas" <?php if($cid['formula2'] == 'gas'){ echo 'required'; } ?><?php if($cid['formula2'] == 'dual'){ echo 'required'; } ?><?php if($cid['formula'] == 'dual'){ echo 'required'; } ?><?php if($cid['formula'] == 'gas'){ echo 'required'; } ?>>
			<?php if($cid['tipo_alta_gas']){ ?>
			<option value="<?php echo $cid['tipo_alta_gas']; ?>" selected><?php echo $cid['tipo_alta_gas']; ?></option>
			<?php } else { ?>
				<option value="" disabled selected>Escoge una opción...</option>
			<?php } ?>
			<option value="AD">AD</option>
			<option value="CC">CC</option>
			<option value="CC con CT">CC con CT</option>
			<option value="CT">CT</option>
			<option value="NA">NA</option>
		  </select>
		</div>
	  </div>
	  <div class="col-4">
		<div class="input-group mb-3">
		  <div class="input-group-prepend">
			<label class="input-group-text" for="tarifa_ref_gas">Tarifa de Acceso</label>
		  </div>
		  <select class="custom-select" id="tarifa_ref_gas" name="tarifa_ref_gas" <?php if($cid['formula2'] == 'gas'){ echo 'required'; } ?><?php if($cid['formula2'] == 'dual'){ echo 'required'; } ?><?php if($cid['formula'] == 'dual'){ echo 'required'; } ?><?php if($cid['formula'] == 'gas'){ echo 'required'; } ?>>
			<?php if($cid['tarifa_ref_gas']){ ?>
			<option value="<?php echo $cid['tarifa_ref_gas']; ?>" selected><?php echo $cid['tarifa_ref_gas']; ?></option>
			<?php } else { ?>
				<option value="" disabled selected>Escoge una opción...</option>
			<?php } ?>
			<option value="3.1">3.1</option>
			<option value="3.2">3.2</option>
			<option value="3.3">3.3</option>
			<option value="3.4">3.4</option>
		  </select>
		</div>
	  </div>
	  <div class="col-4">
	    <div class="input-group mb-3">
	      <div class="input-group-prepend">
	    	<span class="input-group-text">Descuento GAS</span>
	      </div>
	      <input name="descuento_gas" value="<?php echo $cid['descuento_gas']; ?>" type="text" class="form-control" <?php if($cid['formula2'] == 'gas'){ echo 'required'; } ?><?php if($cid['formula2'] == 'dual'){ echo 'required'; } ?><?php if($cid['formula'] == 'dual'){ echo 'required'; } ?><?php if($cid['formula'] == 'gas'){ echo 'required'; } ?>>
	    </div>
	  </div>
	</div>
	</p>
  </div>
  
  <h5 class="card-header">Servicios</h5>
  <div class="card-body">
    <p class="card-text">
	<div class="row">
	  <div class="col-6">
	    <div class="input-group mb-3">
	      <div class="input-group-prepend">
	    	<span class="input-group-text">Marca equipo climatización</span>
	      </div>
	      <input name="marca_aparato_climatizacion" value="<?php echo $cid['marca_aparato_climatizacion']; ?>" type="text" class="form-control">
	    </div>
	  </div>
	  <div class="col-6">
		<div class="input-group mb-3">
		  <div class="input-group-prepend">
			<label class="input-group-text" for="marca_caldera">Caldera</label>
		  </div>
		  <select class="custom-select" id="marca_caldera" name="marca_caldera" <?php if($cid['formula2'] == 'gas'){ echo 'required'; } ?><?php if($cid['formula2'] == 'dual'){ echo 'required'; } ?><?php if($cid['formula'] == 'dual'){ echo 'required'; } ?><?php if($cid['formula'] == 'gas'){ echo 'required'; } ?>>
			<?php if($cid['marca_caldera']){ ?>
				<option value="<?php echo $cid['marca_caldera']; ?>" selected><?php echo $cid['marca_caldera']; ?></option>
			<?php } else { ?>
				<option value="" disabled selected>Escoge una opción...</option>
			<?php } ?>
			<?php $c_sql = mysql_query("SELECT * FROM contratos_calderas ORDER BY id"); while($c = mysql_fetch_assoc($c_sql)){ ?>
			<option value="<?php echo $c['caldera']; ?>"><?php echo $c['caldera']; ?></option>
			<?php } ?>
		  </select>
		</div>
	  </div>
	</div>
	</p>
  </div>
  
  
  
  <div class="card-body">
	<div class="row">
	  <div class="col-3">
	  </div>
	  <div class="col-6">
		<div class="input-group mb-3">
			<?php if($cid['ccc_1']){ ?><button type="submit" name="guardarcontrato" class="btn btn-primary" style="width: 100%;">Guardar cambios</button><?php } else { ?><div style="width: 100%;" id="botonguardarcontrato"></div><?php } ?>
		</div>
	  </div>
	</div>
  </div>
	</div>
	</div>
	</form>
	</div>
	</div>
<script>
function cupsluz() {
	var textoBusqueda = $("input#busquedaCL").val();
 
	 if (textoBusqueda != "") {
		$.post("assets/GET/verify_cupsluz.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
			$("#resultadoCL").html(mensaje);
		 }); 
	 } else { 
		$("#resultadoCL").html('');
		};
};

function cupsgas() {
	var textoBusqueda = $("input#busquedaCG").val();
 
	 if (textoBusqueda != "") {
		$.post("assets/GET/verify_cupsgas.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
			$("#resultadoCG").html(mensaje);
		 }); 
	 } else { 
		$("#resultadoCG").html('');
		};
};

function codverificacion() {
	var textoBusqueda = $("input#busquedaCV").val();
 
	 if (textoBusqueda != "") {
		$.post("assets/GET/verify_cod_verificacion.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
			$("#resultadoCV").html(mensaje);
		 }); 
	 } else { 
		$("#resultadoCV").html('');
		};
};

function codigocomercial() {
	var textoBusqueda = $("input#search").val();
 
	 if (textoBusqueda != "") {
		$.post("assets/GET/buscar_comercial.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
			$("#resultadoCC").html(mensaje);
		 }); 
	 } else { 
		$("#resultadoCC").html('');
		};
};

Math.fmod = function (a,b) { return Number((a - (Math.floor(a / b) * b)).toPrecision(8)); };
function valida_cups(CUPS){	
	var status=false;
    var RegExPattern =/^ES[0-9]{16}[a-zA-Z]{2}[0-9]{0,1}[a-zA-Z]{0,1}$/;
	if ((CUPS.match(RegExPattern)) && (CUPS!='')) {
		var CUPS_16 = CUPS.substr(2,16);
		var control = CUPS.substr(18,2);
		var letters = Array('T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E');
 
		var fmodv = Math.fmod(CUPS_16,529);
		var imod = parseInt(fmodv);
		var quotient = Math.floor(imod / 23);
		var remainder = imod % 23;
		
		var dc1 = letters[quotient];
		var dc2 = letters[remainder];
		status = (control == dc1+dc2);
	} else {
		status=false;
	}
	if(!status){
		//alert('CUPS INCORRECTO');
		document.getElementById("resultadoCL").innerHTML = "<div class='alert alert-danger text-center' role='alert' style='margin-top: -7px;padding: 2px 30px;width: 338px;'>El <b>cups de luz</b> es incorrecto</div>";
		document.getElementById("busquedaCL").innerHTML = "<style>#busquedaCL{border-color: #dc3545 !important;}</style>";
		//$('#busquedaCL').val(CUPS);
		//$('#busquedaCL').focus();
	}
	return status;
}

function valida_cups2(CUPS){	
	var status=false;
    var RegExPattern =/^ES[0-9]{16}[a-zA-Z]{2}[0-9]{0,1}[a-zA-Z]{0,1}$/;
	if ((CUPS.match(RegExPattern)) && (CUPS!='')) {
		var CUPS_16 = CUPS.substr(2,16);
		var control = CUPS.substr(18,2);
		var letters = Array('T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E');
 
		var fmodv = Math.fmod(CUPS_16,529);
		var imod = parseInt(fmodv);
		var quotient = Math.floor(imod / 23);
		var remainder = imod % 23;
		
		var dc1 = letters[quotient];
		var dc2 = letters[remainder];
		status = (control == dc1+dc2);
	} else {
		status=false;
	}
	if(!status){
		//alert('CUPS INCORRECTO');
		document.getElementById("resultadoCG").innerHTML = "<div class='alert alert-danger text-center' role='alert' style='margin-top: -7px;padding: 2px 30px;width: 338px;'>El <b>cups de gas</b> es incorrecto</div>";
		document.getElementById("busquedaCG").innerHTML = "<style>#busquedaCG{border-color: #dc3545 !important;}</style>";
		//$('#busquedaCL').val(CUPS);
		//$('#busquedaCL').focus();
	}
	return status;
}

      function validaycalculaIBAN() {
	
        var codPais = document.getElementById("codPais");
	var entidad = document.getElementById("entidad");
	var sucursal = document.getElementById("oficina");
	var dc = document.getElementById("dc");
	var ncuenta = document.getElementById("ncuenta");
	
        if (compruebaCCC(entidad.value, 
                         sucursal.value, 
                         dc.value, 
                         ncuenta.value)) {
	//alert('La cuenta bancaria es correcta');
	$('#statusccc').html('<style>.statusccc{background: #d4edda;border: 1px solid #00000026;color: #155724;}</style><div class="alert alert-success text-center" role="alert">La cuenta bancaria es correcta :)</div>');
	$('#botonguardarcontrato').html('<button type="submit" name="guardarcontrato" class="btn btn-primary" style="width: 100%;">Guardar cambios</button>');
	 // alert(calculaIBAN(codPais.value, 
       //                     entidad.value, 
         //                   sucursal.value, 
           //                 dc.value, 
             //               ncuenta.value));
	} else {
	//alert('La cuenta bancaria es incorrecta');
	$('#statusccc').html('<style>.statusccc{background: #f8d7da;border: 1px solid #00000026;color: #721c24;}</style><div class="alert alert-danger text-center" role="alert">¡La cuenta bancaria es incorrecta!</div>');
	$('#botonguardarcontrato').html('<button type="submit" name="guardarcontrato" class="btn btn-primary" style="border: none;background: grey;width: 100%;" disabled>Guardar cambios</button>');
	 //alert("Numero de cuenta incorrecto");
	}
      }
      function calculaIBAN(codPais, entidad, sucursal, dc, ncuenta) {

        var preIban = entidad + 
                      sucursal + 
                      dc + 
                      ncuenta + 
                      damePesoIBAN(codPais.charAt(0)) + 
                      damePesoIBAN(codPais.charAt(1)) +
                      "00";
	var dcIban = 98-modulo(preIban, 97);
	dcIban = rellenaCeros(dcIban,2);
	return codPais+dcIban+entidad+sucursal+dc+ncuenta;

      }

      function modulo(preIban, divisor) {
				
        var resto = 0;
	for (var i = 0; i < preIban.length; i += 10) {
	  var dividendo = resto + "" + preIban.substr(i, 10);
	  resto = dividendo % divisor;
	}
				
	return resto;
      }

      function damePesoIBAN(letra) {
	var peso = "";
	letra = letra.toUpperCase();
	switch (letra) {
	  case 'A':
	    peso = "10";
	  break;
	  case 'B':
	    peso = "11";
	  break;
	  case 'C':
	    peso = "12";
	  break;
	  case 'D':
	    peso = "13";
	  break;
	  case 'E':
	    peso = "14";
	  break;
	  case 'F':
	    peso = "15";
	  break;
	  case 'G':
	    peso = "16";
	  break;
	  case 'H':
	    peso = "17";
	  break;
	  case 'I':
	    peso = "18";
	  break;
	  case 'J':
	    peso = "19";
	  break;
	  case 'K':
	    peso = "20";
	  break;
	  case 'L':
	    peso = "21";
	  break;
	  case 'M':
	    peso = "22";
	  break;
	  case 'N':
	    peso = "23";
	  break;
	  case 'O':
	    peso = "24";
	  break;
	  case 'P':
	    peso = "25";
	  break;
	  case 'Q':
	    peso = "26";
	  break;
	  case 'R':
	    peso = "27";
	  break;
	  case 'S':
	    peso = "28";
	  break;
	  case 'T':
	    peso = "29";
	  break;
	  case 'U':
	    peso = "30";
	  break;
	  case 'V':
	    peso = "31";
	  break;
	  case 'W':
	    peso = "32";
	  break;
	  case 'X':
	    peso = "33";
	  break;
	  case 'Y':
	    peso = "34";
	  break;
	  case 'Z':
	    peso = "35";
	  break;
	}
	return peso;
      }

      function compruebaCCC(entidad, sucursal, dc, nCuenta) {
	entidad = rellenaCeros(entidad, 4);
	sucursal = rellenaCeros(sucursal, 4);
	dc = rellenaCeros(dc, 2);
	nCuenta = rellenaCeros(nCuenta, 10);

	var concatenado = entidad + sucursal;
	var dc1 = calculaDCParcial(concatenado);
	var dc2 = calculaDCParcial(nCuenta);
	return (dc == (dc1 + dc2));
      }

      function calculaDCParcial(cadena) {
	var dcParcial = 0;
	var tablaPesos = [6, 3, 7, 9, 10, 5, 8, 4, 2, 1];
	var suma = 0;
	var i;
	for ( i = 0; i < cadena.length; i++) {
	  suma = suma + cadena.charAt(cadena.length - 1 - i) * tablaPesos[i];
	}
	dcParcial = (11 - (suma % 11));
	if (dcParcial == 11)
	  dcParcial = 0;
	else if (dcParcial == 10)
	  dcParcial = 1;
	return dcParcial.toString();
      }

      function rellenaCeros(numero, longitud) {
	var ceros = '';
	var i;
	numero = numero.toString();
	for ( i = 0; (longitud - numero.length) > i; i++) {
	  ceros += '0';
	}
	return ceros + numero;
      }
</script>
<?php } ?>
<?php } ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="<?php echo $site; ?>/assets/bootstrap/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="<?php echo $site; ?>/assets/js/prism.js"></script>
    <script src="<?php echo $site; ?>/assets/js/lunr.min.js"></script>
    <script src="<?php echo $site; ?>/assets/js/init.js"></script>
	
<?php if($_GET['action'] == 'new'){ ?>
	<?php //require 'assets/GET/search.php'; ?>
<?php } ?>
  </body>
</html>