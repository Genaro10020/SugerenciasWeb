<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$id_eliminar = $variables['id_eliminar'];
$tipo = $variables['tipo'];
include "conexionGhoner.php";
if($tipo=="Planta"){
  $consulta = "DELETE FROM lista_planta_sugerencias WHERE id = '$id_eliminar'";
  $query = mysqli_query( $conexion, $consulta);
        if($query==true){
            $resultado="planta eliminada";
        }else{
            $resultado = "No se elimino el registro";
        }
}else if($tipo=="Area"){
  $consulta = "DELETE FROM lista_area_sugerencias WHERE id = '$id_eliminar'";
  $query = mysqli_query( $conexion, $consulta);
   if($query==true){
       $resultado="area eliminada";
   }else{
       $resultado = "No se elimino el registro";
   }
}else if($tipo=="Area Participante"){
  $consulta = "DELETE FROM lista_area_participante_sugerencias WHERE id = '$id_eliminar'";
  $query = mysqli_query( $conexion, $consulta);
   if($query==true){
       $resultado="area participante eliminada";
   }else{
       $resultado = "No se elimino el registro";
   }
}else if($tipo=="Subarea"){
  $consulta = "DELETE FROM lista_subarea_sugerencias WHERE id = '$id_eliminar'";
  $query = mysqli_query( $conexion, $consulta);
   if($query==true){
       $resultado="subarea eliminada";
   }else{
       $resultado = "No se elimino el registro";
   }
}else if($tipo=="Impacto"){
  $consulta = "DELETE FROM lista_impacto_sugerencias WHERE id = '$id_eliminar'";
  $query = mysqli_query( $conexion, $consulta);
   if($query==true){
       $resultado="impacto eliminada";
   }else{
       $resultado = "No se elimino el registro";
   }
}else if($tipo=="Desperdicio"){
  $consulta = "DELETE FROM lista_tipo_desperdicio_sugerencias WHERE id = '$id_eliminar'";
  $query = mysqli_query( $conexion, $consulta);
   if($query==true){
       $resultado="desperdicio eliminada";
   }else{
       $resultado = "No se elimino el registro";
   }
}else if($tipo=="Calidad"){
    $consulta = "DELETE FROM lista_objetivos_calidad_sugerencias WHERE id = '$id_eliminar'";
    $query = mysqli_query( $conexion, $consulta);
     if($query==true){
         $resultado="calidad eliminada";
     }else{
         $resultado = "No se elimino el registro";
     }
  }else if($tipo=="Analista"){
    $consulta = "DELETE FROM lista_analista_sugerencias WHERE id = '$id_eliminar'";
    $query = mysqli_query( $conexion, $consulta);
     if($query==true){
         $resultado="analista eliminada";
     }else{
         $resultado = "No se elimino el registro";
     }
  }
  echo json_encode($resultado);
?>