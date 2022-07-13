<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
include "conexionGhoner.php";
$area=[];
$consulta = "SELECT * FROM lista_area_sugerencias";
$resultado = mysqli_query($conexion,$consulta);
while($datos=mysqli_fetch_array($resultado)){
    $area[] = $datos;
}
echo json_encode($area);
?>