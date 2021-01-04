<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>MENU</title>
    <style>
        a{
            text-align: center;
            padding:0 25% 0 25%;
        }
    </style>
</head>
<body>

    <h3>Projects:</h3>
        <ul>
            <li>
                <a href="<?php $_SERVER['DOCUMENT_ROOT']?>/registroAlumno.php">REGISTRAR ALUMNO</a>
            </li>
            <li><a href="<?php $_SERVER['DOCUMENT_ROOT']?>/docs/registroAlumno.php">REGISTRAR ALUMNOS CON /DOCS</a></li>
            <li>
                <a href="recipe-app/index.html">REGISTRAR NOTAS</a>
            </li>
            <?php echo $_SERVER['DOCUMENT_ROOT']?>
</body>
</html>