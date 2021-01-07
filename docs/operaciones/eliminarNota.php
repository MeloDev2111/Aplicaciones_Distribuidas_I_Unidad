<?php
    $DirConexionBD="../data/conexionCleverCloud.php";

    if (file_exists($DirConexionBD)) {
        include $DirConexionBD;
    }else{
        echo "YA VALIO PILIN EN agregarCurso.php";
    }

    //REEEMPLAZAR ECHOS CON SESSION MESSAGE
    if(isset($_POST["GuardarNota"])){

        if (isset($_GET['DNI'], $_GET['idCurso'])) {
            $id = $_GET['DNI'];
            $idCurso=$_GET['idCurso'];

            //Preparamos la orden SQL
            $consulta = "DELETE FROM notas WHERE DNI=".$id." AND idCurso=".$idCurso;
            $resultado = mysqli_query($conn, $consulta);

            if (!$resultado) {
                $_SESSION['message']='Eliminación Fallida';
                $_SESSION['message_type']='danger';
            }else{
                $_SESSION['message']='Notas Eliminadas';
                $_SESSION['message_type']='success';
            }
            
        }else{
            echo("No llegaron las claves foraneas");
        }
        
    } else {
        echo "No ejecuto el post";
    }
    
    
    header('Location: ../registroNota.php');




?>