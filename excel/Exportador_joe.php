<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
//error_reporting(E_ALL);
error_reporting(0);
include_once 'Classes/PHPExcel.php';
require '../inc/core.php';
require '../templates/header.php';
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
// Color de fondo 'Casilla', 'Color'
// ###### COLOR AZUL ######
cellColor('A1:F1', '0404fc');
cellColor('L1:Q1', '0404fc');
cellColor('T1', '0404fc');
cellColor('V1:W1', '0404fc');
cellColor('G1:K1', '0404fc');
cellColor('R1:S1', '0404fc');
cellColor('U1', '0404fc');
cellColor('X1:AL1', '0404fc');
cellColor('AT1', '0404fc');
cellColor('BM1', '0404fc');
// ###### COLOR VERDE ######
cellColor('AM1:AS1', '008000');
cellColor('AU1:AY1', '008000');
cellColor('BA1', '008000');
cellColor('BC1:BD1', '008000');
cellColor('BG1:BL1', '008000');
cellColor('BN1:CQ1', '008000');
cellColor('AZ1', '008000');
cellColor('BB1', '008000');
cellColor('BE1:BF1', '008000');

$sheet = $objXLS->getActiveSheet();

// Cambiar campo a "Texto"
$sheet->getStyle('A2:CQ105')
        ->getNumberFormat()
        ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);

// Formato código postal
$sheet->getStyle('V2:V105')
        ->getNumberFormat()
        ->setFormatCode('00000');
$sheet->getStyle('BX2:BX105')
        ->getNumberFormat()
        ->setFormatCode('00000');
$sheet->getStyle('CJ2:CJ105')
        ->getNumberFormat()
        ->setFormatCode('00000');
$sheet->getStyle('K2:K105')
        ->getNumberFormat()
        ->setFormatCode('00000');
		
// Formato cuenta bancaria
//$sheet->getStyle('BB2:BB105')
//        ->getNumberFormat()
//        ->setFormatCode('00000000');



$objXLS->getActiveSheet()->getStyle('A1:F1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ff4b4b')))); // Color rojo
$objXLS->getActiveSheet()->getStyle('L1:Q1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ff4b4b')))); // Color rojo
$objXLS->getActiveSheet()->getStyle('T1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ff4b4b')))); // Color rojo
$objXLS->getActiveSheet()->getStyle('V1:W1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ff4b4b')))); // Color rojo
$objXLS->getActiveSheet()->getStyle('AM1:AS1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ffffff')))); // Color blanco
$objXLS->getActiveSheet()->getStyle('AU1:AY1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ffffff')))); // Color blanco
$objXLS->getActiveSheet()->getStyle('BA1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ffffff')))); // Color blanco
$objXLS->getActiveSheet()->getStyle('BC1:BD1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ffffff')))); // Color blanco
$objXLS->getActiveSheet()->getStyle('BG1:BL1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ffffff')))); // Color blanco
$objXLS->getActiveSheet()->getStyle('BN1:CQ1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ffffff')))); // Color blanco
$objXLS->getActiveSheet()->getStyle('G1:K1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ffffff')))); // Color blanco
$objXLS->getActiveSheet()->getStyle('R1:S1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ffffff')))); // Color blanco
$objXLS->getActiveSheet()->getStyle('U1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ffffff')))); // Color blanco
$objXLS->getActiveSheet()->getStyle('X1:AL1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ffffff')))); // Color blanco
$objXLS->getActiveSheet()->getStyle('AT1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ffffff')))); // Color blanco
$objXLS->getActiveSheet()->getStyle('BM1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ffffff')))); // Color blanco
$objXLS->getActiveSheet()->getStyle('AZ1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ffffff')))); // Color naranja
$objXLS->getActiveSheet()->getStyle('BB1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ffffff')))); // Color naranja
$objXLS->getActiveSheet()->getStyle('BE1:BF1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ffffff')))); // Color naranja

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
$objSheet->setCellValue('L1', 'PROVINCIA_PS*');
$objSheet->setCellValue('M1', 'MUNICIPIO_PS*');
$objSheet->setCellValue('N1', 'POBLACION_PS*');
$objSheet->setCellValue('O1', 'TIPO_VIA_PS*');
$objSheet->setCellValue('P1', 'CALLE_PS*');
$objSheet->setCellValue('Q1', 'NUMERO_PS*');
$objSheet->setCellValue('R1', 'DUPLICADOR_PS');
$objSheet->setCellValue('S1', 'ESCALERA_PS');
$objSheet->setCellValue('T1', 'PISO_PS*');
$objSheet->setCellValue('U1', 'LETRA_PS');
$objSheet->setCellValue('V1', 'COD_POSTAL_PS*');
$objSheet->setCellValue('W1', 'PAIS_PS*');
$objSheet->setCellValue('X1', 'ACLARACION_DIRECCION_PS');
$objSheet->setCellValue('Y1', 'ESTADO_LUZ');
$objSheet->setCellValue('Z1', 'ESTADO_GAS');
$objSheet->setCellValue('AA1', 'TIENE_FUN_PS');
$objSheet->setCellValue('AB1', 'PLAN_DESTINO_LUZ');
$objSheet->setCellValue('AC1', 'PLAN_DESTINO_GAS');
$objSheet->setCellValue('AD1', 'PLAN_DESTINO_FUN');
$objSheet->setCellValue('AE1', 'TIPO_ALTA_LUZ');
$objSheet->setCellValue('AF1', 'TIPO_ALTA_GAS');
$objSheet->setCellValue('AG1', 'TIPO_ALTA_FUN');
$objSheet->setCellValue('AH1', 'DESCUENTO_LUZ');
$objSheet->setCellValue('AI1', 'DESCUENTO_GAS');
$objSheet->setCellValue('AJ1', 'COD_VERIFICACION');
$objSheet->setCellValue('AK1', 'CUPS_LUZ');
$objSheet->setCellValue('AL1', 'CUPS_GAS');
$objSheet->setCellValue('AM1', 'TARIFA_REF_LUZ');
$objSheet->setCellValue('AN1', 'TARIFA_REF_GAS');
$objSheet->setCellValue('AO1', 'TOT_ACTIVA_LUZ');
$objSheet->setCellValue('AP1', 'POT_CONTR_LUZ (P2)');
$objSheet->setCellValue('AQ1', 'POT_CONTR_PUNTA (P1)');
$objSheet->setCellValue('AR1', 'POT_CONTR_VALLE (P3)');
$objSheet->setCellValue('AS1', 'FASES');
$objSheet->setCellValue('AT1', 'MAXIMETRO');
$objSheet->setCellValue('AU1', 'VERS_FUNCIONA');
$objSheet->setCellValue('AV1', 'MODAL_FUNCIONA');
$objSheet->setCellValue('AW1', 'MARCA_CALDERA');
$objSheet->setCellValue('AX1', 'CONTRATA_OPCION_CLIMA');
$objSheet->setCellValue('AY1', 'MARCA_APARATO_CLIMATIZACION');
$objSheet->setCellValue('AZ1', 'CONTRATA_EFACTURA*');
$objSheet->setCellValue('BA1', 'CORREO_ELECTRON');
$objSheet->setCellValue('BB1', 'CUENTA_BANCARIA*');
$objSheet->setCellValue('BC1', 'CNAE_LUZ');
$objSheet->setCellValue('BD1', 'CNAE_GAS');
$objSheet->setCellValue('BE1', 'DIRECCION_CLIENTE*');
$objSheet->setCellValue('BF1', 'DIRECCION_ENVIO_FACTURAS*');
$objSheet->setCellValue('BG1', 'BLOQUEO_DATOS_LOPD');
$objSheet->setCellValue('BH1', 'REPRESENTANTE_NOMBRE');
$objSheet->setCellValue('BI1', 'REPRESENTANTE_APELLIDOS');
$objSheet->setCellValue('BJ1', 'DNI_CIF_REPRESENTANTE');
$objSheet->setCellValue('BK1', 'RELACION_REPRESENTANTE_TITULAR');
$objSheet->setCellValue('BL1', 'APORTA_CIE');
$objSheet->setCellValue('BM1', 'COD_VENTA_ESPONTANEA');
$objSheet->setCellValue('BN1', 'CLIENTE_PROVINCIA_OTRA');
$objSheet->setCellValue('BO1', 'CLIENTE_MUNICIPIO_OTRA');
$objSheet->setCellValue('BP1', 'CLIENTE_POBLACION_OTRA');
$objSheet->setCellValue('BQ1', 'CLIENTE_TIPO_VIA_OTRA');
$objSheet->setCellValue('BR1', 'CLIENTE_CALLE_OTRA');
$objSheet->setCellValue('BS1', 'CLIENTE_NUMERO_OTRA');
$objSheet->setCellValue('BT1', 'CLIENTE_DUPLICADOR_OTRA');
$objSheet->setCellValue('BU1', 'CLIENTE_ESCALERA_OTRA');
$objSheet->setCellValue('BV1', 'CLIENTE_PISO_OTRA');
$objSheet->setCellValue('BW1', 'CLIENTE_LETRA_OTRA');
$objSheet->setCellValue('BX1', 'CLIENTE_COD_POSTAL_OTRA');
$objSheet->setCellValue('BY1', 'CLIENTE_PAIS_OTRA');
$objSheet->setCellValue('BZ1', 'PROVINCIA_EF_OTRA');
$objSheet->setCellValue('CA1', 'MUNICIPIO_EF_OTRA');
$objSheet->setCellValue('CB1', 'POBLACION_EF_OTRA');
$objSheet->setCellValue('CC1', 'TIPO_VIA_EF_OTRA');
$objSheet->setCellValue('CD1', 'CALLE_EF_OTRA');
$objSheet->setCellValue('CE1', 'NUMERO_EF_OTRA');
$objSheet->setCellValue('CF1', 'DUPLICADOR_EF_OTRA');
$objSheet->setCellValue('CG1', 'ESCALERA_EF_OTRA');
$objSheet->setCellValue('CH1', 'PISO_EF_OTRA');
$objSheet->setCellValue('CI1', 'LETRA_EF_OTRA');
$objSheet->setCellValue('CJ1', 'COD_POSTAL_EF_OTRA');
$objSheet->setCellValue('CK1', 'PAIS_EF_OTRA');
$objSheet->setCellValue('CL1', 'MARCA_SOCIA');
$objSheet->setCellValue('CM1', 'TARJETA_SOCIA');
$objSheet->setCellValue('CN1', 'RE:DY');
$objSheet->setCellValue('CO1', 'VERSION_RE:DY');
$objSheet->setCellValue('CP1', 'FACTURA_SEGURA');
$objSheet->setCellValue('CQ1', 'EDP_CLICK');

	$numero=1;
	$m = mysql_query("SELECT * FROM contratos_estado_historial WHERE referencia='$_GET[referencia]'");
	$can=mysql_query("SELECT * FROM contratos_copy WHERE cod_verificacion='46180215118006'");
	while($dato=mysql_fetch_array($can)){
		$numero++;
		$objSheet->setCellValue('A'.$numero, $dato['tipo_tramitacion']);
		$objSheet->setCellValue('B'.$numero, substr($dato['fecha_venta'], -8, 2).'/'.substr($dato['fecha_venta'], -6, 2).'/'.substr($dato['fecha_venta'], +4, 4));
		$objSheet->setCellValue('C'.$numero, $dato['nombre_titular']);
		$objSheet->setCellValue('D'.$numero, $dato['apellidos_titular']);
		$objSheet->setCellValue('E'.$numero, $dato['dni_cif_titular']);
		$objSheet->setCellValue('F'.$numero, $dato['telefono_pref_1']);
		$objSheet->setCellValue('G'.$numero, $dato['telefono_pref_2']);
		$objSheet->setCellValue('H'.$numero, $dato['telefono_1']);
		$objSheet->setCellValue('I'.$numero, $dato['telefono_2']);
		$objSheet->setCellValue('J'.$numero);
		$objSheet->setCellValue('K'.$numero, $dato['codigo_comercial']);
		$objSheet->setCellValue('L'.$numero, substr($dato['cod_postal_ps'], -8, 2).' - '.$dato['municipio_ps']);
		$objSheet->setCellValue('M'.$numero, $dato['municipio_ps']);
		$objSheet->setCellValue('N'.$numero, $dato['poblacion_ps']);
		$objSheet->setCellValue('O'.$numero, $dato['tipo_via_ps']);
		$objSheet->setCellValue('P'.$numero, $dato['calle_ps']);
		$objSheet->setCellValue('Q'.$numero, $dato['numero_ps']);
		$objSheet->setCellValue('R'.$numero);
		$objSheet->setCellValue('S'.$numero, $dato['escalera_ps']);
		$objSheet->setCellValue('T'.$numero, $dato['piso_ps']);
		$objSheet->setCellValue('U'.$numero, $dato['letra_ps']);
		$objSheet->setCellValue('V'.$numero, $dato['cod_postal_ps']);
		$objSheet->setCellValue('W'.$numero, 'ES - ESPAÑA');
		$objSheet->setCellValue('X'.$numero, $dato['aclaracion_direccion_ps']);
		$objSheet->setCellValue('Y'.$numero, $dato['estado_luz']);
		$objSheet->setCellValue('Z'.$numero, $dato['estado_gas']);
		$objSheet->setCellValue('AA'.$numero, $dato['tiene_fun_ps']);
		$objSheet->setCellValue('AB'.$numero, $dato['plan_destino_luz']);
		$objSheet->setCellValue('AC'.$numero, $dato['plan_destino_gas']);
		$objSheet->setCellValue('AD'.$numero, $dato['plan_destino_fun']);
		if($dato['tipo_alta_luz'] == '') {
			$objSheet->setCellValue('AE'.$numero, 'NA');
		} else {
			$objSheet->setCellValue('AE'.$numero, $dato['tipo_alta_luz']);
		}
		if($dato['tipo_alta_gas'] == '') {
			$objSheet->setCellValue('AF'.$numero, 'NA');
		} else {
			$objSheet->setCellValue('AF'.$numero, $dato['tipo_alta_gas']);
		}
		$objSheet->setCellValue('AG'.$numero, $dato['tipo_alta_fun']);
		$objSheet->setCellValue('AH'.$numero, $dato['descuento_luz']);
		$objSheet->setCellValue('AI'.$numero, $dato['descuento_gas']);
		$objSheet->setCellValue('AJ'.$numero, 'V'.$dato['cod_verificacion']);
		$objSheet->setCellValue('AK'.$numero, $dato['cups_luz']);
		$objSheet->setCellValue('AL'.$numero, $dato['cups_gas']);
		$objSheet->setCellValue('AM'.$numero, $dato['tarifa_ref_luz']);
		$objSheet->setCellValue('AN'.$numero, $dato['tarifa_ref_gas']);
		$objSheet->setCellValue('AO'.$numero, $dato['consumo_pyme']);
		$objSheet->setCellValue('AP'.$numero, $dato['potencia_p1']);
		$objSheet->setCellValue('AQ'.$numero, $dato['potencia_p2']);
		$objSheet->setCellValue('AS'.$numero);
		if($dato['maximetro'] == '') {
			$objSheet->setCellValue('AT'.$numero, 'NO');
		} elseif($dato['maximetro'] == 'No') {
			$objSheet->setCellValue('AT'.$numero, 'NO');
		} else {
			$objSheet->setCellValue('AT'.$numero, 'SI');
		}
		$objSheet->setCellValue('AU'.$numero, $dato['vers_funciona']);
		$objSheet->setCellValue('AV'.$numero, $dato['modal_funciona']);
		$objSheet->setCellValue('AW'.$numero, $dato['marca_caldera']);
		if($dato['contrata_opcion_clima'] == ''){
			$objSheet->setCellValue('AX'.$numero, 'NO');
		} else {
			$objSheet->setCellValue('AX'.$numero, $dato['contrata_opcion_clima']);
		}
		$objSheet->setCellValue('AY'.$numero, $dato['marca_aparato_climatizacion']);
		if($dato['correo_electron'] == ''){
			$objSheet->setCellValue('AZ'.$numero, 'NO');
		} else {
			$objSheet->setCellValue('AZ'.$numero, 'SI');
		}
		$objSheet->setCellValue('BA'.$numero, $dato['correo_electron']);
		$objSheet->setCellValue('BB'.$numero, ' ' . $dato['ccc_1'] . '' . $dato['ccc_2'] . '' . $dato['ccc_3'] . '' . $dato['ccc_4']);
		if($dato['cups_luz'] == ''){
			$objSheet->setCellValue('BD'.$numero, $dato['cnae']);
		} elseif($dato['cups_gas'] == '') {
			$objSheet->setCellValue('BC'.$numero, $dato['cnae']);
		} else {
			$objSheet->setCellValue('BC'.$numero, $dato['cnae']);
			$objSheet->setCellValue('BD'.$numero, $dato['cnae']);
		}
		if($dato['lopd'] == ''){
			$objSheet->setCellValue('BG'.$numero, '');
		} else {
			$objSheet->setCellValue('BG'.$numero, $dato['lopd']);
		}
		$objSheet->setCellValue('BH'.$numero, $dato['representante_nombre']);
		$objSheet->setCellValue('BI'.$numero, $dato['representante_apellidos']);
		$objSheet->setCellValue('BJ'.$numero, $dato['dni_cif_representante']);
		if($dato['relacion_representante_titular'] == 'Cónyuge/pareja registrada'){
			$objSheet->setCellValue('BK'.$numero, 'PAREJA REGISTRADA / CONYUGE');
		} elseif($dato['relacion_representante_titular'] == 'Ascendiente/descendiente'){
			$objSheet->setCellValue('BK'.$numero, 'ASCENDIENTE / DESCENDIENTE');
		} elseif($dato['relacion_representante_titular'] == 'Apoderado'){
			$objSheet->setCellValue('BK'.$numero, 'APODERADO');
		} else {
			$objSheet->setCellValue('BK'.$numero, $dato['relacion_representante_titular']);
		}
		if($dato['representante_nombre'] == ''){
			$objSheet->setCellValue('BL'.$numero, '');
		} else {
			$objSheet->setCellValue('BL'.$numero, 'SI');
		}
		$objSheet->setCellValue('BM'.$numero, $dato['cig']);
		
		// Otra dirección > Cliente
		$objSheet->setCellValue('BO'.$numero, $dato['cliente_municipio_otra']);
		$objSheet->setCellValue('BP'.$numero, $dato['cliente_poblacion_otra']);
		$objSheet->setCellValue('BQ'.$numero, $dato['cliente_tipo_via_otra']);
		$objSheet->setCellValue('BR'.$numero, $dato['cliente_calle_otra']);
		$objSheet->setCellValue('BS'.$numero, $dato['cliente_numero_otra']);
		$objSheet->setCellValue('BT'.$numero, '');
		$objSheet->setCellValue('BU'.$numero, $dato['cliente_escalera_otra']);
		$objSheet->setCellValue('BV'.$numero, $dato['cliente_piso_otra']);
		$objSheet->setCellValue('BW'.$numero, $dato['cliente_letra_otra']);
		$objSheet->setCellValue('BX'.$numero, $dato['cliente_cod_postal_otra']);
		$objSheet->setCellValue('BY'.$numero, 'ES - ESPAÑA');
		if($dato['cliente_calle_otra'] == ''){
			$objSheet->setCellValue('BE'.$numero, 'PS');
		} else {
			$objSheet->setCellValue('BN'.$numero, substr($dato['cliente_cod_postal_otra'], -8, 2).' - '.$dato['cliente_municipio_otra']);
			$objSheet->setCellValue('BE'.$numero, 'OTRA');
		}
		
		// Otra dirección > Envío Factura
		$objSheet->setCellValue('CA'.$numero, $dato['municipio_ef_otra']);
		$objSheet->setCellValue('CB'.$numero, $dato['poblacion_ef_otra']);
		$objSheet->setCellValue('CC'.$numero, $dato['tipo_via_ef_otra']);
		$objSheet->setCellValue('CD'.$numero, $dato['calle_ef_otra']);
		$objSheet->setCellValue('CE'.$numero, $dato['numero_ef_otra']);
		$objSheet->setCellValue('CF'.$numero, '');
		$objSheet->setCellValue('CG'.$numero, $dato['escalera_ef_otra']);
		$objSheet->setCellValue('CH'.$numero, $dato['piso_ef_otra']);
		$objSheet->setCellValue('CI'.$numero, $dato['letra_ef_otra']);
		$objSheet->setCellValue('CJ'.$numero, $dato['cod_postal_ef_otra']);
		$objSheet->setCellValue('CK'.$numero, 'ES - ESPAÑA');
		if($dato['municipio_ef_otra'] == ''){}else{
			$objSheet->setCellValue('BZ'.$numero, substr($dato['cod_postal_ef_otra'], -8, 2).' - '.$dato['municipio_ef_otra']);
		}
		if($dato['calle_ef_otra'] == ''){
			$objSheet->setCellValue('BF'.$numero, 'PS');
		} else {
			$objSheet->setCellValue('BF'.$numero, 'OTRA');
		}
		
		// Envío factura
		if($dato['tarjeta_socia'] == ''){
			$objSheet->setCellValue('CL'.$numero, '');
		} else {
			$objSheet->setCellValue('CL'.$numero, 'CARREFOUR');
		}
		$objSheet->setCellValue('CM'.$numero, $dato['tarjeta_socia']);
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
$objXLS->getActiveSheet()->setTitle('IMPORT');
$objXLS->setActiveSheetIndex(0);
$carpeta = __DIR__ . '\AAAAAAA_'. date(Y) .''. date(m) .''. date(d) .'';
if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);
}
$objWriter = PHPExcel_IOFactory::createWriter($objXLS, 'Excel5');
//$objWriter->save($carpeta . "\CARGA MASIVA.xls");
$objWriter->save($carpeta . "\EXPORT_JOE.xls");
		//echo '<meta http-equiv="refresh" content="1; url='. $site .'/excel/CARGA EDP_'. date(Y) .''. date(m) .''. date(d) .'/EXPORT_MES_'. $_GET[intro_mes] .''. $_GET[intro_ano] .'.xls" />';
//echo 'Archivo Guardado en '.(__DIR__ . "\'. $carpeta .'Import.xls");
echo '<script>
    swal({
      type: "success",
      title: "Excel generado",
      showConfirmButton: false
    })</script>
	';
//echo '<meta http-equiv="refresh" content="2; url='. $site .'/index.php?page=exportar" />';
?>