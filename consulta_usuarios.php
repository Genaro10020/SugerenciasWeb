<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
include "conexionGhoner.php";
$usuarios=[];
$consulta = "SELECT * FROM usuarios_sugerencias ORDER BY id DESC";
$resultado = mysqli_query($conexion,$consulta);
while($datos=mysqli_fetch_array($resultado)){
    $usuarios[] =  $datos;
}
echo json_encode($usuarios);
?>