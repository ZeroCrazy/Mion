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
cellColor('A1:E1', '9966ff'); // Fondo color lila

 $objXLS->getActiveSheet()->getStyle('A1:E1')->applyFromArray($estilo);
// Color de fondo 'Casilla', 'Color'
// ###### COLOR LILA ######

$sheet = $objXLS->getActiveSheet();

// Cambiar campo a "Texto"
$sheet->getStyle('A:Q')
        ->getNumberFormat()
        ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);

$objXLS->getActiveSheet()->getStyle('A1:Q1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ffffff')))); // Color blanco

$objSheet->setCellValue('A1', 'COMERCIAL');
$objSheet->setCellValue('B1', 'SUBCONTRATA');
$objSheet->setCellValue('C1', 'COMENTARIOS');

	$numero=1;
	$can=mysql_query("SELECT * FROM click_comerciales WHERE zona_edp='6' ORDER BY nombre");
	while($dato=mysql_fetch_array($can)){
		$numero++;

		$fecha_baja = new DateTime("". str_replace("/", "-", $dato[fecha_baja]) ."");
		$fecha_alta = new DateTime("". str_replace("/", "-", $dato[fecha_alta]) ."");
		$fecha_hoy = new DateTime("". date('d') . "-" . date('m') . "-" . date('Y') ."");
		if($fecha_hoy > $fecha_baja) {
		  cellColor('A'. $numero .':E'. $numero .'', 'ff0000');	// rojo
		} else {
		  cellColor('A'. $numero .':E'. $numero .'', '9bbb59');	// verde
		}
		$objSheet->setCellValue('A'.$numero, $dato['nombre'] . ' ' . $dato['primer_apellido'] . ' ' . $dato['segundo_apellido']);
		$objSheet->setCellValue('B'.$numero, $dato['distribuidor']);
		$objSheet->setCellValue('C'.$numero, $dato['fecha_baja']);
	}
	
$objXLS->getActiveSheet()->getColumnDimension("A")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("B")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("C")->setAutoSize(true);
$objXLS->getActiveSheet()->setTitle('IMPORT');
$objXLS->setActiveSheetIndex(0);
$carpeta = __DIR__ . '\CARGA EDP_'. date(Y) .''. date(m) .''. date(d) .'';
if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);
}
$objWriter = PHPExcel_IOFactory::createWriter($objXLS, 'Excel2007');
$objWriter->save($carpeta . "\EXCEL COMERCIALES ZONAS.xls");
echo '<meta http-equiv="refresh" content="1; url='. $site .'/excel/CARGA EDP_'. date(Y) .''. date(m) .''. date(d) .'/EXCEL COMERCIALES ZONAS.xls" />';
?>