<?php
    session_start();
    header('Content-Type: application/json');

    $producto = [];
    $variables = json_decode(file_get_contents('php://input'), true);
    $accion = $variables['accion'];
    $pagina = $variables['numero_pagina'];

    include "conexionGhoner.php";

    if($accion == 'acomodar'){
        $consulta = "SELECT * FROM concentrado_sugerencias ORDER BY
        CASE 
            WHEN status = 'En Factibilidad' AND check_mc = '' THEN 1
            WHEN check_mc IN ('Pendiente', 'Rechazado', 'Corregido') AND cumplimiento != 100 THEN 2
            WHEN cumplimiento = 99 AND status IN ('Cerrada/No Factible','Cerrada/Fast Response') THEN 3
            WHEN status = 'En implementación' THEN 4
            WHEN validacion_calificada = '0' AND status = 'Implementada' AND validacion_de_impacto IN ('Cuantitativo','Cualitativo') THEN 5
            WHEN validacion_de_impacto = '' AND status = 'Implementada' THEN 6
            ELSE 7
        END,
        id DESC
        LIMIT 50 OFFSET $pagina
        ";
        $query = mysqli_query($conexion,$consulta);

    }else if($accion==''){
        $consulta = "SELECT * FROM concentrado_sugerencias ORDER BY id DESC
        LIMIT 50 OFFSET $pagina
        ";
        $query = mysqli_query($conexion,$consulta);

    }else if($accion == 'total'){
        $consulta = "SELECT * FROM concentrado_sugerencias ORDER BY id DESC";
        $query = mysqli_query($conexion,$consulta);
    }
    
    while ($fila=$query -> fetch_array()) {
        $producto[] = $fila;
    }
    echo json_encode($producto);
    $query -> close();
?>