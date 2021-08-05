<?php
session_start();

if($_SESSION["session_nombre"]){
    $nombre = $_SESSION["session_nombre"];
}else{
    header("Location: index.php");
}

function leerArchivo(){
    //Obtener paramtro de lenguaje (lang)
    $lang="en";
    if(isset($_GET['lang'])){
        $lang=$_GET['lang'];
        setcookie("cookie_idioma", $lang, time()+60*60*24);
    }else{
        if(isset($_COOKIE['cookie_idioma'])){
            $lang = $_COOKIE['cookie_idioma'];
        }
    }
    echo $titulo = ($lang==="en")? "<h2>Product List</h2>":"<h2>Lista de Productos</h2>";
    
    //Leer fichero correspondiente
    $file = ($lang==="en")?"categorias_en.txt":"categorias_es.txt";
    
    $fp = fopen($file, "r");
    while($line = fgets($fp)){
        echo $line . "<br>";
    }
    fclose($fp);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Principal de Tienda</title>
</head>
<body>
    <h1>PANEL PRINCIPAL</H1>
    <p>Bienvenido Usuario: <?php echo $nombre; ?></p>
    <a href="cerrarsesion.php">Salir</a><br><br>

    <a href="panel_principal.php?lang=es">ES (Español)</a> | <a href="panel_principal.php?lang=en">EN (English)</a>

    <?php leerArchivo(); ?>
</body>
</html>