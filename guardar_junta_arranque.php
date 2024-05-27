<?php
    session_start();
    header('Content-Type: application/json');
    $variables = json_decode(file_get_contents('php://input'), true);
    include "conexionEADs.php";
    $respuesta= '';

    $id_equipo = $_SESSION['id_ead'];
    $nombre_ead = $variables['nombre_ead'];
    $lider = $_SESSION["nombre"];
    $ids_integrantes=json_encode($variables['ids_integrantes']);
    $ids_asistentes=json_encode($variables['ids_asistentes']);
    $asistencia=$variables['asistencia'];
    $hora_inicial=$variables['hora_inicial'];
    $hora_final=$variables['hora_final'];
    $transcurrido=$variables['tiempo_transcurrido'];

    $insertar = "INSERT INTO juntas_arranque(id_equipo,nombre_ead,nombre_lider,ids_integrantes,ids_asistentes,asistencia,hora_inicial,hora_final,total_tiempo) VALUES ('$id_equipo','$nombre_ead','$lider','$ids_integrantes','$ids_asistentes','$asistencia','$hora_inicial','$hora_final','$transcurrido')";//consulto al equipo EAD
    $query = mysqli_query($con,$insertar);
    if($query){
        $respuesta = true;
    }else{
        $respuesta = $con->error;
    }
    echo json_encode($respuesta);
 
?>