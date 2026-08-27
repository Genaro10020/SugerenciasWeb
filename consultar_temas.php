<?php
    session_start();
    header('Content-Type: application/json');
    $variables = json_decode(file_get_contents('php://input'), true);
    include "conexionEADs.php";
    
    $resultado= [];
    $consulta = "SELECT * FROM temas_junta_arranque";//consulto al equipo EAD
    $query = mysqli_query($con,$consulta);
    if($query){
        $estado = true;
        while ($fila=$query -> fetch_array()) {
            $resultado[] = $fila;
        }
    }else{
        $estado = $con->error;
    }
    echo json_encode(array($estado,$resultado));
    $query -> close();
?>