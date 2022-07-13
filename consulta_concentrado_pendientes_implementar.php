<?php
    session_start();
    header('Content-Type: application/json');
    include "conexionGhoner.php";
    $producto = [];
    $consulta = "SELECT * FROM concentrado_sugerencias ORDER BY id DESC";
    $query = mysqli_query($conexion,$consulta);
    while ($fila=$query -> fetch_array()) {
        $producto[] = $fila;
    }
    echo json_encode($producto);
    $query -> close();
?>