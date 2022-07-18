<?php
    session_start();
    header('Content-Type: application/json');
    include "conexionGhoner.php";
    $producto = [];
    $nombre= $_SESSION['nombre'];
    $pendiente_o_vencida="status_factibilidad";
    $consulta = "SELECT * FROM concentrado_sugerencias WHERE status!='En Factibilidad' AND analista_de_factibilidad='$nombre' ORDER BY id DESC";
    $query = mysqli_query($conexion,$consulta);
    while ($fila=$query -> fetch_array()) {
        $producto[] = $fila;//agrego un dato al arreglo pendiete o vencida para mostar boton segun si esta en factibilidad pendiete o vencida.
    }
    echo json_encode($producto);
    $query -> close();
?>