<?php $Var = mysql_query("SELECT count(*) count FROM contratos WHERE we_mes='01' AND intro_ano='". date(Y) ."'");$count_contratos1 = mysql_fetch_assoc($Var); ?>
<?php $Var = mysql_query("SELECT count(*) count FROM contratos WHERE we_mes='02' AND intro_ano='". date(Y) ."'");$count_contratos2 = mysql_fetch_assoc($Var); ?>
<?php $Var = mysql_query("SELECT count(*) count FROM contratos WHERE we_mes='03' AND intro_ano='". date(Y) ."'");$count_contratos3 = mysql_fetch_assoc($Var); ?>
<?php $Var = mysql_query("SELECT count(*) count FROM contratos WHERE we_mes='04' AND intro_ano='". date(Y) ."'");$count_contratos4 = mysql_fetch_assoc($Var); ?>
<?php $Var = mysql_query("SELECT count(*) count FROM contratos WHERE we_mes='05' AND intro_ano='". date(Y) ."'");$count_contratos5 = mysql_fetch_assoc($Var); ?>
<?php $Var = mysql_query("SELECT count(*) count FROM contratos WHERE we_mes='06' AND intro_ano='". date(Y) ."'");$count_contratos6 = mysql_fetch_assoc($Var); ?>
<?php $Var = mysql_query("SELECT count(*) count FROM contratos WHERE we_mes='07' AND intro_ano='". date(Y) ."'");$count_contratos7 = mysql_fetch_assoc($Var); ?>
<?php $Var = mysql_query("SELECT count(*) count FROM contratos WHERE we_mes='08' AND intro_ano='". date(Y) ."'");$count_contratos8 = mysql_fetch_assoc($Var); ?>
<?php $Var = mysql_query("SELECT count(*) count FROM contratos WHERE we_mes='09' AND intro_ano='". date(Y) ."'");$count_contratos9 = mysql_fetch_assoc($Var); ?>
<?php $Var = mysql_query("SELECT count(*) count FROM contratos WHERE we_mes='10' AND intro_ano='". date(Y) ."'");$count_contratos10 = mysql_fetch_assoc($Var); ?>
<?php $Var = mysql_query("SELECT count(*) count FROM contratos WHERE we_mes='11' AND intro_ano='". date(Y) ."'");$count_contratos11 = mysql_fetch_assoc($Var); ?>
<?php $Var = mysql_query("SELECT count(*) count FROM contratos WHERE we_mes='12' AND intro_ano='". date(Y) ."'");$count_contratos12 = mysql_fetch_assoc($Var); ?>

<?php $Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE we_mes='01' AND intro_ano='". date(Y) ."'");$count_void_contratos1 = mysql_fetch_assoc($Var); ?>
<?php $Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE we_mes='02' AND intro_ano='". date(Y) ."'");$count_void_contratos2 = mysql_fetch_assoc($Var); ?>
<?php $Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE we_mes='03' AND intro_ano='". date(Y) ."'");$count_void_contratos3 = mysql_fetch_assoc($Var); ?>
<?php $Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE we_mes='04' AND intro_ano='". date(Y) ."'");$count_void_contratos4 = mysql_fetch_assoc($Var); ?>
<?php $Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE we_mes='05' AND intro_ano='". date(Y) ."'");$count_void_contratos5 = mysql_fetch_assoc($Var); ?>
<?php $Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE we_mes='06' AND intro_ano='". date(Y) ."'");$count_void_contratos6 = mysql_fetch_assoc($Var); ?>
<?php $Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE we_mes='07' AND intro_ano='". date(Y) ."'");$count_void_contratos7 = mysql_fetch_assoc($Var); ?>
<?php $Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE we_mes='08' AND intro_ano='". date(Y) ."'");$count_void_contratos8 = mysql_fetch_assoc($Var); ?>
<?php $Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE we_mes='09' AND intro_ano='". date(Y) ."'");$count_void_contratos9 = mysql_fetch_assoc($Var); ?>
<?php $Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE we_mes='10' AND intro_ano='". date(Y) ."'");$count_void_contratos10 = mysql_fetch_assoc($Var); ?>
<?php $Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE we_mes='11' AND intro_ano='". date(Y) ."'");$count_void_contratos11 = mysql_fetch_assoc($Var); ?>
<?php $Var = mysql_query("SELECT count(*) count FROM contratos_voids WHERE we_mes='12' AND intro_ano='". date(Y) ."'");$count_void_contratos12 = mysql_fetch_assoc($Var); ?>
<?php
if (isset($_POST['reiniciarcig'])) {
	mysql_query("TRUNCATE TABLE cigs");
	$fechacig = date(Y) . '-' . date(m) . '-' . date(d) . ' ' . date(H) . ':' . date(i) . ':' . date(s);
	mysql_query("INSERT INTO cigs (id,num,fecha,user_intro) VALUES ('1','-1','$fechacig','SERVIDOR')");
	header("Refresh:0.2");
}
?>

<div class="row">
<?php
if (isset($_POST['EnviarChat'])) {
$enviarmensajechat = $_POST['enviarmensajechat'];	
	mysql_query("INSERT INTO chat (user,message) VALUES ('$user[username]','$enviarmensajechat')");
}
?>
</head>
<body>
<style>
.mensaje {
    color: #fff;
    margin-top: 1px;
    padding: 0px 6px;
}
</style>
  <div class="col s12 m12">
	<div id="estadisticas"></div>
  </div>
  <div class="col s12 m12">
	<div class="card">
      <div class="card-content darkgrey-text">
        <span class="card-title left" style="text-align: right;"><b style="font-weight: bold;font-size: 36px;"><div id="count_cig"></div></b></span>
  	  <span class="card-title" style="text-align: right;"><b><i style="font-size: 48px;position: absolute;margin-left: -42px;margin-top: 22px;" class="fas fa-info-circle"></i></b></span>
  	  <br>
  	  <h5 class="light grey-text">C.I.G</h5>
	  <a style="position: absolute;margin-top: -10px;color: <?php echo $config['colorsv']; ?>;" class="modal-trigger" href="#shutdowncig">Reiniciar</a>
	  <div id="shutdowncig" class="modal">
				<div class="modal-content black-text">
				  <h4 class="center"><b>¡Cuidado!</b></h4>
				  <p class="light center">Estás apunto de reiniciar el contador C.I.G.<br>¿Quieres dejar el contador a 001?<br><br></p>
					<div class="row">
					  <form method="POST" class="col s12">
					    <div class="row">
					  	<div class="input-field col s12 m6">
					  		<a style="width: 100%;" class="waves-effect waves-light btn #b71c1c red darken-4 modal-action modal-close">No</a>
					  	</div>
					  	<div class="input-field col s12 m6">
					  		<button style="width: 100%;" type="submit" name="reiniciarcig" class="waves-effect waves-light btn">Sí</button>
					  	</div>
					    </div>
					  </form>
					</div>
				</div>
			  </div>
      </div>
    </div>
  </div>

<script type="text/javascript">

Highcharts.chart('estadisticas', {
    chart: {
        type: 'area'
    },
    title: {
        text: 'Contratos OK & VOID'
    },
    subtitle: {
        text: 'Fuentes: <a href="<?php echo $config['site']; ?>/index.php?page=all_contracts">' +            
		'OKs</a> &amp; <a href="<?php echo $config['site']; ?>/index.php?page=all_voids">' +            
		'VOIDs</a>'
    },
    xAxis: {
        categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
    },
	//{
    //    allowDecimals: false,
    //    labels: {
    //        formatter: function () {
    //            return this.value; // clean, unformatted number for year
    //        }
    //    }
    //},
    yAxis: {
        title: {
            text: 'Producción'
        },
        labels: {
            formatter: function () {
                return this.value + ' contratos';
            }
        }
    },
    tooltip: {
		 formatter: function() {
			return 'Hay <b>' + this.y + '</b> contratos tipo <b>' + this.series.name + '</b> en <b>' + this.x + '</b>';
		}
    },
	
    plotOptions: {
        column: {
            borderRadius: 12
        }
    },
	//{
    //    area: {
    //        pointStart: 2018,
    //        marker: {
    //            enabled: true,
    //            symbol: 'circle',
    //            radius: 3,
    //            states: {
    //                hover: {
    //                    enabled: true
    //                }
    //            }
    //        }
    //    }
    //},
    series: [{
        name: 'OK',
        data: [<?php echo $count_contratos1['count']; ?>,<?php echo $count_contratos2['count']; ?>,<?php echo $count_contratos3['count']; ?>,
		<?php echo $count_contratos4['count']; ?>,<?php echo $count_contratos5['count']; ?>,<?php echo $count_contratos6['count']; ?>,
		<?php echo $count_contratos7['count']; ?>,<?php echo $count_contratos8['count']; ?>,<?php echo $count_contratos9['count']; ?>,
		<?php echo $count_contratos10['count']; ?>,<?php echo $count_contratos11['count']; ?>,<?php echo $count_contratos12['count']; ?>
        ]
    }, {
        name: 'VOID',
        data: [<?php echo $count_void_contratos1['count']; ?>,<?php echo $count_void_contratos2['count']; ?>,<?php echo $count_void_contratos3['count']; ?>,
		<?php echo $count_void_contratos4['count']; ?>,<?php echo  $count_void_contratos5['count']; ?>,<?php echo  $count_void_contratos6['count']; ?>,
		<?php echo $count_void_contratos7['count']; ?>,<?php echo  $count_void_contratos8['count']; ?>,<?php echo  $count_void_contratos9['count']; ?>,
		<?php echo $count_void_contratos10['count']; ?>,<?php echo $count_void_contratos11['count']; ?>,<?php echo $count_void_contratos12['count']; ?>
        ]
    }]
});
		</script>
</div>