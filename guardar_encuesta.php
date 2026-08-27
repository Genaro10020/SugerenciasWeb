<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$resultado="";

$numero_nomina=$variables['numero_nomina'];




date_default_timezone_set('America/Mexico_City');
$fecha = date("Y-m-d");

include "conexionGhoner.php";

        for ($i=1; $i <= 3; $i++) {
            if($i==1){
                $pregunta=$variables['pregunta1'];
                $respuesta=$variables['respuesta1'];
            }
            if($i==2){
                $pregunta=$variables['pregunta2'];
                $respuesta=$variables['respuesta2'];
            }
            if($i==3){
                $pregunta=$variables['pregunta3'];
                $respuesta=$variables['respuesta3'];
            }

         
                    $insertar= "INSERT INTO encuesta_sugerencias (numero_nomina, pregunta, respuesta, fecha) VALUES ('$numero_nomina','$pregunta','$respuesta','$fecha')";
                    $query = mysqli_query( $conexion, $insertar);
                    $resultado = $query;
                    if($resultado){
                        $resultado = "correcto";
                    }else{
                        $resultado = "mal";
                    }
            }

echo json_encode($resultado);
?>