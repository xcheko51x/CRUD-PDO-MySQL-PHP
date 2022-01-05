<?php

$host = 'localhost';
$dbUsuario = 'root';
$dbContrasena = '';
$dbNombre = 'pruebas';
$opciones = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'",
    PDO:: ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
);

try {
    $conexion = new PDO("mysql:host=".$host.";dbname=".$dbNombre,$dbUsuario,$dbContrasena, $opciones);
    echo "CONEXION EXITOSA";
} catch(PDOException $e){
    echo "Error: ".$e->getMessage();
    die();
}