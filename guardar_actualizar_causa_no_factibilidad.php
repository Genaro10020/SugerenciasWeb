<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$var_tipo_de_cierre=$variables['var_tipo_de_cierre'];
$causa_no_factibilidad=$variables['causa_no_factibilidad'];
$id_concentrado=$variables['id_concentrado'];

include "conexionGhoner.php";
        $actualizar= "UPDATE concentrado_sugerencias SET status = '$var_tipo_de_cierre', causa_no_factibilidad = '$causa_no_factibilidad' WHERE id='$id_concentrado'";
        $query = mysqli_query( $conexion, $actualizar);
        $resultado = $query;
        if($resultado){
            $resultado = "correcto";
        }else{
            $resultado = "mal";
        }
echo json_encode($resultado);
?>