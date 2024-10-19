<?php
    echo "El método strtoupper convierte todo el strin en mayúsculas. <br><br>";
    $cadena = "cadena de prueba";
    echo strtoupper($cadena);

    echo "POO en PHP <br><br>";
    
    class Persona{
        public $nombre;
        public $edad;

        public function __construct($nombre,$edad){
            $this -> nombre = $nombre;
            $this -> edad = $edad;
        }

        public function saludar(){
            return "Mi nombre es ".$this->nombre." y tengo ".$this->edad." años. <br><br>";
        }
    }

    $persona1 = new Persona("Emmanuel",25);
    $persona2 = new Persona("Alanis",21);
    $persona3 = new Persona("Jacob",7);

    echo $persona1 -> saludar();
    echo $persona2 -> saludar();
    echo $persona3 -> saludar();



    class Pelicula{
        public $titulo;
        public $añoDePublicacion;
        public $director; 

        public function __construct($titulo,$añoDePublicacion,$director){
            $this -> titulo = $titulo;
            $this -> añoDePublicacion = $añoDePublicacion;
            $this -> director = $director;
        }

        public function informacion(){
            return $this->titulo." se estrenó en el año ".$this->añoDePublicacion." dirigida por ".$this->director.".<br><br>";
        }
    }

    $pelicula1 = new Pelicula("La Naranja Mecánica",1972,"Stanley Kubrick");
    $pelicula2 = new Pelicula("El Resplandor",1980,"Stanley Kubrick");

    echo $pelicula1 -> informacion();
    echo $pelicula2 -> informacion();

?>