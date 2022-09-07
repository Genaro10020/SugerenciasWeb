<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$resultado="";
$id_concentrado=$variables['id_concentrado'];
$indicador=$variables['indicador'];
$folio=$variables['folio'];
$unidades=$variables['unidades'];
$linea_base=$variables['linea_base'];
$periodo_de_medicion=$variables['periodo_de_medicion'];
$mes1=$variables['mes1'];
$mes2=$variables['mes2'];
$mes3=$variables['mes3'];
$mes4=$variables['mes4'];
$mes5=$variables['mes5'];
$mes6=$variables['mes6'];
$mes7=$variables['mes7'];
$mes8=$variables['mes8'];
$mes9=$variables['mes9'];
$mes10=$variables['mes10'];
$mes11=$variables['mes11'];
$mes12=$variables['mes12'];
$orden=$variables['orden'];

include "conexionGhoner.php";
$consulta = "SELECT * FROM concentrado_impacto_sugerencias WHERE id_concentrado='$id_concentrado' AND orden='$orden'";
$query= mysqli_query( $conexion, $consulta);
if(mysqli_num_rows($query)>0){
        
        $actualizando = "UPDATE concentrado_impacto_sugerencias SET indicador='$indicador', unidades='$unidades', linea_base='$linea_base', 
        periodo='$periodo_de_medicion', mes1='$mes1', mes2='$mes2', mes3='$mes3', mes4='$mes4',	mes5='$mes5', 	mes6='$mes6',	mes7='$mes7', mes8='$mes8',	mes9='$mes9', 	mes10='$mes10', mes11='$mes11', mes12='$mes12' 
        WHERE id_concentrado = '$id_concentrado' AND orden='$orden'";
        $query= mysqli_query( $conexion, $actualizando);
        $resultado=$query;

}else{

    $insertar = "INSERT INTO concentrado_impacto_sugerencias (id_concentrado, folio, indicador, unidades, linea_base, 
    periodo, mes1, mes2, mes3, 	mes4, 	mes5, 	mes6, 	mes7, 	mes8, 	mes9, 	mes10, 	mes11, 	mes12, 	acumulado,	status, orden) 
    VALUES ('$id_concentrado','$folio','$indicador','$unidades','$linea_base','$periodo_de_medicion','$mes1','$mes2','$mes3','$mes4',
    '$mes5','$mes6','$mes7','$mes8','$mes9','$mes10','$mes11','$mes12','','Midiendo','$orden')";
    $query = mysqli_query( $conexion, $insertar);
    $resultado=$query;

}
echo json_encode($resultado);
?>