<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);

$numero_actividad=$variables['numero_actividad'];
$folio=$variables['folio'];
$actividad=$variables['actividad'];
$responsable_plan=$variables['responsable_plan'];

$fecha_inicial=$variables['fecha_inicial_actividad'];
$fecha_inicial = date("Y-m-d", strtotime($fecha_inicial));


$fecha_final=$variables['fecha_final_actividad'];
$fecha_final = date("Y-m-d", strtotime($fecha_final));

$porcentaje=$variables['porcentaje'];

$tipo=$variables['tipo_nueva_actualizar'];
$id=$variables['id'];
$id_concentrado=$variables['id_concentrado'];
include "conexionGhoner.php";

        if($tipo=="nuevo"){
                $consulta = "INSERT INTO plan_trabajo_sugerencias (id_concentrado,num_actividad,folio,actividad,responsable,fecha_inicial,fecha_final,porcentaje,check_mejora_continua)  VALUES ('$id_concentrado','$numero_actividad','$folio','$actividad','$responsable_plan','$fecha_inicial','$fecha_final','0','PENDIENTE')";
                $query = mysqli_query( $conexion, $consulta);
                if($query==true){
                        $resultado="si";
                }else if($query==false) {
                        $resultado="no create";
                }else{
                        $resultado="error create";
                }
        }else if ($tipo=="actualizar"){
                $actualizar = "UPDATE plan_trabajo_sugerencias SET actividad='$actividad', responsable='$responsable_plan',fecha_inicial='$fecha_inicial',fecha_final='$fecha_final',porcentaje='$porcentaje' WHERE id = '$id'";
                $query = mysqli_query( $conexion, $actualizar);
                if($query==true){
                        $resultado="si";
                }else if($query==false) {
                        $resultado="no update";
                }else{
                        $resultado="error update";
                }
                
        }else{
                $resultado ="No existe esa opción, nada más nuevo y actualizar.";
        }

    
echo json_encode($resultado);
?>