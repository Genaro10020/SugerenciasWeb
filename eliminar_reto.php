<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
include "conexionGhoner.php";
$id_reto=$variables['id_reto'];

                $eliminar = "DELETE FROM concentrado_retos_segerencias WHERE id = '$id_reto'";
                $query = mysqli_query($conexion,$eliminar);
                if($query==true){
                        $resultado="si";
                }else if($query==false) {
                        $resultado="No Eliminado";
                }else{
                        $resultado="error elimina";
                }
        
echo json_encode($resultado);
?>