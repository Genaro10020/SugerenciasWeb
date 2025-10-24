<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
include "conexionGhoner.php";
$usuario=$variables['usuario_id'];

$eliminar = "DELETE FROM responsables_secciones_syma WHERE id = '$usuario'";
$query = mysqli_query($conexion,$eliminar);
$resultado=$query;
        
echo json_encode($query);
?>