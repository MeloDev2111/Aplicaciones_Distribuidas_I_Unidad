<?php
    $DirConexionBD="../data/conexionCleverCloud.php";

    if (file_exists($DirConexionBD)) {
        include $DirConexionBD;
    }else{
        echo "YA VALIO PILIN EN agregarAlumno.php";
    }

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

    if (isset($_POST['actualizarAlumno'])) {
        $id=$_GET['DNI'];
        $nombres = $_POST['Nombres'];
        $apellidos = $_POST['Apellidos'];

        //Preparamos la orden SQL
        $consulta2="UPDATE alumnos SET nombres='$nombres',
                    apellidos='$apellidos'
                    WHERE DNI='".$id."'";

        $resultado = mysqli_query($conn,$consulta2);

        if ($resultado){
            $_SESSION['message'] = 'Alumno Actualizado';
            $_SESSION['message_type'] = 'Success';
        } else {
            $_SESSION['message'] = 'No se Actualizo';
            $_SESSION['message_type'] = 'Failed';
        }
        header('Location: ../registroAlumno.php'); 
    }
?>

<?php include "../Includes/header.php"?>

<div class = "container p-2">
    <div class ="col-md-5">
        <div class = "card card-body">
            <form action="editarAlumno.php?DNI=<?php echo $_GET['DNI'] ?>" method="POST">

                <h2 class="form-group">
                    <span>DNI:</span>
                    <input type="number" name="DNI" autocomplete="DNI" max="99999999" min="10000000" required
                    value="<?php echo $id?>"/>
                </h2>

                <h2 class="form-group">
                    <span>Nombres:</span>
                    <input type="text" name="Nombres" autocomplete="name" required
                    value="<?php echo $nombres?>" autofocus maxlength="50"/>
                </h2>

                <h2 class="form-group">
                    <span>Apellidos:</span>
                    <input type="text" name="Apellidos" autocomplete="family-name"
                    value="<?php echo $apellidos?>" maxlength="50" required/>
                </h2>
                <div class="form-group">
                    <input class="btn btn-success btn-lg position-relative" name="actualizarAlumno" type="submit" value="Actualizar Información"/><br>
                </div>
            </form>
        </div>
    </div>
</div>
