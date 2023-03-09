<?php
  require 'inc/core.php';
  if (isset($_SESSION['id'])) {} else {
  	header("Location: ". $config[site] ."/login.php");
  }
  $page = "Contratos";
  require 'templates/header.php';
  
?>
 <?php  
 $connect = mysqli_connect("localhost", "root", "", "mimatik");  
 include ("excel/Classes/PHPExcel/IOFactory.php");  
 $html="<table border='1'>";  
 $objPHPExcel = PHPExcel_IOFactory::load('xd3.xlsx');  
 foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)   
 {  
      $highestRow = $worksheet->getHighestRow();  
      for ($row=2; $row<=$highestRow; $row++)  
      {  
           $html.="<tr>";  
           $distribuidor =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());  
           $gerente =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());  
           $subgerente =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());  
           $oficina =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());  
           $zona_edp =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
           $codigo_interno =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
           $nombre =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
           $primer_apellido =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(7, $row)->getValue());
           $segundo_apellido =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(8, $row)->getValue());
           $nif =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(9, $row)->getValue());
           $laboral =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(10, $row)->getValue());
           $fecha_alta =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(11, $row)->getValue());
           $petic =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(12, $row)->getValue());
           $recep =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(13, $row)->getValue());
           $fecha_baja =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(14, $row)->getValue());
           $observaciones =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(15, $row)->getValue());
           $observaciones_2 =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(16, $row)->getValue());
           $observaciones_3 =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(17, $row)->getValue());
           $observaciones_style =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(18, $row)->getValue());
		   if($gerente == ''){
			   $gerente =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());  
		   } else {
			   $gerente =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());  
		   }
           $sql = "INSERT INTO click_comerciales_copy(distribuidor,gerente,subgerente,oficina,zona_edp,codigo_interno,nombre,primer_apellido,segundo_apellido,nif,laboral,fecha_alta,petic,recep,fecha_baja,observaciones,observaciones_2,observaciones_3,observaciones_style) VALUES 
		   ('".$distribuidor."', '".$gerente."', '".$subgerente."', '".$oficina."', '".$zona_edp."', '".$codigo_interno."', '".$nombre."', '".$primer_apellido."', '".$segundo_apellido."', '".$nif."', '".$laboral."', '".$fecha_alta."', '".$petic."', '".$recep."', '".$fecha_baja."', '".$observaciones."', '".$observaciones_2."', '".$observaciones_3."', '".$observaciones_style."')";  
           mysqli_query($connect, $sql);  
           $html.= '<td>'.$distribuidor.'</td>';  
           $html .= '<td>'.$gerente.'</td>';  
           $html .= '<td>'.$subgerente.'</td>';  
           $html .= '<td>'.$oficina.'</td>';  
           $html .= '<td>'.$zona_edp.'</td>';  
           $html .= "</tr>";  
      }  
 }  
 $html .= '</table>';  
 echo $html;  
 echo '<br />Data Inserted';  
 ?>  
asdasd