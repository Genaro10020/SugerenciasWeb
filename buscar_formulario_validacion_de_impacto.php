<?php
header("Content-Type: application/json");
$datos = json_decode(file_get_contents('php://input'), true);
$id_concentrado=$datos['id_concentrado'];
$folio=$datos['folio'];
$cuantitativo_o_cualitativo = $datos['cuantitativo_o_cualitativo'];
include "conexionGhoner.php";
$resultado="";
if($cuantitativo_o_cualitativo=="Cuantitativo"){
     $consulta = "SELECT * FROM impacto_cuantitativo_sugerencias WHERE id_concentrado = '$id_concentrado' AND folio = '$folio'";
     $query = mysqli_query( $conexion, $consulta);
     while($obteniendo=mysqli_fetch_array($query)){
          $resultado = $obteniendo;
     }
}
if($cuantitativo_o_cualitativo=="Cualitativo"){
     $consulta = "SELECT * FROM impacto_cualitativo_sugerencias WHERE id_concentrado = '$id_concentrado' AND folio = '$folio'";
     $query = mysqli_query( $conexion, $consulta);
     while($obteniendo=mysqli_fetch_array($query)){
          $resultado = $obteniendo;
     }
}

echo  json_encode($resultado);
?>