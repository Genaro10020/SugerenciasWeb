<?php
header("Content-Type: application/json");
$datos = json_decode(file_get_contents('php://input'), true);

                $tipo_de_impacto=$datos['tipo_de_impacto'];
                $id_concentrado=$datos['id_concentrado'];
                $folio=$datos['folio'];
                $impacto=$datos['impacto_cualitativo'];
                $tipo =$datos['tipo_impacto'];
                $puntos = $datos['puntos_asignados_cualitativos'];
                $validacion_de_impacto= $datos['validacion_de_impacto'];


$id_concentrado=$datos['id_concentrado'];
$folio=$datos['folio'];
$validacion_de_impacto=$datos['validacion_de_impacto'];
include "conexionGhoner.php";
$resultado = [];

$consulta = "SELECT * FROM impacto_cualitativo_sugerencias WHERE id_concentrado = '$id_concentrado' AND folio = '$folio'";
$query = mysqli_query( $conexion, $consulta);
 if(mysqli_num_rows($query)>0){//SI EXISTE EL REGISTRO ACTUALIZA NADA MAS.
               $actualizar = "UPDATE impacto_cualitativo_sugerencias SET id_concentrado = '$id_concentrado', folio = '$folio', impacto ='$impacto', tipo='$tipo', puntos = '$puntos' WHERE id_concentrado = '$id_concentrado'"; ;
               $querys = mysqli_query( $conexion, $actualizar);
               $resultado[] = $querys;
        
 }else{//SI NO EXISTE EL REGISTRO INSERTA.

      $insertar = "INSERT INTO impacto_cualitativo_sugerencias (id_concentrado,	folio, impacto, tipo, puntos) 
      VALUES ('$id_concentrado', '$folio', '$impacto', '$tipo', '$puntos')";
      $quer = mysqli_query( $conexion, $insertar);
      $resultado[] = $quer;
 }

   $actualizar = "UPDATE concentrado_sugerencias SET validacion_de_impacto ='$validacion_de_impacto' WHERE id = '$id_concentrado'"; ;
   $actualizando = mysqli_query( $conexion, $actualizar);
   $resultado[] = $actualizando;

echo  json_encode($resultado);
?>