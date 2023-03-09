<?php
require '../inc/core.php';
$Var = mysql_query("SELECT count(*) count FROM contratos");
$count_contratos = mysql_fetch_assoc($Var);
echo '<h4 class="center">' . $count_contratos['count'] . '</h4>';
?>