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


//$numero_actividad=$variables['numero_actividad'];
/*$folio=$variables['folio'];
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
        }*/
    
echo json_encode($resultado);
?>