<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$resultado=[];
$consulta1 = "";
$consulta2 = "";
$id_concentrado=$variables['id_concentrado'];
$enviado_o_no=$variables['enviado_o_no'] ;
$check=$variables['check_mc_anterior'] ;
if($check=="Pendiente"){
        $check = "Pendiente";
}else if($check=="Rechazado"){
        $check = "Corregido";
}else if($check=="Aceptado"){
        $check = "Corregido";
}else{
        $check = "Pendiente";
}

include "conexionGhoner.php";

        $actualizar1 = "UPDATE plan_trabajo_sugerencias SET enviado_o_no='$enviado_o_no' WHERE id_concentrado = '$id_concentrado'";
        $query1 = mysqli_query( $conexion, $actualizar1);
        
        $consulta1=$query1;

        $actualizar2 = "UPDATE concentrado_sugerencias SET check_mc='$check' WHERE id = '$id_concentrado'";
        $query2 = mysqli_query( $conexion, $actualizar2);

        $consulta2=$query2;
        $resultado = [$check,$consulta1,$consulta2];
echo json_encode($resultado);
?>