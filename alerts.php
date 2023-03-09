<?php 
	require 'inc/core.php'; 
	require 'templates/header.php'; 
?>
  <div class="row">
    <div class="col s12 m12">
      <div class="card">
        <div class="card-content black-text">
          <!--span class="card-title">Avisos</span-->
		  <table class="centered striped responsive-table">
			<thead>
			  <tr>
				  <th>#</th>
				  <th>Contrato</th>
				  <th>Introducción</th>
				  <th>Creación alerta</th>
				  <th>Opciones</th>
			  </tr>
			</thead>
		<!--a target="_blank" href="<?php echo $config['site']; ?>/index.php?page=edit_contract_id&id=<?php echo $x['id']; ?>">
		<font color="red">VER ERROR<br><span style="font-size: 14px;">Intro: <?php echo date("d/m/Y H:i", $x['fecha_contrato_intro']); ?></span></font></a-->
			<tbody>
<?php $c_sql = mysql_query("SELECT * FROM alerts WHERE hidden='0' ORDER BY id DESC"); while($c = mysql_fetch_assoc($c_sql)){
$x_sql = mysql_query("SELECT * FROM contratos WHERE cod_verificacion='$c[verificacion]'"); while($x = mysql_fetch_assoc($x_sql)){
?>
<?php if (isset($_POST['ocultar'.$c[id].''])) {
	mysql_query("UPDATE alerts SET hidden='1' WHERE id='$c[id]'");
	echo "<script>location.reload();</script>";
} ?>
			  <!--"SELECT * FROM alerts WHERE `date` BETWEEN DATE_SUB(NOW() , INTERVAL 15 SECOND) AND NOW();"-->
			  <tr>
				<td><b><?php echo $c['id']; ?></b></td>
				<td><?php if($c['type'] == 'verificacion'){ echo 'Verificación'; } elseif($c['type'] == 'cliente'){ echo 'Cliente'; } else { echo 'Comercial'; } ?></td>
				<td>
				<span class="tooltipped" data-position="right" data-tooltip="<?php echo date("d/m/Y H:i:s", $x['fecha_contrato_intro']) ?>"><?php
				  $date1 = new DateTime("". date("Y-m-d H:i:s", $x['fecha_contrato_intro']) ."");
				  $date2 = new DateTime("$c[fecha]");
				  $interval = $date1->diff($date2);
				  echo "Hace " . $interval->days . " días";
				?></div>
				</td>
				<td><?php if($c['fecha'] == ''){ echo '<font color="red">?</font>'; } else { ?><?php echo substr($c['fecha'], 8, 2); ?>/<?php echo substr($c['fecha'], 5, 2); ?>/<?php echo substr($c['fecha'], 0, 4); ?> <?php echo substr($c['fecha'], 11, 8); ?><?php } ?></td>
				<td>
				
				<form method="POST">
					<a href="#see<?php echo $c['id']; ?>" class="waves-effect waves-light btn modal-trigger" style="background: <?php echo $config['colorsv']; ?>;"><i class="material-icons">remove_red_eye</i></a>
					<button type="submit" name="ocultar<?php echo $c['id']; ?>" class="waves-effect waves-light btn" style="background: <?php echo $config['colorsv']; ?>;"><i class="material-icons">delete</i></button>
				</form>
				</td>
			  </tr>
  <div id="see<?php echo $c['id']; ?>" class="modal">
    <div class="modal-content">
      <h5 class="center">
	  <?php if($c['type'] == 'verificacion'){ echo 'Verificación: '. $c[verificacion] .''; } elseif($c['type'] == 'cliente'){ echo 'Cliente: '. $c[nif] .''; } else { echo 'Comercial: '. $c[codigo_comercial] .''; } ?>
	  </h5>
      <div class="row">
		<div class="col s12 m8 offset-m2 l6 offset-l3">
			<div style="border: 1px solid;padding: 10px;">
			<?php echo $c['nota']; ?>
			</div>
			<br>
			<a style="box-shadow: none;width: 100%;background: <?php echo $config['colorsv']; ?>;" href="<?php echo $config['site']; ?>/index.php?page=edit_contract_id&id=<?php echo $x['id']; ?>" class="waves-effect waves-light btn">Ver contrato</a>
		</div>
	  </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
    </div>
  </div>
<?php }} ?>
			</tbody>
		  </table>
        </div>
      </div>
    </div>
  </div>