<!DOCTYPE html>
<html>
<head>
    <style>
        h1{
            text-align: center;
        }
        table{
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
        }
        td,th{
            border: 2px solid black;
            text-align: center;
            padding: 8px;
            background-color: #0bc203;
        }
    </style>
</head>
<body>
    <h1>Problema de los 100 prisioneros</h1>
    <table>
        <?php
        $numeros=range(1,100);
        $indice=0;
        shuffle($numeros);
        $prisionero=1;
        for ($fila=0;$fila<10;$fila++) {
            echo "<tr>";
            for ($columna=0;$columna<10;$columna++) {
                echo "<td><input type='checkbox'>".$numeros[$indice]."</td>";
                $indice++;
            }
            echo "</tr>";
        }
        
        ?>
    </table>
</body>
</html>
