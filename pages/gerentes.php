<?php if($user['view_comerciales'] == '0'){ 
echo '<script>sweetAlert("Whoops", "No tienes permisos para acceder aquí", "error");</script>';
echo "<META HTTP-EQUIV='Refresh' CONTENT='1; URL=$site/index.php?page=home'>";
} ?>
<script>
function buscar_contratos() {
    var textoDistri = $("input#busquedaD").val();
    var textoBusqueda = $("input#busquedaC").val();
 
     if (textoBusqueda != "") {
        $.post("GET/buscar_gerente.php", {valorBusqueda: textoBusqueda,valorDistribuidor: textoDistri}, function(mensaje) {
            $("#resultadoBusquedaC").html(mensaje);
         }); 
     } else { 
        $("#resultadoBusquedaC").html('CAMPO VACIO');
        };
};
</script>
<div class="row">
<?php if($user['edit_comerciales'] == '1'){ ?>
<div class="col s12 m4">
	<a href="<?php echo $config['site']; ?>/index.php?page=gerentes&action=add_gerente" style="box-shadow: none;width: 100%;background: #fff !important;color: #444;margin-top: 8px;height: 42px;padding: 4px 22px;" class="btn modal-trigger"/>Gerencia</a>
</div>
<div class="col s12 m4">
	<a href="<?php echo $config['site']; ?>/index.php?page=gerentes&action=add_subgerente" style="box-shadow: none;width: 100%;background: #fff !important;color: #444;margin-top: 8px;height: 42px;padding: 4px 22px;" class="btn modal-trigger"/>Subgerente</a>
</div>
<div class="col s12 m4">
	<a href="<?php echo $config['site']; ?>/index.php?page=gerentes&action=add_comercial" style="box-shadow: none;width: 100%;background: #fff !important;color: #444;margin-top: 8px;height: 42px;padding: 4px 22px;" class="btn modal-trigger"/>Comercial</a>
</div>
<?php if($_GET['action'] == 'add_subgerente'){ 
if (isset($_POST['new_subgerente'])) {
$distribuidor = strtoupper($_POST['distribuidor']);
$gerente = strtoupper($_POST['gerente']);
$oficina = strtoupper($_POST['oficina']);
$zona_edp = $_POST['zona_edp'];
$nombre = strtoupper($_POST['nombre']);
$primer_apellido = strtoupper($_POST['primer_apellido']);
$segundo_apellido = strtoupper($_POST['segundo_apellido']);
$nif = strtoupper($_POST['nif']);
$codigo_interno = $_POST['codigo_interno'];
$laboral = strtoupper($_POST['laboral']);
$fecha_alta = $_POST['fecha_alta'];
$petic = strtoupper($_POST['petic']);
$recep = strtoupper($_POST['recep']);
$fecha_baja = $_POST['fecha_baja'];
$observaciones = strtoupper($_POST['observaciones']);
$observaciones_2 = strtoupper($_POST['observaciones_2']);
$observaciones_3 = strtoupper($_POST['observaciones_3']);
$observaciones_style = $_POST['observaciones_style'];
mysql_query("INSERT INTO click_comerciales (distribuidor,gerente,subgerente,oficina,zona_edp,codigo_interno,nombre,primer_apellido,segundo_apellido,nif,laboral,fecha_alta,petic,recep,fecha_baja,observaciones,observaciones_2,observaciones_3,observaciones_style) VALUES 
('$distribuidor','$gerente','$nombre $primer_apellido','$oficina','$zona_edp','$codigo_interno','$nombre','$primer_apellido','$segundo_apellido','$nif','$laboral','$fecha_alta','$petic','$recep','$fecha_baja','$observaciones','$observaciones_2','$observaciones_3','$observaciones_style')");
mysql_query("INSERT INTO historial (type,user,date) VALUES ('new_comercial','$user[username]','". date('Y-m-d') ."')");
mysql_query("INSERT INTO click_gerentes (distribuidor,subgerente,oficina,codigo_interno) VALUES ('$distribuidor','$nombre $primer_apellido','$oficina','$codigo_interno')");
echo '<script>sweetAlert("Perfecto!", "Subgerente nuevo creado correctamente", "success");</script>';
echo "<META HTTP-EQUIV='Refresh' CONTENT='1; URL=$site/index.php?page=gerentes'>";
}
?>
<div class="row">
<div class="col s12 m12">
<h4 class="white-text">Subgerente &#187; Nuevo subgerente</h4>
  <div class="card" style="box-shadow: none;text-align: center;">
      <div class="card-content grey-text">
	  <form method="POST">
	    <div class="row">
		  <div class="input-field col s12 m6">
		    <select class="browser-default" name="distribuidor" required>
			  <option value="" disabled selected>SELECCIONA UN DISTRIBUIDOR</option>
			  <?php $cx_sql = mysql_query("SELECT * FROM click_distribuidores"); while($cx = mysql_fetch_assoc($cx_sql)){ ?>
				<option value="<?php echo $cx['name']; ?>"><?php echo $cx['name']; ?></option>
			  <?php } ?>
		    </select>
			<label style="margin-top: -40px;">Distribuidor</label>
		  </div>
		  <div class="input-field col s12 m6">
		    <select class="browser-default" name="gerente" required>
			  <option value="" disabled selected>SELECCIONA UN GERENTE</option>
			  <?php $cx_sql = mysql_query("SELECT * FROM click_comerciales ORDER BY gerente"); while($cx = mysql_fetch_assoc($cx_sql)){ ?>
				<option value="<?php echo $cx['gerente']; ?>"><?php echo $cx['gerente']; ?></option>
			  <?php } ?>
		    </select>
			<label style="margin-top: -40px;">Gerencia</label>
		  </div>
		  <div class="input-field col s12 m1">
		    <input name="zona_edp" placeholder="ZONA EDP" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text" required>
			<label>Zona edp</label>
		  </div>
		  <div class="input-field col s12 m5">
		    <input name="oficina" placeholder="OFICINA" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text" required>
			<label>Oficina</label>
		  </div>
		  <div class="input-field col s12 m3">
		    <input name="nombre" placeholder="NOMBRE" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text" required>
			<label>Nombre</label>
		  </div>
		  <div class="input-field col s12 m3">
		    <input name="primer_apellido" placeholder="PRIMER APELLIDO" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text" required>
			<label>Primer apellido</label>
		  </div>
		  <div class="input-field col s12 m3">
		    <input name="segundo_apellido" placeholder="SEGUNDO APELLIDO" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text">
			<label>Segundo apellido</label>
		  </div>
		  <div class="input-field col s12 m3">
		    <input name="nif" placeholder="DNI / NIF / NIE" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text" required>
			<label>DNI / NIF / NIE</label>
		  </div>
		  <div class="input-field col s12 m6">
		    <input name="codigo_interno" placeholder="CÓDIGO DE COMERCIAL" value="<?php $Var = mysql_query("SELECT * FROM click_comerciales ORDER BY id DESC LIMIT 1");$nnn = mysql_fetch_assoc($Var);echo $nnn['codigo_interno']+1; ?>" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text">
			<label>Código de Comercial</label>
		  </div>
		  <style>
			.select-dropdown {
				background: #eaeaea !important;
				border-bottom: 0px !important;
				text-align: center !important;
			}
		  </style>
		  <div class="input-field col s12 m6">
		    <select class="browser-default" name="petic">
			  <option value="" disabled selected>SELECCIONA UNA PETICIÓN</option>
			  <option value="NO SOLICITAR">NO SOLICITAR</option>
			  <option value="POR CONFIRMAR">POR CONFIRMAR</option>
			  <option value="PTE. SOLIC.">PTE. SOLIC.</option>
			  <option value="PTE. SOLIC. (SIN FOTO)">PTE. SOLIC. (SIN FOTO)</option>
			  <option value="PTE. SOLIC. BAJA">PTE. SOLIC. BAJA</option>
			  <option value="SIN DNI">SIN DNI</option>
			  <option value="SIN FOTO">SIN FOTO</option>
			  <option value="<?php echo date('d'); ?>/<?php echo date('m'); ?>/<?php echo date('Y'); ?>">FECHA DE HOY (<?php echo date('d'); ?>/<?php echo date('m'); ?>/<?php echo date('Y'); ?>)</option>
		    </select>
			<label style="margin-top: -40px;">Petición</label>
		  </div>
		  <div class="input-field col s12 m3">
		    <input name="laboral" placeholder="LABORAL" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text">
			<label>Laboral</label>
		  </div>
		  <div class="input-field col s12 m3">
		    <input name="fecha_alta" placeholder="FECHA DE ALTA" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text">
			<label>Fecha alta</label>
		  </div>
		  <div class="input-field col s12 m4">
		    <input name="recep" placeholder="RECEPCIÓN" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text">
			<label>Recepción</label>
		  </div>
		  <div class="input-field col s12 m4">
		    <input name="fecha_baja" placeholder="FECHA DE BAJA" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text">
			<label>Fecha baja</label>
		  </div>
		  <div class="input-field col s12 m4">
		  <select class="browser-default" class="icons" name="observaciones_style">
		    <option value="" disabled selected>CTAIMA COLOR</option>
		    <option value="red">Rojo</option>
		    <option value="blue">Azul</option>
		    <option value="green">Verde</option>
		    <option value="brown">Marrón</option>
		    <option value="yellow">Amarillo</option>
		    <option value="orange">Naranja</option>
		    <option value="darkred">Granate</option>
		  </select>
		  <label style="margin-top: -40px;">Estado comercial</label>
		</div>
		  <div class="input-field col s12 m4">
		    <select class="browser-default" name="observaciones">
		      <option value="" disabled selected>SELECCIONA UNA OBSERVACIÓN</option>
		      <option value="A MEDIAS">A MEDIAS</option>
		      <option value="CTAIMA OFF">CTAIMA OFF</option>
		      <option value="CTAIMA ON">CTAIMA ON</option>
		      <option value="NO">NO</option>
		      <option value="NO CTAIMA">NO CTAIMA</option>
		      <option value="PTE CTAIMA">PTE CTAIMA</option>
		    </select>
		    <label style="margin-top: -40px;">Observaciones</label>
	      </div>
		  <div class="input-field col s12 m4">
		    <textarea placeholder="OBSERVACIONES 2" id="textarea2" name="observaciones_2" style="BORDER: NONE;background: #eaeaea;border-bottom: 0px;text-align: center;" data-length="999"></textarea>
			<label>Observaciones 2</label>
	      </div>
		  <div class="input-field col s12 m4">
		    <textarea placeholder="OBSERVACIONES 3" id="textarea2" name="observaciones_3" style="BORDER: NONE;background: #eaeaea;border-bottom: 0px;text-align: center;" data-length="999"></textarea>
			<label>Observaciones 3</label>
	      </div>
		<div class="input-field col s12 m12"></div>
		<div class="input-field col s12 m4">
		  <a href="<?php echo $config['site']; ?>/index.php?page=gerentes" class="btn waves-effect waves-light #b71c1c red darken-4" style="box-shadow: none;width: 100%;">Cancelar
			<i class="material-icons left">arrow_left</i>
		  </a>
		</div>
		<div class="input-field col s12 m8">
		  <button class="btn waves-effect waves-light" type="submit" name="new_subgerente" style="box-shadow: none;width: 100%;background: #444;">Guardar cambios
			<i class="material-icons right">send</i>
		  </button>
		</div>
	    </div>
	  </form>
      </div>
    </div>
</div>
</div>
<?php } ?>
<?php if($_GET['edit_comercial']){ ?>
<?php $mmm = mysql_query("SELECT * FROM click_comerciales WHERE id='$_GET[edit_comercial]'"); $m = mysql_fetch_assoc($mmm); ?>
<?php
if (isset($_POST['actualizarcomercial'])) {
$distribuidor = $_POST['distribuidor'];
$gerente = $_POST['gerente'];
$subgerente = $_POST['subgerente'];
$oficina = $_POST['oficina'];
$zona_edp = $_POST['zona_edp'];
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
mysql_query("UPDATE click_comerciales SET distribuidor='$distribuidor', gerente='$gerente', subgerente='$subgerente', oficina='$oficina', zona_edp='$zona_edp', nombre='". strtoupper($nombre) ."', primer_apellido='". strtoupper($primer_apellido) ."', segundo_apellido='". strtoupper($segundo_apellido) ."', nif='". strtoupper($nif) ."', codigo_interno='$codigo_interno',
laboral='$laboral', fecha_alta='$fecha_alta', petic='". strtoupper($petic) ."', recep='". strtoupper($recep) ."', fecha_baja='$fecha_baja',
observaciones='". strtoupper($observaciones) ."', observaciones_2='". strtoupper($observaciones_2) ."', observaciones_3='". strtoupper($observaciones_3) ."', observaciones_style='$observaciones_style' WHERE id='$m[id]'");
mysql_query("INSERT INTO historial (type,user,contract_id,date) VALUES ('edit_comercial','$user[username]','$m[id]','". date('Y-m-d') ."')");
mysql_query("INSERT INTO click_comerciales_evolucion (codigo_comercial,fecha_alta,fecha_baja,fecha,user_id) VALUES ('$codigo_interno','$fecha_alta','$fecha_baja','". date('Y-m-d H:i:s') ."','$user[id]')");
echo '<script>sweetAlert("Perfecto!", "Comercial actualizado correctamente", "success");</script>';
echo "<META HTTP-EQUIV='Refresh' CONTENT='1; URL=$site/index.php?page=gerentes'>";
}

if (isset($_POST['delete_comercial'])) {
	mysql_query("DELETE FROM click_comerciales WHERE id='". $m[id] ."'");
}
?>
<div class="row">
<div class="col s12 m12">
<h4 class="white-text">Comercial &#187; <?php echo $m['nombre']; ?> <?php echo $m['primer_apellido']; ?> <?php echo $m['segundo_apellido']; ?>
<form method="POST"><button type="submit" name="delete_comercial" href="<?php echo $config['site']; ?>/index.php?page=gerentes" class="btn waves-effect waves-light #b41c1c red darken-1" style="box-shadow: none;">
Borrar comercial
</button></form></h4>
  <div class="card" style="box-shadow: none;text-align: center;">
      <div class="card-content grey-text">
	  <form method="POST">
	    <div class="row">
		  <div class="input-field col s12 m4">
			<select class="browser-default" name="distribuidor">
			  <?php if($m['distribuidor'] == ''){ ?>
			  <option value="" disabled selected>SELECCIONA UN DISTRIBUIDOR</option>
			  <?php } else { ?>
			  <option value="<?php echo $m['distribuidor']; ?>" selected><?php echo $m['distribuidor']; ?></option>
			  <?php $cx_sql = mysql_query("SELECT * FROM click_distribuidores ORDER BY name"); while($cx = mysql_fetch_assoc($cx_sql)){ ?>
			  <option value="<?php echo $cx['name']; ?>"><?php echo $cx['name']; ?></option>
			  <?php } ?>
			  <?php } ?>
		    </select>
			<label style="margin-top: -40px;">Distribuidor</label>
		  </div>
		  <div class="input-field col s12 m4">
		    <select class="browser-default" name="gerente">
			  <?php if($m['gerente'] == ''){ ?>
			  <option value="" disabled selected>SELECCIONA UN GERENTE</option>
			  <?php } else { ?>
			  <option value="<?php echo $m['gerente']; ?>" selected><?php echo $m['gerente']; ?></option>
			  <?php $cx_sql = mysql_query("SELECT * FROM click_comerciales ORDER BY gerente"); while($cx = mysql_fetch_assoc($cx_sql)){ ?>
			  <option value="<?php echo $cx['gerente']; ?>"><?php echo $cx['gerente']; ?> (<?php echo $cx['oficina']; ?>)</option>
			  <?php } ?>
			  <?php } ?>
		    </select>
			<!--input placeholder="GERENTE" value="<?php echo $m['gerente']; ?>" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text" disabled-->
			<label style="margin-top: -40px;">Gerencia</label>
		  </div>
		  <div class="input-field col s12 m4">
		    <select class="browser-default" name="subgerente">
			  <?php if($m['subgerente'] == ''){ ?>
			  <option value="" disabled selected>SELECCIONA UN SUBGERENTE</option>
			  <?php } else { ?>
			  <option value="<?php echo $m['subgerente']; ?>" selected><?php echo $m['subgerente']; ?></option>
			  <?php $cx_sql = mysql_query("SELECT * FROM click_comerciales ORDER BY subgerente"); while($cx = mysql_fetch_assoc($cx_sql)){ ?>
			  <option value="<?php echo $cx['subgerente']; ?>"><?php echo $cx['subgerente']; ?> (<?php echo $cx['oficina']; ?>)</option>
			  <?php } ?>
			  <?php } ?>
		    </select>
			<!--input placeholder="GERENTE" value="<?php echo $m['gerente']; ?>" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text" disabled-->
			<label style="margin-top: -40px;">Subgerente</label>
		  </div>
		  <div class="input-field col s12 m2">
		    <input name="zona_edp" placeholder="ZONA EDP" value="<?php echo $m['zona_edp']; ?>" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text">
			<label>Zona edp</label>
		  </div>
		  <div class="input-field col s12 m4">
		    <input name="oficina" placeholder="OFICINA" value="<?php echo $m['oficina']; ?>" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text">
			<label>Oficina</label>
		  </div>
		  <div class="input-field col s12 m3">
		    <input name="nombre" placeholder="NOMBRE" value="<?php echo $m['nombre']; ?>" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text">
			<label>Nombre</label>
		  </div>
		  <div class="input-field col s12 m3">
		    <input name="primer_apellido" placeholder="PRIMER APELLIDO" value="<?php echo $m['primer_apellido']; ?>" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text">
			<label>Primer apellido</label>
		  </div>
		  <div class="input-field col s12 m3">
		    <input name="segundo_apellido" placeholder="SEGUNDO APELLIDO" value="<?php echo $m['segundo_apellido']; ?>" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text">
			<label>Segundo apellido</label>
		  </div>
		  <div class="input-field col s12 m3">
		    <input name="nif" placeholder="DNI / NIF / NIE" value="<?php echo $m['nif']; ?>" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text">
			<label>DNI / NIF / NIE</label>
		  </div>
		  <div class="input-field col s12 m6">
		    <input name="codigo_interno" placeholder="CÓDIGO DE COMERCIAL" value="<?php echo $m['codigo_interno']; ?>" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text">
			<label>Código de Comercial</label>
		  </div>
		  <style>
			.select-dropdown {
				background: #eaeaea !important;
				border-bottom: 0px !important;
				text-align: center !important;
			}
		  </style>
		  <div class="input-field col s12 m6">
			  <?php if($m['petic'] == ''){ ?>
			  <input name="petic" pattern="[0-9]{10}" maxlength="10" placeholder="PETICIÓN" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text">
			  <?php } else { ?>
			  <input name="petic" pattern="[0-9]{10}" maxlength="10" placeholder="PETICIÓN" value="<?php echo $m['petic']; ?>" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text">
			  <?php } ?>
			<label style="margin-top: -40px;">Petición</label>
		  </div>
		  <div class="input-field col s12 m3">
		    <input name="laboral" placeholder="LABORAL" value="<?php echo $m['laboral']; ?>" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text">
			<label>Laboral</label>
		  </div>
		  <div class="input-field col s12 m3">
		    <input name="fecha_alta" pattern="\d{2}/\d{2}/\d{4}" maxlength="10" placeholder="FECHA DE ALTA" value="<?php echo $m['fecha_alta']; ?>" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text">
			<label>Fecha alta</label>
		  </div>
		  <div class="input-field col s12 m4">
		    <input name="recep" pattern="\d{2}/\d{2}/\d{4}" maxlength="10" placeholder="RECEPCIÓN" value="<?php echo $m['recep']; ?>" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text">
			<label>Recepción</label>
		  </div>
		  <div class="input-field col s12 m4">
		    <input name="fecha_baja" pattern="\d{2}/\d{2}/\d{4}" maxlength="10" placeholder="FECHA DE BAJA" value="<?php echo $m['fecha_baja']; ?>" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text">
			<label>Fecha baja</label>
		  </div>
		  <div class="input-field col s12 m4">
		  <select class="browser-default" class="icons" name="observaciones_style">
		    <?php if($m['observaciones_style'] == ''){ ?>
		    <option value="" disabled selected>CTAIMA COLOR</option>
		    <?php } else { ?>
		    <option value="<?php echo $m['observaciones_style']; ?>" selected><?php if($m['observaciones_style'] == 'red'){
				echo 'Rojo';
			} elseif($m['observaciones_style'] == 'blue'){
				echo 'Azul';
			} elseif($m['observaciones_style'] == 'green'){
				echo 'Verde';
			} elseif($m['observaciones_style'] == 'yellow'){
				echo 'Amarillo';
			} elseif($m['observaciones_style'] == 'orange'){
				echo 'Naranja';
			} elseif($m['observaciones_style'] == 'brown'){
				echo 'Marrón';
			} else {
				echo 'Granate';
			} ?>
			</option>
		    <?php } ?>
		    <option value="red">Rojo</option>
		    <option value="blue">Azul</option>
		    <option value="green">Verde</option>
		    <option value="brown">Marrón</option>
		    <option value="yellow">Amarillo</option>
		    <option value="orange">Naranja</option>
		    <option value="darkred">Granate</option>
		  </select>
		  <label style="margin-top: -40px;">Estado comercial</label>
		</div>
		  <div class="input-field col s12 m4">
		    <select class="browser-default" name="observaciones">
		      <?php if($m['observaciones'] == ''){ ?>
		      <option value="" disabled selected>SELECCIONA UNA OBSERVACIÓN</option>
		      <?php } else { ?>
		      <option value="<?php echo $m['observaciones']; ?>"><?php echo $m['observaciones']; ?></option>
		      <?php } ?>
		      <option value="A MEDIAS">A MEDIAS</option>
		      <option value="CTAIMA OFF">CTAIMA OFF</option>
		      <option value="CTAIMA ON">CTAIMA ON</option>
		      <option value="NO">NO</option>
		      <option value="NO CTAIMA">NO CTAIMA</option>
		      <option value="PTE CTAIMA">PTE CTAIMA</option>
		    </select>
		    <label style="margin-top: -40px;">Observaciones</label>
	      </div>
		  <div class="input-field col s12 m4">
		    <textarea placeholder="OBSERVACIONES 2" id="textarea2" name="observaciones_2" style="BORDER: NONE;background: #eaeaea;border-bottom: 0px;text-align: center;" data-length="999"><?php echo $m['observaciones_2']; ?></textarea>
			<label>Observaciones 2</label>
	      </div>
		  <div class="input-field col s12 m4">
		    <textarea placeholder="OBSERVACIONES 3" id="textarea2" name="observaciones_3" style="BORDER: NONE;background: #eaeaea;border-bottom: 0px;text-align: center;" data-length="999"><?php echo $m['observaciones_3']; ?></textarea>
			<label>Observaciones 3</label>
	      </div>
		<div class="input-field col s12 m12"></div>
		<?php if($user['edit_comerciales'] == '1'){ ?>
		<div class="input-field col s12 m3">
		  <a href="<?php echo $config['site']; ?>/index.php?page=gerentes" class="btn waves-effect waves-light #b71c1c red darken-4" style="box-shadow: none;width: 100%;">Cancelar
			<i class="material-icons left">arrow_left</i>
		  </a>
		</div>
		<div class="input-field col s12 m6">
		  <button class="btn waves-effect waves-light" type="submit" name="actualizarcomercial" style="box-shadow: none;width: 100%;background: #444;">Guardar cambios
			<i class="material-icons right">send</i>
		  </button>
		</div>
		<?php } ?>
	    </div>
	  </form>
      </div>
    </div>
</div>
</div>
<?php } ?>
<?php if($_GET['action'] == 'add_gerente'){ ?>
<?php
if (isset($_POST['new_gerente'])) {
$distribuidor = strtoupper($_POST['distribuidor']);
$oficina = strtoupper($_POST['oficina']);
$zona_edp = $_POST['zona_edp'];
$nombre = strtoupper($_POST['nombre']);
$primer_apellido = strtoupper($_POST['primer_apellido']);
$segundo_apellido = strtoupper($_POST['segundo_apellido']);
$nif = strtoupper($_POST['nif']);
$codigo_interno = $_POST['codigo_interno'];
$laboral = strtoupper($_POST['laboral']);
$fecha_alta = $_POST['fecha_alta'];
$petic = strtoupper($_POST['petic']);
$recep = strtoupper($_POST['recep']);
$fecha_baja = $_POST['fecha_baja'];
$observaciones = strtoupper($_POST['observaciones']);
$observaciones_2 = strtoupper($_POST['observaciones_2']);
$observaciones_3 = strtoupper($_POST['observaciones_3']);
$observaciones_style = $_POST['observaciones_style'];
mysql_query("INSERT INTO click_comerciales (distribuidor,gerente,subgerente,oficina,zona_edp,codigo_interno,nombre,primer_apellido,segundo_apellido,nif,laboral,fecha_alta,petic,recep,fecha_baja,observaciones,observaciones_2,observaciones_3,observaciones_style) VALUES 
('$distribuidor','$nombre $primer_apellido','$nombre $primer_apellido','$oficina','$zona_edp','$codigo_interno','$nombre','$primer_apellido','$segundo_apellido','$nif','$laboral','$fecha_alta','$petic','$recep','$fecha_baja','$observaciones','$observaciones_2','$observaciones_3','$observaciones_style')");
mysql_query("INSERT INTO historial (type,user,date) VALUES ('new_comercial','$user[username]','". date('Y-m-d') ."')");
mysql_query("INSERT INTO click_gerentes (distribuidor,subgerente,oficina,codigo_interno) VALUES ('$distribuidor','$nombre $primer_apellido','$oficina','$codigo_interno')");
echo '<script>sweetAlert("Perfecto!", "Gerente nuevo creado correctamente", "success");</script>';
echo "<META HTTP-EQUIV='Refresh' CONTENT='1; URL=$site/index.php?page=gerentes'>";
}
?>
<div class="row">
<div class="col s12 m12">
<h4 class="white-text">Gerente &#187; Nuevo gerente</h4>
  <div class="card" style="box-shadow: none;text-align: center;">
      <div class="card-content grey-text">
	  <form method="POST">
	    <div class="row">
		  <div class="input-field col s12 m4">
		    <select class="browser-default" name="distribuidor" required>
			  <option value="" disabled selected>SELECCIONA UN DISTRIBUIDOR</option>
			  <?php $cx_sql = mysql_query("SELECT * FROM click_distribuidores"); while($cx = mysql_fetch_assoc($cx_sql)){ ?>
				<option value="<?php echo $cx['name']; ?>"><?php echo $cx['name']; ?></option>
			  <?php } ?>
		    </select>
			<label style="margin-top: -40px;">Distribuidor</label>
		  </div>
		  <div class="input-field col s12 m3">
		    <input name="zona_edp" placeholder="ZONA EDP" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text" required>
			<label>Zona edp</label>
		  </div>
		  <div class="input-field col s12 m5">
		    <input name="oficina" placeholder="OFICINA" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text" required>
			<label>Oficina</label>
		  </div>
		  <div class="input-field col s12 m3">
		    <input name="nombre" placeholder="NOMBRE" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text" required>
			<label>Nombre</label>
		  </div>
		  <div class="input-field col s12 m3">
		    <input name="primer_apellido" placeholder="PRIMER APELLIDO" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text" required>
			<label>Primer apellido</label>
		  </div>
		  <div class="input-field col s12 m3">
		    <input name="segundo_apellido" placeholder="SEGUNDO APELLIDO" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text">
			<label>Segundo apellido</label>
		  </div>
		  <div class="input-field col s12 m3">
		    <input name="nif" placeholder="DNI / NIF / NIE" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text" required>
			<label>DNI / NIF / NIE</label>
		  </div>
		  <div class="input-field col s12 m6">
		    <input name="codigo_interno" placeholder="CÓDIGO DE COMERCIAL" value="<?php $Var = mysql_query("SELECT * FROM click_comerciales ORDER BY id DESC LIMIT 1");$nnn = mysql_fetch_assoc($Var);echo $nnn['codigo_interno']+1; ?>" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text">
			<label>Código de Comercial</label>
		  </div>
		  <style>
			.select-dropdown {
				background: #eaeaea !important;
				border-bottom: 0px !important;
				text-align: center !important;
			}
		  </style>
		  <div class="input-field col s12 m6">
		    <select class="browser-default" name="petic">
			  <option value="" disabled selected>SELECCIONA UNA PETICIÓN</option>
			  <option value="NO SOLICITAR">NO SOLICITAR</option>
			  <option value="POR CONFIRMAR">POR CONFIRMAR</option>
			  <option value="PTE. SOLIC.">PTE. SOLIC.</option>
			  <option value="PTE. SOLIC. (SIN FOTO)">PTE. SOLIC. (SIN FOTO)</option>
			  <option value="PTE. SOLIC. BAJA">PTE. SOLIC. BAJA</option>
			  <option value="SIN DNI">SIN DNI</option>
			  <option value="SIN FOTO">SIN FOTO</option>
			  <option value="<?php echo date('d'); ?>/<?php echo date('m'); ?>/<?php echo date('Y'); ?>">FECHA DE HOY (<?php echo date('d'); ?>/<?php echo date('m'); ?>/<?php echo date('Y'); ?>)</option>
		    </select>
			<label style="margin-top: -40px;">Petición</label>
		  </div>
		  <div class="input-field col s12 m3">
		    <input name="laboral" placeholder="LABORAL" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text">
			<label>Laboral</label>
		  </div>
		  <div class="input-field col s12 m3">
		    <input name="fecha_alta" placeholder="FECHA DE ALTA" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text">
			<label>Fecha alta</label>
		  </div>
		  <div class="input-field col s12 m3">
		    <input name="recep" placeholder="RECEPCIÓN" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text">
			<label>Recepción</label>
		  </div>
		  <div class="input-field col s12 m3">
		    <input name="fecha_baja" placeholder="FECHA DE BAJA" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text">
			<label>Fecha baja</label>
		  </div>
		  <div class="input-field col s12 m2">
		    <select class="browser-default" name="observaciones">
		      <option value="" disabled selected>SELECCIONA UNA OBSERVACIÓN</option>
		      <option value="A MEDIAS">A MEDIAS</option>
		      <option value="CTAIMA OFF">CTAIMA OFF</option>
		      <option value="CTAIMA ON">CTAIMA ON</option>
		      <option value="NO">NO</option>
		      <option value="NO CTAIMA">NO CTAIMA</option>
		      <option value="PTE CTAIMA">PTE CTAIMA</option>
		    </select>
		    <label style="margin-top: -40px;">Observaciones</label>
	      </div>
		  <div class="input-field col s12 m4">
		    <textarea placeholder="OBSERVACIONES 2" id="textarea2" name="observaciones_2" style="BORDER: NONE;background: #eaeaea;border-bottom: 0px;text-align: center;" data-length="999"></textarea>
			<label>Observaciones 2</label>
	      </div>
		  <div class="input-field col s12 m4">
		    <textarea placeholder="OBSERVACIONES 3" id="textarea2" name="observaciones_3" style="BORDER: NONE;background: #eaeaea;border-bottom: 0px;text-align: center;" data-length="999"></textarea>
			<label>Observaciones 3</label>
	      </div>
		  <div class="input-field col s12 m2">
		  <select class="browser-default" class="icons" name="observaciones_style">
		    <option value="" disabled selected>CTAIMA COLOR</option>
		    <option value="red">Rojo</option>
		    <option value="blue">Azul</option>
		    <option value="green">Verde</option>
		    <option value="brown">Marrón</option>
		    <option value="yellow">Amarillo</option>
		    <option value="orange">Naranja</option>
		    <option value="darkred">Granate</option>
		  </select>
		  <label style="margin-top: -40px;">Estado comercial</label>
		</div>
		<div class="input-field col s12 m4">
		  <a href="<?php echo $config['site']; ?>/index.php?page=gerentes" class="btn waves-effect waves-light #b71c1c red darken-4" style="box-shadow: none;width: 100%;">Cancelar
			<i class="material-icons left">arrow_left</i>
		  </a>
		</div>
		<div class="input-field col s12 m8">
		  <button class="btn waves-effect waves-light" type="submit" name="new_gerente" style="box-shadow: none;width: 100%;background: #444;">Guardar cambios
			<i class="material-icons right">send</i>
		  </button>
		</div>
	    </div>
	  </form>
      </div>
    </div>
</div>
</div>
<?php } ?>
<?php if($_GET['action'] == 'add_comercial'){ ?>
<?php
if (isset($_POST['new_comercial'])) {
$distribuidor = strtoupper($_POST['distribuidor']);
$oficina = strtoupper($_POST['oficina']);
$gerente = strtoupper($_POST['gerente']);
$subgerente = strtoupper($_POST['subgerente']);
$zona_edp = $_POST['zona_edp'];
$nombre = strtoupper($_POST['nombre']);
$primer_apellido = strtoupper($_POST['primer_apellido']);
$segundo_apellido = strtoupper($_POST['segundo_apellido']);
$nif = strtoupper($_POST['nif']);
$codigo_interno = $_POST['codigo_interno'];
$laboral = strtoupper($_POST['laboral']);
$fecha_alta = $_POST['fecha_alta'];
$petic = strtoupper($_POST['petic']);
$recep = strtoupper($_POST['recep']);
$fecha_baja = $_POST['fecha_baja'];
$observaciones = strtoupper($_POST['observaciones']);
$observaciones_2 = strtoupper($_POST['observaciones_2']);
$observaciones_3 = strtoupper($_POST['observaciones_3']);
$observaciones_style = $_POST['observaciones_style'];
mysql_query("INSERT INTO click_comerciales (distribuidor,gerente,subgerente,oficina,zona_edp,codigo_interno,nombre,primer_apellido,segundo_apellido,nif,laboral,fecha_alta,petic,recep,fecha_baja,observaciones,observaciones_2,observaciones_3,observaciones_style) VALUES 
('$distribuidor','$gerente','$subgerente','$oficina','$zona_edp','$codigo_interno','$nombre','$primer_apellido','$segundo_apellido','$nif','$laboral','$fecha_alta','$petic','$recep','$fecha_baja','$observaciones','$observaciones_2','$observaciones_3','$observaciones_style')");
mysql_query("INSERT INTO historial (type,user,date) VALUES ('new_comercial','$user[username]','". date('Y-m-d') ."')");
echo '<script>sweetAlert("Perfecto!", "Comercial nuevo creado correctamente", "success");</script>';
echo "<META HTTP-EQUIV='Refresh' CONTENT='1; URL=$site/index.php?page=gerentes'>";
}
?>
<div class="row">
<div class="col s12 m12">
<h4 class="white-text">Comercial &#187; Nuevo comercial</h4>
  <div class="card" style="box-shadow: none;text-align: center;">
      <div class="card-content grey-text">
	  <form method="POST">
	    <div class="row">
		  <div class="input-field col s12 m4">
		    <select class="browser-default" name="distribuidor" required>
			  <option value="" disabled selected>SELECCIONA UN DISTRIBUIDOR</option>
			  <?php $cx_sql = mysql_query("SELECT * FROM click_distribuidores"); while($cx = mysql_fetch_assoc($cx_sql)){ ?>
				<option value="<?php echo $cx['name']; ?>"><?php echo $cx['name']; ?></option>
			  <?php } ?>
		    </select>
			<label style="margin-top: -40px;">Distribuidor</label>
		  </div>
		  <div class="input-field col s12 m4">
		    <select class="browser-default" name="gerente" required>
			  <option value="" disabled selected>SELECCIONA UN GERENTE</option>
			  <?php $cx_sql = mysql_query("SELECT * FROM click_comerciales ORDER BY gerente"); while($cx = mysql_fetch_assoc($cx_sql)){ ?>
				<option value="<?php echo $cx['gerente']; ?>"><?php echo $cx['gerente']; ?></option>
			  <?php } ?>
		    </select>
			<label style="margin-top: -40px;">Gerente</label>
		  </div>
		  <div class="input-field col s12 m4">
		    <select class="browser-default" name="subgerente" required>
			  <option value="" disabled selected>SELECCIONA UN SUBGERENTE</option>
			  <?php $cx_sql = mysql_query("SELECT * FROM click_comerciales ORDER BY subgerente"); while($cx = mysql_fetch_assoc($cx_sql)){ ?>
				<option value="<?php echo $cx['subgerente']; ?>"><?php echo $cx['subgerente']; ?></option>
			  <?php } ?>
		    </select>
			<label style="margin-top: -40px;">Subgerente</label>
		  </div>
		  <div class="input-field col s12 m3">
		    <input name="oficina" placeholder="OFICINA" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text" required>
			<label>Oficina</label>
		  </div>
		  <div class="input-field col s12 m3">
		    <input name="zona_edp" placeholder="ZONA EDP" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text" required>
			<label>Zona edp</label>
		  </div>
		  <div class="input-field col s12 m3">
		    <input name="nombre" placeholder="NOMBRE" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text" required>
			<label>Nombre</label>
		  </div>
		  <div class="input-field col s12 m3">
		    <input name="primer_apellido" placeholder="PRIMER APELLIDO" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text" required>
			<label>Primer apellido</label>
		  </div>
		  <div class="input-field col s12 m3">
		    <input name="segundo_apellido" placeholder="SEGUNDO APELLIDO" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text">
			<label>Segundo apellido</label>
		  </div>
		  <div class="input-field col s12 m3">
		    <input name="nif" placeholder="DNI / NIF / NIE" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text" required>
			<label>DNI / NIF / NIE</label>
		  </div>
		  <div class="input-field col s12 m6">
		    <input name="codigo_interno" placeholder="CÓDIGO DE COMERCIAL" value="<?php $Var = mysql_query("SELECT * FROM click_comerciales ORDER BY id DESC LIMIT 1");$nnn = mysql_fetch_assoc($Var);echo $nnn['codigo_interno']+1; ?>" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text">
			<label>Código de Comercial</label>
		  </div>
		  <style>
			.select-dropdown {
				background: #eaeaea !important;
				border-bottom: 0px !important;
				text-align: center !important;
			}
		  </style>
		  <div class="input-field col s12 m6">
		    <select class="browser-default" name="petic">
			  <option value="" disabled selected>SELECCIONA UNA PETICIÓN</option>
			  <option value="NO SOLICITAR">NO SOLICITAR</option>
			  <option value="POR CONFIRMAR">POR CONFIRMAR</option>
			  <option value="PTE. SOLIC.">PTE. SOLIC.</option>
			  <option value="PTE. SOLIC. (SIN FOTO)">PTE. SOLIC. (SIN FOTO)</option>
			  <option value="PTE. SOLIC. BAJA">PTE. SOLIC. BAJA</option>
			  <option value="SIN DNI">SIN DNI</option>
			  <option value="SIN FOTO">SIN FOTO</option>
			  <option value="<?php echo date('d'); ?>/<?php echo date('m'); ?>/<?php echo date('Y'); ?>">FECHA DE HOY (<?php echo date('d'); ?>/<?php echo date('m'); ?>/<?php echo date('Y'); ?>)</option>
		    </select>
			<label style="margin-top: -40px;">Petición</label>
		  </div>
		  <div class="input-field col s12 m3">
		    <input name="laboral" placeholder="LABORAL" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text">
			<label>Laboral</label>
		  </div>
		  <div class="input-field col s12 m3">
		    <input name="fecha_alta" placeholder="FECHA DE ALTA" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text">
			<label>Fecha alta</label>
		  </div>
		  <div class="input-field col s12 m4">
		    <input name="recep" placeholder="RECEPCIÓN" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text">
			<label>Recepción</label>
		  </div>
		  <div class="input-field col s12 m4">
		    <input name="fecha_baja" placeholder="FECHA DE BAJA" style="background: #eaeaea;border-bottom: 0px;text-align: center;" type="text">
			<label>Fecha baja</label>
		  </div>
		  <div class="input-field col s12 m4">
		  <select class="browser-default" class="icons" name="observaciones_style" required>
		    <option value="" disabled selected>CTAIMA COLOR</option>
		    <option value="red">Rojo</option>
		    <option value="blue">Azul</option>
		    <option value="green">Verde</option>
		    <option value="brown">Marrón</option>
		    <option value="yellow">Amarillo</option>
		    <option value="orange">Naranja</option>
		    <option value="darkred">Granate</option>
		  </select>
		  <label style="margin-top: -40px;">Estado comercial</label>
		  </div>
		  <div class="input-field col s12 m4">
		    <select class="browser-default" name="observaciones">
		      <option value="" disabled selected>SELECCIONA UNA OBSERVACIÓN</option>
		      <option value="A MEDIAS">A MEDIAS</option>
		      <option value="CTAIMA OFF">CTAIMA OFF</option>
		      <option value="CTAIMA ON">CTAIMA ON</option>
		      <option value="NO">NO</option>
		      <option value="NO CTAIMA">NO CTAIMA</option>
		      <option value="PTE CTAIMA">PTE CTAIMA</option>
		    </select>
		    <label style="margin-top: -40px;">Observaciones</label>
	      </div>
		  <div class="input-field col s12 m4">
		    <textarea placeholder="OBSERVACIONES 2" id="textarea2" name="observaciones_2" style="BORDER: NONE;background: #eaeaea;border-bottom: 0px;text-align: center;" data-length="999"></textarea>
			<label>Observaciones 2</label>
	      </div>
		  <div class="input-field col s12 m4">
		    <textarea placeholder="OBSERVACIONES 3" id="textarea2" name="observaciones_3" style="BORDER: NONE;background: #eaeaea;border-bottom: 0px;text-align: center;" data-length="999"></textarea>
			<label>Observaciones 3</label>
	      </div>
		<div class="input-field col s12 m12"></div>
		<div class="input-field col s12 m4">
		  <a href="<?php echo $config['site']; ?>/index.php?page=gerentes" class="btn waves-effect waves-light #b71c1c red darken-4" style="box-shadow: none;width: 100%;">Cancelar
			<i class="material-icons left">arrow_left</i>
		  </a>
		</div>
		<div class="input-field col s12 m8">
		  <button class="btn waves-effect waves-light" type="submit" name="new_comercial" style="box-shadow: none;width: 100%;background: #444;">Guardar cambios
			<i class="material-icons right">send</i>
		  </button>
		</div>
	    </div>
	  </form>
      </div>
    </div>
</div>
</div>
<?php } ?>
<?php } ?>
<div class="col s12 m12">
<h4 class="white-text">&#187; Búsqueda de comerciales</h4>
  <div class="card" style="box-shadow: none;text-align: center;">
      <div class="card-content grey-text">
	  <div class="row">
		<div class="input-field col s12 m12">
		  <input id="busquedaC" placeholder="Introduce la búsqueda del comercial..." style="background: #eaeaea;border-bottom: 0px;text-align: center;" autocomplete="off" onKeyUp="buscar_contratos();" id="search" type="search">
		</div>
	  </div>
	 <div id="resultadoBusquedaC"></div>
      </div>
    </div>
</div>
</div>
	  
<script>
function myFunction() {
	// Declare variables
	var input, filter, ul, li, a, i;
	input = document.getElementById('myInput');
	filter = input.value.toUpperCase();
	ul = document.getElementById("myUL");
	li = ul.getElementsByTagName('li');

	// Loop through all list items, and hide those who don't match the search query
	for (i = 0; i < li.length; i++) {
		a = li[i].getElementsByTagName("a")[0];
		if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
			li[i].style.display = "";
		} else {
			li[i].style.display = "none";
		}
	}
}
</script>