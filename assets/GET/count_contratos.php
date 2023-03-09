<?php require '../../inc/core.php';$Var = mysql_query("SELECT count(*) count FROM contratos");$count_contratos = mysql_fetch_assoc($Var); ?>
<?php echo number_format($count_contratos['count']); ?>