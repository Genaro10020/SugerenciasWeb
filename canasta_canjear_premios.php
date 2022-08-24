<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$resultado ="";
$id_premio = $variables['id_premio'];
$codigo = $variables['codigo_premio'];
$img_url = $variables['img_url'];
$descripcion = $variables['descripcion'];
$puntos = $variables['puntos'];


if(isset($variables['cantidad'])){
        $cantidad = $variables['cantidad'];
}
if(isset($variables['numero_nomina'])){
        $numero_nomina = $variables['numero_nomina'];
}



date_default_timezone_set('America/Mexico_City');
$fecha = date("Y-m-d");
include "conexionGhoner.php";

        $consultar = "SELECT * FROM canjer_premios_colaborador_sugerencias WHERE id_premio='$id_premio'";
        $query = mysqli_query( $conexion, $consultar);
        if(mysqli_num_rows($query)>0){

                if($cantidad==0){
                        $delete = "DELETE FROM canjer_premios_colaborador_sugerencias WHERE id_premio = '$id_premio'";
                        $query = mysqli_query( $conexion, $delete);

                }else{
                        $consulta = "UPDATE canjer_premios_colaborador_sugerencias SET numero_nomina = '$numero_nomina', descripcion = '$descripcion', cantidad='$cantidad', puntos_para_canjear='$puntos', img_url='$img_url'  WHERE id_premio = '$id_premio'";
                        $query = mysqli_query( $conexion, $consulta);
                }
               

        }else{
                
                if($cantidad!=0){
                        $consulta = "INSERT INTO canjer_premios_colaborador_sugerencias (id_premio,numero_nomina, descripcion, cantidad, puntos_para_canjear, img_url,fecha, status)  VALUES ('$id_premio ','$numero_nomina','$descripcion','$cantidad','$puntos','$img_url','$fecha','Sin aceptar')";
                        $query = mysqli_query( $conexion, $consulta);
                }else{
                        $query=true;
                }       
        }
        
        $resultado = $query;
    
echo json_encode($resultado);
?>