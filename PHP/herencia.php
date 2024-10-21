<?php
class Animal{
    public $nombre;

    public function __construct($nombre){
        $this->nombre = $nombre;
    }

    public function hacerSonido(){
        return "El animal hace sonido.";
    }
}

// Aquí utilizo la herencia
class Perro extends Animal{
    public function hacerSonido(){
        return "Guau!";
    }
}

class Gato extends Animal{
    public function hacerSonido(){
        return "Miau!";
    }
}

$perro = new Perro("Cliford");
$gato = new Gato("Harry");

echo "Mi perro ".$perro->nombre." hace ".$perro->hacerSonido()."<br><br>";
echo "Mi gato ".$gato->nombre." hace ".$gato->hacerSonido();
?>