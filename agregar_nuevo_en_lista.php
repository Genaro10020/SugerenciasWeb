<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$nuevo = $variables['nuevo_registro'];
$tipo = $variables['tipo'];
$correo = $variables['correo'];
include "conexionGhoner.php";
if($tipo=="Planta"){
  $consulta = "INSERT INTO lista_planta_sugerencias (planta) VALUES ('$nuevo')";
       $query = mysqli_query( $conexion, $consulta);
        if($query==true){
            $resultado="planta agregada";
        }else{
            $resultado = "Mal";
        }
}else if($tipo=="Area"){
  $consulta = "INSERT INTO lista_area_sugerencias (area) VALUES ('$nuevo')";
       $query = mysqli_query( $conexion, $consulta);
        if($query==true){
            $resultado="area agregada";
        }else{
            $resultado = "Mal";
        }
}else if($tipo=="Area Participante"){
  $consulta = "INSERT INTO lista_area_participante_sugerencias (area_participante) VALUES ('$nuevo')";
       $query = mysqli_query( $conexion, $consulta);
        if($query==true){
            $resultado="area participante agregada";
        }else{
            $resultado = "Mal";
        }
}else if($tipo=="Subarea"){
  $consulta = "INSERT INTO lista_subarea_sugerencias (subarea) VALUES ('$nuevo')";
       $query = mysqli_query( $conexion, $consulta);
        if($query==true){
            $resultado="subarea agregada";
        }else{
            $resultado = "Mal";
        }
  }else if($tipo=="Impacto"){
    $consulta = "INSERT INTO lista_impacto_sugerencias (impacto) VALUES ('$nuevo')";
         $query = mysqli_query( $conexion, $consulta);
          if($query==true){
              $resultado="impacto agregada";
          }else{
              $resultado = "Mal";
          }
      }
  else if($tipo=="Desperdicio"){
        $consulta = "INSERT INTO lista_tipo_desperdicio_sugerencias (tipo_de_desperdicio) VALUES ('$nuevo')";
             $query = mysqli_query( $conexion, $consulta);
              if($query==true){
                  $resultado="desperdicio agregada";
              }else{
                  $resultado = "Mal";
              }
          }
   else if($tipo=="Calidad"){
          $consulta = "INSERT INTO lista_objetivos_calidad_sugerencias (objetivos_de_calidad) VALUES ('$nuevo')";
                $query = mysqli_query( $conexion, $consulta);
                if($query==true){
                    $resultado="calidad agregada";
                }else{
                    $resultado = "Mal";
                }
            }
else if($tipo=="Analista"){
                $consulta = "INSERT INTO lista_analista_sugerencias (nombre,correo) VALUES ('$nuevo','$correo')";
                      $query = mysqli_query( $conexion, $consulta);
                      if($query==true){
                          $resultado="analista agregada";
                      }else{
                          $resultado = "Mal";
                      }
                  }
  echo json_encode($resultado);
?>