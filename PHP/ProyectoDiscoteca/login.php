<?php 
$pageTitle = "Login";
require("./Template/body.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    require_once("./LoginUser/index.php");

    $email = $_POST["email"];
    $password = $_POST["password"];

    userAuthenticate($email,$password);

    if(isset($_SESSION["user"])){
        header("Location: ./home.php");
    }
}
?>
    <div class="square">
        <div class="square1">
            <a href="#"><img src="./logo-spotify.png" height="50px" width="50px"></a>
            <p style="color:white;text-align:center"><b>Login in to Spotify</b></p>
        </div>
        <div class="square2" style="color:white">
            <form name="formularioBody" method="POST" action="login.php" enctype="application/x-www-form-urlencoded">
                <label for="email"><b>Email</b></label>
                <input id="email" name="email" type="email" placeholder="Email" autofocus required>

                <label for="password"><b>Password</b></label>
                <input id="password" name="password" type="password" placeholder="Password" required>

                <div class="botones">
                    <input class="btn" style="color:black;" type="submit" name="enviar" value="Log In">
                    <input class="btn" style="color:black" type="reset" value="Borrar">
                </div>
            </form>
        </div>
    </div>
<?php require("./Template/footer.php") ?>   