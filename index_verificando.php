<?php
session_start();
include "conexionGhoner.php";
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$user=$variables['usuario'];
$pass=$variables['contrasena'];



$consulta = "SELECT * FROM usuarios_sugerencias WHERE user='$user' AND password='$pass'";
$resultado = mysqli_query($conexion,$consulta);
if (mysqli_num_rows($resultado)>0)
{
    while ($row = mysqli_fetch_array($resultado)){
        $tipo = $row['tipo'];
        $nombre = $row['nombre'];
    }
    $_SESSION["usuario"] = $user;
    $_SESSION["tipo"] = $tipo;
    $_SESSION["nombre"] = $nombre;
    echo $tipo;
}else{
    echo "No";
}
?>
