<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


function CalcularAreaRect($base, $altura)
{
$resultado = $base * $altura;
return $base * $altura; 
}




//uso 
echo "El area es "  . CalcularAreaRect (100, 0.60) . "<br>" ;
echo "El area es "  . CalcularAreaRect (800, 300);
 

?>