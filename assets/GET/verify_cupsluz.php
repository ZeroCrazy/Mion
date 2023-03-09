<?php
require '../../inc/core.php';
$consultaBusqueda = $_POST['valorBusqueda'];
$mensaje = "";

if (isset($consultaBusqueda)) {

	//Selecciona todo de la tabla mmv001 
	//donde el nombre sea igual a $consultaBusqueda, 
	//o el apellido sea igual a $consultaBusqueda, 
	//o $consultaBusqueda sea igual a nombre + (espacio) + apellido
	//$consulta = mysql_query("SELECT * FROM contratos WHERE cups_luz='$xd'");
	//$consulta = mysql_query("SELECT * FROM contratos WHERE cups_luz LIKE '%$consultaBusqueda%'");
	//$consulta = mysql_query("SELECT * FROM contratos WHERE cups_luz='$consultaBusqueda'");
	
	if (strlen($consultaBusqueda) < 20) {
		echo '
		<div class="alert alert-warning text-center" role="alert" style="margin-top: -7px;padding: 2px 30px;width: 338px;">
		  '. $consultaBusqueda .'...
		</div>
		';
	} else {
		$consulta = mysql_query("SELECT * FROM contratos WHERE cups_luz LIKE '%$consultaBusqueda%'");
	}
	
	$filas = mysql_num_rows($consulta);
	if ($filas == 0) {
		$mensaje = "";
	} else {
		//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
		//echo 'Resultados para <strong>'.$consultaBusqueda.'</strong>';

		//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
		while($resultados = mysql_fetch_array($consulta)) { ?>
		<?php 
		//$nombre = '<font color="red">Duplicado (<a target="_blank" href="'.$config[site].'/index.php?page=edit_contract_id&id='.$resultados[id].'">ver</a>)</font>';
		$nombre = '
		<style>
		#busquedaCL{
			border-color: #dc3545 !important;
		}
		</style>
		<div class="alert alert-danger text-center" role="alert" style="margin-top: -7px;padding: 2px 30px;width: 338px;">
		  Duplicado <a style="color: #000000a3;" target="_blank" href="'.$config[site].'/index.php?page=edit_contract_id&id='.$resultados[id].'">'. $consultaBusqueda .'</A>
		</div>
		';
		$mensaje .= '' . $nombre . '';
			 ?>

		<?php };//Fin while $resultados

	}; //Fin else $filas
	
};

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>