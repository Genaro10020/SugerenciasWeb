<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$id_concentrado=$variables['id_concentrado'];
$folio=$variables['folio'];
include "conexionGhoner.php";
$resultado = "";
        $consulta = "SELECT * FROM no_factible_puntos WHERE folio ='$folio' AND id_concentrado ='$id_concentrado'";
        $query=$conexion->query($consulta);
        while ($fila= $query->fetch_array()) {
            $resultado= $fila['puntos'];
        }
       
        
echo json_encode($resultado);
?>