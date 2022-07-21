<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);

$numero_actividad=$variables['numero_actividad'];
$actividad=$variables['actividad'];
$responsable_plan=$variables['responsable_plan'];
$fecha_inicial_actividad=$variables['fecha_inicial_actividad'];
$fecha_final_actividad=$variables['fecha_final_actividad'];
$tipo_usuario=$variables['var_tipo_usuario'];
$porcentaje=$variables['porcentaje'];
$resultado = "AQUI VOY";
/*include "conexionGhoner.php";
        
$consulta = "INSERT INTO usuarios_sugerencias (user,password,email,nombre,departamento,tipo)  VALUES ('$usuario','$pasword','$correo','$nombre','$departamento','$tipo_usuario')";
        $query = mysqli_query( $conexion, $consulta);
        if($query==true){
                $resultado="Bien";
        }else{
                $resultado="Mal";
        }*/
    
echo json_encode($resultado);
?>