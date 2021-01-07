<?php 
$DirConexionBD="data/conexionCleverCloud.php";
if (file_exists($DirConexionBD)) {
    include $DirConexionBD; 
}else{
    echo "ALV YA VALIO PILIN EN REGISTROALUMNO.PHP";
}

include ("Includes/header.php");
?>

    <div class = "container p-2">
        <div class = "row">
            <div class ="col-md-5">

                <?php
                    if(isset($_SESSION['message'])){
                ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <?="<strong>".$_SESSION['message']."</strong>"?>
                        <button type="button" class="btn-close" onClick="<?php session_destroy() ?>" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>

                <div class = "card card-body">
                    <form action="operaciones/agregarAlumno.php" method="POST">

                        <h2 class="form-group">
                            <span>DNI:</span>
                            <input type="DNI" name="DNI" autocomplete="DNI" maxlength="8" minlength="8" required/>
                        </h2>

                        <h2 class="form-group">
                            <span>Nombres:</span>
                            <input type="text" name="Nombres" autocomplete="name" required
                            maxlength="50"/>
                        </h2>

                        <h2 class="form-group">
                            <span>Apellidos:</span>
                            <input type="text" name="Apellidos" autocomplete="family-name"
                            maxlength="50" required/>
                        </h2>
                        <div class="form-group">
                            <input class="btn btn-success btn-lg" name="GuardarAlumno" type="submit" value="Guardar Alumno"/><br>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-7">
                <h2>REGISTROS REALIZADOS</h2>
                <table class = "table table-hover">
                    <thead class="table-danger">
                        <tr>
                            <th>DNI</th>
                            <th>Nombres</th>
                            <th>Apellido</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $consulta = "Select * from alumnos";
                            $resultado = mysqli_query($conn,$consulta);
                            while($row = mysqli_fetch_array($resultado)){
                                echo(
                                "<tr>".
                                    "<td>".$row['DNI']."</td>".
                                    "<td>".$row['nombres']."</td>".
                                    "<td>".$row['apellidos']."</td>".
                                    "<td>".
                                        "<a href='operaciones/editarAlumno.php?DNI=".$row['DNI']."'>Editar </a>".
                                        "<a href='operaciones/eliminarAlumno.php?DNI=".$row['DNI']."'>Eliminar </a>".
                                    "</td>".
                                "</tr>");
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php include ("Includes/footer.php"); ?>