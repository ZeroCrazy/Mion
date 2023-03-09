<?php
require '../inc/core.php';
$consultaBusqueda = $_POST['valorBusqueda'];
$mensaje = "";

if (isset($consultaBusqueda)) {
	$consulta = mysql_query("SELECT * FROM contratos_provincias WHERE codigo_postal='". substr($consultaBusqueda, 0, 2) ."'");
	
	$filas = mysql_num_rows($consulta);
	if ($filas == 0) {
		$mensaje = "Provincia no encontrada";
	} else {
		//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
		//echo 'Resultados para <strong>'.$consultaBusqueda.'</strong>';

		//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
		while($resultados = mysql_fetch_array($consulta)) { ?>
		<?php 
		
		$nombre = ''. $resultados[provincia] .'';
		$mensaje .= '' . $nombre . '';
		
		?>

		<?php };

	};
	
};

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>