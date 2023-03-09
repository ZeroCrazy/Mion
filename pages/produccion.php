<div class="card" style="box-shadow: none;text-align: center;">
	<div class="card-content grey-text">
		<?php if(Filter($_GET['we_dia'])){ ?> 
		<span class="card-title">Producción del <?php echo Filter($_GET['we_dia']); ?>/<?php echo Filter($_GET['we_mes']); ?>/<?php echo Filter($_GET['we_ano']); ?></span>
		<p class="light"><?php if(Filter($_GET['subgerente']) == ''){ echo 'Producción Global'; } else { ?>Producción de <?php echo Filter($_GET['subgerente']); ?><?php } ?></p>
<?php
if(Filter($_GET['subgerente'])) {
// CONTRATOS
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$contratos = mysql_fetch_assoc($Var);
// VOIDS
$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE subgerente2='". $_GET[subgerente] ."' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$voids = mysql_fetch_assoc($Var);
// LUZ
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_luz='FORMULA LUZ HOGARES' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$formula_luz_hogares = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_luz='FORMULA LUZ HOGARES' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."' AND tarifa_ref_luz='2.0DHA'");$formula_luz_hogares20dha = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_luz='FORMULA LUZ HOGARES' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."' AND tarifa_ref_luz='2.1DHA'");$formula_luz_hogares21dha = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_luz='FORMULA LUZ HOGARES' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."' AND tarifa_ref_luz='3.0A'");$formula_luz_hogares30a = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_luz='FORMULA LUZ HOGARES CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$formula_luz_hogares_con_funciona = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_luz='FORMULA LUZ NEGOCIOS' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$formula_luz_negocios = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_luz='FORMULA LUZ NEGOCIOS CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$formula_luz_negocios_con_funciona = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_luz='FORMULA MAXIMO AHORRO 24H' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$formula_maxahorro = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_luz='FORMULA MAXIMO AHORRO 24H CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$formula_maxahorro_con_funciona = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_luz='MARCA LUZ' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$marca_luz = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_luz='MARCA LUZ CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$marca_luz_con_funciona = mysql_fetch_assoc($Var);
// GAS                                                                      ". Filter($_GET[subgerente]) ."
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_gas='FORMULA AHORRO GAS' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$formula_ahorro_gas = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_gas='FORMULA AHORRO GAS CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$formula_ahorro_gas_con_funciona = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_gas='FORMULA GAS HOGARES' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$formula_gas_hogares = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_gas='FORMULA GAS HOGARES CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$formula_gas_hogares_con_funciona = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_gas='FORMULA GAS NEGOCIOS' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$formula_gas_negocios = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_gas='FORMULA GAS NEGOCIOS CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$formula_gas_negocios_con_funciona = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_gas='MARCA GAS' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$marca_gas = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_gas='MARCA GAS CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$marca_gas_con_funciona = mysql_fetch_assoc($Var);
// DUAL                                                                     ". Filter($_GET[subgerente]) ."
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_fun='FORMULA AHORRO DUAL CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$formula_ahorro_dual_con_funciona = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_fun='FORMULA GAS+LUZ CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$formula_gas_luz_con_funciona = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_fun='MARCA DUAL CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$marca_dual_con_funciona = mysql_fetch_assoc($Var);
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// LUZ
$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_luz='FORMULA LUZ HOGARES' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");							$void_formula_luz_hogares = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_luz='FORMULA LUZ HOGARES CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");			$void_formula_luz_hogares_con_funciona = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_luz='FORMULA LUZ NEGOCIOS' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");						$void_formula_luz_negocios = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_luz='FORMULA LUZ NEGOCIOS CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");			$void_formula_luz_negocios_con_funciona = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_luz='FORMULA MAXIMO AHORRO 24H' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");					$void_formula_maxahorro = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_luz='FORMULA MAXIMO AHORRO 24H CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");		$void_formula_maxahorro_con_funciona = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_luz='MARCA LUZ' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");									$void_marca_luz = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_luz='MARCA LUZ CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");						$void_marca_luz_con_funciona = mysql_fetch_assoc($Var);
// GAS                                                  _voids                    ". Filter($_GET[subgerente]) ."                                                                                                                                                    void_
$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_gas='FORMULA AHORRO GAS' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");							$void_formula_ahorro_gas = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_gas='FORMULA AHORRO GAS CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");				$void_formula_ahorro_gas_con_funciona = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_gas='FORMULA GAS HOGARES' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");							$void_formula_gas_hogares = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_gas='FORMULA GAS HOGARES CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");			$void_formula_gas_hogares_con_funciona = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_gas='FORMULA GAS NEGOCIOS' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");						$void_formula_gas_negocios = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_gas='FORMULA GAS NEGOCIOS CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");			$void_formula_gas_negocios_con_funciona = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_gas='MARCA GAS' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");									$void_marca_gas = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_gas='MARCA GAS CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");						$void_marca_gas_con_funciona = mysql_fetch_assoc($Var);
// DUAL                                                 _voids                    ". Filter($_GET[subgerente]) ."                                                                                                                                 void_
$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_fun='FORMULA AHORRO DUAL CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");			$void_formula_ahorro_dual_con_funciona = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_fun='FORMULA GAS+LUZ CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");				$void_formula_gas_luz_con_funciona = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE subgerente2='". Filter($_GET[subgerente]) ."' AND plan_destino_fun='MARCA DUAL CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");						$void_marca_dual_con_funciona = mysql_fetch_assoc($Var);
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
} else {
// CONTRATOS
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$contratos = mysql_fetch_assoc($Var);
// VOIDS
$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$voids = mysql_fetch_assoc($Var);
// LUZ
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE plan_destino_luz='FORMULA LUZ HOGARES' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$formula_luz_hogares = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE plan_destino_luz='FORMULA LUZ HOGARES CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$formula_luz_hogares_con_funciona = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE plan_destino_luz='FORMULA LUZ NEGOCIOS' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$formula_luz_negocios = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE plan_destino_luz='FORMULA LUZ NEGOCIOS CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$formula_luz_negocios_con_funciona = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE plan_destino_luz='FORMULA MAXIMO AHORRO 24H' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$formula_maxahorro = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE plan_destino_luz='FORMULA MAXIMO AHORRO 24H CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$formula_maxahorro_con_funciona = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE plan_destino_luz='MARCA LUZ' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$marca_luz = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE plan_destino_luz='MARCA LUZ CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$marca_luz_con_funciona = mysql_fetch_assoc($Var);
// GAS
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE plan_destino_gas='FORMULA AHORRO GAS' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$formula_ahorro_gas = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE plan_destino_gas='FORMULA AHORRO GAS CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$formula_ahorro_gas_con_funciona = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE plan_destino_gas='FORMULA GAS HOGARES' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$formula_gas_hogares = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE plan_destino_gas='FORMULA GAS HOGARES CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$formula_gas_hogares_con_funciona = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE plan_destino_gas='FORMULA GAS NEGOCIOS' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$formula_gas_negocios = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE plan_destino_gas='FORMULA GAS NEGOCIOS CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$formula_gas_negocios_con_funciona = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE plan_destino_gas='MARCA GAS' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$marca_gas = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE plan_destino_gas='MARCA GAS CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$marca_gas_con_funciona = mysql_fetch_assoc($Var);
// DUAL
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE plan_destino_fun='FORMULA AHORRO DUAL CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$formula_ahorro_dual_con_funciona = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE plan_destino_fun='FORMULA GAS+LUZ CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$formula_gas_luz_con_funciona = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos WHERE plan_destino_fun='MARCA DUAL CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");$marca_dual_con_funciona = mysql_fetch_assoc($Var);

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// LUZ
$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE plan_destino_luz='FORMULA LUZ HOGARES' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");						$void_formula_luz_hogares = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE plan_destino_luz='FORMULA LUZ HOGARES CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");		$void_formula_luz_hogares_con_funciona = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE plan_destino_luz='FORMULA LUZ NEGOCIOS' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");					$void_formula_luz_negocios = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE plan_destino_luz='FORMULA LUZ NEGOCIOS CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");		$void_formula_luz_negocios_con_funciona = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE plan_destino_luz='FORMULA MAXIMO AHORRO 24H' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");				$void_formula_maxahorro = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE plan_destino_luz='FORMULA MAXIMO AHORRO 24H CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");	$void_formula_maxahorro_con_funciona = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE plan_destino_luz='MARCA LUZ' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");								$void_marca_luz = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE plan_destino_luz='MARCA LUZ CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");					$void_marca_luz_con_funciona = mysql_fetch_assoc($Var);
// GAS                                                  _voids                                                                                                                                                       
$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE plan_destino_gas='FORMULA AHORRO GAS' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");						$void_formula_ahorro_gas = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE plan_destino_gas='FORMULA AHORRO GAS CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");			$void_formula_ahorro_gas_con_funciona = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE plan_destino_gas='FORMULA GAS HOGARES' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");						$void_formula_gas_hogares = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE plan_destino_gas='FORMULA GAS HOGARES CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");		$void_formula_gas_hogares_con_funciona = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE plan_destino_gas='FORMULA GAS NEGOCIOS' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");					$void_formula_gas_negocios = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE plan_destino_gas='FORMULA GAS NEGOCIOS CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");		$void_formula_gas_negocios_con_funciona = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE plan_destino_gas='MARCA GAS' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");								$void_marca_gas = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE plan_destino_gas='MARCA GAS CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");					$void_marca_gas_con_funciona = mysql_fetch_assoc($Var);
// DUAL                                                 _voids                                                                                                                                                       
$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE plan_destino_fun='FORMULA AHORRO DUAL CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");		$void_formula_ahorro_dual_con_funciona = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE plan_destino_fun='FORMULA GAS+LUZ CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");			$void_formula_gas_luz_con_funciona = mysql_fetch_assoc($Var);
$Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE plan_destino_fun='MARCA DUAL CON FUNCIONA' AND we_dia='". Filter($_GET[we_dia]) ."' AND we_mes='". Filter($_GET[we_mes]) ."' AND we_ano='". Filter($_GET[we_ano]) ."'");					$void_marca_dual_con_funciona = mysql_fetch_assoc($Var);
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
?>
		<div class="row">
		  <div class="input-field col s12 m8">
  <div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s4"><a class="active" href="#luz">LUZ (<?php 
		echo $formula_luz_hogares['count']+$formula_luz_hogares_con_funciona['count']+$formula_luz_negocios['count']+$formula_luz_negocios_con_funciona['count']+$formula_maxahorro['count']+$formula_maxahorro_con_funciona['count']+$marca_luz['count']+$marca_luz_con_funciona['count']+$void_formula_luz_hogares['count']+
		$void_formula_luz_hogares_con_funciona['count']+
		$void_formula_luz_negocios['count']+
		$void_formula_luz_negocios_con_funciona['count']+
		$void_formula_maxahorro['count']+
		$void_formula_maxahorro_con_funciona['count']+
		$void_marca_luz['count']+
		$void_marca_luz_con_funciona['count'];
		?>)</a></li>
        <li class="tab col s4"><a href="#gas">GAS (<?php echo $formula_ahorro_gas['count']+$formula_ahorro_gas_con_funciona['count']+$formula_gas_hogares['count']+$formula_gas_hogares_con_funciona['count']+$formula_gas_negocios['count']+$formula_gas_negocios_con_funciona['count']+$marca_gas['count']+$marca_gas_con_funciona['count']+$formula_ahorro_gas['count']+
		$void_formula_ahorro_gas_con_funciona['count']+
		$void_formula_gas_hogares['count']+
		$void_formula_gas_hogares_con_funciona['count']+
		$void_formula_gas_negocios['count']+
		$void_formula_gas_negocios_con_funciona['count']+
		$void_marca_gas['count']+
		$void_marca_gas_con_funciona['count']; ?>)</a></li>
        <li class="tab col s3"><a href="#dual">DUAL (<?php echo $formula_ahorro_dual_con_funciona['count']+$formula_gas_luz_con_funciona['count']+$marca_dual_con_funciona['count']+$void_formula_ahorro_dual_con_funciona['count']+$void_formula_gas_luz_con_funciona['count']+$void_marca_dual_con_funciona['count']; ?>)</a></li>
      </ul>
    </div>
    <div id="luz" class="col s12">
		<table class="striped responsive-table">
		<thead>
		  <tr>
			  <th>Producto</th>
			  <th>Ok</th>
			  <th>Void</th>
			  <th>Total</th>
			  <?php if($_GET['subgerente']){ ?>
			    <th>Precio</th>
			  <?php } ?>
		  </tr>
		</thead>

		<tbody>
		<tr>
		<td>FORMULA LUZ HOGARES</td>
		<td><?php echo $formula_luz_hogares['count']; ?></td>
		<td><?php echo $void_formula_luz_hogares['count']; ?></td>
		<td><?php echo $formula_luz_hogares['count']+$void_formula_luz_hogares['count']; ?></td>
		<?php $sVar = mysql_query("SELECT * FROM click_gerentes_introductores WHERE subgerente='". Filter($_GET[subgerente]) ."'");$subg = mysql_fetch_assoc($sVar); ?>
		<td><?php echo $formula_luz_hogares30a['count']; ?></td>
		</tr>
		<tr>
		<td>FORMULA LUZ HOGARES CON FUNCIONA</td>
		<td><?php echo $formula_luz_hogares_con_funciona['count']; ?></td>
		<td><?php echo $void_formula_luz_hogares_con_funciona['count']; ?></td>
		<td><?php echo $formula_luz_hogares_con_funciona['count']+$void_formula_luz_hogares_con_funciona['count']; ?></td>
		</tr>
		<tr>
		<td>FORMULA LUZ NEGOCIOS</td>
		<td><?php echo $formula_luz_negocios['count']; ?></td>
		<td><?php echo $void_formula_luz_negocios['count']; ?></td>
		<td><?php echo $formula_luz_negocios['count']+$void_formula_luz_negocios['count']; ?></td>
		</tr>
		<tr>
		<td>FORMULA LUZ NEGOCIOS CON FUNCIONA</td>
		<td><?php echo $formula_luz_negocios_con_funciona['count']; ?></td>
		<td><?php echo $void_formula_luz_negocios_con_funciona['count']; ?></td>
		<td><?php echo $formula_luz_negocios_con_funciona['count']+$void_formula_luz_negocios_con_funciona['count']; ?></td>
		</tr>
		<tr>
		<td>FORMULA MAXIMO AHORRO 24H</td>
		<td><?php echo $formula_maxahorro['count']; ?></td>
		<td><?php echo $void_formula_maxahorro['count']; ?></td>
		<td><?php echo $formula_maxahorro['count']+$void_formula_maxahorro['count']; ?></td>
		</tr>
		<tr>
		<td>FORMULA MAXIMO AHORRO 24H CON FUNCIONA</td>
		<td><?php echo $formula_maxahorro_con_funciona['count']; ?></td>
		<td><?php echo $void_formula_maxahorro_con_funciona['count']; ?></td>
		<td><?php echo $formula_maxahorro_con_funciona['count']+$void_formula_maxahorro_con_funciona['count']; ?></td>
		</tr>
		<tr>
		<td>MARCA LUZ</td>
		<td><?php echo $marca_luz['count']; ?></td>
		<td><?php echo $void_marca_luz['count']; ?></td>
		<td><?php echo $marca_luz['count']+$void_marca_luz['count']; ?></td>
		</tr>
		<tr>
		<td>MARCA LUZ CON FUNCIONA</td>
		<td><?php echo $marca_luz_con_funciona['count']; ?></td>
		<td><?php echo $void_marca_luz_con_funciona['count']; ?></td>
		<td><?php echo $marca_luz_con_funciona['count']+$void_marca_luz_con_funciona['count']; ?></td>
		</tr>
		<tr style="border-top: 2px solid;">
		<td><b>TOTAL</b></td>
		<td><?php echo $formula_luz_hogares['count']+$formula_luz_hogares_con_funciona['count']+$formula_luz_negocios['count']+$formula_luz_negocios_con_funciona['count']+$formula_maxahorro['count']+$formula_maxahorro_con_funciona['count']+$marca_luz['count']+$marca_luz_con_funciona['count']; ?></td>
		<td><?php echo $void_formula_luz_hogares['count']+
		$void_formula_luz_hogares_con_funciona['count']+
		$void_formula_luz_negocios['count']+
		$void_formula_luz_negocios_con_funciona['count']+
		$void_formula_maxahorro['count']+
		$void_formula_maxahorro_con_funciona['count']+
		$void_marca_luz['count']+
		$void_marca_luz_con_funciona['count']; ?></td>
		<td><?php 
		echo $formula_luz_hogares['count']+$formula_luz_hogares_con_funciona['count']+$formula_luz_negocios['count']+$formula_luz_negocios_con_funciona['count']+$formula_maxahorro['count']+$formula_maxahorro_con_funciona['count']+$marca_luz['count']+$marca_luz_con_funciona['count']+$void_formula_luz_hogares['count']+
		$void_formula_luz_hogares_con_funciona['count']+
		$void_formula_luz_negocios['count']+
		$void_formula_luz_negocios_con_funciona['count']+
		$void_formula_maxahorro['count']+
		$void_formula_maxahorro_con_funciona['count']+
		$void_marca_luz['count']+
		$void_marca_luz_con_funciona['count'];
		?></td>
		</tr>
		</tbody>
		</table>
	</div>
    <div id="gas" class="col s12">
		<table class="striped responsive-table">
		<thead>
		  <tr>
			  <th>Producto</th>
			  <th>Ok</th>
			  <th>Void</th>
			  <th>Total</th>
		  </tr>
		</thead>

		<tbody>
		<tr>
		<td>FORMULA AHORRO GAS</td>
		<td><?php echo $formula_ahorro_gas['count']; ?></td>
		<td><?php echo $void_formula_ahorro_gas['count']; ?></td>
		<td><?php echo $formula_ahorro_gas['count']+$void_formula_ahorro_gas['count']; ?></td>
		</tr>
		<tr>
		<td>FORMULA AHORRO GAS CON FUNCIONA</td>
		<td><?php echo $formula_ahorro_gas_con_funciona['count']; ?></td>
		<td><?php echo $void_formula_ahorro_gas_con_funciona['count']; ?></td>
		<td><?php echo $formula_ahorro_gas_con_funciona['count']+$void_formula_ahorro_gas_con_funciona['count']; ?></td>
		</tr>
		<tr>
		<td>FORMULA GAS HOGARES</td>
		<td><?php echo $formula_gas_hogares['count']; ?></td>
		<td><?php echo $void_formula_gas_hogares['count']; ?></td>
		<td><?php echo $formula_gas_hogares['count']+$void_formula_gas_hogares['count']; ?></td>
		</tr>
		<tr>
		<td>FORMULA GAS HOGARES CON FUNCIONA</td>
		<td><?php echo $formula_gas_hogares_con_funciona['count']; ?></td>
		<td><?php echo $void_formula_gas_hogares_con_funciona['count']; ?></td>
		<td><?php echo $formula_gas_hogares_con_funciona['count']+$void_formula_gas_hogares_con_funciona['count']; ?></td>
		</tr>
		<tr>
		<td>FORMULA GAS NEGOCIOS</td>
		<td><?php echo $formula_gas_negocios['count']; ?></td>
		<td><?php echo $void_formula_gas_negocios['count']; ?></td>
		<td><?php echo $formula_gas_negocios['count']+$void_formula_gas_negocios['count']; ?></td>
		</tr>
		<tr>
		<td>FORMULA GAS NEGOCIOS CON FUNCIONA</td>
		<td><?php echo $formula_gas_negocios_con_funciona['count']; ?></td>
		<td><?php echo $void_formula_gas_negocios_con_funciona['count']; ?></td>
		<td><?php echo $formula_gas_negocios_con_funciona['count']+$void_formula_gas_negocios_con_funciona['count']; ?></td>
		</tr>
		<tr>
		<td>MARCA GAS</td>
		<td><?php echo $marca_gas['count']; ?></td>
		<td><?php echo $void_marca_gas['count']; ?></td>
		<td><?php echo $marca_gas['count']+$void_marca_gas['count']; ?></td>
		</tr>
		<tr>
		<td>MARCA GAS CON FUNCIONA</td>
		<td><?php echo $marca_gas_con_funciona['count']; ?></td>
		<td><?php echo $void_marca_gas_con_funciona['count']; ?></td>
		<td><?php echo $marca_gas_con_funciona['count']+$void_marca_gas_con_funciona['count']; ?></td>
		</tr>
		<tr style="border-top: 2px solid;">
		<td><b>TOTAL</b></td>
		<td><?php echo $formula_ahorro_gas['count']+$formula_ahorro_gas_con_funciona['count']+$formula_gas_hogares['count']+$formula_gas_hogares_con_funciona['count']+$formula_gas_negocios['count']+$formula_gas_negocios_con_funciona['count']+$marca_gas['count']+$marca_gas_con_funciona['count']; ?></td>
		<td><?php echo $formula_ahorro_gas['count']+
		$void_formula_ahorro_gas_con_funciona['count']+
		$void_formula_gas_hogares['count']+
		$void_formula_gas_hogares_con_funciona['count']+
		$void_formula_gas_negocios['count']+
		$void_formula_gas_negocios_con_funciona['count']+
		$void_marca_gas['count']+
		$void_marca_gas_con_funciona['count']; ?></td>
		<td>
		<?php echo $formula_ahorro_gas['count']+$formula_ahorro_gas_con_funciona['count']+$formula_gas_hogares['count']+$formula_gas_hogares_con_funciona['count']+$formula_gas_negocios['count']+$formula_gas_negocios_con_funciona['count']+$marca_gas['count']+$marca_gas_con_funciona['count']+$formula_ahorro_gas['count']+
		$void_formula_ahorro_gas_con_funciona['count']+
		$void_formula_gas_hogares['count']+
		$void_formula_gas_hogares_con_funciona['count']+
		$void_formula_gas_negocios['count']+
		$void_formula_gas_negocios_con_funciona['count']+
		$void_marca_gas['count']+
		$void_marca_gas_con_funciona['count']; ?>
		</td>
		</tr>
		</tbody>
		</table>
	</div>
    <div id="dual" class="col s12">
		<table class="striped responsive-table">
		<thead>
		  <tr>
			  <th>Producto</th>
			  <th>Ok</th>
			  <th>Void</th>
			  <th>Total</th>
		  </tr>
		</thead>

		<tbody>
		<tr>
		<td>FORMULA AHORRO DUAL CON FUNCIONA</td>
		<td><?php echo $formula_ahorro_dual_con_funciona['count']; ?></td>
		<td><?php echo $void_formula_ahorro_dual_con_funciona['count']; ?></td>
		<td><?php echo $formula_ahorro_dual_con_funciona['count']+$void_formula_ahorro_dual_con_funciona['count']; ?></td>
		</tr>
		<tr>
		<td>FORMULA GAS+LUZ CON FUNCIONA</td>
		<td><?php echo $formula_gas_luz_con_funciona['count']; ?></td>
		<td><?php echo $void_formula_gas_luz_con_funciona['count']; ?></td>
		<td><?php echo $formula_gas_luz_con_funciona['count']+$void_formula_gas_luz_con_funciona['count']; ?></td>
		</tr>
		<tr>
		<td>MARCA DUAL CON FUNCIONA</td>
		<td><?php echo $marca_dual_con_funciona['count']; ?></td>
		<td><?php echo $void_marca_dual_con_funciona['count']; ?></td>
		<td><?php echo $marca_dual_con_funciona['count']+$void_marca_dual_con_funciona['count']; ?></td>
		</tr>
		<tr style="border-top: 2px solid;">
		<td><b>TOTAL</b></td>
		<td><?php echo $formula_ahorro_dual_con_funciona['count']+$formula_gas_luz_con_funciona['count']+$marca_dual_con_funciona['count']; ?></td>
		<td><?php echo $void_formula_ahorro_dual_con_funciona['count']+$void_formula_gas_luz_con_funciona['count']+$void_marca_dual_con_funciona['count']; ?></td>
		<td><?php echo $formula_ahorro_dual_con_funciona['count']+$formula_gas_luz_con_funciona['count']+$marca_dual_con_funciona['count']+$void_formula_ahorro_dual_con_funciona['count']+$void_formula_gas_luz_con_funciona['count']+$void_marca_dual_con_funciona['count']; ?></td>
		
		</tr>
		</tbody>
		</table>
	</div>
  </div>
		  </div>
		  <div class="input-field col s12 m4">
			<?php if(Filter($_GET['subgerente'])){ ?>
			<?php $subsql = mysql_query("SELECT * FROM click_gerentes_introductores WHERE subgerente='". Filter($_GET[subgerente]) ."'");$subgerente = mysql_fetch_assoc($subsql); ?>
			<a href="<?php echo $site; ?>/index.php?page=pagos&subgerente=<?php echo $subgerente['id']; ?>">
			<div class="card #e65100 orange darken-4" style="box-shadow: none !important;">
				<div class="card-content white-text" style="padding: 8px 0px 1px 0px;">
				  <span class="card-title center">IR AL PERFIL</span>
				</div>
			</div>
			</a>
			<?php } ?>
			<div class="card #43a047 green darken-1" style="box-shadow: none !important;">
				<div class="card-content white-text">
				  <span class="card-title center">CONTRATOS</span>
				  <h3 class="center"><?php echo $contratos['count']; ?></h3>
				  <a target="_blank" href="<?php echo $config['site']; ?>/excel/Contratos.php?type=contrato&type2=produccion&type3=weekend&gerente=<?php echo $_GET['subgerente']; ?>&we_dia=<?php echo $_GET['we_dia']; ?>&we_mes=<?php echo $_GET['we_mes']; ?>&we_ano=<?php echo $_GET['we_ano']; ?>"><div class="vermas">Descargar  <i class="material-icons">keyboard_arrow_right</i></div></a>
				</div>
			</div>
			<div class="card #d32f2f red darken-1" style="box-shadow: none !important;">
				<div class="card-content white-text">
				  <span class="card-title center">VOIDS</span>
				  <h3 class="center"><?php echo $voids['count']; ?></h3>
				  <a target="_blank" href="<?php echo $config['site']; ?>/excel/Contratos.php?type=void&type2=produccion&type3=weekend&gerente=<?php echo $_GET['subgerente']; ?>&we_dia=<?php echo $_GET['we_dia']; ?>&we_mes=<?php echo $_GET['we_mes']; ?>&we_ano=<?php echo $_GET['we_ano']; ?>"><div class="vermas">Descargar  <i class="material-icons">keyboard_arrow_right</i></div></a>
				</div>
			</div>
			<div class="card #757575 grey darken-1" style="box-shadow: none !important;">
				<div class="card-content white-text" style="padding: 8px 0px 1px 0px;">
				  <span class="card-title center">TOTAL: <b><?php echo $contratos['count']+$voids['count']; ?></b></span>
				</div>
			</div>
		  </div>
		</div>
		<?php } else { ?>
		<span class="card-title">Consultar producción</span>
		<p class="light">Debes de consultar la producción por weekend.</p>
		<div class="row">
			<form class="col s12">
			<input type="hidden" name="page" value="produccion">
			  <div class="row">
				<div class="input-field col s12 m4">
				  <input id="we_dia" name="we_dia" type="text" pattern="[0-9]{2}" class="validate" style="text-transform: uppercase;" onkeyup="if (this.value.length == this.getAttribute('maxlength')) we_mes.focus()" maxlength="2" data-length="2" required>
				  <label for="we_dia">WE DÍA</label>
				</div>
				<div class="input-field col s12 m4">
				  <input id="we_mes" name="we_mes" type="text" pattern="[0-9]{2}" class="validate" style="text-transform: uppercase;" onkeyup="if (this.value.length == this.getAttribute('maxlength')) we_ano.focus()" maxlength="2" data-length="2" required>
				  <label for="we_mes">WE MES</label>
				</div>
				<div class="input-field col s12 m4">
				  <input id="we_ano" name="we_ano" type="text" pattern="[0-9]{4}" class="validate" style="text-transform: uppercase;" maxlength="4" data-length="4" required>
				  <label for="we_ano">WE MES</label>
				</div>
				<div class="input-field col s12 m12">
				  <select id="subgerente" name="subgerente" required>
					<option disabled selected>Selecciona un subgerente</option>
					<?php $gg_sql = mysql_query("SELECT * FROM click_gerentes_introductores ORDER BY subgerente"); while($g = mysql_fetch_assoc($gg_sql)){ ?>
					<option value="<?php echo $g['subgerente']; ?>"><?php echo $g['subgerente']; ?></option>
					<?php } ?>
				  </select>
				</div>
				<div class="input-field col s12 m12">
				<button type="submit" class="waves-effect waves-light btn">Consultar</button>
				</div>
			</div>
			</form>
		</div>
		<?php } ?>
	</div>
</div>