<?php
// Incluimos los datos de conexión y las funciones:
include("datosCleverCloud.php");

session_start();
try{
    $conn=mysqli_connect($host,$usuario,$clave,$base);
}catch(Exception $e){
    echo "<p>MySQL no conoce ese usuario y password, y rechaza el intento de conexión</p>";
}

?>