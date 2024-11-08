<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería</title>
</head>
<body>
    <?php
        $imagenes = [
            "Mapache abrigao" => "https://pbs.twimg.com/media/E7KU5hZWUAIxlfu.jpg",
            "Mapaches alabando" => "https://i.pinimg.com/736x/85/4e/34/854e34797fedc2b6e3e097e36657b6ce.jpg",
            "Mapache comiendo" => "https://www.petlife.mx/u/fotografias/m/2023/5/9/f768x1-1824_1951_5050.jpg"
        ];

        foreach($imagenes as $titutlo => $url){
            echo "<h1>$titulo</h1>";
            echo "<img src='$url'";
        }
        

        echo "<a href='?index=$anterior'>Anterior</a> ";
        echo "<a href='index.php'>Inicio</a> ";
        echo "<a href='?index=$siguiente'>Siguiente</a>";
    ?>
</body>
</html>