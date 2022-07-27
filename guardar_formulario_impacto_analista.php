<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$id_concentrado=$variables['id_concentrado'];
$impacto_primario=$variables['impacto_primario'];
$impacto_secundario=$variables['impacto_secundario'];
$tipo_desperdicio=$variables['tipo_desperdicio'];
$objetivos_de_calidadMA = $variables['objetivos_de_calidadMA'];
$objetivo_de_calidadMA_cadena=implode(',', $objetivos_de_calidadMA);

include "conexionGhoner.php";
        $actualizar= "UPDATE concentrado_sugerencias SET impacto_primario = '$impacto_primario', impacto_secundario = '$impacto_secundario', tipo_de_desperdicio = '$tipo_desperdicio', objetivo_de_calidad_ma = '$objetivo_de_calidadMA_cadena' WHERE id='$id_concentrado'";
        $query = mysqli_query( $conexion, $actualizar);
        $resultado = $query;
        if($resultado){
            $resultado = "Datos actualizados con exito.";
        }else{
            $resultado = "No se actualizaron los datos.";
        }
echo json_encode($resultado);
?>