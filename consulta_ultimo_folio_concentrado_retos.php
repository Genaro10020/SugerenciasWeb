<?php
    session_start();
    header('Content-Type: application/json');
    $variables = json_decode(file_get_contents('php://input'), true);
    $planta_en_reto=$variables['planta_en_reto'];
    $area_en_reto=$variables['area_en_reto'];
    include "conexionGhoner.php";
    $producto = [];
    $consulta = "SELECT * FROM concentrado_retos_segerencias WHERE planta_reto='$planta_en_reto' AND area_reto='$area_en_reto' ORDER BY id DESC LIMIT 1";
    $query = mysqli_query($conexion,$consulta);
    while ($fila=$query -> fetch_array()) {
        $producto[] = $fila;
    }
    echo json_encode($producto);
    $query -> close();
?>