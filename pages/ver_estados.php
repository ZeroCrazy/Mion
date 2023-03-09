  <div class="row">
    <div class="col s12 m12">
      <div class="card">
        <div class="card-content black-text">
          <span class="card-title">Consultar estados</span>
		  <p class="light">Debes de consultar estados por weekend.</p>
		  <div class="row">
			<form class="col s12">
			<input type="hidden" name="page" value="ver_estados">
			<input type="hidden" name="consulta" value="1">
			  <div class="row">
				<div class="input-field col s12 m3">
				  <input placeholder="Día" value="<?php echo Filter($_GET['we_dia']); ?>" id="we_dia" name="we_dia" pattern="[0-9]{2}" maxlength="2" data-length="2" class="validate" required>
				</div>
				<div class="input-field col s12 m3">
				  <input placeholder="Mes" value="<?php echo Filter($_GET['we_mes']); ?>" id="we_mes" name="we_mes" pattern="[0-9]{2}" maxlength="2" data-length="2" class="validate" required>
				</div>
				<div class="input-field col s12 m3">
				  <input placeholder="Año" value="<?php echo Filter($_GET['we_ano']); ?>" id="we_ano" name="we_ano" pattern="[0-9]{4}" maxlength="4" data-length="4" class="validate" required>
				</div>
				<div class="input-field col s12 m3">
				  <button type="submit" style="width: 100%;border-radius: 0px;box-shadow: none;" class="waves-effect waves-light btn"><i class="material-icons right">send</i>Consultar</button>
				</div>
			  </div>
			</form>
		  </div>
        </div>
      </div>
    </div>
	<?php if(Filter($_GET['consulta'])){ ?>
    <?php $Var = mysql_query("SELECT count(*) count FROM contratos WHERE we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$cnt = mysql_fetch_assoc($Var); ?>
	<div class="col s12 m6">
      <div class="card #43a047 green darken-1">
        <div class="card-content white-text">
          <span class="card-title center">CONTRATOS <span style="border-bottom: 1px dashed;">OK</span> <a href="<?php echo $site; ?>/excel/Exportador_contratos_we_nooficial.php?we_dia=<?php echo Filter($_GET['we_dia']); ?>&we_mes=<?php echo Filter($_GET['we_mes']); ?>&we_ano=<?php echo Filter($_GET['we_ano']); ?>"><i style="background: #fff;padding: 3px 7px;position: absolute;margin-left: 5px;margin-top: -2px;border-radius: 200px;color: #43a047;" class="material-icons">file_download</i></a></span>
          <h3 class="center"><?php echo $cnt['count']; ?></h3>
        </div>
      </div>
    </div>
	<?php $Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$cntv = mysql_fetch_assoc($Var); ?>
	<div class="col s12 m6">
      <div class="card #d32f2f red darken-1">
        <div class="card-content white-text">
          <span class="card-title center">CONTRATOS <span style="border-bottom: 1px dashed;">VOID</span> <a href="<?php echo $site; ?>/excel/Exportador_void.php?we_dia=<?php echo Filter($_GET['we_dia']); ?>&we_mes=<?php echo Filter($_GET['we_mes']); ?>&we_ano=<?php echo Filter($_GET['we_ano']); ?>"><i style="background: #fff;padding: 3px 7px;position: absolute;margin-left: 5px;margin-top: -2px;border-radius: 200px;color: #e53935;" class="material-icons">file_download</i></a></span>
          <h3 class="center"><?php echo $cntv['count']; ?></h3>
        </div>
      </div>
    </div>
	<?php } ?>
  </div>