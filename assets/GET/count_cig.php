<?php 
	
	require '../../inc/core.php';

	$Var = mysql_query("SELECT * FROM cigs ORDER BY id DESC LIMIT 1");
	$n = mysql_fetch_assoc($Var);
	if($n[num] == ''){
		$numero = '1';
	} else {
		$numero = $n[num]++;
		$numero++;
	}
	
	if (mysql_num_rows($Var) == 0) {
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
	}
	
?>