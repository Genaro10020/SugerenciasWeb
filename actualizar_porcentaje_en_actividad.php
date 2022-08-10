<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$id_actividad=$variables['id_actividad'];
$porcentaje_actividad=$variables['porcentaje_actividad'];
$id_concentrado=$variables['id_concentrado'];
$resultado=0;
include "conexionGhoner.php";

        $actualizar = "UPDATE plan_trabajo_sugerencias SET porcentaje='$porcentaje_actividad' WHERE id = '$id_actividad'";
        $query = mysqli_query( $conexion, $actualizar);

        $consulta = "SELECT * FROM plan_trabajo_sugerencias WHERE id_concentrado = $id_concentrado";
        $query = mysqli_query( $conexion, $consulta);
        while ($porcentajes=mysqli_fetch_array($query)){
                $resultado=(int)$porcentajes['porcentaje']+(int)$resultado;
        }
        
echo json_encode($resultado);
?>