<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function calcularNeto($bruto){

    
    return ($bruto - ($bruto * 0.17) );
}


//uso

echo "El sueldo Neto es $ "  . calcularNeto(80000);
?>