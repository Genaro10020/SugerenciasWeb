<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$tipo=$variables['tipo_nueva_o_actualizar'];

        $consulta = "INSERT INTO usuarios_sugerencias (user,password,email) 
        VALUES ('$cumplimiento','$nombre_sugerencia','$folio','$status', '$causa_no_factibilidad','$situacion_actual','$idea_propuesta','$nomina','$colaborador','$puesto','$planta','$area','$area_participante',
        '$subarea','$impacto_primario','$impacto_secundario','$tipo_desperdicio','$objetivo_de_calidadMA_cadena','$fecha_sugerencia','$fecha_inicio','$fecha_compromiso','$fecha_real_de_cierre','$analista_de_factibilidad','$impacto_planeado','$impacto_real','$creado_por_o_modificado_por','$creado_o_modificado','modificado por','modificado')";
        $query = mysqli_query( $conexion, $consulta);

    
echo json_encode($resultado);
?>