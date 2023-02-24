<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado CMEG</title>
    <!--Bootstrap 4-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script>
        function validarform() {
            var x = document.forms["form"]["cod_doctor"].value;
            if (x == "") {
                alert("El campo de Numero de Inscripcion no puede estar vacio");
                return false;
            }
        }
    </script> <!--Validación del Numero de Inscripcion en el fomrulario, si esta vacio retorna un alert-->
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-dark  bg-dark">
            <div class="container">
                <a href="index.php" class="navbar-brand">Listado de Medicos Inscritos CMEG</a>
            </div>
        </nav>
        <?php
            include("conexion.php");
            if(isset($_GET['cod_doctor'])){ #Determina si una variable está definida y no es NULL / isset
                $cod_doctor = $_GET['cod_doctor'];

                $query = "SELECT * FROM doctor WHERE cod_doctor = $cod_doctor";
                $result = mysqli_query($conn, $query);
                
                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_array($result);
                    
                    $cod_doctor = $row['cod_doctor'];
                    $nombre = $row['nombre'];
                    $ci = $row['ci'];
                    $fn = $row['fn'];
                    $estado = $row['estado'];
                }
            }
            if(isset($_POST['update'])){
                $cod_doctor = $_POST['cod_doctor'];
                $nombre = $_POST['nombre'];
                $ci = $_POST['ci'];
                $fn = $_POST['fn'];
                $estado = $_POST['estado'];

                $update = "UPDATE doctor SET nombre = '$nombre', ci ='$ci', fn = '$fn', estado ='$estado' WHERE cod_doctor = '$cod_doctor'";
                mysqli_query($conn, $update);
                $_SESSION['message'] = 'Registro actualizado exitosamente';
                $_SESSION['message_type'] = 'info'; # Función de bootstrap
                header('Location:index.php');
            }
        ?>
        <div class="container p-4">
            <div class="row">
                <div class="col-md-4 mx-auto">
                    <div class="card card-body">
                        <form name="form" action="update.php?id=<?php echo $_GET['cod_doctor'];?>"
                            onsubmit="return validarform()" method="POST">
                            <div class="form-group">
                                Numero de Inscripcion <input type="text" name="cod_doctor" value="<?php echo $cod_doctor; ?>" class="form-control"
                                    placeholder="Actualiza Numero de Inscripcion" autocomplete="off" autofocus>
                            </div>
                            <div class="form-group">
                                Nombre<input type="text" name="nombre" value="<?php echo $nombre; ?>" class="form-control"
                                    placeholder="Actualiza Nombre" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                C.I.<input type="text" name="ci" value="<?php echo $ci; ?>"
                                    class="form-control" placeholder="Actualiza Cedula de Identidad" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                Telefono<input type="text" name="fn" value="<?php echo $fn; ?>"
                                    class="form-control" placeholder="Actualiza Fecha de Nacimiento" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                Telefono<input type="text" name="estado" value="<?php echo $estado; ?>"
                                    class="form-control" placeholder="Actualiza Status de la Inscripcion" autocomplete="off" required>
                            </div>
                            <button class="btn btn-success btn-block" name="update">
                                Actualizar
                            </button>
                        </form>
                    </div> <!--End card-->
                </div> <!--End col-md-4-->
            </div> <!--End row-->
        </div> <!--End container -4-->
    </div><!--div class container-->
    <!--Scripts-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
</body>

</html>
