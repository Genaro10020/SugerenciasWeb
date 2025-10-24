<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);

$seccion=$variables['seccion_id'];
$id=$variables['id_resp'];

include "conexionGhoner.php";

    $actualizar = "UPDATE responsables_secciones_syma SET id_seccion='$seccion'
    WHERE id='$id'";
    $query = mysqli_query( $conexion, $actualizar);
    $resultado = $query; 

echo json_encode($query);
?>