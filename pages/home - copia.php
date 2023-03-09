<?php
$Var = mysql_query("SELECT count(*) count FROM contratos");
$count_contratos = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos_voids");
$count_contratos_voids = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM alerts");
$count_alerts = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT * FROM contratos ORDER BY id DESC");
$last_cig = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE we_dia='$last_cig[we_dia]' AND we_mes='$last_cig[we_mes]' AND we_ano='$last_cig[we_ano]'");
$count_produccion = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM messages WHERE user_to='$user[id]' AND visibility='1'");
$count_mensajes = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM click_comerciales WHERE estado = '#f27474'");
$count_comerciales_rojo = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM click_comerciales WHERE estado = '#4caf50'");
$count_comerciales_verde = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM click_comerciales WHERE estado = '#ffeb3b'");
$count_comerciales_amarillo = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM click_comerciales WHERE estado = '#00bcd4'");
$count_comerciales_azul = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT * FROM contratos_importados ORDER BY id DESC");
$lastweimp = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos_importados WHERE we_dia='$lastweimp[we_dia]' AND we_mes='$lastweimp[we_mes]' AND we_ano='$lastweimp[we_ano]'");
$count_lastweimp = mysql_fetch_assoc($Var);
if (isset($_POST['reiniciarcig'])) {
	mysql_query("DELETE FROM cigs");
	header("Refresh:0.2");
}
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
      <div class="row">
        <div class="col s12 m3">
          <div class="card" style="background: #3991db;">
            <div class="card-content white-text">
              <span class="card-title center">Comerciales</span>
              <h4 class="center"><?php echo $comercialestotal; ?></h4>
			  <a href="<?php echo $config['site']; ?>/index.php?page=gerentes"><div class="vermas">Ver más  <i class="material-icons">keyboard_arrow_right</i></div></a>
            </div>
          </div>
        </div>
		<div class="col s12 m3">
          <div class="card" style="background: #9139db;">
            <div class="card-content white-text">
              <span class="card-title center">Contratos</span>
              <h4 class="center"><?php echo $count_contratos['count']; ?></h4>
			  <a href="<?php echo $config['site']; ?>/index.php?page=all_contracts"><div class="vermas">Ver más  <i class="material-icons">keyboard_arrow_right</i></div></a>
            </div>
          </div>
        </div>
		<div class="col s12 m3">
          <div class="card" style="background: #d9db38;">
            <div class="card-content white-text">
              <span class="card-title center">Voids</span>
              <h4 class="center"><?php echo $count_contratos_voids['count']; ?></h4>
			  <a href="<?php echo $config['site']; ?>/index.php?page=all_voids"><div class="vermas">Ver más  <i class="material-icons">keyboard_arrow_right</i></div></a>
            </div>
          </div>
        </div>
		<div class="col s12 m3">
          <div class="card" style="background: #555555;">
            <div class="card-content white-text">
              <span class="card-title center">C.I.G</span>
              <h4 class="center">
<?php 
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
			  </h4>
			  <a class="modal-trigger" href="#shutdowncig"><div class="vermas">Reiniciar  <i class="material-icons">refresh</i></div></a>
			  <div id="shutdowncig" class="modal">
				<div class="modal-content black-text">
				  <h4 class="center"><b>¡Cuidado!</b></h4>
				  <p class="light center">Estás apunto de reiniciar el contador C.I.G.<br>¿Quieres dejar el contador a 001?<br><br></p>
  <div class="row">
    <form method="POST" class="col s12">
      <div class="row">
        <div class="input-field col s12 m6">
			<a style="width: 100%;" class="waves-effect waves-light btn #b71c1c red darken-4 modal-action modal-close">No</a>
        </div>
		<div class="input-field col s12 m6">
			<button style="width: 100%;" type="submit" name="reiniciarcig" class="waves-effect waves-light btn">Sí</button>
        </div>
      </div>
	</form>
  </div>
		
				</div>
			  </div>
			  <!--form method="POST"><button style="background: transparent;border: none;width: 100%;" type="submit" name="reiniciarcig" href="<?php echo $config['site']; ?>/index.php?page=avisos"><div class="vermas">Ver más  <i class="material-icons">keyboard_arrow_right</i></div></button></form-->
            </div>
          </div>
        </div>
		
		<div class="col s12 m3">
          <div class="card" style="background: #db6738;">
            <div class="card-content white-text">
              <span class="card-title center">Avisos</span>
              <h4 class="center"><?php echo $count_alerts['count']; ?></h4>
			  <a href="<?php echo $config['site']; ?>/index.php?page=avisos"><div class="vermas">Ver más  <i class="material-icons">keyboard_arrow_right</i></div></a>
            </div>
          </div>
        </div>
		<div class="col s12 m3">
          <div class="card" style="background: #da9838;">
            <div class="card-content white-text">
              <span class="card-title center">Producción</span>
			  <div style="position: absolute;margin-top: -12px;margin-left: 64px;"><?php echo $last_cig['we_dia']; ?>/<?php echo $last_cig['we_mes']; ?></div>
              <h4 class="center"><?php echo $count_produccion['count']; ?></h4>
			  <a href="<?php echo $config['site']; ?>/index.php?page=produccion&we_dia=<?php echo $last_cig['we_dia']; ?>&we_mes=<?php echo $last_cig['we_mes']; ?>&we_ano=<?php echo $last_cig['we_ano']; ?>"><div class="vermas">Ver más  <i class="material-icons">keyboard_arrow_right</i></div></a>
            </div>
          </div>
        </div>
		<div class="col s12 m3">
          <div class="card" style="background: #fe9838;">
            <div class="card-content white-text">
              <span class="card-title center">Prod. imp.</span>
			  <div style="position: absolute;margin-top: -12px;margin-left: 64px;"><?php echo $lastweimp['we_dia']; ?>/<?php echo $lastweimp['we_mes']; ?></div>
              <h4 class="center"><?php echo $count_lastweimp['count']; ?></h4>
			  <a href="#"><div class="vermas">Ver más  <i class="material-icons">keyboard_arrow_right</i></div></a>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
	  <div class="col s12 m8">
		  <div class="row">
			<!--div class="col s12 m12">
			<div class="card">
			  <div class="card-content black-text">
			    <span class="card-title center" style="border-bottom: 2px solid;padding: 0px 0px 10px 0px;">C.I.G</span>
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
			    <p><h4 class="center"><span style="background: #777777;color: #fff;">118</span><?php echo '<span style="background: #9e9e9e;color: #fff;">' . date(y) . '</span><span style="background: #777777;color: #fff;">' . date(m) . '</span><span style="background: #9e9e9e;color: #fff;">' . date(d); ?></span><span style="background: #777777;color: #fff;">1</span><span style="background: #9C213C;color: #fff;"><?php 
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
?></span></h4></p>
<?php
if (isset($_POST['reiniciarcig'])) {
	mysql_query("DELETE FROM cigs");
	header("Refresh:0.2");
}
?>
<form method="POST" style="position: absolute;margin-top: -50px;margin-left: 30px;"><button type="submit" name="reiniciarcig" class="btn"><i class="material-icons">refresh</i></button></form>
			  </div>
			</div>
			</div-->
			<!--div class="col s12 m6">
			<div class="card">
            <div class="card-content black-text">
			
<div id="see_message" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Mensajes &#187; Todos los mensajes</h4>
      <form method="POST" class="col s12 m12">
		<div class="row">
      <table class="bordered centered striped">
        <thead>
          <tr>
              <th>Enviado por</th>
              <th>Mensaje</th>
          </tr>
        </thead>

        <tbody>
		<?php $mm = mysql_query("SELECT * FROM messages WHERE user_to='$user[id]' AND visibility='1' ORDER BY id DESC"); while($m = mysql_fetch_assoc($mm)){ ?>	
		  <?php $mmm = mysql_query("SELECT * FROM users WHERE id='$m[user_from]'"); $mx = mysql_fetch_assoc($mmm); ?>
		  <?php
		if (isset($_POST['delete_message_'. $m[id] .''])) {
			mysql_query("UPDATE messages SET visibility='0' WHERE id='". $m[id] ."'");
			
			echo '<script>
				swal({
				  type: "success",
				  title: "Mensaje eliminado",
				  showConfirmButton: false
				})</script>
				<script>
				function redireccionarUsuario() {
				  window.location = "index.php?page=home";
				}
				setTimeout("redireccionarUsuario()", 1500);
				</script>
				';
		}
		  ?>
          <tr>
            <td><?php echo $mx['nombre']; ?></td>
            <td><?php echo $m['message']; ?></td>
            <td>
			<form method="POST">
			  <button type="submit" name="delete_message_<?php echo $m['id']; ?>" class="btn waves-effect waves-light tooltipped #f44336 red" style="border: 2px solid #fff;margin-top: -2px;padding: 0px 12px;height: 20px;" data-position="top" data-style="rounded" data-delay="50" data-tooltip="Eliminar"></a>
			</form>
			</td>
          </tr>
		<?php } ?>
        </tbody>
      </table>
		</div>
	  </form>
    </div>
 <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
    </div>
  </div>
<div id="add_message" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Mensajes &#187; Nuevo mensaje</h4>
<?php
if (isset($_POST['send_message'])) {
	$user_to = $_POST["user_to"];
	$message = $_POST["message"];
	mysql_query("INSERT INTO messages (user_from,user_to,message,date) VALUES ('$user[id]','$user_to','$message','". time() ."')");
	
echo '<script>
swal({
  type: "success",
  title: "Mensaje enviado",
  showConfirmButton: false
})</script>
<script>
function redireccionarUsuario() {
  window.location = "index.php?page=home";
}
setTimeout("redireccionarUsuario()", 1500);
</script>
';
}
?>
      <form method="POST" class="col s12 m12">
		<div class="row">
      <table class="bordered centered striped">
        <thead>
          <tr>
              <th>Enviado por...</th>
              <th>Enviar a...</th>
              <th>Mensaje</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td><?php echo $user['nombre']; ?></td>
            <td>
			<select name="user_to" class="browser-default">
			<option value="" disabled selected>Escoge un usuario</option>
			<?php $mm = mysql_query("SELECT * FROM users"); while($m = mysql_fetch_assoc($mm)){ ?>
			<option value="<?php echo $m['id']; ?>"><?php echo $m['nombre']; ?></option>
			<?php } ?>
			</select>
			</td>
            <td><textarea name="message" class="browser-default" placeholder="Introduce aquí tu mensaje" style="background: #fff;border: none;border-radius: 4px;padding: 5px;"></textarea></td>
          </tr>
        </tbody>
      </table>
		</div>
		<button class="btn waves-effect waves-light" type="submit" name="send_message" style="width: 100%;background: #444;">Enviar mensaje
		  <i class="material-icons right">send</i>
		</button>
	  </form>
    </div>
 <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
    </div>
  </div>
			
              <span class="card-title center" style="border-bottom: 2px solid;padding: 0px 0px 10px 0px;">Buzón</span>
              <p><h4 class="center"><a class="modal-trigger" href="#add_message" style="font-size: 16px;"><i class="material-icons">add_alert</i></a><?php echo $count_mensajes['count']; ?><a class="modal-trigger" href="#see_message" style="font-size: 16px;"><i class="material-icons">remove_red_eye</i></a></h4></p>
            </div>
          </div>
			</div -->
		  </div>
        </div>		
      </div>
	  