<?php
    $urlAlumno ="conexionCleverCloud.php";

    if (file_exists($urlAlumno)) {
        include $urlAlumno;
    }else{
        echo "YA VALIO PILIN EN cargarAlumnos.php";
    }
?>

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
                            "<a href='data/editarAlumno.php?DNI=".$row['DNI']."'>Editar </a>".
                            "<a href='data/eliminarAlumno.php?DNI=".$row['DNI']."'>Eliminar </a>".
                        "</td>".
                    "</tr>");
                }
            ?>
        </tbody>
    </table>
</div>