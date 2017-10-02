function mostrar() {
	$.ajax({
		type: "POST",
		url: "datos.php",
		success: function(d) {
			$("#datos").html(d);
		}
	});	
}

function guardar() {
	var datos = {
		"Nombre": $("#caja_nombre").val(),
		"Edad": $("#caja_edad").val()
	}

	$.ajax({
		type: "POST",
		url: "guardar.php",
		data: datos,
		success: function(d) {
			alert(d);
			mostrar();
		}
	});
}
function redirec(p){
	window.location.replace(p);
}
