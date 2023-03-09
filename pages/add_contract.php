<?php

	function utf16_2_utf8 ($nowytekst) {
        $nowytekst = str_replace('%u0104','Ą',$nowytekst);    //Ą
        $nowytekst = str_replace('%u0106','Ć',$nowytekst);    //Ć
        $nowytekst = str_replace('%u0118','Ę',$nowytekst);    //Ę
        $nowytekst = str_replace('%u0141','Ł',$nowytekst);    //Ł
        $nowytekst = str_replace('%u0143','Ń',$nowytekst);    //Ń
        $nowytekst = str_replace('%u00D3','Ó',$nowytekst);    //Ó
        $nowytekst = str_replace('%u015A','Ś',$nowytekst);    //Ś
        $nowytekst = str_replace('%u0179','Ź',$nowytekst);    //Ź
        $nowytekst = str_replace('%u017B','Ż',$nowytekst);    //Ż
        $nowytekst = str_replace('Ã‘','Ñ',$nowytekst);   	  //Ñ
       
        $nowytekst = str_replace('%u0105','ą',$nowytekst);    //ą
        $nowytekst = str_replace('%u0107','ć',$nowytekst);    //ć
        $nowytekst = str_replace('%u0119','ę',$nowytekst);    //ę
        $nowytekst = str_replace('%u0142','ł',$nowytekst);    //ł
        $nowytekst = str_replace('%u0144','ń',$nowytekst);    //ń
        $nowytekst = str_replace('%u00F3','ó',$nowytekst);    //ó
        $nowytekst = str_replace('%u015B','ś',$nowytekst);    //ś
        $nowytekst = str_replace('%u017A','ź',$nowytekst);    //ź
        $nowytekst = str_replace('%u017C','ż',$nowytekst);    //ż
   return ($nowytekst);
   }

if (isset($_POST['add_contract'])) {
	// Datos del Cliente
	//$fecha_venta = $_POST['fecha_venta'];
	$fecha_ventaorg = $_POST["fecha_venta"];
	$fecha_venta = date("d/m/Y", strtotime($fecha_ventaorg));
	$codigo_comercial = $_POST["codigo_comercial"];
	$tarjeta_socia = $_POST["tarjeta_socia"];
	$cod_verificacion = str_replace("V", "", $_POST["cod_verificacion"]); //Substituye los / por un campo vacío
	$cod_verificacion_posterior = $_GET['codv'];
	$vers_funciona = $_POST["vers_funciona"];
	$modal_funciona = $_POST["modal_funciona"];
	$fecha_we = $_POST["fecha_we"];
	$we_dia = substr($fecha_we, 0, 2);
	$we_mes = substr($fecha_we, 3, 2);
	$we_ano = substr($fecha_we, 6, 4);
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
	$apellidos_titular = str_replace("'", "", strtoupper($_POST["apellidos_titular"]));
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
	$calle_ef_otra = strtoupper(addslashes($_POST["calle_ef_otra"]));
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
	$maximetro = strtoupper($_POST["maximetro"]);
	$tipo_alta_luz = $_POST["tipo_alta_luz"];
	$potencia_p1 = str_replace(",", ".", $_POST["potencia_p1"]);
	$potencia_p2 = str_replace(",", ".", $_POST["potencia_p2"]);
	$potencia_p3 = str_replace(",", ".", $_POST["potencia_p3"]);
	$precio_luz_edp = $_POST["precio_luz_edp"];
	$tarifa_ref_luz = strtoupper($_POST["tarifa_ref_luz"]);
	//$descuento_luz = $_POST["descuento_luz"];
	$descuento_luz = str_replace(array(",","."), array("", ""), $_POST["descuento_luz"]);
	
	// Suministro de gas natural
	$tipo_alta_gas = $_POST["tipo_alta_gas"];
	$precio_gas_edp = $_POST["precio_gas_edp"];
	$tarifa_ref_gas = str_replace(",", ".", $_POST["tarifa_ref_gas"]);
	//$descuento_gas = $_POST["descuento_gas"];
	$descuento_gas = str_replace(",", ".", $_POST["descuento_gas"]);
	
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
	
	$error = "0";
		// ALERTAS > CÓDIGO DE VERIFICACIÓN
		$verificacion_verify = mysql_query("SELECT * FROM alerts WHERE verificacion='$cod_verificacion' LIMIT 1");
		$verificacion_fetch = mysql_fetch_assoc($verificacion_verify);
		// ALERTAS > DNI TITULAR
		$alert_verify = mysql_query("SELECT * FROM alerts WHERE nif='$dni_cif_titular' LIMIT 1");
		$alert_fetch = mysql_fetch_assoc($alert_verify);
		// ALERTAS > CÓDIGO DE COMERCIAL
		$alertx_verify = mysql_query("SELECT * FROM alerts WHERE codigo_comercial='$codigo_comercial' LIMIT 1");
		$alertx_fetch = mysql_fetch_assoc($alertx_verify);
		if($cod_verificacion == ''){} else {
			if (mysql_num_rows($verificacion_verify) == 1) {
			$error = "1";
			$mensaje = "
			<script>swal(
			  'BLOQ. CÓD. VERIFICACIÓN',
			  '". Filter($verificacion_fetch[nota]) ."',
			  'error'
			)</script>
			";
			}
		}
		if($dni_cif_titular == ''){} else {
			if (mysql_num_rows($alert_verify) == 1) {
			$error = "1";
			$mensaje = "
			<script>swal(
			  'BLOQ. DNI TITULAR',
			  '". Filter($alert_fetch[nota]) ."',
			  'error'
			)</script>
			";
			}
		}
		if($codigo_comercial == ''){} else {
			if (mysql_num_rows($alertx_verify) == 1) {
			$error = "1";
			$mensaje = "
			<script>swal(
			  'BLOQ. CÓDIGO COMERCIAL',
			  '". Filter($alertx_fetch[nota]) ."',
			  'error'
			)</script>
			";
			}
		}
		if($error == "0"){
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
				// Obtener C.I.G automático
				$cig = "118". date(y) . date(m) . date(d) ."1". $nnuummeerroo ."";
				//echo '<meta http-equiv="refresh" content="0;url='. $config[site] .'/index.php?page=new_cig&cig='. $cig .'" />';
		$Var = mysql_query("SELECT * FROM contratos_provincias WHERE codigo_postal='". substr($cod_postal_ps, 0, 2) ."'");$cp_ps = mysql_fetch_assoc($Var);
	//mysql_query("INSERT INTO historial (type,user,date) VALUES ('new_contract','$user[username]','". date('Y-m-d') ."')");
	mysql_query("INSERT INTO cigs (num,fecha,user_intro) VALUES ('$numero','". date(d) ."/". date(m) ."/". date(Y) ." ". date(H) .":". date(i) .":". date(s) ."','$user[username]')");
	//mysql_query("INSERT INTO contratos_estado_historial (type,contrato_id,user,fecha,estado) VALUES ('contrato','$ultimocontrato','$user[username]','". date('d') ."-". date('m') ."-". date('Y') ."','INTRODUCIDO')");
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
	we_dia,we_mes,we_ano,impl_explicito,consumo_pyme,intro_dia,intro_mes,intro_ano) VALUES (
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
	'$cod_postal_ps','$poblacion_ps','$cp_ps[provincia]',
	'$cups_luz','$cups_gas','$cnae',
	'$maximetro','$tipo_alta_luz','$potencia_p1',
	'$potencia_p2','$potencia_p3','$precio_luz_edp',
	'$tarifa_ref_luz','$descuento_luz','$tipo_alta_gas',
	'$precio_gas_edp','$tarifa_ref_gas','$descuento_gas',
	'$plan_destino_luz','$plan_destino_gas','$plan_destino_fun',
	'$tipo_de_funciona','$contrata_opcion_clima','$marca_caldera',
	'$marca_aparato_climatizacion','$ccc_1','$ccc_2',
	'$ccc_3','$ccc_4','$tarjeta_socia','$cod_verificacion','$cod_verificacion_posterior','$cig',
	'". Filter($_GET[tipo_contrato]) ."','". Filter($_GET[formula]) ."','". Filter($_GET[funciona]) ."','". Filter($_GET[formula2]) ."',
	'$vers_funciona','$modal_funciona','$user[username]','". time() ."',
	'$we_dia','$we_mes','$we_ano','$impl_explicito','$consumo_pyme','$intro_dia','$intro_mes','$intro_ano')");
	//https://68.media.tumblr.com/2e6f6eb92803f7239799394fe7b0c3c8/tumblr_nm6f8ogyO71rvfm5no1_1280.gif
	
	$xddvx = mysql_query("SELECT * FROM contratos WHERE cig='$cig'");$xdcig = mysql_fetch_assoc($xddvx);
	echo "
	<script>
    sweetAlert({
      title:'¡Enhorabuena!',
      html: 'El cig generado es &#187; <a href=". $site ."/index.php?page=edit_contract_id&id=". $xdcig[id] ."><b>$cig</b></a>', 
	  confirmButtonText: 'Continuar',
    },function(isConfirm){
      alert('ok');
    });
    $('.swal2-confirm').click(function(){
	  window.location.href = 'index.php?page=add_contract';
    });
	</script>
	";
	
	//echo "
	//<script>
    //sweetAlert({
    //  title:'¡Enhorabuena!',
    //  html: 'El cig generado es &#187; <b>$cig</b>', 
	//  imageUrl: '$config[site]/images/explosion-de-confeti-gif-10.gif',
	//  imageWidth: 200,
	//  imageHeight: 200,
	//  confirmButtonText: 'Continuar',
    //},function(isConfirm){
    //  alert('ok');
    //});
    //$('.swal2-confirm').click(function(){
	//  window.location.href = 'index.php?page=add_contract';
    //});
	//</script>
	//";
	//echo '
	//<script>
	//$(document).ready(function () {
	//	window.setTimeout(function () {
	//		location.href = "'. $config[site] .'/index.php?page=new_cig&cig='. $cig .'";
	//	}, 0000);
	//});
	//</script>
	//';
		}
}
?>

<div style="visibility: hidden;position: absolute;"><?php echo $nnuummeerroo; ?></div>
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
	<?php echo $mensaje; ?>
	  <div class="col s12 m6">
		<a href="<?php echo $site; ?>/index.php?page=<?php echo Filter($_GET['page']); ?>&tipo_contrato=NEGOCIOS" class="waves-effect waves-light btn" style="width: 100%;<?php if($_GET['tipo_contrato'] == 'NEGOCIOS'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>"><i class="material-icons right">store</i>Negocios</a>
	  </div>
	  <div class="col s12 m6">
		<a href="<?php echo $site; ?>/index.php?page=<?php echo Filter($_GET['page']); ?>&tipo_contrato=HOGARES" class="waves-effect waves-light btn" style="width: 100%;<?php if($_GET['tipo_contrato'] == 'HOGARES'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>"><i class="material-icons right">home</i>Hogares</a>
	  </div>
	  <br><br>
	<?php if($_GET['tipo_contrato']) { ?>
	  <div class="col s12 m1">
		<a href="<?php echo $site; ?>/index.php?page=<?php echo Filter($_GET['page']); ?>&tipo_contrato=<?php echo strtoupper($_GET['tipo_contrato']); ?>&formula=luz" class="waves-effect waves-light btn" style="width: 100%;padding: 0;<?php if($_GET['formula'] == 'luz'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>">Luz</a>
	  </div>
	  <div class="col s12 m2">
		<a href="<?php echo $site; ?>/index.php?page=<?php echo Filter($_GET['page']); ?>&tipo_contrato=<?php echo strtoupper($_GET['tipo_contrato']); ?>&formula=marca" class="waves-effect waves-light btn" style="width: 100%;<?php if($_GET['formula'] == 'marca'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>">Carrefour</a>
	  </div>
	  <div class="col s12 m1">
		<a href="<?php echo $site; ?>/index.php?page=<?php echo Filter($_GET['page']); ?>&tipo_contrato=<?php echo strtoupper($_GET['tipo_contrato']); ?>&formula=gas" class="waves-effect waves-light btn" style="width: 100%;padding: 0;<?php if($_GET['formula'] == 'gas'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>">Gas</a>
	  </div>
	  <div class="col s12 m2">
		<a href="<?php echo $site; ?>/index.php?page=<?php echo Filter($_GET['page']); ?>&tipo_contrato=<?php echo strtoupper($_GET['tipo_contrato']); ?>&formula=dual" class="waves-effect waves-light btn" style="width: 100%;padding: 0;<?php if($_GET['formula'] == 'dual'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>">Dual</a>
	  </div>
	  <div class="col s12 m3">
		<a href="<?php echo $site; ?>/index.php?page=<?php echo Filter($_GET['page']); ?>&tipo_contrato=<?php echo strtoupper($_GET['tipo_contrato']); ?>&formula=maxahorro" class="waves-effect waves-light btn" style="width: 100%;<?php if($_GET['formula'] == 'maxahorro'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>">MÁXIMO AHORRO</a>
	  </div>
	  <div class="col s12 m3">
		<a href="<?php echo $site; ?>/index.php?page=<?php echo Filter($_GET['page']); ?>&tipo_contrato=<?php echo strtoupper($_GET['tipo_contrato']); ?>&formula=planahorro" class="waves-effect waves-light btn" style="width: 100%;<?php if($_GET['formula'] == 'planahorro'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>">PLAN AHORRO</a>
	  </div>
	  <?php if($_GET['tipo_contrato'] == 'NEGOCIOS'){ ?>
	  <div class="col s12 m12">
		<a href="<?php echo $site; ?>/index.php?page=<?php echo Filter($_GET['page']); ?>&tipo_contrato=<?php echo strtoupper($_GET['tipo_contrato']); ?>&formula=compromisoluz" class="waves-effect waves-light btn" style="width: 100%;<?php if($_GET['formula'] == 'compromisoluz'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>">COMPROMISO LUZ</a>
	  </div>
	  <?php } ?>
	  <?php if($_GET['formula'] == 'marca') { ?>
	  <br><br>
	  <div class="col s12 m4">
		<a href="<?php echo $site; ?>/index.php?page=<?php echo $_GET['page']; ?>&tipo_contrato=<?php echo strtoupper($_GET['tipo_contrato']); ?>&formula=<?php echo $_GET['formula']; ?>&formula2=luz" class="waves-effect waves-light btn" style="width: 100%;<?php if($_GET['formula2'] == 'luz'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>">Luz</a>
	  </div>
	  <div class="col s12 m4">
		<a href="<?php echo $site; ?>/index.php?page=<?php echo $_GET['page']; ?>&tipo_contrato=<?php echo strtoupper($_GET['tipo_contrato']); ?>&formula=<?php echo $_GET['formula']; ?>&formula2=gas" class="waves-effect waves-light btn" style="width: 100%;<?php if($_GET['formula2'] == 'gas'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>">Gas</a>
	  </div>
	  <div class="col s12 m4">
		<a href="<?php echo $site; ?>/index.php?page=<?php echo $_GET['page']; ?>&tipo_contrato=<?php echo strtoupper($_GET['tipo_contrato']); ?>&formula=<?php echo $_GET['formula']; ?>&formula2=dual" class="waves-effect waves-light btn" style="width: 100%;<?php if($_GET['formula2'] == 'dual'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>">Dual</a>
	  </div>
	  <?php } ?>
		<br><br>
		<?php if($_GET['formula']){ ?>
	  <div class="col s12 m6">
		<a href="<?php echo $site; ?>/index.php?page=<?php echo $_GET['page']; ?>&tipo_contrato=<?php echo strtoupper($_GET['tipo_contrato']); ?>&formula=<?php echo $_GET['formula']; ?>&formula2=<?php echo $_GET['formula2']; ?>&funciona=si&codv=verificacion" class="waves-effect waves-light btn" style="width: 100%;<?php if($_GET['funciona'] == 'si'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>">Con funciona</a>
	  </div>
	  <div class="col s12 m6">
		<a href="<?php echo $site; ?>/index.php?page=<?php echo $_GET['page']; ?>&tipo_contrato=<?php echo strtoupper($_GET['tipo_contrato']); ?>&formula=<?php echo $_GET['formula']; ?>&formula2=<?php echo $_GET['formula2']; ?>&funciona=no&codv=verificacion" class="waves-effect waves-light btn" style="width: 100%;<?php if($_GET['funciona'] == 'no'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>">Sin funciona</a>
	  </div>
	    <?php } ?>
	  <?php if($_GET['funciona']){ ?>
	  <div class="col s12 m6">
		<a href="<?php echo $site; ?>/index.php?page=<?php echo $_GET['page']; ?>&tipo_contrato=<?php echo strtoupper($_GET['tipo_contrato']); ?>&formula=<?php echo $_GET['formula']; ?>&formula2=<?php echo $_GET['formula2']; ?>&funciona=<?php echo $_GET['funciona']; ?>&codv=posterior" class="waves-effect waves-light btn" style="width: 100%;<?php if($_GET['codv'] == 'posterior'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>">Código de Verificación <b>Posterior</b></a>
	  </div>
	  <div class="col s12 m6">
		<a href="<?php echo $site; ?>/index.php?page=<?php echo $_GET['page']; ?>&tipo_contrato=<?php echo strtoupper($_GET['tipo_contrato']); ?>&formula=<?php echo $_GET['formula']; ?>&formula2=<?php echo $_GET['formula2']; ?>&funciona=<?php echo $_GET['funciona']; ?>&codv=verificacion" class="waves-effect waves-light btn" style="width: 100%;<?php if($_GET['codv'] == 'verificacion'){ echo 'background: #9C213C;'; }else{ echo'background: #444;'; } ?>">Código de <b>Verificación</b></a>
	  </div>
	  <?php } ?>
	  <div class="col s12 m12">
	  <p class="light white-text center" style="background: #9C213C;"><b style="text-transform: uppercase;"><?php echo strtoupper($_GET['tipo_contrato']); ?></b> <?php if($_GET['formula'] == ''){ echo '<br>Por favor, selecciona un tipo de contrato...'; } else { ?>&#187; Has seleccionado un contrato de tipo <b style="text-transform: uppercase;"><?php echo $_GET['formula']; ?></b> <?php if($_GET['formula2'] == '') {}else{ echo '('. $_GET[formula2] .')'; } ?><?php } ?> <?php if($_GET['funciona'] == 'no'){ echo 'sin funciona'; } elseif($_GET['funciona'] == 'si') { echo 'CON FUNCIONA'; } else {}  ?></p>
	  </div>
	  <?php if($_GET['codv']){ // Contrato tipo ?>
	  <a target="_blank" style="position: fixed;margin-left: 44px;color: #fff;background: #9c213c;padding: 20px;" href="#" onclick="this.href='https://www.codigospostales.com/' +document.getElementById('cp').value;somefunction(this, event); return true;">Ver zona</a>
		<form method="POST">
		<div class="col s12 m12">
          <div class="card">
            <div class="card-content black-text">		  
			  <div class="input-field col s12 m12">
				<select class="browser-default" name="subgerente2" required>
				  <option value="" disabled>Selecciona un subgerente</option>
				  <?php $Var = mysql_query("SELECT * FROM contratos WHERE user_contrato_intro='$user[username]' ORDER BY id DESC LIMIT 1");$last_subgerencia_user = mysql_fetch_assoc($Var); ?>
					<option value="<?php echo $last_subgerencia_user['subgerente2']; ?>" selected><?php echo $last_subgerencia_user['subgerente2']; ?></option>
					<?php $gg_sql = mysql_query("SELECT * FROM click_gerentes_introductores ORDER BY subgerente"); while($g = mysql_fetch_assoc($gg_sql)){ ?>
					<option value="<?php echo $g['subgerente']; ?>"><?php echo $g['subgerente']; ?></option>
					<?php } ?>
				</select>
			  </div>
			  <span class="card-title" style="font-weight: bold;">Validador de cuenta bancaria</span>
			  <div class="input-field col s12 m3">
			    <input type="text" id="entidad" name="ccc_1" pattern="[0-9]{4}" onkeyup="if (this.value.length == this.getAttribute('maxlength')) oficina.focus()" placeholder="Entidad" class="validate" maxlength="4" data-length="4" required>
			    <label for="Entidad">Entidad</label>
			  </div>
			  <div class="input-field col s12 m2">
			    <input type="text" id="oficina" name="ccc_2" pattern="[0-9]{4}" onkeyup="if (this.value.length == this.getAttribute('maxlength')) dc.focus()" placeholder="oficina" class="validate" maxlength="4" data-length="4" required>
			    <label for="oficina">Oficina</label>
			  </div>
			  <div class="input-field col s12 m2">
			    <input type="text" id="dc" name="ccc_3" pattern="[0-9]{2}" placeholder="dc" onkeyup="if (this.value.length == this.getAttribute('maxlength')) ncuenta.focus()" class="validate" maxlength="2" data-length="2" required>
			    <label for="dc">DC</label>
			  </div>
			  <div class="input-field col s12 m3">
			    <input type="text" id="ncuenta" name="ccc_4" pattern="[0-9]{10}" onkeyup="if (this.value.length == this.getAttribute('maxlength')) ncuenta.focus()" placeholder="N&uacute;mero de cuenta" class="validate" maxlength="10" data-length="10" required>
			    <label for="ncuenta">ncuenta</label>
			  </div>
			  <div class="input-field col s12 m2">
			  	<input type="button" style="width: 100%;background: #444;" class="btn" onclick="validaycalculaIBAN();" value="Validar"/>
			  </div>
			  <div class="input-field col s12 m12">
				<span class="card-title" style="font-weight: bold;">Datos esenciales</span>
			  </div>
					<div class="input-field col s12 m4">
					  <i class="material-icons prefix">voicemail</i>
					  <div id="resultadoCV" style="position: absolute;margin-top: -29px"></div>
					  <input autocomplete="off" onKeyUp="codverificacion();" id="busquedaCV" name="cod_verificacion" pattern="[0-9]{14}" type="text" class="validate" style="text-transform: uppercase;" maxlength="14" data-length="14" required>
					  <label for="cod_verificacion">Código de Verificación</label>
					</div>
					<div class="input-field col s12 m3">
					  <i class="material-icons prefix">face</i>
					  <input autocomplete="off" onKeyUp="buscar();" id="busqueda" id="codigo_comercial" name="codigo_comercial" pattern="[0123456789]{5}" type="text" class="validate" maxlength="5" data-length="5" style="text-transform: uppercase;" required>
					  <label for="codigo_comercial">Código de comercial</label>
					</div>
					
					<!--div class="input-field col s12 m3">
					  
					  <div id="VERIFY_CIG" style="position: absolute;"></div>
					  <input id="cig_verify" value="<?php echo '118' . date('y') . date('m') . date('d') . '1'; ?><?php if (mysql_num_rows($Var) == 0) {
    echo '001';
	$nnuummeerroo = '00' . $numero;
} elseif($n[num] <= 9){
	echo '00' . $numero;
	$nnuummeerroo = '00' . $numero;
} elseif($numero <= 99){
	echo '0' . $numero;
	$nnuummeerroo = '0' . $numero;
} else {
	echo $numero;
	$nnuummeerroo = $numero;
} ?>" pattern="[0-9]{13}" value="" type="text" class="validate" style="text-transform: uppercase;" maxlength="13" data-length="13" required>

					  <label for="cod_venta_espontanea">C.I.G</label>
					</div-->
					<!--div class="input-field col s12 m1">
					  <button type="button" class="btn verificar_btn_cig" name="submit" onclick="vcig(getElementById('cig_verify').value);"><i class="material-icons">remove_red_eye</i></button>
					</div-->
					<div class="input-field col s12 m5">
						<select class="browser-default" name="impl_explicito" required>
						  <option value="" disabled selected>Consentimiento expl.</option>
						  <option value="SI">SI</option>
						  <option value="NO">NO</option>
						</select>
					</div>

					<div class="input-field col s12 m12">
					  <i class="material-icons prefix">date_range</i>
					  <input id="fechawe" value="<?php echo $last_subgerencia_user['we_dia']; ?>/<?php echo $last_subgerencia_user['we_mes']; ?>/<?php echo $last_subgerencia_user['we_ano']; ?>" autocomplete="off" name="fecha_we" type="text" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" class="datepicker validate">
					  <label for="fechawe">FECHA WE FORMATO DD/MM/YYYY</label>
					</div>
					 <?php if($_GET['tipo_contrato'] == 'NEGOCIOS'){ ?>
					<div class="input-field col s12 m6">
					  <input id="consumo_pyme" name="consumo_pyme" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="consumo_pyme">CONSUMO PYME</label>
					</div>
					  <?php } ?>
			  <div class="input-field col s12 m12">
			  <span class="card-title" style="font-weight: bold;">Datos del Cliente</span>
			  </div>
			  <div class="row">
				<div class="col s12 m12">
				  <div class="row">
					<div class="input-field col s12 m6">
					  <i class="material-icons prefix">account_box</i>
					  <input id="nombre" name="nombre_titular" type="text" class="validate" style="text-transform: uppercase;" required>
					  <label for="nombre">Nombre / Razón Social</label>
					</div>
					<div class="input-field col s12 m6">
					  <i class="material-icons prefix">account_box</i>
					  <input id="apellido" name="apellidos_titular" type="text" class="validate" style="text-transform: uppercase;" required>
					  <label for="apellido">Apellidos</label>
					</div>
					<div class="input-field col s12 m6">
					  <i class="material-icons prefix">subtitles</i><!-- DNI > pattern="(([X-Z]{1})([-]?)(\d{7})([-]?)([A-Z]{1}))|((\d{8})([-]?)([A-Z]{1}))" -->
					  <input id="dni" name="dni_cif_titular" maxlength="9" data-length="9" onblur="nifuno(this.value)" type="text" class="validate" required>
					  <label for="dni">DNI / NIE / CIF</label>
					</div>
					<div class="input-field col s12 m3">
					  <i class="material-icons prefix">phone_iphone</i>
					  <input id="telf1" name="telefono_pref_1" type="tel" class="validate" pattern="[0-9]{9}" style="text-transform: uppercase;" required>
					  <label for="telf1">Teléfono 1</label>
					</div>
					<div class="input-field col s12 m3">
					  <i class="material-icons prefix">phone_iphone</i>
					  <input id="telf2" name="telefono_pref_2" type="tel" class="validate" pattern="[0-9]{9}" style="text-transform: uppercase;">
					  <label for="telf2">Teléfono 2</label>
					</div>
					<div class="input-field col s12 m12">
					  <i class="material-icons prefix">email</i>
					  <input id="testemail" name="correo_electron" type="email" class="validate" style="text-transform: uppercase;">
					  <label for="x">Correo electrónico</label>
					</div>
				  </div>
				</div>
				<div class="input-field col s12 m12">
				<span class="card-title" style="font-weight: bold;">Datos del Representante</span>
				</div>
				<div class="col s12 m12">
				  <div class="row">
					<div class="input-field col s12 m6">
					  <i class="material-icons prefix">account_box</i>
					  <input id="nombre" name="representante_nombre" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="nombre">Nombre</label>
					</div>
					<div class="input-field col s12 m6">
					  <i class="material-icons prefix">account_box</i>
					  <input id="apellido" name="representante_apellidos" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="apellido">Apellidos</label>
					</div>
					<div class="input-field col s12 m6">
					  <i class="material-icons prefix">subtitles</i>
					  <input id="dni" name="dni_cif_representante" maxlength="9" data-length="9" onblur="nif(this.value)" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="dni">DNI / NIE / CIF</label>
					</div>
					<div class="input-field col s12 m6">
					<select class="browser-default" name="relacion_representante_titular">
					  <option value="" selected>Relación con Cliente</option>
					  <option value="Cónyuge/pareja registrada">Cónyuge/pareja registrada</option>
					  <option value="Ascendiente/descendiente">Ascendiente/descendiente</option>
					  <option value="Apoderado">Apoderado</option>
					</select>
					</div>
				  </div>
				</div>
				<div class="input-field col s12 m12">
				<span class="card-title" style="font-weight: bold;">Direcciones</span>
				<ul class="collapsible expandable">
    <li class="active">
      <div class="collapsible-header"><i class="material-icons">star</i>Punto de Suministro</div>
      <div class="collapsible-body"><span>
		<div class="row">
		<div class="input-field col s12 m4">
					  <i class="material-icons prefix">location_on</i>
					  <input id="tipo_via_ps" name="tipo_via_ps" type="text" class="validate" style="text-transform: uppercase;" required>
					  <label for="tipo_via_ps">Tipo de vía</label>
					</div>
					<div class="input-field col s12 m6">
					  <i class="material-icons prefix">location_on</i>
					  <input id="calle" name="calle_ps" type="text" class="validate" style="text-transform: uppercase;" required>
					  <label for="calle">Dirección</label>
					</div>
					<div class="input-field col s12 m2">
					  <i class="material-icons prefix">location_on</i>
					  <input id="ndupl" name="numero_ps" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="ndupl">Nº / Dupl</label>
					</div>
					<div class="input-field col s12 m2">
					  <i class="material-icons prefix">location_on</i>
					  <input id="escalera" name="escalera_ps" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="escalera">Esc.</label>
					</div>
					<div class="input-field col s12 m2">
					  <i class="material-icons prefix">location_on</i>
					  <input id="piso" name="piso_ps" type="text" class="validate" value="#" style="text-transform: uppercase;" required>
					  <label for="piso">Piso</label>
					</div>
					<div class="input-field col s12 m3">
					  <i class="material-icons prefix">location_on</i>
					  <input id="letra" name="letra_ps" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="letra">Letra / Mano</label>
					</div>
					<div class="input-field col s12 m5">
					  <i class="material-icons prefix">location_on</i>
					  <input id="cp" name="cod_postal_ps" type="text" class="validate" style="text-transform: uppercase;" required>
					  <label for="cp">Código postal</label>
					</div>
					<div class="input-field col s12 m12">
					  <i class="material-icons prefix">location_on</i>
					  <input id="poblacion" name="poblacion_ps" type="text" class="validate" style="text-transform: uppercase;" required>
					  <label for="poblacion">Población</label>
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
					  <input id="cliente_tipo_via_otra" name="cliente_tipo_via_otra" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="cliente_tipo_via_otra">Tipo de vía</label>
					</div>
					<div class="input-field col s12 m6">
					  <i class="material-icons prefix">location_on</i>
					  <input id="calle" name="cliente_calle_otra" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="calle">Dirección</label>
					</div>
					<div class="input-field col s12 m2">
					  <i class="material-icons prefix">location_on</i>
					  <input id="ndupl" name="cliente_numero_otra" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="ndupl">Nº / Dupl</label>
					</div>
					<div class="input-field col s12 m2">
					  <i class="material-icons prefix">location_on</i>
					  <input id="escalera" name="cliente_escalera_otra" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="escalera">Esc.</label>
					</div>
					<div class="input-field col s12 m2">
					  <i class="material-icons prefix">location_on</i>
					  <input id="piso" name="cliente_piso_otra" type="text" value="#" class="validate" style="text-transform: uppercase;">
					  <label for="piso">Piso</label>
					</div>
					<div class="input-field col s12 m3">
					  <i class="material-icons prefix">location_on</i>
					  <input id="letra" name="cliente_letra_otra" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="letra">Letra / Mano</label>
					</div>
					<div class="input-field col s12 m5">
					  <i class="material-icons prefix">location_on</i>
					  <input id="cp" name="cliente_cod_postal_otra" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="cp">Código postal</label>
					</div>
					<div class="input-field col s12 m6">
					  <i class="material-icons prefix">location_on</i>
					  <input id="poblacion" name="cliente_poblacion_otra" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="poblacion">Población</label>
					</div>
					<div class="input-field col s12 m6">
					  <i class="material-icons prefix">location_on</i>
					  <input id="municipio_ps" name="cliente_municipio_otra" type="text" class="validate" style="text-transform: uppercase;">
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
					  <input id="tipo_via_ef_otra" name="tipo_via_ef_otra" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="tipo_via_ef_otra">Tipo de vía</label>
					</div>
					<div class="input-field col s12 m6">
					  <i class="material-icons prefix">location_on</i>
					  <input id="calle" name="calle_ef_otra" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="calle">Dirección</label>
					</div>
					<div class="input-field col s12 m2">
					  <i class="material-icons prefix">location_on</i>
					  <input id="ndupl" name="numero_ef_otra" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="ndupl">Nº / Dupl</label>
					</div>
					<div class="input-field col s12 m2">
					  <i class="material-icons prefix">location_on</i>
					  <input id="escalera" name="escalera_ef_otra" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="escalera">Esc.</label>
					</div>
					<div class="input-field col s12 m2">
					  <i class="material-icons prefix">location_on</i>
					  <input id="piso" name="piso_ef_otra" type="text" value="#" class="validate" style="text-transform: uppercase;">
					  <label for="piso">Piso</label>
					</div>
					<div class="input-field col s12 m3">
					  <i class="material-icons prefix">location_on</i>
					  <input id="letra" name="letra_ef_otra" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="letra">Letra / Mano</label>
					</div>
					<div class="input-field col s12 m5">
					  <i class="material-icons prefix">location_on</i>
					  <input id="cp" name="cod_postal_ef_otra" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="cp">Código postal</label>
					</div>
					<div class="input-field col s12 m6">
					  <i class="material-icons prefix">location_on</i>
					  <input id="poblacion" name="poblacion_ef_otra" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="poblacion">Población</label>
					</div>
					<div class="input-field col s12 m6">
					  <i class="material-icons prefix">location_on</i>
					  <input id="municipio_ps" name="municipio_ef_otra" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="municipio_ps">Municipio</label>
					</div>
				  </div>
	  </span></div>
	</li>
  </ul>
				</div>
				<div class="input-field col s12 m12">
				<span class="card-title" style="font-weight: bold;">Datos del Punto de Suministro</span>
				</div>
				<br>
				<div class="row">
					<?php if($_GET['formula'] == 'marca'){ ?>
					  <?php if($_GET['formula2'] == 'luz'){ ?>
					<div class="input-field col s12 m4">
					<i class="material-icons prefix">flash_on</i>
					<div id="resultadoCL" style="position: absolute;margin-top: -29px"></div>
					<input autocomplete="off" onKeyUp="cupsluz();" id="busquedaCL" onblur="valida_cups(this.value)" name="cups_luz" type="text" class="validate" required>
					<label for="busquedaCL">CUPS Electricidad</label>
					</div>
					  <?php } ?>
					  <?php if($_GET['formula2'] == 'gas'){ ?>
						<div class="input-field col s12 m4">
						  <i class="material-icons prefix">local_gas_station</i>
						  <div id="resultadoCG" style="position: absolute;margin-top: -29px"></div>
						  <input autocomplete="off" onKeyUp="cupsgas();" id="busquedaCG" onblur="valida_cups(this.value)" name="cups_gas" type="text" class="validate" required>
						  <label for="busquedaCG">CUPS Gas</label>
						</div>
					  <?php } ?>
					  <?php if($_GET['formula2'] == 'dual'){ ?>
					<div class="input-field col s12 m4">
					<i class="material-icons prefix">flash_on</i>
					<div id="resultadoCL" style="position: absolute;margin-top: -29px"></div>
					<input autocomplete="off" onKeyUp="cupsluz();" id="busquedaCL" onblur="valida_cups(this.value)" name="cups_luz" type="text" class="validate" required>
					<label for="busquedaCL">CUPS Electricidad</label>
					</div>
						
					<div class="input-field col s12 m4">
					  <i class="material-icons prefix">local_gas_station</i>
					  <div id="resultadoCG" style="position: absolute;margin-top: -29px"></div>
					  <input autocomplete="off" onKeyUp="cupsgas();" id="busquedaCG" onblur="valida_cups(this.value)" name="cups_gas" type="text" class="validate" required>
					  <label for="busquedaCG">CUPS Gas</label>
					</div>
					  <?php } ?>
					<?php } ?>
					<?php if($_GET['formula'] == 'luz'){ ?>
					<div class="input-field col s12 m4">
					<i class="material-icons prefix">flash_on</i>
					<div id="resultadoCL" style="position: absolute;margin-top: -29px"></div>
					<input autocomplete="off" onKeyUp="cupsluz();" id="busquedaCL" onblur="valida_cups(this.value)" name="cups_luz" type="text" class="validate" required>
					<label for="busquedaCL">CUPS Electricidad</label>
					</div>
					<?php } ?>
					<?php if($_GET['formula'] == 'compromisoluz'){ ?>
					<div class="input-field col s12 m4">
					<i class="material-icons prefix">flash_on</i>
					<div id="resultadoCL" style="position: absolute;margin-top: -29px"></div>
					<input autocomplete="off" onKeyUp="cupsluz();" id="busquedaCL" onblur="valida_cups(this.value)" name="cups_luz" type="text" class="validate" required>
					<label for="busquedaCL">CUPS Electricidad</label>
					</div>
					<?php } ?>
					<?php if($_GET['formula'] == 'maxahorro'){ ?>
					<div class="input-field col s12 m4">
					<i class="material-icons prefix">flash_on</i>
					<div id="resultadoCL" style="position: absolute;margin-top: -29px"></div>
					<input autocomplete="off" onKeyUp="cupsluz();" id="busquedaCL" onblur="valida_cups(this.value)" name="cups_luz" type="text" class="validate" required>
					<label for="busquedaCL">CUPS Electricidad</label>
					</div>
					<?php } ?>
					<?php if($_GET['formula'] == 'gas'){ ?>
					<div class="input-field col s12 m4">
					  <i class="material-icons prefix">local_gas_station</i>
					  <div id="resultadoCG" style="position: absolute;margin-top: -29px"></div>
					  <input autocomplete="off" onKeyUp="cupsgas();" id="busquedaCG" onblur="valida_cups(this.value)" name="cups_gas" type="text" class="validate" required>
					  <label for="busquedaCG">CUPS Gas</label>
					</div>
					<?php } ?>
					
					<?php if($_GET['formula'] == 'dual'){ ?>
					<div class="input-field col s12 m4">
					<i class="material-icons prefix">flash_on</i>
					<div id="resultadoCL" style="position: absolute;margin-top: -29px"></div>
					<input autocomplete="off" onKeyUp="cupsluz();" id="busquedaCL" onblur="valida_cups(this.value)" name="cups_luz" type="text" class="validate" required>
					<label for="busquedaCL">CUPS Electricidad</label>
					</div>
					<div class="input-field col s12 m4">
					  <i class="material-icons prefix">local_gas_station</i>
					  <div id="resultadoCG" style="position: absolute;margin-top: -29px"></div>
					  <input autocomplete="off" onKeyUp="cupsgas();" id="busquedaCG" onblur="valida_cups(this.value)" name="cups_gas" type="text" class="validate" required>
					  <label for="busquedaCG">CUPS Gas</label>
					</div>
					<?php } ?>
					<?php if($_GET['formula'] == 'planahorro'){ ?>
					<div class="input-field col s12 m4">
					<i class="material-icons prefix">flash_on</i>
					<div id="resultadoCL" style="position: absolute;margin-top: -29px"></div>
					<input autocomplete="off" onKeyUp="cupsluz();" id="busquedaCL" onblur="valida_cups(this.value)" name="cups_luz" type="text" class="validate" required>
					<label for="busquedaCL">CUPS Electricidad</label>
					</div>
					<div class="input-field col s12 m4">
					  <i class="material-icons prefix">local_gas_station</i>
					  <div id="resultadoCG" style="position: absolute;margin-top: -29px"></div>
					  <input autocomplete="off" onKeyUp="cupsgas();" id="busquedaCG" onblur="valida_cups(this.value)" name="cups_gas" type="text" class="validate" required>
					  <label for="busquedaCG">CUPS Gas</label>
					</div>
					<?php } ?>
					<?php if($_GET['tipo_contrato'] == 'HOGARES'){ ?>
					<div class="input-field col s12 m4">
					  <i class="material-icons prefix">bookmark</i>
					  <input id="cnae" name="cnae" type="text" value="9820" class="validate" style="text-transform: uppercase;" required>
					  <label for="cnae">CNAE</label>
					</div>
					<?php } else { ?>
					<div class="input-field col s12 m4">
					  <i class="material-icons prefix">bookmark</i>
					  <input id="cnae" name="cnae" type="text" class="validate" style="text-transform: uppercase;" required>
					  <label for="cnae">CNAE</label>
					</div>
					<?php } ?>
					<div class="input-field col s12 m4">
					  <i class="material-icons prefix">date_range</i>
					  <input id="fechaemision" name="fecha_venta" type="date" pattern="[0-9]{10}" maxlength="10" data-length="10" class="validate" style="text-transform: uppercase;" required>
					</div>
					<?php if($_GET['formula'] == 'marca'){ ?>
					<div class="input-field col s12 m4">
					  <i class="material-icons prefix">confirmation_number</i>
					  <input id="tarjeta_socia" name="tarjeta_socia" type="text" class="validate" style="text-transform: uppercase;" required>
					  <label for="tarjeta_socia">Nº Tarjeta del Club Carrefour</label>
					</div>
					<?php } ?>
					
					<!-- Solo cuando haya luz de por medio LUZ -->
					<?php if($_GET['formula'] == 'luz'){ ?><div class="input-field col s12 m12"><span class="card-title" style="font-weight: bold;">Suministro de electricidad</span></div><?php } ?>
					<?php if($_GET['formula'] == 'compromisoluz'){ ?><div class="input-field col s12 m12"><span class="card-title" style="font-weight: bold;">Suministro de electricidad</span></div><?php } ?>
					<?php if($_GET['formula'] == 'maxahorro'){ ?><div class="input-field col s12 m12"><span class="card-title" style="font-weight: bold;">Suministro de electricidad</span></div><?php } ?>
					<?php if($_GET['formula'] == 'dual'){ ?><div class="input-field col s12 m12"><span class="card-title" style="font-weight: bold;">Suministro de electricidad</span></div><?php } ?>
					<?php if($_GET['formula'] == 'planahorro'){ ?><div class="input-field col s12 m12"><span class="card-title" style="font-weight: bold;">Suministro de electricidad</span></div><?php } ?>
					<!-- Maximetro -->
					<?php if($_GET['formula'] == 'luz'){ ?><div class="input-field col s12 m6"><i class="material-icons prefix"></i><select class="browser-default" name="maximetro"><option value="" selected>MAXÍMETRO</option><option value="Si">Si</option><option value="No">No</option></select></div><?php } ?>
					<?php if($_GET['formula'] == 'compromisoluz'){ ?><div class="input-field col s12 m6"><i class="material-icons prefix"></i><select class="browser-default" name="maximetro"><option value="" selected>MAXÍMETRO</option><option value="Si">Si</option><option value="No">No</option></select></div><?php } ?>
					<?php if($_GET['formula'] == 'maxahorro'){ ?><div class="input-field col s12 m6"><i class="material-icons prefix"></i><select class="browser-default" name="maximetro"><option value="" selected>MAXÍMETRO</option><option value="Si">Si</option><option value="No">No</option></select></div><?php } ?>
					<?php if($_GET['formula'] == 'dual'){ ?><div class="input-field col s12 m6"><i class="material-icons prefix"></i><select class="browser-default" name="maximetro"><option value="" selected>MAXÍMETRO</option><option value="Si">Si</option><option value="No">No</option></select></div><?php } ?>
					<?php if($_GET['formula'] == 'planahorro'){ ?><div class="input-field col s12 m6"><i class="material-icons prefix"></i><select class="browser-default" name="maximetro"><option value="" selected>MAXÍMETRO</option><option value="Si">Si</option><option value="No">No</option></select></div><?php } ?>
					
					<!-- Tipo alta luz -->
					<?php if($_GET['formula'] == 'luz'){ ?><div class="input-field col s12 m6"><i class="material-icons prefix"></i><select class="browser-default" name="tipo_alta_luz"><option value="" selected required>TIPO ALTA LUZ</option><option value="AD">AD</option><option value="CC">CC</option><option value="CC con CT">CC con CT</option><option value="CC con MT">CC con MT</option><option value="CC con CT y MT">CC con CT y MT</option><option value="CT">CT</option><option value="MT">MT</option><option value="NA">NA</option><option value="CT con MT">CT con MT</option></select></div><?php } ?>
					<?php if($_GET['formula'] == 'compromisoluz'){ ?><div class="input-field col s12 m6"><i class="material-icons prefix"></i><select class="browser-default" name="tipo_alta_luz"><option value="" selected required>TIPO ALTA LUZ</option><option value="AD">AD</option><option value="CC">CC</option><option value="CC con CT">CC con CT</option><option value="CC con MT">CC con MT</option><option value="CC con CT y MT">CC con CT y MT</option><option value="CT">CT</option><option value="MT">MT</option><option value="NA">NA</option><option value="CT con MT">CT con MT</option></select></div><?php } ?>
					<?php if($_GET['formula'] == 'maxahorro'){ ?><div class="input-field col s12 m6"><i class="material-icons prefix"></i><select class="browser-default" name="tipo_alta_luz"><option value="" required>TIPO ALTA LUZ</option><option value="AD">AD</option><option value="CC">CC</option><option value="CC con CT">CC con CT</option><option value="CC con MT" selected>CC con MT</option><option value="CC con CT y MT">CC con CT y MT</option><option value="CT">CT</option><option value="MT">MT</option><option value="NA">NA</option><option value="CT con MT">CT con MT</option></select></div><?php } ?>
					<?php if($_GET['formula'] == 'dual'){ ?><div class="input-field col s12 m6"><i class="material-icons prefix"></i><select class="browser-default" name="tipo_alta_luz"><option value="" selected required>TIPO ALTA LUZ</option><option value="AD">AD</option><option value="CC">CC</option><option value="CC con CT">CC con CT</option><option value="CC con MT">CC con MT</option><option value="CC con CT y MT">CC con CT y MT</option><option value="CT">CT</option><option value="MT">MT</option><option value="NA">NA</option><option value="CT con MT">CT con MT</option></select></div><?php } ?>
					<?php if($_GET['formula'] == 'planahorro'){ ?><div class="input-field col s12 m6"><i class="material-icons prefix"></i><select class="browser-default" name="tipo_alta_luz"><option value="" selected required>TIPO ALTA LUZ</option><option value="AD">AD</option><option value="CC">CC</option><option value="CC con CT">CC con CT</option><option value="CC con MT">CC con MT</option><option value="CC con CT y MT">CC con CT y MT</option><option value="CT">CT</option><option value="MT">MT</option><option value="NA">NA</option><option value="CT con MT">CT con MT</option></select></div><?php } ?>
					
					<!-- 3 potencias de luz -->
					<?php if($_GET['formula'] == 'luz'){ ?><div class="input-field col s12 m4"><i class="material-icons prefix">bookmark</i><input id="p1" name="potencia_p1" type="text" class="validate" required><label for="p1">POTENCIA CONTRATADA (P1)</label></div><div class="input-field col s12 m4"><i class="material-icons prefix">bookmark</i><input id="p2" name="potencia_p2" type="text" class="validate"><label for="p2">POTENCIA CONTRATADA (P2)</label></div><div class="input-field col s12 m4"><i class="material-icons prefix">bookmark</i><input id="p3" name="potencia_p3" type="text" class="validate"><label for="p3">POTENCIA CONTRATADA (P3)</label></div><?php } ?>
					<?php if($_GET['formula'] == 'compromisoluz'){ ?><div class="input-field col s12 m4"><i class="material-icons prefix">bookmark</i><input id="p1" name="potencia_p1" type="text" class="validate" required><label for="p1">POTENCIA CONTRATADA (P1)</label></div><div class="input-field col s12 m4"><i class="material-icons prefix">bookmark</i><input id="p2" name="potencia_p2" type="text" class="validate"><label for="p2">POTENCIA CONTRATADA (P2)</label></div><div class="input-field col s12 m4"><i class="material-icons prefix">bookmark</i><input id="p3" name="potencia_p3" type="text" class="validate"><label for="p3">POTENCIA CONTRATADA (P3)</label></div><?php } ?>
					<?php if($_GET['formula'] == 'maxahorro'){ ?><div class="input-field col s12 m4"><i class="material-icons prefix">bookmark</i><input id="p1" name="potencia_p1" type="text" class="validate" required><label for="p1">POTENCIA CONTRATADA</label></div><?php } ?>
					<?php if($_GET['formula'] == 'dual'){ ?><div class="input-field col s12 m4"><i class="material-icons prefix">bookmark</i><input id="p1" name="potencia_p1" type="text" class="validate" required><label for="p1">POTENCIA CONTRATADA (P1)</label></div><div class="input-field col s12 m4"><i class="material-icons prefix">bookmark</i><input id="p2" name="potencia_p2" type="text" class="validate"><label for="p2">POTENCIA CONTRATADA (P2)</label></div><div class="input-field col s12 m4"><i class="material-icons prefix">bookmark</i><input id="p3" name="potencia_p3" type="text" class="validate"><label for="p3">POTENCIA CONTRATADA (P3)</label></div><?php } ?>
					<?php if($_GET['formula'] == 'planahorro'){ ?><div class="input-field col s12 m4"><i class="material-icons prefix">bookmark</i><input id="p1" name="potencia_p1" type="text" class="validate" required><label for="p1">POTENCIA CONTRATADA (P1)</label></div><div class="input-field col s12 m4"><i class="material-icons prefix">bookmark</i><input id="p2" name="potencia_p2" type="text" class="validate"><label for="p2">POTENCIA CONTRATADA (P2)</label></div><div class="input-field col s12 m4"><i class="material-icons prefix">bookmark</i><input id="p3" name="potencia_p3" type="text" class="validate"><label for="p3">POTENCIA CONTRATADA (P3)</label></div><?php } ?>
					
					<!-- Tarifa acceso -->
					<?php if($_GET['formula'] == 'luz'){ ?><div class="input-field col s12 m4"><i class="material-icons prefix"></i><select class="browser-default" name="tarifa_ref_luz" required><option value="" selected>TARIFA DE ACCESO</option><option value="2.0A">2.0A</option><option value="2.0DHA">2.0DHA</option><option value="2.1A">2.1A</option><option value="2.1DHA">2.1DHA</option><option value="3.0A">3.0A</option></select></div><?php } ?>
					<?php if($_GET['formula'] == 'compromisoluz'){ ?><div class="input-field col s12 m4"><i class="material-icons prefix"></i><select class="browser-default" name="tarifa_ref_luz" required><option value="" selected>TARIFA DE ACCESO</option><option value="2.0A">2.0A</option><option value="2.0DHA">2.0DHA</option><option value="2.1A">2.1A</option><option value="2.1DHA">2.1DHA</option><option value="3.0A">3.0A</option></select></div><?php } ?>
					<?php if($_GET['formula'] == 'maxahorro'){ ?><div class="input-field col s12 m4"><i class="material-icons prefix"></i><select class="browser-default" name="tarifa_ref_luz" required><option value="" selected>TARIFA DE ACCESO</option><option value="2.0DHA">2.0DHA</option><option value="2.1DHA">2.1DHA</option></select></div><?php } ?>
					<?php if($_GET['formula'] == 'dual'){ ?><div class="input-field col s12 m4"><i class="material-icons prefix"></i><select class="browser-default" name="tarifa_ref_luz" required><option value="" selected>TARIFA DE ACCESO</option><option value="2.0A">2.0A</option><option value="2.0DHA">2.0DHA</option><option value="2.1A">2.1A</option><option value="2.1DHA">2.1DHA</option><option value="3.0A">3.0A</option></select></div><?php } ?>
					<?php if($_GET['formula'] == 'planahorro'){ ?><div class="input-field col s12 m4"><i class="material-icons prefix"></i><select class="browser-default" name="tarifa_ref_luz" required><option value="" selected>TARIFA DE ACCESO</option><option value="2.0A">2.0A</option><option value="2.0DHA">2.0DHA</option><option value="2.1A">2.1A</option><option value="2.1DHA">2.1DHA</option><option value="3.0A">3.0A</option></select></div><?php } ?>
					
					<!-- Descuento luz -->
					<?php if($_GET['formula'] == 'luz'){ ?><div class="input-field col s12 m4"><i class="material-icons prefix">bookmark</i><input id="f_luz" name="descuento_luz" type="text" class="validate" required><label for="f_luz">DESCUENTO LUZ (%)</label></div><?php } ?>
					<?php if($_GET['formula'] == 'compromisoluz'){ ?><div class="input-field col s12 m4"><i class="material-icons prefix">bookmark</i><input id="f_luz" name="descuento_luz" type="text" class="validate" required><label for="f_luz">DESCUENTO LUZ (%)</label></div><?php } ?>
					<?php if($_GET['formula'] == 'maxahorro'){ ?><div class="input-field col s12 m4"><i class="material-icons prefix">bookmark</i><input id="f_luz" name="descuento_luz" type="text" class="validate" required><label for="f_luz">DESCUENTO LUZ (%)</label></div><?php } ?>
					<?php if($_GET['formula'] == 'dual'){ ?><div class="input-field col s12 m4"><i class="material-icons prefix">bookmark</i><input id="f_luz" name="descuento_luz" type="text" class="validate" required><label for="f_luz">DESCUENTO LUZ (%)</label></div><?php } ?>
					<?php if($_GET['formula'] == 'planahorro'){ ?><div class="input-field col s12 m4"><i class="material-icons prefix">bookmark</i><input id="f_luz" name="descuento_luz" type="text" class="validate" required><label for="f_luz">DESCUENTO LUZ (%)</label></div><?php } ?>
					
					<!-- Solo cuando haya gas de por medio GAS -->
					<?php if($_GET['formula'] == 'gas'){ ?><div class="input-field col s12 m12"><span class="card-title" style="font-weight: bold;">Suministro de gas natural</span></div><?php } ?>
					<?php if($_GET['formula'] == 'dual'){ ?><div class="input-field col s12 m12"><span class="card-title" style="font-weight: bold;">Suministro de gas natural</span></div><?php } ?>
					<?php if($_GET['formula'] == 'planahorro'){ ?><div class="input-field col s12 m12"><span class="card-title" style="font-weight: bold;">Suministro de gas natural</span></div><?php } ?>
					
					<!-- Tipo alta gas -->
					<?php if($_GET['formula'] == 'gas'){ ?><div class="input-field col s12 m6"><i class="material-icons prefix"></i><select class="browser-default" name="tipo_alta_gas" required><option value="" selected>TIPO ALTA GAS</option><option value="AD">AD</option><option value="CC">CC</option><option value="CC con CT">CC con CT</option><option value="CT">CT</option><option value="NA">NA</option></select></div></div><?php } ?>
					<?php if($_GET['formula'] == 'dual'){ ?><div class="input-field col s12 m6"><i class="material-icons prefix"></i><select class="browser-default" name="tipo_alta_gas" required><option value="" selected>TIPO ALTA GAS</option><option value="AD">AD</option><option value="CC">CC</option><option value="CC con CT">CC con CT</option><option value="CT">CT</option><option value="NA">NA</option></select></div></div><?php } ?>
					<?php if($_GET['formula'] == 'planahorro'){ ?><div class="input-field col s12 m6"><i class="material-icons prefix"></i><select class="browser-default" name="tipo_alta_gas" required><option value="" selected>TIPO ALTA GAS</option><option value="AD">AD</option><option value="CC">CC</option><option value="CC con CT">CC con CT</option><option value="CT">CT</option><option value="NA">NA</option></select></div></div><?php } ?>
				
					<!-- Tarifa acceso gas -->
					<?php if($_GET['formula'] == 'gas'){ ?><div class="input-field col s12 m6"><i class="material-icons prefix"></i><select class="browser-default" name="tarifa_ref_gas" required><option value="" selected>TARIFA DE ACCESO</option><option value="3.1">3.1</option><option value="3.2">3.2</option><option value="3.3">3.3</option><option value="3.4">3.4</option></select></div><?php } ?>
					<?php if($_GET['formula'] == 'dual'){ ?><div class="input-field col s12 m6"><i class="material-icons prefix"></i><select class="browser-default" name="tarifa_ref_gas" required><option value="" selected>TARIFA DE ACCESO</option><option value="3.1">3.1</option><option value="3.2">3.2</option><option value="3.3">3.3</option><option value="3.4">3.4</option></select></div><?php } ?>
					<?php if($_GET['formula'] == 'planahorro'){ ?><div class="input-field col s12 m6"><i class="material-icons prefix"></i><select class="browser-default" name="tarifa_ref_gas" required><option value="" selected>TARIFA DE ACCESO</option><option value="3.1">3.1</option><option value="3.2">3.2</option><option value="3.3">3.3</option><option value="3.4">3.4</option></select></div><?php } ?>
					
					<!-- Descuento gas -->
					<?php if($_GET['formula'] == 'gas'){ ?><div class="input-field col s12 m6"><i class="material-icons prefix">bookmark</i><input id="fgh" name="descuento_gas" type="text" class="validate" required><label for="fgh">DESCUENTO GAS</label></div><?php } ?>
					<?php if($_GET['formula'] == 'dual'){ ?><div class="input-field col s12 m6"><i class="material-icons prefix">bookmark</i><input id="fgh" name="descuento_gas" type="text" class="validate" required><label for="fgh">DESCUENTO GAS</label></div><?php } ?>
					<?php if($_GET['formula'] == 'planahorro'){ ?><div class="input-field col s12 m6"><i class="material-icons prefix">bookmark</i><input id="fgh" name="descuento_gas" type="text" class="validate" required><label for="fgh">DESCUENTO GAS</label></div><?php } ?>
					
<?php if($_GET['formula'] == 'marca'){ ?>
	<?php if($_GET['formula2'] == 'luz'){ ?>
	<!-- LUZ -->
	<div class="input-field col s12 m12"><span class="card-title" style="font-weight: bold;">Suministro de electricidad</span></div>
	<div class="input-field col s12 m6"><i class="material-icons prefix"></i><select class="browser-default" name="tipo_alta_luz"><option value="" selected required>TIPO ALTA LUZ</option><option value="AD">AD</option><option value="CC">CC</option><option value="CC con CT">CC con CT</option><option value="CC con MT">CC con MT</option><option value="CC con CT y MT">CC con CT y MT</option><option value="CT">CT</option><option value="MT">MT</option><option value="NA">NA</option><option value="CT con MT">CT con MT</option></select></div>
	<div class="input-field col s12 m6"><i class="material-icons prefix">bookmark</i><input id="p1" name="potencia_p1" type="text" class="validate" required><label for="p1">POTENCIA CONTRATADA (P1)</label></div>
	<div class="input-field col s12 m6"><i class="material-icons prefix"></i><select class="browser-default" name="tarifa_ref_luz" required><option value="" selected>TARIFA DE ACCESO</option><option value="2.0A">2.0A</option><option value="2.0DHA">2.0DHA</option><option value="2.1A">2.1A</option><option value="2.1DHA">2.1DHA</option><option value="3.0A">3.0A</option></select></div>
	<div class="input-field col s12 m6"><i class="material-icons prefix">bookmark</i><input id="f_luz" name="descuento_luz" type="text" class="validate" required><label for="f_luz">DESCUENTO LUZ (%)</label></div>
	<?php } ?>
	
	<?php if($_GET['formula2'] == 'gas'){ ?>
	<!-- GAS -->
	<div class="input-field col s12 m12"><span class="card-title" style="font-weight: bold;">Suministro de gas natural</span></div>
	<div class="input-field col s12 m4"><i class="material-icons prefix"></i><select class="browser-default" name="tipo_alta_gas" required><option value="" selected>TIPO ALTA GAS</option><option value="AD">AD</option><option value="CC">CC</option><option value="CC con CT">CC con CT</option><option value="CT">CT</option><option value="NA">NA</option></select></div>
	<div class="input-field col s12 m4"><i class="material-icons prefix"></i><select class="browser-default" name="tarifa_ref_gas" required><option value="" selected>TARIFA DE ACCESO</option><option value="3.1">3.1</option><option value="3.2">3.2</option><option value="3.3">3.3</option><option value="3.4">3.4</option></select></div>
	<div class="input-field col s12 m4"><i class="material-icons prefix">bookmark</i><input id="fgh" name="descuento_gas" type="text" class="validate" required><label for="fgh">DESCUENTO GAS</label></div>
	<?php } ?>
	
	<?php if($_GET['formula2'] == 'dual'){ ?>
	<!-- DUAL -->
	<div class="input-field col s12 m12"><span class="card-title" style="font-weight: bold;">Suministro de gas natural y electricidad</span></div>
	  <!-- ||=> GAS -->
	<div class="input-field col s12 m6">
	  <div class="input-field col s12 m12">
	  <i class="material-icons prefix"></i>
	  <select class="browser-default" name="tipo_alta_gas" required>
	  <option value="" selected>TIPO ALTA GAS</option>
	  <option value="AD">AD</option>
	  <option value="CC">CC</option>
	  <option value="CC con CT">CC con CT</option>
	  <option value="CT">CT</option>
	  <option value="NA">NA</option>
	  </select>
	  </div>
	  <div class="input-field col s12 m12"><i class="material-icons prefix"></i><select class="browser-default" name="tarifa_ref_gas" required><option value="" selected>TARIFA DE ACCESO</option><option value="3.1">3.1</option><option value="3.2">3.2</option><option value="3.3">3.3</option><option value="3.4">3.4</option></select></div>
	  <div class="input-field col s12 m12"><i class="material-icons prefix">bookmark</i><input id="fgh" name="descuento_gas" type="text" class="validate" required><label for="fgh">DESCUENTO GAS</label></div>
	</div>
	  
	  <!-- ||=> LUZ -->
	<div class="input-field col s12 m6">
	<div class="input-field col s12 m12"><i class="material-icons prefix"></i><select class="browser-default" name="tipo_alta_luz"><option value="" selected required>TIPO ALTA LUZ</option><option value="AD">AD</option><option value="CC">CC</option><option value="CC con CT">CC con CT</option><option value="CC con MT">CC con MT</option><option value="CC con CT y MT">CC con CT y MT</option><option value="CT">CT</option><option value="MT">MT</option><option value="NA">NA</option><option value="CT con MT">CT con MT</option></select></div>
	<div class="input-field col s12 m12"><i class="material-icons prefix">bookmark</i><input id="f_luz" name="descuento_luz" type="text" class="validate" required><label for="f_luz">DESCUENTO LUZ (%)</label></div>
	<div class="input-field col s12 m12"><i class="material-icons prefix"></i><select class="browser-default" name="tarifa_ref_luz" required><option value="" selected>TARIFA DE ACCESO</option><option value="2.0A">2.0A</option><option value="2.0DHA">2.0DHA</option><option value="2.1A">2.1A</option><option value="2.1DHA">2.1DHA</option><option value="3.0A">3.0A</option></select></div>
	<div class="input-field col s12 m12"><i class="material-icons prefix">bookmark</i><input id="p1" name="potencia_p1" type="text" class="validate" required><label for="p1">POTENCIA CONTRATADA (P1)</label></div>
	</div>
	
	<?php } ?>
<?php } ?>
					
					
					<!-- Producto LUZ -->
					<div class="input-field col s12 m12"><span class="card-title" style="font-weight: bold;">Servicios</span></div>
					<?php if($_GET['formula'] == 'marca'){ ?>
						<?php if($_GET['formula2'] == 'gas'){ ?>
					<div class="input-field col s12 m4">
					  <i class="material-icons prefix"></i>
					  <select class="browser-default" name="marca_caldera">
						<option value="" disabled selected>Escoge una caldera</option>
						<?php $c_sql = mysql_query("SELECT * FROM contratos_calderas ORDER BY id"); while($c = mysql_fetch_assoc($c_sql)){ ?>
						<option value="<?php echo $c['caldera']; ?>"><?php echo $c['caldera']; ?></option>
						<?php } ?>
					  </select>
					</div>
						<?php } ?>
						<?php if($_GET['formula2'] == 'dual'){ ?>
					<div class="input-field col s12 m4">
					  <i class="material-icons prefix"></i>
					  <select class="browser-default" name="marca_caldera">
						<option value="" disabled selected>Escoge una caldera</option>
						<?php $c_sql = mysql_query("SELECT * FROM contratos_calderas ORDER BY id"); while($c = mysql_fetch_assoc($c_sql)){ ?>
						<option value="<?php echo $c['caldera']; ?>"><?php echo $c['caldera']; ?></option>
						<?php } ?>
					  </select>
					</div>
						<?php } ?>
					<?php } ?>
					<?php if($_GET['formula'] == 'luz'){ ?>
					<div class="input-field col s12 m6"><i class="material-icons prefix"></i><select class="browser-default" name="plan_destino_luz">
					  <option value="FORMULA LUZ <?php echo strtoupper($_GET['tipo_contrato']); ?> <?php if($_GET['funciona'] == 'si'){ echo 'CON FUNCIONA'; } ?>" selected>FORMULA LUZ <?php echo strtoupper($_GET['tipo_contrato']); ?> <?php if($_GET['funciona'] == 'si'){ echo 'CON FUNCIONA'; } ?></option>
					</select></div>
					<?php if($_GET['funciona'] == 'si'){ ?>
					<div class="input-field col s12 m6"><i class="material-icons prefix"></i><select class="browser-default" name="plan_destino_fun">
					  <option value="FORMULA LUZ <?php echo strtoupper($_GET['tipo_contrato']); ?> <?php if($_GET['funciona'] == 'si'){ echo 'CON FUNCIONA'; } ?>" selected>FORMULA LUZ <?php echo strtoupper($_GET['tipo_contrato']); ?> <?php if($_GET['funciona'] == 'si'){ echo 'CON FUNCIONA'; } ?></option>
					</select></div>
					<?php } ?>
					<?php } ?>
					<?php if($_GET['formula'] == 'compromisoluz'){ ?>
					<div class="input-field col s12 m6"><i class="material-icons prefix"></i><select class="browser-default" name="plan_destino_luz">
					  <option value="COMPROMISO LUZ <?php if($_GET['funciona'] == 'si'){ echo 'CON FUNCIONA'; } ?>" selected>COMPROMISO LUZ <?php if($_GET['funciona'] == 'si'){ echo 'CON FUNCIONA'; } ?></option>
					</select></div>
					<?php if($_GET['funciona'] == 'si'){ ?>
					<div class="input-field col s12 m6"><i class="material-icons prefix"></i><select class="browser-default" name="plan_destino_fun">
					  <option value="COMPROMISO LUZ <?php if($_GET['funciona'] == 'si'){ echo 'CON FUNCIONA'; } ?>" selected>COMPROMISO LUZ <?php if($_GET['funciona'] == 'si'){ echo 'CON FUNCIONA'; } ?></option>
					</select></div>
					<?php } ?>
					<?php } ?>
					
					<?php if($_GET['formula'] == 'maxahorro'){ ?>
					<div class="input-field col s12 m6"><i class="material-icons prefix"></i><select class="browser-default" name="plan_destino_luz">
					  <option value="FORMULA MAXIMO AHORRO 24H<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA MAXIMO AHORRO 24H<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
					</select></div>
					<?php if($_GET['funciona'] == 'si'){ ?>
					<div class="input-field col s12 m6"><i class="material-icons prefix"></i><select class="browser-default" name="plan_destino_fun">
					  <option value="FORMULA MAXIMO AHORRO 24H<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA MAXIMO AHORRO 24H<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
					</select></div>
					<?php } ?>
					<?php } ?>
					
					<?php if($_GET['formula'] == 'marca'){ ?>
					<!-- Marca > Luz -->
					<?php if($_GET['formula2'] == 'luz'){ ?>
					<div class="input-field col s12 m4"><i class="material-icons prefix"></i><select class="browser-default" name="plan_destino_luz">
					  <option value="">Escoge un producto</option>
					  <option value="MARCA LUZ<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>MARCA LUZ<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>					  
					</select></div>
					
					<?php if($_GET['funciona'] == 'si'){ ?>
					<div class="input-field col s12 m4"><i class="material-icons prefix"></i><select class="browser-default" name="plan_destino_fun">
					  <option value="">Escoge un producto</option>
					  <option value="MARCA LUZ<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>MARCA LUZ<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
					</select></div>
					<?php } ?>
					<?php } ?>
					
					<!-- Marca > Gas -->
					<?php if($_GET['formula2'] == 'gas'){ ?>
					<div class="input-field col s12 m4"><i class="material-icons prefix"></i><select class="browser-default" name="plan_destino_gas">
					  <option value="">Escoge un producto</option>
					  <option value="MARCA GAS<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>MARCA GAS<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
					</select></div>
					
					<?php if($_GET['funciona'] == 'si'){ ?>
					<div class="input-field col s12 m4"><i class="material-icons prefix"></i><select class="browser-default" name="plan_destino_fun">
					  <option value="">Escoge un producto</option>
					  <option value="MARCA GAS<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>MARCA GAS<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
					</select></div>
					<?php } ?>
					<?php } ?>
					
					<!-- Marca > Dual -->
					<?php if($_GET['formula2'] == 'dual'){ ?>
					<div class="input-field col s12 m4"><i class="material-icons prefix"></i><select class="browser-default" name="plan_destino_luz">
					  <option value="">Escoge un producto</option>
					  <option value="MARCA DUAL<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>MARCA DUAL<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
					</select></div>
					
					<div class="input-field col s12 m4"><i class="material-icons prefix"></i><select class="browser-default" name="plan_destino_gas">
					  <option value="">Escoge un producto</option>
					  <option value="MARCA DUAL<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>MARCA DUAL<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
					</select></div>
					
					<?php if($_GET['funciona'] == 'si'){ ?>
					<div class="input-field col s12 m4"><i class="material-icons prefix"></i><select class="browser-default" name="plan_destino_fun">
					  <option value="">Escoge un producto</option>
					  <option value="MARCA DUAL<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>MARCA DUAL<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
					</select></div>
					<?php } ?>
					<?php } ?>
					<?php } ?>
					<?php if($_GET['formula'] == 'planahorro'){ ?>
					<div class="input-field col s12 m4"><i class="material-icons prefix"></i><select class="browser-default" name="plan_destino_luz">
					  <option value="">Escoge un producto</option>
					  <option value="FORMULA AHORRO DUAL<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA AHORRO DUAL<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
					</select></div>
					
					<div class="input-field col s12 m4"><i class="material-icons prefix"></i><select class="browser-default" name="plan_destino_gas">
					  <option value="">Escoge un producto</option>
					  <option value="FORMULA AHORRO DUAL<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA AHORRO DUAL<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
					</select></div>
					
					<?php if($_GET['funciona'] == 'si'){ ?>
					<div class="input-field col s12 m4"><i class="material-icons prefix"></i><select class="browser-default" name="plan_destino_fun">
					  <option value="">Escoge un producto</option>
					  <option value="FORMULA AHORRO DUAL<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA AHORRO DUAL<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
					</select></div>
					<?php } ?>
					
					<div class="input-field col s12 m6">
					  <i class="material-icons prefix"></i>
					  <select class="browser-default" name="marca_caldera">
						<option value="" disabled selected>Escoge una caldera</option>
						<?php $c_sql = mysql_query("SELECT * FROM contratos_calderas ORDER BY id"); while($c = mysql_fetch_assoc($c_sql)){ ?>
						<option value="<?php echo $c['caldera']; ?>"><?php echo $c['caldera']; ?></option>
						<?php } ?>
					  </select>
					</div>
					<?php } ?>
					
					<!-- Tipo de funciona luz/plus/normal -->
					<?php if($_GET['formula'] == 'luz'){ ?>
					<?php if($_GET['funciona'] == 'si'){ ?>
					<div class="input-field col s12 m6">
					<select class="browser-default" name="tipo_de_funciona">
					  <option value="Funciona Luz" selected>Funciona Luz</option>
					</select>
					</div>
					<?php } ?>
					<?php } ?>
					
					<?php if($_GET['formula'] == 'luz'){ ?>
					<?php if($_GET['funciona'] == 'si'){ ?>
					<div class="input-field col s12 m6">
					<select class="browser-default" name="tipo_de_funciona">
					  <option value="Funciona Compromiso Luz" selected>Funciona Compromiso Luz</option>
					</select>
					</div>
					<?php } ?>
					<?php } ?>
					

					<?php if($_GET['formula'] == 'dual'){ ?>
					<div class="input-field col s12 m4"><i class="material-icons prefix"></i><select class="browser-default" name="plan_destino_luz">
					  <option value="FORMULA GAS+LUZ<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA GAS+LUZ<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
					</select></div>
					
					<div class="input-field col s12 m4"><i class="material-icons prefix"></i><select class="browser-default" name="plan_destino_gas">
					  <option value="FORMULA GAS+LUZ<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA GAS+LUZ<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
					</select></div>
					
					
					<?php if($_GET['funciona'] == 'si'){ ?>
					<div class="input-field col s12 m4"><i class="material-icons prefix"></i><select class="browser-default" name="plan_destino_fun">
					  <option value="FORMULA GAS+LUZ<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA GAS+LUZ<?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?></option>
					</select></div>
					
					<div class="input-field col s12 m6">
					<select class="browser-default" name="tipo_de_funciona">
					  <option value="FUNCIONA PLUS" selected>FUNCIONA PLUS</option>
					</select>
					</div>
					<?php } ?>
					
					<div class="input-field col s12 m6">
					  <i class="material-icons prefix"></i>
					  <select class="browser-default" name="marca_caldera">
						<option value="" disabled selected>Escoge una caldera</option>
						<?php $c_sql = mysql_query("SELECT * FROM contratos_calderas ORDER BY id"); while($c = mysql_fetch_assoc($c_sql)){ ?>
						<option value="<?php echo $c['caldera']; ?>"><?php echo $c['caldera']; ?></option>
						<?php } ?>
					  </select>
					</div>
					<?php } ?>
					
					<?php if($_GET['formula'] == 'gas'){ ?>
					<div class="input-field col s12 m6"><i class="material-icons prefix"></i><select class="browser-default" name="plan_destino_gas">
					  <option value="FORMULA GAS <?php echo strtoupper($_GET['tipo_contrato']); ?><?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA GAS <?php echo strtoupper($_GET['tipo_contrato']); ?> <?php if($_GET['funciona'] == 'si'){ echo 'CON FUNCIONA'; } ?></option>
					</select></div>
					
					<?php if($_GET['funciona'] == 'si'){ ?>
					<div class="input-field col s12 m6"><i class="material-icons prefix"></i><select class="browser-default" name="plan_destino_fun">
					  <option value="FORMULA GAS <?php echo strtoupper($_GET['tipo_contrato']); ?><?php if($_GET['funciona'] == 'si'){ echo ' CON FUNCIONA'; } ?>" selected>FORMULA GAS <?php echo strtoupper($_GET['tipo_contrato']); ?> <?php if($_GET['funciona'] == 'si'){ echo 'CON FUNCIONA'; } ?></option>
					</select></div>
					<?php } ?>
					<?php } ?>
					
					
					<!-- Opción clima -->
					<div class="input-field col s12 m6">
					<i class="material-icons prefix"></i>
					<select class="browser-default" name="contrata_opcion_clima">
					  <option value="" selected>Opción Clima</option>
					  <option value="SI">Sí</option>
					  <option value="NO">No</option>
					</select>
					</div>
					<div class="input-field col s12 m6">
					  <i class="material-icons prefix"></i>
					  <input id="clima" name="marca_aparato_climatizacion" type="text" class="validate" style="text-transform: uppercase;">
					  <label for="clima">Marca Equipo Climatización</label>
					</div>
					<?php if($_GET['formula'] == 'gas'){ ?>
					<div class="input-field col s12 m6">
					  <i class="material-icons prefix"></i>
					  <select class="browser-default" name="marca_caldera">
						<option value="" disabled selected>Escoge una caldera</option>
						<?php $c_sql = mysql_query("SELECT * FROM contratos_calderas ORDER BY id"); while($c = mysql_fetch_assoc($c_sql)){ ?>
						<option value="<?php echo $c['caldera']; ?>"><?php echo $c['caldera']; ?></option>
						<?php } ?>
					  </select>
					</div>
					<?php } ?>
					<div class="col s12 m12">
					  <button style="width: 100%;" class="btn waves-effect waves-light #43a047 green darken-1" type="submit" name="add_contract">INTRODUCIR CONTRATO</button>
					  <!--a style="background: #444;width: 100%;" class="waves-effect waves-light btn modal-trigger" href="#confirmenter">Introducir contrato</a-->

					  <!--div id="confirmenter" class="modal">
						<div class="modal-content">
						  <h4 style="text-align: center;">¿Estás seguro, <?php echo $user['username']; ?>?</h4>
						  <p style="text-align: center;">Quieres definitivamente introducir el contrato? Una vez introducido podrás editar los cambios, pero piénsatelo dos veces...</p>
						  <div class="row">
							<div class="input-field col s12 m6">
							  <a href="#!" style="width: 100%;color: #fff;" class="modal-close btn waves-effect waves-light waves-effect waves-green btn-flat #b71c1c red darken-4">Cerrar</a>
							</div>
							<div class="input-field col s12 m6">
							  <button style="width: 100%;" class="btn waves-effect waves-light #43a047 green darken-1" type="submit" name="add_contract">Sí, estoy seguro</button>
							</div>
						  </div>
						</div>
					  </div-->
					</div>
			  </div>
			  
			  
				<?php if($_GET['funciona'] == 'si') { ?>
					<?php if($_GET['formula'] == 'luz') { ?>
					 <input type="text" name="vers_funciona" value="SOLO LUZ">
					 <input type="text" name="modal_funciona" value="<?php echo strtoupper($_GET['tipo_contrato']); ?>">
					<?php } ?>
					<?php if($_GET['formula'] == 'compromisoluz') { ?>
					 <input type="text" name="vers_funciona" value="SOLO LUZ">
					 <input type="text" name="modal_funciona" value="NEGOCIOS">
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
          </div>
        </div>
		</form>
	  <?php } ?>
	  
	<?php } ?>
	</div>