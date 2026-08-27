<?php
    session_start();
    header('Content-Type: application/json');
    $variables = json_decode(file_get_contents('php://input'), true);
    include "conexionGhoner.php";
    $usuario = $_SESSION['usuario'];
    $producto = [];
    $folio="";
    if(isset($variables['folio_sugerencia'])){
        $folio = $variables['folio_sugerencia'];
    }
    if($folio==""){
            $consulta = "SELECT * FROM concentrado_sugerencias WHERE numero_nomina=$usuario ORDER BY id DESC";
            $query = mysqli_query($conexion,$consulta);
            while ($fila=$query -> fetch_array()) {
                $producto[] = $fila;
            }
    }else{
        $consulta = "SELECT * FROM concentrado_sugerencias WHERE numero_nomina=$usuario AND folio='$folio'";
        $query = mysqli_query($conexion,$consulta);
        while ($fila=$query -> fetch_array()) {
            $producto[] = $fila;
        }
    }
    
    echo json_encode($producto);
    $query -> close();
?>