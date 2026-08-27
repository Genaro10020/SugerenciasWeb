<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$usuario=$variables['nuevo_usuario'];
$pasword=$variables['nuevo_password'];
$nombre=$variables['nuevo_nombre'];
$correo=$variables['nuevo_correo'];
$planta = $variables['planta'];
$area= $variables['area'];
$subarea = $variables['subarea'];
$departamento=$variables['nuevo_departamento'];
$tipo_usuario=$variables['var_tipo_usuario'];
$accion=$variables['accion'];
include "conexionGhoner.php";

        if($accion=="guardar"){
                $consulta = "INSERT INTO usuarios_sugerencias (user,password,email,nombre,planta,area,subarea,departamento,tipo)  VALUES ('$usuario','$pasword','$correo','$nombre','$planta','$area','$subarea','$departamento','$tipo_usuario')";
                $query = mysqli_query( $conexion, $consulta);
                if($query==true){
                        $resultado="Bien";
                }else{
                        $resultado="Mal";
                }
        }

        if($accion=="actualizar"){
                $id=$variables['id'];
                $actualizar = "UPDATE usuarios_sugerencias SET user='$usuario',password='$pasword',email='$correo', nombre='$nombre',planta='$planta',area='$area',subarea='$subarea',departamento='$departamento',tipo='$tipo_usuario' WHERE id='$id'";
                $query = mysqli_query( $conexion, $actualizar);
                if($query==true){
                        $resultado="Bien";
                }else{
                        $resultado="Mal";
                }
        }

echo json_encode($resultado);
?>