<?php
    session_start();
    header('Content-Type: application/json');
    include "conexionGhoner.php";
    $consulta = "SELECT * FROM concentrado_sugerencias";
    $query = mysqli_query($conexion,$consulta);
    /*while($row = mysqli_fetch_array($query)){
        $dato[]=$row['cumplimiento'];
        $datos[]=$row['nombre_sugerencia'];/*, , folio, status, causa_no_factibilidad, situacion_actual, idea_propuesta,
 numero_nomina, colaborador,puesto,planta,area,area_participante,subarea,impacto_primario,impacto_secundario,tipo_de_desperdicio,objetivo_de_calidad_ma, 
 fecha_de_sugerencia, fecha_de_inicio, fecha_compromiso, fecha_real_cierre, analista_de_factibilidad, impacto_planeado, impacto_real, creado_por, creado, modificado_por, modificado
    }*/
    while ($fila=$query -> fetch_array()) {
        # code...
        $producto[] = array_map('utf8_encode',$fila);
    }
    
    echo json_encode($producto);
    $query -> close();

?>