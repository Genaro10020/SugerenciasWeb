<?php
    session_start();
    header('Content-Type: application/json');
    include "conexionGhoner.php";
    $producto = [];
    $dias =0;
    $nombre= $_SESSION['nombre'];
    $consulta = "SELECT * FROM concentrado_sugerencias WHERE 
    status='Implementada' AND analista_de_factibilidad='$nombre' AND status_impacto='' || 
    status='Implementada' AND analista_de_factibilidad='$nombre' AND status_impacto='Midiendo' ORDER BY id DESC";
    //$hoy = date("Y-m-d");
    $query = mysqli_query($conexion,$consulta);
    while ($fila=$query -> fetch_array()) {
        $producto[] = $fila;
    }
    echo json_encode($producto);
    $query -> close();
?>