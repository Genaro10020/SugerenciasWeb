<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
include "conexionGhoner.php";

$resultado="";

$descripcion = $variables['descripcion'];
$tipoHallazgo=$variables['tipo'];
$planta=$variables['planta'];
$area=$variables['area'];
$user = $_SESSION['usuario'];


    $insertar = "INSERT INTO seguridad_syma (numero_nomina, descripcion_hallazgo, tipo_hallazgo, planta, area) 
    VALUES ('$user','$descripcion','$tipoHallazgo','$planta','$area')";
    $query = mysqli_query( $conexion, $insertar);
    $resultado=$query;

echo json_encode($resultado);
?>