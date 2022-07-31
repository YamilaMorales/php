<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$iva = 21;
$sinIva = 0;
$conIva = 0;
$ivaCantidad = 0;

if ($_POST){ /*pregunta*/
    $iva = $_POST["lstIva"]; /*nombro las variables =nomb que name*/
    $sinIva = ($_POST["txtSinIva"]) > 0 ? $_POST["txtSinIva"]: 0; /*postsinivaes>0?(no esta vacio)si,entocesposttxtsiniva:(sino) txt sinIva es0*/
    $conIva = ($_POST["txtConIva"]) > 0 ? $_POST["txtConIva"]: 0;

    //dado un importe sin-iva precioconiva= ala cuenta//
    if ($sinIva > 0) {
        $conIva = $sinIva * ($iva / 100 + 1);
    }
    if ($conIva > 0) {
        $sinIva = $conIva / ($iva / 100 + 1);
    }
    $ivaCantidad =   $conIva - $sinIva ;
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IVA </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center p-5">
                <h1>Calculadora de IVA</h1>

            </div>

        </div>
        <div class="row">
            <div class="col-3 offset-3">
                <form action="" method="POST">
                    <div class=" pt-5">
                        <div class="pb-3">
                            <label for=""> IVA:</label>
                            <select name="lstIva" id="lstIva">
                                <option value="10.5">10.5</option>
                                <option value="19">19</option>
                                <option value="21" selected>21</option>
                                <option value="27">27</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <div class="pb-3">
                            <label for="txtSinIva">Precio sin IVA:</label>
                            <input type="number" name="txtSinIva" id="txtSinIva" class="form-control">
                        </div>
                    </div>
                    <div>
                        <div class="pb-3">
                            <label for="txtConIva">Precio con IVA:</label>
                            <input type="number" name="txtConIva" id="txtConIva" class="form-control">
                        </div>
                    </div>
                    <div class="pb-3">
                        <button class="btn btn-primary " type="submit">CALCULAR</button>
                    </div>
                </form>

            </div>

            <div class="col-5 p-5">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>IVA: </th>
                            <td> <?php echo $iva; ?> % </td>
                        </tr>
                        <tr>
                            <th>Precio sin IVA:</th>
                            <td><?php echo number_format($sinIva, 2, ".", ","); ?> </td>
                        </tr>
                        <tr>
                            <th>Precio con IVA:</th>
                            <td><?php echo number_format($conIva, 2, ".", ","); ?> </td>
                        </tr>
                        <tr>
                            <th>IVA cantidad:</th>
                            <td> <?php echo number_format($ivaCantidad, 2, ".", ","); ?> </td>
                        </tr>
                    </thead>
                </table>

            </div>



        </div>

    </main>
</body>

</html>