<?php
    $DirConexionBD="../data/conexionCleverCloud.php";

    if (file_exists($DirConexionBD)) {
        include $DirConexionBD;
    }else{
        echo "YA VALIO PILIN EN agregarCurso.php";
    }

    //REEEMPLAZAR ECHOS CON SESSION MESSAGE
    if(isset($_POST["GuardarCurso"])){
        if (isset($_POST["nombreCurso"], $_POST["dia"], $_POST["horaEntrada"]
            , $_POST["horaSalida"], $_POST["docente"] )){

            //traspasamos a variables locales, para evitar complicaciones con las comillas:
            $nombreCurso = $_POST["nombreCurso"];
            $dia =  $_POST["dia"];
            $horaEntrada = $_POST["horaEntrada"];
            $horaSalida = $_POST["horaSalida"];
            $docente = $_POST["docente"];
            
            //Preparamos la orden SQL
            $consulta = "INSERT INTO cursos(`nombreCurso`, `dia`, `horaEntrada`, `horaSalida`, `docente`)Values
                        ('$nombreCurso','$dia','$horaEntrada','$horaSalida','$docente')";
            
            //Aqui ejecutaremos esa orden  
            if (mysqli_query($conn, $consulta)){
                $_SESSION['message'] = 'Curso Registrado';
                $_SESSION['message_type'] = 'Success';
            } else {
                $_SESSION['message'] = 'No se pudo Registrar';
                $_SESSION['message_type'] = 'Failed';
            }
        
        } else {
            echo "<p>Por favor, complete el <a href='index.php'>formulario</a></p>";
        }
    }else{
        echo "No llego xd";
    }
    
    header('Location: ../registroCurso.php');

    ?>