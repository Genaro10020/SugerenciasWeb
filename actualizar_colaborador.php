<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);

$id=$variables['id'];
$planta=$variables['planta_seleccionada'];

include "conexionGhoner.php";

        $actualizar = "UPDATE usuarios_colocaboradores_sugerencias SET planta='$planta' WHERE id='$id'";
        $query = mysqli_query( $conexion, $actualizar);
        if($query){
            $resultado=$query;
        }else{
            $resultado=mysqli_error($conexion);
        }
        

echo json_encode($resultado);
?>