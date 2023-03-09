<?php
	$vx = mysql_query("SELECT * FROM contratos WHERE cig='$_GET[cig]'");
	$x = mysql_fetch_assoc($vx);
?>
  <div class="row">
    <div class="col s12 m8 offset-m2 l6 offset-l3">
      <div class="card">
        <div class="card-content black-text center">
          <img width="100" src="https://zippy.gfycat.com/ShyCautiousAfricanpiedkingfisher.gif">
		  <br>
		  <br>
          <p style="font-size: 18px;">El cig generado es el <a href="<?php echo $config['site']; ?>/index.php?page=edit_contract_id&id=<?php echo $x['id']; ?>"><b><?php echo substr($_GET['cig'], 0, 10); ?><span style="font-size: 26px;"><?php echo substr($_GET['cig'], 10, 5); ?></span></b></a></p>
		  <br>
		  <a href="<?php echo $config['site']; ?>/index.php?page=add_contract" style="background: #49cc85;box-shadow: none;" class="waves-effect waves-light btn">Nuevo contrato</a>
        </div>
      </div>
    </div>
  </div>