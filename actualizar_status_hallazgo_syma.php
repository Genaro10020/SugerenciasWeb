<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);

$accion=$variables['accion'];
$id=$variables['id'];

include "conexionGhoner.php";

        $actualizar = "UPDATE seguridad_syma SET status='$accion'
        WHERE id='$id'";
        $query = mysqli_query( $conexion, $actualizar);
        $resultado = $query;

echo json_encode($resultado);
?>