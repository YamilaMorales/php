<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);$_COOKIE;



function promediar($aNotas){
    $sumaTotal = 0;
    
    foreach($aNotas as $nota){
        $sumaTotal = ($sumaTotal + $nota);
    }
    $promedio=  $sumaTotal / count($aNotas);
    return $promedio;
     }

  
    



$aAlumnos = array( );
$aAlumnos[ ]= array("nombre"=> "Ana Valle", "notas" => array ( 7, 8));  
$aAlumnos[ ]= array( "nombre"=> "Bernabe Paz","notas" => array ( 5, 7));
$aAlumnos[ ]= array("nombre"=> "Sebastian Aguirre", "notas" => array ( 6, 9));
$aAlumnos[ ]= array("nombre"=> "Monica Ledesma","notas" => array ( 9, 9));
 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    
<main class="container">
<div class="row">
<div class="col-12 p-5 text-center">
<h1>Actas</h1>
</div>
</div>
<div class="row">
    <div class="col-12">
        <table class="table table-hover border">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Nota 1</th>
                    <th>Nota 2</th>
                    <th>Promedio</th>
                </tr>
            </thead>
            <tbody>
            <?php  foreach($aAlumnos as $alumno){ ?>
                <tr>
                
                    <td> <?php echo $alumno ["nombre"] ?> </td>
                    <td><?php echo $alumno ["notas"][0] ?></td>
                    <td><?php echo $alumno ["notas"][1] ?></td>
                    <td> <?php echo promediar($alumno["notas"]);?> </td>
            
                </tr>
                <?php } ?>
        
            </tbody>

        </table>
        
    </div>
    <div class="row">
    
        <div class="col-12"></div>
       <?php $promedio=0;
         $promedio += $promed  
           ?>
         <?php foreach($promedio as $promed){ ?>
               
        <p>Promedio de la cursada: <?php echo promediar($promed / count (["notas"])); ?>?> </p>
      <?php } ?>
    </div>

</div>
</main>
</body>
</html>