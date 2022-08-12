<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$id_actividad=$variables['id_actividad'];
$porcentaje_actividad=$variables['porcentaje_actividad'];
$id_concentrado=$variables['id_concentrado'];
$suma=0;
$cumplimiento=0;
$cantidad_actividades=0;
$resultado = [];
include "conexionGhoner.php";

        $actualizar = "UPDATE plan_trabajo_sugerencias SET porcentaje='$porcentaje_actividad' WHERE id = '$id_actividad'";
        $query1 = mysqli_query( $conexion, $actualizar);
        $resultado[] = $query1;

        $consulta = "SELECT * FROM plan_trabajo_sugerencias WHERE id_concentrado = $id_concentrado ORDER BY num_actividad ASC " ;
        $query2 = mysqli_query( $conexion, $consulta);
        while ($datos=mysqli_fetch_array($query2)){
                $suma=(int)$datos['porcentaje']+(int)$suma;
                $cantidad_actividades++;
        }
        
        $cumplimiento=$suma/(int)$cantidad_actividades;
        $cumplimiento=round($cumplimiento, 0, PHP_ROUND_HALF_DOWN);
        if($cumplimiento>=100){
                $cumplimiento=99;
        }
        $actualizar = " UPDATE concentrado_sugerencias SET cumplimiento='$cumplimiento' WHERE id = '$id_concentrado'";
        $query2 = mysqli_query( $conexion, $actualizar);
        $resultado[] = $query2;
        //$resultado[] = $suma;
        //$resultado[] = $cantidad_actividades;
        //$resultado[] = $cumplimiento;
       
        
echo json_encode($resultado);
?>