<?php
include("conexion.php");
$con=conectar();

$cod_doctor=$_POST['cod_doctor'];
$nombre=$_POST['nombre'];
$ci=$_POST['ci'];
$fn=$_POST['fn'];
$estado=$_POST['estado'];


$sql="INSERT INTO doctor VALUES('$cod_doctor','$nombre','$ci','$fn','$estado')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: index.php");
    
}else {
}
?>