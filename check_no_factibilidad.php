<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);

$id_concentrado=$variables['id_concentrado'];
$vistobueno=$variables['vistobueno'];
$valor = 0;
$resultado= 0;
if($vistobueno==1){
        $valor = 100;
}else{
        $valor = 0;
}
include "conexionGhoner.php";

        $actualizar = " UPDATE concentrado_sugerencias SET cumplimiento=$valor WHERE id = '$id_concentrado'";
        $query = mysqli_query( $conexion, $actualizar);
         $resultado = $query;
 

echo json_encode($resultado);
?>