<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        font-family: Calibri;
        font-size: 16px;
    }
</style>

<body>
    <?php
    // Funciones para contar caracteres de un texto
    $txt1 = "Mi nombre es Ëmmanuel";
    echo "<p>El texto '$txt1' tiene " . strlen($txt1) . " caracteres</p>"; // Cuenta todos los caracteres, incluyendo los dos puntos sobre la E

    $txt1 = "Mi nombre es Emmanuel";
    echo "<p>El texto '$txt1' tiene " . strlen($txt1) . " caracteres</p>";

    $txt1 = "Mi nombre es Ëmmanuel";
    echo "<p>El texto '$txt1' tiene " . mb_strlen($txt1) . " caracteres</p>";

    $txt1 = "Mi nombre es Emmanuel";
    echo "<p>El texto '$txt1' tiene " . mb_strlen($txt1) . " caracteres</p>";

    echo "<p>El texto '$txt1' tiene " . str_word_count($txt1) . " palabras</p>"; // Cuenta la cantidad de palabras que hay en el texto

    $txt1 = "Mi nombre es Emmanuél";
    echo "<p>El texto '$txt1' tiene " . str_word_count($txt1) . " palabras</p>";

    echo "<p>El texto '$txt1' tiene " . str_word_count($txt1, 0, "áéíóúÁÉÍÓÚ") . " palabras</p>";

    $texto = "tengo 10 árboles";
    echo str_word_count($texto, 0, "áéíóúÁÉÍÓÚÑñ0123456789") . "</p>";

    /* Para pasar mayúsculas */
    echo strtoupper("este texto lo quiero en mayúsculas") . "</p>";

    echo ucfirst("primera letra en mayúscula. de la oración") . "</p>";

    // Convirtiendo solo la primera letra en mayuscula
    $txt = "HOLA BUENOS DIAS";

    $lowerCase = strtolower($txt);
    echo ucfirst($lowerCase);

    $text4 = "<p>pRimeRa leTrade caDa paLabrA en MAy</p>";
    echo ucwords($text4, "UTF-8");

    $str = "tengo un árbol en mi jardín";

    // MB_CASE_UPPER, MB_CASE_LOWER, MB_CASE_TITLE
    $str_may = mb_convert_case($str, MB_CASE_UPPER, "UTF-8");
    echo $str_may . "<br><br>";
    $str_may = mb_convert_case($str, MB_CASE_LOWER, "UTF-8");
    echo $str_may . "<br><br>";
    $str_may = mb_convert_case($str, MB_CASE_TITLE, "UTF-8");
    echo $str_may . "<br><br>";
    ?>

    <?php
    $txt = "Hola soy Emmanuel";
    echo "<h2>Método mb_substr</h2>";
    echo "<p>mb_substr(txt, start, length, UTF-8) Extrae caracteres desde una posición dada, por ejemplo:</p>";
    echo "$txt<br>";
    echo "Extrayendo 3 caracteres desde la posición 5 -> ".mb_substr($txt, 5, 3, "UTF-8")."<br>";
    echo "Extrayendo 7 caracteres desde la posición 9 -> ".mb_substr($txt, 9, 8, "UTF-8")."<br>";
    ?>

    <?php
    echo "<h2>Métodos</h2>";
    $txt3 = "     Hola soy Emmanuel128 3 123123679  &/()  ";
    echo "<h3>Texto normal</h3>";
    echo "'" . $txt3 . "'<br>";
    echo "<h3>Método trim</h3>";
    echo "<p>Quita los espacios en blanco de los extremos de la oración</p>";
    echo "'" . trim($txt3) . "'<br>";
    echo "<h3>Método rtrim</h3>";
    echo "'".rtrim($txt3,"679")."'<br>";
    echo "<h3>Método ltrim</h3>";
    echo "'" . ltrim($txt3) . "'<br>";
    echo "<h3>Método rtrim con trim</h3>";
    echo "'" . rtrim(trim($txt3), "123") . "'<br>";

    $txt2 = "Debo comer más helado para estar sano";
    echo str_replace("helado", "verdura", $txt2) . "<br>";
    echo str_ireplace("helado", "verdura", $txt2) . "<br>";
    ?>

    <?php
    $fichero = "foto.gatito.bonito.jpg";
    echo strchr($fichero, ".") . "<br>";
    echo strrchr($fichero, ".") . "<br>";
    ?>
</body>

</html>