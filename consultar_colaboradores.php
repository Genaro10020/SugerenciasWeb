<?php
    session_start();
    header('Content-Type: application/json');
    $variables = json_decode(file_get_contents('php://input'), true);
    $resultado = [];
    include "conexionGhoner.php";
    $consulta = "SELECT * FROM usuarios_colocaboradores_sugerencias";
    $query = mysqli_query($conexion,$consulta);
    while ($fila=$query -> fetch_array()) {
        $resultado[] = $fila;
    }
    echo json_encode($resultado);
    $query -> close();
?>