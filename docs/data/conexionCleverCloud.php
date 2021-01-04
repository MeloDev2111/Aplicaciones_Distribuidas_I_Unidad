<?php
// Incluimos los datos de conexión y las funciones:
include($_SERVER['DOCUMENT_ROOT']."/data/datosCleverCloud.php");
$conn;
function conectarBase($host,$usuario,$clave,$base){
    $this->conn = mysqli_connect ($host,$usuario,$clave,$base);
    if ($conn){
    echo "<p>MySQL le ha dado permiso a PHP para ejecutar consultas con ese usuario y clave</p>";
        return true;
    }else{
    echo "<p>MySQL no conoce ese usuario y password, y rechaza el intento de conexión</p>";
        return false;
    }
}

// Usamos esas variables:
if (conectarBase($host,$usuario,$clave,$base)) {
    echo "CONEXION A CLEVER CLOUD REALIZADA";
// Aquí irá el resto
} else {
echo"<p>Servicio interrumpido</p>";
}
?>