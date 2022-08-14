<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (file_exists("archivo.txt")) {

    $jsonTareas = file_get_contents("archivo.txt");
    $aTareas = json_decode($jsonTareas, true);
} else {
    $aTareas = array();
}

$id = isset($_GET["id"]) && $_GET["id"] >= 0 ? $_GET["id"] : "";
//defino las variables que vienen del form.
if ($_POST) {
    $prioridad = $_POST["lstPrioridad"];
    $usuario = $_POST["lstUsuario"];
    $estado = $_POST["lstEstado"];
    $titulo = $_POST["txtTitulo"];
    $descripcion = $_POST["txtDescripcion"];


    if ($id >= 0){

        //edito un array

        $aTareas[$id] = array(
            "fecha" => $aTareas[$id]["fecha"],
            "prioridad" => $prioridad,
            "usuario" => $usuario,
            "estado" => $estado,
            "titulo" => $titulo,
            "descripcion" => $descripcion

        );
    } else {

        //creamos el array que contendra los datos de las tareas
        $aTareas[] = array(
            "fecha" => date("d/m/Y"),
            "prioridad" => $prioridad,
            "usuario" => $usuario,
            "estado" => $estado,
            "titulo" => $titulo,
            "descripcion" => $descripcion

        );
    }

    //convertir el array en jdon 
    $jsonTareas = json_encode($aTareas);

    //almacenar en el archivo.txt 

    file_put_contents("archivo.txt", $jsonTareas);
}

//para eliminar.

if (isset($_GET["do"]) && $_GET["do"] == "eliminar") {

    //eliminar del array la posicion a borrar unset()
    unset($aTareas[$id]);

    //Convertir el array en json
    $jsonTareas = json_encode($aTareas);

    //Almacenar el json en el archivo
    file_put_contents("archivo.txt", $jsonTareas);
    //header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>

    <main class="container">
        <div class="row p-5 ">
            <div class="col-12 text-center">
                <h1>Gestor de Tareas</h1>

            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <form action="" method="POST">

                    <div>
                        <label for="lstPrioridad">Prioridad</label>
                        <div>
                            <select name="lstPrioridad" id="lstPrioridad" class="form-control" >
                                <option value="" disabled selected>Seleccionar</option>
                                <option value="Alta" <?php echo isset($aTareas[$id]) && $aTareas[$id]["prioridad"] == "Alta" ? "selected" : ""; ?> >Alta</option>
                                <option value="Media" <?php echo isset($aTareas[$id]) && $aTareas[$id]["prioridad"] == "Media" ? "selected" : ""; ?>>Media</option>
                                <option value="Baja" <?php echo isset($aTareas[$id]) && $aTareas[$id]["prioridad"] == "Baja" ? "selected" : ""; ?>>Baja</option>
                            </select>
                        </div>
                    </div>


            </div>
            <div class="col-4">


                <div>
                    <label for="lstUsuario">Usuario</label>
                    <div>
                        <select name="lstUsuario" id="lstUsuario" class="form-control" >
                            <option value="" disabled selected>Seleccionar</option>
                            <option value="Ana" <?php echo isset($aTareas[$id]) && $aTareas[$id]["usuario"] == "Ana" ? "selected" : ""; ?> >Ana</option>
                            <option value="Bernabe" <?php echo isset($aTareas[$id]) && $aTareas[$id]["usuario"] == "Bernabe" ? "selected" : ""; ?>>Bernabe</option>
                            <option value="Daniela" <?php echo isset($aTareas[$id]) && $aTareas[$id]["usuario"] == "Daniela" ? "selected" : ""; ?>>Daniela</option>
                        </select>
                    </div>
                </div>


            </div>
            <div class="col-4">


                <div>
                    <label for="lstEstado">Estado</label>
                    <div>
                        <select name="lstEstado" id="lstEstado" class="form-control" >
                            <option value="" disabled selected>Seleccionar</option>
                            <option value="Sin Asignar" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "Sin Asignar" ? "selected" : ""; ?>>Sin asignar</option>
                            <option value="Asignado" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "Asignado" ? "selected" : ""; ?>>Asignado</option>
                            <option value="En Proceso" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "En Proceso" ? "selected" : ""; ?>>En proceso</option>
                            <option value="Terminado"<?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "Terminado" ? "selected" : ""; ?>>Terminado</option>
                        </select>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-12 p-2">
                    <label for="txtTitulo">Titulo</label>
                    <input type="text" name="txtTitulo" id="txtTitulo" class="form-control" required value=" <?php echo isset($aTareas[$id]) ? $aTareas[$id]["titulo"] : ""; ?>">

                </div>

            </div>
            <div class="row">
                <div class="col-12 p-2">
                    <label for="txtDescripcion">Descripcion</label>
                    <input type="text" name="txtDescripcion" id="txtDescripcion" class="form-control p-3" required value=" <?php echo isset($aTareas[$id]) ? $aTareas[$id]["descripcion"] : ""; ?>">

                </div>

            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary ">ENVIAR </button>

                <a href="index.php" class="btn btn-secondary ">Cancelar</a>
            </div>
            </form>
        </div>
        <?php if(count(($aTareas))):?>
        <div class="row">
            <div class="col-12 p-5">
                <table class="table table-hover border ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha de insercion</th>
                            <th>Prioridad</th>
                            <th>Titulo</th>
                            <th>Usuario</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($aTareas as $pos => $tarea) { ?>
                            <tr>
                                <td> <?php echo $pos ?></td>
                                <td> <?php echo $tarea["fecha"]; ?></td>
                                <td><?php echo $tarea["prioridad"]; ?></td>
                                <td><?php echo $tarea["titulo"]; ?></td>
                                <td><?php echo $tarea["usuario"]; ?></td>
                                <td><?php echo $tarea["estado"]; ?></td>
                                <td>
                                    <a href="index.php?id=<?php echo $pos ?>&do=editar"><i class="bi bi-pencil-square"></i></a>
                                    <a href="index.php?id=<?php echo $pos ?>&do=eliminar"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            
            </div>
              <?php else :?>
              <div class="col-6 offset-3 pt-3 text-center" >
                <div class="aletr alert-info p-2 border-radius" role="alert">
                    Aun no se han cargado tareas
                </div>

              </div>
             <?php endif; ?>
        </div>
    </main>


</body>

</html>