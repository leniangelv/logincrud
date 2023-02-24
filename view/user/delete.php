<?php
    include ("conexion.php");
    if (isset($_GET['cod_doctor'])){    
        $cod_doctor = $_GET['cod_doctor'];
        
        $delete = "DELETE FROM doctor WHERE cod_doctor = $cod_doctor";

        if (mysqli_query($conn, $delete)){
            $_SESSION['message'] = 'Registro borrado exitosamente';
            $_SESSION['message_type'] = 'danger'; # Funcion de bootstrap
            header('Location:index.php'); # Redireccionar el archivo
        }else{
            echo "Error al borrar registro: " . mysqli_error($conn);
        }
    }
?>
