<?php

include 'conex.php' 
/* @var $_POST type */
$nombre= $_POST["user"];
$pass= $_POST["password"];
 
$query=("SELECT NOMBRE,CONTRASEÑA FROM `usuarios` "
         . "WHERE `NOMBRE`='".mysqli_real_escape_string($nombre)."' and "
         . "`CONTRASEÑA`='".mysqli_real_escape_string($pass)."'"); 

$rs= mysqli_query($query); 
$row=mysqli_fetch_object($rs); 
$nr = mysqli_num_rows($rs);


if($nr == 1){ 
   
echo 'No ingreso'; 
} 

else if($nr == 0) {    
     
     header("Location:index.html"); 
}   

?>