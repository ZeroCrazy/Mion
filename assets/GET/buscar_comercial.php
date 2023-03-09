<?php
require '../../inc/core.php';
$consultaBusqueda = $_POST['valorBusqueda'];
$mensaje = "";

if (isset($consultaBusqueda)) {
	$consulta = mysql_query("SELECT * FROM alerts WHERE codigo_comercial='$consultaBusqueda'");
	$consulta2 = mysql_query("SELECT * FROM click_comerciales WHERE codigo_interno='$consultaBusqueda'");
	
	$filas = mysql_num_rows($consulta);
	if ($filas == 1) {
		while($row = mysql_fetch_array($consulta)) {
			// CONSULTA CÓDIGO COMERCIAL BLOQUEADO
			$nombre = 'CUIDAO COLEGA';
			$mensaje .= '' . $nombre . '';
		};
	} else {
		$filas2 = mysql_num_rows($consulta2);
		if ($filas2 == 0) {
			$mensaje = '
			<div class="alert alert-warning text-center" role="alert" style="margin-top: -7px;padding: 2px 30px;width: 683px;">
				  No se encuentra <b>'. $consultaBusqueda .'</b>
			</div>
			';
		} else {
			while($row = mysql_fetch_array($consulta2)) { ?>
		<?php 
				if($row['fecha_baja'] == ''){
					// CONSULTA INFORMACIÓN COMERCIAL SI NO ESTÁ DE BAJA
					$nombre = '
					<style>#search{border-color: #28a745;}</style>
					<div class="alert alert-success text-center" role="alert" style="margin-top: -7px;padding: 2px 30px;width: 683px;">
					'. $row[nombre] .' '. $row[primer_apellido] .' '. $row[segundo_apellido] .' '. $row[nombre] .' ('. $row[subgerente] .')
					</div>
					';
				} else {
					// CONSULTA INFORMACIÓN COMERCIAL SI ESTÁ DE BAJA
					$nombre = '
					<style>#search{border-color: #dc3545;}</style>
					<div class="alert alert-danger text-center" role="alert" style="margin-top: -7px;padding: 2px 30px;width: 683px;">
					'. $row[nombre] .' '. $row[primer_apellido] .' '. $row[segundo_apellido] .' '. $row[nombre] .' ('. $row[subgerente] .')
					</div>
					';
				}
				$mensaje .= '' . $nombre . '';
		?>

	  <?php };
		};
	};
};

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>