<?php
    $DirConexionBD="../data/conexionCleverCloud.php";

    if (file_exists($DirConexionBD)) {
        include $DirConexionBD;
    }else{
        echo "YA VALIO PILIN EN cargarAlumnos.php";
    }

    include ("../Includes/header.php");
?>

<div class = "container p-2">
    <div class="col-md-10">
        <h2>REGISTROS DE ALUMNOS</h2>
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
                                "<a href='../registroNota.php?DNI=".$row['DNI']."'>ELEGIR </a>".
                            "</td>".
                        "</tr>");
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include ("../Includes/footer.php");?>