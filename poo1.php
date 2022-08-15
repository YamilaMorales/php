<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Persona {
public $dni;
public $nombre;
public $edad;
public $nacionalidad;
 
public function impimir (){}
}

class Alumno extends Persona {
    public $legajo;
    public $notaPortfolio;
    public $notaPhp;
    public $notaProyecto;


    public function _construc (){
        $this-> notaPortfolio = 0.0;
        $this-> notaPhp = 0.0 ;
        $this-> notaProyecto = 0.0;  
    
    }

    public function impimir (){
     echo "DNI: " . $this->dni . "<br>";
     echo "Nombre: " .$this->nombre .  "<br>";
     echo "Edad: " . $this->edad . "<br>";
     echo "Nacionalidad: " . $this->nacionalidad . "<br>";
     echo "Nota Portfolio: " . $this->notaPortfolio . "<br>";
     echo "Nota PHP: " . $this->notaPhp . "<br>";
     echo "Nota Proyecto: " . $this->notaProyecto . "<br>";
     echo "Promedio: " . $this->calcularPromedio() . "<br>";
    }
    public function calcularPromedio(){
         $promedio = 0;
         $promedio= ($this->notaPortfolio + $this->notaProyecto + $this->notaPhp)/3;
        return $promedio;
    }
    
}







class Docente extends Persona {
    public $Especialidad;

    public function impimir (){}
    public function imprimirEspecialidadesHabilitadas(){}
}



$alumno1= new Alumno();
$alumno1->dni="4444666";
$alumno1->nombre="Ana";
$alumno1->notaPhp=8;
$alumno1->notaPortfolio=10;
$alumno1->notaProyecto=9;


?>