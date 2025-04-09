<?php
session_start();
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

    if($cual_documento=="premio"){
        $actualizar = "UPDATE concentrado_premios_sugerencias SET cant_img='$cantidad', url_premio='' WHERE id = '$id_concentrado'";
        $query = mysqli_query($conexion,$actualizar);
    }

    if($cual_documento=="reto"){
        $actualizar = "UPDATE concentrado_retos_segerencias SET cantidad_img='$cantidad' WHERE id = '$id_concentrado'";
        $query = mysqli_query($conexion,$actualizar);
    }
    if($cual_documento=="sugerencia"){
        $actualizar = "UPDATE concentrado_sugerencias SET cantidadDOC='$cantidad' WHERE id = '$id_concentrado'";
        $query = mysqli_query($conexion,$actualizar);
    }
    if($cual_documento=="ppt"){
       
        if($cantidad=="0" || $cantidad==0)
        {// si ya no habra documentos

            $actualizar = "UPDATE concentrado_sugerencias SET cumplimiento ='99', status='En Implementación',  cantidadPPT='$cantidad', status_impacto = ''
            WHERE id = '$id_concentrado'";
            $query = mysqli_query($conexion,$actualizar);

            if( $_SESSION["tipo"] == 'Admin'){
                $actualizar = "UPDATE concentrado_sugerencias SET status_PPT = 'Eliminado'
                WHERE id = '$id_concentrado'";
                $query = mysqli_query($conexion,$actualizar);     
            }else{
                $actualizar = "UPDATE concentrado_sugerencias SET status_PPT = ''
                WHERE id = '$id_concentrado'";
                $query = mysqli_query($conexion,$actualizar);  
            }
         
            
        }else{
            $actualizar = "UPDATE concentrado_sugerencias SET cantidadPPT='$cantidad' WHERE id = '$id_concentrado'";
            $query = mysqli_query($conexion,$actualizar);
        }
        
    }
    if($cual_documento=="entregado"){
            $id_premio=$id_concentrado;
            $actualizar = "UPDATE canjer_premios_colaborador_sugerencias SET  cant_img_evidencia='$cantidad' WHERE id = '$id_premio'";
            $query = mysqli_query( $conexion, $actualizar);
    }

    $respuesta = "Archivo Eliminado";
} else{
   $respuesta = "No Eliminado";
}
echo json_encode($respuesta)
?>