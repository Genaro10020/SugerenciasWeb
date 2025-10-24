<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);

$usuario=$variables['nombre_newresp'];
$email=$variables['correo_newresp'];
$id_seccion=$variables['seccion_elegida'];

include "conexionGhoner.php";
        $insertar = "INSERT INTO responsables_secciones_syma (usuario,	email, id_seccion) 
        VALUES ('$usuario', '$email','$id_seccion')";
        $query = mysqli_query( $conexion, $insertar);
        $resultado = $query;

    
echo json_encode($query);
?>