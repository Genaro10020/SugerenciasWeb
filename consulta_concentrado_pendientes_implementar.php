<?php
    session_start();
    header('Content-Type: application/json');
    include "conexionGhoner.php";
    $producto = [];
    $dias =0;
    $nombre= $_SESSION['nombre'];
    $pendiente_o_vencida="status_factibilidad";
    $consulta = "SELECT * FROM concentrado_sugerencias WHERE status='En Implementación' AND analista_de_factibilidad='$nombre' ORDER BY id DESC";
    $hoy = date("Y-m-d");
    $query = mysqli_query($conexion,$consulta);
    while ($fila=$query -> fetch_array()) {
        $fecha_compromiso=$fila['fecha_compromiso'];
        $date1 = new DateTime($fecha_compromiso);
        $date2 = new DateTime($hoy);
        if($date1>=$date2){
            $diff = $date1->diff($date2);
            $dias=$diff->d;
            //$diff->days;
        }else{
            $dias =0;
        }
       

        $producto[] = ["dias_restantes"=>$dias]+$fila;//agrego un dato al arreglo pendiete o vencida para mostar boton segun si esta en factibilidad pendiete o vencida.
    }
    echo json_encode($producto);
    $query -> close();
?>