<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$resultado="";
$id_concentrado=$variables['id_concentrado'];
$check=$variables['aceptado_rechazado'];
include "conexionGhoner.php";

        $actualizar = "UPDATE concentrado_sugerencias SET check_mc='$check' WHERE id = '$id_concentrado'";
        $query = mysqli_query( $conexion, $actualizar);

        $resultado=$query;
      
echo json_encode($resultado);
?>