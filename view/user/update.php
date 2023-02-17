<?php

include("conexion.php");
$con=conectar();

$cod_doctor=$_POST['cod_doctor'];
$nombre=$_POST['nombre'];
$ci=$_POST['ci'];
$fn=$_POST['fn'];
$estado=$_POST['estado'];

$sql="UPDATE doctor SET  nombre='$nombre',ci='$ci',fn='$fn',estado='$estado' WHERE cod_doctor='$cod_doctor'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: index.php");
    }
?>