<?php
session_start();
header("Content-Type: application/json");

include "conexionBO.php";

// Preparar consulta
$id = $_SESSION['id'];
$consulta = "SELECT * FROM bsoapp_employe WHERE id_usuario_colaborador  = $id LIMIT 1";
$resultado = mysqli_query($conexion, $consulta);
// Verificar si hay resultado
if ($resultado && mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_assoc($resultado); // solo array asociativo
    echo json_encode(["success" => true, "resultado" => $fila]);
} else {
    echo json_encode(["success" => false,"error" => "Usuario no encontrado"]);
}
exit;