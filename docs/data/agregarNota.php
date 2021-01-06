<?php
    $urlAlumno ="conexionCleverCloud.php";

    if (file_exists($urlAlumno)) {
        include $urlAlumno;
    }else{
        echo "YA VALIO PILIN EN agregarCurso.php";
    }

    //REEEMPLAZAR ECHOS CON SESSION MESSAGE
    if(isset($_POST["GuardarNota"])){
        if (isset($_POST["nota"] )){
            $nota = $_POST["nota"];

            if (isset($_GET['DNI'], $_GET['idCurso'])) {
                $id = $_GET['DNI'];
                $idCurso=$_GET['idCurso'];

                //Preparamos la orden SQL
                $consulta = "INSERT INTO notas(`DNI`, `idCurso`, `nota`) Values
                ('$id','$idCurso','$nota')";
                print_r($consulta);
                //Aqui ejecutaremos esa orden  
                if (mysqli_query($conn, $consulta)){
                $_SESSION['message'] = 'Nota Registrada';
                $_SESSION['message_type'] = 'Success';
                } else {
                $_SESSION['message'] = 'No se pudo Registrar';
                $_SESSION['message_type'] = 'Failed';
                }
            }else{
                echo("No llegaron las claves foraneas");
            }
        
        } else {
            echo "<p>Por favor, complete el <a href='index.php'>formulario</a></p>";
        }
    }else{
        echo "No llego xd";
    }
    
    header('Location: ../registroNota.php');




?>