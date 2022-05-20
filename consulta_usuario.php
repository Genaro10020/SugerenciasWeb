<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
include "conexionGhoner.php";
$usuario=$variables['usuario'];
$consulta = "SELECT * FROM usuarios_sugerencias WHERE user = '$usuario'" ;
$resultado = mysqli_query($conexion,$consulta);
while($datos=mysqli_fetch_array($resultado)){
    $usuario =  $datos;
}
echo json_encode($usuario);
?>