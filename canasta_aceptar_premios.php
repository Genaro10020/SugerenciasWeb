<?php
error_reporting(0);
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$resultado ="";
$numero_nomina = $variables['numero_nomina'];
include "conexionGhoner.php";

$consulta = "UPDATE canjer_premios_colaborador_sugerencias SET status='Pte. Solped' WHERE numero_nomina = '$numero_nomina' AND status='Sin Aceptar'";
$query = mysqli_query( $conexion, $consulta);
$resultado = $query;
echo json_encode($resultado);
?>