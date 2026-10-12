<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);

date_default_timezone_set('Etc/GMT+6');
$fecha = date('Y-m-d H:i:s');

$accion = $variables['accion'] ?? null;
$id = $variables['id'];
$tipo = $variables['tipo'];
$comentarioResponsable = $variables['comentario_responsable'] ?? null;


$cant_img_reciente = $variables['cant_img_actual'] ?? null;
$id_usuario = $_SESSION['usuario'] ?? null;
$esResponsable = $_SESSION['esResponsableHallazgo'] ?? false;

include "conexionGhoner.php";

if ($id === null || $id_usuario === null) {
    echo json_encode(["ok" => false, "mensaje" => "Petición inválida o sesión no válida."]);
    exit;
}

if ($tipo == 'guardar_actualizar_comentario') {

    if ($_SESSION['esResponsableHallazgo'] === true) {
        $actualizar = $conexion->prepare("UPDATE seguridad_syma SET comentario_responsable = ?, modificado_por = ?,fecha_modificacion = ? WHERE id = ?");

        $actualizar->bind_param("sisi", $comentarioResponsable, $id_usuario, $fecha, $id);
    } else {
        $actualizar = $conexion->prepare("UPDATE seguridad_syma SET comentario_syma = ?, modificado_por = ?, fecha_modificacion = ? WHERE id = ?; ");
        $actualizar->bind_param("sisi", $accion, $id_usuario, $fecha, $id);
    }
    $resultado = $actualizar->execute();
    $actualizar->close();
    echo json_encode($resultado);
    exit;
} else if ($tipo == 'Actualizar_imagenes') {

    $actualizar = $conexion->prepare("UPDATE seguridad_syma SET cant_img_evidencia = ?  WHERE id = ?;");
    $actualizar->bind_param("ii", $cant_img_reciente, $id);
    $resultado = $actualizar->execute();
} else {

    $hallazgo = obtenerRol($conexion, $id);

    switch ($tipo) {
        case 'en_proceso':
            if (!$hallazgo) {
                echo json_encode(['mensaje' => 'El hallazgo seleccionado no existe. Intenta actualizar la página.', 'status' => false]);
                exit;
            }
            if ($hallazgo['status'] !== 'sin_atender') {
                echo json_encode(['mensaje' => 'Lo sentimos, este hallazgo ya fue tomado por otro usuario.', 'status' => false]);
                exit;
            }
            $actualizar = $conexion->prepare("UPDATE seguridad_syma
                                SET iniciado_por = ?, fecha_inicio = ?, `status` = 'en_proceso'
                                WHERE id = ? AND `status` = 'sin_atender' ;");
            $actualizar->bind_param("isi", $id_usuario, $fecha, $id);
            $resultado = $actualizar->execute();


            if ($actualizar->affected_rows === 0) {
                echo json_encode(['mensaje' => 'Ocurrió un error interno. Inténtalo más tarde.', 'status' => false]);
                exit;
            }
            $actualizar->close();

            echo json_encode(['mensaje' => 'El hallazgo fue asignado correctamente.', 'status' => $resultado]);
            break;

        case 'atendido':

            if ($hallazgo['status'] !== 'en_proceso' && $hallazgo['status'] !== 'esperando_syma' && $hallazgo['status'] !== 'sin_atender') {
                echo json_encode(['mensaje' => 'No tienes permisos para cambiar el estatus de este hallazgo.', 'status' => false]);
                exit;
            }

            if ($esResponsable) {
                if ((int) $hallazgo['iniciado_por'] !== (int) $id_usuario) {
                    echo json_encode(['mensaje' => 'Lo sentimos, este hallazgo ya fue tomado por otro usuario.', 'status' => false]);
                    exit;
                }
            }

            if ($hallazgo['status'] === 'sin_atender') {
                $actualizar = $conexion->prepare("UPDATE seguridad_syma
                                                SET iniciado_por = ?, fecha_inicio = ?, `status` = 'atendido'
                                                WHERE id = ? AND `status` = 'sin_atender';");
            } else {
                $actualizar = $conexion->prepare("UPDATE seguridad_syma
                                SET modificado_por = ?, fecha_modificacion = ?, `status` = 'atendido'
                                WHERE id = ? AND `status` IN ('en_proceso', 'esperando_syma') ;");
            }

            $actualizar->bind_param("isi", $id_usuario, $fecha, $id);
            $resultado = $actualizar->execute();

            if ($actualizar->affected_rows === 0) {
                echo json_encode(['mensaje' => 'Ocurrió un error interno. Inténtalo más tarde.', 'status' => false]);
                exit;
            }
            $actualizar->close();

            if ($hallazgo['status'] === 'esperando_syma') {
                echo json_encode(['mensaje' => 'editado', 'status' => $resultado]);
            } else {
                echo json_encode(['mensaje' => 'El hallazgo fue marcado como atendido con éxito.', 'status' => $resultado]);
            }

            break;

        case 'esperando_syma':
            if ($hallazgo['status'] !== 'atendido') {
                echo json_encode(['mensaje' => 'No tienes permisos para cambiar el estatus de este hallazgo.', 'status' => false]);
                exit;
            }
            if ((int) $hallazgo['iniciado_por'] !== (int) $id_usuario) {
                echo json_encode(['mensaje' => 'Lo sentimos, este hallazgo ya fue tomado por otro usuario.', 'status' => false]);
                exit;
            }

            $actualizar = $conexion->prepare("UPDATE seguridad_syma
                                SET modificado_por = ?, fecha_modificacion = ?, `status` = 'esperando_syma'
                                WHERE id = ? AND `status` = 'atendido' ;");
            $actualizar->bind_param("isi", $id_usuario, $fecha, $id);
            $resultado = $actualizar->execute();

            if ($actualizar->affected_rows === 0) {
                echo json_encode(['mensaje' => 'Ocurrió un error interno. Inténtalo más tarde.', 'status' => false]);
                exit;
            }
            $actualizar->close();
            echo json_encode(['mensaje' => 'El hallazgo fue enviado a SSYMA para su revisión.', 'status' => $resultado]);

            break;

        case 'finalizado':

            if ($hallazgo['status'] !== 'esperando_syma' && $hallazgo['status'] !== 'atendido') {
                echo json_encode(['mensaje' => 'No tienes permisos para cambiar el estatus de este hallazgo.', 'status' => false]);
                exit;
            }
            if ($esResponsable) {
                echo json_encode(['mensaje' => 'No cuentas con autorización para finalizar este hallazgo.', 'status' => false]);
                exit;
            }
            $actualizar = $conexion->prepare("UPDATE seguridad_syma
                                SET modificado_por = ?, fecha_modificacion = ?, `status` = 'finalizado'
                                WHERE id = ? AND `status` IN ('esperando_syma', 'atendido');");
            $actualizar->bind_param("isi", $id_usuario, $fecha, $id);
            $resultado = $actualizar->execute();

            if ($actualizar->affected_rows === 0) {
                echo json_encode(['mensaje' => 'Lo sentimos, este hallazgo ya fue tomado por otro usuario.', 'status' => false]);
                exit;
            }
            $actualizar->close();
            echo json_encode(['mensaje' => 'El hallazgo fue finalizado correctamente.', 'status' => $resultado]);

            break;

        default:
            echo json_encode(['mensaje' => 'Ocurrió un error interno.', 'status' => false]);
            break;
    }
}


function obtenerRol($conexion, $id)
{
    $stmt = $conexion->prepare("SELECT id, status, iniciado_por FROM seguridad_syma WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $resultado = $stmt->get_result();
    $hallazgo = $resultado->fetch_assoc();

    $stmt->close();

    return $hallazgo;
}
