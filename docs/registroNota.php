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
            <form action="operaciones/agregarNota.php?DNI=<?php echo $id ?>&idCurso=<?php echo $idCurso ?>" method="POST">
        
                <div class="input-group input-group-lg mb-3">
                    <span class ="input-group-text" id="inputGroup-sizing-lg">Curso:</span>
                    <input class = "form-control bg-light" type="text" autocomplete="course" maxlength="50"
                    <?php echo ($nombreCurso) ? "value='$nombreCurso'" : "" ?> 
                    style="pointer-events: none;" required />

                    <a class="btn btn-outline-success" href="operaciones/seleccionarCurso.php" role="button">+</a>
                </div>

                <div class="input-group input-group-lg mb-3" >
                    <span class ="input-group-text" id="inputGroup-sizing-lg">Alumno:</span>
                    <input class = "form-control bg-light" type="text" autocomplete="full name" 
                    maxlength="50" <?php echo ($nombres) ? "value ='$nombres $apellidos'" : "" ?> 
                    style="pointer-events: none;" required/>

                    <a class="btn btn-outline-success" href="operaciones/seleccionarAlumno.php" role="button">+</a>
                </div>


                <div class="input-group input-group-lg mb-3" >
                    <span class="input-group-text" id="inputGroup-sizing-lg">Nota 1:</span>
                    <input type="text" class="form-control" name="nota1" autocomplete="calification" 
                    maxlength="5" required />
                </div>

                <div class="input-group input-group-lg mb-3" >
                    <span class="input-group-text" id="inputGroup-sizing-lg">Nota 2:</span>
                    <input type="text" class="form-control" name="nota2" autocomplete="calification" 
                    maxlength="5" required />
                </div>

                <div class="input-group input-group-lg mb-3" >
                    <span class="input-group-text" id="inputGroup-sizing-lg">Nota 3:</span>
                    <input type="text" class="form-control" name="nota3" autocomplete="calification" 
                    maxlength="5" required />
                </div>

                <div class="input-group input-group-lg mb-3" >
                    <span class="input-group-text" id="inputGroup-sizing-lg">Nota 4:</span>
                    <input type="text" class="form-control" name="nota4" autocomplete="calification" 
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
        <h2>REGISTROS DE NOTAS</h2>
        <table class = "table table-hover">
            <thead class="table-danger">
                <tr>
                    <th>idCurso</th>
                    <th>Curso</th>
                    <th>Alumno</th>
                    <th>Promedio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $consulta = "select cursos.nombreCurso,concat(alumnos.nombres,
                                    ' ',alumnos.apellidos) as 'nombreAlumno', 
                                    (nota1+nota2+nota3+nota4)/4 as 'Promedio',
                                    notas.DNI,
                                    notas.idCurso
                        from notas
                        inner join alumnos on notas.DNI = alumnos.DNI
                        inner join cursos on notas.idCurso = cursos.idCurso
                        order by idCurso;";
                    $resultado = mysqli_query($conn,$consulta);
                    while($row = mysqli_fetch_array($resultado)){
                        echo(
                        "<tr>".
                            "<td>".$row['idCurso']."</td>".
                            "<td>".$row['nombreCurso']."</td>".
                            "<td>".$row['nombreAlumno']."</td>".
                            "<td>".$row['Promedio']."</td>".
                            "<td>".
                                "<a href='operaciones/editarNota.php?idCurso=".$row['idCurso']."&". 
                                        "DNI=".$row['DNI']."'>Editar </a>".
                                "<a href='operaciones/eliminarNota.php?idCurso=".$row['idCurso']."&". 
                                "DNI=".$row['DNI']." '>Eliminar </a>".
                            "</td>".
                        "</tr>");
                    }
                ?>
            </tbody>
        </table>
    </div>
    
</div>

<?php include ("Includes/footer.php");?>