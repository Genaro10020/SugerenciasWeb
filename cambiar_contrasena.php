<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$numero_nomina=$variables['numero_nomina'];
$nueva_contrasena=$variables['nueva_contrasena'];
$contrasena_actual=$variables['contrasena_actual'];
include "conexionGhoner.php";




$consulta = "SELECT * FROM concentrado_sugerencias WHERE password = '$contrasena_actual' && numero_nomina ='$numero_nomina'";
$resultado = mysqli_query($conexion,$consulta);


if($row=mysqli_num_rows($resultado)>0){
            $actualizar= "UPDATE concentrado_sugerencias SET password = '$nueva_contrasena' WHERE numero_nomina='$numero_nomina' AND password='$contrasena_actual'";
            $query = mysqli_query( $conexion, $actualizar);
            $resultado = $query;
            if($resultado){
                $resultado = "correcto";
            }else{
                $resultado = "mal";
            }
}else{
    $resultado = 'incorrecto';
}
  


      
  
echo json_encode($resultado);
?>