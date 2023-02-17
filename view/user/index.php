<?php 
    include("conexion.php");
    $con=conectar();

    $sql="SELECT *  FROM doctor";
    $query=mysqli_query($con,$sql);

    $row=mysqli_fetch_array($query);

    echo '<a href="../../controller/cerrarSesion.php">LogOut</a>'
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Inicio</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    </head>
    <body>

            <div class="container mt-5">
                    <div class="row"> 
                        
                        <div class="col-md-3">
                            <h1>Ingrese datos</h1>
                                <form action="insertar.php" method="POST">

                                    <input type="text" class="form-control mb-3" name="cod_doctor" placeholder="Numero de CMEG">
                                    <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre Completo">
                                    <input type="text" class="form-control mb-3" name="ci" placeholder="Cedula de Identidad">
                                    <input type="text" class="form-control mb-3" name="fn" placeholder="Fecha de Nacimiento">
                                    <input type="text" class="form-control mb-3" name="estado" placeholder="Status">
                                    
                                    <input type="submit" class="btn btn-primary">
                                </form>
                        </div>

                        <div class="col-md-8">
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>N° CMEG</th>
                                        <th>Nombre</th>
                                        <th>C.I.</th>
                                        <th>Fecha de Nacimiento</th>
                                        <th>Status</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                            <tr>
                                                <th><?php  echo $row['cod_doctor']?></th>
                                                <th><?php  echo $row['nombre']?></th>
                                                <th><?php  echo $row['ci']?></th>
                                                <th><?php  echo $row['fn']?></th>
                                                <th><?php  echo $row['estado']?></th>       
                                                <th><a href="actualizar.php?id=<?php echo $row['cod_doctor'] ?>" class="btn btn-info">Editar</a></th>
                                                <th><a href="delete.php?id=<?php echo $row['cod_doctor'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>  
            </div>
    </body>
</html>