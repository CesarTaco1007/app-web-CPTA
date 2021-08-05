<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Continentes</title>
</head>

<body>

    <?php
    include_once("cnn.php");

    $sql = "SELECT CONT_ID, CONT_NOMBRE FROM CONTINENTE";
    if (!$resultado = $conexion->query($sql)) {
        die("LA CONSULTA FALLÓ");
    } else {
        if ($resultado->num_rows === 0) {
            echo "NO existen resultados";
        } else {
            echo "<ul>";
            while ($continente = $resultado->fetch_assoc()) {
                echo '<li><a href="paises_vista.php?idContinente='.$continente['CONT_ID'].'">'.$continente['CONT_NOMBRE'].'</a></li>';
            }
            echo "</ul>";
        }
    }
    $conexion->close();
    ?>
</body>

</html>