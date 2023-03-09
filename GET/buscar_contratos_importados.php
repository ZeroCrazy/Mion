<?php
require '../inc/core.php';
$consultaBusqueda = $_POST['valorBusqueda'];
$mensaje = "";

if (isset($consultaBusqueda)) {

	//Selecciona todo de la tabla mmv001 
	//donde el nombre sea igual a $consultaBusqueda, 
	//o el apellido sea igual a $consultaBusqueda, 
	//o $consultaBusqueda sea igual a nombre + (espacio) + apellido
	$consulta = mysql_query("SELECT * FROM contratos_importados WHERE cod_postal_ps='$consultaBusqueda' or dni_cif_titular='$consultaBusqueda' or codigo_comercial='$consultaBusqueda' or nombre_titular='$consultaBusqueda' or apellidos_titular='$consultaBusqueda' or telefono_pref_1='$consultaBusqueda' or correo_electron='$consultaBusqueda' or cod_verificacion='$consultaBusqueda' or cups_luz='$consultaBusqueda' or cups_gas='$consultaBusqueda' or cig='$consultaBusqueda' or estado_contrato='$consultaBusqueda' or user_contrato_intro='$consultaBusqueda'");
	
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
  <a style="text-transform: uppercase;" href="#">'. $resultados['nombre_titular'] .' '. $resultados['apellidos_titular'] .'</span></a>
  | <span style="text-transform: capitalize;">WE '. $resultados['we_dia'] .'/'. $resultados['we_mes'] .'</span><hr>
  Gerente: '. $resultados['gerente'] .'<br>
  Subgerente: '. $resultados['subgerente'] .' ('. $resultados['oficina'] .')<br>
  Motivo: '. $resultados['motivo'] .'<br>
  <b>'. $resultados['estado_contrato'] .'</b><br>
  <b>'. $resultados['revisado_contrato1'] .'</b><br>
  DNI: '. $resultados['dni_cif_titular'] .'<br>
  TLF: '. $resultados['telefono_pref_1'] .'<br>
  Código Verificación: '. $resultados['cod_verificacion'] .'<br>
  Cups luz: '. $resultados['cups_luz'] .'<br>
  Cups gas: '. $resultados['cups_gas'] .'
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