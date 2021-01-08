<?php
    $DirConexionBD="../data/conexionCleverCloud.php";

    if (file_exists($DirConexionBD)) {
        include $DirConexionBD;
    }else{
        echo "YA VALIO PILIN EN cargarCursos.php";
    }

    include ("../Includes/header.php");
?>

<div class = "container p-2">
    <div class="col-md-10">
        <h2>REGISTROS DE CURSOS</h2>
        <table class = "table table-hover">
            <thead class="table-danger">
                <tr>
                    <th>Nombre</th>
                    <th>Dia</th>
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
                                "<a href='../registroNota.php?idCurso=".$row['idCurso']."'>ELEGIR </a>".
                            "</td>".
                        "</tr>");
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
<!----scripts---->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
