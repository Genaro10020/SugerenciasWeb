<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
include "conexionGhoner.php";
$id_eliminar=$variables['eliminar_sugerencia'];
$consulta = "DELETE FROM concentrado_sugerencias WHERE id = $id_eliminar" ;
$resultado = mysqli_query($conexion,$consulta);
echo json_encode($resultado);
?>