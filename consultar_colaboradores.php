<?php
    session_start();
    header('Content-Type: application/json');
    $variables = json_decode(file_get_contents('php://input'), true);
    $resultado = [];
    $suma=0;
    $suma2=0;
    include "conexionGhoner.php";
    $consulta = "SELECT * FROM usuarios_colocaboradores_sugerencias ORDER BY id DESC";
    $query = mysqli_query($conexion,$consulta);
    while ($fila=$query -> fetch_array()) {
        $resultado[] = $fila;
        if($fila['password']!="123456"){
               $suma++; 
        }else{
            $suma2++;
        }
    }
    echo json_encode(['Registrados'=>$suma]+['NoRegistrados'=>$suma2]+$resultado);
    $query -> close();
?>