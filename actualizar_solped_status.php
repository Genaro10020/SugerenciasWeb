<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);

$id_premio=$variables['id_premio'];
$numero_solped=$variables['numero_solped'];
$premio_status=$variables['premio_status'];

                if($premio_status!="Entregado"){
                    if($numero_solped!=null  || $numero_solped!=""){
                       $premio_status = "Pte. Entrega";
                    }else{
                       $premio_status = "Pte. Solped";
                    }
                }


include "conexionGhoner.php";

        $actualizar = "UPDATE canjer_premios_colaborador_sugerencias SET solped='$numero_solped', status='$premio_status' WHERE id = '$id_premio'";
        $query = mysqli_query( $conexion, $actualizar);
        $resultado = $query;

echo json_encode($resultado);
?>