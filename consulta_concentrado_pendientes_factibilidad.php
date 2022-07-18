<?php
    session_start();
    header('Content-Type: application/json');
    include "conexionGhoner.php";
    $producto = [];
    $nombre= $_SESSION['nombre'];
    $pendiente_o_vencida="status_factibilidad";
    $consulta = "SELECT * FROM concentrado_sugerencias WHERE status='En Factibilidad' AND analista_de_factibilidad='$nombre' ORDER BY id DESC";
    $query = mysqli_query($conexion,$consulta);
    while ($fila=$query -> fetch_array()) {
                    $fecha_actual = strtotime(date("d-m-Y",time()));
                    $fecha_limite = strtotime($fila['fecha_limite']);

                    if($fecha_actual > $fecha_limite){
                            $respuesta="Vencida";
                    }else{
                            $respuesta="Pendiente";
                    }
        $producto[] = [$pendiente_o_vencida=>$respuesta]+$fila;//agrego un dato al arreglo pendiete o vencida para mostar boton segun si esta en factibilidad pendiete o vencida.
    }
    echo json_encode($producto);
    $query -> close();
?>