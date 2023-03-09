<?php if(Filter($_GET['user'])){ ?>
	<?php $u_sql = mysql_query("SELECT * FROM users WHERE username='". Filter($_GET[user]) ."'"); while($u = mysql_fetch_assoc($u_sql)){ ?>
	<?php
	$Var = mysql_query("SELECT count(*) count FROM contratos WHERE user_contrato_intro='$u[username]'");
	$count_contratos = mysql_fetch_assoc($Var);
	$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE intro_user='$u[username]'");
	$count_voids = mysql_fetch_assoc($Var);
	?>
      <div class="row">
        <div class="col s12 m12">
		  <div class="card" style="background: url('<?php echo $u['background']; ?>') #795548;">
            <div class="card-content black-text">
              <div class="row">
				<div class="input-field col s12 m4">
				 <div style="background: #fff;border-radius: 200px;width: 150px;height: 150px;">
					<img style="width: 156px;border-radius: 200px;border: 4px solid #fff;margin-top: -4px;margin-left: -4px;" src="<?php echo $u['profile']; ?>">
				 </div>
				</div>
				<div class="input-field col s12 m4">
					<div class="center" style="border-bottom: 1px solid;font-size: 50px;text-transform: uppercase;font-weight: 300;color: #fff;text-shadow: 0px 0px 9px #fff;"><?php echo $u['nombre']; ?></div>
					<br>
					<div class="center white-text"><b><?php echo $count_contratos['count']; ?></b> contratos introducidos</div>
					<div class="center white-text"><b><?php echo $count_voids['count']; ?></b> voids introducidos</div>
				</div>
				<div class="input-field col s12 m4">
					<div class="center" style="font-size: 24px;text-transform: uppercase;font-weight: bold;color: #fff;">Información</div>
					<br>
					<p class="white-text center">
					Sistema operativo: <?php echo $u['so']; ?><br>
					Dirección IP: <?php echo $u['ip']; ?><br>
					Última conexión: <?php echo $u['last_online']; ?>
					</p>
				</div>
			  </div>
            </div>
          </div>
		</div>
      </div>
	<?php } ?>
<?php } else { ?>
	<?php
	$Var = mysql_query("SELECT count(*) count FROM contratos WHERE user_contrato_intro='$user[username]'");$count_contratos = mysql_fetch_assoc($Var);
	$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE intro_user='$user[username]'");$count_voids = mysql_fetch_assoc($Var);
	?>
      <div class="row">
        <div class="col s12 m12">
		  <div class="card" style="background: url('<?php echo $user['background']; ?>') #795548;">
            <div class="card-content black-text">
              <div class="row">
				<div class="input-field col s12 m4">
				 <div style="background: #fff;border-radius: 200px;width: 150px;height: 150px;">
					<img style="width: 156px;border-radius: 200px;border: 4px solid #fff;margin-top: -4px;margin-left: -4px;" src="<?php echo $user['profile']; ?>">
				 </div>
				</div>
				<div class="input-field col s12 m4">
					<div class="center" style="border-bottom: 1px solid;font-size: 50px;text-transform: uppercase;font-weight: 300;color: #fff;text-shadow: 0px 0px 9px #fff;"><?php echo $user['nombre']; ?></div>
					<br>
					<div class="center white-text"><b><?php echo $count_contratos['count']; ?></b> contratos introducidos</div>
					<div class="center white-text"><b><?php echo $count_voids['count']; ?></b> voids introducidos</div>
				</div>
				<div class="input-field col s12 m4">
					<div class="center" style="font-size: 24px;text-transform: uppercase;font-weight: bold;color: #fff;">Información</div>
					<br>
					<p class="white-text center">
					Sistema operativo: <?php echo $user['so']; ?><br>
					Dirección IP: <?php echo $user['ip']; ?><br>
					Última conexión: <?php echo $user['last_online']; ?>
					</p>
				</div>
			  </div>
            </div>
          </div>
		</div>
		
        <div class="col s12 m12">
          <div class="card white">
            <div class="card-content black-text">
              <span class="card-title center">AJUSTES</span>
            </div>
          </div>
        </div>
		<?php
		if (isset($_POST['updatepass'])) {
			$password = $_POST["password"];
			mysql_query("UPDATE users SET password='$password' WHERE username='$user[username]'");
			echo '
			<script>
			  var toastElement = Materialize.toast("Contraseña actualizada", 1500);
			  var toastInstance = toastElement.M_Toast;
			  toastInstance.remove();
			</script>';
		}
		?>
		<div class="col s12 m4">
          <div class="card white">
           <form method="POST">
			<div class="card-content black-text">
              <span class="card-title center">CONTRASEÑA</span>
			  <p>Si quieres cambiar tu contraseña actual por una nueva contraseña, rellena el siguiente campo.</p>
			  <input placeholder="Nueva contraseña" name="password" type="password" class="validate"><br>
			  <button type="submit" name="updatepass" class="waves-effect waves-light btn">Actualizar</button>
            </div>
		   </form>
          </div>
        </div>
      </div>
<?php } ?>