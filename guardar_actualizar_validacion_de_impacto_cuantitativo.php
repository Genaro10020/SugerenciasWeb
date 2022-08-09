<?php
header("Content-Type: application/json");
$datos = json_decode(file_get_contents('php://input'), true);
$indicador=$datos['indicador'];
$linea_base=$datos['linea_base'];
$resultado_esperado=$datos['resultado_esperado'];
$porcentaje_de_mejora=$datos['porcentaje_de_mejora'];
$tipo_de_impacto=$datos['tipo_de_impacto'];
$puntos_asignados=$datos['puntos_asignados'];
$id_concentrado=$datos['id_concentrado'];
$folio=$datos['folio'];
$validacion_de_impacto=$datos['validacion_de_impacto'];
include "conexionGhoner.php";
$resultado = [];

$consulta = "SELECT * FROM impacto_cuantitativo_sugerencias WHERE id_concentrado = '$id_concentrado' AND folio = '$folio'";
$query = mysqli_query( $conexion, $consulta);
 if(mysqli_num_rows($query)>0){//SI EXISTE EL REGISTRO ACTUALIZA NADA MAS.
               $actualizar = "UPDATE impacto_cuantitativo_sugerencias SET indicador='$indicador', linea_base='$linea_base',	resultado_esperado='$resultado_esperado', porcentaje_de_mejora ='$porcentaje_de_mejora',	tipo_de_impacto = '$tipo_de_impacto', puntos_asignados = '$puntos_asignados' WHERE id_concentrado = '$id_concentrado'"; ;
               $querys = mysqli_query( $conexion, $actualizar);
               $resultado[] = $querys;
        
 }else{//SI NO EXISTE EL REGISTRO INSERTA.

      $insertar = "INSERT INTO impacto_cuantitativo_sugerencias (id_concentrado, folio, indicador, linea_base,	resultado_esperado, porcentaje_de_mejora,	tipo_de_impacto, puntos_asignados) 
      VALUES ('$id_concentrado', '$folio', '$indicador', '$linea_base', '$resultado_esperado', '$porcentaje_de_mejora', '$tipo_de_impacto','$puntos_asignados')";
      $quer = mysqli_query( $conexion, $insertar);
      $resultado[] = $quer;
 }

   $actualizar = "UPDATE concentrado_sugerencias SET validacion_de_impacto ='$validacion_de_impacto' WHERE id = '$id_concentrado'"; ;
   $actualizando = mysqli_query( $conexion, $actualizar);
   $resultado[] = $actualizando;

echo  json_encode($resultado);
?>