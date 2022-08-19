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
$folio_del_reto =  $variables['folio_del_reto'];
date_default_timezone_set('America/Mexico_City');
$fecha = date("Y-m-d");
include "conexionGhoner.php";

        $consulta = "INSERT INTO concentrado_retos_segerencias (titulo_reto, descripcion_reto, responsable_reto, planta_reto, area_reto, subarea_reto, folio_reto, fecha, status_reto)  VALUES 
        ('$titulo_del_reto','$descripcion_del_reto','$responsable_del_reto','$planta_en_reto','$area_en_reto','$subarea_en_reto','$folio_del_reto','$fecha','Activo')";
        $query = mysqli_query( $conexion, $consulta);
        $resultado = $query;
    
echo json_encode($resultado);
?>