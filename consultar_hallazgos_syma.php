<?php
    session_start();
    header('Content-Type: application/json');
    $variables = json_decode(file_get_contents('php://input'), true);
    include "conexionGhoner.php";
    $user = $_SESSION['usuario'];

    $resultado= [];
    $consulta = "SELECT * FROM seguridad_syma WHERE numero_nomina='$user' ORDER BY id DESC";
    $query = mysqli_query($conexion,$consulta);
        while($fila=mysqli_fetch_array($query)){
            $resultado[]= $fila; 
        }
echo json_encode($resultado);
?>
