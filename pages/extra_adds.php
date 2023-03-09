<?php
	if (isset($_POST["add_subgerente"])) {
		$subgerente = strtoupper($_POST["subgerente"]);
		mysql_query("INSERT INTO click_gerentes_introductores (subgerente) VALUES ('$subgerente')");
		echo "
		<script>
		sweetAlert({
		  title:'¡Enhorabuena!',
		  html: 'Se ha añadido a <b>$subgerente</b>', 
		  imageUrl: '$config[site]/images/explosion-de-confeti-gif-10.gif',
		  imageWidth: 200,
		  imageHeight: 200,
		  confirmButtonText: 'Continuar',
		},function(isConfirm){
		  alert('ok');
		});
		$('.swal2-confirm').click(function(){
		  window.location.href = 'index.php?page=extra_adds';
		});
		</script>
		";
	}
?>
  <div class="row">
    <div class="col s12 m12">
      <div class="card">
        <div class="card-content black-text">
          <span class="card-title center">Subgerencia operativa <a class="btn-floating btn-large waves-effect waves-light modal-trigger" href="#addnew" style="float:right;background-color: #2196f3 !important;"><i style="    color: #fff !important;    margin-top: 11px;    position: absolute;    margin-left: -28px;" class="material-icons">add</i></a></span>
		  <div id="addnew" class="modal">
			<div class="modal-content">
			  <div class="row">
				<form method="POST" class="col s12">
				  <div class="row">
					<div class="input-field col s12 m12">
					  <input placeholder="Introduce el nombre del subgerente" name="subgerente" id="subgerente" type="text" class="validate" required>
					  <label for="subgerente">Subgerente</label>
					</div>
					<div class="input-field col s12 m6">
					  <a class="modal-action modal-close waves-effect waves-light btn #b71c1c red darken-4" style="width: 100%;">Cancelar</a>
					</div>
					<div class="input-field col s12 m6">
					  <button type="submit" name="add_subgerente" class="modal-action modal-close waves-effect waves-light btn" style="width: 100%;">Crear nuevo</button>
					</div>
				  </div>
				</form>
			  </div>
			</div>
		  </div>
      <table class="striped centered">
        <thead>
          <tr>
              <th>Subgerencia</th>
              <th>Opciones</th>
          </tr>
        </thead>

        <tbody>
		<?php $c_sql = mysql_query("SELECT * FROM click_gerentes_introductores ORDER BY id DESC"); while($c = mysql_fetch_assoc($c_sql)){ ?>
          <tr>
            <td><?php echo $c['subgerente']; ?></td>
            <td>
			<a class="btn-floating btn-large waves-effect waves-light modal-trigger" href="#edit<?php echo $c['id']; ?>" style="background-color: #2196f3 !important;"><i style="color: #fff !important;" class="material-icons">create</i></a>
			<a class="btn-floating btn-large waves-effect waves-light modal-trigger" href="#delete<?php echo $c['id']; ?>" style="background-color: #b71c1c !important;"><i style="color: #fff !important;" class="material-icons">delete</i></a>
			</td>
          </tr>
		  <div id="edit<?php echo $c['id']; ?>" class="modal">
			<div class="modal-content">
			  <div class="row">
			  <?php
				if (isset($_POST['guardar'. $c[id] .''])) {
					$subgerente = strtoupper($_POST['subgerente']);
					mysql_query("UPDATE click_gerentes_introductores SET subgerente='$subgerente' WHERE id='$c[id]'");
					echo "
					<script>swal(
					  'Correcto',
					  'Se ha modificado el subgerente',
					  'success'
					)</script>
					";
					echo '
					<script>
					function redireccionarUsuario() {
					  window.location = "'. $site .'/index.php?page=extra_adds";
					}
					setTimeout("redireccionarUsuario()", 1000);
					</script>
					';
					
				}
			  ?>
				<form method="POST" class="col s12">
				  <div class="row">
					<div class="input-field col s12 m12">
					  <input value="<?php echo $c['subgerente']; ?>" placeholder="Introduce el nombre del subgerente" name="subgerente" id="subgerente" type="text" class="validate">
					  <label for="subgerente">Subgerente</label>
					</div>
					<div class="input-field col s12 m6">
					  <a class="modal-action modal-close waves-effect waves-light btn #b71c1c red darken-4" style="width: 100%;">Cancelar</a>
					</div>
					<div class="input-field col s12 m6">
					  <button type="submit" name="guardar<?php echo $c['id']; ?>" class="modal-action modal-close waves-effect waves-light btn" style="width: 100%;">Guardar cambios</button>
					</div>
				  </div>
				</form>
			  </div>
			</div>
		  </div>
		  <div id="delete<?php echo $c['id']; ?>" class="modal">
			<div class="modal-content">
			  <div class="row">
			  <?php
				if (isset($_POST['eliminar'. $c[id] .''])) {
					mysql_query("DELETE FROM click_gerentes_introductores WHERE id='$c[id]'");
					echo "
					<script>swal(
					  'Correcto',
					  'Se ha eliminado correctamente',
					  'success'
					)</script>
					";
					echo '
					<script>
					function redireccionarUsuario() {
					  window.location = "'. $site .'/index.php?page=extra_adds";
					}
					setTimeout("redireccionarUsuario()", 1000);
					</script>
					';
				}
			  ?>
				<form method="POST" class="col s12">
				  <div class="row">
					
					<div class="input-field col s12 m12">
					<span class="card-title center">¡Cuidado!</span>
					<p class="light center">Estás apunto de eliminar a <b><?php echo $c['subgerente']; ?></b>, ¿estás seguro?<br> Después no podrás recuperarlo</p>
					</div>
					<div class="input-field col s12 m6">
					  <a class="modal-action modal-close waves-effect waves-light btn #b71c1c red darken-4" style="width: 100%;">Cancelar</a>
					</div>
					<div class="input-field col s12 m6">
					  <button type="submit" name="eliminar<?php echo $c['id']; ?>" class="modal-action modal-close waves-effect waves-light btn #ff6f00 amber darken-4" style="width: 100%;">Eliminar</button>
					</div>
				  </div>
				</form>
			  </div>
			</div>
		  </div>
		<?php } ?>
        </tbody>
      </table>
        </div>
      </div>
    </div>
  </div>