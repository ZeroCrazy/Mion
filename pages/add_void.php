<style>
input:focus{
	background: rgba(156, 33, 60, 0.30) !important;
	color: #444 !important;
}
.btn {
	background: #444;
	padding: 0px 16px;
	margin-top: 6px;
}
.btn:focus {
	background: #444;
}
.btn:hover {
	background: #444;
}
</style>
<?php
	$Var = mysql_query("SELECT * FROM contratos_voids ORDER BY id DESC LIMIT 1");$count_contratos = mysql_fetch_assoc($Var);
	$ultimocontrato = $count_contratos[id]+1;
if (isset($_POST["add_void"])) {  
  $fecha_venta = $_POST["fecha_venta"];
  $subgerente2 = $_POST["subgerente2"];
  $nombre_titular = strtoupper($_POST["nombre_titular"]);
  $apellidos_titular = strtoupper($_POST["apellidos_titular"]);
  $dni_cif_titular = strtoupper($_POST["dni_cif_titular"]);
  $telefono_pref_1 = $_POST["telefono_pref_1"];
  $cod_verificacion = str_replace("V", "", $_POST["cod_verificacion"]); //Substituye los / por un campo vacío
  $cod_verificacion_posterior = $_GET['codv'];
  $codigo_comercial = $_POST["codigo_comercial"];
  $cg_sql = mysql_query("SELECT * FROM click_comerciales WHERE codigo_interno='$codigo_comercial'");$cg = mysql_fetch_assoc($cg_sql);
  $cig = $_POST["cig"];
  $fecha_we = $_POST["fecha_we"];
  $we_dia = substr($fecha_we, 0, 2);
  $we_mes = substr($fecha_we, 3, 2);
  $we_ano = substr($fecha_we, 6, 4);
//$we_dia = $_POST["we_dia"];
//$we_mes = $_POST["we_mes"];
//$we_ano = $_POST["we_ano"];
  $cups_luz = strtoupper($_POST["cups_luz"]);
  $cups_gas = strtoupper($_POST["cups_gas"]);
  $plan_destino_luz = strtoupper($_POST["plan_destino_luz"]);
  $plan_destino_gas = strtoupper($_POST["plan_destino_gas"]);
  $plan_destino_fun = strtoupper($_POST["plan_destino_fun"]);
  $motivo = strtoupper($_POST["motivo"]);
  $intro_dia = date("d");
  $intro_mes = date("m");
  $intro_ano = date("Y");
  $vers_funciona = strtoupper($_POST["vers_funciona"]);
  $modal_funciona = strtoupper($_POST["modal_funciona"]);
  
  mysql_query("INSERT INTO contratos_estado_historial (type,contrato_id,user,fecha,estado) VALUES ('void','$ultimocontrato','$user[username]','". date('d') ."-". date('m') ."-". date('Y') ."','VOID')");
  mysql_query("INSERT INTO contratos_voids (gerente,subgerente,subgerente2,oficina,vers_funciona,modal_funciona,tipo_contrato,formula,formula2,funciona,intro_user,fecha_venta,nombre_titular,apellidos_titular,dni_cif_titular,telefono_pref_1,cod_verificacion,cod_verificacion_posterior,codigo_comercial,cig,we_dia,we_mes,we_ano,cups_luz,cups_gas,plan_destino_luz,plan_destino_gas,plan_destino_fun,motivo,intro_dia,intro_mes,intro_ano) 
  VALUES ('$cg[gerente]','$cg[subgerente]','$subgerente2','$cg[oficina]','$vers_funciona','$modal_funciona','". Filter($_GET[tipo_contrato]) ."','". Filter($_GET[formula]) ."','". Filter($_GET[formula2]) ."','". Filter($_GET[funciona]) ."','$user[username]','$fecha_venta','$nombre_titular','$apellidos_titular','$dni_cif_titular','$telefono_pref_1','$cod_verificacion','$cod_verificacion_posterior','$codigo_comercial','$cig','$we_dia','$we_mes','$we_ano','$cups_luz','$cups_gas','$plan_destino_luz','$plan_destino_gas','$plan_destino_fun','$motivo','$intro_dia','$intro_mes','$intro_ano')");
  mysql_query("INSERT INTO historial (type,user,date) VALUES ('new_void','$user[username]','". date('Y-m-d') ."')");
  echo '<script>
    swal({
      type: "success",
      title: "Void introducido",
      showConfirmButton: false
    })</script>
	<script>
	function redireccionarUsuario() {
	  window.location = "index.php?page=add_void";
	}
	setTimeout("redireccionarUsuario()", 1500);
	</script>
	';
	
  
}

?>
<div id="resultadoBusqueda" style="text-align: left;
    position: fixed;
    background: rgba(0, 0, 0, 0.74);
    z-index: 200;
    top: 41%;
    left: 0%;
    border-top-right-radius: 8px;
    border-bottom-right-radius: 8px;
    padding: 5px 10px;"></div>
<div class="row">
	<br>
	<div class="col s12 m6">
		<a href="<?php echo $site; ?>/index.php?page=<?php echo Filter($_GET['page']); ?>&tipo_contrato=NEGOCIOS" class="waves-effect waves-light btn" style="width: 100%;<?php if($_GET['tipo_contrato'] == 'NEGOCIOS'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>"><i class="material-icons right">store</i>Negocios</a>
	</div>
	<div class="col s12 m6">
		<a href="<?php echo $site; ?>/index.php?page=<?php echo Filter($_GET['page']); ?>&tipo_contrato=HOGARES" class="waves-effect waves-light btn" style="width: 100%;<?php if($_GET['tipo_contrato'] == 'HOGARES'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>"><i class="material-icons right">home</i>Hogares</a>
	</div>
	<?php if($_GET['tipo_contrato']) { ?>
	  <div class="col s12 m1">
		<a href="<?php echo $site; ?>/index.php?page=<?php echo Filter($_GET['page']); ?>&tipo_contrato=<?php echo strtoupper($_GET['tipo_contrato']); ?>&formula=luz" class="waves-effect waves-light btn" style="margin-top: 5px;width: 100%;padding: 0;<?php if($_GET['formula'] == 'luz'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>">Luz</a>
	  </div>
	  <div class="col s12 m2">
		<a href="<?php echo $site; ?>/index.php?page=<?php echo Filter($_GET['page']); ?>&tipo_contrato=<?php echo strtoupper($_GET['tipo_contrato']); ?>&formula=marca" class="waves-effect waves-light btn" style="margin-top: 5px;width: 100%;<?php if($_GET['formula'] == 'marca'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>">Carrefour</a>
	  </div>
	  <div class="col s12 m1">
		<a href="<?php echo $site; ?>/index.php?page=<?php echo Filter($_GET['page']); ?>&tipo_contrato=<?php echo strtoupper($_GET['tipo_contrato']); ?>&formula=gas" class="waves-effect waves-light btn" style="margin-top: 5px;width: 100%;padding: 0;<?php if($_GET['formula'] == 'gas'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>">Gas</a>
	  </div>
	  <div class="col s12 m2">
		<a href="<?php echo $site; ?>/index.php?page=<?php echo Filter($_GET['page']); ?>&tipo_contrato=<?php echo strtoupper($_GET['tipo_contrato']); ?>&formula=dual" class="waves-effect waves-light btn" style="margin-top: 5px;width: 100%;padding: 0;<?php if($_GET['formula'] == 'dual'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>">Dual</a>
	  </div>
	  <div class="col s12 m3">
		<a href="<?php echo $site; ?>/index.php?page=<?php echo Filter($_GET['page']); ?>&tipo_contrato=<?php echo strtoupper($_GET['tipo_contrato']); ?>&formula=maxahorro" class="waves-effect waves-light btn" style="margin-top: 5px;width: 100%;<?php if($_GET['formula'] == 'maxahorro'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>">MÁXIMO AHORRO</a>
	  </div>
	  <div class="col s12 m3">
		<a href="<?php echo $site; ?>/index.php?page=<?php echo Filter($_GET['page']); ?>&tipo_contrato=<?php echo strtoupper($_GET['tipo_contrato']); ?>&formula=planahorro" class="waves-effect waves-light btn" style="margin-top: 5px;width: 100%;<?php if($_GET['formula'] == 'planahorro'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>">PLAN AHORRO</a>
	  </div>
	<?php } ?>
	<?php if($_GET['formula'] == 'marca') { ?>
	  <div class="col s12 m4">
		<a href="<?php echo $site; ?>/index.php?page=<?php echo $_GET['page']; ?>&tipo_contrato=<?php echo strtoupper($_GET['tipo_contrato']); ?>&formula=<?php echo $_GET['formula']; ?>&formula2=luz" class="waves-effect waves-light btn" style="margin-top: 5px;width: 100%;<?php if($_GET['formula2'] == 'luz'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>">Luz</a>
	  </div>
	  <div class="col s12 m4">
		<a href="<?php echo $site; ?>/index.php?page=<?php echo $_GET['page']; ?>&tipo_contrato=<?php echo strtoupper($_GET['tipo_contrato']); ?>&formula=<?php echo $_GET['formula']; ?>&formula2=gas" class="waves-effect waves-light btn" style="margin-top: 5px;width: 100%;<?php if($_GET['formula2'] == 'gas'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>">Gas</a>
	  </div>
	  <div class="col s12 m4">
		<a href="<?php echo $site; ?>/index.php?page=<?php echo $_GET['page']; ?>&tipo_contrato=<?php echo strtoupper($_GET['tipo_contrato']); ?>&formula=<?php echo $_GET['formula']; ?>&formula2=dual" class="waves-effect waves-light btn" style="margin-top: 5px;width: 100%;<?php if($_GET['formula2'] == 'dual'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>">Dual</a>
	  </div>
	<?php } ?>
	<?php if($_GET['formula']){ ?>
	  <div class="col s12 m6">
		<a href="<?php echo $site; ?>/index.php?page=<?php echo $_GET['page']; ?>&tipo_contrato=<?php echo strtoupper($_GET['tipo_contrato']); ?>&formula=<?php echo $_GET['formula']; ?><?php if($_GET['formula2'] == ''){}else{ ?>&formula2=<?php echo $_GET['formula2']; ?><?php } ?>&funciona=si&codv=verificacion" class="waves-effect waves-light btn" style="margin-top: 5px;width: 100%;<?php if($_GET['funciona'] == 'si'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>">Con funciona</a>
	  </div>
	  <div class="col s12 m6">
		<a href="<?php echo $site; ?>/index.php?page=<?php echo $_GET['page']; ?>&tipo_contrato=<?php echo strtoupper($_GET['tipo_contrato']); ?>&formula=<?php echo $_GET['formula']; ?><?php if($_GET['formula2'] == ''){}else{ ?>&formula2=<?php echo $_GET['formula2']; ?><?php } ?>&funciona=no&codv=verificacion" class="waves-effect waves-light btn" style="margin-top: 5px;width: 100%;<?php if($_GET['funciona'] == 'no'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>">Sin funciona</a>
	  </div>
	<?php } ?>
	  <?php if($_GET['funciona']){ ?>
	  <div class="col s12 m6">
		<a href="<?php echo $site; ?>/index.php?page=<?php echo $_GET['page']; ?>&tipo_contrato=<?php echo strtoupper($_GET['tipo_contrato']); ?>&formula=<?php echo $_GET['formula']; ?>&formula2=<?php echo $_GET['formula2']; ?>&funciona=<?php echo $_GET['funciona']; ?>&codv=posterior" class="waves-effect waves-light btn" style="margin-top: 5px;width: 100%;<?php if($_GET['codv'] == 'posterior'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>">Código de Verificación <b>Posterior</b></a>
	  </div>
	  <div class="col s12 m6">
		<a href="<?php echo $site; ?>/index.php?page=<?php echo $_GET['page']; ?>&tipo_contrato=<?php echo strtoupper($_GET['tipo_contrato']); ?>&formula=<?php echo $_GET['formula']; ?>&formula2=<?php echo $_GET['formula2']; ?>&funciona=<?php echo $_GET['funciona']; ?>&codv=verificacion" class="waves-effect waves-light btn" style="margin-top: 5px;width: 100%;<?php if($_GET['codv'] == 'verificacion'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>">Código de <b>Verificación</b></a>
	  </div>
	  <?php } ?>
</div>
<?php if($_GET['codv']){ ?>
<div class="row">
  <div class="col s12 m12">
    <div class="card">
      <div class="card-content black-text">
        <span class="card-title center">NUEVO VOID</span>
		<br>
        <div class="row">
		<form method="POST" class="col s12 m12">
		<div class="col s12 m12">
			<select class="browser-default" name="subgerente2" required>
			  <option value="" disabled selected>Selecciona un subgerente</option>
			  <?php $Var = mysql_query("SELECT * FROM contratos_voids WHERE intro_user='$user[username]' ORDER BY id DESC LIMIT 1");$last_subgerencia_user = mysql_fetch_assoc($Var); ?>
			  <option value="<?php echo $last_subgerencia_user['subgerente2']; ?>" selected><?php echo $last_subgerencia_user['subgerente2']; ?></option>
				<?php $gg_sql = mysql_query("SELECT * FROM click_gerentes_introductores ORDER BY subgerente"); while($g = mysql_fetch_assoc($gg_sql)){ ?>
				<option value="<?php echo $g['subgerente']; ?>"><?php echo $g['subgerente']; ?></option>
				<?php } ?>
			</select>
		  </div>
		  <div class="row">
			<div class="input-field col s3">
			  <input name="fecha_venta" placeholder="Fecha venta" id="fecha_venta" id="fecha" type="date" class="validate" required>
			  <label for="fecha_venta">FECHA VENTA</label>
			</div>
			<div class="input-field col s3">
			  <input name="nombre_titular" placeholder="Nombre del titular" id="nombre_titular" type="text" class="validate" required>
			  <label for="nombre_titular">NOMBRE TITULAR</label>
			</div>
			<div class="input-field col s3">
			  <input name="apellidos_titular" placeholder="Nombre del titular" id="apellidos_titular" type="text" class="validate" required>
			  <label for="apellidos_titular">APELLIDOS TITULAR</label>
			</div>
			<div class="input-field col s3">
			  <input name="dni_cif_titular" maxlength="9" data-length="9" placeholder="Nombre del titular" type="text" class="validate" required>
			  <label for="dni">DNI / NIE / CIF</label>
			</div>
			<div class="input-field col s12 m3">
			  <i class="material-icons prefix">phone_iphone</i>
			  <input id="telf1" name="telefono_pref_1" type="tel" class="validate" pattern="[0-9]{9}">
			  <label for="telf1">Teléfono</label>
			</div>
			<div class="input-field col s12 m3">
			  <i class="material-icons prefix">voicemail</i>
			  <input id="cod_verificacion" name="cod_verificacion" type="text" class="validate">
			  <label for="cod_verificacion">Código de Verificación</label>
			</div>
			<div class="input-field col s12 m3">
			  <i class="material-icons prefix">face</i>
			  <input autocomplete="off" onKeyUp="buscar();" id="busqueda" id="codigo_comercial" name="codigo_comercial" pattern="[0123456789]{5}" type="text" class="validate" maxlength="5" data-length="5" style="text-transform: uppercase;" required>
			  <label for="codigo_comercial">Código de comercial</label>
			</div>
			<div class="input-field col s12 m3">
			  <i class="material-icons prefix">verified_user</i>
			  <input id="cod_venta_espontanea" name="cig" pattern="[0-9]{13}" type="text" class="validate" style="text-transform: uppercase;" maxlength="13" data-length="13">
			  <label for="cod_venta_espontanea">C.I.G</label>
			</div>
			<div class="input-field col s12 m12">
			  <i class="material-icons prefix">date_range</i>
			  <input id="fechawe" value="<?php echo $last_subgerencia_user['we_dia']; ?>/<?php echo $last_subgerencia_user['we_mes']; ?>/<?php echo $last_subgerencia_user['we_ano']; ?>" autocomplete="off" name="fecha_we" type="text" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" class="datepicker validate">
			  <label for="fechawe">FECHA WE FORMATO DD/MM/YYYY</label>
			</div>
			<div class="input-field col s12 m6">
			  <i class="material-icons prefix">flash_on</i>
			  <input id="suministro_cups" name="cups_luz" type="text" class="validate" style="text-transform: uppercase;">
			  <label for="cups_luz">CUPS Electricidad</label>
			</div>
			<div class="input-field col s12 m6">
			  <i class="material-icons prefix">local_gas_station</i>
			  <input id="suministro_cups" name="cups_gas" type="text" class="validate" style="text-transform: uppercase;">
			  <label for="cups_gas">CUPS Gas</label>
			</div>
			<?php if($_GET['formula'] == 'luz'){ ?>
			<div class="input-field col s12 m4">
			  <select name="plan_destino_luz">
			    <option value="FORMULA LUZ <?php echo strtoupper($_GET['tipo_contrato']); ?> <?php if($_GET['funciona'] == 'si'){ echo 'CON FUNCIONA'; } ?>" selected>FORMULA LUZ <?php echo strtoupper($_GET['tipo_contrato']); ?> <?php if($_GET['funciona'] == 'si'){ echo 'CON FUNCIONA'; } ?></option>
			  </select>
			  <label>Producto LUZ</label>
			</div>
			<?php if($_GET['funciona'] == 'si'){ ?>
			<div class="input-field col s12 m4">
			  <select name="plan_destino_fun">
			    <option value="FORMULA LUZ <?php echo strtoupper($_GET['tipo_contrato']); ?> <?php if($_GET['funciona'] == 'si'){ echo 'CON FUNCIONA'; } ?>" selected>FORMULA LUZ <?php echo strtoupper($_GET['tipo_contrato']); ?> <?php if($_GET['funciona'] == 'si'){ echo 'CON FUNCIONA'; } ?></option>
			  </select>
			  <label>Producto FUNCIONA</label>
			</div>
			<?php } ?>
			<?php } ?>

			<?php if($_GET['formula'] == 'marca'){ ?>
			<!-- Marca > Luz -->
			<?php if($_GET['formula2'] == 'luz'){ ?>
			<div class="input-field col s12 m4">
			<select name="plan_destino_luz">
			  <option value="">Escoge un producto</option>
			  <option value="MARCA LUZ<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>MARCA LUZ<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>					  
			</select>
			<label>Producto LUZ</label>
			</div>
			
			<?php if($_GET['funciona'] == 'si'){ ?>
			<div class="input-field col s12 m4">
			<select name="plan_destino_fun">
			  <option value="">Escoge un producto</option>
			  <option value="MARCA LUZ<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>MARCA LUZ<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
			</select>
			<label>Producto FUNCIONA</label>
			</div>
			<?php } ?>
			<?php } ?>
			
			<!-- Marca > Gas -->
			<?php if($_GET['formula2'] == 'gas'){ ?>
			<div class="input-field col s12 m4">
			<select name="plan_destino_gas">
			  <option value="">Escoge un producto</option>
			  <option value="MARCA GAS<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>MARCA GAS<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
			</select>
			<label>Producto GAS</label>
			</div>
			
			<?php if($_GET['funciona'] == 'si'){ ?>
			<div class="input-field col s12 m4">
			<select name="plan_destino_fun">
			  <option value="">Escoge un producto</option>
			  <option value="MARCA GAS<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>MARCA GAS<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
			</select>
			<label>Producto FUNCIONA</label>
			</div>
			<?php } ?>
			<?php } ?>
			
			<!-- Marca > Dual -->
			<?php if($_GET['formula2'] == 'dual'){ ?>
			<div class="input-field col s12 m4">
			<select name="plan_destino_luz">
			  <option value="">Escoge un producto</option>
			  <option value="MARCA DUAL<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>MARCA DUAL<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
			</select>
			<label>Producto LUZ</label>
			</div>
			
			<div class="input-field col s12 m4">
			<select name="plan_destino_gas">
			  <option value="">Escoge un producto</option>
			  <option value="MARCA DUAL<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>MARCA DUAL<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
			</select>
			<label>Producto GAS</label>
			</div>
			
			<?php if($_GET['funciona'] == 'si'){ ?>
			<div class="input-field col s12 m4">
			<select name="plan_destino_fun">
			  <option value="">Escoge un producto</option>
			  <option value="MARCA DUAL<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>MARCA DUAL<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
			</select>
			<label>Producto FUNCIONA</label>
			</div>
			<?php } ?>
			<?php } ?>
			<?php } ?>
			
			<?php if($_GET['formula'] == 'gas'){ ?>
			<div class="input-field col s12 m6">
			<select name="plan_destino_gas">
			  <option value="FORMULA GAS <?php echo strtoupper($_GET['tipo_contrato']); ?><?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA GAS <?php echo strtoupper($_GET['tipo_contrato']); ?> <?php if($_GET['funciona'] == 'si'){ echo 'CON FUNCIONA'; } ?></option>
			</select>
			<label>Producto GAS</label>
			</div>
			
			<?php if($_GET['funciona'] == 'si'){ ?>
			<div class="input-field col s12 m6">
			<select name="plan_destino_fun">
			  <option value="FORMULA GAS <?php echo strtoupper($_GET['tipo_contrato']); ?><?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA GAS <?php echo strtoupper($_GET['tipo_contrato']); ?> <?php if($_GET['funciona'] == 'si'){ echo 'CON FUNCIONA'; } ?></option>
			</select>
			<label>Producto FUNCIONA</label>
			</div>
			<?php } ?>
			<?php } ?>
			
			<?php if($_GET['formula'] == 'dual'){ ?>
			<div class="input-field col s12 m4">
			<select name="plan_destino_luz">
			  <option value="FORMULA GAS+LUZ<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA GAS+LUZ<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
			</select>
			<label>Producto LUZ</label>
			</div>
			
			<div class="input-field col s12 m4">
			<select name="plan_destino_gas">
			  <option value="FORMULA GAS+LUZ<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA GAS+LUZ<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
			</select>
			<label>Producto GAS</label>
			</div>
			
			
			<?php if($_GET['funciona'] == 'si'){ ?>
			<div class="input-field col s12 m4">
			<select name="plan_destino_fun">
			  <option value="FORMULA GAS+LUZ<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA GAS+LUZ<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
			</select>
			<label>Producto FUNCIONA</label>
			</div>
			<?php } ?>
			<?php } ?>
			
			<?php if($_GET['formula'] == 'maxahorro'){ ?>
			<div class="input-field col s12 m4">
			<select name="plan_destino_luz">
			  <option value="FORMULA MAXIMO AHORRO 24H<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA MAXIMO AHORRO 24H<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
			</select>
			<label>Producto LUZ</label>
			</div>
			<?php if($_GET['funciona'] == 'si'){ ?>
			<div class="input-field col s12 m4">
			<select name="plan_destino_fun">
			  <option value="FORMULA MAXIMO AHORRO 24H<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA MAXIMO AHORRO 24H<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
			</select>
			<label>Producto FUNCIONA</label>
			</div>
			<?php } ?>
			<?php } ?>
			
			<?php if($_GET['formula'] == 'planahorro'){ ?>
			<div class="input-field col s12 m4">
			<select name="plan_destino_luz">
			  <option value="">Escoge un producto</option>
			  <option value="FORMULA AHORRO DUAL<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA AHORRO DUAL<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
			</select>
			<label>Producto LUZ</label>
			</div>
			
			<div class="input-field col s12 m4">
			<select name="plan_destino_gas">
			  <option value="">Escoge un producto</option>
			  <option value="FORMULA AHORRO DUAL<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA AHORRO DUAL<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
			</select>
			<label>Producto GAS</label>
			</div>
			
			<?php if($_GET['funciona'] == 'si'){ ?>
			<div class="input-field col s12 m4">
			<select name="plan_destino_fun">
			  <option value="">Escoge un producto</option>
			  <option value="FORMULA AHORRO DUAL<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA AHORRO DUAL<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
			</select>
			<label>Producto FUNCIONA</label>
			</div>
			<?php } ?>
			<?php } ?>
			
			<div class="col s12 m12">
			<span class="card-title center">MOTIVO DEL VOID</span>
			  <div class="card #263238 grey">
			    <div class="card-content white-text">
			      <textarea id="textarea1" name="motivo" class="materialize-textarea validate" style="color: #fff !important;" required></textarea>
			    </div>
			  </div>
			</div>
			
			<div class="col s12 m12">
			  <button class="btn waves-effect waves-light" type="submit" name="add_void" style="background: #444;width: 100%;">INTRODUCIR VOID
			  	<i class="material-icons right">send</i>
			  </button>
			</div>
<?php if($_GET['funciona'] == 'si') { ?>
					<?php if($_GET['formula'] == 'luz') { ?>
					 <input type="text" name="vers_funciona" value="SOLO LUZ">
					 <input type="text" name="modal_funciona" value="<?php echo strtoupper($_GET['tipo_contrato']); ?>">
					<?php } ?>
					<?php if($_GET['formula'] == 'maxahorro') { ?>
					 <input type="text" name="vers_funciona" value="SOLO LUZ">
					 <input type="text" name="modal_funciona" value="<?php echo strtoupper($_GET['tipo_contrato']); ?>">
					<?php } ?>
					<?php if($_GET['formula'] == 'gas') { ?>
					 <input type="text" name="vers_funciona" value="DUAL">
					 <input type="text" name="modal_funciona" value="PLUS">
					<?php } ?>
					<?php if($_GET['formula'] == 'dual') { ?>
					 <input type="text" name="vers_funciona" value="DUAL">
					 <input type="text" name="modal_funciona" value="PLUS">
					<?php } ?>
					<?php if($_GET['formula'] == 'planahorro') { ?>
					 <input type="text" name="vers_funciona" value="DUAL">
					 <input type="text" name="modal_funciona" value="PLUS">
					<?php } ?>
					<?php if($_GET['formula'] == 'marca') { ?>
						<?php if($_GET['formula2'] == 'luz') { ?>
						 <b>Marca - Luz - Con funciona</b>
						 <input type="text" name="vers_funciona" value="SOLO LUZ">
						 <input type="text" name="modal_funciona" value="<?php echo strtoupper($_GET['tipo_contrato']); ?>">
						<?php } ?>
						<?php if($_GET['formula2'] == 'gas') { ?>
						 <b>Marca - Gas - Con funciona</b>
						 <input type="text" name="vers_funciona" value="DUAL">
						 <input type="text" name="modal_funciona" value="PLUS">
						<?php } ?>
						<?php if($_GET['formula2'] == 'dual') { ?>
						 <b>Marca - Dual - Con funciona</b>
						 <input type="text" name="vers_funciona" value="DUAL">
						 <input type="text" name="modal_funciona" value="PLUS">
						<?php } ?>
					<?php } ?>
				<?php } ?>
		  </div>
		</form>
		</div>
      </div>
    </div>
  </div>
</div>
<?php } ?>