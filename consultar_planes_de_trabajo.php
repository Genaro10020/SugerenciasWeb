<?php 
include "conexionGhoner.php";
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);


// Obtener los parámetros del filtro y la ordenación desde el cliente
$planta = $_POST['planta'] ?? '';
$area = $_POST['area'] ?? '';
$subarea = $_POST['subarea'] ?? '';
$analista = $_POST['analista'] ?? '';
$ordenar = $_POST['ordenar'] ?? 'pts.id'; // Columna por defecto para ordenar (pts tabla planes de trabo sugerencia)
$desc_o_asc = $_POST['desc_o_asc'] ?? 'desc'; // Orden por defecto: ascendente

$planta = mysqli_real_escape_string($conexion, "%$planta%");
$area = mysqli_real_escape_string($conexion, "%$area%");
$subarea = mysqli_real_escape_string($conexion, "%$subarea%");
$analista = mysqli_real_escape_string($conexion, "%$analista%");

$resultado=[];
$consulta = "SELECT pts.*, cs.analista_de_factibilidad, us.planta, us.area, us.subarea FROM plan_trabajo_sugerencias pts
INNER JOIN concentrado_sugerencias cs ON pts.folio = cs.folio 
INNER JOIN usuarios_sugerencias us ON cs.analista_de_factibilidad = us.nombre
WHERE  us.planta LIKE '$planta'
             AND us.area LIKE '$area'
             AND us.subarea LIKE '$subarea'
             ORDER BY $ordenar $desc_o_asc";

$query = mysqli_query($conexion, $consulta);
while($datos=mysqli_fetch_array($query)){
    $resultado[] = $datos;
}
echo json_encode($resultado);
?>