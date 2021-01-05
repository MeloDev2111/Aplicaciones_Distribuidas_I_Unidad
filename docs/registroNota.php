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
    }
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
            <form action="data/agregarNota.php" method="POST">
        
                <h2 class="form-group">
                    <span>Nombre del curso:</span>
                    <input type="text" autocomplete="course" required
                    disabled maxlength="50" value="<?php echo ($nombreCurso) ? $nombreCurso : "" ?>"/>
                    <button type="button" class="btn btn-outline-success"
                    onClick="<?php "data/seleccionarCurso?" ?>">
                    +</button>
                </h2>
                <h2 class="form-group">
                    <span>Nombre del Alumno:</span>
                    <input type="text" autocomplete="full name" 
                    maxlength="50" disabled required value = "<?php echo ($nombres) ? $nombres." ".$apellidos : "" ?>"/>
                </h2>

                <h2 class="form-group">
                    <span>Nota:</span>
                    <input type="text" name="nota" autocomplete="full name" 
                    maxlength="50" required />
                </h2>

                <div class="form-group ">
                    <input class="btn btn-primary btn-lg bg-gradient" name="GuardarNota" type="submit" value="Guardar Nota"/>
                </div>
            </form>
        </div>
        <br>
    </div>


    <?php include ("data/cargarCursos.php");?>

</div>

<?php include ("Includes/footer.php");?>