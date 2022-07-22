<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);

$numero_actividad=$variables['numero_actividad'];
$folio=$variables['folio'];
$actividad=$variables['actividad'];
$var_responsable_plan=$variables['var_responsable_plan'];

$fecha_inicial=$variables['fecha_inicial_actividad'];
$fecha_inicial = date("d-m-Y", strtotime($fecha_inicial));


$fecha_final=$variables['fecha_final_actividad'];
$fecha_final = date("d-m-Y", strtotime($fecha_final));

$porcentaje="0";
include "conexionGhoner.php";
$consulta = "INSERT INTO plan_trabajo_sugerencias (num_actividad,folio,actividad,responsable,fecha_inicial,fecha_final,porcentaje,check_mejora_continua)  VALUES ('$numero_actividad','$folio','$actividad','$var_responsable_plan','$fecha_inicial','$fecha_final','0','PENDIENTE')";
        $query = mysqli_query( $conexion, $consulta);
        if($query==true){
                $resultado="Actividad guardada con éxito";
        }else if($query==false) {
                $resultado="No se guardado Actividad";
        }else{
                $resultado="Error en guardar actividad";
        }
    
echo json_encode($resultado);
?>