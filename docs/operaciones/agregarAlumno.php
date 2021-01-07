<?php
    $DirConexionBD="../data/conexionCleverCloud.php";

    if (file_exists($DirConexionBD)) {
        include $DirConexionBD;
    }else{
        echo "YA VALIO PILIN EN agregarAlumno.php";
    }

    //REEEMPLAZAR ECHOS CON SESSION MESSAGE
    if(isset($_POST["GuardarAlumno"])){
        if (isset($_POST["Nombres"], $_POST["Apellidos"], $_POST["DNI"] )){

            //traspasamos a variables locales, para evitar complicaciones con las comillas:
            $nombres = $_POST["Nombres"];
            $apellidos = $_POST["Apellidos"];
            $DNI = $_POST["DNI"];
            
            //Preparamos la orden SQL
            $consulta = "INSERT INTO alumnos VALUES ('$DNI','$nombres','$apellidos')";
            
            //Aqui ejecutaremos esa orden  
            if (mysqli_query($conn, $consulta)){
                $_SESSION['message'] = 'Alumno Registrado';
                $_SESSION['message_type'] = 'Success';
            } else {
                $_SESSION['message'] = 'No se pudo Registrar';
                $_SESSION['message_type'] = 'Failed';
            }
        
        } else {
            echo "<p>Por favor, complete el <a href='$dir'>formulario</a></p>";
        }
    }else{
        echo "No llego xd";
    }
    
    header('Location: ../registroAlumno.php');

    ?>