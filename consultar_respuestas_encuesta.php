<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$numero_nomina=$variables['numero_nomina'];
$resultado = [];
include "conexionGhoner.php";
        $consulta= "SELECT * FROM encuesta_sugerencias WHERE numero_nomina = '$numero_nomina'";
        $query = mysqli_query( $conexion, $consulta);
        while($fila=mysqli_fetch_array($query)){
            $resultado[]= $fila; 
        }
echo json_encode($resultado);
?>