<?php 
	
	require '../../inc/core.php';
	
?>

<?php $c_sql = mysql_query("SELECT * FROM alerts WHERE hidden='0' LIMIT 1"); while($c = mysql_fetch_assoc($c_sql)){ ?>
<div class="alerta" style="background: <?php echo $config['colorsv']; ?>;">
<table>
  <tbody>
	<tr style="border: none;">
		<td><b>ALERTA!</b> Hay un contrato introducido de las alertas.</td>
		<td><a href="<?php echo $config['site']; ?>/alertas" class="waves-effect waves-light btn" style="background: #fff;box-shadow: none;color: <?php echo $config['colorsv']; ?>;"><i class="material-icons">remove_red_eye</i></a></td>
	</tr>
  </tbody>
</table>
</div>

<!--script>
var vid = document.getElementById("myVideo");
vid.autoplay = true;
vid.load();
</script>
<audio id="myVideo"><source src="assets/media/alert2.mp3" type="audio/mpeg"></audio-->
<?php } ?>
