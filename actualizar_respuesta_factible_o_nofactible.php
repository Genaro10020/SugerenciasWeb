<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);

$id_concentrado=$variables['id_concentrado'];
$respuesta=$variables['respuesta'] ;

if ($respuesta=="Factible") {
        $puntos_factible=5;
}else{
        $puntos_factible=0;
}

include "conexionGhoner.php";

        $actualizar = " UPDATE concentrado_sugerencias SET respuesta_analista='$respuesta', puntos_factible='$puntos_factible' WHERE id = '$id_concentrado'";
        $query = mysqli_query( $conexion, $actualizar);
        $resultado = $query;
 

echo json_encode($resultado);
?>