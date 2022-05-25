<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$cumplimiento=$variables['cumplimiento'];
$nombre_sugerencia=$variables['nombre_sugerencia'];
$folio=$variables['folio'];
$status= $variables['status'];
$causa_no_factibilidad= $variables['causa_no_factibilidad'];
$situacion_actual= $variables['situacion_actual'];
$idea_propuesta= $variables['idea_propuesta'];
$nomina= $variables['nomina'];
$colaborador= $variables['colaborador'];
$puesto= $variables['puesto'];
$planta= $variables['planta'];
$area= $variables['area'];
$area_participante= $variables['area_participante'];
$subarea= $variables['subarea'];
$impacto_primario= $variables['impacto_primario'];
$impacto_secundario= $variables['impacto_secundario'];
$tipo_desperdicio= $variables['tipo_desperdicio'];
$objetivo_de_calidadMA= $variables['objetivo_de_calidadMA'];
$objetivo_de_calidadMA_cadena=implode(',', $objetivo_de_calidadMA);
$fecha_sugerencia= $variables['fecha_sugerencia'];
$fecha_inicio= $variables['fecha_inicio'];
$fecha_compromiso= $variables['fecha_compromiso'];
$fecha_real_de_cierre= $variables['fecha_real_de_cierre'];
$analista_de_factibilidad= $variables['analista_de_factibilidad'];
$impacto_planeado= $variables['impacto_planeado'];
$impacto_real= $variables['impacto_real'];
$creado= date('Y-m-d');
$creado_por=$variables['usuario'];
include "conexionGhoner.php";
$consulta = "INSERT INTO concentrado_sugerencias (cumplimiento, nombre_sugerencia, folio, status, causa_no_factibilidad, situacion_actual, idea_propuesta,
 numero_nomina, colaborador,puesto,planta,area,area_participante,subarea,impacto_primario,impacto_secundario,tipo_de_desperdicio,objetivo_de_calidad_ma, 
 fecha_de_sugerencia, fecha_de_inicio, fecha_compromiso, fecha_real_cierre, analista_de_factibilidad, impacto_planeado, impacto_real, creado_por, creado, modificado_por, modificado) 
VALUES ('$cumplimiento','$nombre_sugerencia','$folio','$status', '$causa_no_factibilidad','$situacion_actual','$idea_propuesta','$nomina','$colaborador','$puesto','$planta','$area','$area_participante',
'$subarea','$impacto_primario','$impacto_secundario','$tipo_desperdicio','$objetivo_de_calidadMA_cadena','$fecha_sugerencia','$fecha_inicio','$fecha_compromiso','$fecha_real_de_cierre','$analista_de_factibilidad','$impacto_planeado','$impacto_real','$creado_por','$creado','modificado por','modificado')";
$query = mysqli_query( $conexion, $consulta);
echo json_encode($query);
?>