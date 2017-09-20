// Si quiere una introducción sobre la plantilla En blanco, vea la siguiente documentación:
// http://go.microsoft.com/fwlink/?LinkID=397704
// Para depurar código al cargar la página en cordova-simulate o en dispositivos o emuladores Android: inicie la aplicación, establezca puntos de interrupción 
// y ejecute "window.location.reload()" en la Consola de JavaScript.
(function () {
    "use strict";

    document.addEventListener( 'deviceready', onDeviceReady.bind( this ), false );

    function onDeviceReady() {
        // Controlar la pausa de Cordova y reanudar eventos
        document.addEventListener( 'pause', onPause.bind( this ), false );
        document.addEventListener('resume', onResume.bind(this), false);

        $('#prueba').click(prueba);
        // TODO: Cordova se ha cargado. Haga aquí las inicializaciones que necesiten Cordova.
    };

    function onPause() {
        // TODO: esta aplicación se ha suspendido. Guarde el estado de la aplicación aquí.
    };

    function onResume() {
        // TODO: esta aplicación se ha reactivado. Restaure el estado de la aplicación aquí.
    };

    function prueba() {
        var parametros = {
            "Categoria":   'CATEGORIA',
            "Tipo":        'TIPO',
            "Descripcion": 'DESCRIPCION',
            "NTelefono":   'TELEFONO',
            "Lat":         'LAT',
            "Lon":         'LON'
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
} )();