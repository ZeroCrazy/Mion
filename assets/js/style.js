function cargarmsg(){
  $('#cargarmensajesxd').load('messages.php',function () {
       $(this).unwrap();
  });
}
cargarmsg();
setInterval(function(){
    cargarmsg()
}, 10000);

$(document).ready(function() {
	$("#resultadoBusqueda").html('---');
	$("#resultadoBusquedaX").html('');
	$("#resultado_cod_verificacion").html('');
	
});

function buscar() {
	var textoBusqueda = $("input#busqueda").val();
 
	 if (textoBusqueda != "") {
		$.post("GET/buscar_comercial.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
			$("#resultadoBusqueda").html(mensaje);
		 }); 
	 } else { 
		$("#resultadoBusqueda").html('CAMPO VACIO');
		};
};

function codverificacion() {
	var textoBusqueda = $("input#busquedaCV").val();
 
	 if (textoBusqueda != "") {
		$.post("GET/verify_cod_verificacion.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
			$("#resultadoCV").html(mensaje);
		 }); 
	 } else { 
		$("#resultadoCV").html('');
		};
};

function cupsluz() {
	var textoBusqueda = $("input#busquedaCL").val();
 
	 if (textoBusqueda != "") {
		$.post("GET/verify_cupsluz.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
			$("#resultadoCL").html(mensaje);
		 }); 
	 } else { 
		$("#resultadoCL").html('');
		};
};

function cupsgas() {
	var textoBusqueda = $("input#busquedaCG").val();
 
	 if (textoBusqueda != "") {
		$.post("GET/verify_cupsgas.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
			$("#resultadoCG").html(mensaje);
		 }); 
	 } else { 
		$("#resultadoCG").html('');
		};
};

function buscarX() {
	var textoBusqueda = $("input#busquedaX").val();
 
	 if (textoBusqueda != "") {
		$.post("GET/buscar_comercial_header.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
			$("#resultadoBusquedaX").html(mensaje);
		 }); 
	 } else { 
		$("#resultadoBusquedaX").html('');
		};
};

function buscar_contratosCI() {
    var textoBusqueda = $("input#busquedaCI").val();
 
     if (textoBusqueda != "") {
        $.post("GET/buscar_contratos_importados.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
            $("#resultadoBusquedaCI").html(mensaje);
         }); 
     } else { 
        $("#resultadoBusquedaCI").html('CAMPO VACIO');
        };
};

function buscar_contratosVA() {
    var textoBusqueda = $("input#busquedaVA").val();
 
     if (textoBusqueda != "") {
        $.post("assets/GET/buscar_avisos.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
            $("#resultadoBusquedaVA").html(mensaje);
         }); 
     } else { 
        $("#resultadoBusquedaVA").html('CAMPO VACIO');
        };
};

$(document).ready(function(){
	$('.sidenav').sidenav();
	$('.modal').modal();
	$('.collapsible').collapsible();
	$('.tooltipped').tooltip();
	$('select').formSelect();
	$(".dropdown-trigger").dropdown({
		hover: false
	});
});

function goBack() {
	window.history.back();
}

Math.fmod = function (a,b) { return Number((a - (Math.floor(a / b) * b)).toPrecision(8)); };
function valida_cups(CUPS){	
	var status=false;
    var RegExPattern =/^ES[0-9]{16}[a-zA-Z]{2}[0-9]{0,1}[a-zA-Z]{0,1}$/;
	if ((CUPS.match(RegExPattern)) && (CUPS!='')) {
		var CUPS_16 = CUPS.substr(2,16);
		var control = CUPS.substr(18,2);
		var letters = Array('T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E');
 
		var fmodv = Math.fmod(CUPS_16,529);
		var imod = parseInt(fmodv);
		var quotient = Math.floor(imod / 23);
		var remainder = imod % 23;
		
		var dc1 = letters[quotient];
		var dc2 = letters[remainder];
		status = (control == dc1+dc2);
	} else {
		status=false;
	}
	if(!status){
		swal({
			  type: 'error',
			  title: 'CUPS incorrecto',
			  showConfirmButton: false
			})
		//$('#suministro_cups').val("");
		//$('#suministro_cups').focus();
	}
	return status;
}
      function validaycalculaIBAN() {
	
        var codPais = document.getElementById("codPais");
	var entidad = document.getElementById("entidad");
	var sucursal = document.getElementById("oficina");
	var dc = document.getElementById("dc");
	var ncuenta = document.getElementById("ncuenta");
	
        if (compruebaCCC(entidad.value, 
                         sucursal.value, 
                         dc.value, 
                         ncuenta.value)) {
swal(
	  '¡Confirmado!',
	  'La cuenta bancaria es correcta',
	  'success'
	);
	 // alert(calculaIBAN(codPais.value, 
       //                     entidad.value, 
         //                   sucursal.value, 
           //                 dc.value, 
             //               ncuenta.value));
	} else {
swal(
	  '¡Alerta!',
	  'La cuenta bancaria es incorrecta',
	  'error'
	);
	 //alert("Numero de cuenta incorrecto");
	}
      }

      function calculaIBAN(codPais, entidad, sucursal, dc, ncuenta) {

        var preIban = entidad + 
                      sucursal + 
                      dc + 
                      ncuenta + 
                      damePesoIBAN(codPais.charAt(0)) + 
                      damePesoIBAN(codPais.charAt(1)) +
                      "00";
	var dcIban = 98-modulo(preIban, 97);
	dcIban = rellenaCeros(dcIban,2);
	return codPais+dcIban+entidad+sucursal+dc+ncuenta;

      }

      function modulo(preIban, divisor) {
				
        var resto = 0;
	for (var i = 0; i < preIban.length; i += 10) {
	  var dividendo = resto + "" + preIban.substr(i, 10);
	  resto = dividendo % divisor;
	}
				
	return resto;
      }

      function damePesoIBAN(letra) {
	var peso = "";
	letra = letra.toUpperCase();
	switch (letra) {
	  case 'A':
	    peso = "10";
	  break;
	  case 'B':
	    peso = "11";
	  break;
	  case 'C':
	    peso = "12";
	  break;
	  case 'D':
	    peso = "13";
	  break;
	  case 'E':
	    peso = "14";
	  break;
	  case 'F':
	    peso = "15";
	  break;
	  case 'G':
	    peso = "16";
	  break;
	  case 'H':
	    peso = "17";
	  break;
	  case 'I':
	    peso = "18";
	  break;
	  case 'J':
	    peso = "19";
	  break;
	  case 'K':
	    peso = "20";
	  break;
	  case 'L':
	    peso = "21";
	  break;
	  case 'M':
	    peso = "22";
	  break;
	  case 'N':
	    peso = "23";
	  break;
	  case 'O':
	    peso = "24";
	  break;
	  case 'P':
	    peso = "25";
	  break;
	  case 'Q':
	    peso = "26";
	  break;
	  case 'R':
	    peso = "27";
	  break;
	  case 'S':
	    peso = "28";
	  break;
	  case 'T':
	    peso = "29";
	  break;
	  case 'U':
	    peso = "30";
	  break;
	  case 'V':
	    peso = "31";
	  break;
	  case 'W':
	    peso = "32";
	  break;
	  case 'X':
	    peso = "33";
	  break;
	  case 'Y':
	    peso = "34";
	  break;
	  case 'Z':
	    peso = "35";
	  break;
	}
	return peso;
      }

      function compruebaCCC(entidad, sucursal, dc, nCuenta) {
	entidad = rellenaCeros(entidad, 4);
	sucursal = rellenaCeros(sucursal, 4);
	dc = rellenaCeros(dc, 2);
	nCuenta = rellenaCeros(nCuenta, 10);

	var concatenado = entidad + sucursal;
	var dc1 = calculaDCParcial(concatenado);
	var dc2 = calculaDCParcial(nCuenta);
	return (dc == (dc1 + dc2));
      }

      function calculaDCParcial(cadena) {
	var dcParcial = 0;
	var tablaPesos = [6, 3, 7, 9, 10, 5, 8, 4, 2, 1];
	var suma = 0;
	var i;
	for ( i = 0; i < cadena.length; i++) {
	  suma = suma + cadena.charAt(cadena.length - 1 - i) * tablaPesos[i];
	}
	dcParcial = (11 - (suma % 11));
	if (dcParcial == 11)
	  dcParcial = 0;
	else if (dcParcial == 10)
	  dcParcial = 1;
	return dcParcial.toString();
      }

      function rellenaCeros(numero, longitud) {
	var ceros = '';
	var i;
	numero = numero.toString();
	for ( i = 0; (longitud - numero.length) > i; i++) {
	  ceros += '0';
	}
	return ceros + numero;
      }
	  
  
function nif(dni) {
    var numero, let, letra;
    var expresion_regular_dni = /^[XYZ]?\d{5,8}[A-Z]$/;

    dni = dni.toUpperCase();

    if(expresion_regular_dni.test(dni) === true){
        numero = dni.substr(0,dni.length-1);
        numero = numero.replace('X', 0);
        numero = numero.replace('Y', 1);
        numero = numero.replace('Z', 2);
        let = dni.substr(dni.length-1, 1);
        numero = numero % 23;
        letra = 'TRWAGMYFPDXBNJZSQVHLCKET';
        letra = letra.substring(numero, numero+1);
        if (letra != let) {
            //alert('Dni erroneo, la letra del NIF no se corresponde');
			swal({
			  type: 'error',
			  title: 'El DNI introducido es incorrecto',
			  showConfirmButton: false
			})
            return false;
        }else{
            //alert('Dni correcto');
            return true;
        }
    }else{
        //alert('Dni erroneo, formato no válido');
		swal({
			  type: 'error',
			  title: 'Formato del DNI no válido',
			  showConfirmButton: false
			})
        return false;
    }
}

function nifuno(dni) {
    var numero, let, letra;
    var expresion_regular_dni = /^[XYZ]?\d{5,8}[A-Z]$/;

    dni = dni.toUpperCase();

    if(expresion_regular_dni.test(dni) === true){
        numero = dni.substr(0,dni.length-1);
        numero = numero.replace('X', 0);
        numero = numero.replace('Y', 1);
        numero = numero.replace('Z', 2);
        let = dni.substr(dni.length-1, 1);
        numero = numero % 23;
        letra = 'TRWAGMYFPDXBNJZSQVHLCKET';
        letra = letra.substring(numero, numero+1);
        if (letra != let) {
            //alert('Dni erroneo, la letra del NIF no se corresponde');
			swal({
			  type: 'error',
			  title: 'El DNI introducido es incorrecto',
			  showConfirmButton: false
			})
            return false;
        }else{
            //alert('Dni correcto');
            return true;
        }
    }else{
        //alert('Dni erroneo, formato no válido');
		swal({
			  type: 'error',
			  title: 'Formato del DNI no válido',
			  showConfirmButton: false
			})
        return false;
    }
}

function vluz(valor) {
	if (valor == "") {
		document.getElementById("VERIFY_LUZ").innerHTML = ""; //tabla es el contenedor donde dibujas la tabla
		return;
	} else {
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
		} else {
			// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("VERIFY_LUZ").innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","getdatos.php?cl="+valor,true);
		xmlhttp.send();
	}
}

function vgas(valor) {
	if (valor == "") {
		document.getElementById("VERIFY_GAS").innerHTML = ""; //tabla es el contenedor donde dibujas la tabla
		return;
	} else {
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
		} else {
			// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("VERIFY_GAS").innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","getdatos.php?cg="+valor,true);
		xmlhttp.send();
	}
}

function vcig(valor) {
	if (valor == "") {
		document.getElementById("VERIFY_CIG").innerHTML = ""; //tabla es el contenedor donde dibujas la tabla
		return;
	} else {
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
		} else {
			// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("VERIFY_CIG").innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","getdatos.php?cig="+valor,true);
		xmlhttp.send();
	}
}

function vcodverificacion(valor) {
	if (valor == "") {
		document.getElementById("VERIFY_VCOD").innerHTML = ""; //tabla es el contenedor donde dibujas la tabla
		return;
	} else {
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
		} else {
			// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("VERIFY_VCOD").innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","getdatos.php?vcod="+valor,true);
		xmlhttp.send();
	}
}

$(document).ready(function(){
  $('.datepicker').datepicker({
	format: 'dd/mm/yyyy',
	months: [
	  'Enero',
	  'Febrero',
	  'Marzo',
	  'Abril',
	  'Mayo',
	  'Junio',
	  'Julio',
	  'Agosto',
	  'Septiembre',
	  'Octubre',
	  'Noviembre',
	  'Diciembre'
	],
	weekdays: [
	  'xxxxxxxxx',
	  'xxxxxxxxx',
	  'xxxxxxxxx',
	  'xxxxxxxxx',
	  'xxxxxxxxx',
	  'Viernes',
	  'xxxxxxxxx'
	],
	weekdaysAbbrev: ['D','L','M','X','J','V','S']
});
});

$(document).ready(function(){
  $("#fechawe").on('paste', function(e){
    e.preventDefault();
    alert('Esta acción está prohibida');
  })
  
  $("#fechawe").on('copy', function(e){
    e.preventDefault();
    alert('Esta acción está prohibida');
  })
});

document.addEventListener("DOMContentLoaded", function(){
	$('.preloader-background').delay(1700).fadeOut('slow');
	
	$('.preloader-wrapper')
		.delay(1700)
		.fadeOut();
});

function cargarmensajeschat(){
  $('#getMessagesChat').load('assets/GET/chat.php',function () {
       $(this).unwrap();
  });
}
cargarmensajeschat();
setInterval(function(){
    cargarmensajeschat()
}, 2500);