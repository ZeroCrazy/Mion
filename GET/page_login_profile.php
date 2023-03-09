<?php
require '../inc/core.php';
$consultaBusqueda = $_POST['valorBusqueda'];
$mensaje = "";

if (isset($consultaBusqueda)) {

	//Selecciona todo de la tabla mmv001 
	//donde el nombre sea igual a $consultaBusqueda, 
	//o el apellido sea igual a $consultaBusqueda, 
	//o $consultaBusqueda sea igual a nombre + (espacio) + apellido
	$consulta = mysql_query("SELECT * FROM users WHERE username='$consultaBusqueda'");
	
	$filas = mysql_num_rows($consulta);
	if ($filas == 0) {
		$mensaje = '<div class="minilogoperfil"></div><img style="width: 167px;border-radius: 5px;border: 4px solid #fff;" src="images/profile.png">';
	} else {
		//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
		//echo 'Resultados para <strong>'.$consultaBusqueda.'</strong>';

		//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
		while($resultados = mysql_fetch_array($consulta)) { ?>
		<?php 
		$nombre = '<div class="minilogoperfil"></div><img style="width: 167px;border-radius: 5px;border: 4px solid #fff;" src="' . $resultados['profile'] . '">';
		$mensaje .= '' . $nombre . '';
			 ?>

		<?php };//Fin while $resultados

	}; //Fin else $filas
	
};

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>