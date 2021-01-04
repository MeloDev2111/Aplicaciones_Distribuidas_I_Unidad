<?php 
include $_SERVER['DOCUMENT_ROOT'].'/docs/data/agregarAlumno.php'; 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <title>Registro Alumno</title>
        <style>
            header{
                text-align: center;
                font-size: 50px;
                padding:0.5em 0 0.5em 0;
                margin: 0 0 1em 0;
            }
            h2{
                display: grid;
                margin: 0 0 1em 0;
            }
            form{
                display: grid;
                text-align: left;
                padding: 0em 25% 0em 25%;
            }
            span{
                font-weight:bold;
            }
            
        </style>
    </head>

    <header class="card-text text-white text-center fw-bold bg-danger">
        <div>REGISTRO ALUMNO</div>
    </header>

    <body>

        <div class = "col-md-4">
            <form action="agregarAlumno.php" method="POST">
                <h2 for="Nombre">
                    <span>Nombres:</span>
                    <input type="text" name="nombre" autocomplete="name" required
                    maxlength="50"/>
                </h2>
                <h2 for="Apellido">
                    <span>Apellidos:</span>
                    <input type="text" name="Apellido" autocomplete="family-name"
                    maxlength="50" required/>
                </h2>
        
                <h2 for="DNI">
                    <span>DNI:</span>
                    <input type="DNI" name="DNI" autocomplete="DNI" maxlength="8" minlength="8" required/>
                </h2>
                <input class="btn btn-danger" type="submit"/><br>
            </form>
        </div>

        <div class="col-md-8">
                <table class = "table table-bordered">
                    <thead>
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
                                        "<a href=' editarAlumno.php?id=".$row['DNI']." '>Editar </a>".
                                        "<a href=' eliminarAlumno.php?id=".$row['DNI']." '>Eliminar </a>".
                                    "</td>".
                                "</tr>");
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <?php echo $_SERVER['DOCUMENT_ROOT']?>

        <!----scripts---->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    </body>

    <footer>

    </footer>

</html>