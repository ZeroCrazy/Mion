<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
//error_reporting(E_ALL);
error_reporting(0);
include_once 'Classes/PHPExcel.php';
require '../inc/core.php';
require '../templates/header.php';

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

////////////////////////CONEXION//////////////////////////////
	///localhost, nombre del servidor<br />
	///root, nombre de la cuenta de usuario<br />
	/// '' contraseña, sino tiene deje vacio
	///BD, nombre de la base de datos
	$conexion = mysql_connect('localhost','root','');
	mysql_select_db('mimatik',$conexion);
/////////////////////////////////////////////////////////////
$objXLS = new PHPExcel();
$objSheet = $objXLS->setActiveSheetIndex(0);
////////////////////TITULOS///////////////////////////
// Color de fondo de casilla
function cellColor($cells,$color){
    global $objXLS;

    $objXLS->getActiveSheet()->getStyle($cells)->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => $color
        )
    ));
}
$estilo = array( 
  'borders' => array(
    'outline' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);

 $objXLS->getActiveSheet()->getStyle('A1:CQ1')->applyFromArray($estilo);
// ###### FONDO VERDE ######
cellColor('AN1:AT1', '008000');
cellColor('AV1:AZ1', '008000');
cellColor('BB1', '008000');
cellColor('BD1:BE1', '008000');
cellColor('BK1:BO1', '008000');
cellColor('BQ1:CT1', '008000');
cellColor('BA1', '008000');
cellColor('BC1', '008000');
cellColor('BF1:BG1', '008000');
// ###### FONDO AZUL ######
cellColor('G1:L1', '0404fc');
cellColor('S1:T1', '0404fc');
cellColor('V1', '0404fc');
cellColor('Y1:AM1', '0404fc');
cellColor('AU1', '0404fc');
cellColor('BP1', '0404fc');
cellColor('A1:F1', '0404fc');
cellColor('M1:R1', '0404fc');
cellColor('U1', '0404fc');
cellColor('W1:X1', '0404fc');
cellColor('BH1:BJ1', '0404fc');
$sheet = $objXLS->getActiveSheet();

// Cambiar campo a "Texto"
$sheet->getStyle('A2:CQ105')
        ->getNumberFormat()
        ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);

// Formato código postal
$sheet->getStyle('K2:K200')
        ->getNumberFormat()
        ->setFormatCode('00000');
$sheet->getStyle('W2:W200')
        ->getNumberFormat()
        ->setFormatCode('00000');
$sheet->getStyle('CA2:CA200')
        ->getNumberFormat()
        ->setFormatCode('00000');
$sheet->getStyle('CM2:CM200')
        ->getNumberFormat()
        ->setFormatCode('00000');
		
// Formato cuenta bancaria
//$sheet->getStyle('BB2:BB105')
//        ->getNumberFormat()
//        ->setFormatCode('00000000');


// ###### COLOR TEXTO BLANCO ######
//		FRANJAS VERDES
$objXLS->getActiveSheet()->getStyle('AN1:AT1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ffffff')))); // Color blanco
$objXLS->getActiveSheet()->getStyle('AV1:AZ1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ffffff')))); // Color blanco
$objXLS->getActiveSheet()->getStyle('BB1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ffffff')))); // Color blanco
$objXLS->getActiveSheet()->getStyle('BD1:BE1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ffffff')))); // Color blanco
$objXLS->getActiveSheet()->getStyle('BK1:BO1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ffffff')))); // Color blanco
$objXLS->getActiveSheet()->getStyle('BQ1:CT1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ffffff')))); // Color blanco
$objXLS->getActiveSheet()->getStyle('BQ1:CT1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ffffff')))); // Color blanco
//		FRANJAS AZULES
$objXLS->getActiveSheet()->getStyle('G1:L1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ffffff')))); // Color blanco
$objXLS->getActiveSheet()->getStyle('S1:T1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ffffff')))); // Color blanco
$objXLS->getActiveSheet()->getStyle('V1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ffffff')))); // Color blanco
$objXLS->getActiveSheet()->getStyle('Y1:AM1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ffffff')))); // Color blanco
$objXLS->getActiveSheet()->getStyle('AU1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ffffff')))); // Color blanco
$objXLS->getActiveSheet()->getStyle('BP1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ffffff')))); // Color blanco
// ###### COLOR TEXTO ROJO ######
//		FRANJAS AZULES
$objXLS->getActiveSheet()->getStyle('A1:F1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ff4b4b')))); // Color rojo
$objXLS->getActiveSheet()->getStyle('M1:R1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ff4b4b')))); // Color rojo
$objXLS->getActiveSheet()->getStyle('U1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ff4b4b')))); // Color rojo
$objXLS->getActiveSheet()->getStyle('W1:X1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ff4b4b')))); // Color rojo
$objXLS->getActiveSheet()->getStyle('BH1:BJ1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ff4b4b')))); // Color rojo
// ###### COLOR TEXTO NARANJA ######
//		FRANJAS VERDES
$objXLS->getActiveSheet()->getStyle('BA1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ffffff')))); // Color naranja
$objXLS->getActiveSheet()->getStyle('BC1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ffffff')))); // Color naranja
$objXLS->getActiveSheet()->getStyle('BF1:BG1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ffffff')))); // Color naranja


$objSheet->setCellValue('A1', 'TIPO_TRAMITACION*');
$objSheet->setCellValue('B1', 'FECHA_VENTA*');
$objSheet->setCellValue('C1', 'NOMBRE_TITULAR*');
$objSheet->setCellValue('D1', 'APELLIDOS_TITULAR*');
$objSheet->setCellValue('E1', 'DNI_CIF_TITULAR*');
$objSheet->setCellValue('F1', 'TELEFONO_PREF_1*');
$objSheet->setCellValue('G1', 'TELEFONO_PREF_2');
$objSheet->setCellValue('H1', 'TELEFONO_1');
$objSheet->setCellValue('I1', 'TELEFONO_2');
$objSheet->setCellValue('J1', 'TELF_3/OP_CAMPO');
$objSheet->setCellValue('K1', 'TELF_4/COD_COM');

$objSheet->setCellValue('L1', 'IDIOMA');

$objSheet->setCellValue('M1', 'PROVINCIA_PS*');
$objSheet->setCellValue('N1', 'MUNICIPIO_PS*');
$objSheet->setCellValue('O1', 'POBLACION_PS*');
$objSheet->setCellValue('P1', 'TIPO_VIA_PS*');
$objSheet->setCellValue('Q1', 'CALLE_PS*');
$objSheet->setCellValue('R1', 'NUMERO_PS*');
$objSheet->setCellValue('S1', 'DUPLICADOR_PS');
$objSheet->setCellValue('T1', 'ESCALERA_PS');
$objSheet->setCellValue('U1', 'PISO_PS*');
$objSheet->setCellValue('V1', 'LETRA_PS');
$objSheet->setCellValue('W1', 'COD_POSTAL_PS*');
$objSheet->setCellValue('X1', 'PAIS_PS*');
$objSheet->setCellValue('Y1', 'ACLARACION_DIRECCION_PS');
$objSheet->setCellValue('Z1', 'ESTADO_LUZ');
$objSheet->setCellValue('AA1', 'ESTADO_GAS');
$objSheet->setCellValue('AB1', 'TIENE_FUN_PS');
$objSheet->setCellValue('AC1', 'PLAN_DESTINO_LUZ');
$objSheet->setCellValue('AD1', 'PLAN_DESTINO_GAS');
$objSheet->setCellValue('AE1', 'PLAN_DESTINO_FUN');
$objSheet->setCellValue('AF1', 'TIPO_ALTA_LUZ');
$objSheet->setCellValue('AG1', 'TIPO_ALTA_GAS');
$objSheet->setCellValue('AH1', 'TIPO_ALTA_FUN');
$objSheet->setCellValue('AI1', 'DESCUENTO_LUZ');
$objSheet->setCellValue('AJ1', 'DESCUENTO_GAS');
$objSheet->setCellValue('AK1', 'COD_VERIFICACION');
$objSheet->setCellValue('AL1', 'CUPS_LUZ');
$objSheet->setCellValue('AM1', 'CUPS_GAS');
$objSheet->setCellValue('AN1', 'TARIFA_REF_LUZ');
$objSheet->setCellValue('AO1', 'TARIFA_REF_GAS');
$objSheet->setCellValue('AP1', 'TOT_ACTIVA_LUZ');
$objSheet->setCellValue('AQ1', 'POT_CONTR_LUZ (P2)');
$objSheet->setCellValue('AR1', 'POT_CONTR_PUNTA (P1)');
$objSheet->setCellValue('AS1', 'POT_CONTR_VALLE (P3)');
$objSheet->setCellValue('AT1', 'FASES');
$objSheet->setCellValue('AU1', 'MAXIMETRO');
$objSheet->setCellValue('AV1', 'VERS_FUNCIONA');
$objSheet->setCellValue('AW1', 'MODAL_FUNCIONA');
$objSheet->setCellValue('AX1', 'MARCA_CALDERA');
$objSheet->setCellValue('AY1', 'CONTRATA_OPCION_CLIMA');
$objSheet->setCellValue('AZ1', 'MARCA_APARATO_CLIMATIZACION');
$objSheet->setCellValue('BA1', 'CONTRATA_EFACTURA*');
$objSheet->setCellValue('BB1', 'CORREO_ELECTRON');
$objSheet->setCellValue('BC1', 'CUENTA_BANCARIA*');
$objSheet->setCellValue('BD1', 'CNAE_LUZ');
$objSheet->setCellValue('BE1', 'CNAE_GAS');
$objSheet->setCellValue('BF1', 'DIRECCION_CLIENTE*');
$objSheet->setCellValue('BG1', 'DIRECCION_ENVIO_FACTURAS*');

$objSheet->setCellValue('BH1', 'CONSENTIM_IMPLICITO_RGPD*');
$objSheet->setCellValue('BI1', 'EXPL_ABAND_PROD_TIT*');
$objSheet->setCellValue('BJ1', 'EXPL_PERFLD_TIT*');

$objSheet->setCellValue('BK1', 'REPRESENTANTE_NOMBRE');
$objSheet->setCellValue('BL1', 'REPRESENTANTE_APELLIDOS');
$objSheet->setCellValue('BM1', 'DNI_CIF_REPRESENTANTE');
$objSheet->setCellValue('BN1', 'RELACION_REPRESENTANTE_TITULAR');
$objSheet->setCellValue('BO1', 'APORTA_CIE');
$objSheet->setCellValue('BP1', 'COD_VENTA_ESPONTANEA');
$objSheet->setCellValue('BQ1', 'CLIENTE_PROVINCIA_OTRA');
$objSheet->setCellValue('BR1', 'CLIENTE_MUNICIPIO_OTRA');
$objSheet->setCellValue('BS1', 'CLIENTE_POBLACION_OTRA');
$objSheet->setCellValue('BT1', 'CLIENTE_TIPO_VIA_OTRA');
$objSheet->setCellValue('BU1', 'CLIENTE_CALLE_OTRA');
$objSheet->setCellValue('BV1', 'CLIENTE_NUMERO_OTRA');
$objSheet->setCellValue('BW1', 'CLIENTE_DUPLICADOR_OTRA');
$objSheet->setCellValue('BX1', 'CLIENTE_ESCALERA_OTRA');
$objSheet->setCellValue('BY1', 'CLIENTE_PISO_OTRA');
$objSheet->setCellValue('BZ1', 'CLIENTE_LETRA_OTRA');
$objSheet->setCellValue('CA1', 'CLIENTE_COD_POSTAL_OTRA');
$objSheet->setCellValue('CB1', 'CLIENTE_PAIS_OTRA');
$objSheet->setCellValue('CC1', 'PROVINCIA_EF_OTRA');
$objSheet->setCellValue('CD1', 'MUNICIPIO_EF_OTRA');
$objSheet->setCellValue('CE1', 'POBLACION_EF_OTRA');
$objSheet->setCellValue('CF1', 'TIPO_VIA_EF_OTRA');
$objSheet->setCellValue('CG1', 'CALLE_EF_OTRA');
$objSheet->setCellValue('CH1', 'NUMERO_EF_OTRA');
$objSheet->setCellValue('CI1', 'DUPLICADOR_EF_OTRA');
$objSheet->setCellValue('CJ1', 'ESCALERA_EF_OTRA');
$objSheet->setCellValue('CK1', 'PISO_EF_OTRA');
$objSheet->setCellValue('CL1', 'LETRA_EF_OTRA');
$objSheet->setCellValue('CM1', 'COD_POSTAL_EF_OTRA');
$objSheet->setCellValue('CN1', 'PAIS_EF_OTRA');
$objSheet->setCellValue('CO1', 'MARCA_SOCIA');
$objSheet->setCellValue('CP1', 'TARJETA_SOCIA');
$objSheet->setCellValue('CQ1', 'RE:DY');
$objSheet->setCellValue('CR1', 'VERSION_RE:DY');
$objSheet->setCellValue('CS1', 'FACTURA_SEGURA');
$objSheet->setCellValue('CT1', 'EDP_CLICK');
if($_GET['type'] == 'void'){
	$objSheet->setCellValue('CU1', 'CAIDOS');
	$objSheet->setCellValue('CV1', 'MOTIVO');
	$objSheet->setCellValue('CW1', 'WE');
}

if($_GET['type'] == 'contrato'){
	if($_GET['type2'] == 'produccion'){
	  $objSheet->setCellValue('CU1', 'ESTADO');
	}	
} else {
	if($_GET['type2'] == 'produccion'){
	  $objSheet->setCellValue('CU1', 'CAIDOS');
	  $objSheet->setCellValue('CV1', 'MOTIVO');
	  $objSheet->setCellValue('CW1', 'WE');
	}	
}

	$numero=1;
	if($_GET['type'] == 'contrato'){
		if($_GET['type2'] == 'oficial'){
			if($_GET['type3'] == 'fechaintro'){
				$can=mysql_query("SELECT * FROM contratos WHERE subgerente='$_GET[gerente]' AND intro_dia='$_GET[intro_dia]' AND intro_mes='$_GET[intro_mes]' AND intro_ano='$_GET[intro_ano]'");
			} else {
				$can=mysql_query("SELECT * FROM contratos WHERE subgerente='$_GET[gerente]' AND we_dia='$_GET[we_dia]' AND we_mes='$_GET[we_mes]' AND we_ano='$_GET[we_ano]'");
			}
		}
		if($_GET['type2'] == 'operativo'){
			if($_GET['type3'] == 'fechaintro'){
				$can=mysql_query("SELECT * FROM contratos WHERE subgerente2='$_GET[gerente]' AND intro_dia='$_GET[intro_dia]' AND intro_mes='$_GET[intro_mes]' AND intro_ano='$_GET[intro_ano]'");
			} else {
				$can=mysql_query("SELECT * FROM contratos WHERE subgerente2='$_GET[gerente]' AND we_dia='$_GET[we_dia]' AND we_mes='$_GET[we_mes]' AND we_ano='$_GET[we_ano]'");
			}
		}
		if($_GET['type2'] == 'produccion'){
			if($_GET['type3'] == 'fechaintro'){
				$can=mysql_query("SELECT * FROM contratos WHERE subgerente2='$_GET[gerente]' AND intro_dia='$_GET[intro_dia]' AND intro_mes='$_GET[intro_mes]' AND intro_ano='$_GET[intro_ano]'");
			} else {
				$can=mysql_query("SELECT * FROM contratos WHERE subgerente2='$_GET[gerente]' AND we_dia='$_GET[we_dia]' AND we_mes='$_GET[we_mes]' AND we_ano='$_GET[we_ano]'");
			}
		}
	}
	if($_GET['type'] == 'introductor'){
		if($_GET['type2'] == 'fechaintro'){
			$can=mysql_query("SELECT * FROM contratos WHERE user_contrato_intro='$_GET[user_intro]' AND intro_dia='$_GET[intro_dia]' AND intro_mes='$_GET[intro_mes]' AND intro_ano='$_GET[intro_ano]'");
		} else {
			$can=mysql_query("SELECT * FROM contratos WHERE user_contrato_intro='$_GET[user_intro]' AND we_dia='$_GET[we_dia]' AND we_mes='$_GET[we_mes]' AND we_ano='$_GET[we_ano]'");
		}
	}
	if($_GET['type'] == 'void'){
		if($_GET['type2'] == 'oficial'){
			if($_GET['type3'] == 'fechaintro'){
				$can=mysql_query("SELECT * FROM contratos_voids WHERE subgerente='$_GET[gerente]' AND intro_dia='$_GET[intro_dia]' AND intro_mes='$_GET[intro_mes]' AND intro_ano='$_GET[intro_ano]'");
			} else {
				$can=mysql_query("SELECT * FROM contratos_voids WHERE subgerente='$_GET[gerente]' AND we_dia='$_GET[we_dia]' AND we_mes='$_GET[we_mes]' AND we_ano='$_GET[we_ano]'");
			}
		}
		if($_GET['type2'] == 'operativo'){
			if($_GET['type3'] == 'fechaintro'){
				$can=mysql_query("SELECT * FROM contratos_voids WHERE subgerente2='$_GET[gerente]' AND intro_dia='$_GET[intro_dia]' AND intro_mes='$_GET[intro_mes]' AND intro_ano='$_GET[intro_ano]'");
			} else {
				$can=mysql_query("SELECT * FROM contratos_voids WHERE subgerente2='$_GET[gerente]' AND we_dia='$_GET[we_dia]' AND we_mes='$_GET[we_mes]' AND we_ano='$_GET[we_ano]'");
			}
		}
		if($_GET['type2'] == 'produccion'){
			if($_GET['type3'] == 'fechaintro'){
				$can=mysql_query("SELECT * FROM contratos_voids WHERE subgerente2='$_GET[gerente]' AND intro_dia='$_GET[intro_dia]' AND intro_mes='$_GET[intro_mes]' AND intro_ano='$_GET[intro_ano]'");
			} else {
				$can=mysql_query("SELECT * FROM contratos_voids WHERE subgerente2='$_GET[gerente]' AND we_dia='$_GET[we_dia]' AND we_mes='$_GET[we_mes]' AND we_ano='$_GET[we_ano]'");
			}
		}
	}
	
	if($_GET['action'] == 'admin'){
	  $can=mysql_query("SELECT * FROM contratos WHERE we_dia='27' AND we_mes='07'");
	}
	
	while($dato=mysql_fetch_array($can)){
		$numero++;
		$objSheet->setCellValue('A'.$numero, $dato['tipo_tramitacion']);
		if($_GET['type'] == 'void'){
			$objSheet->setCellValue('B'.$numero, substr($dato['fecha_venta'], -2, 2).'/'.substr($dato['fecha_venta'], -5, 2).'/'.substr($dato['fecha_venta'], -10, 4));
		} else {
			$objSheet->setCellValue('B'.$numero, $dato['fecha_venta']);
		}
		$objSheet->setCellValue('C'.$numero, $dato['nombre_titular']);
		$objSheet->setCellValue('D'.$numero, $dato['apellidos_titular']);
		$objSheet->setCellValue('E'.$numero, $dato['dni_cif_titular']);
		$objSheet->setCellValue('F'.$numero, $dato['telefono_pref_1']);
		$objSheet->setCellValue('G'.$numero, $dato['telefono_pref_2']);
		$objSheet->setCellValue('H'.$numero, $dato['telefono_1']);
		$objSheet->setCellValue('I'.$numero, $dato['telefono_2']);
		$objSheet->setCellValue('J'.$numero);
		$objSheet->setCellValue('K'.$numero, $dato['codigo_comercial']);
		$objSheet->setCellValue('L'.$numero);
		$objSheet->setCellValue('M'.$numero, substr($dato['cod_postal_ps'], -8, 2).' - '.$dato['municipio_ps']);
		$objSheet->setCellValue('N'.$numero, $dato['municipio_ps']);
		$objSheet->setCellValue('O'.$numero, $dato['poblacion_ps']);
		$objSheet->setCellValue('P'.$numero, $dato['tipo_via_ps']);
		$objSheet->setCellValue('Q'.$numero, $dato['calle_ps']);
		$objSheet->setCellValue('R'.$numero, $dato['numero_ps']);
		$objSheet->setCellValue('S'.$numero);
		$objSheet->setCellValue('T'.$numero, $dato['escalera_ps']);
		$objSheet->setCellValue('U'.$numero, $dato['piso_ps']);
		$objSheet->setCellValue('V'.$numero, $dato['letra_ps']);
		$objSheet->setCellValue('W'.$numero, $dato['cod_postal_ps']);
		$objSheet->setCellValue('X'.$numero, 'ES - ESPAÑA');
		$objSheet->setCellValue('Y'.$numero, $dato['aclaracion_direccion_ps']);
		$objSheet->setCellValue('Z'.$numero, $dato['estado_luz']);
		$objSheet->setCellValue('AA'.$numero, $dato['estado_gas']);
		$objSheet->setCellValue('AB'.$numero, $dato['tiene_fun_ps']);
		$objSheet->setCellValue('AC'.$numero, $dato['plan_destino_luz']);
		$objSheet->setCellValue('AD'.$numero, $dato['plan_destino_gas']);
		$objSheet->setCellValue('AE'.$numero, $dato['plan_destino_fun']);
		if($dato['tipo_alta_luz'] == '') {
			$objSheet->setCellValue('AF'.$numero, 'NA');
		} else {
			$objSheet->setCellValue('AF'.$numero, $dato['tipo_alta_luz']);
		}
		if($dato['tipo_alta_gas'] == '') {
			$objSheet->setCellValue('AG'.$numero, 'NA');
		} else {
			$objSheet->setCellValue('AG'.$numero, $dato['tipo_alta_gas']);
		}
		$objSheet->setCellValue('AH'.$numero, $dato['tipo_alta_fun']);
		$objSheet->setCellValue('AI'.$numero, $dato['descuento_luz']);
		$objSheet->setCellValue('AJ'.$numero, $dato['descuento_gas']);
		$objSheet->setCellValue('AK'.$numero, 'V'.$dato['cod_verificacion']);
		$objSheet->setCellValue('AL'.$numero, $dato['cups_luz']);
		$objSheet->setCellValue('AM'.$numero, $dato['cups_gas']);
		$objSheet->setCellValue('AN'.$numero, $dato['tarifa_ref_luz']);
		$objSheet->setCellValue('AO'.$numero, $dato['tarifa_ref_gas']);
		$objSheet->setCellValue('AP'.$numero, $dato['consumo_pyme']);
		$objSheet->setCellValue('AQ'.$numero, $dato['potencia_p1']);
		$objSheet->setCellValue('AR'.$numero, $dato['potencia_p2']);
		$objSheet->setCellValue('AS'.$numero, $dato['potencia_p3']);
		$objSheet->setCellValue('AT'.$numero);
		if($dato['maximetro'] == '') {
			$objSheet->setCellValue('AU'.$numero, 'NO');
		} elseif(strtoupper($dato['maximetro']) == 'NO') {
			$objSheet->setCellValue('AU'.$numero, 'NO');
		} else {
			$objSheet->setCellValue('AU'.$numero, 'SI');
		}
		$objSheet->setCellValue('AV'.$numero, $dato['vers_funciona']);
		$objSheet->setCellValue('AW'.$numero, $dato['modal_funciona']);
		$objSheet->setCellValue('AX'.$numero, $dato['marca_caldera']);
		if($dato['contrata_opcion_clima'] == ''){
			$objSheet->setCellValue('AY'.$numero, 'NO');
		} else {
			$objSheet->setCellValue('AY'.$numero, $dato['contrata_opcion_clima']);
		}
		$objSheet->setCellValue('AZ'.$numero, $dato['marca_aparato_climatizacion']);
		if($dato['correo_electron'] == ''){
			$objSheet->setCellValue('BA'.$numero, 'NO');
		} else {
			$objSheet->setCellValue('BA'.$numero, 'SI');
		}
		$objSheet->setCellValue('BB'.$numero, $dato['correo_electron']);
		$objSheet->setCellValue('BC'.$numero, ' ' . $dato['ccc_1'] . '' . $dato['ccc_2'] . '' . $dato['ccc_3'] . '' . $dato['ccc_4']);
		if($dato['cups_luz'] == ''){
			$objSheet->setCellValue('BE'.$numero, $dato['cnae']);
		} elseif($dato['cups_gas'] == '') {
			$objSheet->setCellValue('BD'.$numero, $dato['cnae']);
		} else {
			$objSheet->setCellValue('BD'.$numero, $dato['cnae']);
			$objSheet->setCellValue('BE'.$numero, $dato['cnae']);
		}
		// Otra dirección > Cliente
		if($dato['cliente_calle_otra'] == ''){
			$objSheet->setCellValue('BF'.$numero, 'PS');
		} else {
			$objSheet->setCellValue('BF'.$numero, 'OTRA');
			
			$objSheet->setCellValue('BQ'.$numero, substr($dato['cliente_cod_postal_otra'], -8, 2).' - '.$dato['cliente_municipio_otra']);
			$objSheet->setCellValue('BR'.$numero, $dato['cliente_municipio_otra']);
			$objSheet->setCellValue('BS'.$numero, $dato['cliente_poblacion_otra']);
			$objSheet->setCellValue('BT'.$numero, $dato['cliente_tipo_via_otra']);
			$objSheet->setCellValue('BU'.$numero, $dato['cliente_calle_otra']);
			$objSheet->setCellValue('BV'.$numero, $dato['cliente_numero_otra']);
			$objSheet->setCellValue('BW'.$numero);
			$objSheet->setCellValue('BX'.$numero, $dato['cliente_escalera_otra']);
			$objSheet->setCellValue('BY'.$numero, $dato['cliente_piso_otra']);
			$objSheet->setCellValue('BZ'.$numero, $dato['cliente_letra_otra']);
			$objSheet->setCellValue('CA'.$numero, $dato['cliente_cod_postal_otra']);
			$objSheet->setCellValue('CB'.$numero, 'ES - ESPAÑA');
		}
		// Otra dirección > Envío Factura
		if($dato['calle_ef_otra'] == ''){
			$objSheet->setCellValue('BG'.$numero, 'PS');
		} else {
			$objSheet->setCellValue('BG'.$numero, 'OTRA');
			$objSheet->setCellValue('CC'.$numero, substr($dato['cod_postal_ef_otra'], -8, 2).' - '.$dato['municipio_ef_otra']);
			$objSheet->setCellValue('CD'.$numero, $dato['municipio_ef_otra']);
			$objSheet->setCellValue('CE'.$numero, $dato['poblacion_ef_otra']);
			$objSheet->setCellValue('CF'.$numero, $dato['tipo_via_ef_otra']);
			$objSheet->setCellValue('CG'.$numero, $dato['calle_ef_otra']);
			$objSheet->setCellValue('CH'.$numero, $dato['numero_ef_otra']);
			$objSheet->setCellValue('CI'.$numero, '');
			$objSheet->setCellValue('CJ'.$numero, $dato['escalera_ef_otra']);
			$objSheet->setCellValue('CK'.$numero, $dato['piso_ef_otra']);
			$objSheet->setCellValue('CL'.$numero, $dato['letra_ef_otra']);
			$objSheet->setCellValue('CM'.$numero, $dato['cod_postal_ef_otra']);
			$objSheet->setCellValue('CN'.$numero, 'ES - ESPAÑA');			
		}
		if($dato['impl_explicito'] == 'SI'){
			$objSheet->setCellValue('BH'.$numero, $dato['impl']);
			$objSheet->setCellValue('BI'.$numero, 'SI');
			$objSheet->setCellValue('BJ'.$numero, 'SI');
		} elseif($dato['impl_explicito'] == 'NO') {
			$objSheet->setCellValue('BH'.$numero, $dato['impl']);
			$objSheet->setCellValue('BI'.$numero, 'NO');
			$objSheet->setCellValue('BJ'.$numero, 'NO');
		} else {
			$objSheet->setCellValue('BH'.$numero, $dato['impl']);
			$objSheet->setCellValue('BI'.$numero, 'NO');
			$objSheet->setCellValue('BJ'.$numero, 'NO');
		}
		$objSheet->setCellValue('BK'.$numero, $dato['representante_nombre']);
		$objSheet->setCellValue('BL'.$numero, $dato['representante_apellidos']);
		$objSheet->setCellValue('BM'.$numero, $dato['dni_cif_representante']);
		if($dato['relacion_representante_titular'] == 'Cónyuge/pareja registrada'){
			$objSheet->setCellValue('BN'.$numero, 'PAREJA REGISTRADA / CONYUGE');
		} elseif($dato['relacion_representante_titular'] == 'Ascendiente/descendiente'){
			$objSheet->setCellValue('BN'.$numero, 'ASCENDIENTE / DESCENDIENTE');
		} elseif($dato['relacion_representante_titular'] == 'Apoderado'){
			$objSheet->setCellValue('BN'.$numero, 'APODERADO');
		} else {
			$objSheet->setCellValue('BN'.$numero, $dato['relacion_representante_titular']);
		}
		if($dato['representante_nombre'] == ''){
			$objSheet->setCellValue('BO'.$numero);
		} else {
			$objSheet->setCellValue('BO'.$numero, 'SI');
		}
		$objSheet->setCellValue('BP'.$numero, ' ' . $dato['cig']);
		if($dato['tarjeta_socia'] == ''){
			$objSheet->setCellValue('CO'.$numero);
		} else {
			$objSheet->setCellValue('CO'.$numero, 'CARREFOUR');
			$objSheet->setCellValue('CP'.$numero, $dato['tarjeta_socia']);
		}
		if($_GET['type'] == 'void'){
			$objSheet->setCellValue('CU'.$numero, 'VOID');
			$objSheet->setCellValue('CV'.$numero, $dato['motivo']);
			$objSheet->setCellValue('CW'.$numero, $dato['we_dia'] . '/' . $dato['we_mes'] . '/' . $dato['we_ano']);
		}
		if($_GET['type'] == 'contrato'){
			if($_GET['type2'] == 'produccion'){
			  $objSheet->setCellValue('CU'.$numero, $dato['estado_contrato']);
			  //$objSheet->setCellValue('CV'.$numero, $dato['motivo']);
			  //$objSheet->setCellValue('CW'.$numero, $dato['we_dia'] . '/' . $dato['we_mes'] . '/' . $dato['we_ano']);
			}	
		} else {
			if($_GET['type2'] == 'produccion'){
			  $objSheet->setCellValue('CU'.$numero, 'VOID');
			  $objSheet->setCellValue('CV'.$numero, $dato['motivo']);
			  $objSheet->setCellValue('CW'.$numero, $dato['we_dia'] . '/' . $dato['we_mes'] . '/' . $dato['we_ano']);
			}	
		}
	}
	
$objXLS->getActiveSheet()->getColumnDimension("A")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("B")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("C")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("D")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("E")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("F")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("G")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("H")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("I")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("J")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("K")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("L")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("M")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("N")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("O")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("P")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("Q")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("R")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("S")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("T")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("U")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("V")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("W")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("X")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("Y")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("Z")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("AA")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("AB")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("AC")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("AD")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("AE")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("AF")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("AG")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("AH")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("AI")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("AJ")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("AK")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("AL")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("AM")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("AN")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("AO")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("AP")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("AQ")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("AR")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("AS")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("AT")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("AU")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("AV")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("AW")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("AX")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("AY")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("AZ")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("BA")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("BB")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("BC")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("BD")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("BE")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("BF")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("BG")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("BH")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("BI")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("BJ")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("BK")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("BL")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("BM")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("BN")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("BO")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("BP")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("BQ")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("BR")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("BS")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("BT")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("BU")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("BV")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("BW")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("BX")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("BY")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("BZ")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("CA")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("CB")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("CC")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("CD")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("CE")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("CF")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("CG")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("CH")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("CI")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("CJ")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("CK")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("CL")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("CM")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("CN")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("CO")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("CP")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("CQ")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("CR")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("CS")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("CT")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("CU")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("CV")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("CW")->setAutoSize(true);
$objXLS->getActiveSheet()->setTitle('IMPORT');
$objXLS->setActiveSheetIndex(0);
$carpeta = __DIR__ . '\CARGA EDP_'. date(Y) .''. date(m) .''. date(d) .'';
if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);
}
$objWriter = PHPExcel_IOFactory::createWriter($objXLS, 'Excel5');
if($_GET['action'] == 'admin'){
		$objWriter->save($carpeta . "\ADMIN_". utf8_decode($_GET[gerente]) ."_". date("dmY") .".xls");
		echo '<meta http-equiv="refresh" content="1; url='. $site .'/excel/CARGA EDP_'. date(Y) .''. date(m) .''. date(d) .'/ADMIN_'. utf16_2_utf8($_GET[gerente]) .'_'. date("dmY") .'.xls" />';
}
//echo 'Archivo Guardado en '.(__DIR__ . "\'. $carpeta .'Import.xls");
//echo '<script>
//    swal({
//      type: "success",
//      title: "Excel generado",
//      showConfirmButton: false
//    })</script>
//	<script>
//	function redireccionarUsuario() {
//	  window.location = "../index.php?page=exportar";
//	}
//	setTimeout("redireccionarUsuario()", 1500);
//	</script>
//	';
?>