<?php

header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$resultado=[];
$id_concentrado=$variables["id_concentrado"];
include "conexionGhoner.php";
$hoy = date("Y-m-d");
$consulta = "SELECT * FROM plan_trabajo_sugerencias WHERE id_concentrado='$id_concentrado' ORDER BY num_actividad ASC";
$query = mysqli_query( $conexion, $consulta);
while ($datos = mysqli_fetch_array($query)){
    $fecha_final=$datos['fecha_final'];
        $f_final = new DateTime($fecha_final);
        $f_actual = new DateTime($hoy);
        $diff = $f_actual->diff($f_final);
        $dias=$diff->format('%R'.$diff->days);
        //$dias=$diff->days;
       
 

    $resultado[] =  ["dias_restantes_actividad"=>$dias,"f_hoy"=>$f_actual,"f_final"=>$f_final,"diferencia"=>$diff]+$datos;

}

echo json_encode($resultado);
?>