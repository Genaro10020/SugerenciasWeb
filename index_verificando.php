<?php
session_start();
include "conexionGhoner.php";
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$tipo="";
$user=$variables['usuario'];
$pass=$variables['contrasena'];



    $consulta = "SELECT * FROM usuarios_sugerencias WHERE user='$user' AND password='$pass'";
    $resultado = mysqli_query($conexion,$consulta);
    if (mysqli_num_rows($resultado)>0)
    {
        while ($row = mysqli_fetch_array($resultado)){
            $tipo = $row['tipo'];
            $nombre = $row['nombre'];
            $email = $row['email'];
        }
        $_SESSION["usuario"] = $user;//nomina
        $_SESSION["tipo"] = $tipo;//tipo
        $_SESSION["nombre"] = $nombre;//nombre
        $_SESSION["email"] = $email;//correo
        
        echo $tipo;
    }else{
            $consulta = "SELECT * FROM concentrado_sugerencias WHERE numero_nomina='$user' AND password='$pass'";
            $resultado = mysqli_query($conexion,$consulta);
            if (mysqli_num_rows($resultado)>0)
            {
                while ($row = mysqli_fetch_array($resultado)){
                    $tipo = "Colaborador";
                    $nombre = $row['colaborador'];
                }
                $_SESSION["usuario"] = $user;//nomina
                $_SESSION["tipo"] = $tipo;//tipo
                $_SESSION["nombre"] = $nombre;//nombre
                echo $tipo;
            }else{
                echo "No";
            }
}
?>
