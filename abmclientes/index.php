<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);




if (file_exists("archivo.txt")) { //existe el archivo? 

    //si es verdadero lo leememos y almacenamos el conyenido en jsonCLientes

    $jsonClientes = file_get_contents("archivo.txt"); //con file_get_contents leo el archivo 

    $aClientes = json_decode($jsonClientes, true); //convierto el json en array

    //sino aClientes es un array vacio. para que no me de error el forich
} else {
    $aClientes = array();
}

$pos = isset($_GET["pos"]) && $_GET["pos"] >= 0 ? $_GET["pos"] : "";  //defino la variable pos afuera.

if ($_POST) {
   

    //asignamos en variables los datos que vienen del formulario//
    $nombre = trim($_POST["txtNombre"]);   //trim elimina los espacios en blanco que deja el cliente
    $dni = trim($_POST["txtDni"]);
    $telefono = trim($_POST["txtTelefono"]);
    $correo = trim($_POST["txtCorreo"]);
    $nombreImagen= "" ;
    //creamos un array que contendra el listado de clientes

    if ($pos>= 0){ 
        
        //actualizo el array(cliente cargdo) existente
        $aClientes[$pos] = array(
            "nombre" => $nombre,
            "dni" => $dni,
            "telefono" => $telefono,
            "correo" => $correo,
            "imagen"=> $nombreImagen
        );

        //inserto un nuevo cliente.
    } else {
            
        $nombreAleatorio = date("Ymshmsi");
        $archivo_tmp = $_FILES["archivo"]["tmp_name"];
        $extension = pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION);





        $aClientes[] = array(
            "nombre" => $nombre,
            "dni" => $dni,
            "telefono" => $telefono,
            "correo" => $correo,
            "imagen"=>$nombreImagen
        );
    }

    //convertir el array en json indico la nuena variable jsonClientes y aplico la conversion de mi array

    $jsonClientes = json_encode($aClientes);

    //almacenar el sting jsonClientes en el "archivo.txt" almaceno con file_put_contents en el archivotxt la varible $jsonClientes

    file_put_contents("archivo.txt", $jsonClientes);
}




if (isset($_GET["do"]) && $_GET["do"] == "eliminar") {

//eliminar del array aClientes la posicion a borrar unset()
unset($aClientes[$pos]);

//Convertir el array en json
$aClientes = json_encode( $jsonClientes);



//Almacenar el json en el archivo
file_put_contents("archivo.txt", $jsonClientes);
 header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de clientes</title>
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
            <div class="col-6">

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="  pb-1">
                        <label for="txtNombre"> Nombre: * </label>
                        <input class="form-control" type="text" name="txtNombre" id="txtNombre" required value=" <?php echo isset($aClientes[$pos]) ? $aClientes[$pos]["nombre"]: ""; ?>">
                    </div>
                    <div class=" pb-1">
                        <label for="txtDni"> DNI: *</label>
                        <input class="form-control" type="text" name="txtDni" id="txtDni" required value=" <?php echo isset($aClientes[$pos]) ? $aClientes[$pos]["dni"]: ""; ?>">
                    </div>
                    <div class=" pb-1">
                        <label for="txtTelefono"> Telefono: *</label>
                        <input class="form-control" type="text" name="txtTelefono" id="txtTelefono" required value=" <?php echo isset($aClientes[$pos]) ? $aClientes[$pos]["telefono"]: ""; ?>">
                    </div>

                    <div class="pb-1">
                        <label for="txtCorrep"> Correo: *</label>
                        <input class="form-control" type="email" name="txtCorreo" id="txtCorreo" required value=" <?php echo isset($aClientes[$pos]) ? $aClientes[$pos]["correo"]: ""; ?>">
                    </div>
                    <div class="pb-1">
                        <label for="">Archivo adjunto</label>
                        <input type="file" name="archivo1" id="archivo1" accept=".jpg, .jpeg, .png">
                        <small class="d-block">Archivos admitidos: .jpg, .jpeg, .png</small>
                    </div>
                    <div class="pb-3">
                        <button class="btn btn-primary " type="submit" name="btnGuardar">Guardar</button>
                        <a href="index.php"> <button class="btn btn-danger" type="submit" name="btnNuevo">NUEVO </button></a>
                    </div>

                </form>
            </div>
            <div class="col-6">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>Imagen:</th>
                            <th>Nombre:</th>
                            <th>DNI:</th>
                            <th>Correo:</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($aClientes as $pos => $cliente) { ?>
                            <tr>
                                <td><?php  ?></td>
                                <td><?php echo $cliente["nombre"]; ?></td>
                                <td><?php echo $cliente["dni"]; ?></td>
                                <td><?php echo $cliente["correo"]; ?></td>
                                <td> <a href="index.php?pos=<?php echo $pos; ?> &do=editar"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a href="index.php?pos=<?php echo $pos; ?>&do=eliminar"><i class="bi bi-trash"></i></a></td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>

    </main>
</body>

</html>