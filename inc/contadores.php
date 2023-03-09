<?php
	$Var = mysql_query("SELECT count(*) count FROM contratos");
	$count_contratos = mysql_fetch_assoc($Var);
	
	$Var = mysql_query("SELECT count(*) count FROM contratos_voids");
	$count_contratos_voids = mysql_fetch_assoc($Var);
	
	$Var = mysql_query("SELECT count(*) count FROM click_comerciales WHERE estado = '#f27474'");
	$count_comerciales_rojo = mysql_fetch_assoc($Var);
	$Var = mysql_query("SELECT count(*) count FROM click_comerciales WHERE estado = '#4caf50'");
	$count_comerciales_verde = mysql_fetch_assoc($Var);
	$Var = mysql_query("SELECT count(*) count FROM click_comerciales WHERE estado = '#ffeb3b'");
	$count_comerciales_amarillo = mysql_fetch_assoc($Var);
	$Var = mysql_query("SELECT count(*) count FROM click_comerciales WHERE estado = '#00bcd4'");
	$count_comerciales_azul = mysql_fetch_assoc($Var);
	$comercialestotal = $count_comerciales_verde['count'] + $count_comerciales_azul['count'] + $count_comerciales_amarillo['count'] - $count_comerciales_rojo['count'];
		
	$Var = mysql_query("SELECT * FROM cigs ORDER BY id DESC LIMIT 1");
	$n = mysql_fetch_assoc($Var);
	if($n[num] == ''){
		$numero = '1';
	} else {
		$numero = $n[num]++;
		$numero++;
	}
?>