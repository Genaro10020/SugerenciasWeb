<?php
    session_start();
    header('Content-Type: application/json');
    $variables = json_decode(file_get_contents('php://input'), true);
    $id_concentrado = $variables['id_concentrado'];
    $resultado = [];
    include "conexionGhoner.php";
    $consulta = "UPDATE concentrado_impacto_sugerencias SET status='Finalizado' WHERE id_concentrado = '$id_concentrado'";
    $query = mysqli_query($conexion,$consulta);
    $resultado = $query;

    $consultas = "UPDATE concentrado_sugerencias SET status_impacto='Finalizado' WHERE id= '$id_concentrado'";
    $querys = mysqli_query($conexion,$consultas);
    $resultado = $querys;
    echo json_encode($resultado);
    
?>