  <script>
function cod_verificacion() {
  /* Get the text field */
  var copyText = document.getElementById("MyInput");

  /* Select the text field */
  copyText.select();

  /* Copy the text inside the text field */
  document.execCommand("Copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
</script>
  <div class="row">
    <div class="col s12 m5">
      <div class="card">
        <div class="card-content black-text">
<select class="browser-default" name="forma" onchange="location = this.value;">
 <?php if(Filter($_GET['estados'])){ ?>
 <option value="<?php echo $config['site']; ?>/index.php?page=cambios_de_estado&estados=<?php echo Filter($_GET['estados']); ?>" selected><?php echo Filter($_GET['estados']); ?></option>
 <?php } ?>
 <option value="<?php echo $config['site']; ?>/index.php?page=cambios_de_estado&estados=INTRODUCIDO">INTRODUCIDO</option>
 <option value="<?php echo $config['site']; ?>/index.php?page=cambios_de_estado&estados=RECUPERADO">RECUPERADO</option>
 <option value="<?php echo $config['site']; ?>/index.php?page=cambios_de_estado&estados=DISPONIBLE PARA BACKOFFICE">DISPONIBLE PARA BACKOFFICE</option>
 <option value="<?php echo $config['site']; ?>/index.php?page=cambios_de_estado&estados=VENTA INFORMADA CON ERRORES">VENTA INFORMADA CON ERRORES</option>
 <option value="<?php echo $config['site']; ?>/index.php?page=cambios_de_estado&estados=CARGADO POR BACKOFFICE">CARGADO POR BACKOFFICE</option>
 <option value="<?php echo $config['site']; ?>/index.php?page=cambios_de_estado&estados=CARGADO POR REPLICACION">CARGADO POR REPLICACION</option>
 <option value="<?php echo $config['site']; ?>/index.php?page=cambios_de_estado&estados=VENTA INFORMADA CORRECTAMENTE">VENTA INFORMADA CORRECTAMENTE</option>
</select>
        </div>
      </div>
    </div>
	<div class="col s12 m4">
      <div class="card">
        <div class="card-content black-text">
		<select class="browser-default" name="forma" onchange="location = this.value;">
		<?php if(Filter($_GET['filtro'])){ ?>
		 <option value="<?php echo $config['site']; ?>/index.php?page=cambios_de_estado&estados=<?php echo Filter($_GET['filtro']); ?>" selected><?php echo Filter($_GET['filtro']); ?></option>
		 <?php } else { ?>
		 <option value="" selected disabled>Selecciona uno</option>
		 <?php } ?>
		 <option value="<?php echo $config['site']; ?>/index.php?page=cambios_de_estado&estados=<?php echo Filter($_GET['estados']); ?>&filtro=cups_luz">Cups luz</option>
		 <option value="<?php echo $config['site']; ?>/index.php?page=cambios_de_estado&estados=<?php echo Filter($_GET['estados']); ?>&filtro=cups_gas">Cups gas</option>
		 <option value="<?php echo $config['site']; ?>/index.php?page=cambios_de_estado&estados=<?php echo Filter($_GET['estados']); ?>&filtro=cod_verificacion">Código Verificación</option>
		</select>
        </div>
      </div>
    </div>
	<div class="col s12 m3">
      <div class="card">
        <div class="card-content black-text center">
<?php
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE estado_contrato = '". Filter($_GET[estados]) ."'");
$count_contratos = mysql_fetch_assoc($Var);
?>
<h1><?php echo $count_contratos['count']; ?></h1>
<input type="text" value="<?php $c_sql = mysql_query("SELECT * FROM contratos WHERE estado_contrato = '". Filter($_GET[estados]) ."'"); while($gx = mysql_fetch_assoc($c_sql)){ ?>	
<?php if(Filter($_GET['filtro']) == 'cod_verificacion'){ ?>
V<?php echo $gx[''. Filter($_GET[filtro]) .'']; ?>
<?php } else { ?>
<?php echo $gx[''. Filter($_GET[filtro]) .'']; ?>
<?php } ?>
<?php } ?> " id="MyInput">
<center><button class="waves-effect waves-light btn" onclick="cod_verificacion()">Copiar</button></center>
        </div>
      </div>
    </div>
  </div>

<?php if(Filter($_GET['estados'])){ ?>
<div class="row">
    <div class="col s12 m12">
      <div class="card">
        <div class="card-content black-text">
          <span class="card-title center">Registro</span>
      <table>
        <thead>
          <tr>
              <th>Nombre</th>
              <th>Apellidos</th>
              <th><?php echo Filter($_GET['filtro']); ?></th>
          </tr>
        </thead>

        <tbody>
		<?php $c_sql = mysql_query("SELECT * FROM contratos WHERE estado_contrato = '". Filter($_GET[estados]) ."'"); while($gx = mysql_fetch_assoc($c_sql)){ ?>
          <tr>
            <td><?php echo $gx['nombre_titular']; ?></td>
            <td><?php echo $gx['apellidos_titular']; ?></td>
            <td><?php echo $gx[''. Filter($_GET[filtro]) .'']; ?></td>
          </tr>
		<?php } ?>
        </tbody>
      </table>
        </div>
      </div>
    </div>
</div>
<?php } ?>