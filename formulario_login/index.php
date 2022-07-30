<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if($_POST){ /*esto es postback?*/
     
    $usuario= $_REQUEST["txtUsuario"];
    
    $clave = $_REQUEST["txtClave"];
    
//si usuario es distinto de vacio y clave distinto de vacio entonces:
 if ($usuario != "" && $clave != "") {
    header("Location:acceso-confirmado.php");
 } else{ 
    $mensaje= "Valido para usuarios registrados.";
 }

}

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
                <h1>Formulario</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-5">
                <?php if( isset($mensaje)):?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $mensaje ?> 
                    <?php endif; ?>
                </div> 

                <form action="" method="post">
                    <div class=" col-5 pb-3">
                        <label for="txtUsuario"> Usuario: </label>
                        <input class="form-control" type="text" name="txtUsuario" id="txtUsuario">
                    </div>
                    <div class=" col-5 pb-3">
                        <label for="txtClave"> Clave: </label>
                        <input class="form-control" type="password" name="txtClave" id="txtClave">
                    </div>
                    <div class="pb-3">
                        <button class="btn btn-primary" type="submit">Ingresar</button>
                    </div>
                </form>
            </div>

        </div>

    </main>
</body>

</html>