<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
include "conexionGhoner.php";
$id=$variables['id'];

                $eliminar = "DELETE FROM plan_trabajo_sugerencias WHERE id = '$id'";
                $query = mysqli_query($conexion,$eliminar);
                if($query==true){
                        $resultado="si";
                }else if($query==false) {
                        $resultado="no eliminado";
                }else{
                        $resultado="error elimina";
                }
        
echo json_encode($resultado);
?>