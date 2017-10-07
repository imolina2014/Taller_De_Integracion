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

function RegistrarAyuda(nombre,email,asunto,comentario){
	var datos={
		"Nombre":nombre,
		"Email":email,
		"Asunto":asunto,
		"Comentario":comentario
	};
	
	$.ajax({
		data:  datos,
		url:   './php/ayuda.php',
		type:  'post',
        beforeSend: function () {
			$("#pr").html("Procesando, espere por favor...");
        },
        success:  function (response) {
			$("#pr").html(response);
        }
	});
}

function redirec(p){
	window.location.replace(p);
}

function BuscarIncidente() {
	var sCategoria = document.getElementById("sCategoria").value;
	var sTipo = document.getElementById("sTipo").value;
	//alert(sCategoria);
	//salert(sTipo);
	$.ajax({
		data: {Categoria:sCategoria, Tipo:sTipo},
		url: "./php/mostrarIncidentes.php",
		type: "post",
		success: function(datos) {
			$("#tIncidentes").html(datos);
		}
	});
}

function filtrar(id){
	var etiqueta = document.getElementById(id);
	etiqueta.parentNode.removeChild(etiqueta);
 
	var categoria=document.getElementById("categoria");
	var seleccion=categoria.options[categoria.selectedIndex].value;
	
	var delitos={
		"0":"Robo",
		"1":"Asesinato",
		"2":"Robo-Intimidación",
		"3":"Homicidio",
		"4":"Allanamiento de morada",
	};
	var accidentes={
		"0":"Choque",
		"1":"Caida",
		"2":"Quemaduras",
		"3":"Intoxicación",
		"4":"Electrocución",
	};

	var div=document.getElementById("contenedor");
	var selec=document.createElement("select");
	selec.setAttribute("id","tipo");
	selec.setAttribute("style","width:200px;");
	div.appendChild(selec);
	
	
	var tipo=document.getElementById("tipo");
	selec=document.createElement("option");
	selec.setAttribute("value","Seleccionar Tipo");
	selec.setAttribute("label","Seleccionar Tipo");
	tipo.appendChild(selec);
	
	if (seleccion=="Accidente"){
		var count=0;
		for (var i in accidentes){
			if(accidentes.hasOwnProperty(i)){
				count++;
			}
		}

		for(i=0;i<count;i++){
			var opcion=document.createElement("option");
			opcion.setAttribute("value",accidentes[i].toString());
			opcion.setAttribute("label",accidentes[i].toString());
			tipo.appendChild(opcion);
		}
	}
	if(seleccion=="Delito"){
		var count=0;
		for (var i in delitos){
			if(delitos.hasOwnProperty(i)){
				count++;
			}
		}

		for(i=0;i<count;i++){
			var opcion=document.createElement("option");
			opcion.setAttribute("value",delitos[i].toString());
			opcion.setAttribute("label",delitos[i].toString());
			tipo.appendChild(opcion);
		}
	}
}
