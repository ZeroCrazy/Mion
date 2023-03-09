<?php require '../../inc/core.php'; 
	if (isset($_SESSION['id'])) {
		$usuario = $user[username];
	} else {
		$usuariox = 'USER'. str_replace(".", "", substr($ip, 2, 8)) .'';
		$usuario = $usuariox;
	}
?>
<?php $cc = mysql_query("SELECT * FROM chat ORDER BY id DESC"); while($c = mysql_fetch_assoc($cc)){ ?>	
  <div class="mensaje">
  <?php if($c['user'] == $usuario){ ?>
  <div style="background: #000;color: #fff;float: right;"><?php echo $c['message']; ?></div>
  <?php } else { ?>
  <div style="background: #fff;margin: 3px;padding-left: 3px;color: #000;border-radius: 4px;">
  <span style="color: grey;font-size: 12px;margin: 0px;">[<?php echo substr($c['date'], 11, 5); ?>]</span>
  <b><?php echo $c['user']; ?>:</b> <?php echo $c['message']; ?>
  </div><?php } ?>
  </div>
  <?php if($c['user'] == $usuario){?><br><?php } ?>
<?php } ?>