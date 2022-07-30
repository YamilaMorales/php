<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


function maximo($aVector)  {
$maximo = 0;
    foreach ( $aVector as $valor)  {
       if($maximo < $valor ) {
          $maximo = $valor;
        }
    } 
    return $maximo;

}

$aNotas = array(8, 4, 5, 3, 9, 1, 10);
echo "El valor maximo es: " . maximo ($aNotas) . "<br>";

?> 