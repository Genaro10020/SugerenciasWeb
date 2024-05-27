<?php
    session_start();
    header('Content-Type: application/json');
    $variables = json_decode(file_get_contents('php://input'), true);
    $integrantes_ids;
    $integrantes = [];
    $estado = '';
    include "conexionEADs.php";
    $id_ead=$_SESSION['id_ead'];
    $integrantes = [];
    $dato_quipo = [];
    $consulta = "SELECT * FROM equipos_ead WHERE id='$id_ead' LIMIT 1";//consulto al equipo EAD
    $query = mysqli_query($con,$consulta);
    if($query){ $estado=true;}else{$estado=false;}

    while ($fila=$query -> fetch_array()) {
        $integrantes_ids = $fila['integrantes'];
        $dato_quipo = $fila;
    }
    // Mostrar el array resultante
    $integrantes_ids=json_decode($integrantes_ids);
    $tamanio=count($integrantes_ids);
    $vueltas=0;

    include "conexionGhoner.php";
    for ($i=0; $i < $tamanio; $i++) { 
        $id_integrante=$integrantes_ids[$i];
        $select = "SELECT * FROM usuarios_colocaboradores_sugerencias WHERE id='$id_integrante' LIMIT 1";//consultando integrante x integrante
        $query = mysqli_query($conexion,$select);
        while ($fila=$query -> fetch_array()) {
            $integrantes[]=$fila;
        }
    }
    //$integrantes = json_encode($integrantes, JSON_UNESCAPED_UNICODE);//arreglo en cadena
    echo json_encode(array($estado,$integrantes,$dato_quipo));
    $query -> close();
?>