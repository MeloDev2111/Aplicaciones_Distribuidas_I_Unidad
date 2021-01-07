<?php
    $DirConexionBD="../data/conexionCleverCloud.php";

    if (file_exists($DirConexionBD)) {
        include $DirConexionBD;
    }else{
        echo "YA VALIO PILIN EN eliminarAlumno.php";
    }

    if (isset($_GET['DNI'])) {
        $id=$_GET['DNI'];
        echo $id;
        $consulta = "DELETE FROM alumnos WHERE DNI='".$id."'";
        $resultado = mysqli_query($conn, $consulta);
        if (!$resultado) {
            print_r($resultado);
            dice();
            $_SESSION['message']='Eliminación Fallida';
            $_SESSION['message_type']='danger';
        }else{
            $_SESSION['message']='Alumno Eliminado';
            $_SESSION['message_type']='success';
        }
        
        header('Location: ../registroAlumno.php');   
    }

    ?>