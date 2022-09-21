<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
include "conexionGhoner.php";
$analistas=[];
$consulta = "SELECT * FROM usuarios_sugerencias WHERE tipo = 'Analista' || tipo = 'Responsable'" ;
$resultado = mysqli_query($conexion,$consulta);
while($datos=mysqli_fetch_array($resultado)){
    $analistas[] = $datos;
}
echo json_encode($analistas);
?>