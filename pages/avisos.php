      <div class="row">
        <div class="col s12 m12">
          <div class="card">
            <div class="card-content black-text">
  <a class="modal-trigger" href="#add_alert" style="float: right;margin-top: 6px;font-size: 16px;float: right;"><i class="material-icons">add_alert</i></a>
<?php
if (isset($_POST['add_alert'])) {
	$type = Filter($_POST['type']);
	$nif = Filter($_POST['nif']);
	$verificacion = Filter($_POST['verificacion']);
	$codigo_comercial = Filter($_POST['codigo_comercial']);
	$numero_telf = Filter($_POST['numero_telf']);
	$nota = Filter($_POST['nota']);
	mysql_query("INSERT INTO alerts (type,nif,verificacion,codigo_comercial,numero_telf,nota,fecha,user_added) VALUES ('$type','$nif','$verificacion','$codigo_comercial','$numero_telf','$nota','". date('Y-m-d H:i:s:u') ."','$user[username]')");
	
			echo '<script>
				swal({
				  type: "success",
				  title: "Aviso creado satisfactoriamente",
				  showConfirmButton: false
				})</script>
				<script>
				function redireccionarUsuario() {
				  window.location = "index.php?page=avisos";
				}
				setTimeout("redireccionarUsuario()", 1500);
				</script>
				';
}
?>
  <div id="add_alert" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Avisos &#187; Crear nuevo aviso</h4>
      <form method="POST" class="col s12 m12">
		<div class="row">
		  <div class="input-field col s12 m6">
			<select name="type" required>
			  <option value="" disabled selected required>Escoge una opción</option>
			  <option value="cliente">Cliente</option>
			  <option value="comercial">Comercial</option>
			  <option value="verificacion">Código Verificación</option>
			</select>
			<label>Tipo de aviso</label>
		  </div>
		  <div class="input-field col s12 m6">
			  <input name="nif" maxlength="9" data-length="9" onblur="nif(this.value)" id="nif" type="text" class="validate">
              <label for="nif">DNI del cliente</label>
		  </div>
		  <div class="input-field col s12 m4">
			  <input name="verificacion" pattern="[0-9]{14}" maxlength="14" data-length="14" id="verificacion" type="text" class="validate">
              <label for="verificacion">Código Verificación</label>
		  </div>
		  <div class="input-field col s12 m4">
			  <input name="numero_telf" pattern="[0-9]{9}" maxlength="9" data-length="9" id="numero_telf" type="text" class="validate">
              <label for="numero_telf">Número de teléfono</label>
		  </div>
		  <div class="input-field col s12 m4">
			  <input name="codigo_comercial" pattern="[0123456789]{5}" maxlength="5" data-length="5" id="codigo_comercial" type="text" class="validate">
              <label for="codigo_comercial">Código del comercial</label>
		  </div>
		  <div class="input-field col s12 m12">
			<textarea id="nota" name="nota" class="materialize-textarea" required></textarea>
			<label for="nota">Nota</label>
		  </div>
		  <div class="input-field col s12 m9">
			 <button class="btn waves-effect waves-light" type="submit" name="add_alert" style="width: 100%;background: #444;">Guardar cambios
				<i class="material-icons right">send</i>
			  </button>
		  </div>
		  <div class="input-field col s12 m3">
		     <a class="modal-action modal-close btn waves-effect waves-light #f44336 red" style="width: 100%;background: #444;">Cancelar</a>
		  </div>
		</div>
	  </form>
    </div>
  </div>
              <span class="card-title center"><i class="material-icons" style="margin-top: -1px;position: absolute;margin-left: -31px;color: #c10000;">warning</i> Avisos</span>
              <div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s4"><a class="active" href="#cliente">Clientes</a></li>
        <li class="tab col s4"><a href="#comerciales">Comerciales</a></li>
        <li class="tab col s4"><a href="#cverificacion">Cód. Veri.</a></li>
      </ul>
    </div>
    <div id="cliente" class="col s12 m12" style="overflow: auto;">
      <table class="centered">
        <thead>
          <tr>
              <th>NIF</th>
              <th>NOTA</th>
              <th>OPCIONES</th>
          </tr>
        </thead>

        <tbody>
		<?php $c_sql = mysql_query("SELECT * FROM alerts WHERE type='cliente' ORDER BY id DESC"); while($c = mysql_fetch_assoc($c_sql)){ ?>	
        <?php
		if (isset($_POST['modificar_cliente_'. $c[id] .''])) {
			$nif = Filter($_POST['nif']);
			$nota = Filter($_POST['nota']);
			mysql_query("UPDATE alerts SET nif='$nif', nota='$nota' WHERE id='". $c[id] ."'");
			
			echo '<script>
				swal({
				  type: "success",
				  title: "Alerta modificada",
				  showConfirmButton: false
				})</script>
				<script>
				function redireccionarUsuario() {
				  window.location = "index.php?page=avisos";
				}
				setTimeout("redireccionarUsuario()", 1500);
				</script>
				';
		}
		
		if (isset($_POST['delete_cliente_'. $c[id] .''])) {
			mysql_query("DELETE FROM alerts WHERE id='". $c[id] ."'");
			
			echo '<script>
				swal({
				  type: "success",
				  title: "Alerta eliminada",
				  showConfirmButton: false
				})</script>
				<script>
				function redireccionarUsuario() {
				  window.location = "index.php?page=avisos";
				}
				setTimeout("redireccionarUsuario()", 1500);
				</script>
				';
		}
		?>
		  <tr>
            <td><?php echo $c['nif']; ?></td>
            <td><?php if($c['nota'] == ''){ echo '<i style="color: #c10000;">sin motivo</i>'; } else { echo $c['nota']; } ?></td>
            <td>
			  <form method="POST">
			  <a class="btn waves-effect waves-light tooltipped modal-trigger" href="#modificar_cliente_<?php echo $c['id']; ?>" style="border: 2px solid #fff;margin-top: -2px;background: #424242;padding: 0px 12px;height: 20px;" data-position="top" data-style="rounded" data-delay="50" data-tooltip="Modificar"></a>
			  <button type="submit" name="delete_cliente_<?php echo $c['id']; ?>" class="btn waves-effect waves-light tooltipped #f44336 red" style="border: 2px solid #fff;margin-top: -2px;padding: 0px 12px;height: 20px;" data-position="top" data-style="rounded" data-delay="50" data-tooltip="Eliminar"></a>
			  </form>
			</td>
          </tr>
  <div id="modificar_cliente_<?php echo $c['id']; ?>" class="modal">
    <div class="modal-content">
      <h4>Alertas &#187; Cliente (<?php echo $c['nif']; ?>)</h4>
      <form method="POST" class="col s12 m12">
		<div class="row">
          <div class="input-field col s12 m6">
            <?php $cxi_sql = mysql_query("SELECT * FROM contratos WHERE dni_cif_titular='$c[nif]' LIMIT 1"); $ci = mysql_fetch_assoc($cxi_sql); ?>
			<input value="<?php echo $ci['nombre_titular']; ?> <?php echo $ci['apellidos_titular']; ?>" id="nombre_titular" type="text" class="validate" disabled>
            <label for="nombre_titular">Nombre y apellidos</label>
          </div>
		  <div class="input-field col s12 m6">
            <input value="<?php echo $c['nif']; ?>" name="nif" id="nif" type="text" class="validate">
            <label for="nif">DNI</label>
          </div>
		  <div class="input-field col s12 m12">
			<textarea id="nota" name="nota" class="materialize-textarea"><?php echo $c['nota']; ?></textarea>
			<label for="nota">Nota</label>
		  </div>
		  <div class="input-field col s12 m9">
			 <button class="btn waves-effect waves-light" type="submit" name="modificar_cliente_<?php echo $c['id']; ?>" style="width: 100%;background: #444;">Guardar cambios
				<i class="material-icons right">send</i>
			  </button>
		  </div>
		  <div class="input-field col s12 m3">
		     <a class="modal-action modal-close btn waves-effect waves-light #f44336 red" style="width: 100%;background: #444;">Cancelar</a>
		  </div>
		</div>
	  </form>
    </div>
  </div>
		<?php } ?>
        </tbody>
      </table>
	</div>
    <div id="comerciales" class="col s12 m12" style="overflow: auto;">
      <table class="centered">
        <thead>
          <tr>
              <th>CÓD. COMERCIAL</th>
              <th>NOTA</th>
              <th>OPCIONES</th>
          </tr>
        </thead>

        <tbody>
		<?php $c_sql = mysql_query("SELECT * FROM alerts WHERE type='comercial' ORDER BY id DESC"); while($cx = mysql_fetch_assoc($c_sql)){ ?>	
        <?php
		if (isset($_POST['modificar_comercial_'. $cx[id] .''])) {
			$codigo_comercial = Filter($_POST['codigo_comercial']);
			$nota = Filter($_POST['nota']);
			mysql_query("UPDATE alerts SET codigo_comercial='$codigo_comercial', nota='$nota' WHERE id='". $cx[id] ."'");
			
			echo '<script>
				swal({
				  type: "success",
				  title: "Alerta modificada",
				  showConfirmButton: false
				})</script>
				<script>
				function redireccionarUsuario() {
				  window.location = "index.php?page=avisos";
				}
				setTimeout("redireccionarUsuario()", 1500);
				</script>
				';
		}
		
		if (isset($_POST['delete_comercial_'. $cx[id] .''])) {
			mysql_query("DELETE FROM alerts WHERE id='". $cx[id] ."'");
			
			echo '<script>
				swal({
				  type: "success",
				  title: "Alerta eliminada",
				  showConfirmButton: false
				})</script>
				<script>
				function redireccionarUsuario() {
				  window.location = "index.php?page=avisos";
				}
				setTimeout("redireccionarUsuario()", 1500);
				</script>
				';
		}
		?>
		  <tr>
            <td><?php echo $cx['codigo_comercial']; ?></td>
            <td><?php if($cx['nota'] == ''){ echo '<i style="color: #c10000;">sin motivo</i>'; } else { echo $cx['nota']; } ?></td>
            <td>
			  <form method="POST">
			  <a class="btn waves-effect waves-light tooltipped modal-trigger" href="#modificar_comercial_<?php echo $cx['id']; ?>" style="border: 2px solid #fff;margin-top: -2px;background: #424242;padding: 0px 12px;height: 20px;" data-position="top" data-style="rounded" data-delay="50" data-tooltip="Modificar"></a>
			  <button type="submit" name="delete_comercial_<?php echo $cx['id']; ?>" class="btn waves-effect waves-light tooltipped #f44336 red" style="border: 2px solid #fff;margin-top: -2px;padding: 0px 12px;height: 20px;" data-position="top" data-style="rounded" data-delay="50" data-tooltip="Eliminar"></a>
			  </form>
			</td>
          </tr>
  <div id="modificar_comercial_<?php echo $cx['id']; ?>" class="modal">
    <div class="modal-content">
	<?php $cci_sql = mysql_query("SELECT * FROM click_comerciales WHERE codigo_interno='$cx[codigo_comercial]' LIMIT 1"); $cci = mysql_fetch_assoc($cci_sql); ?>
      <h4>Alertas &#187; Comercial (<?php echo $cci['nif']; ?>)</h4>
      <form method="POST" class="col s12 m12">
		<div class="row">
          <div class="input-field col s12 m6">
            <?php $cxi_sql = mysql_query("SELECT * FROM contratos WHERE dni_cif_titular='$cx[nif]' LIMIT 1"); $ci = mysql_fetch_assoc($cxi_sql); ?>
			<input value="<?php echo $cci['nombre']; ?> <?php echo $cci['primer_apellido']; ?> <?php echo $cci['segundo_apellido']; ?>" id="nombre_titular" type="text" class="validate" disabled>
            <label for="nombre_titular">Nombre y apellidos</label>
          </div>
		  <div class="input-field col s12 m6">
            <input value="<?php echo $cx['codigo_comercial']; ?>" name="codigo_comercial" id="codigo_comercial" type="text" class="validate">
            <label for="codigo_comercial">Código de Comercial</label>
          </div>
		  <div class="input-field col s12 m12">
			<textarea id="nota" name="nota" class="materialize-textarea"><?php echo $cx['nota']; ?></textarea>
			<label for="nota">Nota</label>
		  </div>
		  <div class="input-field col s12 m9">
			 <button class="btn waves-effect waves-light" type="submit" name="modificar_comercial_<?php echo $cx['id']; ?>" style="width: 100%;background: #444;">Guardar cambios
				<i class="material-icons right">send</i>
			  </button>
		  </div>
		  <div class="input-field col s12 m3">
		     <a class="modal-action modal-close btn waves-effect waves-light #f44336 red" style="width: 100%;background: #444;">Cancelar</a>
		  </div>
		</div>
	  </form>
    </div>
  </div>
		<?php } ?>
        </tbody>
      </table>
	</div>
	<div id="cverificacion" class="col s12 m12" style="overflow: auto;">
      <table class="centered">
        <thead>
          <tr>
              <th>CÓDIGO</th>
              <th>NOTA</th>
              <th>OPCIONES</th>
          </tr>
        </thead>

        <tbody>
		<?php $c_sql = mysql_query("SELECT * FROM alerts WHERE type='verificacion' ORDER BY id DESC"); while($c = mysql_fetch_assoc($c_sql)){ ?>	
        <?php
		if (isset($_POST['modificar_verificacion_'. $c[id] .''])) {
			$verificacion = Filter($_POST['verificacion']);
			$nota = Filter($_POST['nota']);
			mysql_query("UPDATE alerts SET verificacion='$verificacion', nota='$nota' WHERE id='". $c[id] ."'");
			
			echo '<script>
				swal({
				  type: "success",
				  title: "Alerta modificada",
				  showConfirmButton: false
				})</script>
				<script>
				function redireccionarUsuario() {
				  window.location = "index.php?page=avisos";
				}
				setTimeout("redireccionarUsuario()", 1500);
				</script>
				';
		}
		
		if (isset($_POST['delete_verificacion_'. $c[id] .''])) {
			mysql_query("DELETE FROM alerts WHERE id='". $c[id] ."'");
			
			echo '<script>
				swal({
				  type: "success",
				  title: "Alerta eliminada",
				  showConfirmButton: false
				})</script>
				<script>
				function redireccionarUsuario() {
				  window.location = "index.php?page=avisos";
				}
				setTimeout("redireccionarUsuario()", 1500);
				</script>
				';
		}
		?>
		  <tr>
            <td><?php echo $c['verificacion']; ?></td>
            <td><?php if($c['nota'] == ''){ echo '<i style="color: #c10000;">sin motivo</i>'; } else { echo $c['nota']; } ?></td>
            <td>
			  <form method="POST">
			  <a class="btn waves-effect waves-light tooltipped modal-trigger" href="#modificar_verificacion_<?php echo $c['id']; ?>" style="border: 2px solid #fff;margin-top: -2px;background: #424242;padding: 0px 12px;height: 20px;" data-position="top" data-style="rounded" data-delay="50" data-tooltip="Modificar"></a>
			  <button type="submit" name="delete_verificacion_<?php echo $c['id']; ?>" class="btn waves-effect waves-light tooltipped #f44336 red" style="border: 2px solid #fff;margin-top: -2px;padding: 0px 12px;height: 20px;" data-position="top" data-style="rounded" data-delay="50" data-tooltip="Eliminar"></a>
			  </form>
			</td>
          </tr>
  <div id="modificar_verificacion_<?php echo $c['id']; ?>" class="modal">
    <div class="modal-content">
      <h4>Alertas &#187; Verificación (<?php echo $c['verificacion']; ?>)</h4>
      <form method="POST" class="col s12 m12">
		<div class="row">
		  <div class="input-field col s12 m12">
            <input value="<?php echo $c['verificacion']; ?>" name="verificacion" id="verificacion" type="text" class="validate">
            <label for="verificacion">Código de Verificación</label>
          </div>
		  <div class="input-field col s12 m12">
			<textarea id="nota" name="nota" class="materialize-textarea"><?php echo $c['nota']; ?></textarea>
			<label for="nota">Nota</label>
		  </div>
		  <div class="input-field col s12 m9">
			 <button class="btn waves-effect waves-light" type="submit" name="modificar_cliente_<?php echo $c['id']; ?>" style="width: 100%;background: #444;">Guardar cambios
				<i class="material-icons right">send</i>
			  </button>
		  </div>
		  <div class="input-field col s12 m3">
		     <a class="modal-action modal-close btn waves-effect waves-light #f44336 red" style="width: 100%;background: #444;">Cancelar</a>
		  </div>
		</div>
	  </form>
    </div>
  </div>
		<?php } ?>
        </tbody>
      </table>
	</div>
  </div>
            </div>
          </div>
        </div>
      </div>