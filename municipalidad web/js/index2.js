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

			//GRAFICO 2
			var datos2={
				type: 'pie',
			    data: {
			        labels: ["Colision vehicular","Choque multiple","Incendio","Derrumbes","Atropello de peatones","Otro"],
			        datasets: [{
			            label: '#Accidentes',
			            data: accidentes,
			            backgroundColor: [
			                'rgba(255, 99, 132, 0.5)','rgba(54, 162, 235, 0.5)','rgba(255, 206, 86, 0.5)',
			                'rgba(255, 51, 0, 0.5)','rgba(153, 255, 0, 0.5)','rgba(0, 0, 0, 0.5)'],
			        }]
			    },
			}
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

			//GRAFICO 4
			var datos4={
				type: 'pie',
			    data: {
			        labels: ["Robo con violencia","Asalto","Portonazo","Parricidio","Infanticidio","Secuestro","Sustraccion de menores","Asesinato","Otro"],
			        datasets: [{
			            label: '#Delitos',
			            data: delitos,
			            backgroundColor: [
			                'rgba(255, 99, 132, 0.5)','rgba(54, 162, 235, 0.5)','rgba(255, 206, 86, 0.5)',
							'rgba(255, 128, 0, 0.5)','rgba(255, 255, 0, 0.5)','rgba(102, 0, 0, 0.5)',
			                'rgba(255, 51, 0, 0.5)','rgba(153, 255, 0, 0.5)','rgba(0, 0, 0, 0.5)'],
			        }]
			    },
			}
			var canvas4=document.getElementById("G2_delitos").getContext("2d");
			window = new Chart(canvas4,datos4);
		}
	});
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


  /* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
