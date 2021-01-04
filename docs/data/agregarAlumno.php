<?php
    $urlAlumno ="conexionCleverCloud.php";
    
    if (file_exists($urlAlumno)) {
        include $urlAlumno;
    }else{
        echo "YA VALIO PILIN EN agregarAlumno.php";
    }

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
                echo "<p>Registro agregado.</p>";
            } else {
                echo "<p>No se agregó...</p>";
            }
        
        } else {
            $dir= $_SERVER['DOCUMENT_ROOT'].'/docs/registrarAlumno.php';
            echo "<p>Por favor, complete el <a href='$dir'>formulario</a></p>";
        }
    }else{
        echo "No llego xd";
    }

    ?>