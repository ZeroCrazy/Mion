<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
//error_reporting(E_ALL);
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
cellColor('A1:Q1', '9966ff'); // Fondo color lila

 $objXLS->getActiveSheet()->getStyle('A1:Q1')->applyFromArray($estilo);
// Color de fondo 'Casilla', 'Color'
// ###### COLOR LILA ######

$sheet = $objXLS->getActiveSheet();

// Cambiar campo a "Texto"
$sheet->getStyle('A:Q')
        ->getNumberFormat()
        ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);

$objXLS->getActiveSheet()->getStyle('A1:Q1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ffffff')))); // Color blanco

$objSheet->setCellValue('A1', 'DISTRIBUIDOR');
$objSheet->setCellValue('B1', 'GERENTE');
$objSheet->setCellValue('C1', 'POBLACION');
$objSheet->setCellValue('D1', 'ZONA EDP');
$objSheet->setCellValue('E1', 'CODIGO INTERNO');
$objSheet->setCellValue('F1', 'NOMBRE');
$objSheet->setCellValue('G1', '1er APELLIDO');
$objSheet->setCellValue('H1', '2º APELLIDO');
$objSheet->setCellValue('I1', 'NIF');
$objSheet->setCellValue('J1', 'LABORAL');
$objSheet->setCellValue('K1', 'FECHA ALTA');
$objSheet->setCellValue('L1', 'PETIC');
$objSheet->setCellValue('M1', 'RECEP.');
$objSheet->setCellValue('N1', 'FECHA BAJA');
$objSheet->setCellValue('O1', 'OBSERVACIONES');
$objSheet->setCellValue('P1', 'OBSERVACIONES2');
$objSheet->setCellValue('Q1', 'OBSERVACIONES3');
$objSheet->setCellValue('R1', 'COLOR');

	$numero=1;
	$can=mysql_query("SELECT * FROM click_comerciales");
	while($dato=mysql_fetch_array($can)){
		$numero++;
		//if($dato['observaciones_style'] == 'red') {
		//	cellColor('A'. $numero .':O'. $numero .'', 'ff0000');	// ROJO
		//}
		//if($dato['observaciones_style'] == 'blue') {
		//	cellColor('A'. $numero .':C'. $numero .'', '9bbb59');	// VERDE
		//	cellColor('D'. $numero .':K'. $numero .'', '00b0f0');	// AZUL
		//}
		//if($dato['observaciones_style'] == 'orange') {
		//	cellColor('A'. $numero .':C'. $numero .'', '9bbb59');	// VERDE
		//	cellColor('D'. $numero .':K'. $numero .'', 'ffc000');	// AMARILLO
		//}
		$objSheet->setCellValue('A'.$numero, $dato['distribuidor']);
		$objSheet->setCellValue('B'.$numero, $dato['gerente']);
		$objSheet->setCellValue('C'.$numero, $dato['poblacion']);
		$objSheet->setCellValue('D'.$numero, $dato['zona_edp']);
		$objSheet->setCellValue('E'.$numero, $dato['codigo_interno']);
		$objSheet->setCellValue('F'.$numero, $dato['nombre']);
		$objSheet->setCellValue('G'.$numero, $dato['primer_apellido']);
		$objSheet->setCellValue('H'.$numero, $dato['segundo_apellido']);
		$objSheet->setCellValue('I'.$numero, $dato['nif']);
		$objSheet->setCellValue('J'.$numero, $dato['laboral']);
		$objSheet->setCellValue('K'.$numero, $dato['fecha_alta']);
		if($dato['petic'] == 'PTE. SOLIC.') {
			$objSheet->setCellValue('L'.$numero, $dato['petic']);
			cellColor('L'. $numero .'', 'ffc000');	// NARANJA
		} elseif($dato['petic'] == ''. substr($dato[petic], -10, 2) .'/'. substr($dato[petic], -7, 2) .'/'. substr($dato[petic], -4, 4) .'') {
			$objSheet->setCellValue('L'.$numero, $dato['petic']);
			cellColor('L'. $numero .'', '7b1a2f');	// GRANATE
		} else {
			$objSheet->setCellValue('L'.$numero, $dato['petic']);
		}
		$objSheet->setCellValue('M'.$numero, $dato['recep']);
		$objSheet->setCellValue('N'.$numero, $dato['fecha_baja']);
		if($dato['observaciones'] == 'CTAIMA ON') {
			cellColor('O'. $numero .'', '00b0f0');	// AZUL
		}
		if($dato['observaciones'] == 'CTAIMA OFF') {
			cellColor('O'. $numero .'', 'ff0000');	// ROJO
		}
		if($dato['observaciones'] == 'NO') {
			cellColor('O'. $numero .'', 'ff0000');	// ROJO
		}
		if($dato['observaciones'] == 'NO CTAIMA') {
			cellColor('O'. $numero .'', 'ff0000');	// ROJO
		}
		if($dato['observaciones'] == 'PTE CTAIMA') {
			cellColor('O'. $numero .'', 'ffff00');	// AMARILLO
		}
		if($dato['observaciones'] == 'A MEDIAS') {
			cellColor('O'. $numero .'', 'ffff00');	// AMARILLO
		}
		
		$objSheet->setCellValue('O'.$numero, $dato['observaciones']);
		$objSheet->setCellValue('P'.$numero, $dato['observaciones_2']);
		$objSheet->setCellValue('Q'.$numero, $dato['observaciones_3']);
		if($dato['observaciones_style'] == 'green') {
			cellColor('A'. $numero .':C'. $numero .'', '9bbb59');// VERDE
		}
		if($dato['observaciones_style'] == 'red') {
			cellColor('A'. $numero .':O'. $numero .'', 'ff0000');	// ROJO
		}
		if($dato['observaciones_style'] == 'brown') {
			cellColor('A'. $numero .':O'. $numero .'', 'da9694');	// MARRÓN
		}
		if($dato['observaciones_style'] == 'orange') {
			cellColor('A'. $numero .':C'. $numero .'', '9bbb59');	// VERDE
			cellColor('D'. $numero .':K'. $numero .'', 'ffc000');	// NARANJA
		}
		if($dato['observaciones_style'] == 'blue') {
			cellColor('A'. $numero .':C'. $numero .'', '9bbb59');	// VERDE
			cellColor('D'. $numero .':K'. $numero .'', '00b0f0');	// AZUL
		}
		if($dato['observaciones_style'] == 'yellow') {
			cellColor('A'. $numero .':C'. $numero .'', '9bbb59');	// VERDE
			cellColor('D'. $numero .':K'. $numero .'', 'ffff00');	// AMARILLO
		}
		//$objSheet->setCellValue('R'.$numero, $dato['observaciones_style']);
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
$objXLS->getActiveSheet()->setTitle('IMPORT');
$objXLS->setActiveSheetIndex(0);
$carpeta = __DIR__ . '\CARGA EDP_'. date(Y) .''. date(m) .''. date(d) .'';
if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);
}
$objWriter = PHPExcel_IOFactory::createWriter($objXLS, 'Excel2007');
$objWriter->save($carpeta . "\EXCEL COMERCIALES.xls");
echo '<meta http-equiv="refresh" content="1; url='. $site .'/excel/CARGA EDP_'. date(Y) .''. date(m) .''. date(d) .'/EXCEL COMERCIALES.xls" />';
echo '<script>
    swal({
      type: "success",
      title: "Excel generado",
      showConfirmButton: false
    })</script>
	<script>
	function redireccionarUsuario() {
	  window.location = "../index.php?page=home";
	}
	setTimeout("redireccionarUsuario()", 1500);
	</script>
	';
?>