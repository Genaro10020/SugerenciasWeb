<?php
session_start();
header("Content-Type: application/json");

// Leer JSON enviado desde Vue
$variables = json_decode(file_get_contents('php://input'), true);
$resultado="";

// Variables recibidas
$turno = $variables['turno'];
$utilizacion = $variables['utilizacion'];
$lat = $variables['latitud'];
$lng = $variables['longitud'];
$calle = $variables['calle'];
$numero = $variables['numero'];

// Validar sesión
if(!isset($_SESSION["id"])){
    echo json_encode(["error" => "Usuario no autenticado"]);
    exit;
}

$user_id = $_SESSION["id"];

// Conexión a la base de datos
include "conexionBO.php";

//Tomando fecha hoy
$fecha_hoy = date("Y-m-d H:i:s");
// Verificar si ya existe registro para este usuario
$consulta = "SELECT * FROM bsoapp_employe WHERE id_usuario_colaborador='$user_id'";
$query = mysqli_query($conexion, $consulta);

    if(mysqli_num_rows($query) > 0){
        // Actualizar registro existente
        $actualizando = "UPDATE bsoapp_employe 
        SET work_shift ='$turno', utilization ='$utilizacion', latitude='$lat', longitude='$lng', street='$calle', number='$numero', last_update='$fecha_hoy' 
        WHERE id_usuario_colaborador='$user_id'";
        $query = mysqli_query($conexion, $actualizando);
        $resultado = $query 
        ? ["success" => true, "mensaje" => "Ubicación actualizada"] 
        : ["success" => false, "mensaje" => "Error al actualizar", "error_sql" => mysqli_error($conexion)];
    } else {
        // Insertar nuevo registro
        $insertar = "INSERT INTO bsoapp_employe 
            (id_usuario_colaborador, latitude, longitude, utilization, work_shift, street, `number`, last_update) VALUES  ('$user_id','$lat','$lng','$utilizacion','$turno','$calle','$numero','$fecha_hoy')";
        $query = mysqli_query($conexion, $insertar);
        $resultado = $query 
        ? ["success" => true, "mensaje" => "Ubicación guardada"] 
        : ["success" => false, "mensaje" => "Error al guardar", "error_sql" => mysqli_error($conexion)];
    }

// Devolver respuesta JSON
echo json_encode($resultado);
?>