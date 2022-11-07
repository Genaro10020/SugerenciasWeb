<?php
    session_start();
    header('Content-Type: application/json');
    $variables = json_decode(file_get_contents('php://input'), true);
    $id_concentrado = $variables['id_concentrado'];
    $resultado = [];
    include "conexionGhoner.php";
    $consulta = "SELECT * FROM concentrado_impacto_sugerencias WHERE id_concentrado = '$id_concentrado'";
    $query = mysqli_query($conexion,$consulta);
    while ($fila=$query -> fetch_array()) {
        $resultado[] = $fila;
    }
    echo json_encode($resultado);
    $query -> close();
?>