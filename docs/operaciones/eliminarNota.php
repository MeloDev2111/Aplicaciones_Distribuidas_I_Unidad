<?php
    $DirConexionBD="../data/conexionCleverCloud.php";

    if (file_exists($DirConexionBD)) {
        include $DirConexionBD;
    }else{
        echo "YA VALIO PILIN EN agregarCurso.php";
    }

    if (isset($_GET['DNI'], $_GET['idCurso'])) {
        $id = $_GET['DNI'];
        $idCurso=$_GET['idCurso'];

        //Preparamos la orden SQL
        $consulta = "DELETE FROM notas WHERE DNI=".$id." AND idCurso=".$idCurso;
        $resultado = mysqli_query($conn, $consulta);

        if (!$resultado) {
            $_SESSION['message']='Eliminación Fallida';
            $_SESSION['message_type']='Failed';
        }else{
            $_SESSION['message']='Notas Eliminadas';
            $_SESSION['message_type']='Success';
        }
        
    }else{
        echo("No llegaron las claves foraneas");
    }
    
    
    header('Location: ../registroNota.php');




?>