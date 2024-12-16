<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
include "conexionGhoner.php";

$resultado = "";

$descripcion = $variables['descripcion'];
$tipoHallazgo = $variables['tipo'];
$planta = $variables['planta'];
$area = $variables['area'];
$user = $_SESSION['usuario'];


$insertar = "INSERT INTO seguridad_syma (numero_nomina, descripcion_hallazgo, tipo_hallazgo, planta, area) 
    VALUES ('$user','$descripcion','$tipoHallazgo','$planta','$area')";
$query = mysqli_query($conexion, $insertar);
if ($query) {
    
    $ultimoId = mysqli_insert_id($conexion);  //Ultimo ID
    $resultado = [
        "success" => true,
        "ultimo_id" => $ultimoId
    ];
} else {
    $resultado = [
        "success" => false,
        "error" => mysqli_error($conexion) 
    ];
}


echo json_encode($resultado);
