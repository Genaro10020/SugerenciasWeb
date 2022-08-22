<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$insertar_actualizar = $variables['insertar_actualizar'];
$codigo_premios = $variables['codigo_premios'];
$descripcion_premios = $variables['descripcion_premios'];
$puntos_canjear_premios = $variables['puntos_canjear_premios'];

if(isset($variables['folio_del_reto'])){
        $folio_del_reto =  $variables['folio_del_reto'];
}
if(isset($variables['id_premio'])){
        $id_premio =  $variables['id_premio'];
}


date_default_timezone_set('America/Mexico_City');
$fecha = date("Y-m-d");
include "conexionGhoner.php";

       if($insertar_actualizar=='Insertar'){

                $consulta = "INSERT INTO concentrado_premios_sugerencias (codigo_premio, descripcion, puntos_para_canjear)  VALUES ('$codigo_premios','$descripcion_premios','$puntos_canjear_premios')";
                $query = mysqli_query( $conexion, $consulta);

       }
       if($insertar_actualizar=='Actualizar'){
        
                $consulta = "UPDATE concentrado_premios_sugerencias SET codigo_premio='$codigo_premios', descripcion='$descripcion_premios', puntos_para_canjear='$puntos_canjear_premios' WHERE id = '$id_premio'";
                $query = mysqli_query( $conexion, $consulta);

        } 


        $resultado = $query;
    
echo json_encode($resultado);
?>