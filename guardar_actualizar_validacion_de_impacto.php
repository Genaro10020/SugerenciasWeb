<?php
header("Content-Type: application/json");
$datos = json_decode(file_get_contents('php://input'), true);
$datos['indicador'];
$datos['linea_base'];
$datos['resultado_esperado'];
$datos['porcentaje_de_mejora'];
$datos['tipo_de_impacto'];
$datos['puntos_asignados'];
$id_concentrado=$datos['id_concentrado'];
$datos['folio'];
$validacion_de_impacto=$datos['validacion_de_impacto'];
include "conexionGhoner.php";

$consulta = "SELECT * FROM concentrado_sugerencias WHERE id = '$id_concentrado'";
$query = mysqli_query( $conexion, $consulta);
   while ($row = mysqli_fetch_array($query)){
        $resultado=$row['validacion_de_impacto'];
   }

   $actualizar = "UPDATE concentrado_sugerencias SET validacion_de_impacto ='$validacion_de_impacto' WHERE id = '$id_concentrado'"; ;
   $query = mysqli_query( $conexion, $actualizar);
   $resultado = $query;

echo  json_encode($resultado);
?>