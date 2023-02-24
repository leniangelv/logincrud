<?php
    include ("conexion.php");
    if (isset($_POST['send'])){
        $cod_doctor = $_POST['cod_doctor'];
        $nombre = $_POST['nombre'];
        $ci = $_POST['ci'];
        $fn = $_POST['fn'];
        $estado = $_POST['estado'];

        $insert = "INSERT INTO doctor (cod_doctor, nombre, ci, fn, estado)
        VALUES ('$cod_doctor','$nombre','$ci','$fn', '$estado')";
    
        if (mysqli_query($conn,$insert)){
            $_SESSION['message'] = 'Registro guardado exitosamente';
            $_SESSION['message_type'] = 'success'; #Función de bootstrap
            header('Location:index.php');
        }else{
        echo "El registro no se pudo guardar". mysqli_error($conn);
        }         #Devuelve una cadena que describe el último error
    }
?>
