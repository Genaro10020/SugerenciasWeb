<?php
    session_start();
    header('Content-Type: application/json');
    $variables = json_decode(file_get_contents('php://input'), true);
    $resultado = [];
    include "conexionGhoner.php";
    
    //$consulta = "SELECT * FROM canjer_premios_colaborador_sugerencias WHERE status!='Sin aceptar' ORDER BY status DESC";
    $consulta = "SELECT * FROM canjer_premios_colaborador_sugerencias WHERE status!='Sin aceptar' ORDER BY status DESC, STR_TO_DATE(fecha, '%Y-%m-%d')";
    $query = mysqli_query($conexion,$consulta);
    while ($fila=$query -> fetch_array()) {
        
        $planta = $fila['planta'];
        $area_participante =$fila['area_participante'];
        $nomina =$fila['numero_nomina'];

        $consultado_area = "SELECT area, numero_nomina FROM concentrado_sugerencias WHERE  numero_nomina ='$nomina' ORDER BY id DESC";
        $query_area = mysqli_query($conexion, $consultado_area);
        if ($query_area) {
        $resultado_area = mysqli_fetch_assoc($query_area);
        $fila['area'] = $resultado_area['area'];
        }
        $resultado[] = $fila;

    }


    echo json_encode($resultado);
    $query -> close();
?>