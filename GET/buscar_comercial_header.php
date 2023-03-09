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
	
	$filas = mysql_num_rows($consulta);
	if ($filas == 0) {
		$mensaje = "<div class='resultadoBusquedaX'>Comercial no encontrado</div>";
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
		$nombre = '<div class="resultadoBusquedaX"><font color="red">
		' . $resultados[nombre] . ' ' . $resultados[primer_apellido] . ' ' . $resultados[segundo_apellido] . ' (' . $resultados[gerente] . ' / ' . $resultados[subgerente] . ') ('. $resultados[oficina] .')</font>
		<div style="margin-top: -33px;font-size: 12px;text-align: left;font-weight: bold;">BAJA: '. $resultados[fecha_baja] .'</div></div>';
		//Output
} else {
		$nombre = '<div class="resultadoBusquedaX"><font color="green">
		' . $resultados[nombre] . ' ' . $resultados[primer_apellido] . ' ' . $resultados[segundo_apellido] . ' (' . $resultados[gerente] . ' / ' . $resultados[subgerente] . ') ('. $resultados[oficina] .')</font></div>';
		//Output
}
$mensaje .= '' . $nombre . '';
			 ?>

		<?php };//Fin while $resultados

	}; //Fin else $filas
	
};

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>