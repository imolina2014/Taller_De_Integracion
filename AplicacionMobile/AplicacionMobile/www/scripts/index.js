// Si quiere una introducción sobre la plantilla En blanco, vea la siguiente documentación:
// http://go.microsoft.com/fwlink/?LinkID=397704
// Para depurar código al cargar la página en cordova-simulate o en dispositivos o emuladores Android: inicie la aplicación, establezca puntos de interrupción 
// y ejecute "window.location.reload()" en la Consola de JavaScript.


(function () {
    
    var marker;          //variable del marcador
    var coords = {};    //coordenadas obtenidas con la geolocalización
    navigator.geolocation.getCurrentPosition(
        function (position) {
            coords = {
                lng: position.coords.longitude,
                lat: position.coords.latitude
            };
            setMapa(coords);  //pasamos las coordenadas al metodo para crear el mapa
	    


        }, function (error) { console.log(error); });

    function actualiza_calle(CusLat, CusLon) {
        var geocoder = new google.maps.Geocoder;
        var infowindow = new google.maps.InfoWindow;
        var latlng = { lat: parseFloat(CusLat), lng: parseFloat(CusLon) };
        geocoder.geocode({ 'location': latlng }, function (results, status) {
            if (status === 'OK') {
                if (results[0]) {
                    document.getElementById("txtCalle").value = (results[0].formatted_address);

                } else {
                    document.getElementById("txtCalle").value = "Undefined Area.";
                }
            } else {
                alert('La geolocalizacion fallo: ' + status);

            }
        });
        return;
    }



    function setMapa(coords) {
        var CusLat = coords.lat;
        var CusLon = coords.lng;

        actualiza_calle(CusLat, CusLon);

        document.getElementById("txtLat").value = CusLat;
        document.getElementById("txtLon").value = CusLon;
        //Se crea una nueva instancia del objeto mapa
        var map = new google.maps.Map(document.getElementById('map'),
            {
                zoom: 13,
                center: new google.maps.LatLng(coords.lat, coords.lng),
		

            });

        function toggleBounce() {
            if (marker.getAnimation() !== null) {
                marker.setAnimation(null);
            } else {
                marker.setAnimation(google.maps.Animation.BOUNCE);
            }
        }

        //Creamos el marcador en el mapa con sus propiedades
        //para nuestro obetivo tenemos que poner el atributo draggable en true
        //position pondremos las mismas coordenas que obtuvimos en la geolocalización
        marker = new google.maps.Marker({
            map: map,
            draggable: true,
            animation: google.maps.Animation.DROP,
            position: new google.maps.LatLng(coords.lat, coords.lng),

        });
        //agregamos un evento al marcador junto con la funcion callback al igual que el evento dragend que indica 
        //cuando el usuario a soltado el marcador
        marker.addListener('click', toggleBounce);

        marker.addListener('dragend', function (event) {
            //escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
            document.getElementById("txtLat").value = this.getPosition().lat();
            document.getElementById("txtLon").value = this.getPosition().lng();

            actualiza_calle(this.getPosition().lat(), this.getPosition().lng());





        });
    }
    //callback al hacer clic en el marcador lo que hace es quitar y poner la animacion BOUNCE
    
    "use strict";
    document.addEventListener('deviceready', onDeviceReady.bind(this), false);

    function onDeviceReady() {
        // Controlar la pausa de Cordova y reanudar eventos
        document.addEventListener('pause', onPause.bind(this), false);
        document.addEventListener('resume', onResume.bind(this), false);
        document.addEventListener("deviceready", onDeviceReady, false);
        function onDeviceReady() {
            console.log(device.cordova);
        }

        $('#pagina2').ready(getDatos);
	document.getElementById("categoria").addEventListener("change", sCategoria, false);
        document.getElementById("btnRegistrar").addEventListener("click", Obtener_Datos, false);

        // TODO: Cordova se ha cargado. Haga aquí las inicializaciones que necesiten Cordova.
        var parentElement = document.getElementById('deviceready');
        var listeningElement = parentElement.querySelector('.listening');
        var receivedElement = parentElement.querySelector('.received');
        listeningElement.setAttribute('style', 'display:none;');
        receivedElement.setAttribute('style', 'display:block;');
    };

    function onPause() {
        // TODO: esta aplicación se ha suspendido. Guarde el estado de la aplicación aquí.
    };

    function onResume() {
        // TODO: esta aplicación se ha reactivado. Restaure el estado de la aplicación aquí.
    };

    function getDatos() {
        navigator.geolocation.getCurrentPosition(onError, {
            maxiumAge: 300000,
            timeout: 10000,
            enableHighAccuracy: true
        });
        
    }
    
    function onError(err) {
        console.log("codigo de err;" + err.code + " msj=" + err.message);
    }
	
    function cat_Accidente() {
        var selecTipo = document.getElementById("tipo");
        var CTG_Accidente = ["Colision vehicular", "Choque multiple", "Incendio", "Derrumbes", "Atropello de peatones", "Otro"];
        for (var i = 0; i < CTG_Accidente.length; i++) {
            var option = document.createElement("option");
            option.text = CTG_Accidente[i];
            selecTipo.add(option);
        }
    }

    function cat_Delito() {
        var selecTipo = document.getElementById("tipo");
        var CTG_Delito = ["Robo con violencia", "Asalto", "Portonazo", "Parricidio", "Infanticidio", "Secuestro", "Sustraccion de menores", "Asesinato", "Otro"];
        for (var i = 0; i < CTG_Delito.length; i++) {
            var option = document.createElement("option");
            option.text = CTG_Delito[i];
            selecTipo.add(option);
        }
    }

    function sCategoria() {
        /* Para obtener el texto*/
        var comboCategoria = document.getElementById("categoria");
        var selecCategoria = comboCategoria.options[comboCategoria.selectedIndex].text;
        if (selecCategoria == "Accidente") {
            $("#tipo").removeAttr('disabled');
            $('#tipo').children('option:not(:first)').remove();
            cat_Accidente();
        }
        if (selecCategoria == "Delito") {
            $("#tipo").removeAttr('disabled');
            $('#tipo').children('option:not(:first)').remove();
            cat_Delito();
        }
        if (selecCategoria == "Seleccionar categoría") {
            $("#tipo").attr('disabled', 'disabled');
        }
    }
 
    function Obtener_Datos() {
        var dato_Categoria = $("#categoria option:selected").text();
        var dato_Tipo = $("#tipo option:selected").text();
        var dato_Descripcion = $("#desc").val();
        var dato_Latitud = $("#txtLat").val();
        var dato_Longitud = $("#txtLon").val();
        var Telefono = device.serial;
        var Calle = $("#txtCalle").val();

        var aDatos = [dato_Categoria, dato_Tipo, dato_Descripcion, dato_Latitud, dato_Longitud, Calle, Telefono];

 //       var geocoder = new google.maps.Geocoder;
 //       var infowindow = new google.maps.InfoWindow;
 //       var latlng = { lat: parseFloat(dato_Latitud), lng: parseFloat(dato_Longitud) };
 //       geocoder.geocode({ 'location': latlng }, function (results, status) {
 //           if (status === 'OK') {
 //               if (results[0]) {
 //                   Calle = (results[0].formatted_address);
 //                   var aDatos = [dato_Categoria, dato_Tipo, dato_Descripcion, dato_Latitud, dato_Longitud, Calle, Telefono];
 //               } else {
 //                   var aDatos = [dato_Categoria, dato_Tipo, dato_Descripcion, dato_Latitud, dato_Longitud, "Undefined Area", Telefono];
 //               }
 //           } else {
 //               alert('La geolocalizacion fallo: ' + status);
 //               var aDatos = [];
 //           }
 //           prueba(aDatos);
 //       });
        prueba(aDatos);
    }

    function prueba(aDatosToBD) {
        var parametros = {
            "Categoria": aDatosToBD[0],
            "Tipo": aDatosToBD[1],
            "Descripcion": aDatosToBD[2],
            "NTelefono": aDatosToBD[6],
            "Lat": aDatosToBD[3],
            "Lon": aDatosToBD[4],
            "Calle": aDatosToBD[5]
        };
        $.ajax({
            data: parametros, //datos que se envian a traves de ajax
            url: "http://pillan.inf.uct.cl/~imolina/TI_IV/pruebas/enc.php",
            type: 'post', //método de envio
           success: function (result) {
                alert(result);
            }
        });
        return;
    }
}());