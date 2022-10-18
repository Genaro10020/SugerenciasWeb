<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
include "conexionGhoner.php";
$usuario =  $_SESSION["usuario"];
$consulta = "SELECT * FROM concentrado_sugerencias WHERE numero_nomina = '$usuario'";
$resultado = mysqli_query($conexion,$consulta);
while($datos=mysqli_fetch_array($resultado)){
    $password =  $datos['password'];
}
echo json_encode($password);
?>