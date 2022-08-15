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
        $date1 = new DateTime($fecha_final);
        $date2 = new DateTime($hoy);
        if($date1>=$date2){
            $diff = $date1->diff($date2);
            $dias=$diff->d;
            //$diff->days;
        }else{
            $dias =0;
        }

    $resultado[] =  ["dias_restantes_actividad"=>$dias]+$datos;

}

echo json_encode($resultado);
?>