<?php

header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$resultado=[];

include "conexionGhoner.php";
$consulta = "SELECT * FROM plan_trabajo_sugerencias ORDER BY num_actividad ASC";
$query = mysqli_query( $conexion, $consulta);
while ($datos = mysqli_fetch_array($query)){

    $resultado[] = $datos;

}

echo json_encode($resultado);
?>