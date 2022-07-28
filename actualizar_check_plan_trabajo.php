<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);

$id_concentrado=$variables['id_concentrado'];
$check=$variables['check'] ;

include "conexionGhoner.php";

        $actualizar = "UPDATE plan_trabajo_sugerencias SET check_mejora_continua='$check' WHERE id_concentrado = '$id_concentrado'";
        $query = mysqli_query( $conexion, $actualizar);
        $resultado = $query;
 

echo json_encode($resultado);
?>