<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Spotifai</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }
    .square{
        border: 2px solid rgb(42, 42, 42);
        border-radius: 12px;
        padding: 50px;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background: linear-gradient(black,rgb(42, 42, 42));
    }

    .container {
        width: 320px;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .square1{ /*Centrando el logo y titulo login*/
        align-items: center;
        display: flex;
        flex-direction: column;
        margin: 2rem;
        gap: 0.75rem;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    label {
        text-align: left;
        font-size: 14px;
        font-weight: bold;
    }

    input {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        outline: none;/*Para quitar el borde negro al hacer clic enel botón */
    }

    .botones {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }

    .btn {
        flex: 1;
        padding: 8px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
    }

    .btn:first-child {
        background-color: rgb(30, 215, 96);
        margin-right: 5px;
    }

    .btn:last-child {
        background-color: rgb(30, 215, 96);
    }

    .btn:hover {
        background-color: rgb(68, 227, 124);
    }
</style>
<body>
    <div class="square">
        <div class="square1">
            <a href="#"><img src="./logo-spotify.png" height="50px" width="50px"></a>
            <p style="color:white;text-align:center"><b>Login in to Spotify</b></p>
        </div>
        <div class="square2" style="color:white">
            <form name="formularioBody" action="POST">
                <label><b>Email</b></label>
                <input type="email" placeholder="Email" autofocus required>
                <label><b>Password</b></label>
                <input type="password" placeholder="Password" required>

                <div class="botones">
                    <input class="btn" style="color:black;" type="submit" name="enviar" value="Log In">
                    <input class="btn" style="color:black" type="reset" value="Borrar">
                </div>
            </form>
        </div>
    </div>
    <?php

    ?>
</body>
</html>