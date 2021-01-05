<?php
// Incluimos los datos de conexión y las funciones:
include("datosCleverCloud.php");

session_start();
try{
    $conn=mysqli_connect($host,$usuario,$clave,$base);
}catch(Exception $e){
    $_SESSION['message'] = 'No se pudo conectar a la bd';
    $_SESSION['message_type'] = 'Failed';
}

?>