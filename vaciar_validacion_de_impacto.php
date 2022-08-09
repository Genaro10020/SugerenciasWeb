<?php
header("Content-Type: application/json");
$datos = json_decode(file_get_contents('php://input'), true);
include "conexionGhoner.php";
$resultado = [];
$id_concentrado=$datos['id_concentrado'];

     $actualizar = "UPDATE impacto_cuantitativo_sugerencias SET indicador='', linea_base='',	resultado_esperado='', porcentaje_de_mejora ='',	tipo_de_impacto = '', puntos_asignados = '' WHERE id_concentrado = '$id_concentrado'"; 
     $querys = mysqli_query( $conexion, $actualizar);
     $resultado[] = $querys;

     $actualizar = "UPDATE concentrado_sugerencias SET validacion_de_impacto ='' WHERE id = '$id_concentrado'"; ;
     $actualizando = mysqli_query( $conexion, $actualizar);
     $resultado[] = $actualizando;

echo  json_encode($resultado);
?>