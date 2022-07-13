<?php
    session_start();
    header('Content-Type: application/json');
    include "conexionGhoner.php";
    //$producto = [];
    $nombre= $_SESSION['nombre'];
    $consulta = "SELECT * FROM concentrado_sugerencias WHERE status='En Factibilidad' AND analista_de_factibilidad='$nombre' ORDER BY id DESC";
    $query = mysqli_query($conexion,$consulta);
    while ($fila=$query -> fetch_array()) {
        $producto[] = $fila;
    }
    echo json_encode($producto);
    $query -> close();
?>