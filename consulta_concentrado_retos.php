<?php
    session_start();
    header('Content-Type: application/json');
    $variables = json_decode(file_get_contents('php://input'), true);
    include "conexionGhoner.php";
    $producto = [];
    $folio="";
    if(isset($variables['folio_reto'])){
        $folio = $variables['folio_reto'];
    }

    if($folio==""){

        $consulta = "SELECT * FROM concentrado_retos_segerencias ORDER BY id DESC";
        $query = mysqli_query($conexion,$consulta);
        while ($fila=$query -> fetch_array()) {
            $producto[] = $fila;
        }
        echo json_encode($producto);
        $query -> close();

    }else{
        $consulta = "SELECT * FROM concentrado_retos_segerencias WHERE folio_reto='$folio'";
        $query = mysqli_query($conexion,$consulta);
        while ($fila=$query -> fetch_array()) {
            $producto[] = $fila;
        }
        echo json_encode($producto);
        $query -> close();

       
    }
   
?>