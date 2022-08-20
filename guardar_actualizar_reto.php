<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$titulo_del_reto = $variables['titulo_del_reto'];
$descripcion_del_reto = $variables['descripcion_del_reto'];
$responsable_del_reto =  $variables['responsable_del_reto'];
$planta_en_reto =  $variables['planta_en_reto'];
$area_en_reto =  $variables['area_en_reto'];
$subarea_en_reto =  $variables['subarea_en_reto'];
$guardar_o_actualizar =  $variables['guardar_o_actualizar'];

if(isset($variables['status_reto'])){
        $status_reto =  $variables['status_reto'];
}
if(isset($variables['folio_del_reto'])){
        $folio_del_reto =  $variables['folio_del_reto'];
}
if(isset($variables['id_reto'])){
        $id_reto =  $variables['id_reto'];
}


date_default_timezone_set('America/Mexico_City');
$fecha = date("Y-m-d");
include "conexionGhoner.php";

       if($guardar_o_actualizar=='Insertar'){

                $consulta = "INSERT INTO concentrado_retos_segerencias (titulo_reto, descripcion_reto, responsable_reto, planta_reto, area_reto, subarea_reto, folio_reto, fecha, status_reto)  VALUES 
                ('$titulo_del_reto','$descripcion_del_reto','$responsable_del_reto','$planta_en_reto','$area_en_reto','$subarea_en_reto','$folio_del_reto','$fecha','Activo')";
                $query = mysqli_query( $conexion, $consulta);

       }
       if($guardar_o_actualizar=='Actualizar'){
        
                $consulta = "UPDATE concentrado_retos_segerencias SET titulo_reto='$titulo_del_reto', descripcion_reto='$descripcion_del_reto', responsable_reto='$responsable_del_reto', 
                subarea_reto='$subarea_en_reto', status_reto='$status_reto' WHERE id = '$id_reto'";
                $query = mysqli_query( $conexion, $consulta);

        } 

        
        $resultado = $query;
    
echo json_encode($resultado);
?>