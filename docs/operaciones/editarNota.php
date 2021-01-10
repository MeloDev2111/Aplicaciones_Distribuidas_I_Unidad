<?php
    $DirConexionBD="../data/conexionCleverCloud.php";

    if (file_exists($DirConexionBD)) {
        include $DirConexionBD;
    }else{
        echo "YA VALIO PILIN EN editarCurso.php";
    }

    if (isset($_GET['DNI'], $_GET['idCurso'])) {
        $id = $_GET['DNI'];
        $idCurso=$_GET['idCurso'];

        //Preparamos la orden SQL
        $consulta="SELECT notas.*,
                    cursos.nombreCurso,
                    concat(alumnos.nombres,' ',alumnos.apellidos) as 'nombreAlumno'  
                    FROM notas 
                    inner join alumnos on notas.DNI = alumnos.DNI
                    inner join cursos on notas.idCurso = cursos.idCurso
                    WHERE notas.DNI='".$id.
                    "' AND notas.idCurso=".$idCurso;
        
        $resultado = mysqli_query($conn,$consulta);

        if(mysqli_num_rows($resultado)==1){
            $row = mysqli_fetch_array($resultado);
            $nota1 = $row['nota1'];
            $nota2 = $row['nota2'];
            $nota3 = $row['nota3'];
            $nota4 = $row['nota4'];
            $nombreCurso = $row['nombreCurso'];
            $nombreAlumno = $row['nombreAlumno'];
        }
    }


    if (isset($_POST['ActualizarNota'])) {
        $id = $_GET['DNI'];
        $idCurso=$_GET['idCurso'];

        $nota1 = $_POST["nota1"];
        $nota2 = $_POST["nota2"];
        $nota3 = $_POST["nota3"];
        $nota4 = $_POST["nota4"];

        //Preparamos la orden SQL
        $consulta2="UPDATE notas SET nota1='$nota1',
                    nota2='$nota2',
                    nota3='$nota3',
                    nota4='$nota4'
                    WHERE DNI='".$id.
                    "' AND idCurso=".$idCurso;

        $resultado = mysqli_query($conn,$consulta2);

        if ($resultado){
            $_SESSION['message'] = 'Notas Actualizadas';
            $_SESSION['message_type'] = 'Success';
        } else {
            $_SESSION['message'] = 'No se Actualizo';
            $_SESSION['message_type'] = 'Failed';
        }
        
        
        header('Location: ../registroNota.php');
    }
?>

<?php include "../Includes/header.php"?>

<div class = "container p-2">
    <div class = "card card-body">

        <form action="editarNota.php?DNI=<?php echo $id ?>&idCurso=<?php echo $idCurso ?>" method="POST">
    
            <div class="input-group input-group-lg mb-3">
                <span class ="input-group-text" id="inputGroup-sizing-lg">Curso:</span>
                <input class = "form-control bg-light" type="text" autocomplete="course" maxlength="50"
                value="<?php echo $nombreCurso ?>"
                disabled required />
            </div>

            <div class="input-group input-group-lg mb-3" >
                <span class ="input-group-text" id="inputGroup-sizing-lg">Alumno:</span>
                <input class = "form-control bg-light" type="text" autocomplete="full name" 
                maxlength="50" value="<?php echo $nombreAlumno ?>" 
                disabled required/>
            </div>


            <div class="input-group input-group-lg mb-3" >
                <span class="input-group-text" id="inputGroup-sizing-lg">Nota 1:</span>
                <input type="number" min="0" max="20" class="form-control" name="nota1" autocomplete="calification" step="0.1"
                value="<?php echo $nota1 ?>" 
                maxlength="5" required />
            </div>

            <div class="input-group input-group-lg mb-3" >
                <span class="input-group-text" id="inputGroup-sizing-lg">Nota 2:</span>
                <input type="number" min="0" max="20" class="form-control" name="nota2" autocomplete="calification" step="0.1"
                value="<?php echo $nota2 ?>"  
                maxlength="5" required />
            </div>

            <div class="input-group input-group-lg mb-3" >
                <span class="input-group-text" id="inputGroup-sizing-lg">Nota 3:</span>
                <input type="number" min="0" max="20" class="form-control" name="nota3" autocomplete="calification" step="0.1"
                value="<?php echo $nota3 ?>" 
                maxlength="5" required />
            </div>

            <div class="input-group input-group-lg mb-3" >
                <span class="input-group-text" id="inputGroup-sizing-lg">Nota 4:</span>
                <input type="number" min="0" max="20" class="form-control" name="nota4" autocomplete="calification" step="0.1"
                value="<?php echo $nota4 ?>"  
                maxlength="5" required />
            </div>

            <div class="input-group input-group-lg mb-3">
                <input class="btn btn-primary btn-lg bg-gradient" name="ActualizarNota" type="submit" value="Actualizar Nota"/>
            </div>
        </form>
    </div>
</div>
