<?php
    session_start();
    header('Content-Type: application/json');
    include "conexionGhoner.php";
    $resultado = [];
    $nombre= $_SESSION['nombre'];

    $consulta = "SELECT * FROM concentrado_sugerencias WHERE status='Implementada' AND analista_de_factibilidad='$nombre' AND status_impacto='Midiendo' ORDER BY id DESC";
    $query = mysqli_query($conexion,$consulta);
    while ($fila=$query -> fetch_array()) {
        $resultado[] = $fila;
    }
    echo json_encode($resultado);
    $query -> close();
?>