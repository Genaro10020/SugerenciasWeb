<?php
    session_start();   
    header('Content-Type: application/json');
    $datos = json_decode(file_get_contents('php://input'), true);
    include "conexionGhoner.php";
    $id=$datos['id_concentrado'];
    $producto="";
    $consulta = "SELECT * FROM concentrado_sugerencias WHERE id='$id'";
    $query = mysqli_query($conexion,$consulta);
    while ($fila=$query -> fetch_array()) {
        $producto = $fila;
    }
    echo json_encode($producto);
    $query -> close();
?>