<?php $c_sql = mysql_query("SELECT * FROM contratos WHERE id='". Filter($_GET[id]) ."'"); while($c = mysql_fetch_assoc($c_sql)){ ?>
<?php
  
if (isset($_POST['editar_contrato'])) {
	$ccc_1 = strtoupper($_POST["ccc_1"]);
	$ccc_2 = strtoupper($_POST["ccc_2"]);
	$ccc_3 = strtoupper($_POST["ccc_3"]);
	$ccc_4 = strtoupper($_POST["ccc_4"]);
	$subgerente2 = strtoupper($_POST["subgerente2"]);
	$cod_verificacion = strtoupper($_POST["cod_verificacion"]);
	$codigo_comercial = strtoupper($_POST["codigo_comercial"]);
	$cg_sql = mysql_query("SELECT * FROM click_comerciales WHERE codigo_interno='$codigo_comercial'");$cg = mysql_fetch_assoc($cg_sql);
	$cig = strtoupper($_POST["cig"]);
	$intro_dia = strtoupper($_POST["intro_dia"]);
	$intro_mes = strtoupper($_POST["intro_mes"]);
	$intro_ano = strtoupper($_POST["intro_ano"]);
	$we_dia = strtoupper($_POST["we_dia"]);
	$we_mes = strtoupper($_POST["we_mes"]);
	$we_ano = strtoupper($_POST["we_ano"]);
	$impl_explicito = strtoupper($_POST["impl_explicito"]);
	$consumo_pyme = strtoupper($_POST["consumo_pyme"]);
	$nombre_titular = strtoupper($_POST["nombre_titular"]);
	$apellidos_titular = strtoupper($_POST["apellidos_titular"]);
	$dni_cif_titular = strtoupper($_POST["dni_cif_titular"]);
	$telefono_pref_1 = strtoupper($_POST["telefono_pref_1"]);
	$telefono_pref_2 = strtoupper($_POST["telefono_pref_2"]);
	$correo_electron = strtoupper($_POST["correo_electron"]);
	$representante_nombre = strtoupper($_POST["representante_nombre"]);
	$representante_apellidos = strtoupper($_POST["representante_apellidos"]);
	$dni_cif_representante = strtoupper($_POST["dni_cif_representante"]);
	$relacion_representante_titular = $_POST["relacion_representante_titular"];
	$tipo_via_ps = strtoupper($_POST["tipo_via_ps"]);
	$calle_ps = strtoupper(addslashes($_POST["calle_ps"]));
	$numero_ps = strtoupper($_POST["numero_ps"]);
	$escalera_ps = strtoupper($_POST["escalera_ps"]);
	$piso_ps = strtoupper($_POST["piso_ps"]);
	$letra_ps = strtoupper($_POST["letra_ps"]);
	$cod_postal_ps = strtoupper($_POST["cod_postal_ps"]);
	$poblacion_ps = strtoupper(addslashes($_POST["poblacion_ps"]));
	$municipio_ps = strtoupper(addslashes($_POST["municipio_ps"]));
	$cliente_tipo_via_otra = strtoupper($_POST["cliente_tipo_via_otra"]);
	$cliente_calle_otra = strtoupper(addslashes($_POST["cliente_calle_otra"]));
	$cliente_numero_otra = strtoupper($_POST["cliente_numero_otra"]);
	$cliente_escalera_otra = strtoupper($_POST["cliente_escalera_otra"]);
	$cliente_piso_otra = strtoupper($_POST["cliente_piso_otra"]);
	$cliente_letra_otra = strtoupper($_POST["cliente_letra_otra"]);
	$cliente_cod_postal_otra = strtoupper($_POST["cliente_cod_postal_otra"]);
	$cliente_poblacion_otra = strtoupper(addslashes($_POST["cliente_poblacion_otra"]));
	$cliente_municipio_otra = strtoupper(addslashes($_POST["cliente_municipio_otra"]));
	$tipo_via_ef_otra = strtoupper($_POST["tipo_via_ef_otra"]);
	$calle_ef_otra = strtoupper(addslashes($_POST["calle_ef_otra"]));
	$numero_ef_otra = strtoupper($_POST["numero_ef_otra"]);
	$escalera_ef_otra = strtoupper($_POST["escalera_ef_otra"]);
	$piso_ef_otra = strtoupper($_POST["piso_ef_otra"]);
	$letra_ef_otra = strtoupper($_POST["letra_ef_otra"]);
	$cod_postal_ef_otra = strtoupper($_POST["cod_postal_ef_otra"]);
	$poblacion_ef_otra = strtoupper(addslashes($_POST["poblacion_ef_otra"]));
	$municipio_ef_otra = strtoupper(addslashes($_POST["municipio_ef_otra"]));
	$cups_luz = strtoupper($_POST["cups_luz"]);
	$cups_gas = strtoupper($_POST["cups_gas"]);
	$cnae = strtoupper($_POST["cnae"]);
	$fecha_venta = $_POST["fecha_venta"];
	$tarjeta_socia = strtoupper($_POST["tarjeta_socia"]);
	$maximetro = strtoupper($_POST["maximetro"]);
	$tipo_alta_luz = $_POST["tipo_alta_luz"];
	$potencia_p1 = strtoupper($_POST["potencia_p1"]);
	$potencia_p2 = strtoupper($_POST["potencia_p2"]);
	$potencia_p3 = strtoupper($_POST["potencia_p3"]);
	$tarifa_ref_luz = strtoupper($_POST["tarifa_ref_luz"]);
	$descuento_luz = strtoupper($_POST["descuento_luz"]);
	$tipo_alta_gas = $_POST["tipo_alta_gas"];
	$tarifa_ref_gas = strtoupper($_POST["tarifa_ref_gas"]);
	$descuento_gas = strtoupper($_POST["descuento_gas"]);
	$plan_destino_luz = strtoupper($_POST["plan_destino_luz"]);
	$plan_destino_gas = strtoupper($_POST["plan_destino_gas"]);
	$plan_destino_fun = strtoupper($_POST["plan_destino_fun"]);
	$contrata_opcion_clima = strtoupper($_POST["contrata_opcion_clima"]);
	$marca_aparato_climatizacion = strtoupper($_POST["marca_aparato_climatizacion"]);
	$marca_caldera = strtoupper($_POST["marca_caldera"]);
	$edited_contract_reason = $_POST["edited_contract_reason"];
	$vers_funciona = $_POST["vers_funciona"];
	$modal_funciona = $_POST["modal_funciona"];
	
	mysql_query("UPDATE contratos SET gerente='$cg[gerente]', subgerente='$cg[subgerente]', subgerente2='$subgerente2', oficina='$cg[oficina]', ccc_1='$ccc_1', ccc_2='$ccc_2', ccc_3='$ccc_3', ccc_4='$ccc_4', cod_verificacion='$cod_verificacion', 
	codigo_comercial='$codigo_comercial', cig='$cig', intro_dia='$intro_dia', intro_mes='$intro_mes', intro_ano='$intro_ano', we_dia='$we_dia', we_mes='$we_mes', we_ano='$we_ano', impl_explicito='$impl_explicito', consumo_pyme='$consumo_pyme', 
	nombre_titular='$nombre_titular', apellidos_titular='$apellidos_titular', dni_cif_titular='$dni_cif_titular', telefono_pref_1='$telefono_pref_1', 
	telefono_pref_2='$telefono_pref_2', correo_electron='$correo_electron', representante_nombre='$representante_nombre', 
	representante_apellidos='$representante_apellidos', dni_cif_representante='$dni_cif_representante', 
	relacion_representante_titular='$relacion_representante_titular', tipo_via_ps='$tipo_via_ps', calle_ps='$calle_ps', numero_ps='$numero_ps', 
	escalera_ps='$escalera_ps', piso_ps='$piso_ps', letra_ps='$letra_ps', cod_postal_ps='$cod_postal_ps', poblacion_ps='$poblacion_ps', 
	municipio_ps='$municipio_ps', cliente_tipo_via_otra='$cliente_tipo_via_otra', cliente_calle_otra='$cliente_calle_otra', 
	cliente_numero_otra='$cliente_numero_otra', cliente_escalera_otra='$cliente_escalera_otra', cliente_piso_otra='$cliente_piso_otra', 
	cliente_letra_otra='$cliente_letra_otra', cliente_cod_postal_otra='$cliente_cod_postal_otra', cliente_poblacion_otra='$cliente_poblacion_otra', 
	cliente_municipio_otra='$cliente_municipio_otra', tipo_via_ef_otra='$tipo_via_ef_otra', calle_ef_otra='$calle_ef_otra', 
	numero_ef_otra='$numero_ef_otra', escalera_ef_otra='$escalera_ef_otra', piso_ef_otra='$piso_ef_otra', letra_ef_otra='$letra_ef_otra',
	cod_postal_ef_otra='$cod_postal_ef_otra', poblacion_ef_otra='$poblacion_ef_otra', municipio_ef_otra='$municipio_ef_otra', cups_luz='$cups_luz', 
	cups_gas='$cups_gas', cnae='$cnae', fecha_venta='$fecha_venta', tarjeta_socia='$tarjeta_socia', maximetro='$maximetro', tipo_alta_luz='$tipo_alta_luz', 
	potencia_p1='$potencia_p1', potencia_p2='$potencia_p2', potencia_p3='$potencia_p3', tarifa_ref_luz='$tarifa_ref_luz', descuento_luz='$descuento_luz', 
	tipo_alta_gas='$tipo_alta_gas', tarifa_ref_gas='$tarifa_ref_gas', descuento_gas='$descuento_gas', plan_destino_luz='$plan_destino_luz', 
	plan_destino_gas='$plan_destino_gas', plan_destino_fun='$plan_destino_fun', contrata_opcion_clima='$contrata_opcion_clima', 
	marca_aparato_climatizacion='$marca_aparato_climatizacion', marca_caldera='$marca_caldera', edited_contract_reason='$edited_contract_reason', 
	edited_contract_user='$user[username]', edited_contract_date='". time() ."', vers_funciona='$vers_funciona', modal_funciona='$modal_funciona' WHERE id='$_GET[id]'");
	mysql_query("INSERT INTO historial (type,contract_id,user,date) VALUES ('edit_contract','$_GET[id]','$user[username]','". date('Y-m-d') ."')");
	
	echo '<script>
    swal({
      type: "success",
      title: "Contrato modificado",
      showConfirmButton: false
    })</script>
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=all_contracts";
	}
	setTimeout("redireccionarUsuario()", 1500);
	</script>
	';
}



if (isset($_POST['convertir_void'])) {
	$motivo = $_POST["motivo"];
	mysql_query("INSERT INTO contratos_voids (gerente,subgerente,subgerente2,oficina,vers_funciona,modal_funciona,tipo_contrato,formula,formula2,funciona,intro_user,fecha_venta,nombre_titular,apellidos_titular,dni_cif_titular,telefono_pref_1,cod_verificacion,codigo_comercial,cig,we_dia,we_mes,we_ano,cups_luz,cups_gas,plan_destino_luz,plan_destino_gas,plan_destino_fun,motivo,intro_dia,intro_mes,intro_ano) 
	VALUES ('$c[gerente]','$c[subgerente]','$c[subgerente2]','$c[oficina]','$c[vers_funciona]','$c[modal_funciona]','$c[tipo_contrato]','$c[formula]','$c[formula2]','$c[funciona]','$user[username]','". substr($c['fecha_venta'], -4, 4) . '-' . substr($c['fecha_venta'], -7, 2) . '-' . substr($c['fecha_venta'], -10, 2) ."','$c[nombre_titular]','$c[apellidos_titular]','$c[dni_cif_titular]','$c[telefono_pref_1]','$c[cod_verificacion]','$c[codigo_comercial]','$c[cig]','$c[we_dia]','$c[we_mes]','$c[we_ano]','$c[cups_luz]','$c[cups_gas]','$c[plan_destino_luz]','$c[plan_destino_gas]','$c[plan_destino_fun]','$motivo','$c[intro_dia]','$c[intro_mes]','$c[intro_ano]')");
	mysql_query("DELETE FROM contratos WHERE id='$_GET[id]'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=all_contracts";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}

if (isset($_POST['eliminar_contrato'])) {
	$fecha_venta = substr($c['fecha_venta'], -4) . '-' . substr($c['fecha_venta'], -7, 2) . '-' . substr($c['fecha_venta'], -10, 2);
	mysql_query("INSERT INTO contratos_borrados (
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
	ccc_3,ccc_4,tarjeta_socia,cod_verificacion,cig,
	tipo_contrato,formula,funciona,formula2,
	vers_funciona,modal_funciona,user_contrato_intro,fecha_contrato_intro,
	we_dia,we_mes,we_ano,impl_explicito,consumo_pyme,intro_dia,intro_mes,intro_ano) VALUES (
	'$c[gerente]','$c[subgerente]','$c[subgerente2]','$c[oficina]','$fecha_venta','$c[codigo_comercial]','$c[nombre_titular]',
	'$c[apellidos_titular]','$c[dni_cif_titular]','$c[telefono_pref_1]',
	'$c[telefono_pref_2]','$c[correo_electron]','$c[representante_nombre]',
	'$c[representante_apellidos]','$c[dni_cif_representante]','$c[relacion_representante_titular]',
	'$c[cliente_tipo_via_otra]','$c[cliente_calle_otra]','$c[cliente_numero_otra]',
	'$c[cliente_escalera_otra]','$c[cliente_piso_otra]','$c[cliente_letra_otra]',
	'$c[cliente_cod_postal_otra]','$c[cliente_poblacion_otra]','$c[cliente_municipio_otra]',
	'$c[tipo_via_ef_otra]','$c[calle_ef_otra]','$c[numero_ef_otra]',
	'$c[escalera_ef_otra]','$c[piso_ef_otra]','$c[letra_ef_otra]',
	'$c[cod_postal_ef_otra]','$c[poblacion_ef_otra]','$c[municipio_ef_otra]',
	'$c[tipo_via_ps]','$c[calle_ps]','$c[numero_ps]',
	'$c[escalera_ps]','$c[piso_ps]','$c[letra_ps]',
	'$c[cod_postal_ps]','$c[poblacion_ps]','$c[municipio_ps]',
	'$c[cups_luz]','$c[cups_gas]','$c[cnae]',
	'$c[maximetro]','$c[tipo_alta_luz]','$c[potencia_p1]',
	'$c[potencia_p2]','$c[potencia_p3]','$c[precio_luz_edp]',
	'$c[tarifa_ref_luz]','$c[descuento_luz]','$c[tipo_alta_gas]',
	'$c[precio_gas_edp]','$c[tarifa_ref_gas]','$c[descuento_gas]',
	'$c[plan_destino_luz]','$c[plan_destino_gas]','$c[plan_destino_fun]',
	'$c[tipo_de_funciona]','$c[contrata_opcion_clima]','$c[marca_caldera]',
	'$c[marca_aparato_climatizacion]','$c[ccc_1]','$c[ccc_2]',
	'$c[ccc_3]','$c[ccc_4]','$c[tarjeta_socia]','$c[cod_verificacion]','$c[cig]',
	'$c[tipo_contrato]','$c[formula]','$c[funciona]','$c[formula2]',
	'$c[vers_funciona]','$c[modal_funciona]','$user[username]','". time() ."',
	'$c[we_dia]','$c[we_mes]','$c[we_ano]','$c[impl_explicito]','$c[consumo_pyme]','$c[intro_dia]','$c[intro_mes]','$c[intro_ano]')");
	mysql_query("DELETE FROM contratos WHERE id='$_GET[id]'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=all_contracts";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['tipo_contrato_negocios'])) {
	$tipo_contrato_negocios = $_POST['tipo_contrato_negocios'];
	mysql_query("UPDATE contratos SET tipo_contrato='$tipo_contrato_negocios' WHERE id='$_GET[id]'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_contract_id&id='. $_GET[id] .'";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['tipo_contrato_hogares'])) {
	$tipo_contrato_hogares = $_POST['tipo_contrato_hogares'];
	mysql_query("UPDATE contratos SET tipo_contrato='$tipo_contrato_hogares', formula2='' WHERE id='$_GET[id]'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_contract_id&id='. $_GET[id] .'";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['formula_luz'])) {
	$formula_luz = $_POST['formula_luz'];
	mysql_query("UPDATE contratos SET formula='$formula_luz', formula2='' WHERE id='$_GET[id]'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_contract_id&id='. $_GET[id] .'";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['formula_marca'])) {
	$formula_marca = $_POST['formula_marca'];
	mysql_query("UPDATE contratos SET formula='$formula_marca' WHERE id='$_GET[id]'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_contract_id&id='. $_GET[id] .'";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['formula_gas'])) {
	$formula_gas = $_POST['formula_gas'];
	mysql_query("UPDATE contratos SET formula='$formula_gas', formula2='' WHERE id='$_GET[id]'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_contract_id&id='. $_GET[id] .'";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['formula_dual'])) {
	$formula_dual = $_POST['formula_dual'];
	mysql_query("UPDATE contratos SET formula='$formula_dual', formula2='' WHERE id='$_GET[id]'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_contract_id&id='. $_GET[id] .'";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['formula_maxahorro'])) {
	$formula_maxahorro = $_POST['formula_maxahorro'];
	mysql_query("UPDATE contratos SET formula='$formula_maxahorro', formula2='' WHERE id='$_GET[id]'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_contract_id&id='. $_GET[id] .'";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['formula_planahorro'])) {
	$formula_planahorro = $_POST['formula_planahorro'];
	mysql_query("UPDATE contratos SET formula='$formula_planahorro', formula2='' WHERE id='$_GET[id]'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_contract_id&id='. $_GET[id] .'";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['formula2_luz'])) {
	$formula2_luz = $_POST['formula2_luz'];
	mysql_query("UPDATE contratos SET formula2='$formula2_luz' WHERE id='$_GET[id]'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_contract_id&id='. $_GET[id] .'";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['formula2_gas'])) {
	$formula2_gas = $_POST['formula2_gas'];
	mysql_query("UPDATE contratos SET formula2='$formula2_gas' WHERE id='$_GET[id]'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_contract_id&id='. $_GET[id] .'";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['formula2_dual'])) {
	$formula2_dual = $_POST['formula2_dual'];
	mysql_query("UPDATE contratos SET formula2='$formula2_dual' WHERE id='$_GET[id]'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_contract_id&id='. $_GET[id] .'";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['funciona_si'])) {
	$funciona_si = $_POST['funciona_si'];
	mysql_query("UPDATE contratos SET funciona='$funciona_si' WHERE id='$_GET[id]'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_contract_id&id='. $_GET[id] .'";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
if (isset($_POST['funciona_no'])) {
	$funciona_no = $_POST['funciona_no'];
	mysql_query("UPDATE contratos SET funciona='$funciona_no' WHERE id='$_GET[id]'");
	echo '
	<script>
	function redireccionarUsuario() {
	  window.location = "'. $site .'/index.php?page=edit_contract_id&id='. $_GET[id] .'";
	}
	setTimeout("redireccionarUsuario()", 50);
	</script>
	';
}
?>
<?php if($c['funciona'] == 'si') { ?>
	<?php if($c['formula'] == 'luz') { ?>
	<?php mysql_query("UPDATE contratos SET vers_funciona='SOLO LUZ', modal_funciona='". strtoupper($c[tipo_contrato]) ."' WHERE id='". $c[id] ."'"); ?>
	<?php } ?>
	<?php if($c['formula'] == 'maxahorro') { ?>
	<?php mysql_query("UPDATE contratos SET vers_funciona='SOLO LUZ', modal_funciona='". strtoupper($c[tipo_contrato]) ."' WHERE id='". $c[id] ."'"); ?>
	<?php } ?>
	<?php if($c['formula'] == 'gas') { ?>
	<?php mysql_query("UPDATE contratos SET vers_funciona='DUAL', modal_funciona='PLUS' WHERE id='". $c[id] ."'"); ?>
	<?php } ?>
	<?php if($c['formula'] == 'dual') { ?>
	<?php mysql_query("UPDATE contratos SET vers_funciona='DUAL', modal_funciona='PLUS' WHERE id='". $c[id] ."'"); ?>
	<?php } ?>
	<?php if($c['formula'] == 'planahorro') { ?>
	<?php mysql_query("UPDATE contratos SET vers_funciona='DUAL', modal_funciona='PLUS' WHERE id='". $c[id] ."'"); ?>
	<?php } ?>
	<?php if($c['formula'] == 'marca') { ?>
		<?php if($c['formula2'] == 'luz') { ?>
		 <?php mysql_query("UPDATE contratos SET vers_funciona='SOLO LUZ', modal_funciona='". strtoupper($c[tipo_contrato]) ."' WHERE id='". $c[id] ."'"); ?>
		<?php } ?>
		<?php if($c['formula2'] == 'gas') { ?>
		 <?php mysql_query("UPDATE contratos SET vers_funciona='DUAL', modal_funciona='PLUS' WHERE id='". $c[id] ."'"); ?>
		<?php } ?>
		<?php if($c['formula2'] == 'dual') { ?>
		<?php mysql_query("UPDATE contratos SET vers_funciona='DUAL', modal_funciona='PLUS' WHERE id='". $c[id] ."'"); ?>
		<?php } ?>
	<?php } ?>
<?php } else { ?>
	<?php mysql_query("UPDATE contratos SET vers_funciona='', modal_funciona='' WHERE id='". $c[id] ."'"); ?>
<?php } ?>
<style>
input:focus{
	background: orange !important;
}
</style>
<style>
input:focus{
	background: rgba(156, 33, 60, 0.30) !important;
	color: #444 !important;
}
.btn:focus {
	background: #444;
}
.btn:hover {
	background: #444;
}
</style>

<?php if($c['formula'] == ''){ ?>
<script>
  swal({
    type: "info",
    title: "El contrato importado es...",
	text: "<?php if($c['cups_luz'] == '') { echo $c['plan_destino_gas']; } else { echo $c['plan_destino_luz']; } ?>",
    showConfirmButton: false
  })
</script>
<?php } ?>

<div class="row">
	<div class="col s12 m12">
		<div class="input-field col s12 m6">
		  <a href="#" class="waves-effect waves-light btn" style="width: 100%;">Hora introducido: <?php echo date("d/m/Y H:i", $c['fecha_contrato_intro']); ?></a>
		</div>
		<div class="input-field col s12 m2">
		  <a href="#" class="waves-effect waves-light btn" style="width: 100%;"><?php echo $c['user_contrato_intro']; ?></a>
		</div>
		<div class="input-field col s12 m4">
		  <a href="#" class="waves-effect waves-light btn" style="width: 100%;"><?php if($c['cod_verificacion_posterior'] == 'posterior'){ echo 'Cód. Verif. <b>Posterior</b>'; } else { echo 'Código de <b>Verificación</b>'; } ?></a>
		</div>
	</div>
	<br><br><br>
	<form method="POST">
	  <div class="col s12 m3">
		<a href="#" class="waves-effect waves-light btn" style="width: 100%;"><?php echo $c['estado_contrato']; ?></a>
	  </div>
	  <div class="col s12 m3">
		<a href="#" class="waves-effect waves-light btn" style="width: 100%;"><?php echo $c['subgerente2']; ?></a>
	  </div>
	  <div class="col s12 m3">
		<button type="submit" name="eliminar_contrato" class="waves-effect waves-light btn #b71c1c red darken-4" style="width: 100%;"><i class="material-icons right">delete_forever</i>ELIMINAR CONTRATO</button>
	  </div>
	  <div class="col s12 m2">
		<a href="#convertir_void" class="waves-effect waves-light btn #004d40 teal darken-4 modal-trigger" style="width: 100%;"><i class="material-icons right">delete</i>VOID</a>
	  </div>
	  <div class="col s12 m1">
		<a href="<?php echo $config['site']; ?>/excel/Contratos.php?id=<?php echo $c['id']; ?>&idsubgerente2=<?php echo $c['subgerente2']; ?>" class="waves-effect waves-light btn" style="width: 100%;padding: 0px;"><i class="material-icons">arrow_downward</i></a>
	  </div>
	</form>
		  <div id="convertir_void" class="modal">
			<div class="modal-content">
			  <h4>Contrato &#187; Void</h4>
			  <p>Estás apunto de convertir el contrato de <b><?php echo $c['nombre_titular']; ?> <?php echo $c['apellidos_titular']; ?></b> en un void.. para ello tendrás que poner un motivo válido.</p>
			  <form method="POST">
			    <input type="text" name="motivo" placeholder="Motivo">
			    <button type="submit" name="convertir_void" class="waves-effect waves-light btn #004d40 teal darken-4 modal-trigger" style="width: 100%;"><i class="material-icons right">delete</i>Convertir a void</button>
			  </form>
			</div>
			<div class="modal-footer">
			  <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
			</div>
		  </div>
	<br><br>
	<form method="POST">
	  <div class="col s12 m6">
		<button type="submit" name="tipo_contrato_negocios" value="NEGOCIOS" class="waves-effect waves-light btn" style="width: 100%;<?php if($c['tipo_contrato'] == 'NEGOCIOS'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>"><i class="material-icons right">store</i>Negocios</button>
	  </div>
	</form>
	<form method="POST">
	  <div class="col s12 m6">
		<button type="submit" name="tipo_contrato_hogares" value="HOGARES" class="waves-effect waves-light btn" style="width: 100%;<?php if($c['tipo_contrato'] == 'HOGARES'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>"><i class="material-icons right">home</i>Hogares</button>
	  </div>
	</form>
	  <br><br>
	<form method="POST">
	  <div class="col s12 m1">
		<button type="submit" name="formula_luz" value="luz" class="waves-effect waves-light btn" style="width: 100%;padding: 0;<?php if($c['formula'] == 'luz'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>">Luz</button>
	  </div>
	</form>
	<form method="POST">
	  <div class="col s12 m2">
		<button type="submit" name="formula_marca" value="marca" class="waves-effect waves-light btn" style="width: 100%;<?php if($c['formula'] == 'marca'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>">Carrefour</button>
	  </div>
	</form>
	<form method="POST">
	  <div class="col s12 m1">
		<button type="submit" name="formula_gas" value="gas" class="waves-effect waves-light btn" style="width: 100%;padding: 0;<?php if($c['formula'] == 'gas'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>">Gas</button>
	  </div>
	</form>
	<form method="POST">
	  <div class="col s12 m2">
		<button type="submit" name="formula_dual" value="dual" class="waves-effect waves-light btn" style="width: 100%;<?php if($c['formula'] == 'dual'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>">Dual</a>
	  </div>
	</form>
	<form method="POST">
	  <div class="col s12 m3">
		<button type="submit" name="formula_maxahorro" value="maxahorro" class="waves-effect waves-light btn" style="width: 100%;<?php if($c['formula'] == 'maxahorro'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>">MÁXIMO AHORRO</button>
	  </div>
	</form>
	<form method="POST">
	  <div class="col s12 m3">
		<button type="submit" name="formula_planahorro" value="planahorro" class="waves-effect waves-light btn" style="width: 100%;<?php if($c['formula'] == 'planahorro'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>">PLAN AHORRO</button>
	  </div>
	</form>
	  <?php if($c['formula'] == 'marca') { ?>
	  <br><br>
	<form method="POST">
	  <div class="col s12 m4">
		<button type="submit" name="formula2_luz" value="luz" class="waves-effect waves-light btn" style="width: 100%;<?php if($c['formula2'] == 'luz'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>">Luz</button>
	  </div>
	</form>
	<form method="POST">
	  <div class="col s12 m4">
		<button type="submit" name="formula2_gas" value="gas" class="waves-effect waves-light btn" style="width: 100%;<?php if($c['formula2'] == 'gas'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>">Gas</button>
	  </div>
	</form>
	<form method="POST">
	  <div class="col s12 m4">
		<button type="submit" name="formula2_dual" value="dual" class="waves-effect waves-light btn" style="width: 100%;<?php if($c['formula2'] == 'dual'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>">Dual</button>
	  </div>
	</form>
	  <?php } ?>
		<br><br>
	<form method="POST">
	  <div class="col s12 m6">
		<button type="submit" name="funciona_si" value="si" class="waves-effect waves-light btn" style="width: 100%;<?php if($c['funciona'] == 'si'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>">Con funciona</button>
	  </div>
	</form>
	<form method="POST">
	  <div class="col s12 m6">
		<button type="submit" name="funciona_no" value="no" class="waves-effect waves-light btn" style="width: 100%;<?php if($c['funciona'] == 'no'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>">Sin funciona</button>
	  </div>
	</form>
	  
	  <div class="col s12 m12">
	  <p class="light orange white-text center"><b style="text-transform: uppercase;"><?php echo strtoupper($c['tipo_contrato']); ?></b> <?php if($c['formula'] == ''){ echo '<br>Por favor, selecciona un tipo de contrato...'; } else { ?>&#187; Has seleccionado un contrato de tipo <b style="text-transform: uppercase;"><?php echo $c['formula']; ?></b> <?php if($c['formula2'] == '') {}else{ echo '('. $c[formula2] .')'; } ?><?php } ?> <?php if($c['funciona'] == 'no'){ echo ''; } elseif($c['funciona'] == 'si') { echo 'con funciona'; } else {}  ?></p>
	  </div>
		<form method="POST">
		<div class="col s12 m12">
          <div class="card">
            <div class="card-content black-text">		  
			  <div class="input-field col s12 m12">
				<select name="subgerente2" required>
				  <option value="" disabled selected>Selecciona un subgerente</option>
					<option value="<?php echo $c['subgerente2']; ?>" selected><?php echo $c['subgerente2']; ?></option>
					<?php $gg_sql = mysql_query("SELECT * FROM click_gerentes_introductores ORDER BY subgerente"); while($g = mysql_fetch_assoc($gg_sql)){ ?>
					<option value="<?php echo $g['subgerente']; ?>"><?php echo $g['subgerente']; ?></option>
					<?php } ?>
				</select>
			  </div>
			  <span class="card-title">Validador de cuenta bancaria</span>
			  <br>
			  <div class="input-field col s12 m3">
			    <input type="text" id="entidad" value="<?php echo $c['ccc_1']; ?>" pattern="[0-9]{4}" name="ccc_1" placeholder="Entidad" class="validate" maxlength="4" data-length="4"/>
			    <label for="Entidad">Entidad</label>
			  </div>
			  <div class="input-field col s12 m2">
			    <input type="text" id="oficina" value="<?php echo $c['ccc_2']; ?>" pattern="[0-9]{4}" name="ccc_2" placeholder="oficina" class="validate" maxlength="4" data-length="4"/>
			    <label for="oficina">Oficina</label>
			  </div>
			  <div class="input-field col s12 m2">
			    <input type="text" id="dc" value="<?php echo $c['ccc_3']; ?>" pattern="[0-9]{2}" name="ccc_3" placeholder="dc" class="validate" value="DC" maxlength="2" data-length="2"/>
			    <label for="dc">DC</label>
			  </div>
			  <div class="input-field col s12 m3">
			    <input type="text" id="ncuenta" value="<?php echo $c['ccc_4']; ?>" pattern="[0-9]{10}" name="ccc_4" placeholder="N&uacute;mero de cuenta" class="validate" maxlength="10" data-length="10"/>
			    <label for="ncuenta">ncuenta</label>
			  </div>
			  <div class="input-field col s12 m2">
			  	<input type="button" style="width: 100%;background: #444;" class="btn" onclick="validaycalculaIBAN();" value="Validar"/>
			  </div>
			  <div class="input-field col s12 m12">
				<span class="card-title">Datos esenciales</span>
			  </div>
					<div class="input-field col s12 m4">
					  <i class="material-icons prefix">voicemail</i>
					  <input id="cod_verificacion" pattern="[0-9]{14}" value="<?php echo $c['cod_verificacion']; ?>" name="cod_verificacion" type="text" class="validate" style="text-transform: uppercase;" maxlength="14" data-length="14" required>
					  <label for="cod_verificacion">Código de Verificación</label>
					</div>
					<div class="input-field col s12 m4">
					  <div id="resultadoBusqueda" style="text-align: center;margin-top: -65px;position: absolute;background: #ffc10766;padding: 3px 20px;border-radius: 4px;margin-left: 60px;"></div>
					  <i class="material-icons prefix">face</i>
					  <input autocomplete="off" onKeyUp="buscar();" id="busqueda" id="codigo_comercial" pattern="[0123456789]{5}" value="<?php echo $c['codigo_comercial']; ?>" name="codigo_comercial" type="text" class="validate" style="text-transform: uppercase;" maxlength="5" data-length="5" required>
					  <label for="codigo_comercial">Código de comercial</label>
					</div>
					<div class="input-field col s12 m4">
					  <i class="material-icons prefix">verified_user</i>
					  <input id="cod_venta_espontanea" pattern="[0-9]{13}" value="<?php echo $c['cig']; ?>" name="cig" type="text" class="validate" style="text-transform: uppercase;" maxlength="13" data-length="13" required>
					  <label for="cod_venta_espontanea">C.I.G</label>
					</div>
					<div class="input-field col s12 m4">
					  <i class="material-icons prefix">date_range</i>
					  <input id="intro_dia" value="<?php echo $c['intro_dia']; ?>" pattern="[0-9]{2}" name="intro_dia" type="text" class="validate" style="background: grey;text-transform: uppercase;" maxlength="2" data-length="2" required>
					  <label for="intro_dia">INTRO DÍA</label>
					</div>
					<div class="input-field col s12 m4">
					  <i class="material-icons prefix">date_range</i>
					  <input id="intro_mes" value="<?php echo $c['intro_mes']; ?>" pattern="[0-9]{2}" name="intro_mes" type="text" class="validate" style="background: grey;text-transform: uppercase;" maxlength="2" data-length="2" required>
					  <label for="intro_mes">INTRO MES</label>
					</div>
					<div class="input-field col s12 m4">
					  <i class="material-icons prefix">date_range</i>
					  <input id="intro_ano" value="<?php echo $c['intro_ano']; ?>" pattern="[0-9]{4}" name="intro_ano" type="text" class="validate" style="background: grey;text-transform: uppercase;" maxlength="2" data-length="2" required>
					  <label for="intro_ano">INTRO AÑO</label>
					</div>
					<div class="input-field col s12 m4">
					  <i class="material-icons prefix">date_range</i>
					  <input id="we_dia" value="<?php echo $c['we_dia']; ?>" pattern="[0-9]{2}" name="we_dia" type="text" class="validate" style="text-transform: uppercase;" maxlength="2" data-length="2" required>
					  <label for="we_dia">DÍA WE</label>
					</div>
					<div class="input-field col s12 m4">
					  <i class="material-icons prefix">date_range</i>
					  <input id="we_mes" value="<?php echo $c['we_mes']; ?>" pattern="[0-9]{2}" name="we_mes" type="text" class="validate" style="text-transform: uppercase;" maxlength="2" data-length="2" required>
					  <label for="we_mes">MES WE</label>
					</div>
					  <div class="input-field col s12 m4">
					  <i class="material-icons prefix">date_range</i>
						  <select name="we_ano">
						  <option value="<?php echo $c['we_ano']; ?>"><?php echo $c['we_ano']; ?></option>
						  <option value="<?php echo date("Y"); ?>"><?php echo date("Y"); ?></option>
						  <option value="<?php echo date("Y")-1; ?>"><?php echo date("Y")-1; ?></option>
						</select>
						<label>AÑO WE</label>
					  </div>
					<div class="input-field col s12 m6">
					  <i class="material-icons prefix">date_range</i>
						<select name="impl_explicito">
						  <?php if($c['impl_explicito'] == ''){ ?>
						  <option value="" disabled>Escoge una opción</option>
						  <option value="SI">SI</option>
						  <option value="NO">NO</option>
						  <option value="" selected>DEJAR VACÍO</option>
						  <?php } else { ?>
						  <option value="<?php echo $c['impl_explicito']; ?>" selected><?php echo $c['impl_explicito']; ?></option>
						  <option value="SI">SI</option>
						  <option value="NO">NO</option>
						  <?php } ?>
						  
						</select>
						<label>CONSENTIMIENTO</label>
					  </div>
					<div class="input-field col s12 m6">
					  <input id="consumo_pyme" value="<?php echo $c['consumo_pyme']; ?>" name="consumo_pyme" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="consumo_pyme">CONSUMO PYME</label>
					</div>
			  <div class="input-field col s12 m12">
			  <span class="card-title">Datos del Cliente</span>
			  </div>
			  <div class="row">
				<div class="col s12 m12">
				  <div class="row">
					<div class="input-field col s12 m6">
					  <i class="material-icons prefix">account_box</i>
					  <input id="nombre" value="<?php echo $c['nombre_titular']; ?>" name="nombre_titular" type="text" class="validate" style="text-transform: uppercase;" required>
					  <label for="nombre">Nombre / Razón Social</label>
					</div>
					<div class="input-field col s12 m6">
					  <i class="material-icons prefix">account_box</i>
					  <input id="apellido" value="<?php echo $c['apellidos_titular']; ?>" name="apellidos_titular" type="text" class="validate" style="text-transform: uppercase;" required>
					  <label for="apellido">Apellidos</label>
					</div>
					<div class="input-field col s12 m6">
					  <i class="material-icons prefix">subtitles</i>
					  <input id="dni" value="<?php echo $c['dni_cif_titular']; ?>" maxlength="9" data-length="9" name="dni_cif_titular" onblur="nif(this.value)" type="text" class="validate" required>
					  <label for="dni">DNI / NIE / CIF</label>
					</div>
					<div class="input-field col s12 m3">
					  <i class="material-icons prefix">phone_iphone</i>
					  <input id="telf1" value="<?php echo $c['telefono_pref_1']; ?>" pattern="[0-9]{9}" name="telefono_pref_1" type="tel" class="validate" style="text-transform: uppercase;" required>
					  <label for="telf1">Teléfono 1</label>
					</div>
					<div class="input-field col s12 m3">
					  <i class="material-icons prefix">phone_iphone</i>
					  <input id="telf2" value="<?php echo $c['telefono_pref_2']; ?>" pattern="[0-9]{9}" name="telefono_pref_2" type="tel" class="validate" style="text-transform: uppercase;">
					  <label for="telf2">Teléfono 2</label>
					</div>
					<div class="input-field col s12 m12">
					  <i class="material-icons prefix">email</i>
					  <input id="testemail" value="<?php echo $c['correo_electron']; ?>" name="correo_electron" type="email" class="validate" style="text-transform: uppercase;">
					  <label for="x">Correo electrónico</label>
					</div>
				  </div>
				</div>
				<div class="input-field col s12 m12">
				<span class="card-title">Datos del Representante</span>
				</div>
				<div class="col s12 m12">
				  <div class="row">
					<div class="input-field col s12 m6">
					  <i class="material-icons prefix">account_box</i>
					  <input id="nombre" value="<?php echo $c['representante_nombre']; ?>" name="representante_nombre" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="nombre">Nombre</label>
					</div>
					<div class="input-field col s12 m6">
					  <i class="material-icons prefix">account_box</i>
					  <input id="apellido" value="<?php echo $c['representante_apellidos']; ?>" name="representante_apellidos" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="apellido">Apellidos</label>
					</div>
					<div class="input-field col s12 m6">
					  <i class="material-icons prefix">subtitles</i>
					  <input id="dni" value="<?php echo $c['dni_cif_representante']; ?>" maxlength="9" data-length="9" name="dni_cif_representante" onblur="nif(this.value)" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="dni">DNI / NIE / CIF</label>
					</div>
					<div class="input-field col s12 m6">
					<i class="material-icons prefix">gesture</i>
					<select name="relacion_representante_titular">
					  <?php if($c['relacion_representante_titular'] == ''){ ?>
					  <option value="" selected>Escoge una opción</option>
					  <option value="Cónyuge/pareja registrada">Cónyuge/pareja registrada</option>
					  <option value="Ascendiente/descendiente">Ascendiente/descendiente</option>
					  <option value="Apoderado">Apoderado</option>
					  <?php } else { ?>
					  <option value="<?php echo $c['relacion_representante_titular']; ?>" selected><?php echo $c['relacion_representante_titular']; ?></option>
					  <option value="Cónyuge/pareja registrada">Cónyuge/pareja registrada</option>
					  <option value="Ascendiente/descendiente">Ascendiente/descendiente</option>
					  <option value="Apoderado">Apoderado</option>
					  <?php } ?>
					</select>
					<label>Relación con Cliente</label>
					</div>
				  </div>
				</div>
				<div class="input-field col s12 m12">
				<span class="card-title">Otra dirección &#187; Punto suministro</span>
    <ul class="collapsible popout" data-collapsible="expandable">
	<li>
      <div class="collapsible-header active"><i class="material-icons">star</i>Punto de Suministro</div>
      <div class="collapsible-body"><span>
	  <div class="row">
	  <div class="input-field col s12 m4">
					  <i class="material-icons prefix">location_on</i>
					  <input id="tipo_via_ps" value="<?php echo $c["tipo_via_ps"]; ?>" name="tipo_via_ps" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="tipo_via_ps">Tipo de vía</label>
					</div>
					<div class="input-field col s12 m6">
					  <i class="material-icons prefix">location_on</i>
					  <input id="calle" value="<?php echo $c['calle_ps']; ?>" name="calle_ps" type="text" class="validate" style="text-transform: uppercase;" required>
					  <label for="calle">Dirección</label>
					</div>
					<div class="input-field col s12 m2">
					  <i class="material-icons prefix">location_on</i>
					  <input id="ndupl" value="<?php echo $c['numero_ps']; ?>" name="numero_ps" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="ndupl">Nº / Dupl</label>
					</div>
					<div class="input-field col s12 m2">
					  <i class="material-icons prefix">location_on</i>
					  <input id="escalera" value="<?php echo $c['escalera_ps']; ?>" name="escalera_ps" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="escalera">Esc.</label>
					</div>
					<div class="input-field col s12 m2">
					  <i class="material-icons prefix">location_on</i>
					  <input id="piso" value="<?php echo $c['piso_ps']; ?>" name="piso_ps" type="text" class="validate" value="#" style="text-transform: uppercase;" required>
					  <label for="piso">Piso</label>
					</div>
					<div class="input-field col s12 m3">
					  <i class="material-icons prefix">location_on</i>
					  <input id="letra" value="<?php echo $c['letra_ps']; ?>" name="letra_ps" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="letra">Letra / Mano</label>
					</div>
					<div class="input-field col s12 m5">
					  <i class="material-icons prefix">location_on</i>
					  <input id="cp" value="<?php echo $c['cod_postal_ps']; ?>" name="cod_postal_ps" type="text" class="validate" style="text-transform: uppercase;" required>
					  <label for="cp">Código postal</label>
					</div>
					<div class="input-field col s12 m6">
					  <i class="material-icons prefix">location_on</i>
					  <input id="poblacion" value="<?php echo $c['poblacion_ps']; ?>" name="poblacion_ps" type="text" class="validate" style="text-transform: uppercase;" required>
					  <label for="poblacion">Población</label>
					</div>
					<div class="input-field col s12 m6">
					  <i class="material-icons prefix">location_on</i>
					  <input id="municipio_provincia" value="<?php echo $c['municipio_ps']; ?>" name="municipio_ps" type="text" class="validate" style="text-transform: uppercase;" required>
					  <label for="municipio_provincia">Municipio</label>
					</div>
	  </div>
	  </span></div>
	</li>
	<li>
      <div class="collapsible-header<?php if($c['cliente_tipo_via_otra'] == ''){} else { ?> active<?php } ?>"><i class="material-icons"><?php if($c['cliente_tipo_via_otra'] == ''){ ?>star_border<?php } else { ?>star<?php } ?></i>Cliente</div>
      <div class="collapsible-body"><span>
	  <div class="row">
		<div class="input-field col s12 m4">
					  <i class="material-icons prefix">location_on</i>
					  <input id="cliente_tipo_via_otra" value="<?php echo $c['cliente_tipo_via_otra']; ?>" name="cliente_tipo_via_otra" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="cliente_tipo_via_otra">Tipo de vía</label>
					</div>
					<div class="input-field col s12 m6">
					  <i class="material-icons prefix">location_on</i>
					  <input id="calle" value="<?php echo $c['cliente_calle_otra']; ?>" name="cliente_calle_otra" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="calle">Dirección</label>
					</div>
					<div class="input-field col s12 m2">
					  <i class="material-icons prefix">location_on</i>
					  <input id="ndupl" value="<?php echo $c['cliente_numero_otra']; ?>" name="cliente_numero_otra" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="ndupl">Nº / Dupl</label>
					</div>
					<div class="input-field col s12 m2">
					  <i class="material-icons prefix">location_on</i>
					  <input id="escalera" value="<?php echo $c['cliente_escalera_otra']; ?>" name="cliente_escalera_otra" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="escalera">Esc.</label>
					</div>
					<div class="input-field col s12 m2">
					  <i class="material-icons prefix">location_on</i>
					  <input id="piso" value="<?php echo $c['cliente_piso_otra']; ?>" name="cliente_piso_otra" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="piso">Piso</label>
					</div>
					<div class="input-field col s12 m3">
					  <i class="material-icons prefix">location_on</i>
					  <input id="letra" value="<?php echo $c['cliente_letra_otra']; ?>" name="cliente_letra_otra" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="letra">Letra / Mano</label>
					</div>
					<div class="input-field col s12 m5">
					  <i class="material-icons prefix">location_on</i>
					  <input id="cp" value="<?php echo $c['cliente_cod_postal_otra']; ?>" name="cliente_cod_postal_otra" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="cp">Código postal</label>
					</div>
					<div class="input-field col s12 m6">
					  <i class="material-icons prefix">location_on</i>
					  <input id="poblacion" value="<?php echo $c['cliente_poblacion_otra']; ?>" name="cliente_poblacion_otra" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="poblacion">Población</label>
					</div>
					<div class="input-field col s12 m6">
					  <i class="material-icons prefix">location_on</i>
					  <input id="municipio_ps" value="<?php echo $c['cliente_municipio_otra']; ?>" name="cliente_municipio_otra" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="municipio_ps">Municipio</label>
					</div>
	  </div>
	  </span></div>
	</li>
	<li>
      <div class="collapsible-header<?php if($c['tipo_via_ef_otra'] == ''){} else { ?> active<?php } ?>"><i class="material-icons"><?php if($c['tipo_via_ef_otra'] == ''){ ?>star_border<?php } else { ?>star<?php } ?></i>Envío de Facturas</div>
      <div class="collapsible-body"><span>
	  <div class="row">
					<div class="input-field col s12 m4">
					  <i class="material-icons prefix">location_on</i>
					  <input id="tipo_via_ef_otra" value="<?php echo $c['tipo_via_ef_otra']; ?>" name="tipo_via_ef_otra" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="tipo_via_ef_otra">Tipo de vía</label>
					</div>
					<div class="input-field col s12 m6">
					  <i class="material-icons prefix">location_on</i>
					  <input id="calle" value="<?php echo $c['calle_ef_otra']; ?>" name="calle_ef_otra" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="calle">Dirección</label>
					</div>
					<div class="input-field col s12 m2">
					  <i class="material-icons prefix">location_on</i>
					  <input id="ndupl" value="<?php echo $c['numero_ef_otra']; ?>" name="numero_ef_otra" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="ndupl">Nº / Dupl</label>
					</div>
					<div class="input-field col s12 m2">
					  <i class="material-icons prefix">location_on</i>
					  <input id="escalera" value="<?php echo $c['escalera_ef_otra']; ?>" name="escalera_ef_otra" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="escalera">Esc.</label>
					</div>
					<div class="input-field col s12 m2">
					  <i class="material-icons prefix">location_on</i>
					  <input id="piso" value="<?php echo $c['piso_ef_otra']; ?>" name="piso_ef_otra" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="piso">Piso</label>
					</div>
					<div class="input-field col s12 m3">
					  <i class="material-icons prefix">location_on</i>
					  <input id="letra" value="<?php echo $c['letra_ef_otra']; ?>" name="letra_ef_otra" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="letra">Letra / Mano</label>
					</div>
					<div class="input-field col s12 m5">
					  <i class="material-icons prefix">location_on</i>
					  <input id="cp" value="<?php echo $c['cod_postal_ef_otra']; ?>" name="cod_postal_ef_otra" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="cp">Código postal</label>
					</div>
					<div class="input-field col s12 m6">
					  <i class="material-icons prefix">location_on</i>
					  <input id="poblacion" value="<?php echo $c['poblacion_ef_otra']; ?>" name="poblacion_ef_otra" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="poblacion">Población</label>
					</div>
					<div class="input-field col s12 m6">
					  <i class="material-icons prefix">location_on</i>
					  <input id="municipio_ps" value="<?php echo $c['municipio_ef_otra']; ?>" name="municipio_ef_otra" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="municipio_ps">Municipio</label>
					</div>
				  </div>
	  </span></div>
	</li>
	</ul>
				</div>
				<div class="input-field col s12 m12">
				<span class="card-title">Datos del Punto de Suministro</span>
				</div>
				<br>
				<div class="row">
					<div class="input-field col s12 m6">
					<i class="material-icons prefix">flash_on</i>
					<input id="suministro_cups" value="<?php echo $c['cups_luz']; ?>" onblur="valida_cups(this.value)" name="cups_luz" type="text" class="validate" style="text-transform: uppercase;">
					<label for="cups_luz">CUPS Electricidad</label>
					</div>
					<div class="input-field col s12 m6">
					<i class="material-icons prefix">local_gas_station</i>
					<input id="suministro_cups" value="<?php echo $c['cups_gas']; ?>" onblur="valida_cups(this.value)" name="cups_gas" type="text" class="validate" style="text-transform: uppercase;">
					<label for="cups_gas">CUPS Gas</label>
					</div>
					<div class="input-field col s12 m4">
					  <i class="material-icons prefix">bookmark</i>
					  <input id="cnae" value="<?php echo $c['cnae']; ?>" name="cnae" type="text" class="validate" style="text-transform: uppercase;" required>
					  <label for="cnae">CNAE</label>
					</div>
					<div class="input-field col s12 m4">
					  <i class="material-icons prefix">date_range</i>
					  <input id="fechaemision" value="<?php echo $c['fecha_venta']; ?>" name="fecha_venta" type="text" class="validate" style="text-transform: uppercase;" required>
					</div>
					<div class="input-field col s12 m4">
					  <i class="material-icons prefix">confirmation_number</i>
					  <input id="tarjeta_socia" value="<?php echo $c['tarjeta_socia']; ?>" name="tarjeta_socia" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="tarjeta_socia">Tarjeta Carrefour</label>
					</div>
					
					<!-- Solo cuando haya luz de por medio LUZ -->
					<div class="input-field col s12 m12"><span class="card-title">Suministro de electricidad</span></div>
					<!-- Maximetro -->
					<div class="input-field col s12 m6">
					  <i class="material-icons prefix">shopping_basket</i>
					  <select name="maximetro">
					   <?php if($c['maximetro'] == ''){ ?>
					   <option value="" selected>Escoge una opción</option>
					   <option value="Si">Si</option>
					   <option value="No">No</option>
					   <?php } else { ?>
					   <option value="<?php echo $c['maximetro']; ?>" selected><?php echo $c['maximetro']; ?></option>
					   <option value="Si">Si</option>
					   <option value="No">No</option>
					   <?php } ?>
					  </select>
					  <label>MAXÍMETRO</label>
					</div>
					
					<!-- Tipo alta luz -->
					<div class="input-field col s12 m6">
					<i class="material-icons prefix">shopping_basket</i>
					<select name="tipo_alta_luz">
					<?php if($c['tipo_alta_luz'] == ''){ ?>
					<option value="" selected>Escoge una opción</option>
					<option value="AD">AD</option>
					<option value="CC">CC</option>
					<option value="CC con CT">CC con CT</option>
					<option value="CC con MT">CC con MT</option>
					<option value="CC con CT y MT">CC con CT y MT</option>
					<option value="CT">CT</option>
					<option value="MT">MT</option>
					<option value="NA">NA</option>
					<option value="CT con MT">CT con MT</option>
					<?php } else { ?>
					<option value="<?php echo $c['tipo_alta_luz']; ?>" selected><?php echo $c['tipo_alta_luz']; ?></option>
					<option value="AD">AD</option>
					<option value="CC">CC</option>
					<option value="CC con CT">CC con CT</option>
					<option value="CC con MT">CC con MT</option>
					<option value="CC con CT y MT">CC con CT y MT</option>
					<option value="CT">CT</option>
					<option value="MT">MT</option>
					<option value="NA">NA</option>
					<option value="CT con MT">CT con MT</option>
					<?php } ?>
					</select>
					<label>TIPO ALTA LUZ</label>
					</div>
					
					<!-- 3 potencias de luz -->
					<div class="input-field col s12 m4">
					<i class="material-icons prefix">bookmark</i>
					<input id="p1" value="<?php echo $c['potencia_p1']; ?>" name="potencia_p1" type="text" class="validate">
					<label for="p1">POTENCIA CONTRATADA (P1)</label>
					</div>
					<div class="input-field col s12 m4">
					<i class="material-icons prefix">bookmark</i>
					<input id="p2" value="<?php echo $c['potencia_p2']; ?>" name="potencia_p2" type="text" class="validate">
					<label for="p2">POTENCIA CONTRATADA (P2)</label>
					</div>
					<div class="input-field col s12 m4">
					<i class="material-icons prefix">bookmark</i>
					<input id="p3" value="<?php echo $c['potencia_p3']; ?>" name="potencia_p3" type="text" class="validate">
					<label for="p3">POTENCIA CONTRATADA (P3)</label>
					</div>
					
					<!-- Tarifa acceso -->
					<div class="input-field col s12 m4">
					<i class="material-icons prefix">shopping_basket</i>
					<select name="tarifa_ref_luz">
					<?php if($c['tarifa_ref_luz'] == ''){ ?>
					<option value="" selected>Escoge una opción</option>
					<option value="2.0A">2.0A</option>
					<option value="2.0DHA">2.0DHA</option>
					<option value="2.1A">2.1A</option>
					<option value="2.1DHA">2.1DHA</option>
					<option value="3.0A">3.0A</option>
					<?php } else { ?>
					<option value="<?php echo $c['tarifa_ref_luz']; ?>" selected><?php echo $c['tarifa_ref_luz']; ?></option>
					<option value="2.0A">2.0A</option>
					<option value="2.0DHA">2.0DHA</option>
					<option value="2.1A">2.1A</option>
					<option value="2.1DHA">2.1DHA</option>
					<option value="3.0A">3.0A</option>
					<?php } ?>
					</select>
					<label>TARIFA DE ACCESO</label>
					</div>
					
					<!-- Descuento luz -->
					<div class="input-field col s12 m4">
					<i class="material-icons prefix">bookmark</i>
					<input id="f_luz" value="<?php echo $c['descuento_luz']; ?>" name="descuento_luz" type="text" class="validate">
					<label for="f_luz">DESCUENTO LUZ (%)</label>
					</div>
					
					<!-- Solo cuando haya gas de por medio GAS -->
					<div class="input-field col s12 m12"><span class="card-title">Suministro de gas natural</span></div>
					
					<!-- Tipo alta gas -->
					<div class="input-field col s12 m6">
					<i class="material-icons prefix">shopping_basket</i>
					<select name="tipo_alta_gas">
					<?php if($c['tipo_alta_gas'] == ''){ ?>
					<option value="" selected>Escoge un alta</option>
					<option value="AD">AD</option>
					<option value="CC">CC</option>
					<option value="CC con CT">CC con CT</option>
					<option value="CT">CT</option>
					<option value="NA">NA</option>
					<?php } else { ?>
					<option value="<?php echo $c['tipo_alta_gas']; ?>" selected><?php echo $c['tipo_alta_gas']; ?></option>
					<option value="AD">AD</option>
					<option value="CC">CC</option>
					<option value="CC con CT">CC con CT</option>
					<option value="CT">CT</option>
					<option value="NA">NA</option>
					<?php } ?>
					</select>
					<label>TIPO ALTA GAS</label>
					</div>
					
					<!-- Tarifa acceso gas -->
					<div class="input-field col s12 m6">
					<i class="material-icons prefix">shopping_basket</i>
					<select name="tarifa_ref_gas">
					<?php if($c['tarifa_ref_gas'] == ''){ ?>
					<option value="" selected>Escoge una tarifa</option>
					<option value="3.1">3.1</option>
					<option value="3.2">3.2</option>
					<option value="3.3">3.3</option>
					<option value="3.4">3.4</option>
					<?php } else { ?>
					<option value="<?php echo $c['tarifa_ref_gas']; ?>" selected><?php echo $c['tarifa_ref_gas']; ?></option>
					<option value="3.1">3.1</option>
					<option value="3.2">3.2</option>
					<option value="3.3">3.3</option>
					<option value="3.4">3.4</option>
					<?php } ?>
					</select>
					<label>TARIFA DE ACCESO</label>
					</div>
					
					<!-- Descuento gas -->
					<div class="input-field col s12 m6">
					<i class="material-icons prefix">bookmark</i>
					<input id="fgh" value="<?php echo $c['descuento_gas']; ?>" name="descuento_gas" type="text" class="validate">
					<label for="fgh">DESCUENTO GAS</label>
					</div>
					
					<!-- Producto LUZ -->
					<div class="input-field col s12 m12"><span class="card-title">Servicios</span></div>			
					
<!-- Producto LUZ -->
					<div class="input-field col s12 m12"><span class="card-title">Servicios</span></div>			
					
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
						<div class="input-field col s12 m4">
						<i class="material-icons prefix">shopping_basket</i>
						<select name="plan_destino_gas">
						  <option value="">Escoge un producto</option>
						  <option value="MARCA GAS<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>MARCA GAS<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
						</select>
						<label>Producto GAS</label>
						</div>
						
						<?php if($c['funciona'] == 'si'){ ?>
						<div class="input-field col s12 m4">
						<i class="material-icons prefix">shopping_basket</i>
						<select name="plan_destino_fun">
						  <option value="">Escoge un producto</option>
						  <option value="MARCA GAS<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>MARCA GAS<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
						</select>
						<label>Producto FUNCIONA</label>
						</div>
						<?php } ?>
						<?php } ?>
						
						<!-- Marca > Dual -->
						<?php if($c['formula2'] == 'dual'){ ?>
						<div class="input-field col s12 m4">
						<i class="material-icons prefix">shopping_basket</i>
						<select name="plan_destino_luz">
						  <option value="">Escoge un producto</option>
						  <option value="MARCA DUAL<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>MARCA DUAL<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
						</select>
						<label>Producto LUZ</label>
						</div>
						
						<div class="input-field col s12 m4">
						<i class="material-icons prefix">shopping_basket</i>
						<select name="plan_destino_gas">
						  <option value="">Escoge un producto</option>
						  <option value="MARCA DUAL<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>MARCA DUAL<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
						</select>
						<label>Producto GAS</label>
						</div>
						
						<?php if($c['funciona'] == 'si'){ ?>
						<div class="input-field col s12 m4">
						<i class="material-icons prefix">shopping_basket</i>
						<select name="plan_destino_fun">
						  <option value="">Escoge un producto</option>
						  <option value="MARCA DUAL<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>MARCA DUAL<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
						</select>
						<label>Producto FUNCIONA</label>
						</div>
						<?php } ?>
						<?php } ?>
					<?php } ?>
					
					<?php if($c['formula'] == 'planahorro'){ ?>
						<div class="input-field col s12 m4">
						<i class="material-icons prefix">shopping_basket</i>
						<select name="plan_destino_luz">
						  <option value="">Escoge un producto</option>
						  <option value="FORMULA AHORRO DUAL<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA AHORRO DUAL<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
						</select>
						<label>Producto LUZ</label>
						</div>
						
						<div class="input-field col s12 m4">
						<i class="material-icons prefix">shopping_basket</i>
						<select name="plan_destino_gas">
						  <option value="">Escoge un producto</option>
						  <option value="FORMULA AHORRO DUAL<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA AHORRO DUAL<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
						</select>
						<label>Producto GAS</label>
						</div>
						
						<?php if($c['funciona'] == 'si'){ ?>
						<div class="input-field col s12 m4">
						<i class="material-icons prefix">shopping_basket</i>
						<select name="plan_destino_fun">
						  <option value="">Escoge un producto</option>
						  <option value="FORMULA AHORRO DUAL<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA AHORRO DUAL<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
						</select>
						<label>Producto FUNCIONA</label>
						</div>
						<?php } ?>
					<?php } ?>
					
					<?php if($c['formula'] == 'dual'){ ?>
						<div class="input-field col s12 m4">
						<i class="material-icons prefix">shopping_basket</i>
						<select name="plan_destino_luz">
						  <option value="FORMULA GAS+LUZ<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA GAS+LUZ<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
						</select>
						<label>Producto LUZ</label>
						</div>
						
						<div class="input-field col s12 m4">
						<i class="material-icons prefix">shopping_basket</i>
						<select name="plan_destino_gas">
						  <option value="FORMULA GAS+LUZ<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA GAS+LUZ<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
						</select>
						<label>Producto GAS</label>
						</div>
						
						
						<?php if($c['funciona'] == 'si'){ ?>
						<div class="input-field col s12 m4">
						<i class="material-icons prefix">shopping_basket</i>
						<select name="plan_destino_fun">
						  <option value="FORMULA GAS+LUZ<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA GAS+LUZ<?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
						</select>
						<label>Producto FUNCIONA</label>
						</div>
						<?php } ?>
					<?php } ?>
					
					<?php if($c['formula'] == 'gas'){ ?>
						<div class="input-field col s12 m6">
						<i class="material-icons prefix">shopping_basket</i>
						<select name="plan_destino_gas">
						  <option value="FORMULA GAS <?php echo strtoupper($c['tipo_contrato']); ?><?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA GAS <?php echo strtoupper($c['tipo_contrato']); ?> <?php if($c['funciona'] == 'si'){ echo 'CON FUNCIONA'; } ?></option>
						</select>
						<label>Producto GAS</label>
						</div>
						
						<?php if($c['funciona'] == 'si'){ ?>
						<div class="input-field col s12 m6">
						<i class="material-icons prefix">shopping_basket</i>
						<select name="plan_destino_fun">
						  <option value="FORMULA GAS <?php echo strtoupper($c['tipo_contrato']); ?><?php if($c['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA GAS <?php echo strtoupper($c['tipo_contrato']); ?> <?php if($c['funciona'] == 'si'){ echo 'CON FUNCIONA'; } ?></option>
						</select>
						<label>Producto FUNCIONA</label>
						</div>
						<?php } ?>
					<?php } ?>				
					
					<!-- Opción clima -->
					<div class="input-field col s12 m4">
					<i class="material-icons prefix">wb_sunny</i>
					<select name="contrata_opcion_clima">
					  <?php if($c['contrata_opcion_clima'] == ''){ ?>
					  <option value="" selected>Escoge una opción</option>
					  <option value="SI">Sí</option>
					  <option value="NO">No</option>
					  <?php } else { ?>
					  <option value="<?php echo $c['contrata_opcion_clima']; ?>" selected><?php echo $c['contrata_opcion_clima']; ?></option>
					  <option value="SI">Sí</option>
					  <option value="NO">No</option>
					  <?php } ?>
					</select>
					<label>Opción Clima</label>
					</div>
					<div class="input-field col s12 m4">
					  <i class="material-icons prefix">wb_sunny</i>
					  <input id="clima" value="<?php echo $c['marca_aparato_climatizacion']; ?>" name="marca_aparato_climatizacion" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="clima">Marca Equipo Climatización</label>
					</div>
					<div class="input-field col s12 m4">
					  <i class="material-icons prefix">wb_sunny</i>
					  <input id="caldera" value="<?php echo $c['marca_caldera']; ?>" name="marca_caldera" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="caldera">Marca Caldera/Calentador</label>
					</div>
					<div class="col s12 m12">
					  <div class="card #263238 blue-grey darken-4">
						<div class="card-content white-text">
						  <span class="card-title">Motivo modificación del contrato</span>
						  <textarea id="textarea1" name="edited_contract_reason" class="materialize-textarea validate" style="color: #fff !important;" required><?php echo $c['edited_contract_reason']; ?></textarea>
						</div>
					  </div>
					</div>
					<div class="col s12 m12">
					  <button class="btn waves-effect waves-light" type="submit" name="editar_contrato" style="background: #444;width: 100%;">Guardar cambios
						<i class="material-icons right">send</i>
					  </button>
					</div>
			  </div>
            </div>
          </div>
        </div>
		</form>
	</div>
<?php } ?>