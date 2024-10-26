<?php
    session_start();
    header('Content-Type: application/json');
    include "conexionGhoner.php";
    $producto = [];
    $pendiente_o_vencida="status_factibilidad";
    $variables = json_decode(file_get_contents('php://input'), true);
    $planta= $_SESSION["planta"];

    $consulta = "SELECT * FROM concentrado_sugerencias 
    WHERE (status='Cerrada/No Factible' OR status= 'Cerrada/Fast Response')  AND respuesta_analista = 'No Factible' AND planta = '$planta' AND VoBo_gerente != 'SI' AND fecha_factibilidad > '2024-10-01 00:00:00'
    ORDER BY id DESC";
    $query = mysqli_query($conexion,$consulta);
    while ($fila=$query -> fetch_array()) {
        $fecha_actual = strtotime(date("d-m-Y",time()));
        $fecha_limite = strtotime($fila['fecha_limite']);

        if($fecha_actual > $fecha_limite){
                $respuesta="Vencida";
        }else{
                $respuesta="Pendiente";
        }
        $producto[] = [$pendiente_o_vencida=>$respuesta]+$fila;//agrego un dato al arreglo pendiete o vencida para mostar boton segun si esta en factibilidad pendiete o vencida.
    }
    echo json_encode($producto);
    $query -> close();
?>
