<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$numero_nomina=$variables['numero_nomina'];
$nueva_contrasena=$variables['nueva_contrasena'];
$contrasena_actual=$variables['contrasena_actual'];



include "conexionGhoner.php";
        $actualizar= "UPDATE concentrado_sugerencias SET password = '$nueva_contrasena' WHERE numero_nomina='$numero_nomina' AND password='$contrasena_actual'";
        $query = mysqli_query( $conexion, $actualizar);
        $resultado = $query;
        if($resultado){
            $resultado = "correcto";
        }else{
            $resultado = "mal";
        }
echo json_encode($resultado);
?>