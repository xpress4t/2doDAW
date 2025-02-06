<?php
    echo "<h2 style='color:orange'>Tipos de variables</h2>";
    echo "Hola Mundo";
    $myString = 6;
    echo "<br><br>".$myString." es un ".gettype($myString);

    $myString = "Emmanuel";
    $my_int = 5;
    // 5 + 2
    $my_int = $my_int + 2;
    echo "<br><br>";
    echo $my_int;
    echo "<br><br>";
    echo $my_int - 9;
    echo "<br><br>";
    $my_double = 8.5;
    // echo $myString + $my_int + $my_double; --> me da error ya que no se pueden sumar strings y enteros
    $my_bool = true;
    echo gettype($my_bool);
    echo "<br><br>";

    // Constantes
    const MY_CONST = "Valor de la constante";
    echo MY_CONST;
    echo "<br><br>";

    // Listas
    echo "<h2 style='color:red'>Listas</h2>";
    $lista = [$myString,$my_int,$my_double,$my_bool];
    foreach($lista as $i){
        echo "<br>";
        echo $i." es de tipo ". gettype($i)."<br>";
    }
    echo "<pre>";
    print_r($lista);
    echo "</pre>";
    echo gettype($lista['0']);
    
    //Diccionarios 
    echo "<h2 style='color:green'>Diccionarios</h2>";
    $my_dict = array(
        "string" => "hola mundo", 
        "int" => 5, 
        "string" => $myString, // Ahora el "string" tomará el valor de $myString
        "int" => $my_int, // De igual manera para el "int", se sobrescribe el valor
        "bool" => $my_bool
    );
    echo "<pre>"; // Etiqueta "pre" para que los valores no se impriman en una sola línea
    print_r($my_dict);
    echo "</pre>";
    // echo $my_dict; --> me da error
    echo $my_dict["int"]; // Imprime 7, que es el último valor que ha obtenido el int
    // Imprime el último valor ya que las claves de un array son únicas

    echo "<h2 style='color:blue'>Clases y Objetos</h2>";

    class MyClass{
        public $name;
        public $age;

        // Función constructora
        // A esta función, le puedo agregar más funciones o propiedades
        function __construct($name,$age){
            $this -> name = $name;
            $this -> age = $age;
        }
    }

    // Declarando mi objeto
    $objeto_1 = new MyClass("Emmanuel",25);
    $objeto_2 = new MyClass("Alanis",21);
    echo "<pre>";
    print_r($objeto_1);
    print_r($objeto_2);
    echo "</pre>";

    echo $objeto_1 -> name."<br>"; // Acá name tiene el valor de Emmanuel
    $objeto_1 -> name = "Ismael"; 
    // Con esto cambio el valor del parámetro name, cambia de Emmanuel a Ismael
    echo $objeto_1 -> name."<br>";
    // Puedo hacer lo mismo para la variable age
    echo $objeto_1 -> age."<br>";
    echo gettype($objeto_1);
    echo "<br><br>";

    function generarCadenaAleatoria($longitud = 10) {
        $caracteres = 'ª!"·$%&/()=?¿^*¨Ç_:;º|@#~€¬[]{}<>0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $cadena_aleatoria = '';
        for ($i = 0; $i < $longitud; $i++) {
            $cadena_aleatoria .= $caracteres[mt_rand(0, strlen($caracteres) - 1)];
        }
        return $cadena_aleatoria;
    }
    echo generarCadenaAleatoria(10);
?>