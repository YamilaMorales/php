<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//DEFINICION DE CLASES  //solo los metodos son publicos, la clase madre es protected, lo demas private
class Persona {
protected $dni;
protected $nombre;
protected $edad;
protected $nacionalidad;

public function __construct( $dni="", $nombre="", $edad="", $nacionalidad="")
{
 $this->dni = $dni;   
}
//con set lo seteo con get accedo a la infortmacion

public function setNombre($nombre){ $this->nombre=$nombre;}
public function getNombre($nombre){ $this->nombre=$nombre;}


public function setNAcionalidad($nacionalidad){ $this->nacionalidad=$nacionalidad;}
public function getNacionalidad($nombre){ $this->nombre=$nombre;}

public function setDni($dni){$this->dni=$dni;}
public function getDni($nombre){ $this->nombre=$nombre;}

public function setEdad($edad){$this->edad=$edad;}
public function getEdad($nombre){ $this->nombre=$nombre;}


public function __destruct (){
    echo "Destruyendo el objeto" . $this->nombre . "<br>";
}
 
public function impimir (){}
}

class Alumno extends Persona {
    private $legajo;
    private $notaPortfolio;
    private $notaPhp;
    private $notaProyecto;


    public function __construct()
    {
        
        $this-> notaPortfolio = 0.0;
        $this-> notaPhp = 0.0 ;
        $this-> notaProyecto = 0.0;  
    
    }
    public function __destruct (){
        echo "Destruyendo el objeto" . $this->nombre . "<br>";
    }

    public function __get($propiedad){
        return $this->$propiedad;
    }
    
    public function __set( $propiedad, $valor){
        return $this-> $propiedad = $valor;
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
    private $Especialidad;
    const ESPECIALIDAD_WP = "wordpress";
    const ESPECIALIDAD_ECO= "Economia aplicada";
    const ESPECIALIDAD_BBDD = "Base de datos";


    public function __destruct (){
        echo "Destruyendo el objeto" . $this->nombre . "<br>";
    }

    public function __get($propiedad){
        return $this->$propiedad;
    }
    
    public function __set( $propiedad, $valor){
        return $this-> $propiedad = $valor;
    }
 
    public function impimir (){}
    public function imprimirEspecialidadesHabilitadas(){
        echo "Un doncente puede tener las siguientes especialidades";
        echo "Especialidad 1:" . self::ESPECIALIDAD_WP . "<br>"; 
        echo "Especialidad 2:" . self::ESPECIALIDAD_ECO . "<br>"; ; 
        echo "Especialidad 3:" . self::ESPECIALIDAD_BBDD . "<br>"; ; 
    }
}

//PROGRAMA

$alumno1= new Alumno();
$alumno1->setDni("4444666"); //accedo con set porque es privado
$alumno1->setNombre("Ana");
echo "El nombre es:" . $alumno1->getNombre();
$alumno1->notaPhp=8;
$alumno1->notaPortfolio=10;
$alumno1->notaProyecto=9;
$alumno1-> impimir();

$alumno2= new Alumno();
$alumno2->setDni( "55577774");
$alumno2->setNombre("Bernabe");
echo "El bombre es:" . $alumno2-> getNombre();
$alumno2-> notaPhp=9;
$alumno2-> notaProyecto=10;
$alumno2-> notaPortfolio=7;
$alumno2-> impimir();

$docente1= new Docente();
$docente1->nombre= "Juan Perez";
$docente1->especialidad= Docente:: ESPECIALIDAD_BBDD;

$docente1->imprimirEspecialidadesHabilitadas();

?>