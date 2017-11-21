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

function Incidentes(){
	$.ajax({
		url : 'php/accidentes.php', 
		type : 'POST',
		success : function (data) {
			var accidentes = eval(data);
			//GRAFICO 1	
		    var datos = {
				type: 'horizontalBar',
				data : {
					labels: ["Colision vehicular","Choque multiple","Incendio","Derrumbes","Atropello de peatones","Otro"],
					datasets : [{
						data : accidentes,
						backgroundColor: [
			                'rgba(255, 99, 132, 0.5)','rgba(54, 162, 235, 0.5)','rgba(255, 206, 86, 0.5)',
			                'rgba(255, 51, 0, 0.5)','rgba(153, 255, 0, 0.5)','rgba(0, 0, 0, 0.5)'],
		                borderColor: [
			                'rgba(255,99,132,1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)',
			                'rgba(255, 51, 0, 1)','rgba(153, 255, 0, 1)','rgba(0, 0, 0, 1)'],
		            	borderWidth: 1
					}],
				},
				options: {
					legend: {
						display: false
					},
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero:true
			                }
			            }]
			        }
			    }
			};
			var canvas=document.getElementById("G_accidentes").getContext("2d");
			window = new Chart(canvas,datos);
		}
	});

	$.ajax({
		url : 'php/DatosE3.php',
		type : 'POST',
		success : function(data) {
			var valores = eval(data);

			var colision_vehicular = valores[0];
			var choque_multiple = valores[1];
			var incendio = valores[2];
			var derrumbes = valores[3];
			var atropellos = valores[4];
			var otros = valores[5];
			var datos2 = {
				type : "pie",
				data : {
					datasets : [{
						data : [colision_vehicular,choque_multiple,incendio,derrumbes,atropellos,otros],
						backgroundColor: [
			                'rgba(255, 99, 132, 0.5)','rgba(54, 162, 235, 0.5)','rgba(255, 206, 86, 0.5)',
			                'rgba(255, 51, 0, 0.5)','rgba(153, 255, 0, 0.5)','rgba(0, 0, 0, 0.5)'],
					}],
					labels : ["%Colision Vehicular","%Choque Multiple","%Incendio","%Derrumbes","%Atropellos","%Otros",]
				},
				options : { reponsive: true, }
			};
			var canvas2=document.getElementById("G2_accidentes").getContext("2d");
			window = new Chart(canvas2,datos2);
		}
	});

	$.ajax({
		url : 'php/delitos.php', 
		type : 'POST',
		success : function (data) {
			var delitos = eval(data);
			//GRAFICO 3	
		    var datos3 = {
				type: 'horizontalBar',
				data : {
					labels: ["Robo con violencia","Asalto","Portonazo","Parricidio","Infanticidio","Secuestro","Sustraccion de menores","Asesinato","Otro"],
					datasets : [{
						data : delitos,
						backgroundColor: [
			                'rgba(255, 99, 132, 0.5)','rgba(54, 162, 235, 0.5)','rgba(255, 206, 86, 0.5)',
							'rgba(255, 128, 0, 0.5)','rgba(255, 255, 0, 0.5)','rgba(102, 0, 0, 0.5)',
			                'rgba(255, 51, 0, 0.5)','rgba(153, 255, 0, 0.5)','rgba(0, 0, 0, 0.5)'],
			            borderColor: [
			                'rgba(255,99,132,1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)',
							'rgba(255, 128, 0,1)','rgba(255, 255, 0, 1)','rgba(102, 0, 0, 1)',
			                'rgba(255, 51, 0, 1)','rgba(153, 255, 0, 1)','rgba(0, 0, 0, 1)'],
			            borderWidth: 1
					}],
				},
				options: {
					legend: {
						display: false
					},
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero:true
			                }
			            }]
			        }
			    }
			};
			var canvas3=document.getElementById("G_delitos").getContext("2d");
			window = new Chart(canvas3,datos3);
		}
	});

	$.ajax({
		url : 'php/DatosE2.php', //archivo que recibe la peticion
		type : 'POST', //método de envio
		success : function (data) { //una vez que el archivo recibe el request lo procesa y lo devuelve
		    var valores = eval(data);	
		           
		    var RoboViolencia = valores[0];
		    var Asalto = valores[1];
		    var Portonazo = valores[2];
		    var Parricidio = valores[3];
		    var Infanticidio = valores[4];
		    var Secuestro = valores[5];
		    var SustraccionMenores = valores[6];
		    var Asesinato = valores[7];
		    var Otros = valores[8];
		    var datos4 = {
				type : "pie",
				data : {
					datasets : [{
						data : [RoboViolencia,Asalto,Portonazo,Parricidio,Infanticidio,Secuestro,SustraccionMenores,Asesinato,Otros],
						backgroundColor: [
			                'rgba(255, 99, 132, 0.5)','rgba(54, 162, 235, 0.5)','rgba(255, 206, 86, 0.5)',
							'rgba(255, 128, 0, 0.5)','rgba(255, 255, 0, 0.5)','rgba(102, 0, 0, 0.5)',
			                'rgba(255, 51, 0, 0.5)','rgba(153, 255, 0, 0.5)','rgba(0, 0, 0, 0.5)'],
					}],
					labels : ["%Robo con Violencia","%Asalto","%Portonazo","%Parricidio","%Infanticidio","%Secuestro","%Sustracción de Menores","%Asesinato",'%Otros',]
				},
				options : { reponsive: true, }
			};
			var canvas4=document.getElementById("G2_delitos").getContext("2d");
			window = new Chart(canvas4,datos4);
		}
	});
}

cont=0;
function C_fecha(){
	if(cont%2==0) document.getElementById("sFecha").disabled = true;
	else document.getElementById("sFecha").disabled = false;
	cont+=1;
}

function Quitar_filtro(){
	Incidentes();
	document.getElementById("tIncidentes").style.display="none";
	document.getElementById("Graficos").style.display="";
}

function BuscarIncidente() {
	var sCalle = document.getElementById("sCalle").value;
	var sCategoria = document.getElementById("sCategoria").value;
	var sTipo = document.getElementById("sTipo").value;

	if(document.getElementById("sFecha").disabled != true){
		var sFecha = document.getElementById("sFecha").value;
		sFecha=sFecha.split("/");
		sFecha=sFecha[2]+"-"+sFecha[0]+"-"+sFecha[1]
	}
	else{var sFecha="null";}

	datos = {
		"Calle":sCalle,
		"Categoria": sCategoria,
		"Tipo": sTipo,
		"Fecha":sFecha
	}
	$.ajax({
		data: datos,
		url: "./php/mostrarIncidentes.php",
		type: "post",
		success: function(result) {
			document.getElementById("tIncidentes").style.display="";
			document.getElementById("Graficos").style.display="none";
			$("#tIncidentes").html(result);
		}
	});
}


  /* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
