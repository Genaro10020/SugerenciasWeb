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
$fechaHoy = date('Y-m-d H:m:s');


$insertar = "INSERT INTO seguridad_syma (numero_nomina, descripcion_hallazgo, tipo_hallazgo, planta, area, fecha_hallazgo,status) 
    VALUES ('$user','$descripcion','$tipoHallazgo','$planta','$area','$fechaHoy','Sin Atender')";
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
