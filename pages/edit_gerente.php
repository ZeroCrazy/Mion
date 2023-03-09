		<?php if($_GET['edit_comercial']){ ?>
		<?php $cc_sql = mysql_query("SELECT * FROM click_comerciales WHERE id='$_GET[edit_comercial]' LIMIT 1"); while($cc = mysql_fetch_assoc($cc_sql)){ ?>
		<div class="row">
		<div class="col s12 m12">
		  <div class="card">
            <div class="card-content black-text">
              <span class="card-title center"><b>COMERCIAL:</b> <?php echo $cc['nombre']; ?> <?php echo $cc['primer_apellido']; ?> <?php echo $cc['segundo_apellido']; ?></span>
              <span class="card-title center" style="font-size: 14px;margin-top: -18px;"><?php if($cc['nif'] == ''){ echo '<i style="color: red;">sin dni</i>'; } else { ?><?php echo $cc['nif']; ?><?php } ?></span>
<?php
if (isset($_POST['actualizarcomercial'])) {
$nombre = $_POST['nombre'];
$primer_apellido = $_POST['primer_apellido'];
$segundo_apellido = $_POST['segundo_apellido'];
$nif = $_POST['nif'];
$codigo_interno = $_POST['codigo_interno'];
$laboral = $_POST['laboral'];
$fecha_alta = $_POST['fecha_alta'];
$petic = $_POST['petic'];
$recep = $_POST['recep'];
$fecha_baja = $_POST['fecha_baja'];

$observaciones = $_POST['observaciones'];
$observaciones_2 = $_POST['observaciones_2'];
$observaciones_3 = $_POST['observaciones_3'];

$observaciones_style = $_POST['observaciones_style'];
mysql_query("UPDATE click_comerciales SET nombre='". strtoupper($nombre) ."', primer_apellido='". strtoupper($primer_apellido) ."', segundo_apellido='". strtoupper($segundo_apellido) ."', nif='". strtoupper($nif) ."', codigo_interno='$codigo_interno',
laboral='$laboral', fecha_alta='$fecha_alta', petic='". strtoupper($petic) ."', recep='". strtoupper($recep) ."', fecha_baja='$fecha_baja',
observaciones='". strtoupper($observaciones) ."', observaciones_2='". strtoupper($observaciones_2) ."', observaciones_3='". strtoupper($observaciones_3) ."', observaciones_style='$observaciones_style' WHERE id='$cc[id]'");
echo '<script>sweetAlert("Perfecto!", "Comercial actualizado correctamente", "success");</script>';
echo "<META HTTP-EQUIV='Refresh' CONTENT='1; URL=$site/index.php?page=gerentes'>";
}
?>
	  <form method="POST">
	  <div class="row">
	  <div class="input-field col s12 m6">
	  <table class="striped centered">
        <tbody>
          <tr>
            <td><b style="font-size: 18px;font-weight: 300;">NOMBRE</b></td>
            <td><input type="text" name="nombre" value="<?php echo $cc['nombre']; ?>"/></td>
          </tr>
		  <tr>
            <td><b style="font-size: 18px;font-weight: 300;">1º APELLIDO</b></td>
            <td><input type="text" name="primer_apellido" value="<?php echo $cc['primer_apellido']; ?>"/></td>
          </tr>
		  <tr>
            <td><b style="font-size: 18px;font-weight: 300;">2º APELLIDO</b></td>
            <td><input type="text" name="segundo_apellido" value="<?php echo $cc['segundo_apellido']; ?>"/></td>
          </tr>
		  <tr>
            <td><b style="font-size: 18px;font-weight: 300;">NIF</b></td>
            <td><input type="text" name="nif" value="<?php echo $cc['nif']; ?>"/></td>
          </tr>
		  <tr>
            <td><b style="font-size: 18px;font-weight: 300;">C. COMERCIAL</b></td>
            <td><input type="text" name="codigo_interno" value="<?php echo $cc['codigo_interno']; ?>"/></td>
          </tr>
        </tbody>
      </table>
	  </div>
	  <div class="input-field col s12 m6">
	  <table class="striped centered">
        <tbody>
          <tr>
            <td><b style="font-size: 18px;font-weight: 300;">LABORAL</b></td>
            <td><input type="text" name="laboral" value="<?php echo $cc['laboral']; ?>"/></td>
          </tr>
		  <tr>
            <td><b style="font-size: 18px;font-weight: 300;">FECHA ALTA</b></td>
            <td><input type="text" name="fecha_alta" value="<?php echo $cc['fecha_alta']; ?>"/></td>
          </tr>
		  <tr>
            <td><b style="font-size: 18px;font-weight: 300;">PETIC</b></td>
            <td>
  <select class="browser-default" name="petic">
    <?php if($cc['petic'] == ''){ ?>
	<option value="" disabled selected>Selecciona una petic</option>
	<?php } else { ?>
	<option value="<?php echo $cc['petic']; ?>" selected><?php echo $cc['petic']; ?></option>
	<?php } ?>
    <option value="No solicitar">No solicitar</option>
    <option value="Por confirmar">Por confirmar</option>
    <option value="pte. solic.">Pte. Solic.</option>
    <option value="pte. solic. (sin foto)">Pte. Solic. (sin foto)</option>
    <option value="pte. solic. baja">Pte. Solic. BAJA</option>
    <option value="sin dni">Sin dni</option>
    <option value="sin foto">sin foto</option>
  </select>
  <br>
			</td>
          </tr>
		  <tr>
            <td><b style="font-size: 18px;font-weight: 300;">RECEP</b></td>
            <td><input type="text" name="recep" value="<?php echo $cc['recep']; ?>"/></td>
          </tr>
		  <tr>
            <td><b style="font-size: 18px;font-weight: 300;">FECHA BAJA</b></td>
            <td><input type="text" name="fecha_baja" value="<?php echo $cc['fecha_baja']; ?>"/></td>
          </tr>
        </tbody>
      </table>
	  </div>
	  <div class="input-field col s12 m3">
		<textarea id="textarea2" name="observaciones_2" class="materialize-textarea" data-length="999"><?php echo $cc['observaciones_2']; ?></textarea>
        <label for="textarea2">Nota</label>
	  </div>
	  <div class="input-field col s12 m2">
    <br>
	<select name="observaciones">
      <?php if($cc['observaciones'] == ''){ ?>
	  <option value="" disabled selected>Observaciones</option>
	  <?php } else { ?>
	  <option value="<?php echo $cc['observaciones']; ?>"><?php echo $cc['observaciones']; ?></option>
	  <?php } ?>
      <option value="a medias">A medias</option>
      <option value="ctaima off">ctaima off</option>
      <option value="ctaima on">ctaima on</option>
      <option value="no">No</option>
      <option value="no ctaima">No ctaima</option>
      <option value="pte ctaima">Pte ctaima</option>
    </select>
    <label>Observaciones</label>
	<?php if($cc['observaciones'] == 'a medias'){ ?>
	<input type="hidden" name="observaciones_style" value="orange">
	<?php } elseif($cc['observaciones'] == 'ctaima off') { ?>
	<input type="hidden" name="observaciones_style" value="red">
	<?php } elseif($cc['observaciones'] == 'ctaima on') { ?>
	<input type="hidden" name="observaciones_style" value="blue">
	<?php } elseif($cc['observaciones'] == 'no') { ?>
	<input type="hidden" name="observaciones_style" value="red">
	<?php } elseif($cc['observaciones'] == 'no ctaima') { ?>
	<input type="hidden" name="observaciones_style" value="red">
	<?php } ?>
	  </div>
  <div class="input-field col s12 m3">
    <br>
	<select class="icons" name="observaciones_style">
      <?php if($cc['observaciones_style'] == ''){ ?>
	  <option value="" disabled selected>CTAIMA COLOR</option>
	  <?php } else { ?>
	  <option value="<?php echo $cc['observaciones_style']; ?>" data-icon="images/<?php echo $cc['observaciones_style']; ?>.png" class="circle" selected><?php if($cc['observaciones_style'] == 'red'){ echo 'Rojo'; } elseif($cc['observaciones_style'] == 'blue'){ echo 'Azul'; } elseif($cc['observaciones_style'] == 'yellow'){ echo 'Amarillo'; } else { echo 'Naranja'; } ?></option>
	  <?php } ?>
      <option value="red" data-icon="images/red.png" class="circle">Rojo</option>
      <option value="blue" data-icon="images/blue.png" class="circle">Azul</option>
      <option value="yellow" data-icon="images/yellow.png" class="circle">Amarillo</option>
      <option value="orange" data-icon="images/orange.png" class="circle">Naranja</option>
    </select>
    <label>CTAIMA COLOR</label>
  </div>
	  <div class="input-field col s12 m4">
		<textarea id="textarea3" name="observaciones_3" class="materialize-textarea" data-length="999"><?php echo $cc['observaciones_3']; ?></textarea>
        <label for="textarea3">Observaciones 3</label>
	  </div>
	  <div class="input-field col s12 m12">
 <button class="btn waves-effect waves-light" type="submit" name="actualizarcomercial" style="width: 100%;background: #444;">Actualizar
    <i class="material-icons right">send</i>
  </button>
	  </div>
	  </div>
	  </form>
            </div>
          </div>
		</div>
		</div>
		<?php }} ?>
<?php $g_sql = mysql_query("SELECT * FROM click_gerentes WHERE id='$_GET[id]'"); while($g = mysql_fetch_assoc($g_sql)){
$gx_sql = mysql_query("SELECT * FROM click_comerciales WHERE gerente = '$g[gerente]' AND poblacion = '$g[poblacion]'");$gx = mysql_fetch_assoc($gx_sql)	?>
      <div class="row">
        <div class="col s12 m3">
          <div class="card">
            <div class="card-content black-text">
              <span class="card-title center"><?php echo $g['gerente']; ?></span>
              <span class="card-title center" style="font-size: 14px;margin-top: -18px;"><?php echo $g['distribuidor']; ?></span>
			  <img style="width: 100%;" src="<?php echo $site; ?>/images/comerciales/ZONA_<?php echo $gx['zona_edp']; ?>/<?php echo $gx['poblacion']; ?>/<?php echo $g['gerente']; ?>.jpg">
              <p class="center"><b>Población:</b> <?php echo $g['poblacion']; ?></p>
			  <?php $mmm = mysql_query("SELECT * FROM click_comerciales WHERE gerente='$g[gerente]'"); $m = mysql_fetch_assoc($mmm); ?>
              <p class="center"><b>Zona EDP:</b> <?php echo $m['zona_edp']; ?></p>
            </div>
          </div>
		  
		  <a href="<?php echo $site; ?>/index.php?page=edit_gerente&id=<?php echo $_GET['id']; ?>&action=add_comercial" class="waves-effect waves-light btn" style="width: 100%;background: #444;">Nuevo comercial</a>
		  <?php if($_GET['action'] == 'add_comercial') { ?>
<?php
if (isset($_POST['newcomercial'])) {
	$codigo_interno = $_POST['codigo_interno'];
	$nombre = $_POST['nombre'];
	$primer_apellido = $_POST['primer_apellido'];
	$segundo_apellido = $_POST['segundo_apellido'];
	$nif = $_POST['nif'];
  mysql_query("INSERT INTO click_comerciales (distribuidor,gerente,poblacion,zona_edp,codigo_interno,nombre,primer_apellido,segundo_apellido,nif,fecha_alta) 
  VALUES ('". strtoupper($g[distribuidor]) ."','". strtoupper($g[gerente]) ."','". strtoupper($g[poblacion]) ."','". strtoupper($gx[zona_edp]) ."','$codigo_interno','". strtoupper($nombre) ."','". strtoupper($primer_apellido) ."','". strtoupper($segundo_apellido) ."','". strtoupper($nif) ."','". date(d) ."/". date(m) ."/". date(Y) ."')");
  echo  '<script>sweetAlert("Perfecto!", "Comercial creado correctamente", "success");</script>';
  echo "<META HTTP-EQUIV='Refresh' CONTENT='1; URL=$site/index.php?page=edit_gerente&id=$_GET[id]'>";
	}
?>
		  <form method="POST">
		  <div class="card">
            <div class="card-content black-text">
              <span class="card-title center">COMERCIAL</span>
			  <input class="validate center" type="text" name="nombre" placeholder="NOMBRE" required>
			  <input class="validate center" type="text" name="primer_apellido" placeholder="1er APELLIDO">
			  <input class="validate center" type="text" name="segundo_apellido" placeholder="2do APELLIDO">
			  <input class="validate center" type="text" name="nif" placeholder="NIF" maxlength="9" data-length="9" required>
			  <?php $cx_sql = mysql_query("SELECT * FROM click_comerciales ORDER BY codigo_interno DESC LIMIT 1"); $cx = mysql_fetch_assoc($cx_sql); ?>
			  <input class="validate center" type="text" name="codigo_interno" value="<?php  echo $cx['codigo_interno']+1; ?>" placeholder="CÓDIGO INTERNO" maxlength="5" data-length="5" required>
			  <input class="validate center" type="text" placeholder="Población: <?php echo $g['poblacion']; ?>" disabled>
			  <button type="submit" name="newcomercial" href="<?php echo $site; ?>/index.php?page=edit_gerente&id=<?php echo $_GET['id']; ?>&action=add_comercial" class="waves-effect waves-light btn" style="width: 100%;background: #444;">Finalizar</button>
            </div>
          </div>
		  </form>
		  <?php } ?>
        </div>
		<div class="col s12 m9">
          <div class="card">
            <div class="card-content black-text">
              <span class="card-title center">COMERCIALES</span>
			  <table class="striped centered responsive-table">
				<thead>
				  <tr>
					  <th>NOMBRE</th>
					  <th>NIF</th>
					  <th>CÓDIGO</th>
					  <th>CTAIMA</th>
					  <th>OPCIONES</th>
				  </tr>
				</thead>
				<style>
				td, th {
					padding: 2px 5px !important;
				}
				</style>
				<tbody>
				<?php $c_sql = mysql_query("SELECT * FROM click_comerciales WHERE gerente = '$g[gerente]' AND poblacion = '$g[poblacion]' ORDER BY codigo_interno"); while($c = mysql_fetch_assoc($c_sql)){ ?>
				  <tr<?php if($c['estado'] == ''){ ?><?php } else { echo ' style="background: '. $c[estado] .';"'; } ?>>
					<td><?php echo $c['nombre']; ?> <?php echo $c['primer_apellido']; ?> <?php echo $c['segundo_apellido']; ?></td>
					<td><?php echo $c['nif']; ?></td>
					<td><?php echo $c['codigo_interno']; ?></td>
					<td><button class="btn waves-effect waves-light tooltipped" style="border: 2px solid #fff;margin-top: -2px;background: <?php echo $c['observaciones_style']; ?>;padding: 0px 12px;height: 20px;" <?php if($c['observaciones'] == ''){} else { ?>data-position="top" data-delay="50" data-tooltip="<?php echo $c['observaciones']; ?>"<?php } ?>></button></td>
					<td>
					<?php
					  if (isset($_POST['editarestado_red_'. $c[id] .''])) {
					  $editarestado_red = $_POST['editarestado_red'];
					  mysql_query("UPDATE click_comerciales SET estado='#f27474', estadouser='0', fecha_baja='". date(d) ."/". date(m) ."/". date(Y) ."' WHERE id='$c[id]'");
					  echo '<script>sweetAlert("Perfecto!", "Se ha dado de baja satisfactoriamente", "success");</script>';
					  echo "<META HTTP-EQUIV='Refresh' CONTENT='1; URL=$site/index.php?page=edit_gerente&id=$_GET[id]'>";
					  }
					  if (isset($_POST['editarestado_green_'. $c[id] .''])) {
					  $editarestado_green = $_POST['editarestado_green'];
					  mysql_query("UPDATE click_comerciales SET estado='#4caf50', estadouser='1', fecha_alta='". date(d) ."/". date(m) ."/". date(Y) ."' WHERE id='$c[id]'");
					  echo '<script>sweetAlert("Perfecto!", "Se ha dado de alta satisfactoriamente", "success");</script>';
					  echo "<META HTTP-EQUIV='Refresh' CONTENT='1; URL=$site/index.php?page=edit_gerente&id=$_GET[id]'>";
					  }
					  if (isset($_POST['editarestado_yellow_'. $c[id] .''])) {
					  $editarestado_yellow = $_POST['editarestado_yellow'];
					  mysql_query("UPDATE click_comerciales SET estado='#ffeb3b' WHERE id='$c[id]'");
					  echo '<script>sweetAlert("Perfecto!", "Se ha reactivado satisfactoriamente", "success");</script>';
					  echo "<META HTTP-EQUIV='Refresh' CONTENT='1; URL=$site/index.php?page=edit_gerente&id=$_GET[id]'>";
					  }
					  if (isset($_POST['editarestado_blue_'. $c[id] .''])) {
					  $editarestado_blue = $_POST['editarestado_blue'];
					  mysql_query("UPDATE click_comerciales SET estado='#00bcd4', observaciones_2='FECHA TA' WHERE id='$c[id]'");
					  echo '<script>sweetAlert("Perfecto!", "Se ha añadido RC satisfactoriamente", "success");</script>';
					  echo "<META HTTP-EQUIV='Refresh' CONTENT='1; URL=$site/index.php?page=edit_gerente&id=$_GET[id]'>";
					  }
					?>
					  <form method="POST">
						<button class="btn waves-effect waves-light tooltipped" type="submit" name="editarestado_red_<?php echo $c['id']; ?>" style="border: 2px solid #fff;margin-top: -2px;background: #f27474;padding: 0px 12px;height: 20px;" data-position="left" data-style="rounded" data-delay="50" data-tooltip="Dar de baja"></button>
						<button class="btn waves-effect waves-light tooltipped" type="submit" name="editarestado_green_<?php echo $c['id']; ?>" style="border: 2px solid #fff;margin-top: -2px;background: #4caf50;padding: 0px 12px;height: 20px;" data-position="top" data-delay="50" data-tooltip="Alta nueva"></button>
						<button class="btn waves-effect waves-light tooltipped" type="submit" name="editarestado_yellow_<?php echo $c['id']; ?>" style="border: 2px solid #fff;margin-top: -2px;background: #ffeb3b;padding: 0px 12px;height: 20px;" data-position="top" data-delay="50" data-tooltip="Reactivar"></button>
						<button class="btn waves-effect waves-light tooltipped" type="submit" name="editarestado_blue_<?php echo $c['id']; ?>" style="border: 2px solid #fff;margin-top: -2px;background: #00bcd4;padding: 0px 12px;height: 20px;" data-position="top" data-delay="50" data-tooltip="RC"></button>
						<a href="<?php echo $site; ?>/index.php?page=edit_gerente&id=<?php echo $_GET['id']; ?>&edit_comercial=<?php echo $c['id']; ?>" class="btn waves-effect waves-light tooltipped" type="submit" name="editarestado_blue_<?php echo $c['id']; ?>" style="border: 2px solid #fff;margin-top: -2px;background: #424242;padding: 0px 12px;height: 20px;" data-position="top" data-delay="50" data-tooltip="Modificar"></a>
					  </form>
					</td>
				  </tr>
				  <?php } ?>
				</tbody>
			  </table>
            </div>
          </div>
        </div>
      </div>
<?php } ?>