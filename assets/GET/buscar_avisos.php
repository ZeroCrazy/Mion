<?php
require '../../inc/core.php';
$consultaBusqueda = $_POST['valorBusqueda'];
$mensaje = "";

if (isset($consultaBusqueda)) {

	//Selecciona todo de la tabla mmv001 
	//donde el nombre sea igual a $consultaBusqueda, 
	//o el apellido sea igual a $consultaBusqueda, 
	//o $consultaBusqueda sea igual a nombre + (espacio) + apellido
	$consulta = mysql_query("SELECT * FROM alerts WHERE nif='$consultaBusqueda' or codigo_comercial='$consultaBusqueda' or verificacion='$consultaBusqueda'");
	
	$filas = mysql_num_rows($consulta);
	if ($filas == 0) {
		$mensaje = "No se encuentra el aviso";
	} else {
		//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
		//echo 'Resultados para <strong>'.$consultaBusqueda.'</strong>';

		//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
		while($resultados = mysql_fetch_array($consulta)) { ?>
		<?php 
		$nombre = '
<li class="responsive-table centered card card-content" style="display: block;padding: 7px;border-radius: 0px;border: 1px solid #444;box-shadow: none;margin: 1px;">
  <a style="text-transform: uppercase;" href="#">'. $resultados['nif'] .' '. $resultados['codigo_comercial'] .' '. $resultados['verificacion'] .'</span></a></span><hr>
  <b>Fecha:</b> '. substr($resultados['fecha'], 8, 2) .'/'. substr($resultados['fecha'], 5, 2) .'/'. substr($resultados['fecha'], 0, 4) .' a las '. substr($resultados['fecha'], 11, 8) .'<br>
  <hr>
  <b>Nota:</b> '. $resultados['nota'] .'
  <hr>
  <b>Creado por:</b> '. $resultados['user_added'] .'
</li>
		
		';
$mensaje .= '' . $nombre . '';
			 ?>

		<?php };//Fin while $resultados

	}; //Fin else $filas
	
};

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>