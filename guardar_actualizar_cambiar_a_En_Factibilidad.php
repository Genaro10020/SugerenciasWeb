<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$id_concentrado=$variables['id_concentrado'];
$hoy= date('Y-m-d');
$fecha_limite= date("Y-m-d",strtotime($hoy."+ 8 days")); //agregando 7 dias
include "conexionGhoner.php";
        $actualizar= "UPDATE concentrado_sugerencias SET cumplimiento=0, status = 'En Factibilidad', causa_no_factibilidad = '', respuesta_analista = '', fecha_factibilidad = '', check_mc='', fecha_de_inicio='$hoy', fecha_limite='$fecha_limite' WHERE id='$id_concentrado'";
        $query = mysqli_query( $conexion, $actualizar);
        $resultado = $query;
        if($resultado){
            $resultado = "correcto";
        }else{
            $resultado = "mal";
        }
echo json_encode($resultado);
?>