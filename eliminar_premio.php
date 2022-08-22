<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
include "conexionGhoner.php";
$id_premio=$variables['id_premio'];

                $eliminar = "DELETE FROM concentrado_premios_sugerencias WHERE id = '$id_premio'";
                $query = mysqli_query($conexion,$eliminar);
                if($query==true){
                        $resultado="si";
                }else if($query==false) {
                        $resultado="No Eliminado";
                }else{
                        $resultado=$query;
                }
        
echo json_encode($resultado);
?>