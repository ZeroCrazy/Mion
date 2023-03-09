      <div class="row">
<?php if($_GET['select'] == 'comerciales') { ?>
        <a href="<?php echo $config['site']; ?>/index.php?page=gerentes">
		<div class="col s12 m4">
          <div class="card #1e88e5 blue darken-1">
            <div class="card-content white-text">
              <span class="card-title center">Buscar</span>
            </div>
          </div>
        </div>
		</a>
		<a href="<?php echo $config['site']; ?>/index.php?page=extra_adds">
		<div class="col s12 m4">
          <div class="card #4527a0 deep-purple darken-3">
            <div class="card-content white-text">
              <span class="card-title center">Añadir subgerente</span>
            </div>
          </div>
        </div>
		</a>
		<a href="<?php echo $config['site']; ?>/excel/Exportador_comerciales.php">
		<div class="col s12 m4">
          <div class="card #00695c teal darken-3">
            <div class="card-content white-text">
              <span class="card-title center">Exportar comerciales</span>
            </div>
          </div>
        </div>
		</a>
<?php } ?>
<?php if($_GET['select'] == 'contratos') { ?>
		<a href="<?php echo $config['site']; ?>/index.php?page=avisos">
		<div class="col s12 m2">
          <div class="card #b71c1c red darken-4">
            <div class="card-content white-text">
              <span class="card-title center">Avisos</span>
            </div>
          </div>
        </div>
		</a>
		<a href="<?php echo $config['site']; ?>/index.php?page=produccion">
		<div class="col s12 m3">
          <div class="card #006064 cyan darken-4">
            <div class="card-content white-text">
              <span class="card-title center">Producción</span>
            </div>
          </div>
        </div>
		</a>
		<a href="<?php echo $config['site']; ?>/index.php?page=all_contracts">
		<div class="col s12 m4">
          <div class="card #e65100 orange darken-4">
            <div class="card-content white-text">
              <span class="card-title center">Todos los contratos</span>
            </div>
          </div>
        </div>
		</a>
		<a href="<?php echo $config['site']; ?>/index.php?page=add_contract">
		<div class="col s12 m3">
          <div class="card #2e7d32 green darken-3">
            <div class="card-content white-text">
              <span class="card-title center">Nuevo contrato</span>
            </div>
          </div>
        </div>
		</a>
		<a href="<?php echo $config['site']; ?>/index.php?page=ver_estados">
		<div class="col s12 m4">
          <div class="card #0277bd light-blue darken-3">
            <div class="card-content white-text">
              <span class="card-title center">Consultar estados</span>
            </div>
          </div>
        </div>
		</a>
		<a href="<?php echo $config['site']; ?>/index.php?page=importar_contratos">
		<div class="col s12 m4">
          <div class="card #3e2723 brown darken-4">
            <div class="card-content white-text">
              <div style="margin-top: -21px;text-align: center;"><i>Plantilla antigua</i></div>
			  <span class="card-title center">Importar contratos</span>
            </div>
          </div>
        </div>
		</a>
		<a href="<?php echo $config['site']; ?>/index.php?page=importar_contratos_nuevos">
		<div class="col s12 m4">
          <div class="card #212121 grey darken-4">
            <div class="card-content white-text">
              <div style="margin-top: -21px;text-align: center;"><i>Nueva plantilla</i></div>
			  <span class="card-title center">Importar contratos</span>
            </div>
          </div>
        </div>
		</a>
		<?php if($user['view_estados_contratos'] == '1'){ ?>
		<a href="<?php echo $config['site']; ?>/ic.php">
		<div class="col s12 m6">
          <div class="card #546e7a blue-grey darken-1">
            <div class="card-content white-text">
			  <span class="card-title center">Actualizar estados</span>
            </div>
          </div>
        </div>
		</a>
		<a href="<?php echo $config['site']; ?>/index.php?page=cambios_de_estado">
		<div class="col s12 m6">
          <div class="card #4527a0 deep-purple darken-3">
            <div class="card-content white-text">
			  <span class="card-title center">Cambios de estado</span>
            </div>
          </div>
        </div>
		</a>
		<?php } ?>
<?php } ?>
<?php if($_GET['select'] == 'void') { ?>
		<a href="<?php echo $config['site']; ?>/index.php?page=all_voids">
		<div class="col s12 m6">
          <div class="card #4527a0 deep-purple darken-3">
            <div class="card-content white-text">
			  <span class="card-title center">Todos los voids</span>
            </div>
          </div>
        </div>
		</a>
		<a href="<?php echo $config['site']; ?>/index.php?page=add_void">
		<div class="col s12 m6">
          <div class="card #d84315 deep-orange darken-3">
            <div class="card-content white-text">
			  <span class="card-title center">Nuevo void</span>
            </div>
          </div>
        </div>
		</a>
<?php } ?>
      </div>