      <style>
	  .btn {
		  padding: 0px !important;
	  }
	  </style>
	  <div class="row">
        <div class="col s12 m12">
          <div class="card">
            <div class="card-content black-text">
			  <div class="input-field col s12 m6">
			  <div class="row">
			  <form action="<?php echo $site; ?>/excel/Contratos.php">
			  <div class="input-field col s12 m12">
			  <span class="card-title center" style="font-size: 15px;border: 1px dashed;">Exportador CONTRATOS <b>operativo</b><div style="color: grey;margin-top: -17px;">Búsquedas por <b>subgerentes</b> y por <b>fecha de intro</b></div></span>
			  </div>
			  <div class="input-field col s12 m4">
				<input type="hidden" name="type" value="contrato">
				<input type="hidden" name="type2" value="operativo">
				<input type="hidden" name="type3" value="fechaintro">
				<select class="browser-default" name="gerente">
				  <option value="" disabled selected>Selecciona</option>
					<?php $gg_sql = mysql_query("SELECT * FROM click_gerentes_introductores ORDER BY subgerente"); while($g = mysql_fetch_assoc($gg_sql)){ ?>
					<option value="<?php echo $g['subgerente']; ?>"><?php echo $g['subgerente']; ?></option>
					<?php } ?>
				</select>
			  </div>
			  <div class="input-field col s12 m2">
				<input required placeholder="DÍA" type="text" value="<?php echo date("d"); ?>" min="1" max="31" name="intro_dia" class="validate" pattern="[0-9]{2}" maxlength="2">
			  </div>
			  <div class="input-field col s12 m2">
				<input required placeholder="MES" type="text" value="<?php echo date("m"); ?>" min="1" max="12" name="intro_mes" class="validate" pattern="[0-9]{2}" maxlength="2">
			  </div>
			  <div class="input-field col s12 m2">
				<input required placeholder="AÑO" type="text" min="<?php echo date(Y)-1; ?>" max="<?php echo date(Y)+1; ?>" value="<?php echo date("Y"); ?>" name="intro_ano" class="validate" pattern="[0-9]{4}" maxlength="4">
			  </div>
			  <div class="input-field col s12 m2">
			  <button type="submit" class="btn" style="background: <?php echo $config['colorsv']; ?>;box-shadow: none;border-radius: 1px;width: 100%;"><i class="material-icons">file_download</i></button>
			  </div>
			  </form>
			  </div>
			  </div>
			  <div class="input-field col s12 m6">
			  <div class="row">
			  <form action="<?php echo $site; ?>/excel/Contratos.php">
			  <div class="input-field col s12 m12">
			  <span class="card-title center" style="font-size: 15px;border: 1px dashed;">Exportador CONTRATOS <b>operativo</b><div style="color: grey;margin-top: -17px;">Búsquedas por <b>subgerentes</b> y por <b>weekend</b></div></span>
			  </div>
			  <div class="input-field col s12 m4">
				<input type="hidden" name="type" value="contrato">
				<input type="hidden" name="type2" value="operativo">
				<input type="hidden" name="type3" value="weekend">
				<select class="browser-default" name="gerente">
				  <option value="" disabled selected>Selecciona</option>
					<?php $gg_sql = mysql_query("SELECT * FROM click_gerentes_introductores ORDER BY subgerente"); while($g = mysql_fetch_assoc($gg_sql)){ ?>
					<option value="<?php echo $g['subgerente']; ?>"><?php echo $g['subgerente']; ?></option>
					<?php } ?>
				</select>
			  </div>
			  <div class="input-field col s12 m2">
				<input required placeholder="DÍA" type="text" min="1" max="31" name="we_dia" class="validate" pattern="[0-9]{2}" maxlength="2">
			  </div>
			  <div class="input-field col s12 m2">
				<input required placeholder="MES" type="text" min="1" max="12" name="we_mes" class="validate" pattern="[0-9]{2}" maxlength="2">
			  </div>
			  <div class="input-field col s12 m2">
				<input required placeholder="AÑO" type="text" min="<?php echo date(Y)-1; ?>" max="<?php echo date(Y)+1; ?>" name="we_ano" class="validate" pattern="[0-9]{4}" maxlength="4">
			  </div>
			  <div class="input-field col s12 m2">
			  <button type="submit" class="btn" style="background: <?php echo $config['colorsv']; ?>;box-shadow: none;border-radius: 1px;width: 100%;"><i class="material-icons">file_download</i></button>
			  </div>
			  </form>
			  </div>
			  </div>
			  <div class="input-field col s12 m6">
			  <div class="row">
			  <form action="<?php echo $site; ?>/excel/Contratos.php">
			  <div class="input-field col s12 m12">
			  <span class="card-title center" style="font-size: 15px;border: 1px dashed;">Exportador VOIDS <b>operativo</b><div style="color: grey;margin-top: -17px;">Búsquedas por <b>subgerentes</b> y por <b>fecha intro</b></div></span>
			  </div>
			  <div class="input-field col s12 m4">
				<input type="hidden" name="type" value="void">
				<input type="hidden" name="type2" value="operativo">
				<input type="hidden" name="type3" value="fechaintro">
				<select class="browser-default" name="gerente">
				  <option value="" disabled selected>Selecciona</option>
					<?php $gg_sql = mysql_query("SELECT * FROM click_gerentes_introductores ORDER BY subgerente"); while($g = mysql_fetch_assoc($gg_sql)){ ?>
					<option value="<?php echo $g['subgerente']; ?>"><?php echo $g['subgerente']; ?></option>
					<?php } ?>
				</select>
			  </div>
			  <div class="input-field col s12 m2">
				<input required placeholder="DÍA" type="text" min="1" max="31" name="intro_dia" class="validate" pattern="[0-9]{2}" maxlength="2">
			  </div>
			  <div class="input-field col s12 m2">
				<input required placeholder="MES" type="text" min="1" max="12" name="intro_mes" class="validate" pattern="[0-9]{2}" maxlength="2">
			  </div>
			  <div class="input-field col s12 m2">
				<input required placeholder="AÑO" type="text" min="<?php echo date(Y)-1; ?>" max="<?php echo date(Y)+1; ?>" name="intro_ano" class="validate" pattern="[0-9]{4}" maxlength="4">
			  </div>
			  <div class="input-field col s12 m2">
			  <button type="submit" class="btn" style="background: <?php echo $config['colorsv']; ?>;box-shadow: none;border-radius: 1px;width: 100%;"><i class="material-icons">file_download</i></button>
			  </div>
			  </form>
			  </div>
			  </div>
			  <div class="input-field col s12 m6">
			  <div class="row">
			  <form action="<?php echo $site; ?>/excel/Contratos.php">
			  <div class="input-field col s12 m12">
			  <span class="card-title center" style="font-size: 15px;border: 1px dashed;">Exportador VOIDS <b>operativo</b><div style="color: grey;margin-top: -17px;">Búsquedas por <b>subgerentes</b> y por <b>weekend</b></div></span>
			  </div>
			  <div class="input-field col s12 m4">
				<input type="hidden" name="type" value="void">
				<input type="hidden" name="type2" value="operativo">
				<input type="hidden" name="type3" value="weekend">
				<select class="browser-default" name="gerente">
				  <option value="" disabled selected>Selecciona</option>
					<?php $gg_sql = mysql_query("SELECT * FROM click_gerentes_introductores ORDER BY subgerente"); while($g = mysql_fetch_assoc($gg_sql)){ ?>
					<option value="<?php echo $g['subgerente']; ?>"><?php echo $g['subgerente']; ?></option>
					<?php } ?>
				</select>
			  </div>
			  <div class="input-field col s12 m2">
				<input required placeholder="DÍA" type="text" min="1" max="31" name="we_dia" class="validate" pattern="[0-9]{2}" maxlength="2">
			  </div>
			  <div class="input-field col s12 m2">
				<input required placeholder="MES" type="text" min="1" max="12" name="we_mes" class="validate" pattern="[0-9]{2}" maxlength="2">
			  </div>
			  <div class="input-field col s12 m2">
				<input required placeholder="AÑO" type="text" min="<?php echo date(Y)-1; ?>" max="<?php echo date(Y)+1; ?>" name="we_ano" class="validate" pattern="[0-9]{4}" maxlength="4">
			  </div>
			  <div class="input-field col s12 m2">
			  <button type="submit" class="btn" style="background: <?php echo $config['colorsv']; ?>;box-shadow: none;border-radius: 1px;width: 100%;"><i class="material-icons">file_download</i></button>
			  </div>
			  </form>
			  </div>
			  </div>
              <div class="input-field col s12 m3">
			  <div class="row">
			  <form action="<?php echo $site; ?>/excel/Contratos.php">
			  <div class="input-field col s12 m12">
			  <span class="card-title center" style="font-size: 15px;border: 1px dashed;">Exportar contratos por <b>we</b><div style="color: grey;margin-top: -17px;">Las búsquedas son por <b>subgerentes</b></div></span>
			  </div>
			  <div class="input-field col s12 m12">
				<input type="hidden" name="type" value="contrato">
				<input type="hidden" name="type2" value="oficial">
				<input type="hidden" name="type3" value="weekend">
				<select class="browser-default" name="gerente">
				  <option value="" disabled selected>Selecciona</option>
					<?php $gg_sql = mysql_query("SELECT * FROM click_gerentes ORDER BY subgerente"); while($g = mysql_fetch_assoc($gg_sql)){ ?>
					<option value="<?php echo $g['subgerente']; ?>"><?php echo $g['subgerente']; ?></option>
					<?php } ?>
				</select>
			  </div>
			  <div class="input-field col s12 m12">
				<input required placeholder="DÍA WE" type="text" min="1" max="31" name="we_dia" class="validate" pattern="[0-9]{2}" maxlength="2">
			  </div>
			  <div class="input-field col s12 m12">
				<input required placeholder="MES WE" type="text" min="1" max="12" name="we_mes" class="validate" pattern="[0-9]{2}" maxlength="2">
			  </div>
			  <div class="input-field col s12 m12">
				<input required placeholder="AÑO WE" type="text" min="<?php echo date(Y)-1; ?>" max="<?php echo date(Y)+1; ?>" name="we_ano" class="validate" pattern="[0-9]{4}" maxlength="4">
			  </div>
			  <div class="input-field col s12 m12">
			  <button type="submit" class="btn" style="background: <?php echo $config['colorsv']; ?>;box-shadow: none;border-radius: 1px;width: 100%;"><i class="material-icons">file_download</i></button>
			  </div>
			  </form>
			  </div>
			  </div>
			  <div class="input-field col s12 m3">
			  <div class="row">
			  <form action="<?php echo $site; ?>/excel/Contratos.php">
			  <div class="input-field col s12 m12">
			  <span class="card-title center" style="font-size: 15px;border: 1px dashed;">Exportar contratos por <b>fecha</b><div style="color: grey;margin-top: -17px;">Las búsquedas son por <b>subgerentes</b></div></span>
			  </div>
			  <div class="input-field col s12 m12">
				<input type="hidden" name="type" value="contrato">
				<input type="hidden" name="type2" value="oficial">
				<input type="hidden" name="type3" value="fechaintro">
				<select class="browser-default" name="gerente">
				  <option value="" disabled selected>Selecciona</option>
					<?php $gg_sql = mysql_query("SELECT * FROM click_gerentes ORDER BY subgerente"); while($g = mysql_fetch_assoc($gg_sql)){ ?>
					<option value="<?php echo $g['subgerente']; ?>"><?php echo $g['subgerente']; ?></option>
					<?php } ?>
				</select>
			  </div>
			  <div class="input-field col s12 m12">
				<input required placeholder="DÍA INTRO" type="text" min="1" max="31" name="intro_dia" class="validate" pattern="[0-9]{2}" maxlength="2">
			  </div>
			  <div class="input-field col s12 m12">
				<input required placeholder="MES INTRO" type="text" min="1" max="12" name="intro_mes" class="validate" pattern="[0-9]{2}" maxlength="2">
			  </div>
			  <div class="input-field col s12 m12">
				<input required placeholder="AÑO INTRO" type="text" min="<?php echo date(Y)-1; ?>" max="<?php echo date(Y)+1; ?>" value="<?php echo date("Y"); ?>" name="intro_ano" class="validate" pattern="[0-9]{4}" maxlength="4">
			  </div>
			  <div class="input-field col s12 m12">
			  <button type="submit" class="btn" style="background: <?php echo $config['colorsv']; ?>;box-shadow: none;border-radius: 1px;width: 100%;"><i class="material-icons">file_download</i></button>
			  </div>
			  </form>
			  </div>
			  </div>
			  <div class="input-field col s12 m3">
			  <div class="row">
			  <form action="<?php echo $site; ?>/excel/Contratos.php">
			  <div class="input-field col s12 m12">
			  <span class="card-title center" style="font-size: 15px;border: 1px dashed;">Exportar contratos por <b>intro</b><div style="color: grey;margin-top: -17px;">Las búsquedas son por <b>introductor/a</b></div></span>
			  </div>
			  <div class="input-field col s12 m12">
				<input type="hidden" name="type" value="contrato">
				<input type="hidden" name="type2" value="oficial">
				<input type="hidden" name="type3" value="fechaintro">
				<select class="browser-default" name="cod_comercial" required>
				  <option value="" disabled>Selecciona un introductor</option>
					<option value="<?php echo $user['username']; ?>" selected><?php echo $user['nombre']; ?></option>
					<?php $gg_sql = mysql_query("SELECT * FROM users ORDER BY id"); while($g = mysql_fetch_assoc($gg_sql)){ ?>
					<option value="<?php echo strtoupper($g['username']); ?>"><?php echo $g['nombre']; ?></option>
					<?php } ?>
				</select>
			  </div>
			  <div class="input-field col s12 m12">
				<input required placeholder="DÍA INTRO" type="text" min="1" max="31" value="<?php echo date("d"); ?>" name="intro_dia" class="validate" pattern="[0-9]{2}" maxlength="2">
			  </div>
			  <div class="input-field col s12 m12">
				<input required placeholder="MES INTRO" type="text" min="1" max="12" value="<?php echo date("m"); ?>" name="intro_mes" class="validate" pattern="[0-9]{2}" maxlength="2">
			  </div>
			  <div class="input-field col s12 m12">
				<input required placeholder="AÑO INTRO" ="number" min="<?php echo date(Y)-1; ?>" max="<?php echo date(Y)+1; ?>" value="<?php echo date("Y"); ?>" name="intro_ano" class="validate" pattern="[0-9]{4}" maxlength="4">
			  </div>
			  <div class="input-field col s12 m12">
			  <button type="submit" class="btn" style="background: <?php echo $config['colorsv']; ?>;box-shadow: none;border-radius: 1px;width: 100%;"><i class="material-icons">file_download</i></button>
			  </div>
			  </form>
			  </div>
			  </div>
			  <div class="input-field col s12 m3">
			  <div class="row">
			  <form action="<?php echo $site; ?>/excel/Contratos.php">
			  <div class="input-field col s12 m12">
			  <span class="card-title center" style="font-size: 15px;border: 1px dashed;">Exportar contratos por <b>void</b><div style="color: grey;margin-top: -17px;">Las búsquedas son por <b>subgerentes</b></div></span>
			  </div>
			  <div class="input-field col s12 m12">
				<input type="hidden" name="type" value="void">
				<input type="hidden" name="type2" value="oficial">
				<input type="hidden" name="type3" value="weekend">
				<select class="browser-default" name="gerente">
				  <option value="" disabled selected>Selecciona</option>
					<?php $gg_sql = mysql_query("SELECT * FROM click_gerentes ORDER BY subgerente"); while($g = mysql_fetch_assoc($gg_sql)){ ?>
					<option value="<?php echo $g['subgerente']; ?>"><?php echo $g['subgerente']; ?></option>
					<?php } ?>
				</select>
			  </div>
			  <div class="input-field col s12 m12">
				<input required placeholder="DÍA WE" type="text" min="1" max="31" name="we_dia" class="validate" pattern="[0-9]{2}" maxlength="2">
			  </div>
			  <div class="input-field col s12 m12">
				<input required placeholder="MES WE" type="text" min="1" max="12" name="we_mes" class="validate" pattern="[0-9]{2}" maxlength="2">
			  </div>
			  <div class="input-field col s12 m12">
				<input required placeholder="AÑO WE" type="text" min="<?php echo date(Y)-1; ?>" max="<?php echo date(Y)+1; ?>" name="we_ano" class="validate" pattern="[0-9]{4}" maxlength="4">
			  </div>
			  <div class="input-field col s12 m12">
			  <button type="submit" class="btn" style="background: <?php echo $config['colorsv']; ?>;box-shadow: none;border-radius: 1px;width: 100%;"><i class="material-icons">file_download</i></button>
			  </div>
			  </form>
			  </div>
			  </div>
			  
			  <div class="row"></div>
            </div>
          </div>
        </div>
      </div>