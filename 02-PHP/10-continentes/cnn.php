<?php
$host = "localhost";
$usuario = "root";
$clave = "mysql2020";
$db = "testcontinente";

$conexion = new mysqli($host, $usuario, $clave, $db) or die($conexion->connect_errno);
?>