<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aPacientes = array();
$aPacientes[] = array(
    "dni" => "33.765.012",
    "nombreyapellido" => "Ana Acuña",
    "edad" => "45",
    "peso" => "81.5",  
);
$aPacientes[] = array(
    "dni" => "23.684.385",
    "nombreyapellido" => "Gonzalo Bustamante",
    "edad" => "66",
    "peso" => "79",  
);
$aPacientes[] = array(
    "dni" => "37.865.236",
    "nombreyapellido" => "Juan Irraola",
    "edad" => "28",
    "peso" => "60",   
);
$aPacientes[] = array(
    "dni" => "26.584.966",
    "nombreyapellido" => "Breatriz Ocampo",
    "edad" => "50",
    "peso" => "75",  
);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado_productosbucle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col 12 text-center p-5">
                <h1>Listado de pacientes</h1>


            </div>

        </div>
        <table class="table table-hover border">
            <thead>
                <tr>
                    <th>DNI</th>
                    <th>Nombre y Apellido</th>
                    <th>Edad</th>
                    <th>Peso</th>
                </tr>
            </thead>
            <tbody>

            <?php
                

               foreach ($aPacientes as $aPacientes) {

                
            ?>

                <tr>
                    <td> <?php echo $aPacientes[$i]["dni"]; ?> </td>
                    <td> <?php echo $aPacientes[$i]["nombreyapellido"]; ?> </td>
                    <td> <?php echo $aPacientes[$i]["edad"]; ?> </td>
                    <td> <?php echo $aPacientes[$i]["peso"] ; ?> </td>
                    
                    
                </tr>
                <?php
                
                }  ?>
          
            </tbody>
        </table>    
         <div class="row">
            <div class="col-12">
              

            </div>

         </div>
    </main>
</body>
</html>