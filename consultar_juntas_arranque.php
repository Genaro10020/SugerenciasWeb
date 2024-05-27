<?php
    session_start();
    header('Content-Type: application/json');
    $variables = json_decode(file_get_contents('php://input'), true);
    include "conexionEADs.php";
    $id_equipo=$_GET['id_ead'];
    $resultado= [];
    $consulta = "SELECT * FROM juntas_arranque WHERE id_equipo='$id_equipo' ORDER BY id DESC";//consulto al equipo EAD
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