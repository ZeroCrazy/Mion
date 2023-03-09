<?php
require '../inc/core.php';
$consultaBusqueda = $_POST['valorBusqueda'];
$mensaje = "";

if (isset($consultaBusqueda)) {

	//Selecciona todo de la tabla mmv001 
	//donde el nombre sea igual a $consultaBusqueda, 
	//o el apellido sea igual a $consultaBusqueda, 
	//o $consultaBusqueda sea igual a nombre + (espacio) + apellido
	$consulta = mysql_query("SELECT * FROM contratos WHERE cod_verificacion='$consultaBusqueda'");
	$consulta2 = mysql_query("SELECT * FROM alerts WHERE verificacion='$consultaBusqueda'");
	$consulta3 = mysql_query("SELECT * FROM contratos_importados WHERE cod_verificacion='$consultaBusqueda'");
	
	$filas = mysql_num_rows($consulta);
	if ($filas == 0) {
		$mensaje = "";
	} else {
		//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
		//echo 'Resultados para <strong>'.$consultaBusqueda.'</strong>';

		//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
		while($resultados = mysql_fetch_array($consulta)) { ?>
		<?php 
		$nombre = '<font color="red">Duplicado (<a target="_blank" href="'.$config[site].'/index.php?page=edit_contract_id&id='.$resultados[id].'">ver</a>)</font>';
		$mensaje .= '' . $nombre . '';
			 ?>

		<?php };//Fin while $resultados

	}; //Fin else $filas
	
	$filas2 = mysql_num_rows($consulta2);
	if ($filas2 == 0) {
		$aviso_alerta = "";
	} else {
		//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
		//echo 'Resultados para <strong>'.$consultaBusqueda.'</strong>';

		//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
		while($r = mysql_fetch_array($consulta2)) { ?>
		<?php 
		$nombre2 = '<font color="red" style="background: #000;z-index: 99999999;position: relative;"><b>ALERTA!</b> '. $r[nota] .'</font><br>';
		$aviso_alerta .= '' . $nombre2 . '';
			 ?>

		<?php };//Fin while $resultados

	}; //Fin else $filas
	
	$filas3 = mysql_num_rows($consulta3);
	if ($filas3 == 0) {
		$aviso_importado = "";
	} else {
		//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
		//echo 'Resultados para <strong>'.$consultaBusqueda.'</strong>';

		//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
		while($r = mysql_fetch_array($consulta3)) { ?>
		<?php 
		$nombre3 = '<font color="red" style="background: #000;z-index: 99999999;position: relative;">Código de verificación ya introducido (importado)</font><br>';
		$aviso_importado .= '' . $nombre3 . '';
			 ?>

		<?php };//Fin while $resultados

	}; //Fin else $filas
	
};

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
echo $aviso_alerta;
echo $aviso_importado;
?>