<?php
header('Content-Type: application/json');
$respuesta ="";
$variables = json_decode(file_get_contents('php://input'), true);
include "conexionGhoner.php";  
$ruta = $variables['ruta_eliminar']; //recibo la ruta completa
$cual_documento = $variables['cual_documento']; 
if(isset($variables['id_concentrado'])){
    $id_concentrado = $variables['id_concentrado']; 
}
if(isset($variables['cantidad'])){
    $cantidad = $variables['cantidad'];
}

$ruta_eliminar_doc=str_replace("http://localhost/sugerencias/","",$ruta);//elimino datos de ruta que no son necesarias
if(unlink($ruta_eliminar_doc)){
    if($cual_documento=="sugerencia"){
        $actualizar = "UPDATE concentrado_sugerencias SET cantidadDOC='$cantidad' WHERE id = '$id_concentrado'";
        $query = mysqli_query($conexion,$actualizar);
    }
    if($cual_documento=="ppt"){
        $actualizar = "UPDATE concentrado_sugerencias SET cantidadPPT='$cantidad' WHERE id = '$id_concentrado'";
        $query = mysqli_query($conexion,$actualizar);
    }
    $respuesta = "Archivo Eliminado";
} else{
   $respuesta = "No Eliminado";
}
echo json_encode($respuesta)
?>