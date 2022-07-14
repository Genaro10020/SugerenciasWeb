<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$tipo=$variables['tipo_nueva_o_actualizar'];
$id=$variables['id'];
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
$fecha_sugerencia = date("d-m-Y", strtotime($fecha_sugerencia));
$fecha_inicio= $variables['fecha_inicio'];
$fecha_inicio = date("d-m-Y", strtotime($fecha_inicio));
$fecha_compromiso= $variables['fecha_compromiso'];
$fecha_real_de_cierre= $variables['fecha_real_de_cierre'];
$analista_de_factibilidad= $variables['analista_de_factibilidad'];
$impacto_planeado= $variables['impacto_planeado'];
$impacto_real= $variables['impacto_real'];
$creado_o_modificado= date('d-m-Y');
$creado_por_o_modificado_por=$variables['usuario'];
$fecha_limite= date("d-m-Y",strtotime($fecha_inicio."+ 8 days")); //agregando 7 dias
include "conexionGhoner.php";
    if($tipo=="nueva"){
        $consulta = "INSERT INTO concentrado_sugerencias (cumplimiento, nombre_sugerencia, folio, status, causa_no_factibilidad, situacion_actual, idea_propuesta,
        numero_nomina, colaborador,puesto,planta,area,area_participante,subarea,impacto_primario,impacto_secundario,tipo_de_desperdicio,objetivo_de_calidad_ma, 
        fecha_de_sugerencia, fecha_de_inicio, fecha_limite, fecha_compromiso, fecha_real_cierre, analista_de_factibilidad, impacto_planeado, impacto_real, creado_por, creado, modificado_por, modificado) 
        VALUES ('$cumplimiento','$nombre_sugerencia','$folio','$status', '$causa_no_factibilidad','$situacion_actual','$idea_propuesta','$nomina','$colaborador','$puesto','$planta','$area','$area_participante',
        '$subarea','$impacto_primario','$impacto_secundario','$tipo_desperdicio','$objetivo_de_calidadMA_cadena','$fecha_sugerencia','$fecha_inicio','$fecha_limite','$fecha_compromiso','$fecha_real_de_cierre','$analista_de_factibilidad','$impacto_planeado','$impacto_real','$creado_por_o_modificado_por','$creado_o_modificado','modificado por','modificado')";
        $query = mysqli_query( $conexion, $consulta);
        if($query==true){
            $resultado="agregada";
        }
    }else if($tipo=="actualizar"){
        $consulta= "UPDATE concentrado_sugerencias SET nombre_sugerencia='$nombre_sugerencia', folio = '$folio', status = '$status', causa_no_factibilidad = '$causa_no_factibilidad', 
        situacion_actual = '$situacion_actual', idea_propuesta =  '$idea_propuesta', numero_nomina = '$nomina', colaborador =  '$colaborador', puesto = '$puesto', planta = '$planta', 
        area = '$area', area_participante = '$area_participante', subarea = '$subarea', impacto_primario = '$impacto_primario', impacto_secundario = '$impacto_secundario',
        tipo_de_desperdicio = '$tipo_desperdicio', objetivo_de_calidad_ma = '$objetivo_de_calidadMA_cadena', fecha_de_sugerencia =  '$fecha_sugerencia', 
        fecha_de_inicio = '$fecha_inicio', fecha_limite= '$fecha_limite', fecha_compromiso = '$fecha_compromiso', fecha_real_cierre =  '$fecha_real_de_cierre', analista_de_factibilidad  = '$analista_de_factibilidad', 
        impacto_planeado = '$impacto_planeado', impacto_real = '$impacto_real', modificado_por = '$creado_por_o_modificado_por', modificado = '$creado_o_modificado'  WHERE id='$id'";
        
        $query = mysqli_query( $conexion, $consulta);
        $resultado = $query;
    }else{

    }

echo json_encode($resultado);
?>