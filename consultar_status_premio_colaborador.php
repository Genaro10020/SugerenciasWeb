<?php
    session_start();
    header('Content-Type: application/json');
    $variables = json_decode(file_get_contents('php://input'), true);
    $id_seguimiento_premio = $variables['id_seguimiento_premio'];

    include "conexionGhoner.php";
    
    //consulta de detalle de pedido de seguimiento.
    $consulta = $conexion->prepare("SELECT * FROM canjer_premios_colaborador_sugerencias WHERE id = ?  AND `status`!='Sin aceptar'");

    if(!$consulta){
        die("Error en prepare: ".$conexion->error);
    }
    $consulta->bind_param("i", $id_seguimiento_premio);
    $consulta->execute();

    $resultado = $consulta->get_result();

    $data=[];

    while($row = $resultado->fetch_assoc()){
        $data[] = $row;
    }

    echo json_encode($data);
    $consulta->close();
?>  



