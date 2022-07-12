<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$usuario=$variables['nuevo_usuario'];
$pasword=$variables['nuevo_password'];
$nombre=$variables['nuevo_nombre'];
$correo=$variables['nuevo_correo'];
$departamento=$variables['nuevo_departamento'];
$tipo_usuario=$variables['var_tipo_usuario'];
include "conexionGhoner.php";

        $consulta = "INSERT INTO usuarios_sugerencias (user,password,email,nombre,departamento,tipo)  VALUES ('$usuario','$pasword','$nombre','$correo','$departamento','$tipo_usuario')";
        $query = mysqli_query( $conexion, $consulta);
        if($query==true){
                $resultado="Bien";
        }else{
                $resultado="Mal";
        }
    
echo json_encode($resultado);
?>