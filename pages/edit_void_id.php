<?php $c_sql = mysql_query("SELECT * FROM contratos_voids WHERE id='". Filter($_GET[id]) ."'"); while($c = mysql_fetch_assoc($c_sql)){ ?>
<?php if($_GET['action'] == 'recuperar'){ ?>
<?php 
  $Var = mysql_query("SELECT * FROM contratos ORDER BY id DESC LIMIT 1");$count_contratos = mysql_fetch_assoc($Var);
	$ultimocontrato = $count_contratos[id]+1;
$Var = mysql_query("SELECT * FROM cigs ORDER BY id DESC LIMIT 1");
	$n = mysql_fetch_assoc($Var);

	if($n[num] == ''){
		$numero = '1';
	} else {
		$numero = $n[num]++;
		$numero++;
	}
if (mysql_num_rows($Var) == 0) {
    '001';
	$nnuummeerroo = '00' . $numero;
} elseif($n[num] <= 9){
	'00' . $numero;
	$nnuummeerroo = '00' . $numero;
} elseif($numero <= 99){
	'0' . $numero;
	$nnuummeerroo = '0' . $numero;
} else {
	$numero;
	$nnuummeerroo = $numero;
}
if (isset($_POST['tipo_contrato_negocios'])) {
	$tipo_contrato_negocios = $_POST['tipo_contrato_negocios'];
	mysql_query("UPDATE contratos_voids SET tipo_contrato='$tipo_contrato_negocios' WHERE id='". Filter($_GET[id]) ."'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_void_id&id='. Filter($_GET[id]) .'&action=recuperar";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['tipo_contrato_hogares'])) {
	$tipo_contrato_hogares = $_POST['tipo_contrato_hogares'];
	mysql_query("UPDATE contratos_voids SET tipo_contrato='$tipo_contrato_hogares', formula2='' WHERE id='". Filter($_GET[id]) ."'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_void_id&id='. Filter($_GET[id]) .'&action=recuperar";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['formula_luz'])) {
	$formula_luz = $_POST['formula_luz'];
	mysql_query("UPDATE contratos_voids SET formula='$formula_luz', formula2='' WHERE id='". Filter($_GET[id]) ."'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_void_id&id='. Filter($_GET[id]) .'&action=recuperar";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['formula_marca'])) {
	$formula_marca = $_POST['formula_marca'];
	mysql_query("UPDATE contratos_voids SET formula='$formula_marca' WHERE id='". Filter($_GET[id]) ."'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_void_id&id='. Filter($_GET[id]) .'&action=recuperar";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['formula_gas'])) {
	$formula_gas = $_POST['formula_gas'];
	mysql_query("UPDATE contratos_voids SET formula='$formula_gas', formula2='' WHERE id='". Filter($_GET[id]) ."'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_void_id&id='. Filter($_GET[id]) .'&action=recuperar";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['formula_dual'])) {
	$formula_dual = $_POST['formula_dual'];
	mysql_query("UPDATE contratos_voids SET formula='$formula_dual', formula2='' WHERE id='". Filter($_GET[id]) ."'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_void_id&id='. Filter($_GET[id]) .'&action=recuperar";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['formula_maxahorro'])) {
	$formula_maxahorro = $_POST['formula_maxahorro'];
	mysql_query("UPDATE contratos_voids SET formula='$formula_maxahorro', formula2='' WHERE id='". Filter($_GET[id]) ."'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_void_id&id='. Filter($_GET[id]) .'&action=recuperar";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['formula_planahorro'])) {
	$formula_planahorro = $_POST['formula_planahorro'];
	mysql_query("UPDATE contratos_voids SET formula='$formula_planahorro', formula2='' WHERE id='". Filter($_GET[id]) ."'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_void_id&id='. Filter($_GET[id]) .'&action=recuperar";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['formula2_luz'])) {
	$formula2_luz = $_POST['formula2_luz'];
	mysql_query("UPDATE contratos_voids SET formula2='$formula2_luz' WHERE id='". Filter($_GET[id]) ."'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_void_id&id='. Filter($_GET[id]) .'&action=recuperar";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['formula2_gas'])) {
	$formula2_gas = $_POST['formula2_gas'];
	mysql_query("UPDATE contratos_voids SET formula2='$formula2_gas' WHERE id='". Filter($_GET[id]) ."'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_void_id&id='. Filter($_GET[id]) .'&action=recuperar";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['formula2_dual'])) {
	$formula2_dual = $_POST['formula2_dual'];
	mysql_query("UPDATE contratos_voids SET formula2='$formula2_dual' WHERE id='". Filter($_GET[id]) ."'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_void_id&id='. Filter($_GET[id]) .'&action=recuperar";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['funciona_si'])) {
	$funciona_si = $_POST['funciona_si'];
	mysql_query("UPDATE contratos_voids SET funciona='$funciona_si' WHERE id='". Filter($_GET[id]) ."'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_void_id&id='. Filter($_GET[id]) .'&action=recuperar";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['codv_si'])) {
	$codv_si = $_POST['codv_si'];
	mysql_query("UPDATE contratos_voids SET cod_verificacion_posterior='$codv_si' WHERE id='". Filter($_GET[id]) ."'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_void_id&id='. Filter($_GET[id]) .'&action=recuperar";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['codv_no'])) {
	$codv_no = $_POST['codv_no'];
	mysql_query("UPDATE contratos_voids SET cod_verificacion_posterior='$codv_no' WHERE id='". Filter($_GET[id]) ."'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_void_id&id='. Filter($_GET[id]) .'&action=recuperar";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['funciona_no'])) {
	$funciona_no = $_POST['funciona_no'];
	mysql_query("UPDATE contratos_voids SET funciona='$funciona_no' WHERE id='". Filter($_GET[id]) ."'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_void_id&id='. Filter($_GET[id]) .'&action=recuperar";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['recuperar_void'])) {
	// Datos del Cliente
	//$fecha_venta = $_POST['fecha_venta'];
	$fecha_ventaorg = $_POST['fecha_venta'];
	$fecha_venta = date("d/m/Y", strtotime($fecha_ventaorg));
	$codigo_comercial = $_POST["codigo_comercial"];
	$tarjeta_socia = $_POST["tarjeta_socia"];
	$cod_verificacion = str_replace("V", "", $_POST["cod_verificacion"]); //Substituye los / por un campo vacío
	$cod_verificacion_posterior = $_GET['codv'];
	$vers_funciona = $c["vers_funciona"];
	$modal_funciona = $c["modal_funciona"];
	$we_dia = $_POST['we_dia'];
	$we_mes = $_POST['we_mes'];
	$we_ano = $_POST['we_ano'];
	$intro_dia = date("d");
	$intro_mes = date("m");
	$intro_ano = date("Y");
	$impl_explicito = $_POST["impl_explicito"];
	$subgerente2 = $_POST["subgerente2"];
	$consumo_pyme = $_POST["consumo_pyme"];
	// Obtener nombre de gerente que pertenece comercial
	$cg_sql = mysql_query("SELECT * FROM click_comerciales WHERE codigo_interno='$codigo_comercial'");$cg = mysql_fetch_assoc($cg_sql);
	
	// Datos del Cliente
	$nombre_titular = strtoupper($_POST["nombre_titular"]);
	$apellidos_titular = strtoupper($_POST["apellidos_titular"]);
	$dni_cif_titular = strtoupper($_POST["dni_cif_titular"]);
	$telefono_pref_1 = $_POST["telefono_pref_1"];
	$telefono_pref_2 = $_POST["telefono_pref_2"];
	$correo_electron = $_POST["correo_electron"];
	
	// Datos del Representante
	$representante_nombre = strtoupper($_POST["representante_nombre"]);
	$representante_apellidos = strtoupper($_POST["representante_apellidos"]);
	$dni_cif_representante = strtoupper($_POST["dni_cif_representante"]);
	$relacion_representante_titular = $_POST["relacion_representante_titular"];
	
	// Otra dirección » Cliente
	$cliente_tipo_via_otra = strtoupper($_POST["cliente_tipo_via_otra"]);
	$cliente_calle_otra = strtoupper(addslashes($_POST["cliente_calle_otra"]));
	$cliente_numero_otra = strtoupper($_POST["cliente_numero_otra"]);
	$cliente_escalera_otra = strtoupper($_POST["cliente_escalera_otra"]);
	$cliente_piso_otra = strtoupper($_POST["cliente_piso_otra"]);
	$cliente_letra_otra = strtoupper($_POST["cliente_letra_otra"]);
	$cliente_cod_postal_otra = strtoupper($_POST["cliente_cod_postal_otra"]);
	$cliente_poblacion_otra = strtoupper(addslashes($_POST["cliente_poblacion_otra"]));
	$cliente_municipio_otra = strtoupper(addslashes($_POST["cliente_municipio_otra"]));
	
	// Otra dirección » Envío de facturas
	$tipo_via_ef_otra = strtoupper($_POST["tipo_via_ef_otra"]);
	$calle_ef_otra = strtoupper($_POST["calle_ef_otra"]);
	$numero_ef_otra = strtoupper($_POST["numero_ef_otra"]);
	$escalera_ef_otra = strtoupper($_POST["escalera_ef_otra"]);
	$piso_ef_otra = strtoupper($_POST["piso_ef_otra"]);
	$letra_ef_otra = strtoupper($_POST["letra_ef_otra"]);
	$cod_postal_ef_otra = strtoupper($_POST["cod_postal_ef_otra"]);
	$poblacion_ef_otra = strtoupper(addslashes($_POST["poblacion_ef_otra"]));
	$municipio_ef_otra = strtoupper(addslashes($_POST["municipio_ef_otra"]));
	
	// Datos del Punto de Suministro
	$tipo_via_ps = strtoupper($_POST["tipo_via_ps"]);
	$calle_ps = strtoupper(addslashes($_POST["calle_ps"]));
	$numero_ps = strtoupper($_POST["numero_ps"]);
	$escalera_ps = strtoupper($_POST["escalera_ps"]);
	$piso_ps = strtoupper($_POST["piso_ps"]);
	$letra_ps = strtoupper($_POST["letra_ps"]);
	$cod_postal_ps = strtoupper($_POST["cod_postal_ps"]);
	$poblacion_ps = strtoupper(addslashes($_POST["poblacion_ps"]));
	$municipio_ps = strtoupper(addslashes($_POST["municipio_ps"]));
	$cups_luz = strtoupper($_POST["cups_luz"]);
	$cups_gas = strtoupper($_POST["cups_gas"]);
	$cnae = strtoupper($_POST["cnae"]);
	
	// Suministro de electricidad
	$maximetro = $_POST["maximetro"];
	$tipo_alta_luz = $_POST["tipo_alta_luz"];
	$potencia_p1 = $_POST["potencia_p1"];
	$potencia_p2 = $_POST["potencia_p2"];
	$potencia_p3 = $_POST["potencia_p3"];
	$precio_luz_edp = $_POST["precio_luz_edp"];
	$tarifa_ref_luz = strtoupper($_POST["tarifa_ref_luz"]);
	//$descuento_luz = $_POST["descuento_luz"];
	$descuento_luz = str_replace(array(",","."), array("", ""), $_POST["descuento_luz"]);
	
	// Suministro de gas natural
	$tipo_alta_gas = $_POST["tipo_alta_gas"];
	$precio_gas_edp = $_POST["precio_gas_edp"];
	$tarifa_ref_gas = str_replace(",", ".", $_POST["tarifa_ref_gas"]);
	//$descuento_gas = $_POST["descuento_gas"];
	$descuento_gas = str_replace(array(",","."), array("", ""), $_POST["descuento_gas"]);
	
	// Servicios
	$plan_destino_luz = $_POST["plan_destino_luz"];
	$plan_destino_gas = $_POST["plan_destino_gas"];
	$plan_destino_fun = $_POST["plan_destino_fun"];
	$tipo_de_funciona = $_POST["tipo_de_funciona"];
	$contrata_opcion_clima = strtoupper($_POST["contrata_opcion_clima"]);
	$marca_caldera = strtoupper($_POST["marca_caldera"]);
	$marca_aparato_climatizacion = strtoupper($_POST["marca_aparato_climatizacion"]);
	$ccc_1 = $_POST["ccc_1"];
	$ccc_2 = $_POST["ccc_2"];
	$ccc_3 = $_POST["ccc_3"];
	$ccc_4 = $_POST["ccc_4"];
	
	// Obtener C.I.G automático
	$cig = "118". date(y) . date(m) . date(d) ."1". $nnuummeerroo ."";
	$error = "0";
		// CUPS LUZ
		$cups_luz_verify = mysql_query("SELECT * FROM contratos WHERE cups_luz='$cups_luz' LIMIT 1");
		$cups_luz_fetch = mysql_fetch_assoc($cups_luz_verify);
		// CUPS GAS
		$cups_gas_verify = mysql_query("SELECT * FROM contratos WHERE cups_gas='$cups_gas' LIMIT 1");
		$cups_gas_fetch = mysql_fetch_assoc($cups_gas_verify);
		// CÓDIGO DE VERIFICACIÓN
		$cod_verificacion_verify = mysql_query("SELECT * FROM contratos WHERE cod_verificacion='$cod_verificacion' LIMIT 1");
		$cod_verificacion_fetch = mysql_fetch_assoc($cod_verificacion_verify);
		// ALERTAS > CÓDIGO DE VERIFICACIÓN
		$verificacion_verify = mysql_query("SELECT * FROM alerts WHERE verificacion='$cod_verificacion' LIMIT 1");
		$verificacion_fetch = mysql_fetch_assoc($verificacion_verify);
		// ALERTAS > DNI TITULAR
		$alert_verify = mysql_query("SELECT * FROM alerts WHERE nif='$dni_cif_titular' LIMIT 1");
		$alert_fetch = mysql_fetch_assoc($alert_verify);
		// ALERTAS > CÓDIGO DE COMERCIAL
		$alertx_verify = mysql_query("SELECT * FROM alerts WHERE codigo_comercial='$codigo_comercial' LIMIT 1");
		$alertx_fetch = mysql_fetch_assoc($alertx_verify);
		
	mysql_query("INSERT INTO historial (type,user,date) VALUES ('new_contract','$user[username]','". date('Y-m-d') ."')");
	mysql_query("INSERT INTO cigs (num,fecha,user_intro) VALUES ('$numero','". date(d) ."/". date(m) ."/". date(Y) ." ". date(H) .":". date(i) .":". date(s) ."','$user[username]')");
	mysql_query("INSERT INTO contratos_estado_historial (type,contrato_id,user,fecha,estado) VALUES ('contrato','$ultimocontrato','$user[username]','". date('d') ."-". date('m') ."-". date('Y') ."','INTRODUCIDO')");
	mysql_query("INSERT INTO contratos (
	gerente,subgerente,subgerente2,oficina,fecha_venta,codigo_comercial,nombre_titular,
	apellidos_titular,dni_cif_titular,telefono_pref_1,
	telefono_pref_2,correo_electron,representante_nombre,
	representante_apellidos,dni_cif_representante,relacion_representante_titular,
	cliente_tipo_via_otra,cliente_calle_otra,cliente_numero_otra,
	cliente_escalera_otra,cliente_piso_otra,cliente_letra_otra,
	cliente_cod_postal_otra,cliente_poblacion_otra,cliente_municipio_otra,
	tipo_via_ef_otra,calle_ef_otra,numero_ef_otra,
	escalera_ef_otra,piso_ef_otra,letra_ef_otra,
	cod_postal_ef_otra,poblacion_ef_otra,municipio_ef_otra,
	tipo_via_ps,calle_ps,numero_ps,
	escalera_ps,piso_ps,letra_ps,
	cod_postal_ps,poblacion_ps,municipio_ps,
	cups_luz,cups_gas,cnae,
	maximetro,tipo_alta_luz,potencia_p1,
	potencia_p2,potencia_p3,precio_luz_edp,
	tarifa_ref_luz,descuento_luz,tipo_alta_gas,
	precio_gas_edp,tarifa_ref_gas,descuento_gas,
	plan_destino_luz,plan_destino_gas,plan_destino_fun,
	tipo_de_funciona,contrata_opcion_clima,marca_caldera,
	marca_aparato_climatizacion,ccc_1,ccc_2,
	ccc_3,ccc_4,tarjeta_socia,cod_verificacion,cod_verificacion_posterior,cig,
	tipo_contrato,formula,funciona,formula2,
	vers_funciona,modal_funciona,user_contrato_intro,fecha_contrato_intro,
	we_dia,we_mes,we_ano,impl_explicito,consumo_pyme,intro_dia,intro_mes,intro_ano,estado_contrato) VALUES (
	'$cg[gerente]','$cg[subgerente]','$subgerente2','$cg[oficina]','$fecha_venta','$codigo_comercial','$nombre_titular',
	'$apellidos_titular','$dni_cif_titular','$telefono_pref_1',
	'$telefono_pref_2','$correo_electron','$representante_nombre',
	'$representante_apellidos','$dni_cif_representante','$relacion_representante_titular',
	'$cliente_tipo_via_otra','$cliente_calle_otra','$cliente_numero_otra',
	'$cliente_escalera_otra','$cliente_piso_otra','$cliente_letra_otra',
	'$cliente_cod_postal_otra','$cliente_poblacion_otra','$cliente_municipio_otra',
	'$tipo_via_ef_otra','$calle_ef_otra','$numero_ef_otra',
	'$escalera_ef_otra','$piso_ef_otra','$letra_ef_otra',
	'$cod_postal_ef_otra','$poblacion_ef_otra','$municipio_ef_otra',
	'$tipo_via_ps','$calle_ps','$numero_ps',
	'$escalera_ps','$piso_ps','$letra_ps',
	'$cod_postal_ps','$poblacion_ps','$municipio_ps',
	'$cups_luz','$cups_gas','$cnae',
	'$maximetro','$tipo_alta_luz','$potencia_p1',
	'$potencia_p2','$potencia_p3','$precio_luz_edp',
	'$tarifa_ref_luz','$descuento_luz','$tipo_alta_gas',
	'$precio_gas_edp','$tarifa_ref_gas','$descuento_gas',
	'$plan_destino_luz','$plan_destino_gas','$plan_destino_fun',
	'$tipo_de_funciona','$contrata_opcion_clima','$marca_caldera',
	'$marca_aparato_climatizacion','$ccc_1','$ccc_2',
	'$ccc_3','$ccc_4','$tarjeta_socia','$cod_verificacion','$cod_verificacion_posterior','$cig',
	'$c[tipo_contrato]','$c[formula]','$c[funciona]','$c[formula2]',
	'$vers_funciona','$modal_funciona','$user[username]','". time() ."',
	'$we_dia','$we_mes','$we_ano','$impl_explicito','$consumo_pyme','$intro_dia','$intro_mes','$intro_ano','RECUPERADO')");
	mysql_query("DELETE FROM contratos_voids WHERE id='$c[id]'");
	echo "
	<script>
    sweetAlert({
      title:'¡Enhorabuena!',
      html: 'El cig generado es &#187; <b>$cig</b>', 
	  imageUrl: '$config[site]/images/explosion-de-confeti-gif-10.gif',
	  imageWidth: 200,
	  imageHeight: 200,
	  confirmButtonText: 'Aceptar',
    },function(isConfirm){
      alert('ok');
    });
    $('.swal2-confirm').click(function(){
	  window.location.href = 'index.php?page=all_voids';
    });
	</script>
	";
		
}
?>
<?php echo $mensaje; ?>
<div class="row">
	<form method="POST">
	  <div class="col s12 m6">
		<button type="submit" name="tipo_contrato_negocios" value="NEGOCIOS" class="waves-effect waves-light btn" style="width: 100%;<?php if($c['tipo_contrato'] == 'NEGOCIOS'){ echo 'background: '. $config[colorsv] .';'; }else{ echo'background: #444;'; } ?>"><i class="material-icons right">store</i>Negocios</button>
	  </div>
	</form>
	<form method="POST">
	  <div class="col s12 m6">
		<button type="submit" name="tipo_contrato_hogares" value="HOGARES" class="waves-effect waves-light btn" style="width: 100%;<?php if($c['tipo_contrato'] == 'HOGARES'){ echo 'background: '. $config[colorsv] .';'; }else{ echo'background: #444;'; } ?>"><i class="material-icons right">home</i>Hogares</button>
	  </div>
	</form>
	  <br><br>
	<?php if($c['tipo_contrato']){ ?>
	<form method="POST">
	  <div class="col s12 m1">
		<button type="submit" name="formula_luz" value="luz" class="waves-effect waves-light btn" style="width: 100%;padding: 0;<?php if($c['formula'] == 'luz'){ echo 'background: '. $config[colorsv] .';'; }else{ echo'background: #444;'; } ?>">Luz</button>
	  </div>
	</form>
	<form method="POST">
	  <div class="col s12 m2">
		<button type="submit" name="formula_marca" value="marca" class="waves-effect waves-light btn" style="width: 100%;<?php if($c['formula'] == 'marca'){ echo 'background: '. $config[colorsv] .';'; }else{ echo'background: #444;'; } ?>">Carrefour</button>
	  </div>
	</form>
	<form method="POST">
	  <div class="col s12 m1">
		<button type="submit" name="formula_gas" value="gas" class="waves-effect waves-light btn" style="width: 100%;padding: 0;<?php if($c['formula'] == 'gas'){ echo 'background: '. $config[colorsv] .';'; }else{ echo'background: #444;'; } ?>">Gas</button>
	  </div>
	</form>
	<form method="POST">
	  <div class="col s12 m2">
		<button type="submit" name="formula_dual" value="dual" class="waves-effect waves-light btn" style="width: 100%;<?php if($c['formula'] == 'dual'){ echo 'background: '. $config[colorsv] .';'; }else{ echo'background: #444;'; } ?>">Dual</a>
	  </div>
	</form>
	<form method="POST">
	  <div class="col s12 m3">
		<button type="submit" name="formula_maxahorro" value="maxahorro" class="waves-effect waves-light btn" style="width: 100%;<?php if($c['formula'] == 'maxahorro'){ echo 'background: '. $config[colorsv] .';'; }else{ echo'background: #444;'; } ?>">MÁXIMO AHORRO</button>
	  </div>
	</form>
	<form method="POST">
	  <div class="col s12 m3">
		<button type="submit" name="formula_planahorro" value="planahorro" class="waves-effect waves-light btn" style="width: 100%;<?php if($c['formula'] == 'planahorro'){ echo 'background: '. $config[colorsv] .';'; }else{ echo'background: #444;'; } ?>">PLAN AHORRO</button>
	  </div>
	</form>
	  <?php if($c['formula'] == 'marca') { ?>
	  <br><br>
	<form method="POST">
	  <div class="col s12 m4">
		<button type="submit" name="formula2_luz" value="luz" class="waves-effect waves-light btn" style="width: 100%;<?php if($c['formula2'] == 'luz'){ echo 'background: '. $config[colorsv] .';'; }else{ echo'background: #444;'; } ?>">Luz</button>
	  </div>
	</form>
	<form method="POST">
	  <div class="col s12 m4">
		<button type="submit" name="formula2_gas" value="gas" class="waves-effect waves-light btn" style="width: 100%;<?php if($c['formula2'] == 'gas'){ echo 'background: '. $config[colorsv] .';'; }else{ echo'background: #444;'; } ?>">Gas</button>
	  </div>
	</form>
	<form method="POST">
	  <div class="col s12 m4">
		<button type="submit" name="formula2_dual" value="dual" class="waves-effect waves-light btn" style="width: 100%;<?php if($c['formula2'] == 'dual'){ echo 'background: '. $config[colorsv] .';'; }else{ echo'background: #444;'; } ?>">Dual</button>
	  </div>
	</form>
	  <?php } ?>
		<br><br>
	<?php if($c['formula']){ ?>
	<form method="POST">
	  <div class="col s12 m6">
		<button type="submit" name="funciona_si" value="si" class="waves-effect waves-light btn" style="width: 100%;<?php if($c['funciona'] == 'si'){ echo 'background: '. $config[colorsv] .';'; }else{ echo'background: #444;'; } ?>">Con funciona</button>
	  </div>
	</form>
	<form method="POST">
	  <div class="col s12 m6">
		<button type="submit" name="funciona_no" value="no" class="waves-effect waves-light btn" style="width: 100%;<?php if($c['funciona'] == 'no'){ echo 'background: '. $config[colorsv] .';'; }else{ echo'background: #444;'; } ?>">Sin funciona</button>
	  </div>
	</form>
	<?php } ?>
	<?php } ?>
	<div class="col s12 m12">
	  <p class="light white-text center" style="background: <?php echo $config['colorsv']; ?>;"><b ><?php echo strtoupper($c['tipo_contrato']); ?></b> <?php if($c['formula'] == ''){ echo '<br>Por favor, selecciona un tipo de contrato...'; } else { ?>&#187; Has seleccionado un contrato de tipo <b ><?php echo $c['formula']; ?></b> <?php if($c['formula2'] == '') {}else{ echo '('. $c[formula2] .')'; } ?><?php } ?> <?php if($c['funciona'] == 'no'){ echo ''; } elseif($c['funciona'] == 'si') { echo 'con funciona'; } else {}  ?></p>
	</div>
	<?php if($c['funciona']){ ?>
	<form method="POST">
	  <div class="col s12 m6">
		<button type="submit" name="codv_si" value="posterior" class="waves-effect waves-light btn" style="width: 100%;<?php if($c['cod_verificacion_posterior'] == 'posterior'){ echo 'background: '. $config[colorsv] .';'; }else{ echo'background: #444;'; } ?>">Código de Verificación <b>Posterior</b></button>
	  </div>
	</form>
	<form method="POST">
	  <div class="col s12 m6">
		<button type="submit" name="codv_no" value="verificacion" class="waves-effect waves-light btn" style="width: 100%;<?php if($c['cod_verificacion_posterior'] == 'verificacion'){ echo 'background: '. $config[colorsv] .';'; }else{ echo'background: #444;'; } ?>">Código de <b>Verificación</b></button>
	  </div>
	</form>
	<?php } ?>
	
	<?php if($c['cod_verificacion_posterior']){ ?>
	<form method="POST">
  <div class="row">
    <div class="col s12 m12">
      <div class="card">
        <div class="card-content black-text">
          <div class="row">
		  <div class="input-field col s12 m12">
			<select class="browser-default" name="subgerente2" required>
			  <option value="<?php echo $c['subgerente2']; ?>" selected><?php echo $c['subgerente2']; ?></option>
				<?php $gg_sql = mysql_query("SELECT * FROM click_gerentes_introductores ORDER BY subgerente"); while($g = mysql_fetch_assoc($gg_sql)){ ?>
				<option value="<?php echo $g['subgerente']; ?>"><?php echo $g['subgerente']; ?></option>
				<?php } ?>
			</select>
		  </div>
		  <div class="input-field col s12 m12">
			<span class="card-title">Validador de cuenta bancaria</span>
			  <div class="input-field col s12 m3">
			    <input type="text" id="entidad" name="ccc_1" onkeyup="if (this.value.length == this.getAttribute('maxlength')) oficina.focus()" class="validate" maxlength="4" data-length="4" required>
			    <label for="Entidad">Entidad</label>
			  </div>
			  <div class="input-field col s12 m2">
			    <input type="text" id="oficina" name="ccc_2" onkeyup="if (this.value.length == this.getAttribute('maxlength')) dc.focus()" class="validate" maxlength="4" data-length="4" required>
			    <label for="oficina">Oficina</label>
			  </div>
			  <div class="input-field col s12 m2">
			    <input type="text" id="dc" name="ccc_3" onkeyup="if (this.value.length == this.getAttribute('maxlength')) ncuenta.focus()" class="validate" maxlength="2" data-length="2" required>
			    <label for="dc">DC</label>
			  </div>
			  <div class="input-field col s12 m3">
			    <input type="text" id="ncuenta" name="ccc_4" class="validate" maxlength="10" data-length="10" required>
			    <label for="ncuenta">ncuenta</label>
			  </div>
			  <div class="input-field col s12 m2">
			  	<input type="button" style="width: 100%;background: #444;" class="btn" onclick="validaycalculaIBAN();" value="Validar"/>
			  </div>
		  </div>
		  <div class="input-field col s12 m12">
			<span class="card-title">Datos esenciales</span>
			  <div class="input-field col s12 m4">
			    <i class="material-icons prefix">voicemail</i>
			    <input id="cod_verificacion" pattern="[0-9]{14}" value="<?php echo $c['cod_verificacion']; ?>" name="cod_verificacion" type="text" class="validate"  maxlength="14" data-length="14" required>
			    <label for="cod_verificacion">Código de Verificación</label>
			  </div>
			  <div class="input-field col s12 m3">
			    <div id="resultadoBusqueda" style="text-align: left;position: fixed;background: #fff;z-index: 1200;top: 0%;right: 0%;padding: 5px 10px;"></div>
			    <i class="material-icons prefix">face</i>
			    <input autocomplete="off" onKeyUp="buscar();" id="busqueda" id="codigo_comercial" pattern="[0123456789]{5}" value="<?php echo $c['codigo_comercial']; ?>" name="codigo_comercial" type="text" class="validate"  maxlength="5" data-length="5" required>
			    <label for="codigo_comercial">Código de comercial</label>
			  </div>
			  <div class="input-field col s12 m5">
			  	<select class="browser-default" name="impl_explicito">
			  	  <?php if($c['impl_explicito'] == ''){ ?>
				  <option value="" disabled selected>LOPD</option>
				  <?php } else { ?>
			  	  <option value="<?php echo $c['impl_explicito']; ?>" selected><?php echo $c['impl_explicito']; ?></option>
				  <?php } ?>
			  	  <option value="SI">SI</option>
			  	  <option value="NO">NO</option>
			  	  <option value="">DEJAR VACÍO</option>
			  	</select>
			  </div>
			  <div class="input-field col s12 m12"></div>
			  <div class="input-field col s12 m4">
			    <i class="material-icons prefix">date_range</i>
			    <input id="we_dia" value="<?php echo $c['we_dia']; ?>" name="we_dia" type="text" pattern="[0-9]{2}" class="validate"  maxlength="2" data-length="2" required>
			    <label for="we_dia">DÍA WE</label>
			  </div>
			  <div class="input-field col s12 m4">
			    <i class="material-icons prefix">date_range</i>
			    <input id="we_mes" value="<?php echo $c['we_mes']; ?>" name="we_mes" type="text" pattern="[0-9]{2}" class="validate"  maxlength="2" data-length="2" required>
			    <label for="we_mes">MES WE</label>
			  </div>
			  <div class="input-field col s12 m4">
			    <select class="browser-default" name="we_ano" pattern="[0-9]{4}" class="validate">
			      <option value="<?php echo $c['we_ano']; ?>" selected><?php echo $c['we_ano']; ?></option>
			      <option value="<?php echo date("Y")-1; ?>"><?php echo date("Y")-1; ?></option>
			    </select>
			  </div>
			<?php if($c['tipo_contrato'] == 'NEGOCIOS'){ ?>
			  <div class="input-field col s12 m12">
			    <input id="consumo_pyme" name="consumo_pyme" type="text" class="validate" value="<?php echo $c['consumo_pyme']; ?>" required>
			    <label for="consumo_pyme">CONSUMO PYME</label>
			  </div>
			<?php } ?>
		  </div>
		  <div class="input-field col s12 m12">
			<span class="card-title">Datos del Cliente</span>
			<div class="input-field col s12 m6">
			  <i class="material-icons prefix">account_box</i>
			  <input id="nombre" value="<?php echo $c['nombre_titular']; ?>" name="nombre_titular" type="text" class="validate" required>
			  <label for="nombre">Nombre / Razón Social</label>
			</div>
			<div class="input-field col s12 m6">
			  <i class="material-icons prefix">account_box</i>
			  <input id="apellido" value="<?php echo $c['apellidos_titular']; ?>" name="apellidos_titular" type="text" class="validate"  required>
			  <label for="apellido">Apellidos</label>
			</div>
			<div class="input-field col s12 m6">
			  <i class="material-icons prefix">subtitles</i><!-- DNI > pattern="(([X-Z]{1})([-]?)(\d{7})([-]?)([A-Z]{1}))|((\d{8})([-]?)([A-Z]{1}))" -->
			  <input id="dni" value="<?php echo $c['dni_cif_titular']; ?>" name="dni_cif_titular" maxlength="9" pattern="(([X-Zx-z]{1})([-]?)(\d{7})([-]?)([A-Za-z]{1}))|(((\d{8})([-]?)([A-Za-z]{1})))|(([ABCDEFGHJNPQRSUVWabcdefghjnpqrsuvw]{1})([0-9]{8}))" data-length="9" onblur="validate()" type="text" class="validate" required>
			  <label for="dni">DNI / NIE / CIF</label>
			</div>
			<div class="input-field col s12 m3">
			  <i class="material-icons prefix">phone_iphone</i>
			  <input id="telf1" value="<?php echo $c['telefono_pref_1']; ?>" name="telefono_pref_1" type="tel" class="validate" pattern="[0-9]{9}"  required>
			  <label for="telf1">Teléfono 1</label>
			</div>
			<div class="input-field col s12 m3">
			  <i class="material-icons prefix">phone_iphone</i>
			  <input id="telf2" name="telefono_pref_2" type="tel" class="validate" pattern="[0-9]{9}" >
			  <label for="telf2">Teléfono 2</label>
			</div>
			<div class="input-field col s12 m12">
			  <i class="material-icons prefix">email</i>
			  <input id="testemail" name="correo_electron" type="email" class="validate" >
			  <label for="x">Correo electrónico</label>
			</div>
		  </div>
		  <div class="input-field col s12 m12">
			<span class="card-title">Datos del Representante</span>
			<div class="input-field col s12 m6">
			  <i class="material-icons prefix">account_box</i>
			  <input id="nombre" name="representante_nombre" type="text" class="validate" >
			  <label for="nombre">Nombre</label>
			</div>
			<div class="input-field col s12 m6">
			  <i class="material-icons prefix">account_box</i>
			  <input id="apellido" name="representante_apellidos" type="text" class="validate" >
			  <label for="apellido">Apellidos</label>
			</div>
			<div class="input-field col s12 m6">
			  <i class="material-icons prefix">subtitles</i>
			  <input id="dni" name="dni_cif_representante" maxlength="9" data-length="9" onblur="nif(this.value)" type="text" class="validate" >
			  <label for="dni">DNI / NIE / CIF</label>
			</div>
			<div class="input-field col s12 m6">
			<i class="material-icons prefix">gesture</i>
			<select name="relacion_representante_titular">
			  <option value="" selected>Escoge una opción</option>
			  <option value="Cónyuge/pareja registrada">Cónyuge/pareja registrada</option>
			  <option value="Ascendiente/descendiente">Ascendiente/descendiente</option>
			  <option value="Apoderado">Apoderado</option>
			</select>
			<label>Relación con Cliente</label>
			</div>
		  </div>
		  <div class="input-field col s12 m12">
			<span class="card-title">Direcciones</span>
			<ul class="collapsible popout" data-collapsible="expandable">
            <li class="active">
              <div class="collapsible-header"><i class="material-icons">star</i>Punto de Suministro</div>
              <div class="collapsible-body"><span>
	        	<div class="row">
	        	<div class="input-field col s12 m4">
	        	  <i class="material-icons prefix">location_on</i>
	        	  <input id="tipo_via_ps" name="tipo_via_ps" type="text" class="validate"  required>
	        	  <label for="tipo_via_ps">Tipo de vía</label>
	        	</div>
	        	<div class="input-field col s12 m6">
	        	  <i class="material-icons prefix">location_on</i>
	        	  <input id="calle" name="calle_ps" type="text" class="validate"  required>
	        	  <label for="calle">Dirección</label>
	        	</div>
	        	<div class="input-field col s12 m2">
	        	  <i class="material-icons prefix">location_on</i>
	        	  <input id="ndupl" name="numero_ps" type="text" class="validate" >
	        	  <label for="ndupl">Nº / Dupl</label>
	        	</div>
	        	<div class="input-field col s12 m2">
	        	  <i class="material-icons prefix">location_on</i>
	        	  <input id="escalera" name="escalera_ps" type="text" class="validate" >
	        	  <label for="escalera">Esc.</label>
	        	</div>
	        	<div class="input-field col s12 m2">
	        	  <i class="material-icons prefix">location_on</i>
	        	  <input id="piso" name="piso_ps" type="text" class="validate" value="#"  required>
	        	  <label for="piso">Piso</label>
	        	</div>
	        	<div class="input-field col s12 m3">
	        	  <i class="material-icons prefix">location_on</i>
	        	  <input id="letra" name="letra_ps" type="text" class="validate" >
	        	  <label for="letra">Letra / Mano</label>
	        	</div>
	        	<div class="input-field col s12 m5">
	        	  <i class="material-icons prefix">location_on</i>
	        	  <input id="cp" name="cod_postal_ps" type="text" class="validate"  required>
	        	  <label for="cp">Código postal</label>
	        	</div>
	        	<div class="input-field col s12 m6">
	        	  <i class="material-icons prefix">location_on</i>
	        	  <input id="poblacion" name="poblacion_ps" type="text" class="validate"  required>
	        	  <label for="poblacion">Población</label>
	        	</div>
	        	<div class="input-field col s12 m6">
	        	  <i class="material-icons prefix">location_on</i>
	        	  <input id="municipio_provincia" name="municipio_ps" type="text" class="validate"  required>
	        	  <label for="municipio_provincia">Municipio</label>
	        	</div>
	        	</div>
	          </span></div>
            </li>
            <li>
              <div class="collapsible-header"><i class="material-icons">star_border</i>Cliente</div>
              <div class="collapsible-body"><span>
	          <div class="row">
	        	<div class="input-field col s12 m4">
	        	  <i class="material-icons prefix">location_on</i>
	        	  <input id="cliente_tipo_via_otra" name="cliente_tipo_via_otra" type="text" class="validate" >
	        	  <label for="cliente_tipo_via_otra">Tipo de vía</label>
	        	</div>
	        	<div class="input-field col s12 m6">
	        	  <i class="material-icons prefix">location_on</i>
	        	  <input id="calle" name="cliente_calle_otra" type="text" class="validate" >
	        	  <label for="calle">Dirección</label>
	        	</div>
	        	<div class="input-field col s12 m2">
	        	  <i class="material-icons prefix">location_on</i>
	        	  <input id="ndupl" name="cliente_numero_otra" type="text" class="validate" >
	        	  <label for="ndupl">Nº / Dupl</label>
	        	</div>
	        	<div class="input-field col s12 m2">
	        	  <i class="material-icons prefix">location_on</i>
	        	  <input id="escalera" name="cliente_escalera_otra" type="text" class="validate" >
	        	  <label for="escalera">Esc.</label>
	        	</div>
	        	<div class="input-field col s12 m2">
	        	  <i class="material-icons prefix">location_on</i>
	        	  <input id="piso" name="cliente_piso_otra" type="text" value="#" class="validate" >
	        	  <label for="piso">Piso</label>
	        	</div>
	        	<div class="input-field col s12 m3">
	        	  <i class="material-icons prefix">location_on</i>
	        	  <input id="letra" name="cliente_letra_otra" type="text" class="validate" >
	        	  <label for="letra">Letra / Mano</label>
	        	</div>
	        	<div class="input-field col s12 m5">
	        	  <i class="material-icons prefix">location_on</i>
	        	  <input id="cp" name="cliente_cod_postal_otra" type="text" class="validate" >
	        	  <label for="cp">Código postal</label>
	        	</div>
	        	<div class="input-field col s12 m6">
	        	  <i class="material-icons prefix">location_on</i>
	        	  <input id="poblacion" name="cliente_poblacion_otra" type="text" class="validate" >
	        	  <label for="poblacion">Población</label>
	        	</div>
	        	<div class="input-field col s12 m6">
	        	  <i class="material-icons prefix">location_on</i>
	        	  <input id="municipio_ps" name="cliente_municipio_otra" type="text" class="validate" >
	        	  <label for="municipio_ps">Municipio</label>
	        	</div>
	          </div>
	          </span></div>
	        </li>
	        <li>
              <div class="collapsible-header"><i class="material-icons">star_border</i>Envío de Facturas</div>
              <div class="collapsible-body"><span>
	          <div class="row">
	        	<div class="input-field col s12 m4">
	        	  <i class="material-icons prefix">location_on</i>
	        	  <input id="tipo_via_ef_otra" name="tipo_via_ef_otra" type="text" class="validate" >
	        	  <label for="tipo_via_ef_otra">Tipo de vía</label>
	        	</div>
	        	<div class="input-field col s12 m6">
	        	  <i class="material-icons prefix">location_on</i>
	        	  <input id="calle" name="calle_ef_otra" type="text" class="validate" >
	        	  <label for="calle">Dirección</label>
	        	</div>
	        	<div class="input-field col s12 m2">
	        	  <i class="material-icons prefix">location_on</i>
	        	  <input id="ndupl" name="numero_ef_otra" type="text" class="validate" >
	        	  <label for="ndupl">Nº / Dupl</label>
	        	</div>
	        	<div class="input-field col s12 m2">
	        	  <i class="material-icons prefix">location_on</i>
	        	  <input id="escalera" name="escalera_ef_otra" type="text" class="validate" >
	        	  <label for="escalera">Esc.</label>
	        	</div>
	        	<div class="input-field col s12 m2">
	        	  <i class="material-icons prefix">location_on</i>
	        	  <input id="piso" name="piso_ef_otra" type="text" value="#" class="validate" >
	        	  <label for="piso">Piso</label>
	        	</div>
	        	<div class="input-field col s12 m3">
	        	  <i class="material-icons prefix">location_on</i>
	        	  <input id="letra" name="letra_ef_otra" type="text" class="validate" >
	        	  <label for="letra">Letra / Mano</label>
	        	</div>
	        	<div class="input-field col s12 m5">
	        	  <i class="material-icons prefix">location_on</i>
	        	  <input id="cp" name="cod_postal_ef_otra" type="text" class="validate" >
	        	  <label for="cp">Código postal</label>
	        	</div>
	        	<div class="input-field col s12 m6">
	        	  <i class="material-icons prefix">location_on</i>
	        	  <input id="poblacion" name="poblacion_ef_otra" type="text" class="validate" >
	        	  <label for="poblacion">Población</label>
	        	</div>
	        	<div class="input-field col s12 m6">
	        	  <i class="material-icons prefix">location_on</i>
	        	  <input id="municipio_ps" name="municipio_ef_otra" type="text" class="validate" >
	        	  <label for="municipio_ps">Municipio</label>
	        	</div>
	          </div>
	          </span></div>
	        </li>
  </ul>
		  </div>
		  <div class="input-field col s12 m12">
			<span class="card-title">Datos del Punto de Suministro</span>
			<?php if($c['formula'] == 'marca'){ ?>
				<?php if($c['formula2'] == 'luz'){ ?>
				<div class="input-field col s12 m12">
				<i class="material-icons prefix">flash_on</i>
				<input id="cups_luz_verify" value="<?php echo $c['cups_luz']; ?>" onblur="valida_cups(this.value)" name="cups_luz" type="text" class="validate" required>
				<label for="cups_luz">CUPS Electricidad</label>
				</div>
				<?php } ?>
				<?php if($c['formula2'] == 'gas'){ ?>
				<div class="input-field col s12 m6">
				  <i class="material-icons prefix">local_gas_station</i>
				  <input id="cups_gas_verify" value="<?php echo $c['cups_gas']; ?>" onblur="valida_cups(this.value)" name="cups_gas" type="text" class="validate" style="text-transform: uppercase;" required>
				  <label for="cups_gas">CUPS Gas</label>
				</div>
				<?php } ?>
				<?php if($c['formula2'] == 'dual'){ ?>
				<div class="input-field col s12 m6">
				<i class="material-icons prefix">flash_on</i>
				<input id="cups_luz_verify" value="<?php echo $c['cups_luz']; ?>" onblur="valida_cups(this.value)" name="cups_luz" type="text" class="validate" style="text-transform: uppercase;" required>
				<label for="cups_luz">CUPS Electricidad</label>
				</div>
				
				<div class="input-field col s12 m6">
				  <i class="material-icons prefix">local_gas_station</i>
				  <input id="cups_gas_verify" value="<?php echo $c['cups_gas']; ?>" onblur="valida_cups(this.value)" name="cups_gas" type="text" class="validate" style="text-transform: uppercase;" required>
				  <label for="cups_gas">CUPS Gas</label>
				</div>
				<?php } ?>
			<?php } ?>
			<?php if($c['formula'] == 'luz'){ ?>
				<div class="input-field col s12 m6">
				  <i class="material-icons prefix">flash_on</i>
				  <input id="cups_luz_verify" value="<?php echo $c['cups_luz']; ?>" onblur="valida_cups(this.value)" name="cups_luz" type="text" class="validate" style="text-transform: uppercase;" required>
				  <label for="cups_luz">CUPS Electricidad</label>
				</div>
			<?php } ?>
			<?php if($c['formula'] == 'maxahorro'){ ?>
				<div class="input-field col s12 m6">
				  <i class="material-icons prefix">flash_on</i>
				  <input id="cups_luz_verify" value="<?php echo $c['cups_luz']; ?>" onblur="valida_cups(this.value)" name="cups_luz" type="text" class="validate" style="text-transform: uppercase;" required>
				  <label for="cups_luz">CUPS Electricidad</label>
				</div>
			<?php } ?>
			<?php if($c['formula'] == 'gas'){ ?>
				<div class="input-field col s12 m5">
				  <i class="material-icons prefix">local_gas_station</i>
				  <input id="cups_gas_verify" value="<?php echo $c['cups_gas']; ?>" onblur="valida_cups(this.value)" name="cups_gas" type="text" class="validate" style="text-transform: uppercase;" required>
				  <label for="cups_gas">CUPS Gas</label>
				</div>
			<?php } ?>
			<?php if($c['formula'] == 'dual'){ ?>
				<div class="input-field col s12 m6">
				  <i class="material-icons prefix">flash_on</i>
				  <input id="cups_luz_verify" value="<?php echo $c['cups_luz']; ?>" onblur="valida_cups(this.value)" name="cups_luz" type="text" class="validate" style="text-transform: uppercase;" required>
				  <label for="cups_luz">CUPS Electricidad</label>
				</div>
				<div class="input-field col s12 m6">
				  <i class="material-icons prefix">local_gas_station</i>
				  <input id="cups_gas_verify" value="<?php echo $c['cups_gas']; ?>" onblur="valida_cups(this.value)" name="cups_gas" type="text" class="validate" style="text-transform: uppercase;" required>
				  <label for="cups_gas">CUPS Gas</label>
				</div>
			<?php } ?>
			<?php if($c['formula'] == 'planahorro'){ ?>
				<div class="input-field col s12 m6">
				  <i class="material-icons prefix">flash_on</i>
				  <input id="cups_luz_verify" value="<?php echo $c['cups_luz']; ?>" onblur="valida_cups(this.value)" name="cups_luz" type="text" class="validate" style="text-transform: uppercase;" required>
				  <label for="cups_luz">CUPS Electricidad</label>
				</div>
				<div class="input-field col s12 m6">
				  <i class="material-icons prefix">local_gas_station</i>
				  <input id="cups_gas_verify" value="<?php echo $c['cups_gas']; ?>" onblur="valida_cups(this.value)" name="cups_gas" type="text" class="validate" style="text-transform: uppercase;" required>
				  <label for="cups_gas">CUPS Gas</label>
				</div>
			<?php } ?>
			<?php if($c['tipo_contrato'] == 'HOGARES'){ ?>
				<div class="input-field col s12 m2">
				  <i class="material-icons prefix">bookmark</i>
				  <input id="cnae" name="cnae" type="text" value="9820" class="validate" style="text-transform: uppercase;" required>
				  <label for="cnae">CNAE</label>
				</div>
				<?php } else { ?>
				<div class="input-field col s12 m2">
				  <i class="material-icons prefix">bookmark</i>
				  <input id="cnae" name="cnae" type="text" class="validate" style="text-transform: uppercase;" required>
				  <label for="cnae">CNAE</label>
				</div>
			<?php } ?>
				<div class="input-field col s12 m4">
				  <i class="material-icons prefix">date_range</i>
				  <input id="fechaemision" value="<?php echo $c['fecha_venta']; ?>" name="fecha_venta" type="date" pattern="[0-9]{10}" maxlength="10" data-length="10" class="validate" style="text-transform: uppercase;" required>
				</div>
			<?php if($c['formula'] == 'marca'){ ?>
				<div class="input-field col s12 m6">
				  <i class="material-icons prefix">confirmation_number</i>
				  <input id="tarjeta_socia" name="tarjeta_socia" type="text" class="validate" style="text-transform: uppercase;" required>
				  <label for="tarjeta_socia">Nº Tarjeta del Club Carrefour</label>
				</div>
			<?php } ?>
			</div>
			<!-- Solo cuando haya luz de por medio LUZ -->
			<?php if($c['formula'] == 'luz'){ ?><div class="input-field col s12 m12"><span class="card-title">Suministro de electricidad</span></div><?php } ?>
			<?php if($c['formula'] == 'maxahorro'){ ?><div class="input-field col s12 m12"><span class="card-title">Suministro de electricidad</span></div><?php } ?>
			<?php if($c['formula'] == 'dual'){ ?><div class="input-field col s12 m12"><span class="card-title" >Suministro de electricidad y gas</span></div><?php } ?>
			<?php if($c['formula'] == 'planahorro'){ ?><div class="input-field col s12 m12"><span class="card-title">Suministro de electricidad y gas</span></div><?php } ?>
			<!-- Maximetro -->
			<?php if($c['formula'] == 'luz'){ ?><div class="input-field col s12 m6"><i class="material-icons prefix">shopping_basket</i><select name="maximetro"><option value="" selected>Escoge una opción</option><option value="Si">Si</option><option value="No">No</option></select><label>MAXÍMETRO</label></div><?php } ?>
			<?php if($c['formula'] == 'maxahorro'){ ?><div class="input-field col s12 m6"><i class="material-icons prefix">shopping_basket</i><select name="maximetro"><option value="" selected>Escoge una opción</option><option value="Si">Si</option><option value="No">No</option></select><label>MAXÍMETRO</label></div><?php } ?>
			<?php if($c['formula'] == 'dual'){ ?><div class="input-field col s12 m6"><i class="material-icons prefix">shopping_basket</i><select name="maximetro"><option value="" selected>Escoge una opción</option><option value="Si">Si</option><option value="No">No</option></select><label>MAXÍMETRO</label></div><?php } ?>
			<?php if($c['formula'] == 'planahorro'){ ?><div class="input-field col s12 m6"><i class="material-icons prefix">shopping_basket</i><select name="maximetro"><option value="" selected>Escoge una opción</option><option value="Si">Si</option><option value="No">No</option></select><label>MAXÍMETRO</label></div><?php } ?>
			
			<!-- Tipo alta luz -->
			<?php if($c['formula'] == 'luz'){ ?><div class="input-field col s12 m6"><i class="material-icons prefix">shopping_basket</i><select name="tipo_alta_luz"><option value="" selected required>Escoge una opción</option><option value="AD">AD</option><option value="CC">CC</option><option value="CC con CT">CC con CT</option><option value="CC con MT">CC con MT</option><option value="CC con CT y MT">CC con CT y MT</option><option value="CT">CT</option><option value="MT">MT</option><option value="NA">NA</option><option value="CT con MT">CT con MT</option></select><label>TIPO ALTA LUZ</label></div><?php } ?>
			<?php if($c['formula'] == 'maxahorro'){ ?><div class="input-field col s12 m6"><i class="material-icons prefix">shopping_basket</i><select name="tipo_alta_luz"><option value="" selected required>Escoge una opción</option><option value="AD">AD</option><option value="CC">CC</option><option value="CC con CT">CC con CT</option><option value="CC con MT">CC con MT</option><option value="CC con CT y MT">CC con CT y MT</option><option value="CT">CT</option><option value="MT">MT</option><option value="NA">NA</option><option value="CT con MT">CT con MT</option></select><label>TIPO ALTA LUZ</label></div><?php } ?>
			<?php if($c['formula'] == 'dual'){ ?><div class="input-field col s12 m6"><i class="material-icons prefix">shopping_basket</i><select name="tipo_alta_luz"><option value="" selected required>Escoge una opción</option><option value="AD">AD</option><option value="CC">CC</option><option value="CC con CT">CC con CT</option><option value="CC con MT">CC con MT</option><option value="CC con CT y MT">CC con CT y MT</option><option value="CT">CT</option><option value="MT">MT</option><option value="NA">NA</option><option value="CT con MT">CT con MT</option></select><label>TIPO ALTA LUZ</label></div><?php } ?>
			<?php if($c['formula'] == 'planahorro'){ ?><div class="input-field col s12 m6"><i class="material-icons prefix">shopping_basket</i><select name="tipo_alta_luz"><option value="" selected required>Escoge una opción</option><option value="AD">AD</option><option value="CC">CC</option><option value="CC con CT">CC con CT</option><option value="CC con MT">CC con MT</option><option value="CC con CT y MT">CC con CT y MT</option><option value="CT">CT</option><option value="MT">MT</option><option value="NA">NA</option><option value="CT con MT">CT con MT</option></select><label>TIPO ALTA LUZ</label></div><?php } ?>
			
			<!-- 3 potencias de luz -->
			<?php if($c['formula'] == 'luz'){ ?><div class="input-field col s12 m4"><i class="material-icons prefix">bookmark</i><input id="p1" name="potencia_p1" type="text" class="validate" required><label for="p1">POTENCIA CONTRATADA (P1)</label></div><div class="input-field col s12 m4"><i class="material-icons prefix">bookmark</i><input id="p2" name="potencia_p2" type="text" class="validate"><label for="p2">POTENCIA CONTRATADA (P2)</label></div><div class="input-field col s12 m4"><i class="material-icons prefix">bookmark</i><input id="p3" name="potencia_p3" type="text" class="validate"><label for="p3">POTENCIA CONTRATADA (P3)</label></div><?php } ?>
			<?php if($c['formula'] == 'maxahorro'){ ?><div class="input-field col s12 m4"><i class="material-icons prefix">bookmark</i><input id="p1" name="potencia_p1" type="text" class="validate" required><label for="p1">POTENCIA CONTRATADA</label></div><?php } ?>
			<?php if($c['formula'] == 'dual'){ ?><div class="input-field col s12 m4"><i class="material-icons prefix">bookmark</i><input id="p1" name="potencia_p1" type="text" class="validate" required><label for="p1">POTENCIA CONTRATADA (P1)</label></div><div class="input-field col s12 m4"><i class="material-icons prefix">bookmark</i><input id="p2" name="potencia_p2" type="text" class="validate"><label for="p2">POTENCIA CONTRATADA (P2)</label></div><div class="input-field col s12 m4"><i class="material-icons prefix">bookmark</i><input id="p3" name="potencia_p3" type="text" class="validate"><label for="p3">POTENCIA CONTRATADA (P3)</label></div><?php } ?>
			<?php if($c['formula'] == 'planahorro'){ ?><div class="input-field col s12 m4"><i class="material-icons prefix">bookmark</i><input id="p1" name="potencia_p1" type="text" class="validate" required><label for="p1">POTENCIA CONTRATADA (P1)</label></div><div class="input-field col s12 m4"><i class="material-icons prefix">bookmark</i><input id="p2" name="potencia_p2" type="text" class="validate"><label for="p2">POTENCIA CONTRATADA (P2)</label></div><div class="input-field col s12 m4"><i class="material-icons prefix">bookmark</i><input id="p3" name="potencia_p3" type="text" class="validate"><label for="p3">POTENCIA CONTRATADA (P3)</label></div><?php } ?>
			
			<!-- Tarifa acceso -->
			<?php if($c['formula'] == 'luz'){ ?><div class="input-field col s12 m4"><i class="material-icons prefix">shopping_basket</i><select name="tarifa_ref_luz" required><option value="" selected>Escoge una opción</option><option value="2.0A">2.0A</option><option value="2.0DHA">2.0DHA</option><option value="2.1A">2.1A</option><option value="2.1DHA">2.1DHA</option><option value="3.0A">3.0A</option></select><label>TARIFA DE ACCESO</label></div><?php } ?>
			<?php if($c['formula'] == 'maxahorro'){ ?><div class="input-field col s12 m4"><i class="material-icons prefix">shopping_basket</i><select name="tarifa_ref_luz" required><option value="" selected>Escoge una opción</option><option value="2.0DHA">2.0DHA</option><option value="2.1DHA">2.1DHA</option></select><label>TARIFA DE ACCESO</label></div><?php } ?>
			<?php if($c['formula'] == 'dual'){ ?><div class="input-field col s12 m4"><i class="material-icons prefix">shopping_basket</i><select name="tarifa_ref_luz" required><option value="" selected>Escoge una opción</option><option value="2.0A">2.0A</option><option value="2.0DHA">2.0DHA</option><option value="2.1A">2.1A</option><option value="2.1DHA">2.1DHA</option><option value="3.0A">3.0A</option></select><label>TARIFA DE ACCESO</label></div><?php } ?>
			<?php if($c['formula'] == 'planahorro'){ ?><div class="input-field col s12 m4"><i class="material-icons prefix">shopping_basket</i><select name="tarifa_ref_luz" required><option value="" selected>Escoge una opción</option><option value="2.0A">2.0A</option><option value="2.0DHA">2.0DHA</option><option value="2.1A">2.1A</option><option value="2.1DHA">2.1DHA</option><option value="3.0A">3.0A</option></select><label>TARIFA DE ACCESO</label></div><?php } ?>
			
			<!-- Descuento luz -->
			<?php if($c['formula'] == 'luz'){ ?><div class="input-field col s12 m4"><i class="material-icons prefix">bookmark</i><input id="f_luz" name="descuento_luz" type="text" class="validate" required><label for="f_luz">DESCUENTO LUZ (%)</label></div><?php } ?>
			<?php if($c['formula'] == 'maxahorro'){ ?><div class="input-field col s12 m4"><i class="material-icons prefix">bookmark</i><input id="f_luz" name="descuento_luz" type="text" class="validate" required><label for="f_luz">DESCUENTO LUZ (%)</label></div><?php } ?>
			<?php if($c['formula'] == 'dual'){ ?><div class="input-field col s12 m4"><i class="material-icons prefix">bookmark</i><input id="f_luz" name="descuento_luz" type="text" class="validate" required><label for="f_luz">DESCUENTO LUZ (%)</label></div><?php } ?>
			<?php if($c['formula'] == 'planahorro'){ ?><div class="input-field col s12 m4"><i class="material-icons prefix">bookmark</i><input id="f_luz" name="descuento_luz" type="text" class="validate" required><label for="f_luz">DESCUENTO LUZ (%)</label></div><?php } ?>
			
			<!-- Solo cuando haya gas de por medio GAS -->
			<?php if($c['formula'] == 'gas'){ ?><div class="input-field col s12 m12"><span class="card-title">Suministro de gas natural</span></div><?php } ?>
			<?php if($c['formula'] == 'dual'){ ?><div class="input-field col s12 m12"><span class="card-title" >Suministro de gas natural</span></div><?php } ?>
			<?php if($c['formula'] == 'planahorro'){ ?><div class="input-field col s12 m12"><span class="card-title">Suministro de gas natural</span></div><?php } ?>
			
			<!-- Tipo alta gas -->
			<?php if($c['formula'] == 'gas'){ ?><div class="input-field col s12 m6"><i class="material-icons prefix">shopping_basket</i><select name="tipo_alta_gas" required><option value="" selected>Escoge una opción</option><option value="AD">AD</option><option value="CC">CC</option><option value="CC con CT">CC con CT</option><option value="CT">CT</option><option value="NA">NA</option></select><label>TIPO ALTA GAS</label></div><?php } ?>
			<?php if($c['formula'] == 'dual'){ ?><div class="input-field col s12 m6"><i class="material-icons prefix">shopping_basket</i><select name="tipo_alta_gas" required><option value="" selected>Escoge una opción</option><option value="AD">AD</option><option value="CC">CC</option><option value="CC con CT">CC con CT</option><option value="CT">CT</option><option value="NA">NA</option></select><label>TIPO ALTA GAS</label></div><?php } ?>
			<?php if($c['formula'] == 'planahorro'){ ?><div class="input-field col s12 m6"><i class="material-icons prefix">shopping_basket</i><select name="tipo_alta_gas" required><option value="" selected>Escoge una opción</option><option value="AD">AD</option><option value="CC">CC</option><option value="CC con CT">CC con CT</option><option value="CT">CT</option><option value="NA">NA</option></select><label>TIPO ALTA GAS</label></div><?php } ?>
			
			<!-- Tarifa acceso gas -->
			<?php if($c['formula'] == 'gas'){ ?><div class="input-field col s12 m6"><i class="material-icons prefix">shopping_basket</i><select name="tarifa_ref_gas" required><option value="" selected>Escoge una opción</option><option value="3.1">3.1</option><option value="3.2">3.2</option><option value="3.3">3.3</option><option value="3.4">3.4</option></select><label>TARIFA DE ACCESO</label></div><?php } ?>
			<?php if($c['formula'] == 'dual'){ ?><div class="input-field col s12 m6"><i class="material-icons prefix">shopping_basket</i><select name="tarifa_ref_gas" required><option value="" selected>Escoge una opción</option><option value="3.1">3.1</option><option value="3.2">3.2</option><option value="3.3">3.3</option><option value="3.4">3.4</option></select><label>TARIFA DE ACCESO</label></div><?php } ?>
			<?php if($c['formula'] == 'planahorro'){ ?><div class="input-field col s12 m6"><i class="material-icons prefix">shopping_basket</i><select name="tarifa_ref_gas" required><option value="" selected>Escoge una opción</option><option value="3.1">3.1</option><option value="3.2">3.2</option><option value="3.3">3.3</option><option value="3.4">3.4</option></select><label>TARIFA DE ACCESO</label></div><?php } ?>
			
			<!-- Descuento gas -->
			<?php if($c['formula'] == 'gas'){ ?><div class="input-field col s12 m6"><i class="material-icons prefix">bookmark</i><input id="fgh" name="descuento_gas" type="text" class="validate" required><label for="fgh">DESCUENTO GAS</label></div><?php } ?>
			<?php if($c['formula'] == 'dual'){ ?><div class="input-field col s12 m6"><i class="material-icons prefix">bookmark</i><input id="fgh" name="descuento_gas" type="text" class="validate" required><label for="fgh">DESCUENTO GAS</label></div><?php } ?>
			<?php if($c['formula'] == 'planahorro'){ ?><div class="input-field col s12 m6"><i class="material-icons prefix">bookmark</i><input id="fgh" name="descuento_gas" type="text" class="validate" required><label for="fgh">DESCUENTO GAS</label></div><?php } ?>

			<?php if($c['formula'] == 'marca'){ ?>
				<?php if($c['formula2'] == 'luz'){ ?>
				<!-- LUZ -->
				<div class="input-field col s12 m12"><span class="card-title">Suministro de electricidad</span></div>
				<div class="input-field col s12 m3"><i class="material-icons prefix">shopping_basket</i><select name="tipo_alta_luz"><option value="" selected required>Escoge una opción</option><option value="AD">AD</option><option value="CC">CC</option><option value="CC con CT">CC con CT</option><option value="CC con MT">CC con MT</option><option value="CC con CT y MT">CC con CT y MT</option><option value="CT">CT</option><option value="MT">MT</option><option value="NA">NA</option><option value="CT con MT">CT con MT</option></select><label>TIPO ALTA LUZ</label></div>
				<div class="input-field col s12 m3"><i class="material-icons prefix">bookmark</i><input id="f_luz" name="descuento_luz" type="text" class="validate" required><label for="f_luz">DESCUENTO LUZ (%)</label></div>
				<div class="input-field col s12 m3"><i class="material-icons prefix">bookmark</i><input id="p1" name="potencia_p1" type="text" class="validate" required><label for="p1">POT. CONTRATADA</label></div>
				<div class="input-field col s12 m3"><i class="material-icons prefix">shopping_basket</i><select name="tarifa_ref_luz" required><option value="" selected>Escoge una opción</option><option value="2.0A">2.0A</option><option value="2.0DHA">2.0DHA</option><option value="2.1A">2.1A</option><option value="2.1DHA">2.1DHA</option><option value="3.0A">3.0A</option></select><label>TARIFA DE ACCESO</label></div>
				<?php } ?>
				
				<?php if($c['formula2'] == 'gas'){ ?>
				<!-- GAS -->
				<div class="input-field col s12 m12"><span class="card-title">Suministro de gas natural</span></div>
				<div class="input-field col s12 m4"><i class="material-icons prefix">shopping_basket</i><select name="tipo_alta_gas" required><option value="" selected>Escoge una opción</option><option value="AD">AD</option><option value="CC">CC</option><option value="CC con CT">CC con CT</option><option value="CT">CT</option><option value="NA">NA</option></select><label>TIPO ALTA GAS</label></div>
				<div class="input-field col s12 m4"><i class="material-icons prefix">shopping_basket</i><select name="tarifa_ref_gas" required><option value="" selected>Escoge una opción</option><option value="3.1">3.1</option><option value="3.2">3.2</option><option value="3.3">3.3</option><option value="3.4">3.4</option></select><label>TARIFA DE ACCESO</label></div>
				<div class="input-field col s12 m4"><i class="material-icons prefix">bookmark</i><input id="fgh" name="descuento_gas" type="text" class="validate" required><label for="fgh">DESCUENTO GAS</label></div>
				<?php } ?>
				
				<?php if($c['formula2'] == 'dual'){ ?>
				<!-- DUAL -->
				<div class="input-field col s12 m12"><span class="card-title">Suministro de gas natural y electricidad</span></div>
				  <!-- ||=> GAS -->
				<div class="input-field col s12 m6">
				  <div class="input-field col s12 m12">
				  <i class="material-icons prefix">shopping_basket</i>
				  <select name="tipo_alta_gas" required>
				  <option value="" selected>Escoge una opción</option>
				  <option value="AD">AD</option>
				  <option value="CC">CC</option>
				  <option value="CC con CT">CC con CT</option>
				  <option value="CT">CT</option>
				  <option value="NA">NA</option>
				  </select><label>TIPO ALTA GAS</label>
				  </div>
				  <div class="input-field col s12 m12"><i class="material-icons prefix">shopping_basket</i><select name="tarifa_ref_gas" required><option value="" selected>Escoge una opción</option><option value="3.1">3.1</option><option value="3.2">3.2</option><option value="3.3">3.3</option><option value="3.4">3.4</option></select><label>TARIFA DE ACCESO</label></div>
				  <div class="input-field col s12 m12"><i class="material-icons prefix">bookmark</i><input id="fgh" name="descuento_gas" type="text" class="validate" required><label for="fgh">DESCUENTO GAS</label></div>
				</div>
				  
				  <!-- ||=> LUZ -->
				<div class="input-field col s12 m6">
				<div class="input-field col s12 m12"><i class="material-icons prefix">shopping_basket</i><select name="tipo_alta_luz"><option value="" selected required>Escoge una opción</option><option value="AD">AD</option><option value="CC">CC</option><option value="CC con CT">CC con CT</option><option value="CC con MT">CC con MT</option><option value="CC con CT y MT">CC con CT y MT</option><option value="CT">CT</option><option value="MT">MT</option><option value="NA">NA</option><option value="CT con MT">CT con MT</option></select><label>TIPO ALTA LUZ</label></div>
				<div class="input-field col s12 m12"><i class="material-icons prefix">bookmark</i><input id="f_luz" name="descuento_luz" type="text" class="validate" required><label for="f_luz">DESCUENTO LUZ (%)</label></div>
				<div class="input-field col s12 m12"><i class="material-icons prefix">shopping_basket</i><select name="tarifa_ref_luz" required><option value="" selected>Escoge una opción</option><option value="2.0A">2.0A</option><option value="2.0DHA">2.0DHA</option><option value="2.1A">2.1A</option><option value="2.1DHA">2.1DHA</option><option value="3.0A">3.0A</option></select><label>TARIFA DE ACCESO</label></div>
				<div class="input-field col s12 m12"><i class="material-icons prefix">bookmark</i><input id="p1" name="potencia_p1" type="text" class="validate" required><label for="p1">POTENCIA CONTRATADA (P1)</label></div>
				</div>
				<?php } ?>
			<?php } ?>
				<div class="input-field col s12 m12">
				  <span class="card-title">Servicios</span>
			<?php if($c['formula'] == 'marca'){ ?>
				<?php if($c['formula2'] == 'gas'){ ?>
					<div class="input-field col s12 m4">
					  <i class="material-icons prefix">wb_sunny</i>
					  <select name="marca_caldera">
						<option value="" disabled selected>Escoge una caldera</option>
						<?php $c_sql = mysql_query("SELECT * FROM contratos_calderas ORDER BY id"); while($c = mysql_fetch_assoc($c_sql)){ ?>
						<option value="<?php echo $c['caldera']; ?>"><?php echo $c['caldera']; ?></option>
						<?php } ?>
					  </select>
					</div>
				<?php } ?>
				<?php if($c['formula2'] == 'dual'){ ?>
					<div class="input-field col s12 m4">
					  <i class="material-icons prefix">wb_sunny</i>
					  <select name="marca_caldera">
						<option value="" disabled selected>Escoge una caldera</option>
						<?php $c_sql = mysql_query("SELECT * FROM contratos_calderas ORDER BY id"); while($c = mysql_fetch_assoc($c_sql)){ ?>
						<option value="<?php echo $c['caldera']; ?>"><?php echo $c['caldera']; ?></option>
						<?php } ?>
					  </select>
					</div>
				<?php } ?>
			<?php } ?>
			<?php if($c['formula'] == 'luz'){ ?>
				<div class="input-field col s12 m6">
				<i class="material-icons prefix">shopping_basket</i>
				<select name="plan_destino_luz">
				  <option value="FORMULA LUZ <?php echo strtoupper($c['tipo_contrato']); ?> <?php if($c['funciona'] == 'si'){ echo 'CON FUNCIONA'; } ?>" selected>FORMULA LUZ <?php echo strtoupper($c['tipo_contrato']); ?> <?php if($c['funciona'] == 'si'){ echo 'CON FUNCIONA'; } ?></option>
				</select>
				<label>Producto LUZ</label>
				</div>
			<?php if($c['funciona'] == 'si'){ ?>
				<div class="input-field col s12 m6">
				<i class="material-icons prefix">shopping_basket</i>
				<select name="plan_destino_fun">
				  <option value="FORMULA LUZ <?php echo strtoupper($c['tipo_contrato']); ?> <?php if($c['funciona'] == 'si'){ echo 'CON FUNCIONA'; } ?>" selected>FORMULA LUZ <?php echo strtoupper($c['tipo_contrato']); ?> <?php if($c['funciona'] == 'si'){ echo 'CON FUNCIONA'; } ?></option>
				</select>
				<label>Producto FUNCIONA</label>
				</div>
			<?php } ?>
			<?php } ?>
			<?php if($c['formula'] == 'maxahorro'){ ?>
				<div class="input-field col s12 m6">
				<i class="material-icons prefix">shopping_basket</i>
				<select name="plan_destino_luz">
				  <option value="FORMULA MAXIMO AHORRO 24H<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA MAXIMO AHORRO 24H<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
				</select>
				<label>Producto LUZ</label>
				</div>
			<?php if($c['funciona'] == 'si'){ ?>
				<div class="input-field col s12 m6">
				<i class="material-icons prefix">shopping_basket</i>
				<select name="plan_destino_fun">
				  <option value="FORMULA MAXIMO AHORRO 24H<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA MAXIMO AHORRO 24H<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
				</select>
				<label>Producto FUNCIONA</label>
				</div>
			<?php } ?>
			<?php } ?>
					
			<?php if($c['formula'] == 'marca'){ ?>
				<!-- Marca > Luz -->
				<?php if($c['formula2'] == 'luz'){ ?>
				<div class="input-field col s12 m4"><i class="material-icons prefix">shopping_basket</i><select name="plan_destino_luz">
				  <option value="">Escoge un producto</option>
				  <option value="MARCA LUZ<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>MARCA LUZ<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>					  
				</select><label>Producto LUZ</label></div>
					
				<?php if($c['funciona'] == 'si'){ ?>
				<div class="input-field col s12 m4"><i class="material-icons prefix">shopping_basket</i><select name="plan_destino_fun">
				  <option value="">Escoge un producto</option>
				  <option value="MARCA LUZ<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>MARCA LUZ<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
				</select><label>Producto FUNCIONA</label></div>
				<?php } ?>
				<?php } ?>
					
				<!-- Marca > Gas -->
				<?php if($c['formula2'] == 'gas'){ ?>
				<div class="input-field col s12 m4"><i class="material-icons prefix">shopping_basket</i><select name="plan_destino_gas">
				  <option value="">Escoge un producto</option>
				  <option value="MARCA GAS<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>MARCA GAS<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
				</select><label>Producto GAS</label></div>
				
				<?php if($c['funciona'] == 'si'){ ?>
				<div class="input-field col s12 m4"><i class="material-icons prefix">shopping_basket</i><select name="plan_destino_fun">
				  <option value="">Escoge un producto</option>
				  <option value="MARCA GAS<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>MARCA GAS<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
				</select><label>Producto FUNCIONA</label></div>
				<?php } ?>
				<?php } ?>
					
				<!-- Marca > Dual -->
				<?php if($c['formula2'] == 'dual'){ ?>
				<div class="input-field col s12 m4"><i class="material-icons prefix">shopping_basket</i><select name="plan_destino_luz">
				  <option value="">Escoge un producto</option>
				  <option value="MARCA DUAL<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>MARCA DUAL<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
				</select><label>Producto LUZ</label></div>
				
				<div class="input-field col s12 m4"><i class="material-icons prefix">shopping_basket</i><select name="plan_destino_gas">
				  <option value="">Escoge un producto</option>
				  <option value="MARCA DUAL<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>MARCA DUAL<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
				</select><label>Producto GAS</label></div>
				
				<?php if($c['funciona'] == 'si'){ ?>
				<div class="input-field col s12 m4"><i class="material-icons prefix">shopping_basket</i><select name="plan_destino_fun">
				  <option value="">Escoge un producto</option>
				  <option value="MARCA DUAL<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>MARCA DUAL<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
				</select><label>Producto FUNCIONA</label></div>
				<?php } ?>
				<?php } ?>
			<?php } ?>
			<?php if($c['formula'] == 'planahorro'){ ?>
				<div class="input-field col s12 m4"><i class="material-icons prefix">shopping_basket</i><select name="plan_destino_luz">
				  <option value="">Escoge un producto</option>
				  <option value="FORMULA AHORRO DUAL<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA AHORRO DUAL<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
				</select><label>Producto LUZ</label></div>
				
				<div class="input-field col s12 m4"><i class="material-icons prefix">shopping_basket</i><select name="plan_destino_gas">
				  <option value="">Escoge un producto</option>
				  <option value="FORMULA AHORRO DUAL<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA AHORRO DUAL<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
				</select><label>Producto GAS</label></div>
				
				<?php if($c['funciona'] == 'si'){ ?>
				<div class="input-field col s12 m4"><i class="material-icons prefix">shopping_basket</i><select name="plan_destino_fun">
				  <option value="">Escoge un producto</option>
				  <option value="FORMULA AHORRO DUAL<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA AHORRO DUAL<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
				</select><label>Producto FUNCIONA</label></div>
				<?php } ?>
				
				<div class="input-field col s12 m6">
				  <i class="material-icons prefix">wb_sunny</i>
				  <select name="marca_caldera">
					<option value="" disabled selected>Escoge una caldera</option>
					<?php $c_sql = mysql_query("SELECT * FROM contratos_calderas ORDER BY id"); while($c = mysql_fetch_assoc($c_sql)){ ?>
					<option value="<?php echo $c['caldera']; ?>"><?php echo $c['caldera']; ?></option>
					<?php } ?>
				  </select>
				</div>
			<?php } ?>
			
			<?php if($c['formula'] == 'dual'){ ?>
				<div class="input-field col s12 m4"><i class="material-icons prefix">shopping_basket</i><select name="plan_destino_luz">
				<option value="FORMULA GAS+LUZ<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA GAS+LUZ<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
				</select><label>Producto LUZ</label></div>
				
				<div class="input-field col s12 m4"><i class="material-icons prefix">shopping_basket</i><select name="plan_destino_gas">
				<option value="FORMULA GAS+LUZ<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA GAS+LUZ<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
				</select><label>Producto GAS</label></div>
			
			
			<?php if($c['funciona'] == 'si'){ ?>
				<div class="input-field col s12 m4"><i class="material-icons prefix">shopping_basket</i><select name="plan_destino_fun">
				<option value="FORMULA GAS+LUZ<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA GAS+LUZ<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
				</select><label>Producto FUNCIONA</label></div>
				
				<div class="input-field col s12 m6">
				<i class="material-icons prefix">gesture</i>
				<select name="tipo_de_funciona">
				<option value="FUNCIONA PLUS" selected>FUNCIONA PLUS</option>
				</select>
				<label>Tipo de funciona</label>
				</div>
			<?php } ?>
			
				<div class="input-field col s12 m6">
				<i class="material-icons prefix">wb_sunny</i>
				<select name="marca_caldera">
					<option value="" disabled selected>Escoge una caldera</option>
					<?php $c_sql = mysql_query("SELECT * FROM contratos_calderas ORDER BY id"); while($c = mysql_fetch_assoc($c_sql)){ ?>
					<option value="<?php echo $c['caldera']; ?>"><?php echo $c['caldera']; ?></option>
					<?php } ?>
				</select>
				</div>
			<?php } ?>
			
			<?php if($c['formula'] == 'gas'){ ?>
				<div class="input-field col s12 m6"><i class="material-icons prefix">shopping_basket</i><select name="plan_destino_gas">
				<option value="FORMULA GAS <?php echo strtoupper($c['tipo_contrato']); ?><?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA GAS <?php echo strtoupper($c['tipo_contrato']); ?> <?php if($c['funciona'] == 'si'){ echo 'CON FUNCIONA'; } ?></option>
				</select><label>Producto GAS</label></div>
			
			<?php if($c['funciona'] == 'si'){ ?>
				<div class="input-field col s12 m6"><i class="material-icons prefix">shopping_basket</i><select name="plan_destino_fun">
				<option value="FORMULA GAS <?php echo strtoupper($c['tipo_contrato']); ?><?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA GAS <?php echo strtoupper($c['tipo_contrato']); ?> <?php if($c['funciona'] == 'si'){ echo 'CON FUNCIONA'; } ?></option>
				</select><label>Producto FUNCIONA</label></div>
			<?php } ?>
			<?php } ?>
			
					<!-- Opción clima -->
				<div class="input-field col s12 m6">
				<i class="material-icons prefix">wb_sunny</i>
				<select name="contrata_opcion_clima">
				  <option value="" selected>Escoge una opción</option>
				  <option value="SI">Sí</option>
				  <option value="NO">No</option>
				</select>
				<label>Opción Clima</label>
				</div>
				<div class="input-field col s12 m6">
				  <i class="material-icons prefix">wb_sunny</i>
				  <input id="clima" name="marca_aparato_climatizacion" type="text" class="validate" style="text-transform: uppercase;">
				  <label for="clima">Marca Equipo Climatización</label>
				</div>
				<?php if($c['formula'] == 'gas'){ ?>
					<div class="input-field col s12 m12">
					  <i class="material-icons prefix">wb_sunny</i>
					  <select name="marca_caldera">
						<option value="" disabled selected>Escoge una caldera</option>
						<?php $c_sql = mysql_query("SELECT * FROM contratos_calderas ORDER BY id"); while($c = mysql_fetch_assoc($c_sql)){ ?>
						<option value="<?php echo $c['caldera']; ?>"><?php echo $c['caldera']; ?></option>
						<?php } ?>
					  </select>
					</div>
				<?php } ?>
					<div class="col s12 m4">
					  <a onclick="window.history.back()" class="btn waves-effect waves-light #b71c1c red darken-4" style="background: <?php echo $config['colorsv']; ?>;width: 100%;">Cancelar
						<i class="material-icons right">left-arrow</i>
					  </a>
					</div>
					<div class="col s12 m8">
					  <button class="btn waves-effect waves-light" type="submit" name="recuperar_void" style="background: <?php echo $config['colorsv']; ?>;width: 100%;">Recuperar contrato
						<i class="material-icons right">send</i>
					  </button>
					</div>
				</div>
		  </div>
		  </div>
        </div>
      </div>
    </div>
  </div>
	</form>
	<?php } ?>
</div>
<?php } else { ?>
<?php
if (isset($_POST['edit_void'])) {
	
	$fecha_ventaorg = $_POST['fecha_venta'];
	$fecha_venta = date("Y-m-d", strtotime($fecha_ventaorg));
	$nombre_titular = strtoupper($_POST['nombre_titular']);
	$apellidos_titular = strtoupper($_POST['apellidos_titular']);
	$dni_cif_titular = strtoupper($_POST['dni_cif_titular']);
	$telefono_pref_1 = $_POST['telefono_pref_1'];
	$cod_verificacion = str_replace("V", "", $_POST['cod_verificacion']);
	$codigo_comercial = $_POST['codigo_comercial'];
	$cgx_sql = mysql_query("SELECT * FROM click_comerciales WHERE codigo_interno='$codigo_comercial'");$cgx = mysql_fetch_assoc($cgx_sql);
	$cig = $_POST['cig'];
	$fecha_we = $_POST["fecha_we"];
	$we_dia = substr($fecha_we, 0, 2);
	$we_mes = substr($fecha_we, 3, 2);
	$we_ano = substr($fecha_we, 6, 4);
	$subgerente2 = strtoupper($_POST['subgerente2']);
	$cups_luz = strtoupper($_POST['cups_luz']);
	$cups_gas = strtoupper($_POST['cups_gas']);
	$plan_destino_luz = strtoupper($_POST['plan_destino_luz']);
	$plan_destino_gas = strtoupper($_POST['plan_destino_gas']);
	$plan_destino_fun = strtoupper($_POST['plan_destino_fun']);
	$motivo = strtoupper($_POST['motivo']);
	
	mysql_query("UPDATE contratos_voids SET fecha_venta='$fecha_venta', nombre_titular='$nombre_titular', apellidos_titular='$apellidos_titular',
	dni_cif_titular='$dni_cif_titular', telefono_pref_1='$telefono_pref_1', cod_verificacion='$cod_verificacion', cig='$cig', we_dia='$we_dia', we_mes='$we_mes',
	we_ano='$we_ano', subgerente2='$subgerente2', cups_luz='$cups_luz', cups_gas='$cups_gas', plan_destino_luz='$plan_destino_luz', plan_destino_gas='$plan_destino_gas',
	plan_destino_fun='$plan_destino_fun', motivo='$motivo', gerente='$cgx[gerente]', subgerente='$cgx[subgerente]', oficina='$cgx[oficina]' WHERE id='$c[id]'");
	echo "
	<script>
    sweetAlert({
	  type: 'success',
	  confirmButtonText: 'Continuar',
    },function(isConfirm){
      alert('ok');
    });
    $('.swal2-confirm').click(function(){
	  window.location.href = 'index.php?page=all_voids';
    });
	</script>
	";
}
if (isset($_POST['eliminar_contrato'])) {
	mysql_query("DELETE FROM contratos_voids WHERE id='". Filter($_GET[id]) ."'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=all_voids";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['tipo_contrato_negocios'])) {
	$tipo_contrato_negocios = $_POST['tipo_contrato_negocios'];
	mysql_query("UPDATE contratos_voids SET tipo_contrato='$tipo_contrato_negocios' WHERE id='". Filter($_GET[id]) ."'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_void_id&id='. Filter($_GET[id]) .'";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['tipo_contrato_hogares'])) {
	$tipo_contrato_hogares = $_POST['tipo_contrato_hogares'];
	mysql_query("UPDATE contratos_voids SET tipo_contrato='$tipo_contrato_hogares', formula2='' WHERE id='". Filter($_GET[id]) ."'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_void_id&id='. Filter($_GET[id]) .'";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['formula_luz'])) {
	$formula_luz = $_POST['formula_luz'];
	mysql_query("UPDATE contratos_voids SET formula='$formula_luz', formula2='' WHERE id='". Filter($_GET[id]) ."'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_void_id&id='. Filter($_GET[id]) .'";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['formula_marca'])) {
	$formula_marca = $_POST['formula_marca'];
	mysql_query("UPDATE contratos_voids SET formula='$formula_marca' WHERE id='". Filter($_GET[id]) ."'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_void_id&id='. Filter($_GET[id]) .'";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['formula_gas'])) {
	$formula_gas = $_POST['formula_gas'];
	mysql_query("UPDATE contratos_voids SET formula='$formula_gas', formula2='' WHERE id='". Filter($_GET[id]) ."'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_void_id&id='. Filter($_GET[id]) .'";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['formula_dual'])) {
	$formula_dual = $_POST['formula_dual'];
	mysql_query("UPDATE contratos_voids SET formula='$formula_dual', formula2='' WHERE id='". Filter($_GET[id]) ."'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_void_id&id='. Filter($_GET[id]) .'";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['formula_maxahorro'])) {
	$formula_maxahorro = $_POST['formula_maxahorro'];
	mysql_query("UPDATE contratos_voids SET formula='$formula_maxahorro', formula2='' WHERE id='". Filter($_GET[id]) ."'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_void_id&id='. Filter($_GET[id]) .'";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['formula_planahorro'])) {
	$formula_planahorro = $_POST['formula_planahorro'];
	mysql_query("UPDATE contratos_voids SET formula='$formula_planahorro', formula2='' WHERE id='". Filter($_GET[id]) ."'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_void_id&id='. Filter($_GET[id]) .'";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['formula2_luz'])) {
	$formula2_luz = $_POST['formula2_luz'];
	mysql_query("UPDATE contratos_voids SET formula2='$formula2_luz' WHERE id='". Filter($_GET[id]) ."'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_void_id&id='. Filter($_GET[id]) .'";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['formula2_gas'])) {
	$formula2_gas = $_POST['formula2_gas'];
	mysql_query("UPDATE contratos_voids SET formula2='$formula2_gas' WHERE id='". Filter($_GET[id]) ."'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_void_id&id='. Filter($_GET[id]) .'";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['formula2_dual'])) {
	$formula2_dual = $_POST['formula2_dual'];
	mysql_query("UPDATE contratos_voids SET formula2='$formula2_dual' WHERE id='". Filter($_GET[id]) ."'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_void_id&id='. Filter($_GET[id]) .'";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['funciona_si'])) {
	$funciona_si = $_POST['funciona_si'];
	mysql_query("UPDATE contratos_voids SET funciona='$funciona_si' WHERE id='". Filter($_GET[id]) ."'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_void_id&id='. Filter($_GET[id]) .'";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['funciona_no'])) {
	$funciona_no = $_POST['funciona_no'];
	mysql_query("UPDATE contratos_voids SET funciona='$funciona_no' WHERE id='". Filter($_GET[id]) ."'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_void_id&id='. Filter($_GET[id]) .'";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
$gc = mysql_query("SELECT * FROM click_comerciales WHERE codigo_interno='$c[codigo_comercial]'");$getComercial = mysql_fetch_assoc($gc);
$fecha_baja = new DateTime("". str_replace("/", "-", $getComercial[fecha_baja]) ."");
$fecha_alta = new DateTime("". str_replace("/", "-", $getComercial[fecha_alta]) ."");
$fecha_hoy = new DateTime("". date('d') . "-" . date('m') . "-" . date('Y') ."");
?>
<div id="resultadoBusqueda" style="text-align: left;position: fixed;background: #fff;z-index: 1200;top: 0%;right: 0%;padding: 5px 10px;"></div>
<div style="text-align: left;position: fixed;background: #fff;z-index: 200;top: 0%;right: 0%;padding: 5px 10px;">
	<font color="<?php if($fecha_hoy > $fecha_baja) { ?>red<?php } else { ?>green<?php } ?>">
	<span style="font-size: 14px;"><b>Gerente:</b> <?php echo $getComercial['gerente']; ?><br>
	<b>Subgerente:</b> <?php echo $getComercial['subgerente']; ?><br>
	<b>Oficina:</b> <?php echo $getComercial['oficina']; ?></span><br>
	<b>Comercial:</b><br>
	<span style="font-size: 12px;"><?php echo $getComercial['nombre']; ?> <?php echo $getComercial['primer_apellido']; ?> <?php echo $getComercial['segundo_apellido']; ?></span>
	</font>
	<?php if($fecha_hoy > $fecha_baja) { ?><div style="font-weight: bold;font-size: 12px;">BAJA: <?php echo $getComercial['fecha_baja']; ?></div><?php } ?>
</div>
<div style="    text-align: left;
    position: absolute;
    background: #fff;
    z-index: 200;
    top: 9.8%;
    left: 0%;">
	<form method="POST">
	  <div class="col s12 m6">
		<button type="submit" name="tipo_contrato_negocios" value="NEGOCIOS" class="waves-effect waves-light btn" style="border-radius: 0px;width: 100%;<?php if($c['tipo_contrato'] == 'NEGOCIOS'){ echo 'background: '.$config[colorsv].';'; }else{ echo'background: #444;'; } ?>"><i class="material-icons right">store</i>Negocios</button>
	  </div>
	</form>
	<form method="POST">
	  <div class="col s12 m6">
		<button type="submit" name="tipo_contrato_hogares" value="HOGARES" class="waves-effect waves-light btn" style="border-radius: 0px;width: 100%;<?php if($c['tipo_contrato'] == 'HOGARES'){ echo 'background: '.$config[colorsv].';'; }else{ echo'background: #444;'; } ?>"><i class="material-icons right">home</i>Hogares</button>
	  </div>
	</form>
	<?php if($c['tipo_contrato']){ ?>
	<br>
	<form method="POST">
	  <div class="col s12 m1">
		<button type="submit" name="formula_luz" value="luz" class="waves-effect waves-light btn" style="border-radius: 0px;width: 100%;padding: 0;<?php if($c['formula'] == 'luz'){ echo 'background: '.$config[colorsv].';'; }else{ echo'background: #444;'; } ?>">Luz</button>
	  </div>
	</form>
	<form method="POST">
	  <div class="col s12 m2">
		<button type="submit" name="formula_marca" value="marca" class="waves-effect waves-light btn" style="border-radius: 0px;width: 100%;<?php if($c['formula'] == 'marca'){ echo 'background: '.$config[colorsv].';'; }else{ echo'background: #444;'; } ?>">Carrefour</button>
	  </div>
	</form>
	<?php if($c['formula'] == 'marca') { ?>
	<form method="POST">
	  <div class="col s12 m4" style="border-left: 4px solid <?php echo $config['colorsv']; ?>;">
		<button type="submit" name="formula2_luz" value="luz" class="waves-effect waves-light btn" style="border-radius: 0px;width: 100%;<?php if($c['formula2'] == 'luz'){ echo 'background: '.$config[colorsv].';'; }else{ echo'background: #444;'; } ?>">Luz</button>
	  </div>
	</form>
	<form method="POST">
	  <div class="col s12 m4" style="border-left: 4px solid <?php echo $config['colorsv']; ?>;">
		<button type="submit" name="formula2_gas" value="gas" class="waves-effect waves-light btn" style="border-radius: 0px;width: 100%;<?php if($c['formula2'] == 'gas'){ echo 'background: '.$config[colorsv].';'; }else{ echo'background: #444;'; } ?>">Gas</button>
	  </div>
	</form>
	<form method="POST">
	  <div class="col s12 m4" style="border-left: 4px solid <?php echo $config['colorsv']; ?>;">
		<button type="submit" name="formula2_dual" value="dual" class="waves-effect waves-light btn" style="border-radius: 0px;width: 100%;<?php if($c['formula2'] == 'dual'){ echo 'background: '.$config[colorsv].';'; }else{ echo'background: #444;'; } ?>">Dual</button>
	  </div>
	</form>
	<?php } ?>
	<form method="POST">
	  <div class="col s12 m1">
		<button type="submit" name="formula_gas" value="gas" class="waves-effect waves-light btn" style="border-radius: 0px;width: 100%;padding: 0;<?php if($c['formula'] == 'gas'){ echo 'background: '.$config[colorsv].';'; }else{ echo'background: #444;'; } ?>">Gas</button>
	  </div>
	</form>
	<form method="POST">
	  <div class="col s12 m2">
		<button type="submit" name="formula_dual" value="dual" class="waves-effect waves-light btn" style="border-radius: 0px;width: 100%;<?php if($c['formula'] == 'dual'){ echo 'background: '.$config[colorsv].';'; }else{ echo'background: #444;'; } ?>">Dual</a>
	  </div>
	</form>
	<form method="POST">
	  <div class="col s12 m3">
		<button type="submit" name="formula_maxahorro" value="maxahorro" class="waves-effect waves-light btn" style="border-radius: 0px;width: 100%;<?php if($c['formula'] == 'maxahorro'){ echo 'background: '.$config[colorsv].';'; }else{ echo'background: #444;'; } ?>">MÁXIMO AHORRO</button>
	  </div>
	</form>
	<form method="POST">
	  <div class="col s12 m3">
		<button type="submit" name="formula_planahorro" value="planahorro" class="waves-effect waves-light btn" style="border-radius: 0px;width: 100%;<?php if($c['formula'] == 'planahorro'){ echo 'background: '.$config[colorsv].';'; }else{ echo'background: #444;'; } ?>">PLAN AHORRO</button>
	  </div>
	</form>
	<?php } ?>
	<?php if($c['formula']){ ?>
	<br>
	<form method="POST">
	  <div class="col s12 m6">
		<button type="submit" name="funciona_si" value="si" class="waves-effect waves-light btn" style="border-radius: 0px;width: 100%;<?php if($c['funciona'] == 'si'){ echo 'background: '.$config[colorsv].';'; }else{ echo'background: #444;'; } ?>">Con funciona</button>
	  </div>
	</form>
	<form method="POST">
	  <div class="col s12 m6">
		<button type="submit" name="funciona_no" value="no" class="waves-effect waves-light btn" style="border-radius: 0px;width: 100%;<?php if($c['funciona'] == 'no'){ echo 'background: '.$config[colorsv].';'; }else{ echo'background: #444;'; } ?>">Sin funciona</button>
	  </div>
	</form>
	<?php } ?>
</div>
	<div class="col s12 m6">
		<a href="<?php echo $config['site']; ?>/index.php?page=edit_void_id&id=<?php echo $c['id']; ?>&action=recuperar" class="waves-effect waves-light btn" style="background: <?php echo $config['colorsv']; ?>;width: 100%;">Recuperar contrato</a>
	</div>
	<div class="col s12 m6">
		<form method="POST">
		  <?php
			if (isset($_POST['eliminar_void'])) {
				mysql_query("DELETE FROM contratos_voids WHERE id='$c[id]'");
				echo '
				<script>
				function redireccionarUsuario() {
				  window.location = "'. $site .'/index.php?page=all_voids";
				}
				setTimeout("redireccionarUsuario()", 50);
				</script>
				';
			}
		  ?>
		  <button type="submit" name="eliminar_void" class="waves-effect waves-light btn" style="background: red;width: 100%;">Eliminar contrato</button>
		</form>
	</div>
<?php if($c['funciona']){ ?>
<div class="row">
  <div class="col s12 m12">
    <div class="card">
      <div class="card-content black-text">
        <span class="card-title center">VOID &#187; <?php echo $c['nombre_titular']; ?> <?php echo $c['apellidos_titular']; ?></span>
        <div class="row">
		<form method="POST" class="col s12 m12">
		  <div class="row">
			<div class="input-field col s3">
			  <input name="fecha_venta" value="<?php echo $c['fecha_venta']; ?>" id="fecha_venta" id="fecha" type="date" class="validate" required>
			  <label for="fecha_venta">FECHA VENTA</label>
			</div>
			<div class="input-field col s3">
			  <input name="nombre_titular" value="<?php echo $c['nombre_titular']; ?>" placeholder="Nombre del titular" id="nombre_titular" type="text" class="validate" required>
			  <label for="nombre_titular">NOMBRE TITULAR</label>
			</div>
			<div class="input-field col s3">
			  <input name="apellidos_titular" value="<?php echo $c['apellidos_titular']; ?>" placeholder="Nombre del titular" id="apellidos_titular" type="text" class="validate" required>
			  <label for="apellidos_titular">APELLIDOS TITULAR</label>
			</div>
			<div class="input-field col s3">
			  <input name="dni_cif_titular" value="<?php echo $c['dni_cif_titular']; ?>" maxlength="9" data-length="9" placeholder="Nombre del titular" id="dni" onblur="nif(this.value)" type="text" class="validate" required>
			  <label for="dni">DNI / NIE / CIF</label>
			</div>
			<div class="input-field col s12 m3">
			  <i class="material-icons prefix">phone_iphone</i>
			  <input id="telf1" value="<?php echo $c['telefono_pref_1']; ?>" name="telefono_pref_1" type="tel" class="validate" pattern="[0-9]{9}" >
			  <label for="telf1">Teléfono</label>
			</div>
			<div class="input-field col s12 m3">
			  <i class="material-icons prefix">voicemail</i>
			  <input id="cod_verificacion" value="<?php echo $c['cod_verificacion']; ?>" name="cod_verificacion" pattern="[0-9]{14}" type="tel" class="validate"  maxlength="14" data-length="14">
			  <label for="cod_verificacion">Código de Verificación</label>
			</div>
			<div class="input-field col s12 m3">
			  <i class="material-icons prefix">face</i>
			  <input autocomplete="off" value="<?php echo $c['codigo_comercial']; ?>" onKeyUp="buscar();" id="busqueda" id="codigo_comercial" name="codigo_comercial" pattern="[0123456789]{5}" type="text" class="validate" maxlength="5" data-length="5"  required>
			  <label for="codigo_comercial">Código de comercial</label>
			</div>
			<div class="input-field col s12 m3">
					  <i class="material-icons prefix">date_range</i>
					  <input id="fechawe" value="<?php echo $c['we_dia']; ?>/<?php echo $c['we_mes']; ?>/<?php echo $c['we_ano']; ?>" autocomplete="off" name="fecha_we" type="text" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" class="datepicker validate">
					  <label for="fechawe">FECHA WE</label>
					</div>
			<div class="input-field col s12 m12"></div>
			<div class="input-field col s12 m3">
			  <input type="text" value="<?php echo $c['gerente']; ?>" disabled>
			  <label>Gerente</label>
			</div>
			<div class="input-field col s12 m3">
			  <input type="text" value="<?php echo $c['subgerente']; ?>" disabled>
			  <label>SubGerente</label>
			</div>
			<div class="input-field col s12 m3">
			  <input type="text" value="<?php echo $c['oficina']; ?>" disabled>
			  <label>Oficina</label>
			</div>
			<div class="input-field col s12 m3">
			    <select class="browser-default" name="subgerente2" required>
			      <option value="<?php echo $c['subgerente2']; ?>" selected><?php echo $c['subgerente2']; ?></option>
			      <?php $gg_sql = mysql_query("SELECT * FROM click_gerentes_introductores ORDER BY subgerente"); while($g = mysql_fetch_assoc($gg_sql)){ ?>
			      <option value="<?php echo $g['subgerente']; ?>"><?php echo $g['subgerente']; ?></option>
			      <?php } ?>
			    </select>
			  <label style="margin-top: -35px;">Subgerencía provisional</label>
			</div>
			<div class="input-field col s12 m12"></div>
			<div class="input-field col s12 m6">
			  <i class="material-icons prefix">flash_on</i>
			  <input id="suministro_cups" value="<?php echo $c['cups_luz']; ?>" name="cups_luz" type="text" class="validate" >
			  <label for="cups_luz">CUPS Electricidad</label>
			</div>
			<div class="input-field col s12 m6">
			  <i class="material-icons prefix">local_gas_station</i>
			  <input id="suministro_cups" value="<?php echo $c['cups_gas']; ?>" name="cups_gas" type="text" class="validate" >
			  <label for="cups_gas">CUPS Gas</label>
			</div>
			<?php if($c['formula'] == 'luz'){ ?>
			<div class="input-field col s12 m6">
			  <select class="browser-default" name="plan_destino_luz">
			    <option value="FORMULA LUZ <?php echo strtoupper($c['tipo_contrato']); ?> <?php if($c['funciona'] == 'si'){ echo 'CON FUNCIONA'; } ?>" selected>FORMULA LUZ <?php echo strtoupper($c['tipo_contrato']); ?> <?php if($c['funciona'] == 'si'){ echo 'CON FUNCIONA'; } ?></option>
			  </select>
			  <label style="margin-top: -35px;">Producto LUZ</label>
			</div>
			<?php if($c['funciona'] == 'si'){ ?>
			<div class="input-field col s12 m6">
			  <select class="browser-default" name="plan_destino_fun">
			    <option value="FORMULA LUZ <?php echo strtoupper($c['tipo_contrato']); ?> <?php if($c['funciona'] == 'si'){ echo 'CON FUNCIONA'; } ?>" selected>FORMULA LUZ <?php echo strtoupper($c['tipo_contrato']); ?> <?php if($c['funciona'] == 'si'){ echo 'CON FUNCIONA'; } ?></option>
			  </select>
			  <label style="margin-top: -35px;">Producto FUNCIONA</label>
			</div>
			<?php } ?>
			<?php } ?>

			<?php if($c['formula'] == 'marca'){ ?>
			<!-- Marca > Luz -->
			<?php if($c['formula2'] == 'luz'){ ?>
			<div class="input-field col s12 m6">
			<select class="browser-default" name="plan_destino_luz">
			  <option value="">Escoge un producto</option>
			  <option value="MARCA LUZ<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>MARCA LUZ<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>					  
			</select>
			<label style="margin-top: -35px;">Producto LUZ</label>
			</div>
			
			<?php if($c['funciona'] == 'si'){ ?>
			<div class="input-field col s12 m6">
			<select class="browser-default" name="plan_destino_fun">
			  <option value="">Escoge un producto</option>
			  <option value="MARCA LUZ<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>MARCA LUZ<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
			</select>
			<label style="margin-top: -35px;">Producto FUNCIONA</label>
			</div>
			<?php } ?>
			<?php } ?>
			
			<!-- Marca > Gas -->
			<?php if($c['formula2'] == 'gas'){ ?>
			<div class="input-field col s12 m6">
			<select class="browser-default" name="plan_destino_gas">
			  <option value="">Escoge un producto</option>
			  <option value="MARCA GAS<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>MARCA GAS<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
			</select>
			<label style="margin-top: -35px;">Producto GAS</label>
			</div>
			
			<?php if($c['funciona'] == 'si'){ ?>
			<div class="input-field col s12 m6">
			<select class="browser-default" name="plan_destino_fun">
			  <option value="">Escoge un producto</option>
			  <option value="MARCA GAS<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>MARCA GAS<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
			</select>
			<label style="margin-top: -35px;">Producto FUNCIONA</label>
			</div>
			<?php } ?>
			<?php } ?>
			
			<!-- Marca > Dual -->
			<?php if($c['formula2'] == 'dual'){ ?>
			<div class="input-field col s12 m4">
			<select class="browser-default" name="plan_destino_luz">
			  <option value="">Escoge un producto</option>
			  <option value="MARCA DUAL<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>MARCA DUAL<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
			</select>
			<label style="margin-top: -35px;">Producto LUZ</label>
			</div>
			
			<div class="input-field col s12 m4">
			<select class="browser-default" name="plan_destino_gas">
			  <option value="">Escoge un producto</option>
			  <option value="MARCA DUAL<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>MARCA DUAL<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
			</select>
			<label style="margin-top: -35px;">Producto GAS</label>
			</div>
			
			<?php if($c['funciona'] == 'si'){ ?>
			<div class="input-field col s12 m4">
			<select class="browser-default" name="plan_destino_fun">
			  <option value="">Escoge un producto</option>
			  <option value="MARCA DUAL<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>MARCA DUAL<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
			</select>
			<label style="margin-top: -35px;">Producto FUNCIONA</label>
			</div>
			<?php } ?>
			<?php } ?>
			<?php } ?>
			
			<?php if($c['formula'] == 'gas'){ ?>
			<div class="input-field col s12 m6">
			<select class="browser-default" name="plan_destino_gas">
			  <option value="FORMULA GAS <?php echo strtoupper($c['tipo_contrato']); ?><?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA GAS <?php echo strtoupper($c['tipo_contrato']); ?> <?php if($c['funciona'] == 'si'){ echo 'CON FUNCIONA'; } ?></option>
			</select>
			<label style="margin-top: -35px;">Producto GAS</label>
			</div>
			
			<?php if($c['funciona'] == 'si'){ ?>
			<div class="input-field col s12 m6">
			<select class="browser-default" name="plan_destino_fun">
			  <option value="FORMULA GAS <?php echo strtoupper($c['tipo_contrato']); ?><?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA GAS <?php echo strtoupper($c['tipo_contrato']); ?> <?php if($c['funciona'] == 'si'){ echo 'CON FUNCIONA'; } ?></option>
			</select>
			<label style="margin-top: -35px;">Producto FUNCIONA</label>
			</div>
			<?php } ?>
			<?php } ?>
			
			<?php if($c['formula'] == 'dual'){ ?>
			<div class="input-field col s12 m4">
			<select class="browser-default" name="plan_destino_luz">
			  <option value="FORMULA GAS+LUZ<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA GAS+LUZ<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
			</select>
			<label style="margin-top: -35px;">Producto LUZ</label>
			</div>
			
			<div class="input-field col s12 m4">
			<select class="browser-default" name="plan_destino_gas">
			  <option value="FORMULA GAS+LUZ<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA GAS+LUZ<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
			</select>
			<label style="margin-top: -35px;">Producto GAS</label>
			</div>
			
			
			<?php if($c['funciona'] == 'si'){ ?>
			<div class="input-field col s12 m4">
			<select class="browser-default" name="plan_destino_fun">
			  <option value="FORMULA GAS+LUZ<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA GAS+LUZ<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
			</select>
			<label style="margin-top: -35px;">Producto FUNCIONA</label>
			</div>
			<?php } ?>
			<?php } ?>
			
			<?php if($c['formula'] == 'maxahorro'){ ?>
			<div class="input-field col s12 m6">
			<select class="browser-default" name="plan_destino_luz">
			  <option value="FORMULA MAXIMO AHORRO 24H<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA MAXIMO AHORRO 24H<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
			</select>
			<label style="margin-top: -35px;">Producto LUZ</label>
			</div>
			<?php if($c['funciona'] == 'si'){ ?>
			<div class="input-field col s12 m6">
			<select class="browser-default" name="plan_destino_fun">
			  <option value="FORMULA MAXIMO AHORRO 24H<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA MAXIMO AHORRO 24H<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
			</select>
			<label style="margin-top: -35px;">Producto FUNCIONA</label>
			</div>
			<?php } ?>
			<?php } ?>
			
			<?php if($c['formula'] == 'planahorro'){ ?>
			<div class="input-field col s12 m4">
			<select class="browser-default" name="plan_destino_luz">
			  <option value="">Escoge un producto</option>
			  <option value="FORMULA AHORRO DUAL<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA AHORRO DUAL<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
			</select>
			<label style="margin-top: -35px;">Producto LUZ</label>
			</div>
			
			<div class="input-field col s12 m4">
			<select class="browser-default" name="plan_destino_gas">
			  <option value="">Escoge un producto</option>
			  <option value="FORMULA AHORRO DUAL<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA AHORRO DUAL<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
			</select>
			<label style="margin-top: -35px;">Producto GAS</label>
			</div>
			
			<?php if($c['funciona'] == 'si'){ ?>
			<div class="input-field col s12 m4">
			<select class="browser-default" name="plan_destino_fun">
			  <option value="">Escoge un producto</option>
			  <option value="FORMULA AHORRO DUAL<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA AHORRO DUAL<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
			</select>
			<label style="margin-top: -35px;">Producto FUNCIONA</label>
			</div>
			<?php } ?>
			<?php } ?>
			
			<div class="col s12 m12">
			<span class="card-title center">MOTIVO DEL VOID</span>
			  <div class="card" style="box-shadow: none;">
			    <div class="card-content black-text" style="background: #f3f3f3;">
			      <textarea id="textarea1" name="motivo" class="materialize-textarea validate" required><?php echo $c['motivo']; ?></textarea>
			    </div>
			  </div>
			</div>
			
			<div class="col s12 m12">
			  <button class="btn waves-effect waves-light" type="submit" name="edit_void" style="background: <?php echo $config['colorsv']; ?>;width: 100%;">GUARDAR CAMBIOS
			  	<i class="material-icons right">send</i>
			  </button>
			</div>
		  </div>
		</form>
		</div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<?php } ?>
<?php if($c['funciona'] == 'si') { ?>
					<?php if($c['formula'] == 'luz') { ?>
					<?php mysql_query("UPDATE contratos_voids SET vers_funciona='SOLO LUZ', modal_funciona='". strtoupper($c[tipo_contrato]) ."' WHERE id='". $c[id] ."'"); ?>
					 <input type="text" name="vers_funciona" value="SOLO LUZ">
					 <input type="text" name="modal_funciona" value="<?php echo strtoupper($c['tipo_contrato']); ?>">
					<?php } ?>
					<?php if($c['formula'] == 'maxahorro') { ?>
					<?php mysql_query("UPDATE contratos_voids SET vers_funciona='SOLO LUZ', modal_funciona='". strtoupper($c[tipo_contrato]) ."' WHERE id='". $c[id] ."'"); ?>
					 <input type="text" name="vers_funciona" value="SOLO LUZ">
					 <input type="text" name="modal_funciona" value="<?php echo strtoupper($c['tipo_contrato']); ?>">
					<?php } ?>
					<?php if($c['formula'] == 'gas') { ?>
					<?php mysql_query("UPDATE contratos_voids SET vers_funciona='DUAL', modal_funciona='PLUS' WHERE id='". $c[id] ."'"); ?>
					 <input type="text" name="vers_funciona" value="DUAL">
					 <input type="text" name="modal_funciona" value="PLUS">
					<?php } ?>
					<?php if($c['formula'] == 'dual') { ?>
					<?php mysql_query("UPDATE contratos_voids SET vers_funciona='DUAL', modal_funciona='PLUS' WHERE id='". $c[id] ."'"); ?>
					 <input type="text" name="vers_funciona" value="DUAL">
					 <input type="text" name="modal_funciona" value="PLUS">
					<?php } ?>
					<?php if($c['formula'] == 'planahorro') { ?>
					<?php mysql_query("UPDATE contratos_voids SET vers_funciona='DUAL', modal_funciona='PLUS' WHERE id='". $c[id] ."'"); ?>
					 <input type="text" name="vers_funciona" value="DUAL">
					 <input type="text" name="modal_funciona" value="PLUS">
					<?php } ?>
					<?php if($c['formula'] == 'marca') { ?>
						<?php if($c['formula2'] == 'luz') { ?>
						 
						 <?php mysql_query("UPDATE contratos_voids SET vers_funciona='SOLO LUZ', modal_funciona='". strtoupper($c[tipo_contrato]) ."' WHERE id='". $c[id] ."'"); ?>
						 <input type="text" name="vers_funciona" value="SOLO LUZ">
						 <input type="text" name="modal_funciona" value="<?php echo strtoupper($c['tipo_contrato']); ?>">
						<?php } ?>
						<?php if($c['formula2'] == 'gas') { ?>
						 
						 <?php mysql_query("UPDATE contratos_voids SET vers_funciona='DUAL', modal_funciona='PLUS' WHERE id='". $c[id] ."'"); ?>
						 <input type="text" name="vers_funciona" value="DUAL">
						 <input type="text" name="modal_funciona" value="PLUS">
						<?php } ?>
						<?php if($c['formula2'] == 'dual') { ?>
						<?php mysql_query("UPDATE contratos_voids SET vers_funciona='DUAL', modal_funciona='PLUS' WHERE id='". $c[id] ."'"); ?>
						 
						 <input type="text" name="vers_funciona" value="DUAL">
						 <input type="text" name="modal_funciona" value="PLUS">
						<?php } ?>
					<?php } ?>
				<?php } else { ?>
					<?php mysql_query("UPDATE contratos_voids SET vers_funciona='', modal_funciona='' WHERE id='". $c[id] ."'"); ?>
				<?php } ?>
<?php } ?>