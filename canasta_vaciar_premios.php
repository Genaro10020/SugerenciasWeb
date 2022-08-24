<?php
error_reporting(0);
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
include "conexionGhoner.php";
$resultado ="";
$numero_nomina = $variables['numero_nomina'];

$delete = "DELETE FROM canjer_premios_colaborador_sugerencias WHERE numero_nomina = '$numero_nomina' AND status ='Sin aceptar'";
$query = mysqli_query( $conexion, $delete);
$resultado=$query;
echo json_encode($resultado);
?>