<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



session_start();  //esta seteada  session? con(isset). luego con if prefunta existe la variable listadoCLientes? si existe guarda la info ahi
if (isset($_SESSION["listadoClientes"])) {

    $aClientes = $_SESSION["listadoClientes"];

    //sino aClientes es un array vacio.
} 
else {
    $aClientes = array();
}
//preginta si es postback sea para enviar o eliminar todos
if ($_POST) {
    //si hace clik en bton enviar entonces guarda todos los datos.
    if (isset($_POST["btnEnviar"])) {


        //asignamos en variables los datos que vienen del formulario//
        $nombre = $_POST["txtNombre"];
        $dni = $_POST["txtDni"];
        $telefono = $_POST["txtTelefono"];
        $edad = $_POST["txtEdad"];

        //creamos un array que contendra el listado de clientes
        $aClientes[] = array(
            "nombre" => $nombre,
            "dni" => $dni,
            "telefono" => $telefono,
            "edad" => $edad
        );


        //actualiza el contenido de la variable session
        $_SESSION["listadoClientes"] = $aClientes;
    }
    //si hace clik en eliminar elimina y la sesion,borra los datos. vuelvo a declarar el array aClientes vacio para que se borren los datos almacenados. 
    if (isset($_POST["btnEliminar"])) {
        session_destroy();
        $aClientes = array();
    }
}

//pregunt si viene pos en la query string
if(isset($_GET["pos"])){
    //recuper el dato qe viene desde la query string via get
    $pos= $_GET["pos"];
    unset($aClientes[$pos]); //elimina la posicion del array indicado
    //actualizo la variable de ssesion con el array actualizado
    $_SESSION["listadoClientes"] = $aClientes;
    header("Location: clientes_session.php"); //redireciono a la misma pagina para limpiarlas posiciones.
 }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
    <main class="container">

        <div class="row">
            <div class="col-12 p-5 text-center">
                <h1>Listado de clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-3">

                <form action="" method="post">
                    <div class="  pb-3">
                        <label for="txtNombre"> Nombre: * </label>
                        <input class="form-control" type="text" name="txtNombre" id="txtNombre" >
                    </div>
                    <div class=" pb-3">
                        <label for="txtDni"> DNI: *</label>
                        <input class="form-control" type="text" name="txtDni" id="txtDni" >
                    </div>
                    <div class=" pb-3">
                        <label for="txtTelefono"> Telefono: *</label>
                        <input class="form-control" type="text" name="txtTelefono" id="txtTelefono" >
                    </div>
                    <div class="pb-3">
                        <label for="txtEdad"> Edad: *</label>
                        <input class="form-control" type="number" name="txtEdad" id="txtEdad" >
                    </div>
                    <div class="pb-3">
                        <button class="btn btn-primary " type="submit" name="btnEnviar">Enviar</button>
                        <button class="btn btn-danger" type="submit" name="btnEliminar">Eliminar </button>
                    </div>

                </form>
            </div>
            <div class="col-9">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>Nombre:</th>
                            <th>DNI:</th>
                            <th>Telefono:</th>
                            <th>Edad:</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php foreach ($aClientes as $pos => $cliente) { ?> 
                            <tr>
                                <td><?php echo $cliente["nombre"]; ?></td>
                                <td><?php echo $cliente["dni"]; ?></td>
                                <td><?php echo $cliente["telefono"]; ?></td>
                                <td><?php echo $cliente["edad"]; ?></td>
                                <td><a href="clientes_session.php?pos=<?php echo $pos; ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>

    </main>
</body>

</html>