<?php
    $DirConexionBD="../data/conexionCleverCloud.php";

    if (file_exists($DirConexionBD)) {
        include $DirConexionBD;
    }else{
        echo "YA VALIO PILIN EN eliminarCurso.php";
    }

    if (isset($_GET['idCurso'])) {
        $id=$_GET['idCurso'];
        echo $id;
        $consulta = "DELETE FROM cursos WHERE idCurso=".$id;
        $resultado = mysqli_query($conn, $consulta);
        if (!$resultado) {
            $_SESSION['message']='Eliminación Fallida';
            $_SESSION['message_type']='Failed';
        }else{
            $_SESSION['message']='Curso Eliminado';
            $_SESSION['message_type']='Success';
        }
        
        header('Location: ../registroCurso.php');   
    }

    ?>