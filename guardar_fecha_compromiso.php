<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
include "conexionGhoner.php";

$fecha_compromiso = $variables['fecha_compromiso']; 
$id = $variables['id_concentrado']; 

                $actualizar = "UPDATE concentrado_sugerencias SET fecha_compromiso='$fecha_compromiso' WHERE id = '$id'";
                $query = mysqli_query( $conexion, $actualizar);
                $resultado = $query;
                
        
echo json_encode($resultado);
?>