<?php
require '../inc/core.php';
$consultaBusqueda = $_POST['valorBusqueda'];
$mensaje = "";

if (isset($consultaBusqueda)) {

	$consulta = mysql_query("SELECT * FROM click_comerciales WHERE distribuidor='$consultaBusqueda' or gerente='$consultaBusqueda' or nombre='$consultaBusqueda' or primer_apellido='$consultaBusqueda' or segundo_apellido='$consultaBusqueda' or oficina='$consultaBusqueda' or zona_edp='$consultaBusqueda' or codigo_interno='$consultaBusqueda' or petic='$consultaBusqueda' or recep='$consultaBusqueda' or observaciones='$consultaBusqueda' or observaciones_style='$consultaBusqueda' ORDER BY distribuidor,fecha_baja");
	
	$filas = mysql_num_rows($consulta);
	if ($filas == 0) {
		$mensaje = "No se encuentra el comercial";
	} else {
		//echo 'Resultados para <strong>'.$consultaBusqueda.'</strong>';

		//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
		while($resultados = mysql_fetch_array($consulta)) { ?>
		<?php 
$fecha_baja = new DateTime("". str_replace("/", "-", $resultados[fecha_baja]) ."");
$fecha_alta = new DateTime("". str_replace("/", "-", $resultados[fecha_alta]) ."");
$fecha_hoy = new DateTime("". date('d') . "-" . date('m') . "-" . date('Y') ."");

if($fecha_hoy > $fecha_baja) {
	// rojo
$nombre = '
<li class="responsive-table centered card card-content" style="background: red;display: block;padding: 0px;border-radius: 0px;border: 1px solid #444;box-shadow: none;margin: 1px;">
  <a style="color: #fff;text-transform: uppercase;" href="index.php?page=pagos&edit_comercial='. $resultados['id'] .'">(<b>'. $resultados['distribuidor'] .'</b> &#187; '. $resultados['gerente'] .') <b>'. $resultados['nombre'] .' '. $resultados['primer_apellido'] .' '. $resultados['segundo_apellido'] .'</b></span></a>
</li>
';
} else {
	// verde
$nombre = '
<li class="responsive-table centered card card-content" style="background: green;display: block;padding: 0px;border-radius: 0px;border: 1px solid #444;box-shadow: none;margin: 1px;">
  <a style="color: #fff;text-transform: uppercase;" href="index.php?page=pagos&edit_comercial='. $resultados['id'] .'">(<b>'. $resultados['distribuidor'] .'</b> &#187; '. $resultados['gerente'] .') <b>'. $resultados['nombre'] .' '. $resultados['primer_apellido'] .' '. $resultados['segundo_apellido'] .'</b></span></a>
</li>
		
		';
}
		
$mensaje .= '' . $nombre . '';
			 ?>

		<?php };//Fin while $resultados

	}; //Fin else $filas
	
};

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>