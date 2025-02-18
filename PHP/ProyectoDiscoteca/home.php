<?php 
$pageTitle = "Home";
require("./Template/body.php");

if (!isset($_SESSION["user"])) {
    header('Location: ./index.php');
    return;
}

$user = $_SESSION["user"];

?>
<div>
    <h1>Bienvenido <?php echo $user["email"] ?></h1>
</div>
<?php require("./Template/footer.php") ?>   