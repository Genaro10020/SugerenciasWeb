<?php
session_start();
include "conexionGhoner.php";

$_POST = json_decode(file_get_contents("php://input"), true);

if(isset($_POST['id_usuario'])) {
    $id = $_POST['id_usuario'];
    
    $query = "UPDATE usuarios_sugerencias SET status = 'activo' WHERE id = '$id'";
    $resultado = mysqli_query($conexion, $query);
    
    if($resultado) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => mysqli_error($conexion)]);
    }
} else {
    echo json_encode(["success" => false, "error" => "No se recibió el ID de usuario desde Vue"]);
}
?>