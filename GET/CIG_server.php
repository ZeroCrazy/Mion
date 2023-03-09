<?php 
  require '../inc/core.php'; 
?>
<style>
	body{
		font-family: "Roboto", sans-serif;
	}
</style>
<?php
$Var = mysql_query("SELECT * FROM cigs ORDER BY id DESC LIMIT 1");
$n = mysql_fetch_assoc($Var);

if($n[num] == ''){
	$numero = '1';
} else {
	$numero = $n[num]++;
	$numero++;
}


?>

Siguiente C.I.G: <?php echo date(His); ?><span style="background: green;color: #fff;padding: 1px 5px;">118-<?php echo date(y) . '-' . date(m) . '-' . date(d); ?>-1-</span><span style="background: orange;color: #fff;padding: 1px 10px;"><?php 
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
?></span>
<hr>

<?php
$hora_reset = 2300; // Se vaciará la tabla 'cigs' a partir de las 23:00:00 (230000)
$hora = new DateTime("". date(d) ."-". date(m) ."-". date(y) ." ". date(His) ."");
$hora_prox = new DateTime("". date(d) ."-". date(m) ."-". date(y) ." ". $hora_reset ."");
if($hora == $hora_prox){
	mysql_query("TRUNCATE TABLE cigs");
	$fechacig = date(Y) . '-' . date(m) . '-' . date(d) . ' ' . date(H) . ':' . date(i) . ':' . date(s);
	mysql_query("INSERT INTO cigs (id,num,fecha,user_intro) VALUES ('1','-1','$fechacig','SERVIDOR')");	
	echo 'Hora reset: ' . $hora_reset;
}

$hora_reset2 = 2301; // Se vaciará la tabla 'cigs' a partir de las 23:01:00 (230100)
$hora_prox2 = new DateTime("". date(d) ."-". date(m) ."-". date(y) ." ". $hora_reset ."");
if($hora == $hora_prox2){
	mysql_query("TRUNCATE TABLE cigs");
	$fechacig = date(Y) . '-' . date(m) . '-' . date(d) . ' ' . date(H) . ':' . date(i) . ':' . date(s);
	mysql_query("INSERT INTO cigs (id,num,fecha,user_intro) VALUES ('1','-1','$fechacig','SERVIDOR')");
	echo 'Hora reset: ' . $hora_reset2;
}
header("Refresh:0.2");
echo date(H) . ':' . date(i) . ':' . date(s);
?>














<!--
<style>
	body{
		font-family: "Roboto", sans-serif;
	}
	</style>
<?php
$Var = mysql_query("SELECT * FROM cigs ORDER BY id DESC LIMIT 1");
$n = mysql_fetch_assoc($Var);

if($n[num] == ''){
	$numero = '1';
} else {
	$numero = $n[num]++;
	$numero++;
}


?>

Siguiente C.I.G: <span style="background: green;color: #fff;padding: 1px 5px;">118-<?php echo date(y) . '-' . date(m) . '-' . date(d); ?>-1-</span><span style="background: orange;color: #fff;padding: 1px 10px;"><?php 
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
?></span>
<hr>

<?php
$hora_reset = 2300; // Se vaciará la tabla 'cigs' a partir de las 23:00:00 (230000)
$hora = new DateTime("". date(d) ."-". date(m) ."-". date(y) ." ". date(His) ."");
$hora_prox = new DateTime("". date(d) ."-". date(m) ."-". date(y) ." ". $hora_reset ."");
if($hora == $hora_prox){
	mysql_query("DELETE FROM cigs");
	echo 'Hora reset: ' . $hora_reset;
}

$hora_reset2 = 2301; // Se vaciará la tabla 'cigs' a partir de las 23:00:00 (230000)
$hora_prox2 = new DateTime("". date(d) ."-". date(m) ."-". date(y) ." ". $hora_reset ."");
if($hora == $hora_prox2){
	mysql_query("DELETE FROM cigs");
	echo 'Hora reset: ' . $hora_reset2;
}
header("Refresh:0.2");
echo date(H) . ':' . date(i) . ':' . date(s);
?>
-->