<?php

session_start();
include "conexionGonher.php";

$_POST = json_decode(file_get_contents("php://input"), true);

if(isset($_POST['id_usuario'])) {
    $id = $_POST['id_usuario'];

    $query = "UPDATE usuarios_sugerencias SET status = 'no activo' WHERE id = '$id'";
    $resultado = mysqli_query($conexion, $query);

    if($resultado) {
        echo json_decode(true);
    } else {
        echo json_decode(false);
    }
} else {
    echo json_decode(false);
}
?>