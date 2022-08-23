<?php
    session_start();
    header('Content-Type: application/json');
    include "conexionGhoner.php";
    $usuario = $_SESSION['usuario'];
    $producto = [];
    $consulta = "SELECT * FROM concentrado_sugerencias WHERE numero_nomina=$usuario ORDER BY id DESC";
    $query = mysqli_query($conexion,$consulta);
    while ($fila=$query -> fetch_array()) {
        $producto[] = $fila;
    }
    echo json_encode($producto);
    $query -> close();
?>