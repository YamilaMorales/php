<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//si existe el archivo invitados lo abrimos y cargamos en una variable del tipo array
//los DNIs permitidos

//sino el array queda como vacio
if (file_exists("invitados.txt")) {

    $archivo = fopen("invitados.txt", "r");
    $aDocumentos = fgetcsv($archivo, 0, ",");
} else {
    $aDocumentos = array();
}

if ($_POST) {
    
    if (isset($_POST["btnInvitados"])) {
        //si el dni ingresado se escuentra en la lista se mostrara el msj d bienvenida
        $documento = $_REQUEST["txtDni"];  //defino la variable doc por resq o post 
        if (in_array($documento, $aDocumentos)) {
            $mensaje = "Bienvenido.";
            //sino un msj de no se encuentra en la lsta
        } else {
            $mensaje = "No se encuentra en la lista de invitados.";
        }
    }

    if (isset($_POST["btnVip"])) {
        $codigo = $_REQUEST["txtVip"];
        //si el codigo es "verde" entonces mostrara su codigovip
        if ($codigo == "verde") {
            $mensaje = "Su codigo de acceso es" . rand(1000, 9999);
        } else {
            $mensaje = "Usted no tiene pase VIP";
        }


        //sino us no tien pase vip
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de invitados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="col-12 py-3">
            <h1>Lista de invitados</h1>

        </div>
        </div>
        <?php if (isset($mensaje)) : ?>
            <div class="col-12">
                <div class="alert alert-info" role="alert">
                    <?php echo $mensaje; ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-12 ">
                <p>Complete el siguiente formulario:</p>
            </div>

        </div>
        <form action="POST" action="">
            <div class="row py-1">
                <div class="col-6 ">
                    <form action="">
                        <label for="" class="py-3">Ingrese el DNI:</label>
                        <input type="number" name="txtDni" id="txtDni" class="form-control">
                        <button class="btn btn-primary " name="btnInvitados"> Verificar invitado </button>
                </div>
                <div class="row py-1">
                    <div class="col-6 ">
                        <form action="">
                            <label for="" class="py-3">Ingrese el codigo secreto para el pase VIP:</label>
                            <input type="text" name="txtVip" id="txtVip" class="form-control">
                            <button class="btn btn-primary " name="btnVip"> Verificar codigo </button>
                    </div>
                </div>
        </form>
    </main>
</body>

</html>