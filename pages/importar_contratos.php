<?php
$vowels = array("V","v","P","p");
?>
<?php if(Filter($_GET['we_mes'])){?>
<?php
  
  $dir_subida = 'excel/IMPORT/';
  $fichero_subido = $dir_subida . basename('IMPORT_'. date(y) .''. date(m) .''. date(d) . '_NAME_' . str_replace("xlsx", "xls", $_FILES['fichero_usuario']['name']));
  
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
?>
	  <div class="row">
		<div class="col s12 m12">
		  <div class="card" style="box-shadow: none;text-align: center;">
            <div class="card-content grey-text">
<?php
if (move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], $fichero_subido)) {
	//echo 'Más información de depuración: ';
	//echo $dir_subida . 'UPLOAD STATUS_'. date(y) .''. date(m) .''. date(d) . '_NAME_' . $_FILES['fichero_usuario']['name'];
	$referencia = $_POST['referencia'];
	//echo '<script>
	//swal({
	//  type: "success",
	//  title: "Contratos importados",
	//  timer: 3000,
	//  showConfirmButton: false
	//})</script>
	//<script>
	//function redireccionarUsuario() {
	//  window.location = "index.php?page=importar_contratos_nuevos";
	//}
	//setTimeout("redireccionarUsuario()", 2000);
	//</script>
	//
	//';
	 $connect = mysqli_connect("localhost", "root", "", "mimatik");  
	 include ("excel/Classes/PHPExcel/IOFactory.php");
	 include ("excel/Classes/PHPExcel.php");
	 $html="      <table class='centered'>
        <thead>
          <tr>
			  <th>TITULAR</th>
              <th>CÓD. VERIF.</th>
              <th>CUPS LUZ</th>
              <th>CUPS GAS</th>
              <th>SUBGERENTE</th>
          </tr>
        </thead>";  
	 //$objPHPExcel = PHPExcel_IOFactory::load('excel/SUBIDA estado_contratoS/UPLOAD STATUS_180328_NAME_xd.xls');  
	
	 $objPHPExcel = PHPExcel_IOFactory::load('excel/IMPORT/IMPORT_'. date(y) .''. date(m) .''. date(d) . '_NAME_' . str_replace("xlsx", "xls", $_FILES['fichero_usuario']['name']));
	 //$objPHPExcel->setActiveSheetIndex(1);
	 foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)   
	 {  
		  $highestRow = $worksheet->getHighestRow();  
		  for ($row=2; $row<=$highestRow; $row++)  
		  {
				
				$html.="<tr>";  
				$tipo_tramitacion =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());  
				$fecha_venta =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());  
				$nombre_titular =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());  
				$apellidos_titular =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());  
				$dni_cif_titular =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());  
				$telefono_pref_1 =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());  
				$telefono_pref_2 =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(6, $row)->getValue());  
				$codigo_comercial_sql =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(10, $row)->getValue());
				if(strlen($codigo_comercial_sql) < 5){
			    	$codigo_comercial = '0' . $codigo_comercial_sql;
			    } else {
			    	$codigo_comercial = $codigo_comercial_sql;
			    }
				$cg_sql = mysql_query("SELECT * FROM click_comerciales WHERE codigo_interno='$codigo_comercial'");$cg = mysql_fetch_assoc($cg_sql);
				$idioma =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(11, $row)->getValue());  
				$provincia_ps =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(12, $row)->getValue());  
				$municipio_ps =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(13, $row)->getValue());  
				$poblacion_ps =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(14, $row)->getValue());  
				$tipo_via_ps =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(15, $row)->getValue());  
				$calle_ps =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(16, $row)->getValue());  
				$numero_ps =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(17, $row)->getValue());  
				$escalera_ps =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(18, $row)->getValue());  
				$piso_ps =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(19, $row)->getValue());  
				$letra_ps =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(20, $row)->getValue());  
				$cod_postal_ps =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(22, $row)->getValue());  
				$pais_ps = "ES - ESPAÑA";
				$plan_destino_luz =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(28, $row)->getValue());  
				$plan_destino_gas =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(29, $row)->getValue());  
				$plan_destino_fun =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(30, $row)->getValue());  
				$tipo_alta_luz_sql =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(31, $row)->getValue());  
				if($tipo_alta_luz_sql == '') {
				   $tipo_alta_luz = 'NA';
			    } else {
				    $tipo_alta_luz =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(31, $row)->getValue());
			    }
				$tipo_alta_gas_sql =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(32, $row)->getValue());  
				if($tipo_alta_gas_sql == '') {
				    $tipo_alta_gas = 'NA';
			    } else {
				    $tipo_alta_gas =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(32, $row)->getValue());
			    }
				$tipo_alta_fun =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(33, $row)->getValue());  
				$descuento_luz =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(34, $row)->getValue());  
				$descuento_gas =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(35, $row)->getValue());  
				$codverificacion =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(36, $row)->getValue());  
				$cod_verificacion = str_replace($vowels, "", $codverificacion);
				$cups_luz =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(37, $row)->getValue());  
				$cups_gas =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(38, $row)->getValue());  
				$tarifa_ref_luz =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(39, $row)->getValue());  
				$tarifa_ref_gas =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(40, $row)->getValue());  
				$tot_activa_luz =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(41, $row)->getValue());  
				$potencia_p1 =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(42, $row)->getValue()); //POT_CONTR_LUZ (P2)
				$potencia_p2 =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(43, $row)->getValue()); //POT_CONTR_PUNTA (P1)
				$potencia_p3 =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(44, $row)->getValue()); //POT_CONTR_VALLE (P3)
				$consumo_pyme =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(45, $row)->getValue()); // CONSUMO PYME consumo_pyme
				if($consumo_pyme == '') {
				   $tipo_contrato = 'HOGARES';
			    } else {
				    $tipo_contrato = 'NEGOCIOS';
			    }
				$maximetro =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(46, $row)->getValue());  
				$vers_funciona =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(47, $row)->getValue());  
				$modal_funciona =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(48, $row)->getValue());  
				$marca_caldera =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(49, $row)->getValue());  
				$contrata_opcion_clima =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(50, $row)->getValue());  
				$marca_aparato_climatizacion =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(51, $row)->getValue());  
				$contrata_efactura =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(52, $row)->getValue());  
				$correo_electron =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(53, $row)->getValue());  
				$cuenta_bancaria =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(54, $row)->getValue());
			    $ccc_1 = substr($cuenta_bancaria, 0, 4);
			    $ccc_2 = substr($cuenta_bancaria, 4, 4);
			    $ccc_3 = substr($cuenta_bancaria, 8, 2);
			    $ccc_4 = substr($cuenta_bancaria, 10, 10);
				$cnae_luz =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(55, $row)->getValue());
				if($cnae_luz == ''){
					$cnae =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(56, $row)->getValue());
				} else {
					$cnae =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(55, $row)->getValue());
				}
				$direccion_cliente =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(57, $row)->getValue());   // PS/OTRA
				$direccion_envio_facturas =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(58, $row)->getValue());   // PS/OTRA
				$impl =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(59, $row)->getValue()); // POR DEFECTO SI, PERO VIENE UN NO
				$impl_explicito =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(60, $row)->getValue()); // LOPD
				$representante_nombre =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(62, $row)->getValue());
				$representante_apellidos =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(63, $row)->getValue());
				$dni_cif_representante =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(64, $row)->getValue());
				$relacion_representante_titular =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(65, $row)->getValue());
				$aporta_cie =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(66, $row)->getValue());
				$cig =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(67, $row)->getValue());
				/////////////////////////////////
				$cliente_provincia_otra =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(68, $row)->getValue());
				$cliente_municipio_otra =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(69, $row)->getValue());
				$cliente_poblacion_otra =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(70, $row)->getValue());
				$cliente_tipo_via_otra =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(71, $row)->getValue());
				$cliente_calle_otra =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(72, $row)->getValue());
				$cliente_numero_otra =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(73, $row)->getValue());
				$cliente_duplicador_otra =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(74, $row)->getValue());
				$cliente_escalera_otra =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(75, $row)->getValue());
				$cliente_piso_otra =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(76, $row)->getValue());
				$cliente_letra_otra =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(77, $row)->getValue());
				$cliente_cod_postal_otra =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(78, $row)->getValue());
				$provincia_ef_otra =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(80, $row)->getValue());
				$municipio_ef_otra =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(81, $row)->getValue());
				$poblacion_ef_otra =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(82, $row)->getValue());
				$tipo_via_ef_otra =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(83, $row)->getValue());
				$calle_ef_otra =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(84, $row)->getValue());
				$numero_ef_otra =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(85, $row)->getValue());
				$duplicador_ef_otra =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(86, $row)->getValue());
				$escalera_ef_otra =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(87, $row)->getValue());
				$piso_ef_otra =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(88, $row)->getValue());
				$letra_ef_otra =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(89, $row)->getValue());
				$cod_postal_ef_otra =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(90, $row)->getValue());
				$marca_socia =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(92, $row)->getValue());
				$tarjeta_socia =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(93, $row)->getValue());
				$redy =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(94, $row)->getValue());
				$version_redy =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(95, $row)->getValue());
				$factura_segura =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(96, $row)->getValue());
				$edp_click =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(97, $row)->getValue());
			    //$Var = mysql_query("SELECT * FROM contratos WHERE cod_verificacion='". str_replace("V", "", $cod_verificacion) ."' or cups_luz='". strtoupper($cups_luz) ."' or cups_gas='". strtoupper($cups_gas) ."'");
			    //$contrato = mysql_fetch_assoc($Var);
				$cvc = substr($codverificacion, 0, 1);
				if($cvc == "V"){ 
					$cod_verificacion_posterior = 'verificacion';
				} else { 
					$cod_verificacion_posterior = 'posterior';
				}
				if($tipo_alta_fun == ''){
					$funciona = 'no';
				} else {
					$funciona = 'si';
				}
				
				
				if($plan_destino_luz == 'FORMULA LUZ '. $modal_funciona .' CON FUNCIONA'){
					$formula = 'luz';
					$formula1 = '';
					$formula2 = '';
					$funciona = 'si';
				}
				if($plan_destino_luz == 'FORMULA LUZ '. $modal_funciona .''){
					$formula = 'luz';
					$formula1 = '';
					$formula2 = '';
					$funciona = 'no';
				}
				if($plan_destino_luz == 'MARCA LUZ CON FUNCIONA MAXIMO AHORRO'){
					$formula = 'marca';
					$formula1 = 'conmaxahorro';
					$formula2 = 'luz';
					$funciona = 'no';
				}
				if($plan_destino_luz == 'MARCA LUZ MAXIMO AHORRO'){
					$formula = 'marca';
					$formula1 = 'conmaxahorro';
					$formula2 = 'luz';
					$funciona = 'no';
				}
				if($plan_destino_luz == 'MARCA LUZ CON FUNCIONA'){
					$formula = 'marca';
					$formula1 = 'sinmaxahorro';
					$formula2 = 'luz';
					$funciona = 'si';
				}
				if($plan_destino_luz == 'MARCA LUZ'){
					$formula = 'marca';
					$formula1 = 'sinmaxahorro';
					$formula2 = 'luz';
					$funciona = 'no';
				}
				if($plan_destino_gas == 'MARCA GAS CON FUNCIONA'){
					$formula = 'marca';
					$formula1 = 'sinmaxahorro';
					$formula2 = 'gas';
					$funciona = 'si';
				}
				if($plan_destino_gas == 'MARCA GAS'){
					$formula = 'marca';
					$formula1 = 'sinmaxahorro';
					$formula2 = 'gas';
					$funciona = 'no';
				}
				if($plan_destino_gas == 'MARCA DUAL CON FUNCIONA'){
					$formula = 'marca';
					$formula1 = 'sinmaxahorro';
					$formula2 = 'dual';
					$funciona = 'si';
				}
				if($plan_destino_gas == 'MARCA DUAL'){
					$formula = 'marca';
					$formula1 = 'sinmaxahorro';
					$formula2 = 'dual';
					$funciona = 'no';
				}
				if($plan_destino_gas == 'FORMULA GAS '. $modal_funciona .' CON FUNCIONA'){
					$formula = 'gas';
					$formula1 = '';
					$formula2 = '';
					$funciona = 'si';
				}
				if($plan_destino_gas == 'FORMULA GAS '. $modal_funciona .''){
					$formula = 'gas';
					$formula1 = '';
					$formula2 = '';
					$funciona = 'no';
				}
				if($plan_destino_gas == 'FORMULA GAS+LUZ CON FUNCIONA MAXIMO AHORRO'){
					$formula = 'dual';
					$formula1 = 'conmaxahorro';
					$formula2 = '';
					$funciona = 'si';
				}
				if($plan_destino_gas == 'FORMULA GAS+LUZ MAXIMO AHORRO'){
					$formula = 'dual';
					$formula1 = 'conmaxahorro';
					$formula2 = '';
					$funciona = 'no';
				}
				if($plan_destino_gas == 'FORMULA GAS+LUZ CON FUNCIONA'){
					$formula = 'dual';
					$formula1 = 'sinmaxahorro';
					$formula2 = '';
					$funciona = 'si';
				}
				if($plan_destino_gas == 'FORMULA GAS+LUZ'){
					$formula = 'dual';
					$formula1 = 'sinmaxahorro';
					$formula2 = '';
					$funciona = 'no';
				}
				if($plan_destino_luz == 'FORMULA MAXIMO AHORRO 24H CON FUNCIONA'){
					$formula = 'maxahorro';
					$formula1 = '';
					$formula2 = '';
					$funciona = 'si';
				}
				/// EDIT START
				if($plan_destino_luz == 'FORMULA LUZ HOGARES CON FUNCIONA MAXIMO AHORRO'){ //FORMULA MAXIMO AHORRO 24H CON FUNCIONA
					$formula = 'maxahorro';
					$formula1 = '';
					$formula2 = '';
					$funciona = 'si';
				}
				if($plan_destino_luz == 'FORMULA LUZ CON FUNCIONA MAXIMO AHORRO'){ //FORMULA MAXIMO AHORRO 24H
					$formula = 'maxahorro';
					$formula1 = '';
					$formula2 = '';
					$funciona = 'no';
				}
				if($plan_destino_luz == 'FORMULA HOGARES CON FUNCIONA'){ //FORMULA LUZ '. $modal_funciona .' CON FUNCIONA
					$formula = 'luz';
					$formula1 = '';
					$formula2 = '';
					$funciona = 'si';
				}
				if($plan_destino_luz == 'FORMULA LUZ MAXIMO AHORRO'){ //FORMULA LUZ '. $modal_funciona .'
					$formula = 'luz';
					$formula1 = '';
					$formula2 = '';
					$funciona = 'no';
				}
				if($plan_destino_gas == 'FORMULA LUZ+GAS HOGARES CON FUNCIONA MAXIMO AHORRO'){ //FORMULA GAS+LUZ CON FUNCIONA MAXIMO AHORRO
					$formula = 'dual';
					$formula1 = 'conmaxahorro';
					$formula2 = '';
					$funciona = 'si';
				}
				if($plan_destino_gas == 'FORMULA LUZ+GAS CON FUNCIONA'){ //FORMULA GAS+LUZ CON FUNCIONA
					$formula = 'dual';
					$formula1 = 'sinmaxahorro';
					$formula2 = '';
					$funciona = 'si';
				}
				/// EDIT STOP
				if($plan_destino_luz == 'FORMULA MAXIMO AHORRO 24H'){
					$formula = 'maxahorro';
					$formula1 = '';
					$formula2 = '';
					$funciona = 'no';
				}
				if($plan_destino_gas == 'FORMULA AHORRO DUAL CON FUNCIONA'){
					$formula = 'planahorro';
					$formula1 = 'dual';
					$formula2 = '';
					$funciona = 'si';
				}
				if($plan_destino_gas == 'FORMULA AHORRO DUAL'){
					$formula = 'planahorro';
					$formula1 = 'dual';
					$formula2 = '';
					$funciona = 'no';
				}
				
				
				if($poblacion_ps == ''){} else {
			   mysql_query("INSERT INTO contratos (tipo_tramitacion,fecha_venta,gerente,subgerente,oficina,codigo_comercial,nombre_titular,apellidos_titular,dni_cif_titular,telefono_pref_1,idioma,telefono_pref_2,correo_electron,municipio_ps,poblacion_ps,tipo_via_ps,calle_ps,numero_ps,escalera_ps,piso_ps,letra_ps,cod_postal_ps,plan_destino_luz,plan_destino_gas,plan_destino_fun,vers_funciona,modal_funciona,descuento_luz,descuento_gas,cod_verificacion_posterior,cups_luz,cups_gas,tarifa_ref_luz,tarifa_ref_gas,tot_activa_luz,consumo_pyme,maximetro,marca_caldera,contrata_opcion_clima,marca_aparato_climatizacion,contrata_efactura,cnae,direccion_cliente,direccion_envio_facturas,representante_nombre,representante_apellidos,dni_cif_representante,relacion_representante_titular,aporta_cie,cliente_provincia_otra,cliente_municipio_otra,cliente_poblacion_otra,cliente_tipo_via_otra,cliente_calle_otra,cliente_numero_otra,cliente_escalera_otra,cliente_piso_otra,cliente_letra_otra,cliente_cod_postal_otra,provincia_ef_otra,municipio_ef_otra,poblacion_ef_otra,tipo_via_ef_otra,calle_ef_otra,numero_ef_otra,escalera_ef_otra,piso_ef_otra,letra_ef_otra,cod_postal_ef_otra,marca_socia,tarjeta_socia,redy,version_redy,factura_segura,edp_click,ccc_1,ccc_2,ccc_3,ccc_4,potencia_p1,potencia_p2,potencia_p3,cig,funciona,fecha_contrato_intro,impl_explicito,cod_verificacion,intro_dia,intro_mes,intro_ano,subgerente2,user_contrato_intro,formula,formula1,formula2,we_dia,we_mes,we_ano) VALUES 
			   ('$tipo_tramitacion','$fecha_venta','$cg[gerente]','$cg[subgerente]','$cg[oficina]','$codigo_comercial','$nombre_titular','$apellidos_titular','$dni_cif_titular','$telefono_pref_1','$idioma','$telefono_pref_2','$correo_electron','$municipio_ps','$poblacion_ps','$tipo_via_ps','$calle_ps','$numero_ps','$escalera_ps','$piso_ps','$letra_ps','$cod_postal_ps','$plan_destino_luz','$plan_destino_gas','$plan_destino_fun','$vers_funciona','$modal_funciona','$descuento_luz','$descuento_gas','$cod_verificacion_posterior','$cups_luz','$cups_gas','$tarifa_ref_luz','$tarifa_ref_gas','$tot_activa_luz','$consumo_pyme','$maximetro','$marca_caldera','$contrata_opcion_clima','$marca_aparato_climatizacion','$contrata_efactura','$cnae','$direccion_cliente','$direccion_envio_facturas','$representante_nombre','$representante_apellidos','$dni_cif_representante','$relacion_representante_titular','$aporta_cie','$cliente_provincia_otra','$cliente_municipio_otra','$cliente_poblacion_otra','$cliente_tipo_via_otra','$cliente_calle_otra','$cliente_numero_otra','$cliente_escalera_otra','$cliente_piso_otra','$cliente_letra_otra','$cliente_cod_postal_otra','$provincia_ef_otra','$municipio_ef_otra','$poblacion_ef_otra','$tipo_via_ef_otra','$calle_ef_otra','$numero_ef_otra','$escalera_ef_otra','$piso_ef_otra','$letra_ef_otra','$cod_postal_ef_otra','$marca_socia','$tarjeta_socia','$redy','$version_redy','$factura_segura','$edp_click','$ccc_1','$ccc_2','$ccc_3','$ccc_4','". str_replace(',', '.', $potencia_p1) ."','". str_replace(',', '.', $potencia_p2) ."','". str_replace(',', '.', $potencia_p3) ."','$cig','$funciona','". time() ."','$impl_explicito','". str_replace($vowels, '', $cod_verificacion) ."','". date(d) ."','". date(m) ."','". date(Y) ."','$cg[subgerente]','$user[username]','$formula','$formula1','$formula2','$_GET[we_dia]','$_GET[we_mes]','$_GET[we_ano]')");
			   mysqli_query($connect, $sql);  
			   $html.= '<td>'. $nombre_titular .' ('. $dni_cif_titular .')</td>';
			   $html .= '<td>'.$cod_verificacion.'</td>';
			   //$html .= '<td>'.$cups_luz.'</td>';
			   if($cups_luz == ''){
				   $html .= '<td>no tiene</td>';
			   } else {
				   $html .= '<td>'.$cups_luz.'</td>';
			   }
			   if($cups_gas == ''){
				   $html .= '<td>no tiene</td>';
			   } else {
				   $html .= '<td>'.$cups_gas.'</td>';
			   }
			   $html .= '<td>'.$cg[subgerente].'</td>';
			   //$html .= '<td style="background: red;"><a style="color: #fff;" href="'. $config[site] .'/index.php?page=edit_contract_id&id='.$contrato['id'].'">'.$contrato['id'].'</a></td>';
			   $html .= "</tr>"; 
			   }
		  }  
	 }  
	 $html .= '</table>';  

$valor = $row-2;
	  $confirmbtn = '
		<div class="card-panel #43a047 green darken-1 center" style="box-shadow: none;">
		  <span class="white-text">¡Se han importado <!--b style="font-size: 22px;">'. $valor .'</b-->los contratos correctamente!</span><br>
		  <a href="'. $config[site] .'/index.php?page=importar_contratos" style="color: #fff;">importar otra vez</a>
		</div>
	  ';


	 //echo $html;
	 //echo '<br />Data Inserted';  
} else {
    //echo "¡Posible ataque de subida de ficheros!\n";
}

//print_r($_FILES);



?>
<?php echo $confirmbtn; ?>
<?php echo $html; ?>
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
    <input type="hidden" name="MAX_FILE_SIZE" value="999999" />
    <input class="upload" name="fichero_usuario" type="file" />
	<br><br>
    <input class="waves-effect waves-light" type="submit" value="Actualizar contratos" />
</form>
</div>
</div>

            </div>
          </div>
		</div>
      </div>
<?php } else { ?>
 <div class="card" style="box-shadow: none;text-align: center;">
            <div class="card-content grey-text">
  <div class="row">
    <form class="col s12">
	<input type="hidden" name="page" value="importar_contratos">
      <div class="row">
        <div class="input-field col s12 m4">
          <input id="we_dia" name="we_dia" type="text" pattern="[0-9]{2}" class="validate" style="text-transform: uppercase;" onkeyup="if (this.value.length == this.getAttribute('maxlength')) we_mes.focus()" maxlength="2" data-length="2" required>
          <label for="we_dia">WE DÍA</label>
        </div>
		<div class="input-field col s12 m4">
          <input id="we_mes" name="we_mes" type="text" pattern="[0-9]{2}" class="validate" style="text-transform: uppercase;" onkeyup="if (this.value.length == this.getAttribute('maxlength')) we_ano.focus()" maxlength="2" data-length="2" required>
          <label for="we_mes">WE MES</label>
        </div>
		<div class="input-field col s12 m4">
          <input id="we_ano" value="<?php echo date(Y); ?>" name="we_ano" type="text" pattern="[0-9]{4}" class="validate" style="text-transform: uppercase;" maxlength="4" data-length="4" required>
          <label for="we_ano">WE AÑO</label>
        </div>
		<!--div class="input-field col s12 m12">
		  <select id="subgerente2" name="subgerente2" class="browser-default" required>
		    <option disabled selected>Selecciona un subgerente</option>
		    <?php $gg_sql = mysql_query("SELECT * FROM click_gerentes_introductores ORDER BY subgerente"); while($g = mysql_fetch_assoc($gg_sql)){ ?>
		    <option value="<?php echo $g['subgerente']; ?>"><?php echo $g['subgerente']; ?></option>
		    <?php } ?>
		  </select>
		</div-->
		<div class="input-field col s12 m12">
		<button type="submit" class="waves-effect waves-light btn">Continuar</button>
		</div>
	</div>
	</form>
	</div>
			</div>
		  </div>
<?php } ?>
</main>