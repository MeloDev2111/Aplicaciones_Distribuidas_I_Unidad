<?php
    $DirConexionBD="../data/conexionCleverCloud.php";

    if (file_exists($DirConexionBD)) {
        include $DirConexionBD;
    }else{
        echo "YA VALIO PILIN EN agregarCurso.php";
    }

    //INTENTO DE UN MEJOR CODIGO
    //SOLO ESTA CLASE LO TIENE POR SER LA QUE MAS CONDICONES TIENE, LAS DEMAS NO ME DIO TIEMPO

    if(!isset($_POST["GuardarCurso"])){
        echo "No llego xd";
        header('Location: ../registroCurso.php');
    }


    if (!isset($_POST["nombreCurso"], $_POST["dia"], $_POST["horaEntrada"]
    , $_POST["horaSalida"], $_POST["docente"] )){
        echo "No llegaron todos los datos del formulario";
        header('Location: ../registroCurso.php');
    } 

    //traspasamos los datos del formulario
    $nombreCurso = $_POST["nombreCurso"];
    $dia =  $_POST["dia"];
    $horaEntrada = $_POST["horaEntrada"];
    $horaSalida = $_POST["horaSalida"];
    $docente = $_POST["docente"];


    if($horaEntrada>$horaSalida){
        $_SESSION['message'] = 'Hora de Entrada > Hora de Salida!';
        $_SESSION['message_type'] = 'Advice';
        header('Location: ../registroCurso.php');
    }else{
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

        header('Location: ../registroCurso.php');
    }
    
    ?>