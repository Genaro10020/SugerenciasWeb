<?php
    session_start();
    header('Content-Type: application/json');
    $variables = json_decode(file_get_contents('php://input'), true);
    $resultado = [];
    include "conexionGhoner.php";
    
    //$consulta = "SELECT * FROM canjer_premios_colaborador_sugerencias WHERE status!='Sin aceptar' ORDER BY status DESC";
    $consulta = "SELECT * FROM canjer_premios_colaborador_sugerencias WHERE status!='Sin aceptar' ORDER BY status DESC, STR_TO_DATE(fecha, '%Y-%m-%d') ASC";
    $query = mysqli_query($conexion,$consulta);
    while ($fila=$query -> fetch_array()) {
        $resultado[] = $fila;
    }
    echo json_encode($resultado);
    $query -> close();
?>