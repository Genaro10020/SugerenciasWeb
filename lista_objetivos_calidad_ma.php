<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
include "conexionGhoner.php";
$objetivos=[];
$consulta = "SELECT * FROM lista_objetivos_calidad_sugerencias";
$resultado = mysqli_query($conexion,$consulta);
while($datos=mysqli_fetch_array($resultado)){
    $objetivos[] = $datos;
}
echo json_encode($objetivos);
?>  