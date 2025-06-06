<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);

$areasEnerya = [];
$areasRiasa = [];
include "conexionGhoner.php";
$consulta = "SELECT * FROM areas_enerya_syma" ;
$resultado = mysqli_query($conexion,$consulta);
while($datos=mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
    $areasRiasa[] =  $datos;
}

$consulta = "SELECT * FROM areas_riasa_syma" ;
$resultado = mysqli_query($conexion,$consulta);
while($datos=mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
    $areasEnerya[] =  $datos;
}

$respuesta = [];
$respuesta = ['Enerya'=>$areasEnerya,'Riasa'=>$areasRiasa];
echo json_encode($respuesta);
?>