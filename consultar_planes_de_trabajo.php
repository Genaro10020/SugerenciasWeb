<?php 
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
include "conexionGhoner.php";

// Obtener los parámetros del filtro y la ordenación desde el cliente
$folio = $variables['folio'] ?? '';
$planta = $variables['planta'] ?? '';
$area = $variables['area'] ?? '';
$subarea = $variables['subarea'] ?? '';
$analista = $variables['analista'] ?? '';
$responsable = $variables['responsable'] ?? '';
$responsable_subarea = $variables['responsable_subarea'] ?? '';
$estatus_hallazgos = $variables['estatus_hallazgos'] ?? '';
$ordenar = $variables['ordenar'] ?? 'pts.id'; // Columna por defecto para ordenar (pts tabla planes de trabo sugerencia)
$orden = $variables['orden'] ?? 'desc'; // Orden por defecto: ascendente

$folio = mysqli_real_escape_string($conexion,"%$folio%");
$planta = mysqli_real_escape_string($conexion, "%$planta%");
$area = mysqli_real_escape_string($conexion, "%$area%");
$subarea = mysqli_real_escape_string($conexion, "%$subarea%");
$analista = mysqli_real_escape_string($conexion, "%$analista%");
$responsable = mysqli_real_escape_string($conexion, "%$responsable%");
$responsable_subarea = mysqli_real_escape_string($conexion, "%$responsable_subarea%");
$ordenar = mysqli_real_escape_string($conexion, "$ordenar");
$orden = mysqli_real_escape_string($conexion, "$orden");

$hoy = date("Y-m-d");
$resultado=[];
$consulta = "SELECT pts.*, cs.analista_de_factibilidad, cs.fecha_compromiso, us.planta, us.area, us.subarea AS subarea_us, usr.subarea AS subarea_usr FROM plan_trabajo_sugerencias pts
INNER JOIN concentrado_sugerencias cs ON pts.folio = cs.folio 
INNER JOIN usuarios_sugerencias us ON cs.analista_de_factibilidad = us.nombre
INNER JOIN usuarios_sugerencias usr ON pts.responsable = usr.nombre
WHERE  us.planta LIKE '$planta'
             AND us.area LIKE '$area'
             AND us.subarea LIKE '$subarea'
             AND us.nombre LIKE '$analista'
             AND pts.responsable LIKE '$responsable'
             AND usr.subarea LIKE '$responsable_subarea'
             AND pts.folio LIKE '$folio'
             ORDER BY $ordenar $orden";

$query = mysqli_query($conexion, $consulta);
while($datos=mysqli_fetch_array($query)){
    $fecha_final=$datos['fecha_final'];
    $f_final = new DateTime($fecha_final);
    $f_actual = new DateTime($hoy);
    $diff = $f_actual->diff($f_final);
    $dias=$diff->format('%R'.$diff->days);
    $datos['dias_restantes'] = $dias;
    
    if($estatus_hallazgos==""){
        $resultado[] = $datos;
    }else if($estatus_hallazgos=="Completada" && $datos['porcentaje']==100){
        $resultado[] = $datos;
    }else if($estatus_hallazgos=="Por Vencer" &&  $dias >0 &&  $dias <= 7 && $datos['porcentaje']!=100){
        $resultado[] = $datos;
    }else if($estatus_hallazgos=="En tiempo" &&  $dias >7 && $datos['porcentaje']!=100){
        $resultado[] = $datos;
    }else if($estatus_hallazgos=="Vencida" && $dias <=0 && $datos['porcentaje']!=100){
        $resultado[] = $datos;
    }
}
echo json_encode($resultado);
?>
  