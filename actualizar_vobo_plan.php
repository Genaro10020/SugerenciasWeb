<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$resultado="";
$id_concentrado=$variables['id_concentrado'];
$check=$variables['aceptado_rechazado'];
$status=$variables['status'];





include "conexionGhoner.php";
if($status!="Implementada" && $check =="Aceptado"){// si esta en Factibilidad o En Implementación se actualiza pero si esta en Inplementada no haga nada.
        $actualizar = "UPDATE concentrado_sugerencias SET status='En Implementación', check_mc='$check' WHERE id = '$id_concentrado'";
}
if($status !="En Implementación" && $status !="Implementada" && $check =="Rechazado"){
        $actualizar = "UPDATE concentrado_sugerencias SET status='En Factibilidad', check_mc='$check' WHERE id = '$id_concentrado'";
}
if($status =="En Implementación" && $check =="Rechazado" || $status =="Implementada" && $check =="Rechazado"){
        $actualizar = "UPDATE concentrado_sugerencias SET status='$status', check_mc='$check' WHERE id = '$id_concentrado'";
}
$query = mysqli_query( $conexion, $actualizar);
$resultado=$query;

echo json_encode($resultado);
?>