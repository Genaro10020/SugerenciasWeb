<?php 
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
include "conexionGhoner.php";

// Obtener los parámetros del filtro y la ordenación desde el cliente
$planta = $variables['planta'] ?? '';
$area = $variables['area'] ?? '';
$subarea = $variables['subarea'] ?? '';
$analista = $variables['analista'] ?? '';
$ordenar = $variables['ordenar'] ?? 'pts.id'; // Columna por defecto para ordenar (pts tabla planes de trabo sugerencia)
$orden = $variables['orden'] ?? 'desc'; // Orden por defecto: ascendente


$planta = mysqli_real_escape_string($conexion, "%$planta%");
$area = mysqli_real_escape_string($conexion, "%$area%");
$subarea = mysqli_real_escape_string($conexion, "%$subarea%");
$analista = mysqli_real_escape_string($conexion, "%$analista%");
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
             ORDER BY $ordenar $orden";

$query = mysqli_query($conexion, $consulta);
while($datos=mysqli_fetch_array($query)){
    $fecha_final=$datos['fecha_final'];
    $f_final = new DateTime($fecha_final);
    $f_actual = new DateTime($hoy);
    $diff = $f_actual->diff($f_final);
    $dias=$diff->format('%R'.$diff->days);
    $datos['dias_restantes'] = $dias;
    $resultado[] = $datos;
}
echo json_encode($resultado);
?>