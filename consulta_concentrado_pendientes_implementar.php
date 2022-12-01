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
        $f_final = new DateTime($fecha_compromiso);
        $f_actual = new DateTime($hoy);
        $diff = $f_actual->diff($f_final);
        $dias=$diff->format('%R'.$diff->days);
       

        $producto[] = ["dias_restantes"=>$dias]+$fila;//agrego un dato al arreglo pendiete o vencida para mostar boton segun si esta en factibilidad pendiete o vencida.
    }
    echo json_encode($producto);
    $query -> close();
?>