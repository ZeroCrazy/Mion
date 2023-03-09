<?php
require '../inc/core.php';
$consultaBusqueda = $_POST['valorBusqueda'];
$mensaje = "";

if (isset($consultaBusqueda)) {

	//Selecciona todo de la tabla mmv001 
	//donde el nombre sea igual a $consultaBusqueda, 
	//o el apellido sea igual a $consultaBusqueda, 
	//o $consultaBusqueda sea igual a nombre + (espacio) + apellido
	$consulta = mysql_query("SELECT * FROM contratos WHERE cod_postal_ps='$consultaBusqueda' or dni_cif_titular='$consultaBusqueda' or codigo_comercial='$consultaBusqueda' or nombre_titular='$consultaBusqueda' or apellidos_titular='$consultaBusqueda' or telefono_pref_1='$consultaBusqueda' or correo_electron='$consultaBusqueda' or cod_verificacion='$consultaBusqueda' or cups_luz='$consultaBusqueda' or cups_gas='$consultaBusqueda' or cig='$consultaBusqueda' or estado_contrato='$consultaBusqueda' or user_contrato_intro='$consultaBusqueda'");
	
	$filas = mysql_num_rows($consulta);
	if ($filas == 0) {
		$mensaje = "No se encuentra el contrato";
	} else {
		//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
		//echo 'Resultados para <strong>'.$consultaBusqueda.'</strong>';

		//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
		while($resultados = mysql_fetch_array($consulta)) { ?>
		<?php 
		$nombre = '
<li class="responsive-table centered card card-content" style="display: block;padding: 0px;border-radius: 0px;border: 1px solid #444;box-shadow: none;margin: 1px;">
  <form method="POST">
  <button type="submit" name="delete_contract_'. $resultados['id'] .'" class="btn waves-effect waves-light tooltipped #f44336 red" style="border: 2px solid #fff;padding: 0px 12px;height: 20px;float: left;" data-position="top" data-style="rounded" data-delay="50" data-tooltip="Eliminar"></button>
  </form>			    
  <a style="text-transform: uppercase;" href="index.php?page=edit_contract_id&id='. $resultados['id'] .'">'. $resultados['nombre_titular'] .' '. $resultados['apellidos_titular'] .'</span></a>
  | <span style="text-transform: capitalize;">'. $resultados['estado_contrato'] .'</span>
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