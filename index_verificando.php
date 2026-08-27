<?php
session_start();
include "conexionGhoner.php";
include "conexionEAD.php";

header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$tipo="";
$user= trim($variables['usuario']);
$pass= trim($variables['contrasena']);
$remember=$variables['recordar'];

if($remember==1 || $remember=="true"){
    $remember="true";
}else{
    $remember="false";
}

$consulta_ead = "SELECT * FROM usuarios WHERE nomina = '$user' AND tipo_usuario='Supervisor'";
$resultado_ead = mysqli_query($conexionEAD, $consulta_ead);

if ($resultado_ead && mysqli_num_rows($resultado_ead) > 0) {
    
    $consulta_sug = "SELECT * FROM usuarios_colocaboradores_sugerencias WHERE numero_nomina = '$user' AND password='$pass' AND (status != 'Baja' OR status IS NULL)";
    $resultado_sug = mysqli_query($conexion, $consulta_sug);

    if ($resultado_sug && mysqli_num_rows($resultado_sug) > 0) {
        $row = mysqli_fetch_array($resultado_sug);
        
        $id     = $row['id'];
        $tipo   = "Supervisor";
        $nombre = $row['colaborador'];
        $planta = $row['planta'];

        $arreglo_ids = [];
        
        $consulta_equipos = "SELECT id FROM equipos_ead WHERE supervisor = '$nombre'";
        
        $resultado_equipos = mysqli_query($conexionEAD, $consulta_equipos); 
        
        if ($resultado_equipos && mysqli_num_rows($resultado_equipos) > 0) {
            while ($row_equipo = mysqli_fetch_assoc($resultado_equipos)) {
                $arreglo_ids[] = $row_equipo['id'];
            }
        }
        
        $_SESSION['idsEquipos'] = $arreglo_ids;

        $_SESSION["id"]          = $id;
        $_SESSION["usuario"]     = $user;
        $_SESSION["tipo"]        = $tipo;
        $_SESSION["tipo_acceso"] = "Supervisor"; 
        $_SESSION["tipo_usuario"]= "Supervisor";
        $_SESSION["planta"]      = $planta;
        $_SESSION["nombre"]      = $nombre;
        $_SESSION["password"]    = $pass;
        $_SESSION["remember"]    = $remember;

        echo $tipo;
        exit();
    }
}

$consulta = "SELECT * FROM usuarios_sugerencias WHERE user = '$user' AND password='$pass'";
$resultado = mysqli_query($conexion,$consulta);

if (mysqli_num_rows($resultado)>0) {
    while ($row = mysqli_fetch_array($resultado)){
        $tipo = $row['tipo'];
        $nombre = $row['nombre'];
        $email = $row['email'];
        $planta = $row['planta'];
    }
    $_SESSION["usuario"] = $user;//nomina
    $_SESSION["tipo"] = $tipo;//tipo
    $_SESSION["nombre"] = $nombre;//nombre
    $_SESSION["email"] = $email;//correo
    $_SESSION["password"] = $pass;//password
    $_SESSION["planta"] = $planta;//nombre
    $_SESSION["remember"] = $remember;//password
    
    echo $tipo;
} else {
    $consulta = "SELECT * FROM usuarios_colocaboradores_sugerencias WHERE numero_nomina='$user' AND password='$pass' AND (status != 'Baja' OR status IS NULL) ";
    $resultado = mysqli_query($conexion,$consulta);
    
    if (mysqli_num_rows($resultado)>0) {
        while ($row = mysqli_fetch_array($resultado)){
            $id = $row['id'];
            $tipo = "Colaborador";
            $nombre = $row['colaborador'];
            $planta = $row['planta'];
            $id_equipo = $row['equipo_ead'];
            $lider = $row['lider_ead'];
        }
        $_SESSION["id"] = $id;//id
        $_SESSION["usuario"] = $user;//nomina
        $_SESSION["tipo"] = $tipo;//tipo
        $_SESSION["tipo_acceso"] = "ColaboradorLider";//tipo
        $_SESSION["planta"] = $planta;//nombre
        $_SESSION["nombre"] = $nombre;//nombre
        $_SESSION["password"] = $pass;//password
        $_SESSION["remember"] = $remember;//password
        $_SESSION["id_ead"] = $id_equipo;//es lider o no ?
        $_SESSION["lider"] = $lider;//es lider o no ?
        
        echo $tipo;
    } else {
        echo "No";
    }
}
?>