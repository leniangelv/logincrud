<?php

include("conexion.php");
$con=conectar();

$cod_doctor=$_GET['id'];

$sql="DELETE FROM doctor  WHERE cod_doctor='$cod_doctor'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: index.php");
    }
?>