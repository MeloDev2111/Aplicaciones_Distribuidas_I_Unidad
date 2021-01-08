<?php
    $DirConexionBD="../data/conexionCleverCloud.php";

    if (file_exists($DirConexionBD)) {
        include $DirConexionBD;
    }else{
        echo "YA VALIO PILIN EN editarCurso.php";
    }

    if (isset($_GET['idCurso'])) {
        $id=$_GET['idCurso'];
        $consulta="SELECT * FROM cursos WHERE idCurso=".$id;
        $resultado = mysqli_query($conn,$consulta);

        if(mysqli_num_rows($resultado)==1){
            $row = mysqli_fetch_array($resultado);
            $nombreCurso = $row['nombreCurso'];
            $dia = $row['dia'];
            $horaEntrada = $row['horaEntrada'];
            $horaSalida = $row['horaSalida'];
            $docente = $row['docente'];
        }
    }

    if (isset($_POST['actualizarCurso'])) {
        $id=$_GET['idCurso'];
        $nombreCurso = $_POST['nombreCurso'];
        $dia = $_POST['dia'];
        $horaEntrada = $_POST['horaEntrada'];
        $horaSalida = $_POST['horaSalida'];
        $docente = $_POST['docente'];

        if($horaEntrada>=$horaSalida){
            $_SESSION['message'] = 'Hora de Entrada >= Hora de Salida!?';
            $_SESSION['message_type'] = 'Advice';
        }else{
            //Preparamos la orden SQL
            $consulta2="UPDATE cursos SET nombreCurso='$nombreCurso',
                        dia='$dia',
                        horaEntrada='$horaEntrada',
                        horaSalida='$horaSalida',
                        docente='$docente'
                        WHERE idCurso=".$id;

            $resultado = mysqli_query($conn,$consulta2);

            if ($resultado){
                $_SESSION['message'] = 'Curso Actualizado';
                $_SESSION['message_type'] = 'Success';
            } else {
                $_SESSION['message'] = 'No se Actualizo';
                $_SESSION['message_type'] = 'Failed';
            }
        }
        
        header('Location: ../registroCurso.php');
    }
?>

<?php include "../Includes/header.php"?>

<div class = "container p-2">
    <div class ="col-md-10">
        <div class = "card card-body">
            <form action="editarCurso.php?idCurso=<?php echo $_GET['idCurso'] ?>" method="POST">
        
                <h2 class="form-group">
                    <span>Nombre del curso:</span>
                    <input type="text" name="nombreCurso" autocomplete="course" required
                    maxlength="50" value="<?php echo $nombreCurso?>"/>
                </h2>
                <br>
                <h2 class="form-group">
                    <span>Dia:</span>
                    <select name="dia" >
                        <option <?php echo ($dia=="Lunes") ? 'selected' : '' ?> >
                        Lunes</option>
                        <option <?php echo ($dia=="Martes") ? 'selected' : '' ?> >
                        Martes</option>
                        <option <?php echo ($dia=="Miercoles") ? 'selected' : '' ?>>
                        Miercoles</option>
                        <option <?php echo ($dia=="Jueves") ? 'selected' : '' ?>>
                        Jueves</option>
                        <option <?php echo ($dia=="Viernes") ? 'selected' : '' ?> >
                        Viernes</option>
                        <option <?php echo ($dia=="Sabado") ? 'selected' : '' ?>>
                        Sabado</option>
                    </select>
                </h2>
                <h2 class="form-group">
                    <span>Horario:</span>
                    <horario id="Horario">
                        <input type="time" name="horaEntrada" min="08:00" max="22:00" step="300"
                        value="<?php echo $horaEntrada?>" required/>
                        a
                        <input type="time" name="horaSalida" min="08:00" max="22:00"  step="300"
                        value="<?php echo $horaSalida?>" required/>
                    </horario>
                </h2>
                <br>
                <h2 class="form-group">
                    <span>Nombre del Docente:</span>
                    <input type="text" name="docente" autocomplete="full name" maxlength="50" required
                    value="<?php echo $docente?>"/>
                </h2>
                <div class="form-group ">
                    <input class="btn btn-dark btn-lg bg-gradient" name="actualizarCurso" type="submit" value="Actualizar Curso"/>
                </div>
            </form>
        </div>
        <br>
    </div>
</div>


<?php include "../Includes/footer.php"?>