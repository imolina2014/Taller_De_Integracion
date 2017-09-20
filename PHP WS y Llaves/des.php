<?php
$fp=fopen("./privkey.pem","r");
$llave_privada = fread($fp,8192);
fclose($fp);

// El segundo parametro es la clave que ingresamos al crear el certificado
// si es que optamos por hacerlo.
// Si antes codificamos en base64 el texto encriptado, ahora hay que acordarse
// de hacerle un $texto_encriptado = base64_decode($texto_encriptado) antes de
// desencriptarlo.
$res = openssl_get_privatekey($llave_privada,"miclave");
openssl_private_decrypt($texto_encriptado, $texto_desencriptado, $res);

//Esto debe dar como salida el mismo texto que antes estaba en la variable $texto_plano
echo $texto_desencriptado;
?>