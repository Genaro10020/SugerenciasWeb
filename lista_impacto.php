<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
include "conexionGhoner.php";
$impacto=[];
$consulta = "SELECT * FROM lista_impacto_sugerencias";
$resultado = mysqli_query($conexion,$consulta);
while($datos=mysqli_fetch_array($resultado)){
    $impacto[] = $datos;
}
echo json_encode($impacto);
?>