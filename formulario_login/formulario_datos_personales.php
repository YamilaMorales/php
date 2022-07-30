<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center p-5">
                <h1>Formulario de datos personales</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
               
                <form action="resultados.php" method="post">
                    <div class=" col-12 pb-3">
                        <label for="txtNombre"> Nombre: * </label>
                        <input class="form-control" type="text" name="txtNombre" id="txtNombre" required="">
                    </div>
                    <div class=" pb-3">
                        <label for="txtDni"> DNI: *</label>
                        <input class="form-control" type="text" name="txtDni" id="txtDni" required="">
                    </div>
                    <div class=" pb-3">
                        <label for="txtTelefono"> Telefono: *</label>
                        <input class="form-control" type="text" name="txtTelefono" id="txtTelefono" required="">
                    </div>
                    <div class="pb-3">
                        <label for="txtEdad"> Edad: *</label>
                        <input class="form-control" type="number" name="txtEdad" id="txtEdad" required="">
                    </div>
                    <div class="pb-3">
                        <button class="btn btn-primary float-end" type="submit">ENVIAR</button>
                    </div>
                   
                </form>
            </div>

        </div>

    </main>
</body>

</html>