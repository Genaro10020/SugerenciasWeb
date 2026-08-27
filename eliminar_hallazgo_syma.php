<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
include "conexionGhoner.php";
$id_eliminar= isset($_GET['id']) ? $_GET['id'] : null;
$consulta = "DELETE FROM seguridad_syma WHERE id = $id_eliminar" ;
$resultado = mysqli_query($conexion,$consulta);
echo json_encode($resultado);
?>