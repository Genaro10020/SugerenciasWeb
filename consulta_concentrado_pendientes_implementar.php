<?php
    session_start();
    header('Content-Type: application/json');
    include "conexionGhoner.php";
    $producto = [];
    $nombre= $_SESSION['nombre'];
    $pendiente_o_vencida="status_factibilidad";
    $consulta = "SELECT * FROM concentrado_sugerencias WHERE status='En Implementación' AND analista_de_factibilidad='$nombre' ORDER BY id DESC";
    $hoy = date("Y-m-d");
    $query = mysqli_query($conexion,$consulta);
    while ($fila=$query -> fetch_array()) {
        $fecha_compromiso=$fila['fecha_compromiso'];
        /*$date1 = new DateTime("2015-02-14");
        $date2 = new DateTime("2015-02-16");*/
       // $diff = $date1->diff($date2);
        // will output 2 days
        //echo $diff->days . ' days ';

        $producto[] = ["hoy"=>$hoy,"hasta"=>$fecha_compromiso]+$fila;//agrego un dato al arreglo pendiete o vencida para mostar boton segun si esta en factibilidad pendiete o vencida.
    }
    echo json_encode($producto);
    $query -> close();
?>