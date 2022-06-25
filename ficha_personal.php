 <?php
 $nombre= "Yamila Morales";
 $fecha= date("d/m/Y");
 $edad=28;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ficha_personal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col 12 text-center p-5">
                <h1> Ficha personal</h1>
            </div>
        </div>
        <table class="table table-hover border">
            <tbody>
                <tr>
                    <th>Fecha:</th>
                    <td> <?php echo $fecha ?> </td>
                </tr>
                <tr>
                    <th>Nombre y Apellido:</th>
                    <td> <?php echo $nombre ?></td>
                </tr>
                <tr>
                    <th>Edad:</th>
                    <td> <?php echo $edad ?></td>
                </tr>
                <tr>
                    <th>Peliculas favoritas:</th>
                    <td>El conjuro <br> Titanic</td>
                </tr>

            </tbody>
        </table>
    </main>
</body>

</html>