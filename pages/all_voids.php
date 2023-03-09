<script>
function buscar_contratos() {
    var textoBusqueda = $("input#busquedaC").val();
 
     if (textoBusqueda != "") {
        $.post("GET/buscar_voids.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
            $("#resultadoBusquedaC").html(mensaje);
         }); 
     } else { 
        $("#resultadoBusquedaC").html('CAMPO VACIO');
        };
};
</script>
      <div class="row">
		<div class="col s12 m12">
		<h4 class="white-text">&#187; Búsqueda de voids</h4>
		  <div class="card" style="box-shadow: none;text-align: center;">
            <div class="card-content grey-text">
			 <input id="busquedaC" style="background: #eaeaea;border-bottom: 0px;text-align: center;" autocomplete="off" onKeyUp="buscar_contratos();" id="search" type="search">
			 <div id="resultadoBusquedaC"></div>
            </div>
          </div>
		</div>
      </div>
	  
<script>
function myFunction() {
	// Declare variables
	var input, filter, ul, li, a, i;
	input = document.getElementById('myInput');
	filter = input.value.toUpperCase();
	ul = document.getElementById("myUL");
	li = ul.getElementsByTagName('li');

	// Loop through all list items, and hide those who don't match the search query
	for (i = 0; i < li.length; i++) {
		a = li[i].getElementsByTagName("a")[0];
		if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
			li[i].style.display = "";
		} else {
			li[i].style.display = "none";
		}
	}
}
</script>