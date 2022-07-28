<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$arreglo_actividades = $variables['nuevo_orden'] ;
$resultado = [];
$tamanio = 0;
$tamanio=sizeof($arreglo_actividades);
include "conexionGhoner.php";
for ($i=0; $i < $tamanio ; $i++) { 
   
      $id=$arreglo_actividades[$i]['id'];
      //$numero_actividad=$arreglo_actividades[$i]['numero_actividad'];
      $numero_actividad = $i+1;
      $folio=$arreglo_actividades[$i]['folio'];
      $actividad=$arreglo_actividades[$i]['actividad'];
      $responsable=$arreglo_actividades[$i]['responsable'];
      $fecha_inicial=$arreglo_actividades[$i]['fecha_inicial'];
      $fecha_final=$arreglo_actividades[$i]['fecha_final'];
      $porcentaje=$arreglo_actividades[$i]['porcentaje'];
      $check_mejora_continua=$arreglo_actividades[$i]['check_mejora_continua'];


        $actualizar = "UPDATE plan_trabajo_sugerencias SET num_actividad='$numero_actividad', folio='$folio', actividad='$actividad', responsable='$responsable', fecha_inicial='$fecha_inicial', fecha_final='$fecha_final', porcentaje='$porcentaje', check_mejora_continua='$check_mejora_continua' WHERE id = '$id'";
        $query = mysqli_query( $conexion, $actualizar);
        $resultado = $query;
}       

echo json_encode($resultado);
?>