<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if($_POST){ /*esto es postback?*/
     
    $nombre= $_POST["txtNombre"];
    
    $dni = $_POST ["txtDni"];
    
    $telefono = $_POST[ "txtTelefono"];
     
    $edad = $_POST ["txtEdad"];


}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Resultado del Formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center p-5">
                <h1>Resultado del formulario</h1>
            </div>
        </div>
        <div class="row">
         <div class="col-12 pb-3">
            <table class="table table-hover border">
                <thead>
                    <tr>
                    <th>Nombre</th>
                    <th>DNI</th>
                    <th>Telefono</th>
                    <th>Edad</th>
                    </tr>
                </thead>
                <tr>
                   <td> <?php echo $nombre; ?> </td>
                   <td> <?php echo $dni; ?> </td>
                   <td> <?php echo $telefono; ?> </td>
                   <td> <?php echo $edad; ?> </td>
                </tr>

                <tbody>

                </tbody>
            </table>

         </div>
        </div>

       
    </main>
</body>
</html>    