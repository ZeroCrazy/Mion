<?php
  require 'inc/core.php';
  $page = 'Iniciar sesión';
  $Varu = mysql_query("SELECT * FROM users WHERE ip='$ip'");$u = mysql_fetch_assoc($Varu);
  if (isset($_SESSION['id'])) {
	  header("Location: ". $config[site] ."/index.php?page=home");
  } else {
	  if (isset($_POST['LoginUser'])) {
		  $username = Filter($_POST['username']);
		  $password = Filter($_POST['password']);
		  $error = "0";
		  $user_verify = mysql_query("SELECT * FROM users WHERE username='$username' && password='$password' LIMIT 1");
		  $user_fetch = mysql_fetch_assoc($user_verify);
		  
		  if (mysql_num_rows($user_verify) == 0) {
			$error = "1";
			$mensaje = 'Usuario o contraseña incorrecto';
		  } else {
			$_SESSION['id'] = $user_fetch['id'];
			mysql_query("UPDATE users SET ip='$ip', so='$SO', last_online='". date(d) ."-". date(m) ."-". date(Y) ."' WHERE id='$user_fetch[id]'");
			header("Location: ". $config[site] ."/index.php?page=home");
		  }
	  }
?>
<html>
<head>
  <title><?php echo $config[sitename]; ?>: <?php echo $page; ?></title>
  <link rel="icon" type="image/png" href="<?php echo $config['site']; ?>/assets/images/favicon.png" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="<?php echo $config[site]; ?>/assets/css/materialize.min.css"  media="screen,projection"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <style>
    body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
    }

    main {
      flex: 1 0 auto;
    }

    body {
      background: #fff;
    }

    .input-field input[type=date]:focus + label,
    .input-field input[type=text]:focus + label,
    .input-field input[type=email]:focus + label,
    .input-field input[type=password]:focus + label {
      color: #e91e63;
    }

    .input-field input[type=date]:focus,
    .input-field input[type=text]:focus,
    .input-field input[type=email]:focus,
    .input-field input[type=password]:focus {
      border-bottom: 2px solid #e91e63;
      box-shadow: none;
    }
  </style>
</head>

<body>
  <div class="section"></div>
  <main>
    <center>
      <img class="responsive-img" style="width: 250px;" src="images/logo.png" />
      <div class="section"></div>

      <h5 class="indigo-text" style="color: #9c213c !important;">
		<?php if($ip == $u['ip']){ ?>
		Nos alegra verte de nuevo, <?php echo $u['nombre']; ?>
		<?php } else { ?>
		Por favor, inicia sesión en tu cuenta
		<?php } ?>
	  </h5>
      <div class="section"><?php echo $mensaje; ?></div>

      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

          <form class="col s12" method="post">
            <div class='row'>
              <div class='col s12'>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' value="<?php if($ip == $u['ip']){ ?><?php echo $u['username']; ?><?php } ?>" type='text' name='username' id='username' required />
                <label for='username'>Usuario</label>
              </div>
            </div>
<script language="javascript">
	document.getElementById('username').focus();
</script>
            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' value="<?php if($ip == $u['ip']){ ?><?php echo $u['password']; ?><?php } ?>" type='password' name='password' id='password' />
                <label for='password'>Contraseña</label>
              </div>
              <label style='float: right;'>
				<a class='black-text' href='#!'>Has perdido la contraseña?</a>
			  </label>
            </div>

            <br />
            <center>
              <div class='row'>
                <button type='submit' style='background-color: #9c213c !important;' name='LoginUser' class='col s12 btn btn-large waves-effect indigo'>Entrar</button>
              </div>
            </center>
          </form>
        </div>
      </div>
    </center>

    <div class="section"></div>
    <div class="section"></div>
  </main>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
</body>

</html>
  <?php } ?>