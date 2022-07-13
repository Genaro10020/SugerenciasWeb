<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
include "conexionGhoner.php";
$status=[];
$consulta = "SELECT * FROM lista_status_sugerencias";
$resultado = mysqli_query($conexion,$consulta);
while($datos=mysqli_fetch_array($resultado)){
    $status[] = $datos['status'];
}
echo json_encode($status);
?>