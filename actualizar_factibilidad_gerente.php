<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);

$id=$variables['id'];
$respuesta=$variables['respuesta'];
$status_actual = $variables['status_actual'];
$motivo = $variables['motivo'];

include "conexionGhoner.php";

if($respuesta == "Factible"){
        $status_nuevo = "En Factibilidad";
        $puntos_factibilidad = 5;
}else if($respuesta == "No Factible"){
        $status_nuevo = $status_actual;
        $puntos_factibilidad = 0;
}

$update = "UPDATE concentrado_sugerencias SET motivo_gerente = '$motivo', respuesta_analista='$respuesta',  VoBo_gerente = 'SI', status = '$status_nuevo', puntos_factible = '$puntos_factibilidad'
WHERE id = '$id'";
$query = mysqli_query( $conexion, $update);
$resultado = $query;

echo json_encode($resultado);
?>