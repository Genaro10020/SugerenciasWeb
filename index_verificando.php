<?php
session_start();
include "conexionGhoner.php";
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$tipo="";
$user=$variables['usuario'];
$pass=$variables['contrasena'];
$remember=$variables['recordar'];
if($remember==1 || $remember=="true"){
    $remember="true";
}else{
    $remember="false";
}

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
        $_SESSION["password"] = $pass;//password
        $_SESSION["remember"] = $remember;//password
        
        echo $tipo;
    }else{
            $consulta = "SELECT * FROM usuarios_colocaboradores_sugerencias WHERE numero_nomina='$user' AND password='$pass'";
            $resultado = mysqli_query($conexion,$consulta);
            if (mysqli_num_rows($resultado)>0)
            {
                while ($row = mysqli_fetch_array($resultado)){
                    $tipo = "Colaborador";
                    $nombre = $row['colaborador'];
                    $planta = $row['planta'];
                    $id_equipo = $row['equipo_ead'];
                    $lider = $row['lider_ead'];
                }
                $_SESSION["usuario"] = $user;//nomina
                $_SESSION["tipo"] = $tipo;//tipo
                $_SESSION["planta"] = $planta;//nombre
                $_SESSION["nombre"] = $nombre;//nombre
                $_SESSION["password"] = $pass;//password
                $_SESSION["remember"] = $remember;//password
                $_SESSION["id_ead"] = $id_equipo;//es lider o no ?
                $_SESSION["lider"] = $lider;//es lider o no ?
                echo $tipo;
            }else{
                echo "No";
            }
        }
?>
