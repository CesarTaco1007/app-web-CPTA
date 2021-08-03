<?php

if(isset($_COOKIE['cookie_nombre']) && isset($_COOKIE['cookie_clave'])){
    $nombre = $_COOKIE["cookie_nombre"];
    $clave = $_COOKIE["cookie_clave"];
    $check = "checked";
}else{
    $clave="";
    $nombre="";
    $check= "";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>LOGIN A TIENDA DE PRODUCTOS</h1>

    <form action="autorizar.php" method="POST">
        <label for="usuario">Usuario:</label><br>
        <input id="usuario" type="text" name="nombre" value="<?php echo $nombre; ?>"><br>
        <label for="clave">Password:</label><br>
        <input id="clave" type="password" name="clave" value="<?php echo $clave; ?>"><br>
        <input type="checkbox" name="recordarme" <?php echo $check;?> >Recordarme <br>
        <input type="submit" value="Entrar">
    </form>
</body>
</html>