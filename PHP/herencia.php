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

<?php
// Modificiadores de acceso 
// public ---> Se pueden modificar desde cualquier lugar 
// private ---> Solo se puede acceder dentro de la clase
// protected ---> Solo se puede acceder dentro de la clase y por clases heredadas

class Persona{
    public $nombre;
    private $edad;
    protected $email;

    public function __construct($nombre,$edad,$email){
        $this -> nombre = $nombre;
        $this -> edad = $edad;
        $this -> email = $email;
    }

    public function saludar(){
        return "Hola, soy ".$this->nombre."<br>";
    }

    public function obtenerEdad(){
        return $this->edad;
    }
}

$persona = new Persona("Emmanuel",25,"emmnauel2899@gmail.com");

echo $persona->saludar();
echo $persona->obtenerEdad();

// echo $persona->edad;  ----> Me da error al momento de compilar ya que solo se puede acceder dentro de la clase
// echo $persona->email; ----> Me da error ya que no se puede acceder a ese dato (dentro de la clase o utilizando herencia)
// ["key" => "value"] --> array asociativo
?>

