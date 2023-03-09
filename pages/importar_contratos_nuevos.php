<?php
$vowels = array("V","v","P","p");
?>
<?php if(Filter($_GET['subgerente2'])){?>
<?php
  
  $dir_subida = 'excel/IMPORT/';
  $fichero_subido = $dir_subida . basename('IMPORT_'. date(y) .''. date(m) .''. date(d) . '_NAME_' . str_replace("xlsx", "xls", $_FILES['fichero_usuario']['name']));
  
  function utf16_2_utf8 ($nowytekst) {
        $nowytekst = str_replace('%u0104','Ą',$nowytekst);    //Ą
        $nowytekst = str_replace('%u0106','Ć',$nowytekst);    //Ć
        $nowytekst = str_replace('%u0118','Ę',$nowytekst);    //Ę
        $nowytekst = str_replace('%u0141','Ł',$nowytekst);    //Ł
        $nowytekst = str_replace('%u0143','Ń',$nowytekst);    //Ń
        $nowytekst = str_replace('%u00D3','Ó',$nowytekst);    //Ó
        $nowytekst = str_replace('%u015A','Ś',$nowytekst);    //Ś
        $nowytekst = str_replace('%u0179','Ź',$nowytekst);    //Ź
        $nowytekst = str_replace('%u017B','Ż',$nowytekst);    //Ż
       
        $nowytekst = str_replace('%u0105','ą',$nowytekst);    //ą
        $nowytekst = str_replace('%u0107','ć',$nowytekst);    //ć
        $nowytekst = str_replace('%u0119','ę',$nowytekst);    //ę
        $nowytekst = str_replace('%u0142','ł',$nowytekst);    //ł
        $nowytekst = str_replace('%u0144','ń',$nowytekst);    //ń
        $nowytekst = str_replace('%u00F3','ó',$nowytekst);    //ó
        $nowytekst = str_replace('%u015B','ś',$nowytekst);    //ś
        $nowytekst = str_replace('%u017A','ź',$nowytekst);    //ź
        $nowytekst = str_replace('%u017C','ż',$nowytekst);    //ż
   return ($nowytekst);
   }
?>
	  <div class="row">
		<div class="col s12 m12">
		  <div class="card" style="box-shadow: none;text-align: center;">
            <div class="card-content grey-text">
<?php
if (move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], $fichero_subido)) {
	//echo 'Más información de depuración: ';
	//echo $dir_subida . 'UPLOAD STATUS_'. date(y) .''. date(m) .''. date(d) . '_NAME_' . $_FILES['fichero_usuario']['name'];
	$referencia = $_POST['referencia'];
	//echo '<script>
	//swal({
	//  type: "success",
	//  title: "Contratos importados",
	//  timer: 3000,
	//  showConfirmButton: false
	//})</script>
	//<script>
	//function redireccionarUsuario() {
	//  window.location = "index.php?page=importar_contratos_nuevos";
	//}
	//setTimeout("redireccionarUsuario()", 2000);
	//</script>
	//
	//';
	 $connect = mysqli_connect("localhost", "root", "", "mimatik");  
	 include ("excel/Classes/PHPExcel/IOFactory.php");
	 include ("excel/Classes/PHPExcel.php");
	 $html="      <table class='centered'>
        <thead>
          <tr>
              <th>Titular</th>
              <th>Cód. Verificación</th>
              <th>Cups luz</th>
              <th>Cups gas</th>
              <th>#</th>
          </tr>
        </thead>";  
	 //$objPHPExcel = PHPExcel_IOFactory::load('excel/SUBIDA estado_contratoS/UPLOAD STATUS_180328_NAME_xd.xls');  
	
	 $objPHPExcel = PHPExcel_IOFactory::load('excel/IMPORT/IMPORT_'. date(y) .''. date(m) .''. date(d) . '_NAME_' . str_replace("xlsx", "xls", $_FILES['fichero_usuario']['name']));
	 //$objPHPExcel->setActiveSheetIndex(1);
	 foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)   
	 {  
		  $highestRow = $worksheet->getHighestRow();  
		  for ($row=2; $row<=$highestRow; $row++)  
		  {
				
				$html.="<tr>";  
				$fecha_venta =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());  
				$nombre_titular =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());  
				$apellidos_titular =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());  
				$dni_cif_titular =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());  
				$telefono_pref_1 =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());  
				$telefono_pref_2 =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(6, $row)->getValue());  
				$codigo_comercial =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(10, $row)->getValue());
				$cg_sql = mysql_query("SELECT * FROM click_comerciales WHERE codigo_interno='$codigo_comercial'");$cg = mysql_fetch_assoc($cg_sql);				
				$idioma =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(11, $row)->getValue());  
				$municipio_ps =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(13, $row)->getValue());  
				$poblacion_ps =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(14, $row)->getValue());  
				$tipo_via_ps =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(15, $row)->getValue());  
				$calle_ps =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(16, $row)->getValue());  
				$numero_ps =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(17, $row)->getValue());  
				$escalera_ps =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(18, $row)->getValue());  
				$piso_ps =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(19, $row)->getValue());  
				$letra_ps =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(20, $row)->getValue());  
				$cod_postal_ps =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(22, $row)->getValue());  
				$pais_ps = "ES - ESPAÑA";
				$plan_destino_luz =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(28, $row)->getValue());  
				$plan_destino_gas =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(29, $row)->getValue());  
				$plan_destino_fun =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(30, $row)->getValue());  
				$tipo_alta_luz =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(31, $row)->getValue());  
				$tipo_alta_gas =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(32, $row)->getValue());  
				$tipo_alta_fun =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(33, $row)->getValue());  
				$descuento_luz =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(34, $row)->getValue());  
				$descuento_gas =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(35, $row)->getValue());  
				$codverificacion =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(36, $row)->getValue());  
				$cod_verificacion = str_replace($vowels, "", $codverificacion);
				$cups_luz =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(37, $row)->getValue());  
				$cups_gas =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(38, $row)->getValue());  
				$tarifa_ref_luz =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(39, $row)->getValue());  
				$tarifa_ref_gas =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(40, $row)->getValue());  
				$tot_activa_luz =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(41, $row)->getValue());  
				$potencia_p1 =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(42, $row)->getValue());  
				$potencia_p2 =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(43, $row)->getValue());  
				$potencia_p3 =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(44, $row)->getValue());  
				$fases =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(45, $row)->getValue());  
				$maximetro =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(46, $row)->getValue());  
				$vers_funciona =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(47, $row)->getValue());  
				$modal_funciona =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(48, $row)->getValue());  
				$marca_caldera =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(49, $row)->getValue());  
				$contrata_opcion_clima =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(50, $row)->getValue());  
				$marca_aparato_climatizacion =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(51, $row)->getValue());  
				$contrata_efactura =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(52, $row)->getValue());  
				$correo_electron =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(53, $row)->getValue());  
				$cuenta_bancaria =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(54, $row)->getValue());
			    $ccc_1 = substr($cuenta_bancaria, 1, 4);
			    $ccc_2 = substr($cuenta_bancaria, 5, 4);
			    $ccc_3 = substr($cuenta_bancaria, 9, 2);
			    $ccc_4 = substr($cuenta_bancaria, 11, 10);
				$cnae =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(55, $row)->getValue());  
				$direccion_cliente =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(57, $row)->getValue());   // PS/OTRA
				$direccion_envio_facturas =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(58, $row)->getValue());   // PS/OTRA
				$impl =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(59, $row)->getValue()); // POR DEFECTO SI, PERO VIENE UN NO
				$impl_explicito =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(60, $row)->getValue()); // LOPD
				$representante_nombre =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(62, $row)->getValue());
				$representante_apellidos =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(63, $row)->getValue());
				$dni_cif_representante =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(64, $row)->getValue());
				$relacion_representante_titular =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(65, $row)->getValue());
				$aporta_cie =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(66, $row)->getValue());
				$cig =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(67, $row)->getValue());
				$estado_contrato =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(68, $row)->getValue());
				$revisado_contrato1 =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(69, $row)->getValue());
				$revisado_contrato2 =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(70, $row)->getValue());
				$revisado_contrato3 =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(71, $row)->getValue());
				$revisado_contrato4 =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(72, $row)->getValue());
				$revisado_contrato5 =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(73, $row)->getValue());
				$revisado_contrato6 =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(74, $row)->getValue());
				$revisado_contrato7 =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(75, $row)->getValue());
				$revisado_contrato8 =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(76, $row)->getValue());
				$revisado_contrato9 =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(77, $row)->getValue());
				$revisado_contrato10 =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(78, $row)->getValue());
				$motivo =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(69, $row)->getValue());
			    //$Var = mysql_query("SELECT * FROM contratos WHERE cod_verificacion='". str_replace("V", "", $cod_verificacion) ."' or cups_luz='". strtoupper($cups_luz) ."' or cups_gas='". strtoupper($cups_gas) ."'");
			    //$contrato = mysql_fetch_assoc($Var);
				if($nombre_titular == ''){} else {
			   mysql_query("INSERT INTO contratos_importados 
			   (fecha_venta,gerente,subgerente,oficina,nombre_titular,apellidos_titular,dni_cif_titular,telefono_pref_1,telefono_pref_2,codigo_comercial,idioma,municipio_ps,poblacion_ps,tipo_via_ps,calle_ps,numero_ps,escalera_ps,piso_ps,letra_ps,cod_postal_ps,pais_ps,plan_destino_luz,plan_destino_gas,plan_destino_fun,tipo_alta_luz,tipo_alta_gas,tipo_alta_fun,descuento_luz,descuento_gas,cod_verificacion,cups_luz,cups_gas,tarifa_ref_luz,tarifa_ref_gas,tot_activa_luz,potencia_p1,potencia_p2,potencia_p3,fases,maximetro,vers_funciona,modal_funciona,marca_caldera,contrata_opcion_clima,marca_aparato_climatizacion,contrata_efactura,correo_electron,ccc_1,ccc_2,ccc_3,ccc_4,cnae,direccion_cliente,direccion_envio_facturas,impl,impl_explicito,representante_nombre,representante_apellidos,dni_cif_representante,relacion_representante_titular,aporta_cie,cig,estado_contrato,revisado_contrato1,revisado_contrato2,revisado_contrato3,revisado_contrato4,revisado_contrato5,revisado_contrato6,revisado_contrato7,revisado_contrato8,revisado_contrato9,revisado_contrato10,motivo,subgerente2,we_dia,we_mes,we_ano,user_contrato_intro,intro_dia,intro_mes,intro_ano)
			   VALUES 
			   ('$fecha_venta','$cg[gerente]','$cg[subgerente]','$cg[oficina]','$nombre_titular','$apellidos_titular','$dni_cif_titular','$telefono_pref_1','$telefono_pref_2','$codigo_comercial','$idioma','$municipio_ps','$poblacion_ps','$tipo_via_ps','$calle_ps','$numero_ps','$escalera_ps','$piso_ps','$letra_ps','$cod_postal_ps','$pais_ps','$plan_destino_luz','$plan_destino_gas','$plan_destino_fun','$tipo_alta_luz','$tipo_alta_gas','$tipo_alta_fun','$descuento_luz','$descuento_gas','$cod_verificacion','$cups_luz','$cups_gas','$tarifa_ref_luz','$tarifa_ref_gas','$tot_activa_luz','$potencia_p1','$potencia_p2','$potencia_p3','$fases','$maximetro','$vers_funciona','$modal_funciona','$marca_caldera','$contrata_opcion_clima','$marca_aparato_climatizacion','$contrata_efactura','$correo_electron','$ccc_1','$ccc_2','$ccc_3','$ccc_4','$cnae','$direccion_cliente','$direccion_envio_facturas','$impl','$impl_explicito','$representante_nombre','$representante_apellidos','$dni_cif_representante','$relacion_representante_titular','$aporta_cie','". str_replace(" ", "", $cig) ."','$estado_contrato','$revisado_contrato1','$revisado_contrato2','$revisado_contrato3','$revisado_contrato4','$revisado_contrato5','$revisado_contrato6','$revisado_contrato7','$revisado_contrato8','$revisado_contrato9','$revisado_contrato10','$motivo','$_GET[subgerente2]','$_GET[we_dia]','$_GET[we_mes]','$_GET[we_ano]','$user[username]','". date(d) ."','". date(m) ."','". date(Y) ."')");
			   mysqli_query($connect, $sql);  
			   $html .= '<td>'.$nombre_titular.' '.$apellidos_titular.'</td>';
			   $html.= '<td>'. $cod_verificacion .'</td>';
			   $html .= '<td>'.$cups_luz.'</td>';
			   $html .= '<td>'.$cups_gas.'</td>';
			   //$html .= '<td style="background: red;"><a style="color: #fff;" href="'. $config[site] .'/index.php?page=edit_contract_id&id='.$contrato['id'].'">'.$contrato['id'].'</a></td>';
			   $html .= "</tr>"; 
			   }
		  }  
	 }  
	 $html .= '</table>';  

$nene = $row-2;
	  $confirmbtn = '
		<div class="card-panel #43a047 green darken-1 center" style="box-shadow: none;">
		  <span class="white-text">¡Se han importado <!--b style="font-size: 22px;">'. $nene .'</b-->los contratos correctamente!</span><br>
		  <a href="'. $config[site] .'/index.php?page=importar_contratos_nuevos" style="color: #fff;">importar otra vez</a>
		</div>
	  ';


	 //echo $html;
	 //echo '<br />Data Inserted';  
} else {
    //echo "¡Posible ataque de subida de ficheros!\n";
}

//print_r($_FILES);



?>
<?php echo $confirmbtn; ?>
<?php echo $html; ?>
<style>
.upload {
	background: #eaeaea;
    padding: 9px 20px;
    border-radius: 3px;
}
</style>
<div class="row">
<form enctype="multipart/form-data" method="POST">
<div class="input-field col s12 m3"></div>
<div class="input-field col s12 m6">
    <input type="hidden" name="MAX_FILE_SIZE" value="999999" />
    <input class="upload" name="fichero_usuario" type="file" />
	<br><br>
    <input class="waves-effect waves-light" type="submit" value="Actualizar contratos" />
</form>
</div>
</div>

            </div>
          </div>
		</div>
      </div>
<?php } else { ?>
 <div class="card" style="box-shadow: none;text-align: center;">
            <div class="card-content grey-text">
  <div class="row">
    <form class="col s12">
	<input type="hidden" name="page" value="importar_contratos_nuevos">
      <div class="row">
        <div class="input-field col s12 m4">
          <input id="we_dia" value="08" name="we_dia" type="text" pattern="[0-9]{2}" class="validate" style="text-transform: uppercase;" onkeyup="if (this.value.length == this.getAttribute('maxlength')) we_mes.focus()" maxlength="2" data-length="2" required>
          <label for="we_dia">WE DÍA</label>
        </div>
		<div class="input-field col s12 m4">
          <input id="we_mes" value="06" name="we_mes" type="text" pattern="[0-9]{2}" class="validate" style="text-transform: uppercase;" onkeyup="if (this.value.length == this.getAttribute('maxlength')) we_ano.focus()" maxlength="2" data-length="2" required>
          <label for="we_mes">WE MES</label>
        </div>
		<div class="input-field col s12 m4">
          <input id="we_ano" value="<?php echo date(Y); ?>" name="we_ano" type="text" pattern="[0-9]{4}" class="validate" style="text-transform: uppercase;" maxlength="4" data-length="4" required>
          <label for="we_ano">WE AÑO</label>
        </div>
		<div class="input-field col s12 m12">
		  <select id="subgerente2" name="subgerente2" class="browser-default" required>
		    <option disabled selected>Selecciona un subgerente</option>
		    <?php $gg_sql = mysql_query("SELECT * FROM click_gerentes_introductores ORDER BY subgerente"); while($g = mysql_fetch_assoc($gg_sql)){ ?>
		    <option value="<?php echo $g['subgerente']; ?>"><?php echo $g['subgerente']; ?></option>
		    <?php } ?>
		  </select>
		</div>
		<div class="input-field col s12 m12">
		<button type="submit" class="waves-effect waves-light btn">Continuar</button>
		</div>
	</div>
	</form>
	</div>
			</div>
		  </div>
<?php } ?>
</main>