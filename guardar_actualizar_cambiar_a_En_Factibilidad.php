<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$id_concentrado=$variables['id_concentrado'];
$factibilidad="En Factibilidad";

include "conexionGhoner.php";
        $actualizar= "UPDATE concentrado_sugerencias SET status = '$factibilidad', causa_no_factibilidad = '', respuesta_analista = '', check_mc='' WHERE id='$id_concentrado'";
        $query = mysqli_query( $conexion, $actualizar);
        $resultado = $query;
        if($resultado){
            $resultado = "correcto";
        }else{
            $resultado = "mal";
        }
echo json_encode($resultado);
?>