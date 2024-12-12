<?php
echo '<a href="archivo2.php?link">Ir al archivo2.php</a>';
echo "<br>";
if(isset($_GET["link"]) === "archivo2.php"){
    echo "a)Has entrado al archivo2.php";
}else{
    echo "b) Alguien ha intentado entrar al archivo2.php";
}
?>