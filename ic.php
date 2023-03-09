<?php
  require 'inc/core.php';
  if (isset($_SESSION['id'])) {} else {
  	header("Location: ". $config[site] ."/login.php");
  }
  $page = "Contratos";
  require 'templates/header.php';
  
  $dir_subida = 'excel/SUBIDA ESTADOS/';
  $fichero_subido = $dir_subida . basename('UPLOAD STATUS_'. date(y) .''. date(m) .''. date(d) . '_NAME_' . str_replace("xlsx", "xls", $_FILES['fichero_usuario']['name']));
  
?>
	  <div class="row">
		<div class="col s12 m12"><h4 class="white-text">&#187; Importador de estados</h4></div>
		<div class="col s12 m12">
  <ul class="collapsible" data-collapsible="accordion">
    <li>
      <div class="collapsible-header">Historial de estados</div>
      <div class="collapsible-body">
      <table class="centered">
        <thead>
          <tr>
              <th>Fecha act.</th>
              <th>Contrato</th>
              <th>Estado</th>
              <th>Opciones</th>
          </tr>
        </thead>

        <tbody>
		<?php $mm = mysql_query("SELECT * FROM contratos_estado_historial WHERE type='actualizacion' AND fecha='". date(d) ."-". date(m) ."-". date(Y) ."' ORDER BY estado DESC LIMIT 20"); while($m = mysql_fetch_assoc($mm)){ ?>	
		<?php $mmcm = mysql_query("SELECT * FROM contratos WHERE cod_verificacion='$m[cod_verificacion]'"); $c = mysql_fetch_assoc($mmcm); ?>
		  <tr<?php if($c['cod_verificacion'] == ''){ echo ' style="background: red;color: #fff !important;"'; } ?>>
		    <td style="padding: 2px;"><?php echo $m['fecha']; ?></td>
            <td style="padding: 2px;"><?php if($c['cod_verificacion'] == ''){ echo '<b style="color: #fff;">'.$m[cod_verificacion].'</b>'; } else { echo $c['cod_verificacion']; } ?></td>
			<td style="padding: 2px;"><?php echo $c['estado_contrato']; ?></td>
			<?php if($c['cod_verificacion'] == ''){ ?>
			<td></td>
			<?php } else { ?>
			<td style="padding: 2px;"><a href="<?php echo $site; ?>/index.php?page=edit_contract_id&id=<?php echo $c['id']; ?>" target="_blank"><i class="material-icons">remove_red_eye</i></a></td>
			<?php } ?>
          </tr>
		<?php } ?>
        </tbody>
      </table>
	  </div>
    </li>
  </ul>
		</div>
		<div class="col s12 m12">
		  <div class="card" style="box-shadow: none;text-align: center;">
            <div class="card-content grey-text">
<?php
if (move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], $fichero_subido)) {
	//echo 'Más información de depuración: ';
	//echo $dir_subida . 'UPLOAD STATUS_'. date(y) .''. date(m) .''. date(d) . '_NAME_' . $_FILES['fichero_usuario']['name'];
	$referencia = $_POST['referencia'];
	echo '<script>
	swal({
	  type: "success",
	  title: "Estados actualizados correctamente",
	  showConfirmButton: false
	})</script>
	
	';
	 $connect = mysqli_connect("localhost", "root", "", "mimatik");  
	 include ("excel/Classes/PHPExcel/IOFactory.php");
	 include ("excel/Classes/PHPExcel.php");
	 $html="      <table class='centered'>
        <thead>
          <tr>
              <th>Titular</th>
              <!--th>Cod. Verificación</th-->
              <th>Estado</th>
          </tr>
        </thead>";  
	 //$objPHPExcel = PHPExcel_IOFactory::load('excel/SUBIDA ESTADOS/UPLOAD STATUS_180328_NAME_xd.xls');  
	 $objPHPExcel = PHPExcel_IOFactory::load('excel/SUBIDA ESTADOS/UPLOAD STATUS_'. date(y) .''. date(m) .''. date(d) . '_NAME_' . str_replace("xlsx", "xls", $_FILES['fichero_usuario']['name']));
	 foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)   
	 {  
		  $highestRow = $worksheet->getHighestRow();  
		  for ($row=2; $row<=$highestRow; $row++)  
		  {
			   $html.="<tr>";  
			   $nombre = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(14, $row)->getValue());  
			   $apellido_titular = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(15, $row)->getValue());  
			   $cod_verificacion = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(19, $row)->getValue());  
			   $estado = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());  
			   $sql = "UPDATE contratos SET estado_contrato = '".$estado."' WHERE cod_verificacion = '".str_replace("V", "", $cod_verificacion)."'";
			   mysql_query("INSERT INTO contratos_estado_historial (type,user,fecha,estado,cod_verificacion) VALUES ('actualizacion','$user[username]','". date('d') ."-". date('m') ."-". date('Y') ."','".$estado."','".str_replace("V", "", $cod_verificacion)."')");
			   mysqli_query($connect, $sql);  
			   $html .= '<td>'.$nombre.' '.$apellido_titular.'</td>';
			   //$html.= '<td>'.str_replace("V", "", $cod_verificacion).'</td>';
			   $html .= '<td>'.$estado.'</td>';
			   $html .= "</tr>"; 
		  }  
	 }  
	 $html .= '</table>';  




	 //echo $html;
	 //echo '<br />Data Inserted';  
} else {
    //echo "¡Posible ataque de subida de ficheros!\n";
}

//print_r($_FILES);



?>
<style>
.upload {
	background: #eaeaea;
    padding: 9px 20px;
    border-radius: 3px;
}
</style>
<div class="row">
<form enctype="multipart/form-data" method="POST">
<div class="input-field col s12 m3"></div>
<div class="input-field col s12 m6">
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    <input class="upload" name="fichero_usuario" type="file" />
	<br><br>
    <input class="waves-effect waves-light" type="submit" value="Actualizar contratos" />
</form>
</div>
</div>

            </div>
          </div>
		  
		  <?php if($html){ ?>
		  <div class="card" style="box-shadow: none;text-align: center;">
            <div class="card-content grey-text">
			  <div style="height: 400px;overflow: auto;">
				<?php echo $html; ?>
			  </div>
			</div>
		  </div>
		  <?php } ?>
		</div>
      </div>