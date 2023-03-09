<?php
require '../../inc/core.php';
$consultaBusqueda = $_POST['valorBusqueda'];
$mensaje = "";

if (isset($consultaBusqueda)) {

	//Selecciona todo de la tabla mmv001 
	//donde el nombre sea igual a $consultaBusqueda, 
	//o el apellido sea igual a $consultaBusqueda, 
	//o $consultaBusqueda sea igual a nombre + (espacio) + apellido
	//$consulta = mysql_query("SELECT * FROM contratos WHERE cod_verificacion='$consultaBusqueda'");
	//$consulta2 = mysql_query("SELECT * FROM contratos_importados WHERE dni_cif_titular='$consultaBusqueda' or codigo_comercial='$consultaBusqueda' or nombre_titular='$consultaBusqueda' or apellidos_titular='$consultaBusqueda' or telefono_pref_1='$consultaBusqueda' or correo_electron='$consultaBusqueda' or cod_verificacion='$consultaBusqueda' or cups_luz='$consultaBusqueda' or cups_gas='$consultaBusqueda' or cig='$consultaBusqueda' or estado_contrato='$consultaBusqueda' or user_contrato_intro='$consultaBusqueda'");
	//$consulta3 = mysql_query("SELECT * FROM alerts WHERE verificacion='$consultaBusqueda'");
	
	if (strlen($consultaBusqueda) < 14) {
		echo '
		<div class="alert alert-warning text-center" role="alert" style="margin-top: -7px;padding: 2px 30px;width: 338px;">
		  '. $consultaBusqueda .'...
		</div>
		';
	} else {
		$consulta = mysql_query("SELECT * FROM contratos WHERE cod_verificacion LIKE '%$consultaBusqueda%'");
		$consulta2 = mysql_query("SELECT * FROM contratos_importados WHERE cod_verificacion LIKE '%$consultaBusqueda%'");
		$consulta3 = mysql_query("SELECT * FROM alerts WHERE verificacion LIKE '%$consultaBusqueda%'");
	}
	
	$filas = mysql_num_rows($consulta); // Contratos
	$filas2 = mysql_num_rows($consulta2); // Contratos importados
	$filas3 = mysql_num_rows($consulta3); // Alertas
	if ($filas == 1) {
		while($resultados = mysql_fetch_array($consulta)) {
			$nombre = '
			<div class="alert alert-danger text-center" role="alert" style="padding: 2px 30px;width: 338px;">
			  Duplicado '. $consultaBusqueda .'
			</div>
			';
			$mensaje .= '' . $nombre . '';
		}
	} elseif($filas2 == 1) {
		while($resultados2 = mysql_fetch_array($consulta2)) {
			$nombre = '
			<div class="alert alert-danger text-center" role="alert" style="padding: 2px 30px;width: 338px;">
			  Duplicado importado '. $consultaBusqueda .'
			</div>
			';
			$mensaje .= '' . $nombre . '';
		}
	} elseif($filas3 == 1) {
		while($resultados3 = mysql_fetch_array($consulta3)) {
			$nombre = '
			<div class="alert alert-danger text-center" role="alert" style="padding: 2px 30px;width: 980px;">
			  <b>('. $consultaBusqueda .')</b> '. $resultados3[nota] .'
			</div>
			';
			$mensaje .= '' . $nombre . '';
		}
	} else {
		if(strlen($consultaBusqueda) < 14){
			$nombre = '
			<div class="alert alert-warning text-center" role="alert" style="padding: 2px 30px;width: 338px;">
			  Procesando... '. $consultaBusqueda .'
			</div>
			';
			$mensaje .= '' . $nombre . '';
		} else {
			$nombre = '
			<div class="alert alert-success text-center" role="alert" style="padding: 2px 30px;width: 338px;">
			  Código válido '. $consultaBusqueda .'
			</div>
			';
			$mensaje .= '' . $nombre . '';
		}
	}
	
	//if ($filas2 == 0) {
	//	$mensaje = "No se encuentra el contrato";
	//} else {
	//	while($resultados2 = mysql_fetch_array($consulta2)) {
	//		$nombre = '
	//		<div class="alert alert-danger" role="alert" style="padding: 2px 30px;width: 338px;">
	//		  Duplicado importado '. $consultaBusqueda .'
	//		</div>
	//		';
	//		$mensaje .= '' . $nombre . '';
	//	}
	//}
	
};

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>