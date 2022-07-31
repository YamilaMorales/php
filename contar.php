<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//Definicion / lista de elemntos lo tengo que recorrer con algun bucle. foreach es el mas inteligente 

function contar($aArray ){
  $contador= 0;
  foreach($aArray as $item){
    $contador++;
   } 
   return $contador;  
}

//uso 


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
$aProductos = array();
$aProductos[] = array(
    "nombre" => "Smart TV 55\" 4K UHD",
    "marca" => "Hitachi",
    "modelo" => "554KS20",
    "stock" => "60",
    "precio" => "58000"
);
$aProductos[] = array(
    "nombre" => "Samsung Galaxy A30 Blanco",
    "marca" => "Samsung",
    "modelo" => "Galaxy A30",
    "stock" => "0",
    "precio" => "22000"
);
$aProductos[] = array(
    "nombre" => "Aire Acondicionado Spllit Inverter Frio/Calor Surrey 2900F",
    "marca" => "Surrey",
    "modelo" => "553AIQ1201E",
    "stock" => "5",
    "precio" => "45000"
);
 
$aNotas= array( 9, 8, 9.50, 4, 7, 8);

echo " <br> Cantidad de Productos: " . contar($aProductos);
echo "<br> Cantidad de Pacientes: " . contar($aPacientes);
echo "<br> Cantidad de Notas: "  . contar($aNotas);


?>