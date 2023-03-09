<?php
require '../inc/core.php';
$consultaBusqueda = $_POST['valorBusqueda'];
$mensaje = "";

if (isset($consultaBusqueda)) {

	//Selecciona todo de la tabla mmv001 
	//donde el nombre sea igual a $consultaBusqueda, 
	//o el apellido sea igual a $consultaBusqueda, 
	//o $consultaBusqueda sea igual a nombre + (espacio) + apellido
	$consulta = mysql_query("SELECT * FROM click_comerciales WHERE codigo_interno='$consultaBusqueda'");
	$consulta2 = mysql_query("SELECT * FROM alerts WHERE codigo_comercial='$consultaBusqueda'");
	
	$filas = mysql_num_rows($consulta);
	if ($filas == 0) {
		$mensaje = "Comercial no encontrado";
	} else {
		//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
		//echo 'Resultados para <strong>'.$consultaBusqueda.'</strong>';

		//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
		while($resultados = mysql_fetch_array($consulta)) { ?>
		<?php 
$fecha_baja = new DateTime("". str_replace("/", "-", $resultados[fecha_baja]) ."");
$fecha_alta = new DateTime("". str_replace("/", "-", $resultados[fecha_alta]) ."");
$fecha_hoy = new DateTime("". date('d') . "-" . date('m') . "-" . date('Y') ."");
if($fecha_hoy > $fecha_baja) {
		$nombre = '<div style="padding: 20px;"><font color="red"><span style="font-size: 14px;"><b>Gerente:</b> ' . $resultados['gerente'] . '<br><b>Subgerente:</b> ' . $resultados['subgerente'] . '' . '<br><b>Oficina:</b> ' . '' . $resultados['oficina'] . '</span><br><b>Comercial:</b><br><span style="font-size: 12px;">' . $resultados['nombre'] . ' ' . $resultados['primer_apellido'] . ' ' . $resultados['segundo_apellido'] . '	</font><div style="font-weight: bold;font-size: 12px;">BAJA: '. $resultados[fecha_baja] .'</div></div>';
		//Output
} else {
		$nombre = '<div style="padding: 20px;"><font color="green"><span style="font-size: 14px;"><b>Gerente:</b> ' . $resultados['gerente'] . '<br><b>Subgerente:</b> ' . $resultados['subgerente'] . '' . '<br><b>Oficina:</b> ' . '' . $resultados['oficina'] . '</span><br><b>Comercial:</b><br><span style="font-size: 12px;">' . $resultados['nombre'] . ' ' . $resultados['primer_apellido'] . ' ' . $resultados['segundo_apellido'] . '	</font></div>';
		//Output
}
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
	
};

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
echo $aviso_alerta;
?>