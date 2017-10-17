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

function RegistrarAyuda(){

	var datos={
		"Nombre":$("#FRM-nombre").val(),
		"Email":$("#FRM-email").val(),
		"Asunto":$("#FRM-asunto").val(),
		"Comentario":$("#FRM-formulario").val()
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

function crea_categoria(){
	selec=document.getElementById("sCategoria");
	
	var opcion=document.createElement("option");
	opcion.setAttribute("value","Accidente");
	opcion.setAttribute("label","Accidente");
	selec.appendChild(opcion);
	
	opcion=document.createElement("option");
	opcion.setAttribute("value","Delito");
	opcion.setAttribute("label","Delito");
	selec.appendChild(opcion);	
}

function filtrar(id){
	var etiqueta = document.getElementById(id);
	etiqueta.parentNode.removeChild(etiqueta);
 
	var categoria=document.getElementById("sCategoria");
	var seleccion=categoria.options[categoria.selectedIndex].value;
	
	var delitos={
		"0":"Robo con violencia",
		"1":"Asalto",
		"2":"Portonazo",
		"3":"Padricidio",
		"4":"Infanticidio",
		"5":"Secuestro",
		"6":"Sustraccion de menores",
		"7":"Asesinato",
		"8":"Otro"
	};
	var accidentes={
		"0":"Colision vehicular",
		"1":"Choque multiple",
		"2":"Incendio",
		"3":"Derrumbes",
		"4":"Atropello de peatones",
		"5":"Otro"
	};

	var div=document.getElementById("contenedor");
	var selec=document.createElement("select");
	selec.setAttribute("id","sTipo");
	selec.setAttribute("style","width:200px;");
	div.appendChild(selec);
	
	
	var tipo=document.getElementById("sTipo");
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
			opcion.setAttribute("value",accidentes[i]);
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
			opcion.setAttribute("value",delitos[i]);
			opcion.setAttribute("label",delitos[i].toString());
			tipo.appendChild(opcion);
		}
	}
}

function BuscarIncidente() {
	var sCategoria = document.getElementById("sCategoria").value;
	var sTipo = document.getElementById("sTipo").value;
	//alert(sCategoria);
	//salert(sTipo);
	datos = {
		"Categoria": sCategoria,
		"Tipo": sTipo
	}
	$.ajax({
		data: datos,
		url: "./php/mostrarIncidentes.php",
		type: "post",
		success: function(result) {
			$("#tIncidentes").html(result);
		}
	});
}