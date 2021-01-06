<?php 
$DirConexionBD="data/conexionCleverCloud.php";
if (file_exists($DirConexionBD)) {
    include $DirConexionBD; 
}else{
    echo "ALA YA VALIO PILIN EN REGISTRONOTA.PHP";
}

$nombreCurso=false;
$nombres=false;
$apellidos=false;

if (isset($_GET['DNI'])) {
    $id=$_GET['DNI'];
    $consulta="SELECT * FROM alumnos WHERE DNI='".$id."'";
    $resultado = mysqli_query($conn,$consulta);

    if(mysqli_num_rows($resultado)==1){
        $row = mysqli_fetch_array($resultado);
        $nombres = $row['nombres'];
        $apellidos = $row['apellidos'];

        $_SESSION['DNI'] = $id;
    }
    
}


if (isset($_GET['idCurso'])) {
    $idCurso=$_GET['idCurso'];
    $consulta="SELECT * FROM cursos WHERE idCurso=".$idCurso;
    $resultado = mysqli_query($conn,$consulta);

    if(mysqli_num_rows($resultado)==1){
        $row = mysqli_fetch_array($resultado);
        $nombreCurso = $row['nombreCurso'];
        $dia = $row['dia'];
        $horaEntrada = $row['horaEntrada'];
        $horaSalida = $row['horaSalida'];
        $docente = $row['docente'];

        $_SESSION['idCurso'] = $idCurso;
    }
}

if (isset($_SESSION['DNI'],$_SESSION['idCurso'])) {
    $id=$_SESSION['DNI'];
    $idCurso=$_SESSION['idCurso'];

    $consulta="SELECT * FROM alumnos WHERE DNI='".$id."'";
    $resultado = mysqli_query($conn,$consulta);

    if(mysqli_num_rows($resultado)==1){
        $row = mysqli_fetch_array($resultado);
        $nombres = $row['nombres'];
        $apellidos = $row['apellidos'];
    }

    $consulta="SELECT * FROM cursos WHERE idCurso=".$idCurso;
    $resultado = mysqli_query($conn,$consulta);

    if(mysqli_num_rows($resultado)==1){
        $row = mysqli_fetch_array($resultado);
        $nombreCurso = $row['nombreCurso'];
    }
}

include ("Includes/header.php");
?>

<div class = "container p-2">
    <div class ="col-md-10">

        <?php
            if(isset($_SESSION['message'])){
        ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?="<strong>".$_SESSION['message']."</strong>"?>
                <button type="button" class="btn-close" onClick="<?php session_destroy() ?>" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
        <div class = "card card-body">
            <form action="data/agregarNota.php?DNI=<?php echo $id ?>&idCurso=<?php echo $idCurso ?>" method="POST">
        
                <div class="input-group input-group-lg mb-3">
                    <span class ="input-group-text" id="inputGroup-sizing-lg">Nombre del Curso:</span>
                    <input class = "form-control bg-light" type="text" autocomplete="course" maxlength="50"
                    <?php echo ($nombreCurso) ? "value='$nombreCurso'" : "" ?> 
                    style="pointer-events: none;" required />

                    <a class="btn btn-outline-success" href="data/seleccionarCurso.php" role="button">+</a>
                </div>

                <div class="input-group input-group-lg mb-3" >
                    <span class ="input-group-text" id="inputGroup-sizing-lg">Nombre del Alumno:</span>
                    <input class = "form-control bg-light" type="text" autocomplete="full name" 
                    maxlength="50" <?php echo ($nombres) ? "value ='$nombres $apellidos'" : "" ?> 
                    style="pointer-events: none;" required/>

                    <a class="btn btn-outline-success" href="data/seleccionarAlumno.php" role="button">+</a>
                </div>


                <div class="input-group input-group-lg mb-3" >
                    <span class="input-group-text" id="inputGroup-sizing-lg">Nota:</span>
                    <input type="text" class="form-control" name="nota" autocomplete="calification" 
                    maxlength="5" required />
                </div>

                <div class="input-group input-group-lg mb-3">
                    <input class="btn btn-primary btn-lg bg-gradient" name="GuardarNota" type="submit" value="Guardar Nota"/>
                </div>
            </form>
        </div>
        <br>
    </div>

    <div class="col-md-10">
        <h2>REGISTROS DE CURSOS</h2>
        <table class = "table table-hover">
            <thead class="table-danger">
                <tr>
                    <th>idNota</th>
                    <th>Curso</th>
                    <th>Alumno</th>
                    <th>Nota</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $consulta = "select idNota,cursos.nombreCurso,concat(alumnos.nombres,
                                    ' ',alumnos.apellidos) as 'nombreAlumno', nota
                        from notas
                        inner join alumnos on notas.DNI = alumnos.DNI
                        inner join cursos on notas.idCurso = cursos.idCurso;";
                    $resultado = mysqli_query($conn,$consulta);
                    while($row = mysqli_fetch_array($resultado)){
                        echo(
                        "<tr>".
                            "<td>".$row['idNota']."</td>".
                            "<td>".$row['nombreCurso']."</td>".
                            "<td>".$row['nombreAlumno']."</td>".
                            "<td>".$row['nota']."</td>".
                            "<td>".
                                "<a href='data/editarNota.php?idNota=".$row['idNota']."'>Editar </a>".
                                "<a href='data/eliminarNota.php?idNota=".$row['idNota']."'>Eliminar </a>".
                            "</td>".
                        "</tr>");
                    }
                ?>
            </tbody>
        </table>
    </div>
    
</div>

<?php include ("Includes/footer.php");?>