<?php if($user['view_pagos'] == '0'){ 
echo '<script>sweetAlert("Whoops", "No tienes permisos para acceder aquí", "error");</script>';
echo "<META HTTP-EQUIV='Refresh' CONTENT='1; URL=$site/index.php?page=home'>";
} ?>
<?php if($_GET['subgerente']){ ?>
  <?php $subsql = mysql_query("SELECT * FROM click_gerentes_introductores WHERE id='$_GET[subgerente]'");$s = mysql_fetch_assoc($subsql); ?>
<?php
if (isset($_POST['edit_com'])) {
	$we_dia = $_POST['we_dia'];
	$we_mes = $_POST['we_mes'];
	$we_ano = $_POST['we_ano'];
	
	$residencial_1_mercantil_1 = $_POST['residencial_1_mercantil_1'];
	$residencial_1_mercantil_2 = $_POST['residencial_1_mercantil_2'];
	$residencial_1_mercantil_3 = $_POST['residencial_1_mercantil_3'];
	$residencial_1_laboral_1 =   $_POST['residencial_1_laboral_1'];
	$residencial_1_laboral_2 =   $_POST['residencial_1_laboral_2'];
	$residencial_1_laboral_3 =   $_POST['residencial_1_laboral_3'];
	
	$residencial_2_mercantil_1 = $_POST['residencial_2_mercantil_1'];
	$residencial_2_mercantil_2 = $_POST['residencial_2_mercantil_2'];
	$residencial_2_mercantil_3 = $_POST['residencial_2_mercantil_3'];
	$residencial_2_laboral_1 =   $_POST['residencial_2_laboral_1'];
	$residencial_2_laboral_2 =   $_POST['residencial_2_laboral_2'];
	$residencial_2_laboral_3 =   $_POST['residencial_2_laboral_3'];
	
	$residencial_3_mercantil_1 = $_POST['residencial_3_mercantil_1'];
	$residencial_3_mercantil_2 = $_POST['residencial_3_mercantil_2'];
	$residencial_3_mercantil_3 = $_POST['residencial_3_mercantil_3'];
	$residencial_3_laboral_1 =   $_POST['residencial_3_laboral_1'];
	$residencial_3_laboral_2 =   $_POST['residencial_3_laboral_2'];
	$residencial_3_laboral_3 =   $_POST['residencial_3_laboral_3'];
	
	$residencial_4_mercantil_1 = $_POST['residencial_4_mercantil_1'];
	$residencial_4_mercantil_2 = $_POST['residencial_4_mercantil_2'];
	$residencial_4_mercantil_3 = $_POST['residencial_4_mercantil_3'];
	$residencial_4_laboral_1 =   $_POST['residencial_4_laboral_1'];
	$residencial_4_laboral_2 =   $_POST['residencial_4_laboral_2'];
	$residencial_4_laboral_3 =   $_POST['residencial_4_laboral_3'];
	
	$residencial_5_mercantil_1 = $_POST['residencial_5_mercantil_1'];
	$residencial_5_mercantil_2 = $_POST['residencial_5_mercantil_2'];
	$residencial_5_mercantil_3 = $_POST['residencial_5_mercantil_3'];
	$residencial_5_laboral_1 =   $_POST['residencial_5_laboral_1'];
	$residencial_5_laboral_2 =   $_POST['residencial_5_laboral_2'];
	$residencial_5_laboral_3 =   $_POST['residencial_5_laboral_3'];
	
	$residencial_6_mercantil_1 = $_POST['residencial_6_mercantil_1'];
	$residencial_6_mercantil_2 = $_POST['residencial_6_mercantil_2'];
	$residencial_6_mercantil_3 = $_POST['residencial_6_mercantil_3'];
	$residencial_6_laboral_1 =   $_POST['residencial_6_laboral_1'];
	$residencial_6_laboral_2 =   $_POST['residencial_6_laboral_2'];
	$residencial_6_laboral_3 =   $_POST['residencial_6_laboral_3'];
	
	$residencial_7_mercantil_1 = $_POST['residencial_7_mercantil_1'];
	$residencial_7_mercantil_2 = $_POST['residencial_7_mercantil_2'];
	$residencial_7_mercantil_3 = $_POST['residencial_7_mercantil_3'];
	$residencial_7_laboral_1 =   $_POST['residencial_7_laboral_1'];
	$residencial_7_laboral_2 =   $_POST['residencial_7_laboral_2'];
	$residencial_7_laboral_3 =   $_POST['residencial_7_laboral_3'];
	
	$residencial_8_mercantil_1 = $_POST['residencial_8_mercantil_1'];
	$residencial_8_mercantil_2 = $_POST['residencial_8_mercantil_2'];
	$residencial_8_mercantil_3 = $_POST['residencial_8_mercantil_3'];
	$residencial_8_laboral_1 =   $_POST['residencial_8_laboral_1'];
	$residencial_8_laboral_2 =   $_POST['residencial_8_laboral_2'];
	$residencial_8_laboral_3 =   $_POST['residencial_8_laboral_3'];
	
	$negocio_1_mercantil_1 = $_POST['negocio_1_mercantil_1'];
	$negocio_1_mercantil_2 = $_POST['negocio_1_mercantil_2'];
	$negocio_1_mercantil_3 = $_POST['negocio_1_mercantil_3'];
	$negocio_1_laboral_1 =   $_POST['negocio_1_laboral_1'];
	$negocio_1_laboral_2 =   $_POST['negocio_1_laboral_2'];
	$negocio_1_laboral_3 =   $_POST['negocio_1_laboral_3'];
	
	$negocio_2_mercantil_1 = $_POST['negocio_2_mercantil_1'];
	$negocio_2_mercantil_2 = $_POST['negocio_2_mercantil_2'];
	$negocio_2_mercantil_3 = $_POST['negocio_2_mercantil_3'];
	$negocio_2_laboral_1 =   $_POST['negocio_2_laboral_1'];
	$negocio_2_laboral_2 =   $_POST['negocio_2_laboral_2'];
	$negocio_2_laboral_3 =   $_POST['negocio_2_laboral_3'];
	
	$negocio_3_mercantil_1 = $_POST['negocio_3_mercantil_1'];
	$negocio_3_mercantil_2 = $_POST['negocio_3_mercantil_2'];
	$negocio_3_mercantil_3 = $_POST['negocio_3_mercantil_3'];
	$negocio_3_laboral_1 =   $_POST['negocio_3_laboral_1'];
	$negocio_3_laboral_2 =   $_POST['negocio_3_laboral_2'];
	$negocio_3_laboral_3 =   $_POST['negocio_3_laboral_3'];
	
	$negocio_4_mercantil_1 = $_POST['negocio_4_mercantil_1'];
	$negocio_4_mercantil_2 = $_POST['negocio_4_mercantil_2'];
	$negocio_4_mercantil_3 = $_POST['negocio_4_mercantil_3'];
	$negocio_4_laboral_1 =   $_POST['negocio_4_laboral_1'];
	$negocio_4_laboral_2 =   $_POST['negocio_4_laboral_2'];
	$negocio_4_laboral_3 =   $_POST['negocio_4_laboral_3'];
	
	$negocio_5_mercantil_1 = $_POST['negocio_5_mercantil_1'];
	$negocio_5_mercantil_2 = $_POST['negocio_5_mercantil_2'];
	$negocio_5_mercantil_3 = $_POST['negocio_5_mercantil_3'];
	$negocio_5_laboral_1 =   $_POST['negocio_5_laboral_1'];
	$negocio_5_laboral_2 =   $_POST['negocio_5_laboral_2'];
	$negocio_5_laboral_3 =   $_POST['negocio_5_laboral_3'];
	
	$negocio_6_mercantil_1 = $_POST['negocio_6_mercantil_1'];
	$negocio_6_mercantil_2 = $_POST['negocio_6_mercantil_2'];
	$negocio_6_mercantil_3 = $_POST['negocio_6_mercantil_3'];
	$negocio_6_laboral_1 =   $_POST['negocio_6_laboral_1'];
	$negocio_6_laboral_2 =   $_POST['negocio_6_laboral_2'];
	$negocio_6_laboral_3 =   $_POST['negocio_6_laboral_3'];
	
	$negocio_7_mercantil_1 = $_POST['negocio_7_mercantil_1'];
	$negocio_7_mercantil_2 = $_POST['negocio_7_mercantil_2'];
	$negocio_7_mercantil_3 = $_POST['negocio_7_mercantil_3'];
	$negocio_7_laboral_1 =   $_POST['negocio_7_laboral_1'];
	$negocio_7_laboral_2 =   $_POST['negocio_7_laboral_2'];
	$negocio_7_laboral_3 =   $_POST['negocio_7_laboral_3'];
	
	$negocio_8_mercantil_1 = $_POST['negocio_8_mercantil_1'];
	$negocio_8_mercantil_2 = $_POST['negocio_8_mercantil_2'];
	$negocio_8_mercantil_3 = $_POST['negocio_8_mercantil_3'];
	$negocio_8_laboral_1 =   $_POST['negocio_8_laboral_1'];
	$negocio_8_laboral_2 =   $_POST['negocio_8_laboral_2'];
	$negocio_8_laboral_3 =   $_POST['negocio_8_laboral_3'];
	
	$negocio_9_mercantil_1 = $_POST['negocio_9_mercantil_1'];
	$negocio_9_mercantil_2 = $_POST['negocio_9_mercantil_2'];
	$negocio_9_mercantil_3 = $_POST['negocio_9_mercantil_3'];
	$negocio_9_laboral_1 =   $_POST['negocio_9_laboral_1'];
	$negocio_9_laboral_2 =   $_POST['negocio_9_laboral_2'];
	$negocio_9_laboral_3 =   $_POST['negocio_9_laboral_3'];
	
	$negocio_10_mercantil_1 = $_POST['negocio_10_mercantil_1'];
	$negocio_10_mercantil_2 = $_POST['negocio_10_mercantil_2'];
	$negocio_10_mercantil_3 = $_POST['negocio_10_mercantil_3'];
	$negocio_10_laboral_1 =   $_POST['negocio_10_laboral_1'];
	$negocio_10_laboral_2 =   $_POST['negocio_10_laboral_2'];
	$negocio_10_laboral_3 =   $_POST['negocio_10_laboral_3'];
	
	$negocio_11_mercantil_1 = $_POST['negocio_11_mercantil_1'];
	$negocio_11_mercantil_2 = $_POST['negocio_11_mercantil_2'];
	$negocio_11_mercantil_3 = $_POST['negocio_11_mercantil_3'];
	$negocio_11_laboral_1 =   $_POST['negocio_11_laboral_1'];
	$negocio_11_laboral_2 =   $_POST['negocio_11_laboral_2'];
	$negocio_11_laboral_3 =   $_POST['negocio_11_laboral_3'];
	
	$negocio_12_mercantil_1 = $_POST['negocio_12_mercantil_1'];
	$negocio_12_mercantil_2 = $_POST['negocio_12_mercantil_2'];
	$negocio_12_mercantil_3 = $_POST['negocio_12_mercantil_3'];
	$negocio_12_laboral_1 =   $_POST['negocio_12_laboral_1'];
	$negocio_12_laboral_2 =   $_POST['negocio_12_laboral_2'];
	$negocio_12_laboral_3 =   $_POST['negocio_12_laboral_3'];
	
	$negocio_13_mercantil_1 = $_POST['negocio_13_mercantil_1'];
	$negocio_13_mercantil_2 = $_POST['negocio_13_mercantil_2'];
	$negocio_13_mercantil_3 = $_POST['negocio_13_mercantil_3'];
	$negocio_13_laboral_1 =   $_POST['negocio_13_laboral_1'];
	$negocio_13_laboral_2 =   $_POST['negocio_13_laboral_2'];
	$negocio_13_laboral_3 =   $_POST['negocio_13_laboral_3'];
	
	$negocio_14_mercantil_1 = $_POST['negocio_14_mercantil_1'];
	$negocio_14_mercantil_2 = $_POST['negocio_14_mercantil_2'];
	$negocio_14_mercantil_3 = $_POST['negocio_14_mercantil_3'];
	$negocio_14_laboral_1 =   $_POST['negocio_14_laboral_1'];
	$negocio_14_laboral_2 =   $_POST['negocio_14_laboral_2'];
	$negocio_14_laboral_3 =   $_POST['negocio_14_laboral_3'];
	
	$negocio_15_mercantil_1 = $_POST['negocio_15_mercantil_1'];
	$negocio_15_mercantil_2 = $_POST['negocio_15_mercantil_2'];
	$negocio_15_mercantil_3 = $_POST['negocio_15_mercantil_3'];
	$negocio_15_laboral_1 =   $_POST['negocio_15_laboral_1'];
	$negocio_15_laboral_2 =   $_POST['negocio_15_laboral_2'];
	$negocio_15_laboral_3 =   $_POST['negocio_15_laboral_3'];
	
	$extra_16_mercantil_1 = $_POST['extra_16_mercantil_1'];
	$extra_16_mercantil_2 = $_POST['extra_16_mercantil_2'];
	$extra_16_mercantil_3 = $_POST['extra_16_mercantil_3'];
	$extra_16_laboral_1 =   $_POST['extra_16_laboral_1'];
	$extra_16_laboral_2 =   $_POST['extra_16_laboral_2'];
	$extra_16_laboral_3 =   $_POST['extra_16_laboral_3'];
	
	$extra_17_mercantil_1 = $_POST['extra_17_mercantil_1'];
	$extra_17_mercantil_2 = $_POST['extra_17_mercantil_2'];
	$extra_17_mercantil_3 = $_POST['extra_17_mercantil_3'];
	$extra_17_laboral_1 =   $_POST['extra_17_laboral_1'];
	$extra_17_laboral_2 =   $_POST['extra_17_laboral_2'];
	$extra_17_laboral_3 =   $_POST['extra_17_laboral_3'];
	mysql_query("UPDATE click_gerentes_introductores SET 
	we_dia='$we_dia',
	we_mes='$we_mes',
	we_ano='$we_ano',
	residencial_1_mercantil_1='$residencial_1_mercantil_1',
	residencial_1_mercantil_2='$residencial_1_mercantil_2',
	residencial_1_mercantil_3='$residencial_1_mercantil_3',
	residencial_1_laboral_1=  '$residencial_1_laboral_1',
	residencial_1_laboral_2=  '$residencial_1_laboral_2',
	residencial_1_laboral_3=  '$residencial_1_laboral_3',
	residencial_2_mercantil_1='$residencial_2_mercantil_1',
	residencial_2_mercantil_2='$residencial_2_mercantil_2',
	residencial_2_mercantil_3='$residencial_2_mercantil_3',
	residencial_2_laboral_1=  '$residencial_2_laboral_1',
	residencial_2_laboral_2=  '$residencial_2_laboral_2',
	residencial_2_laboral_3=  '$residencial_2_laboral_3',
	residencial_3_mercantil_1='$residencial_3_mercantil_1',
	residencial_3_mercantil_2='$residencial_3_mercantil_2',
	residencial_3_mercantil_3='$residencial_3_mercantil_3',
	residencial_3_laboral_1=  '$residencial_3_laboral_1',
	residencial_3_laboral_2=  '$residencial_3_laboral_2',
	residencial_3_laboral_3=  '$residencial_3_laboral_3',
	residencial_4_mercantil_1='$residencial_4_mercantil_1',
	residencial_4_mercantil_2='$residencial_4_mercantil_2',
	residencial_4_mercantil_3='$residencial_4_mercantil_3',
	residencial_4_laboral_1=  '$residencial_4_laboral_1',
	residencial_4_laboral_2=  '$residencial_4_laboral_2',
	residencial_4_laboral_3=  '$residencial_4_laboral_3',
	residencial_5_mercantil_1='$residencial_5_mercantil_1',
	residencial_5_mercantil_2='$residencial_5_mercantil_2',
	residencial_5_mercantil_3='$residencial_5_mercantil_3',
	residencial_5_laboral_1=  '$residencial_5_laboral_1',
	residencial_5_laboral_2=  '$residencial_5_laboral_2',
	residencial_5_laboral_3=  '$residencial_5_laboral_3',
	residencial_6_mercantil_1='$residencial_6_mercantil_1',
	residencial_6_mercantil_2='$residencial_6_mercantil_2',
	residencial_6_mercantil_3='$residencial_6_mercantil_3',
	residencial_6_laboral_1=  '$residencial_6_laboral_1',
	residencial_6_laboral_2=  '$residencial_6_laboral_2',
	residencial_6_laboral_3=  '$residencial_6_laboral_3',
	residencial_7_mercantil_1='$residencial_7_mercantil_1',
	residencial_7_mercantil_2='$residencial_7_mercantil_2',
	residencial_7_mercantil_3='$residencial_7_mercantil_3',
	residencial_7_laboral_1=  '$residencial_7_laboral_1',
	residencial_7_laboral_2=  '$residencial_7_laboral_2',
	residencial_7_laboral_3=  '$residencial_7_laboral_3',
	residencial_8_mercantil_1='$residencial_8_mercantil_1',
	residencial_8_mercantil_2='$residencial_8_mercantil_2',
	residencial_8_mercantil_3='$residencial_8_mercantil_3',
	residencial_8_laboral_1=  '$residencial_8_laboral_1',
	residencial_8_laboral_2=  '$residencial_8_laboral_2',
	residencial_8_laboral_3=  '$residencial_8_laboral_3',
	
	negocio_1_mercantil_1 = '$negocio_1_mercantil_1',
	negocio_1_mercantil_2 = '$negocio_1_mercantil_2',
	negocio_1_mercantil_3 = '$negocio_1_mercantil_3',
	negocio_1_laboral_1 =   '$negocio_1_laboral_1',
	negocio_1_laboral_2 =   '$negocio_1_laboral_2',
	negocio_1_laboral_3 =   '$negocio_1_laboral_3',
	negocio_2_mercantil_1 = '$negocio_2_mercantil_1',
	negocio_2_mercantil_2 = '$negocio_2_mercantil_2',
	negocio_2_mercantil_3 = '$negocio_2_mercantil_3',
	negocio_2_laboral_1 =   '$negocio_2_laboral_1',
	negocio_2_laboral_2 =   '$negocio_2_laboral_2',
	negocio_2_laboral_3 =   '$negocio_2_laboral_3',
	negocio_3_mercantil_1 = '$negocio_3_mercantil_1',
	negocio_3_mercantil_2 = '$negocio_3_mercantil_2',
	negocio_3_mercantil_3 = '$negocio_3_mercantil_3',
	negocio_3_laboral_1 =   '$negocio_3_laboral_1',
	negocio_3_laboral_2 =   '$negocio_3_laboral_2',
	negocio_3_laboral_3 =   '$negocio_3_laboral_3',
	negocio_4_mercantil_1 = '$negocio_4_mercantil_1',
	negocio_4_mercantil_2 = '$negocio_4_mercantil_2',
	negocio_4_mercantil_3 = '$negocio_4_mercantil_3',
	negocio_4_laboral_1 =   '$negocio_4_laboral_1',
	negocio_4_laboral_2 =   '$negocio_4_laboral_2',
	negocio_4_laboral_3 =   '$negocio_4_laboral_3',
	negocio_5_mercantil_1 = '$negocio_5_mercantil_1',
	negocio_5_mercantil_2 = '$negocio_5_mercantil_2',
	negocio_5_mercantil_3 = '$negocio_5_mercantil_3',
	negocio_5_laboral_1 =   '$negocio_5_laboral_1',
	negocio_5_laboral_2 =   '$negocio_5_laboral_2',
	negocio_5_laboral_3 =   '$negocio_5_laboral_3',
	negocio_6_mercantil_1 = '$negocio_6_mercantil_1',
	negocio_6_mercantil_2 = '$negocio_6_mercantil_2',
	negocio_6_mercantil_3 = '$negocio_6_mercantil_3',
	negocio_6_laboral_1 =   '$negocio_6_laboral_1',
	negocio_6_laboral_2 =   '$negocio_6_laboral_2',
	negocio_6_laboral_3 =   '$negocio_6_laboral_3',
	negocio_7_mercantil_1 = '$negocio_7_mercantil_1',
	negocio_7_mercantil_2 = '$negocio_7_mercantil_2',
	negocio_7_mercantil_3 = '$negocio_7_mercantil_3',
	negocio_7_laboral_1 =   '$negocio_7_laboral_1',
	negocio_7_laboral_2 =   '$negocio_7_laboral_2',
	negocio_7_laboral_3 =   '$negocio_7_laboral_3',
	negocio_8_mercantil_1 = '$negocio_8_mercantil_1',
	negocio_8_mercantil_2 = '$negocio_8_mercantil_2',
	negocio_8_mercantil_3 = '$negocio_8_mercantil_3',
	negocio_8_laboral_1 =   '$negocio_8_laboral_1',
	negocio_8_laboral_2 =   '$negocio_8_laboral_2',
	negocio_8_laboral_3 =   '$negocio_8_laboral_3',
	negocio_9_mercantil_1 = '$negocio_9_mercantil_1',
	negocio_9_mercantil_2 = '$negocio_9_mercantil_2',
	negocio_9_mercantil_3 = '$negocio_9_mercantil_3',
	negocio_9_laboral_1 =   '$negocio_9_laboral_1',
	negocio_9_laboral_2 =   '$negocio_9_laboral_2',
	negocio_9_laboral_3 =   '$negocio_9_laboral_3',
	negocio_10_mercantil_1 = '$negocio_10_mercantil_1',
	negocio_10_mercantil_2 = '$negocio_10_mercantil_2',
	negocio_10_mercantil_3 = '$negocio_10_mercantil_3',
	negocio_10_laboral_1 =   '$negocio_10_laboral_1',
	negocio_10_laboral_2 =   '$negocio_10_laboral_2',
	negocio_10_laboral_3 =   '$negocio_10_laboral_3',
	negocio_11_mercantil_1 = '$negocio_11_mercantil_1',
	negocio_11_mercantil_2 = '$negocio_11_mercantil_2',
	negocio_11_mercantil_3 = '$negocio_11_mercantil_3',
	negocio_11_laboral_1 =   '$negocio_11_laboral_1',
	negocio_11_laboral_2 =   '$negocio_11_laboral_2',
	negocio_11_laboral_3 =   '$negocio_11_laboral_3',
	negocio_12_mercantil_1 = '$negocio_12_mercantil_1',
	negocio_12_mercantil_2 = '$negocio_12_mercantil_2',
	negocio_12_mercantil_3 = '$negocio_12_mercantil_3',
	negocio_12_laboral_1 =   '$negocio_12_laboral_1',
	negocio_12_laboral_2 =   '$negocio_12_laboral_2',
	negocio_12_laboral_3 =   '$negocio_12_laboral_3',
	negocio_13_mercantil_1 = '$negocio_13_mercantil_1',
	negocio_13_mercantil_2 = '$negocio_13_mercantil_2',
	negocio_13_mercantil_3 = '$negocio_13_mercantil_3',
	negocio_13_laboral_1 =   '$negocio_13_laboral_1',
	negocio_13_laboral_2 =   '$negocio_13_laboral_2',
	negocio_13_laboral_3 =   '$negocio_13_laboral_3',
	negocio_14_mercantil_1 = '$negocio_14_mercantil_1',
	negocio_14_mercantil_2 = '$negocio_14_mercantil_2',
	negocio_14_mercantil_3 = '$negocio_14_mercantil_3',
	negocio_14_laboral_1 =   '$negocio_14_laboral_1',
	negocio_14_laboral_2 =   '$negocio_14_laboral_2',
	negocio_14_laboral_3 =   '$negocio_14_laboral_3',
	negocio_15_mercantil_1 = '$negocio_15_mercantil_1',
	negocio_15_mercantil_2 = '$negocio_15_mercantil_2',
	negocio_15_mercantil_3 = '$negocio_15_mercantil_3',
	negocio_15_laboral_1 =   '$negocio_15_laboral_1',
	negocio_15_laboral_2 =   '$negocio_15_laboral_2',
	negocio_15_laboral_3 =   '$negocio_15_laboral_3',
	extra_16_mercantil_1 = '$extra_16_mercantil_1',
	extra_16_mercantil_2 = '$extra_16_mercantil_2',
	extra_16_mercantil_3 = '$extra_16_mercantil_3',
	extra_16_laboral_1 =   '$extra_16_laboral_1',
	extra_16_laboral_2 =   '$extra_16_laboral_2',
	extra_16_laboral_3 =   '$extra_16_laboral_3',
	extra_17_mercantil_1 = '$extra_17_mercantil_1',
	extra_17_mercantil_2 = '$extra_17_mercantil_2',
	extra_17_mercantil_3 = '$extra_17_mercantil_3',
	extra_17_laboral_1 =   '$extra_17_laboral_1',
	extra_17_laboral_2 =   '$extra_17_laboral_2',
	extra_17_laboral_3 =   '$extra_17_laboral_3' WHERE id='$s[id]'");
	//mysql_query("INSERT INTO historial (type,contract_id,user,date) VALUES ('update_comisiones','$gx[id]','$user[username]','". date('Y-m-d') ."')");

	// Antes de hacer la actualización saltar un aviso "estás seguro de hacer estos cambios..."
	
	echo "
	<script>
          sweetAlert({
                title:'Actualizado',
                text: 'Las comisiones han sido actualizadas',
                type:'success'
          },function(isConfirm){
                alert('hola, hazme click');
          });
          $('.swal2-confirm').click(function(){
		  window.location.href = 'index.php?page=pagos&subgerente=$s[id]';
          });
	</script>
	";
}

if (isset($_POST['add_com'])) {
	$we_dia = $_POST['we_dia'];
	$we_mes = $_POST['we_mes'];
	$we_ano = $_POST['we_ano'];
	
	$residencial_1_mercantil_1 = $_POST['residencial_1_mercantil_1'];
	$residencial_1_mercantil_2 = $_POST['residencial_1_mercantil_2'];
	$residencial_1_mercantil_3 = $_POST['residencial_1_mercantil_3'];
	$residencial_1_laboral_1 =   $_POST['residencial_1_laboral_1'];
	$residencial_1_laboral_2 =   $_POST['residencial_1_laboral_2'];
	$residencial_1_laboral_3 =   $_POST['residencial_1_laboral_3'];
	
	$residencial_2_mercantil_1 = $_POST['residencial_2_mercantil_1'];
	$residencial_2_mercantil_2 = $_POST['residencial_2_mercantil_2'];
	$residencial_2_mercantil_3 = $_POST['residencial_2_mercantil_3'];
	$residencial_2_laboral_1 =   $_POST['residencial_2_laboral_1'];
	$residencial_2_laboral_2 =   $_POST['residencial_2_laboral_2'];
	$residencial_2_laboral_3 =   $_POST['residencial_2_laboral_3'];
	
	$residencial_3_mercantil_1 = $_POST['residencial_3_mercantil_1'];
	$residencial_3_mercantil_2 = $_POST['residencial_3_mercantil_2'];
	$residencial_3_mercantil_3 = $_POST['residencial_3_mercantil_3'];
	$residencial_3_laboral_1 =   $_POST['residencial_3_laboral_1'];
	$residencial_3_laboral_2 =   $_POST['residencial_3_laboral_2'];
	$residencial_3_laboral_3 =   $_POST['residencial_3_laboral_3'];
	
	$residencial_4_mercantil_1 = $_POST['residencial_4_mercantil_1'];
	$residencial_4_mercantil_2 = $_POST['residencial_4_mercantil_2'];
	$residencial_4_mercantil_3 = $_POST['residencial_4_mercantil_3'];
	$residencial_4_laboral_1 =   $_POST['residencial_4_laboral_1'];
	$residencial_4_laboral_2 =   $_POST['residencial_4_laboral_2'];
	$residencial_4_laboral_3 =   $_POST['residencial_4_laboral_3'];
	
	$residencial_5_mercantil_1 = $_POST['residencial_5_mercantil_1'];
	$residencial_5_mercantil_2 = $_POST['residencial_5_mercantil_2'];
	$residencial_5_mercantil_3 = $_POST['residencial_5_mercantil_3'];
	$residencial_5_laboral_1 =   $_POST['residencial_5_laboral_1'];
	$residencial_5_laboral_2 =   $_POST['residencial_5_laboral_2'];
	$residencial_5_laboral_3 =   $_POST['residencial_5_laboral_3'];
	
	$residencial_6_mercantil_1 = $_POST['residencial_6_mercantil_1'];
	$residencial_6_mercantil_2 = $_POST['residencial_6_mercantil_2'];
	$residencial_6_mercantil_3 = $_POST['residencial_6_mercantil_3'];
	$residencial_6_laboral_1 =   $_POST['residencial_6_laboral_1'];
	$residencial_6_laboral_2 =   $_POST['residencial_6_laboral_2'];
	$residencial_6_laboral_3 =   $_POST['residencial_6_laboral_3'];
	
	$residencial_7_mercantil_1 = $_POST['residencial_7_mercantil_1'];
	$residencial_7_mercantil_2 = $_POST['residencial_7_mercantil_2'];
	$residencial_7_mercantil_3 = $_POST['residencial_7_mercantil_3'];
	$residencial_7_laboral_1 =   $_POST['residencial_7_laboral_1'];
	$residencial_7_laboral_2 =   $_POST['residencial_7_laboral_2'];
	$residencial_7_laboral_3 =   $_POST['residencial_7_laboral_3'];
	
	$residencial_8_mercantil_1 = $_POST['residencial_8_mercantil_1'];
	$residencial_8_mercantil_2 = $_POST['residencial_8_mercantil_2'];
	$residencial_8_mercantil_3 = $_POST['residencial_8_mercantil_3'];
	$residencial_8_laboral_1 =   $_POST['residencial_8_laboral_1'];
	$residencial_8_laboral_2 =   $_POST['residencial_8_laboral_2'];
	$residencial_8_laboral_3 =   $_POST['residencial_8_laboral_3'];
	
	$negocio_1_mercantil_1 = $_POST['negocio_1_mercantil_1'];
	$negocio_1_mercantil_2 = $_POST['negocio_1_mercantil_2'];
	$negocio_1_mercantil_3 = $_POST['negocio_1_mercantil_3'];
	$negocio_1_laboral_1 =   $_POST['negocio_1_laboral_1'];
	$negocio_1_laboral_2 =   $_POST['negocio_1_laboral_2'];
	$negocio_1_laboral_3 =   $_POST['negocio_1_laboral_3'];
	
	$negocio_2_mercantil_1 = $_POST['negocio_2_mercantil_1'];
	$negocio_2_mercantil_2 = $_POST['negocio_2_mercantil_2'];
	$negocio_2_mercantil_3 = $_POST['negocio_2_mercantil_3'];
	$negocio_2_laboral_1 =   $_POST['negocio_2_laboral_1'];
	$negocio_2_laboral_2 =   $_POST['negocio_2_laboral_2'];
	$negocio_2_laboral_3 =   $_POST['negocio_2_laboral_3'];
	
	$negocio_3_mercantil_1 = $_POST['negocio_3_mercantil_1'];
	$negocio_3_mercantil_2 = $_POST['negocio_3_mercantil_2'];
	$negocio_3_mercantil_3 = $_POST['negocio_3_mercantil_3'];
	$negocio_3_laboral_1 =   $_POST['negocio_3_laboral_1'];
	$negocio_3_laboral_2 =   $_POST['negocio_3_laboral_2'];
	$negocio_3_laboral_3 =   $_POST['negocio_3_laboral_3'];
	
	$negocio_4_mercantil_1 = $_POST['negocio_4_mercantil_1'];
	$negocio_4_mercantil_2 = $_POST['negocio_4_mercantil_2'];
	$negocio_4_mercantil_3 = $_POST['negocio_4_mercantil_3'];
	$negocio_4_laboral_1 =   $_POST['negocio_4_laboral_1'];
	$negocio_4_laboral_2 =   $_POST['negocio_4_laboral_2'];
	$negocio_4_laboral_3 =   $_POST['negocio_4_laboral_3'];
	
	$negocio_5_mercantil_1 = $_POST['negocio_5_mercantil_1'];
	$negocio_5_mercantil_2 = $_POST['negocio_5_mercantil_2'];
	$negocio_5_mercantil_3 = $_POST['negocio_5_mercantil_3'];
	$negocio_5_laboral_1 =   $_POST['negocio_5_laboral_1'];
	$negocio_5_laboral_2 =   $_POST['negocio_5_laboral_2'];
	$negocio_5_laboral_3 =   $_POST['negocio_5_laboral_3'];
	
	$negocio_6_mercantil_1 = $_POST['negocio_6_mercantil_1'];
	$negocio_6_mercantil_2 = $_POST['negocio_6_mercantil_2'];
	$negocio_6_mercantil_3 = $_POST['negocio_6_mercantil_3'];
	$negocio_6_laboral_1 =   $_POST['negocio_6_laboral_1'];
	$negocio_6_laboral_2 =   $_POST['negocio_6_laboral_2'];
	$negocio_6_laboral_3 =   $_POST['negocio_6_laboral_3'];
	
	$negocio_7_mercantil_1 = $_POST['negocio_7_mercantil_1'];
	$negocio_7_mercantil_2 = $_POST['negocio_7_mercantil_2'];
	$negocio_7_mercantil_3 = $_POST['negocio_7_mercantil_3'];
	$negocio_7_laboral_1 =   $_POST['negocio_7_laboral_1'];
	$negocio_7_laboral_2 =   $_POST['negocio_7_laboral_2'];
	$negocio_7_laboral_3 =   $_POST['negocio_7_laboral_3'];
	
	$negocio_8_mercantil_1 = $_POST['negocio_8_mercantil_1'];
	$negocio_8_mercantil_2 = $_POST['negocio_8_mercantil_2'];
	$negocio_8_mercantil_3 = $_POST['negocio_8_mercantil_3'];
	$negocio_8_laboral_1 =   $_POST['negocio_8_laboral_1'];
	$negocio_8_laboral_2 =   $_POST['negocio_8_laboral_2'];
	$negocio_8_laboral_3 =   $_POST['negocio_8_laboral_3'];
	
	$negocio_9_mercantil_1 = $_POST['negocio_9_mercantil_1'];
	$negocio_9_mercantil_2 = $_POST['negocio_9_mercantil_2'];
	$negocio_9_mercantil_3 = $_POST['negocio_9_mercantil_3'];
	$negocio_9_laboral_1 =   $_POST['negocio_9_laboral_1'];
	$negocio_9_laboral_2 =   $_POST['negocio_9_laboral_2'];
	$negocio_9_laboral_3 =   $_POST['negocio_9_laboral_3'];
	
	$negocio_10_mercantil_1 = $_POST['negocio_10_mercantil_1'];
	$negocio_10_mercantil_2 = $_POST['negocio_10_mercantil_2'];
	$negocio_10_mercantil_3 = $_POST['negocio_10_mercantil_3'];
	$negocio_10_laboral_1 =   $_POST['negocio_10_laboral_1'];
	$negocio_10_laboral_2 =   $_POST['negocio_10_laboral_2'];
	$negocio_10_laboral_3 =   $_POST['negocio_10_laboral_3'];
	
	$negocio_11_mercantil_1 = $_POST['negocio_11_mercantil_1'];
	$negocio_11_mercantil_2 = $_POST['negocio_11_mercantil_2'];
	$negocio_11_mercantil_3 = $_POST['negocio_11_mercantil_3'];
	$negocio_11_laboral_1 =   $_POST['negocio_11_laboral_1'];
	$negocio_11_laboral_2 =   $_POST['negocio_11_laboral_2'];
	$negocio_11_laboral_3 =   $_POST['negocio_11_laboral_3'];
	
	$negocio_12_mercantil_1 = $_POST['negocio_12_mercantil_1'];
	$negocio_12_mercantil_2 = $_POST['negocio_12_mercantil_2'];
	$negocio_12_mercantil_3 = $_POST['negocio_12_mercantil_3'];
	$negocio_12_laboral_1 =   $_POST['negocio_12_laboral_1'];
	$negocio_12_laboral_2 =   $_POST['negocio_12_laboral_2'];
	$negocio_12_laboral_3 =   $_POST['negocio_12_laboral_3'];
	
	$negocio_13_mercantil_1 = $_POST['negocio_13_mercantil_1'];
	$negocio_13_mercantil_2 = $_POST['negocio_13_mercantil_2'];
	$negocio_13_mercantil_3 = $_POST['negocio_13_mercantil_3'];
	$negocio_13_laboral_1 =   $_POST['negocio_13_laboral_1'];
	$negocio_13_laboral_2 =   $_POST['negocio_13_laboral_2'];
	$negocio_13_laboral_3 =   $_POST['negocio_13_laboral_3'];
	
	$negocio_14_mercantil_1 = $_POST['negocio_14_mercantil_1'];
	$negocio_14_mercantil_2 = $_POST['negocio_14_mercantil_2'];
	$negocio_14_mercantil_3 = $_POST['negocio_14_mercantil_3'];
	$negocio_14_laboral_1 =   $_POST['negocio_14_laboral_1'];
	$negocio_14_laboral_2 =   $_POST['negocio_14_laboral_2'];
	$negocio_14_laboral_3 =   $_POST['negocio_14_laboral_3'];
	
	$negocio_15_mercantil_1 = $_POST['negocio_15_mercantil_1'];
	$negocio_15_mercantil_2 = $_POST['negocio_15_mercantil_2'];
	$negocio_15_mercantil_3 = $_POST['negocio_15_mercantil_3'];
	$negocio_15_laboral_1 =   $_POST['negocio_15_laboral_1'];
	$negocio_15_laboral_2 =   $_POST['negocio_15_laboral_2'];
	$negocio_15_laboral_3 =   $_POST['negocio_15_laboral_3'];
	
	$extra_16_mercantil_1 = $_POST['extra_16_mercantil_1'];
	$extra_16_mercantil_2 = $_POST['extra_16_mercantil_2'];
	$extra_16_mercantil_3 = $_POST['extra_16_mercantil_3'];
	$extra_16_laboral_1 =   $_POST['extra_16_laboral_1'];
	$extra_16_laboral_2 =   $_POST['extra_16_laboral_2'];
	$extra_16_laboral_3 =   $_POST['extra_16_laboral_3'];
	
	$extra_17_mercantil_1 = $_POST['extra_17_mercantil_1'];
	$extra_17_mercantil_2 = $_POST['extra_17_mercantil_2'];
	$extra_17_mercantil_3 = $_POST['extra_17_mercantil_3'];
	$extra_17_laboral_1 =   $_POST['extra_17_laboral_1'];
	$extra_17_laboral_2 =   $_POST['extra_17_laboral_2'];
	$extra_17_laboral_3 =   $_POST['extra_17_laboral_3'];
	
	//mysql_query("INSERT INTO historial (type,user,date) VALUES ('new_comisiones','$user[username]','". date('Y-m-d') ."')");
	mysql_query("UPDATE click_gerentes_introductores SET 
	we_dia='$we_dia',
	we_mes='$we_mes',
	we_ano='$we_ano',
	residencial_1_mercantil_1='$residencial_1_mercantil_1',
	residencial_1_mercantil_2='$residencial_1_mercantil_2',
	residencial_1_mercantil_3='$residencial_1_mercantil_3',
	residencial_1_laboral_1=  '$residencial_1_laboral_1',
	residencial_1_laboral_2=  '$residencial_1_laboral_2',
	residencial_1_laboral_3=  '$residencial_1_laboral_3',
	residencial_2_mercantil_1='$residencial_2_mercantil_1',
	residencial_2_mercantil_2='$residencial_2_mercantil_2',
	residencial_2_mercantil_3='$residencial_2_mercantil_3',
	residencial_2_laboral_1=  '$residencial_2_laboral_1',
	residencial_2_laboral_2=  '$residencial_2_laboral_2',
	residencial_2_laboral_3=  '$residencial_2_laboral_3',
	residencial_3_mercantil_1='$residencial_3_mercantil_1',
	residencial_3_mercantil_2='$residencial_3_mercantil_2',
	residencial_3_mercantil_3='$residencial_3_mercantil_3',
	residencial_3_laboral_1=  '$residencial_3_laboral_1',
	residencial_3_laboral_2=  '$residencial_3_laboral_2',
	residencial_3_laboral_3=  '$residencial_3_laboral_3',
	residencial_4_mercantil_1='$residencial_4_mercantil_1',
	residencial_4_mercantil_2='$residencial_4_mercantil_2',
	residencial_4_mercantil_3='$residencial_4_mercantil_3',
	residencial_4_laboral_1=  '$residencial_4_laboral_1',
	residencial_4_laboral_2=  '$residencial_4_laboral_2',
	residencial_4_laboral_3=  '$residencial_4_laboral_3',
	residencial_5_mercantil_1='$residencial_5_mercantil_1',
	residencial_5_mercantil_2='$residencial_5_mercantil_2',
	residencial_5_mercantil_3='$residencial_5_mercantil_3',
	residencial_5_laboral_1=  '$residencial_5_laboral_1',
	residencial_5_laboral_2=  '$residencial_5_laboral_2',
	residencial_5_laboral_3=  '$residencial_5_laboral_3',
	residencial_6_mercantil_1='$residencial_6_mercantil_1',
	residencial_6_mercantil_2='$residencial_6_mercantil_2',
	residencial_6_mercantil_3='$residencial_6_mercantil_3',
	residencial_6_laboral_1=  '$residencial_6_laboral_1',
	residencial_6_laboral_2=  '$residencial_6_laboral_2',
	residencial_6_laboral_3=  '$residencial_6_laboral_3',
	residencial_7_mercantil_1='$residencial_7_mercantil_1',
	residencial_7_mercantil_2='$residencial_7_mercantil_2',
	residencial_7_mercantil_3='$residencial_7_mercantil_3',
	residencial_7_laboral_1=  '$residencial_7_laboral_1',
	residencial_7_laboral_2=  '$residencial_7_laboral_2',
	residencial_7_laboral_3=  '$residencial_7_laboral_3',
	residencial_8_mercantil_1='$residencial_8_mercantil_1',
	residencial_8_mercantil_2='$residencial_8_mercantil_2',
	residencial_8_mercantil_3='$residencial_8_mercantil_3',
	residencial_8_laboral_1=  '$residencial_8_laboral_1',
	residencial_8_laboral_2=  '$residencial_8_laboral_2',
	residencial_8_laboral_3=  '$residencial_8_laboral_3',
	
	
	negocio_1_mercantil_1 = '$negocio_1_mercantil_1',
	negocio_1_mercantil_2 = '$negocio_1_mercantil_2',
	negocio_1_mercantil_3 = '$negocio_1_mercantil_3',
	negocio_1_laboral_1 =   '$negocio_1_laboral_1',
	negocio_1_laboral_2 =   '$negocio_1_laboral_2',
	negocio_1_laboral_3 =   '$negocio_1_laboral_3',
	negocio_2_mercantil_1 = '$negocio_2_mercantil_1',
	negocio_2_mercantil_2 = '$negocio_2_mercantil_2',
	negocio_2_mercantil_3 = '$negocio_2_mercantil_3',
	negocio_2_laboral_1 =   '$negocio_2_laboral_1',
	negocio_2_laboral_2 =   '$negocio_2_laboral_2',
	negocio_2_laboral_3 =   '$negocio_2_laboral_3',
	negocio_3_mercantil_1 = '$negocio_3_mercantil_1',
	negocio_3_mercantil_2 = '$negocio_3_mercantil_2',
	negocio_3_mercantil_3 = '$negocio_3_mercantil_3',
	negocio_3_laboral_1 =   '$negocio_3_laboral_1',
	negocio_3_laboral_2 =   '$negocio_3_laboral_2',
	negocio_3_laboral_3 =   '$negocio_3_laboral_3',
	negocio_4_mercantil_1 = '$negocio_4_mercantil_1',
	negocio_4_mercantil_2 = '$negocio_4_mercantil_2',
	negocio_4_mercantil_3 = '$negocio_4_mercantil_3',
	negocio_4_laboral_1 =   '$negocio_4_laboral_1',
	negocio_4_laboral_2 =   '$negocio_4_laboral_2',
	negocio_4_laboral_3 =   '$negocio_4_laboral_3',
	negocio_5_mercantil_1 = '$negocio_5_mercantil_1',
	negocio_5_mercantil_2 = '$negocio_5_mercantil_2',
	negocio_5_mercantil_3 = '$negocio_5_mercantil_3',
	negocio_5_laboral_1 =   '$negocio_5_laboral_1',
	negocio_5_laboral_2 =   '$negocio_5_laboral_2',
	negocio_5_laboral_3 =   '$negocio_5_laboral_3',
	negocio_6_mercantil_1 = '$negocio_6_mercantil_1',
	negocio_6_mercantil_2 = '$negocio_6_mercantil_2',
	negocio_6_mercantil_3 = '$negocio_6_mercantil_3',
	negocio_6_laboral_1 =   '$negocio_6_laboral_1',
	negocio_6_laboral_2 =   '$negocio_6_laboral_2',
	negocio_6_laboral_3 =   '$negocio_6_laboral_3',
	negocio_7_mercantil_1 = '$negocio_7_mercantil_1',
	negocio_7_mercantil_2 = '$negocio_7_mercantil_2',
	negocio_7_mercantil_3 = '$negocio_7_mercantil_3',
	negocio_7_laboral_1 =   '$negocio_7_laboral_1',
	negocio_7_laboral_2 =   '$negocio_7_laboral_2',
	negocio_7_laboral_3 =   '$negocio_7_laboral_3',
	negocio_8_mercantil_1 = '$negocio_8_mercantil_1',
	negocio_8_mercantil_2 = '$negocio_8_mercantil_2',
	negocio_8_mercantil_3 = '$negocio_8_mercantil_3',
	negocio_8_laboral_1 =   '$negocio_8_laboral_1',
	negocio_8_laboral_2 =   '$negocio_8_laboral_2',
	negocio_8_laboral_3 =   '$negocio_8_laboral_3',
	negocio_9_mercantil_1 = '$negocio_9_mercantil_1',
	negocio_9_mercantil_2 = '$negocio_9_mercantil_2',
	negocio_9_mercantil_3 = '$negocio_9_mercantil_3',
	negocio_9_laboral_1 =   '$negocio_9_laboral_1',
	negocio_9_laboral_2 =   '$negocio_9_laboral_2',
	negocio_9_laboral_3 =   '$negocio_9_laboral_3',
	negocio_10_mercantil_1 = '$negocio_10_mercantil_1',
	negocio_10_mercantil_2 = '$negocio_10_mercantil_2',
	negocio_10_mercantil_3 = '$negocio_10_mercantil_3',
	negocio_10_laboral_1 =   '$negocio_10_laboral_1',
	negocio_10_laboral_2 =   '$negocio_10_laboral_2',
	negocio_10_laboral_3 =   '$negocio_10_laboral_3',
	negocio_11_mercantil_1 = '$negocio_11_mercantil_1',
	negocio_11_mercantil_2 = '$negocio_11_mercantil_2',
	negocio_11_mercantil_3 = '$negocio_11_mercantil_3',
	negocio_11_laboral_1 =   '$negocio_11_laboral_1',
	negocio_11_laboral_2 =   '$negocio_11_laboral_2',
	negocio_11_laboral_3 =   '$negocio_11_laboral_3',
	negocio_12_mercantil_1 = '$negocio_12_mercantil_1',
	negocio_12_mercantil_2 = '$negocio_12_mercantil_2',
	negocio_12_mercantil_3 = '$negocio_12_mercantil_3',
	negocio_12_laboral_1 =   '$negocio_12_laboral_1',
	negocio_12_laboral_2 =   '$negocio_12_laboral_2',
	negocio_12_laboral_3 =   '$negocio_12_laboral_3',
	negocio_13_mercantil_1 = '$negocio_13_mercantil_1',
	negocio_13_mercantil_2 = '$negocio_13_mercantil_2',
	negocio_13_mercantil_3 = '$negocio_13_mercantil_3',
	negocio_13_laboral_1 =   '$negocio_13_laboral_1',
	negocio_13_laboral_2 =   '$negocio_13_laboral_2',
	negocio_13_laboral_3 =   '$negocio_13_laboral_3',
	negocio_14_mercantil_1 = '$negocio_14_mercantil_1',
	negocio_14_mercantil_2 = '$negocio_14_mercantil_2',
	negocio_14_mercantil_3 = '$negocio_14_mercantil_3',
	negocio_14_laboral_1 =   '$negocio_14_laboral_1',
	negocio_14_laboral_2 =   '$negocio_14_laboral_2',
	negocio_14_laboral_3 =   '$negocio_14_laboral_3',
	negocio_15_mercantil_1 = '$negocio_15_mercantil_1',
	negocio_15_mercantil_2 = '$negocio_15_mercantil_2',
	negocio_15_mercantil_3 = '$negocio_15_mercantil_3',
	negocio_15_laboral_1 =   '$negocio_15_laboral_1',
	negocio_15_laboral_2 =   '$negocio_15_laboral_2',
	negocio_15_laboral_3 =   '$negocio_15_laboral_3',
	extra_16_mercantil_1 = '$extra_16_mercantil_1',
	extra_16_mercantil_2 = '$extra_16_mercantil_2',
	extra_16_mercantil_3 = '$extra_16_mercantil_3',
	extra_16_laboral_1 =   '$extra_16_laboral_1',
	extra_16_laboral_2 =   '$extra_16_laboral_2',
	extra_16_laboral_3 =   '$extra_16_laboral_3',
	extra_17_mercantil_1 = '$extra_17_mercantil_1',
	extra_17_mercantil_2 = '$extra_17_mercantil_2',
	extra_17_mercantil_3 = '$extra_17_mercantil_3',
	extra_17_laboral_1 =   '$extra_17_laboral_1',
	extra_17_laboral_2 =   '$extra_17_laboral_2',
	extra_17_laboral_3 =   '$extra_17_laboral_3' WHERE id='$s[id]'");
	
	echo "
	<script>
          sweetAlert({
                title:'Creado',
                text: 'Las comisiones han sido creadas correctamente',
                type:'success'
          },function(isConfirm){
                alert('hola, hazme click');
          });
          $('.swal2-confirm').click(function(){
		  window.location.href = 'index.php?page=pagos&subgerente=$s[id]';
          });
	</script>
	";
}
?>
  <form method="POST">
      <div class="row">
        <div class="col s12 m12">
          <div class="card">
            <div class="card-content black-text">
              <span class="card-title">&#187; <?php echo $s['subgerente']; ?></span>
  <div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s1"></li>
		<li class="tab col s12 m3"><a class="active" href="#hogares">Hogares</a></li>
        <li class="tab col s12 m4"><a href="#negocios">Negocios</a></li>
        <li class="tab col s12 m3"><a href="#extra">Extra</a></li>
        <li class="tab col s1"></li>
		
      </ul>
    </div>
    <div id="hogares" class="col s12">
      <table class="centered striped responsive-table">
        <thead>
          <tr>
              <th>SEG. <?php echo $s['id']; ?></th>
              <th>TARIFA</th>
              <th>PRODUC.</th>
              <th>MERC. TOTAL</th>
			  <th>MERC. GERENTE</th>
			  <th>MERC. DISTRIBUIDOR</th>
			  <th>LAB. TOTAL</th>
			  <th>LAB. GERENTE</th>
			  <th>LAB. DISTRIBUIDOR</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Residencial">home</i></td>
            <td>2.0A / 2.0DHA</td>
            <td>Plan Luz + Gas</td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_1_mercantil_1']; ?>" name="residencial_1_mercantil_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_1_mercantil_2']; ?>" name="residencial_1_mercantil_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_1_mercantil_3']; ?>" name="residencial_1_mercantil_3" required></td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_1_laboral_1']; ?>" name="residencial_1_laboral_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_1_laboral_2']; ?>" name="residencial_1_laboral_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_1_laboral_3']; ?>" name="residencial_1_laboral_3" required></td>
          </tr>
		  <tr>
            <td><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Residencial">home</i></td>
            <td>2.0A / 2.0DHA</td>
            <td>Plan Luz</td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_2_mercantil_1']; ?>" name="residencial_2_mercantil_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_2_mercantil_2']; ?>" name="residencial_2_mercantil_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_2_mercantil_3']; ?>" name="residencial_2_mercantil_3" required></td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_2_laboral_1']; ?>" name="residencial_2_laboral_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_2_laboral_2']; ?>" name="residencial_2_laboral_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_2_laboral_3']; ?>" name="residencial_2_laboral_3" required></td>
          </tr>
		  <tr>
            <td><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Residencial">home</i></td>
            <td>2.1A / 2.1DHA</td>
            <td>Plan Luz</td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_3_mercantil_1']; ?>" name="residencial_3_mercantil_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_3_mercantil_2']; ?>" name="residencial_3_mercantil_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_3_mercantil_3']; ?>" name="residencial_3_mercantil_3" required></td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_3_laboral_1']; ?>" name="residencial_3_laboral_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_3_laboral_2']; ?>" name="residencial_3_laboral_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_3_laboral_3']; ?>" name="residencial_3_laboral_3" required></td>
          </tr>
		  <tr>
            <td><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Residencial">home</i></td>
            <td>3.0A / 3.0DHA</td>
            <td>Plan Luz</td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_4_mercantil_1']; ?>" name="residencial_4_mercantil_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_4_mercantil_2']; ?>" name="residencial_4_mercantil_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_4_mercantil_3']; ?>" name="residencial_4_mercantil_3" required></td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_4_laboral_1']; ?>" name="residencial_4_laboral_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_4_laboral_2']; ?>" name="residencial_4_laboral_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_4_laboral_3']; ?>" name="residencial_4_laboral_3" required></td>
          </tr>
		  <tr>
            <td><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Residencial">home</i></td>
            <td>3.1</td>
            <td>Plan Gas</td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_5_mercantil_1']; ?>" name="residencial_5_mercantil_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_5_mercantil_2']; ?>" name="residencial_5_mercantil_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_5_mercantil_3']; ?>" name="residencial_5_mercantil_3" required></td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_5_laboral_1']; ?>" name="residencial_5_laboral_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_5_laboral_2']; ?>" name="residencial_5_laboral_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_5_laboral_3']; ?>" name="residencial_5_laboral_3" required></td>
          </tr>
		  <tr>
            <td><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Residencial">home</i></td>
            <td>3.2</td>
            <td>Plan Gas</td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_6_mercantil_1']; ?>" name="residencial_6_mercantil_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_6_mercantil_2']; ?>" name="residencial_6_mercantil_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_6_mercantil_3']; ?>" name="residencial_6_mercantil_3" required></td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_6_laboral_1']; ?>" name="residencial_6_laboral_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_6_laboral_2']; ?>" name="residencial_6_laboral_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_6_laboral_3']; ?>" name="residencial_6_laboral_3" required></td>
          </tr>
		  <tr>
            <td><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Residencial">home</i></td>
            <td>-</td>
            <td>Funciona</td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_7_mercantil_1']; ?>" name="residencial_7_mercantil_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_7_mercantil_2']; ?>" name="residencial_7_mercantil_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_7_mercantil_3']; ?>" name="residencial_7_mercantil_3" required></td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_7_laboral_1']; ?>" name="residencial_7_laboral_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_7_laboral_2']; ?>" name="residencial_7_laboral_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_7_laboral_3']; ?>" name="residencial_7_laboral_3" required></td>
          </tr>
		  <tr>
            <td><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Residencial">home</i></td>
            <td>-</td>
            <td>Funciona Plus</td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_8_mercantil_1']; ?>" name="residencial_8_mercantil_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_8_mercantil_2']; ?>" name="residencial_8_mercantil_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_8_mercantil_3']; ?>" name="residencial_8_mercantil_3" required></td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_8_laboral_1']; ?>" name="residencial_8_laboral_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_8_laboral_2']; ?>" name="residencial_8_laboral_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['residencial_8_laboral_3']; ?>" name="residencial_8_laboral_3" required></td>
          </tr>
        </tbody>
      </table>
	</div>
    <div id="negocios" class="col s12">
	<table class="centered striped responsive-table">
        <thead>
          <tr>
              <th>SEG. <?php echo $s['id']; ?></th>
              <th>TARIFA</th>
              <th>PRODUC.</th>
              <th>MERC. TOTAL</th>
			  <th>MERC. GERENTE</th>
			  <th>MERC. DISTRIBUIDOR</th>
			  <th>LAB. TOTAL</th>
			  <th>LAB. GERENTE</th>
			  <th>LAB. DISTRIBUIDOR</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Residencial">home</i></td>
            <td>2.0</td>
            <td>Plan Luz</td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_1_mercantil_1']; ?>" name="negocio_1_mercantil_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_1_mercantil_2']; ?>" name="negocio_1_mercantil_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_1_mercantil_3']; ?>" name="negocio_1_mercantil_3" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_1_laboral_1']; ?>" name="negocio_1_laboral_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_1_laboral_2']; ?>" name="negocio_1_laboral_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_1_laboral_3']; ?>" name="negocio_1_laboral_3" required></td>
          </tr>
		  <tr>
            <td><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Residencial">home</i></td>
            <td>2.1</td>
            <td>Plan Luz 4.500 - 10.000</td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_2_mercantil_1']; ?>" name="negocio_2_mercantil_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_2_mercantil_2']; ?>" name="negocio_2_mercantil_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_2_mercantil_3']; ?>" name="negocio_2_mercantil_3" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_2_laboral_1']; ?>" name="negocio_2_laboral_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_2_laboral_2']; ?>" name="negocio_2_laboral_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_2_laboral_3']; ?>" name="negocio_2_laboral_3" required></td>
          </tr>
		  <tr>
            <td><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Residencial">home</i></td>
            <td>2.1</td>
            <td>Plan Luz 10.000 - 20.000</td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_3_mercantil_1']; ?>" name="negocio_3_mercantil_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_3_mercantil_2']; ?>" name="negocio_3_mercantil_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_3_mercantil_3']; ?>" name="negocio_3_mercantil_3" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_3_laboral_1']; ?>" name="negocio_3_laboral_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_3_laboral_2']; ?>" name="negocio_3_laboral_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_3_laboral_3']; ?>" name="negocio_3_laboral_3" required></td>
          </tr>
		  <tr>
            <td><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Residencial">home</i></td>
            <td>2.1</td>
            <td>Plan Luz 20.000 - 40.000</td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_4_mercantil_1']; ?>" name="negocio_4_mercantil_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_4_mercantil_2']; ?>" name="negocio_4_mercantil_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_4_mercantil_3']; ?>" name="negocio_4_mercantil_3" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_4_laboral_1']; ?>" name="negocio_4_laboral_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_4_laboral_2']; ?>" name="negocio_4_laboral_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_4_laboral_3']; ?>" name="negocio_4_laboral_3" required></td>
          </tr>
		  <tr>
            <td><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Residencial">home</i></td>
            <td>2.1</td>
            <td>Plan Luz 40.000 - 70.000</td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_5_mercantil_1']; ?>" name="negocio_5_mercantil_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_5_mercantil_2']; ?>" name="negocio_5_mercantil_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_5_mercantil_3']; ?>" name="negocio_5_mercantil_3" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_5_laboral_1']; ?>" name="negocio_5_laboral_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_5_laboral_2']; ?>" name="negocio_5_laboral_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_5_laboral_3']; ?>" name="negocio_5_laboral_3" required></td>
          </tr>
		  <tr>
            <td><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Residencial">home</i></td>
            <td>2.1</td>
            <td>Plan Luz > 70.000</td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_6_mercantil_1']; ?>" name="negocio_6_mercantil_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_6_mercantil_2']; ?>" name="negocio_6_mercantil_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_6_mercantil_3']; ?>" name="negocio_6_mercantil_3" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_6_laboral_1']; ?>" name="negocio_6_laboral_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_6_laboral_2']; ?>" name="negocio_6_laboral_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_6_laboral_3']; ?>" name="negocio_6_laboral_3" required></td>
          </tr>
		  <tr>
            <td><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Residencial">home</i></td>
            <td>3.0</td>
            <td>Plan Luz 6.000 - 10.000</td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_7_mercantil_1']; ?>" name="negocio_7_mercantil_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_7_mercantil_2']; ?>" name="negocio_7_mercantil_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_7_mercantil_3']; ?>" name="negocio_7_mercantil_3" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_7_laboral_1']; ?>" name="negocio_7_laboral_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_7_laboral_2']; ?>" name="negocio_7_laboral_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_7_laboral_3']; ?>" name="negocio_7_laboral_3" required></td>
          </tr>
		  <tr>
            <td><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Residencial">home</i></td>
            <td>3.0</td>
            <td>Plan Luz 10.000 - 20.000</td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_8_mercantil_1']; ?>" name="negocio_8_mercantil_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_8_mercantil_2']; ?>" name="negocio_8_mercantil_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_8_mercantil_3']; ?>" name="negocio_8_mercantil_3" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_8_laboral_1']; ?>" name="negocio_8_laboral_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_8_laboral_2']; ?>" name="negocio_8_laboral_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_8_laboral_3']; ?>" name="negocio_8_laboral_3" required></td>
          </tr>
		  <tr>
            <td><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Residencial">home</i></td>
            <td>3.0</td>
            <td>Plan Luz 20.000 - 30.000</td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_9_mercantil_1']; ?>" name="negocio_9_mercantil_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_9_mercantil_2']; ?>" name="negocio_9_mercantil_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_9_mercantil_3']; ?>" name="negocio_9_mercantil_3" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_9_laboral_1']; ?>" 	name="negocio_9_laboral_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_9_laboral_2']; ?>" 	name="negocio_9_laboral_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_9_laboral_3']; ?>" 	name="negocio_9_laboral_3" required></td>
          </tr>
		  <tr>
            <td><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Residencial">home</i></td>
            <td>3.0</td>
            <td>Plan Luz 30.000 - 40.000</td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_10_mercantil_1']; ?>" name="negocio_10_mercantil_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_10_mercantil_2']; ?>" name="negocio_10_mercantil_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_10_mercantil_3']; ?>" name="negocio_10_mercantil_3" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_10_laboral_1']; ?>" 	 name="negocio_10_laboral_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_10_laboral_2']; ?>" 	 name="negocio_10_laboral_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_10_laboral_3']; ?>" 	 name="negocio_10_laboral_3" required></td>
          </tr>
		  <tr>
            <td><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Residencial">home</i></td>
            <td>3.0</td>
            <td>Plan Luz 40.000 - 70.000</td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_11_mercantil_1']; ?>" name="negocio_11_mercantil_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_11_mercantil_2']; ?>" name="negocio_11_mercantil_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_11_mercantil_3']; ?>" name="negocio_11_mercantil_3" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_11_laboral_1']; ?>" 	 name="negocio_11_laboral_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_11_laboral_2']; ?>" 	 name="negocio_11_laboral_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_11_laboral_3']; ?>" 	 name="negocio_11_laboral_3" required></td>
          </tr>
		  <tr>
            <td><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Residencial">home</i></td>
            <td>3.0</td>
            <td>Plan Luz > 70.000</td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_12_mercantil_1']; ?>" name="negocio_12_mercantil_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_12_mercantil_2']; ?>" name="negocio_12_mercantil_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_12_mercantil_3']; ?>" name="negocio_12_mercantil_3" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_12_laboral_1']; ?>" 	 name="negocio_12_laboral_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_12_laboral_2']; ?>" 	 name="negocio_12_laboral_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_12_laboral_3']; ?>" 	 name="negocio_12_laboral_3" required></td>
          </tr>
		  <tr>
            <td><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Residencial">home</i></td>
            <td>3.3</td>
            <td>Plan Gas</td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_13_mercantil_1']; ?>" name="negocio_13_mercantil_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_13_mercantil_2']; ?>" name="negocio_13_mercantil_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_13_mercantil_3']; ?>" name="negocio_13_mercantil_3" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_13_laboral_1']; ?>" 	 name="negocio_13_laboral_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_13_laboral_2']; ?>" 	 name="negocio_13_laboral_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_13_laboral_3']; ?>" 	 name="negocio_13_laboral_3" required></td>
          </tr>
		  <tr>
            <td><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Residencial">home</i></td>
            <td>3.4</td>
            <td>Plan Gas</td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_14_mercantil_1']; ?>" name="negocio_14_mercantil_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_14_mercantil_2']; ?>" name="negocio_14_mercantil_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_14_mercantil_3']; ?>" name="negocio_14_mercantil_3" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_14_laboral_1']; ?>" 	 name="negocio_14_laboral_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_14_laboral_2']; ?>" 	 name="negocio_14_laboral_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_14_laboral_3']; ?>" 	 name="negocio_14_laboral_3" required></td>
          </tr>
		  <tr>
            <td><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Residencial">home</i></td>
            <td>-</td>
            <td>Funciona Negocios</td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_15_mercantil_1']; ?>" name="negocio_15_mercantil_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_15_mercantil_2']; ?>" name="negocio_15_mercantil_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_15_mercantil_3']; ?>" name="negocio_15_mercantil_3" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_15_laboral_1']; ?>" 	 name="negocio_15_laboral_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_15_laboral_2']; ?>" 	 name="negocio_15_laboral_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['negocio_15_laboral_3']; ?>" 	 name="negocio_15_laboral_3" required></td>
          </tr>
        </tbody>
      </table>
	</div>
	<div id="extra" class="col s12">
	<table class="centered striped responsive-table">
        <thead>
          <tr>
              <th>SEG. <?php echo $s['id']; ?></th>
              <th>TARIFA</th>
              <th>PRODUC.</th>
              <th>MERC. TOTAL</th>
			  <th>MERC. GERENTE</th>
			  <th>MERC. DISTRIBUIDOR</th>
			  <th>LAB. TOTAL</th>
			  <th>LAB. GERENTE</th>
			  <th>LAB. DISTRIBUIDOR</th>
          </tr>
        </thead>

        <tbody>
		  <tr>
            <td><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Residencial">home</i></td>
            <td>-</td>
            <td>@</td>
			<td><input type="number" min="0" value="<?php echo $s['extra_16_mercantil_1']; ?>" name="extra_16_mercantil_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['extra_16_mercantil_2']; ?>" name="extra_16_mercantil_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['extra_16_mercantil_3']; ?>" name="extra_16_mercantil_3" required></td>
			<td><input type="number" min="0" value="<?php echo $s['extra_16_laboral_1']; ?>"   name="extra_16_laboral_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['extra_16_laboral_2']; ?>"   name="extra_16_laboral_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['extra_16_laboral_3']; ?>"   name="extra_16_laboral_3" required></td>
          </tr>
		  <tr>
            <td><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Residencial">home</i></td>
            <td>-</td>
            <td>Clima</td>
			<td><input type="number" min="0" value="<?php echo $s['extra_17_mercantil_1']; ?>" name="extra_17_mercantil_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['extra_17_mercantil_2']; ?>" name="extra_17_mercantil_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['extra_17_mercantil_3']; ?>" name="extra_17_mercantil_3" required></td>
			<td><input type="number" min="0" value="<?php echo $s['extra_17_laboral_1']; ?>"   name="extra_17_laboral_1" required></td>
			<td><input type="number" min="0" value="<?php echo $s['extra_17_laboral_2']; ?>"   name="extra_17_laboral_2" required></td>
			<td><input type="number" min="0" value="<?php echo $s['extra_17_laboral_3']; ?>"   name="extra_17_laboral_3" required></td>
          </tr>
        </tbody>
      </table>
	</div>
	<div class="input-field col s12 m12">
		Desde
	  </div>
	  <div class="input-field col s12 m4">
		<i class="material-icons prefix">date_range</i>
		<input id="we_dia" name="we_dia" type="number" min="1" value="<?php echo $s['we_dia']; ?>" max="31" pattern="[0-9]{2}" class="validate" style="text-transform: uppercase;" maxlength="2" data-length="2" required>
		<label for="we_dia">DÍA WE</label>
	  </div>
	  <div class="input-field col s12 m4">
		<i class="material-icons prefix">date_range</i>
		<input id="we_mes" name="we_mes" type="number" min="1" value="<?php echo $s['we_mes']; ?>" max="12" pattern="[0-9]{2}" class="validate" style="text-transform: uppercase;" maxlength="2" data-length="2" required>
		<label for="we_mes">MES WE</label>
	  </div>
	  <div class="input-field col s12 m4">
		<i class="material-icons prefix">date_range</i>
		<input id="we_ano" name="we_ano" type="number" min="<?php echo date(Y)-1; ?>" value="<?php echo $s['we_ano']; ?>" max="<?php echo date(Y)+1; ?>" pattern="[0-9]{4}" class="validate" style="text-transform: uppercase;" maxlength="4" data-length="4" required>
		<label for="we_ano">AÑO WE</label>
	  </div>
	  <?php if($s['residencial_8_mercantil_1'] == ''){ ?>
	    <button type="submit" name="add_com" class="waves-effect waves-light btn" style="width: 100%;">Crear comisiones</button>
	  <?php } else { ?>
		<button type="submit" name="edit_com" class="waves-effect waves-light btn" style="width: 100%;">Actualizar comisiones</button>
	  <?php } ?>
	  
	</div>
  </div>
			  
            </div>
          </div>
        </div>
      </div>
  
  </form>
<?php } else { ?>
  <div class="row">
    <div class="col s12 m12">
      <div class="card">
        <div class="card-content black-text">
          <span class="card-title center">Pagos</span>
      <table class="striped centered">
        <thead>
          <tr>
              <th>Subgerencia</th>
              <th>Opciones</th>
          </tr>
        </thead>

        <tbody>
		<?php $c_sql = mysql_query("SELECT * FROM click_gerentes_introductores ORDER BY id DESC"); while($c = mysql_fetch_assoc($c_sql)){ ?>
          <tr>
            <td><?php echo $c['subgerente']; ?></td>
            <td>
			<a class="btn-floating btn-large waves-effect waves-light modal-trigger" href="<?php echo $config['site']; ?>/index.php?page=pagos&subgerente=<?php echo $c['id']; ?>" style="background-color: #2196f3 !important;"><i style="color: #fff !important;" class="material-icons">create</i></a>
			<a class="btn-floating btn-large waves-effect waves-light modal-trigger" href="#delete<?php echo $c['id']; ?>" style="background-color: #b71c1c !important;"><i style="color: #fff !important;" class="material-icons">delete</i></a>
			</td>
          </tr>
		  <div id="delete<?php echo $c['id']; ?>" class="modal">
			<div class="modal-content">
			  <div class="row">
			  <?php
				if (isset($_POST['eliminar'. $c[id] .''])) {
					mysql_query("DELETE FROM click_gerentes_introductores WHERE id='$c[id]'");
					echo "
					<script>swal(
					  'Correcto',
					  'Se ha eliminado correctamente',
					  'success'
					)</script>
					";
					echo '
					<script>
					function redireccionarUsuario() {
					  window.location = "'. $site .'/index.php?page=extra_adds";
					}
					setTimeout("redireccionarUsuario()", 1000);
					</script>
					';
				}
			  ?>
				<form method="POST" class="col s12">
				  <div class="row">
					<div class="input-field col s12 m12">
					<span class="card-title center">¡Cuidado!</span>
					<p class="light center">Estás apunto de eliminar a <b><?php echo $c['subgerente']; ?></b>, ¿estás seguro?<br> Después no podrás recuperarlo</p>
					</div>
					<div class="input-field col s12 m6">
					  <a class="modal-action modal-close waves-effect waves-light btn #b71c1c red darken-4" style="width: 100%;">Cancelar</a>
					</div>
					<div class="input-field col s12 m6">
					  <button type="submit" name="eliminar<?php echo $c['id']; ?>" class="modal-action modal-close waves-effect waves-light btn #ff6f00 amber darken-4" style="width: 100%;">Eliminar</button>
					</div>
				  </div>
				</form>
			  </div>
			</div>
		  </div>
		<?php } ?>
        </tbody>
      </table>
        </div>
      </div>
    </div>
  </div>
<?php } ?>