<?php
if(isset($_GET)){
    $idContinente = $_GET["idContinente"];
}else{
    header("Location:index.php");
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
    <?php
    include_once("cnn.php");
    $sql= "SELECT * FROM CONTINENTE WHERE CONT_ID = ?;";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i",$idContinente);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows>0){
        $continente = $result->fetch_row();
    }
    $stmt->close();
    $conexion->close();


    ?>

    <h1>PAISES DE <?php echo $continente[1];?></h1>

    <p><a href="index.php">Regresar al Continentes</a> | <a href="pais_vista.php">Crear Pais</a></p>
    <table>
        <tr>
            <th>Pais </th>
            <th>Opciones </th>
        </tr>
        <tr>
            <td>Ecuador </td>
            <td>Actualizar | Eliminar </td>
        </tr>
        <tr>
            <td>Peru </td>
            <td>Actualizar | Eliminar </td>
        </tr>
    </table>
</body>
</html>

