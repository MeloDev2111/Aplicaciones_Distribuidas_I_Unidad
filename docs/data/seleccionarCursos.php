<?php
    $urlAlumno ="conexionCleverCloud.php";

    if (file_exists($urlAlumno)) {
        include $urlAlumno;
    }else{
        echo "YA VALIO PILIN EN cargarCursos.php";
    }
?>
<div class="col-md-10">
    <h2>REGISTROS REALIZADOS</h2>
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
                            "<a href='data/editarCurso.php?idCurso=".$row['idCurso']."'>Editar </a>".
                            "<a href='data/eliminarCurso.php?idCurso=".$row['idCurso']."'>Eliminar </a>".
                        "</td>".
                    "</tr>");
                }
            ?>
        </tbody>
    </table>
</div>