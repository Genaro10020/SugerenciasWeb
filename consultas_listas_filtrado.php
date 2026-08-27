<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
include "conexionGhoner.php";


$arregloPlantas=[];
$arregloAreas=[];
$arregloSubareas=[];
$arregloAnalistas=[];
$arregloResponsables=[];


$consulta = "SELECT DISTINCT planta FROM lista_planta_sugerencias " ;
$resultado = mysqli_query($conexion,$consulta);
while($datos=mysqli_fetch_array($resultado)){
    $arregloPlantas[] = $datos;
}

$consulta = "SELECT DISTINCT area FROM lista_area_sugerencias" ;
$resultado = mysqli_query($conexion,$consulta);
while($datos=mysqli_fetch_array($resultado)){
    $arregloAreas[] = $datos;
}

$consulta = "SELECT DISTINCT subarea FROM lista_subarea_sugerencias" ;
$resultado = mysqli_query($conexion,$consulta);
while($datos=mysqli_fetch_array($resultado)){
    $arregloSubareas[] = $datos;
}

$consulta = "SELECT DISTINCT nombre FROM usuarios_sugerencias" ;
$resultado = mysqli_query($conexion,$consulta);
while($datos=mysqli_fetch_array($resultado)){
    $arregloAnalistas[] = $datos;
}

$consulta = "SELECT DISTINCT responsable FROM plan_trabajo_sugerencias" ;
$resultado = mysqli_query($conexion,$consulta);
while($datos=mysqli_fetch_array($resultado)){
    $arregloResponsables[] = $datos;
}

//combiana los arreglos en un objeto
$objeto = array( 
    "plantas" => $arregloPlantas,
    "areas" =>  $arregloAreas,
    "subareas" =>  $arregloSubareas,
    "analistas" => $arregloAnalistas,
    "responsables" => $arregloResponsables
);

echo json_encode($objeto);
mysqli_close($conexion);
?>

