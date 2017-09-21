// Si quiere una introducción sobre la plantilla En blanco, vea la siguiente documentación:
// http://go.microsoft.com/fwlink/?LinkID=397704
// Para depurar código al cargar la página en cordova-simulate o en dispositivos o emuladores Android: inicie la aplicación, establezca puntos de interrupción 
// y ejecute "window.location.reload()" en la Consola de JavaScript.
(function () {
    "use strict";

    document.addEventListener('deviceready', onDeviceReady.bind(this), false);

    function onDeviceReady() {
        // Controlar la pausa de Cordova y reanudar eventos
        document.addEventListener('pause', onPause.bind(this), false);
        document.addEventListener('resume', onResume.bind(this), false);

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
        navigator.geolocation.getCurrentPosition(onSuccess, onError, {
            maxiumAge: 300000,
            timeout: 10000,
            enableHighAccuracy: true
        });
    }

    function onSuccess(position) {
        var CusLat = position.coords.latitude;
        var CusLon = position.coords.longitude;

        document.getElementById("txtLat").value = CusLat;
        document.getElementById("txtLon").value = CusLon;

        try {
            var coords = new google.maps.LatLng(CusLat, CusLon);

            var opciones = {
                center: coords, zoom: 15
            };

            var mapa = new google.maps.Map(document.getElementById("map"), opciones);
            var marcador = new google.maps.Marker({
                position: coords,
                map: mapa,
                title: "Mi Ubicación",
                animation: google.maps.Animation.DROP
            });
        }
        catch (err) {
            console.log(err.message);
        }
    }

    function onError(err) {
        console.log("codigo de err;" + err.code + " msj=" + err.message);
    }
	
    function cat_Accidente() {
        var selecTipo = document.getElementById("tipo");
        var CTG_Accidente = ["Colisión Vehicular", "Choque múltiple", "Incendio", "Derrumbes", "Atropello de peatones", "Otro"];
        for (var i = 0; i < CTG_Accidente.length; i++) {
            var option = document.createElement("option");
            option.text = CTG_Accidente[i];
            selecTipo.add(option);
        }
    }

    function cat_Delito() {
        var selecTipo = document.getElementById("tipo");
        var CTG_Delito = ["Robo con violencia", "Asalto", "Portonazo", "Parricidio", "Infanticidio", "Secuestro", "Sustracción de menores", "Asesinato", "Otro"];
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
        var dato_Descripcion = $("#descripcion").val();
        var dato_Latitud = $("#txtLat").val();
        var dato_Longitud = $("#txtLon").val();
        var aDatos = [dato_Categoria, dato_Tipo, dato_Descripcion, dato_Latitud, dato_Longitud];
        prueba(aDatos);
    }

    function prueba(aDatosToBD) {
        var parametros = {
            "Categoria": aDatosToBD[0],
            "Tipo": aDatosToBD[1],
            "Descripcion": aDatosToBD[2],
            "NTelefono": 'TELEFONO',
            "Lat": aDatosToBD[3],
            "Lon": aDatosToBD[4]
        };
        $.ajax({
            data: parametros, //datos que se envian a traves de ajax
            url: "http://pillan.inf.uct.cl/~imolina/TI_IV/pruebas/enc.php",
            type: 'post', //método de envio
            success: function (result) {
                alert(result);
            }
        });
    }
})();