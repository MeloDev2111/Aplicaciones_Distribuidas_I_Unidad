<?php
    include $_SERVER['DOCUMENT_ROOT'].'/Model/alumno.php';
    include $_SERVER['DOCUMENT_ROOT'].'/data/conexionCleverCloud.php';

    $alumno1 = new Alumno('13223212',"Pancrasio 1","Apellidonsio 1");

    if(isset($_POST["GuardarAlumno"])){
        if (isset($_POST["Nombre"], $_POST["Apelido"], $_POST["DNI"] )){

            //traspasamos a variables locales, para evitar complicaciones con las comillas:
            $nombres = $_POST["Nombre"];
            $apellidos = $_POST["Apellidos"];
            $DNI = $_POST["DNI"];
            
            //Preparamos la orden SQL
            $consulta = "INSERT INTO alumnos
            (DNI,nombres,apellidos) VALUES ('$nombres','$apellidos','$DNI')";
            
            //Aqui ejecutaremos esa orden  
            if (mysqli_query($conn, $consulta)){
                echo "<p>Registro agregado.</p>";
            } else {
                echo "<p>No se agregó...</p>";
            }
        
        } else {
            $dir= $_SERVER['DOCUMENT_ROOT'].'/docs/registrarAlumno.php';
            echo "<p>Por favor, complete el <a href='$dir'>formulario</a></p>";
        }
    }
?>