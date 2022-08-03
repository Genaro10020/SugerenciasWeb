<?php

header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$resultado=[];
$id_concentrado=$variables["id_concentrado"];
include "conexionGhoner.php";
$consulta = "SELECT * FROM plan_trabajo_sugerencias WHERE id_concentrado='$id_concentrado' ORDER BY num_actividad ASC";
$query = mysqli_query( $conexion, $consulta);
while ($datos = mysqli_fetch_array($query)){

    $resultado[] = $datos;

}

echo json_encode($resultado);
?>