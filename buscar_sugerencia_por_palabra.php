<?php
    session_start();
    header('Content-Type: application/json');

    $variables = json_decode(file_get_contents('php://input'), true);
    $palabra = $variables['palabra'];
    $resultado= [];
    include "conexionGhoner.php";

    
    $consulta = "SELECT * FROM concentrado_sugerencias 
    WHERE folio LIKE '%$palabra%'
    OR nombre_sugerencia LIKE '%$palabra%'
    ORDER BY id DESC
    ";
    $query = mysqli_query($conexion,$consulta);


    if($resultado != ''){
        while($fila=mysqli_fetch_array($query)){
            $resultado[0] = true;
            $resultado[] = $fila;
        }
    }else{
        $resultado[0] = false;
    }
    echo json_encode($resultado);

?>