<?php
error_reporting(0);
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$resultado =[];
$numero_nomina = $variables['numero_nomina'];
include "conexionGhoner.php";

        $consultar = "SELECT * FROM canjer_premios_colaborador_sugerencias WHERE numero_nomina='$numero_nomina' AND status='Sin Aceptar'";
        $query = mysqli_query( $conexion, $consultar);
        while ($datos = mysqli_fetch_array($query)){
                $resultado[] = $datos; 
        }
    
echo json_encode($resultado);
?>