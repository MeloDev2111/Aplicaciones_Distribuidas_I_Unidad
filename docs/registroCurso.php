<?php 
$DirConexionBD="data/conexionCleverCloud.php";
if (file_exists($DirConexionBD)) {
    include $DirConexionBD; 
}else{
    echo "ALA YA VALIO PILIN EN REGISTROCURSO.PHP";
}

include ("Includes/header.php");
?>

<div class = "container p-2">
    <div class ="col-md-10">
        <?php
            include ("popup.php")
        ?>

        <div class = "card card-body">
            <form action="operaciones/agregarCurso.php" method="POST">
        
                <h2 class="form-group">
                    <span>Nombre del curso:</span>
                    <input type="text" name="nombreCurso" autocomplete="course" required
                    maxlength="50"/>
                </h2>
                <br>
                <h2 class="form-group">
                    <span>Dia:</span>
                    <select name="dia">
                        <option>Lunes</option>
                        <option>Martes</option>
                        <option>Miercoles</option>
                        <option>Jueves</option>
                        <option>Viernes</option>
                        <option>Sabado</option>
                    </select>
                </h2>
                <h2 class="form-group">
                    <span>Horario:</span>
                    <horario id="Horario">
                        <input type="time" min="08:00" max="22:00" name="horaEntrada" required/>
                        a
                        <input type="time" min="08:00" max="22:00" name="horaSalida" required/>
                    </horario>
                </h2>
                <br>
                <h2 class="form-group">
                    <span>Nombre del Docente:</span>
                    <input type="text" name="docente" autocomplete="full name" maxlength="50" required/>
                </h2>
                <div class="form-group ">
                    <input class="btn btn-dark btn-lg bg-gradient" name="GuardarCurso" type="submit" value="Guardar Curso"/>
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
                        <th>Nombre</th>
                        <th>dia</th>
                        <th>Hora Entrada</th>
                        <th>Hora Salida</th>
                        <th>Docente</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $consulta = "Select * from cursos";
                        $resultado = mysqli_query($conn,$consulta);
                        while($row = mysqli_fetch_array($resultado)){
                            echo(
                            "<tr>".
                                "<td>".$row['nombreCurso']."</td>".
                                "<td>".$row['dia']."</td>".
                                "<td>".$row['horaEntrada']."</td>".
                                "<td>".$row['horaSalida']."</td>".
                                "<td>".$row['docente']."</td>".
                                "<td>".
                                    "<a href='operaciones/editarCurso.php?idCurso=".$row['idCurso']."'>Editar </a>".
                                    "<a href='operaciones/eliminarCurso.php?idCurso=".$row['idCurso']."'>Eliminar </a>".
                                "</td>".
                            "</tr>");
                        }
                    ?>
                </tbody>
            </table>
        </div>

</div>

<?php include ("Includes/footer.php");?>