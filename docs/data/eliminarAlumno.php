<?php
    $urlAlumno ="conexionCleverCloud.php";

    if (file_exists($urlAlumno)) {
        include $urlAlumno;
    }else{
        echo "YA VALIO PILIN EN agregarAlumno.php";
    }

    if (isset($_GET['DNI'])) {
        $id=$_GET['DNI'];
        echo $id;
        $consulta = "DELETE FROM alumnos WHERE DNI=".$id;
        $resultado = mysqli_query($conn, $consulta);
        if (!$resultado) {
            $_SESSION['message']='Consulta Fallada';
            $_SESSION['message_type']='danger';
        }else{
            $_SESSION['message']='Tarea Eliminada';
            $_SESSION['message_type']='success';
        }
        
        header('Location: ../registroAlumno.php');   
    }

    ?>