<?php

$host = "localhost";
$usuario = "root";
$clave = "mysql2020";
$db = "testcontinente";

$conexion = new mysqli($host, $usuario, $clave, $db) or die($conexion->connect_errno);

// INSERCION ******************+
/*
$sql = "INSERT INTO CONTINENTE (CONT_NOMBRE) VALUES (?)"; //PREPARED STATEMENT
$nombreContinente = "AMERICA";

if($stmt = $conexion->prepare($sql)){
    //Enlazamos parámetros
    $stmt->bind_param("s",$nombreContinente);
    //Ejecutamos
    if(!$stmt->execute()){
        echo "ERROR: INSERCION";
    }
    $stmt->close();
}
$conexion->close();
*/
// CONSULTAR SIN PREPARED STATEMENT *****************
$sql = "SELECT CONT_ID, CONT_NOMBRE FROM CONTINENTE";
if(!$resultado = $conexion->query($sql)){
    die("LA CONSULTA FALLÓ");
}else{
    if($resultado->num_rows === 0){
        echo "NO existen resultados";
    }else{
        while($continente = $resultado->fetch_assoc()){
            echo $continente['CONT_ID']." - ". $continente['CONT_NOMBRE']. "<br>";
        }
    }
}
$conexion->close();

// CONSULTAR CON PREPARED STATEMET *******************
/*
$sql = "SELECT CONT_ID, CONT_NOMBRE FROM CONTINENTE WHERE CONT_ID=?";
$idContinente = 1;
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $idContinente);
$stmt->execute();
$result = $stmt->get_result();
$numeroFilas = $result->num_rows;
if($numeroFilas>0){
    while($row = $result->fetch_assoc()){
        echo "ID: ". $row['CONT_ID']. "<br>";
        echo "NOMBRE: ". $row['CONT_NOMBRE']. "<br>";
    }
}
$stmt->close();
//$conexion->close();
*/
// UPDATE ********************
/*
$sql = "UPDATE CONTINENTE SET CONT_NOMBRE = ? WHERE CONT_ID= ?;";
$nombreContinente = "ATLANTIDA";
$idContinente=1;

if($stmt = $conexion->prepare($sql)){
    $stmt->bind_param("si",$nombreContinente, $idContinente);
    if(!$stmt->execute()){
        die("ERROR: UPDATE");
    }
    $stmt->close();
}else{
    die("UPDATE NO PREPARADO");
}
$conexion->close();
*/
// DELETE ********************
/*
$sql = "DELETE FROM CONTINENTE WHERE CONT_ID= ?;";
$idContinente= 1;

if($stmt= $conexion->prepare($sql)){
    $stmt->bind_param("i", $idContinente);
    if(!$stmt->execute()){
        die("ERROR: DELETE");
    }
    $stmt->close();
}else{
    die("DELETE MAL PREPARADO");
}
$conexion->close();
*/
?>