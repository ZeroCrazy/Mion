<?php if($user['username'] == 'admin'){} else { 
echo '<script>sweetAlert("Whoops", "No tienes permisos para acceder aquí", "error");</script>';
echo "<META HTTP-EQUIV='Refresh' CONTENT='1; URL=$site/index.php?page=home'>";
}
?>