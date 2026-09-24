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
$esResponsable = $_SESSION['esResponsableHallazgo'];

include "conexionGhoner.php";

if ($id === null || $id_usuario === null) {
    echo json_encode(["ok" => false, "mensaje" => "Petición inválida o sesión no válida."]);
    exit;
}

if ($tipo == 'guardar_actualizar_comentario') {

    if ($_SESSION['esResponsableHallazgo'] === true) {
        $actualizar = $conexion->prepare("UPDATE seguridad_syma SET comentario_responsable = ? WHERE id = ?; ");
        $actualizar->bind_param("si", $comentarioResponsable,  $id);
    } else {
        $actualizar = $conexion->prepare("UPDATE seguridad_syma SET comentario_syma = ? WHERE id = ?; ");
        $actualizar->bind_param("si", $accion, $id);
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
                echo "No existe el hallazgo";
                exit;
            }
            if ($hallazgo['status'] !== 'sin_atender') {
                echo json_encode(['mensaje' => 'Error, alguien ya ha tomado el hallazgo.', 'status' => 'false']);
                exit;
            }
            $actualizar = $conexion->prepare("UPDATE seguridad_syma
                                SET iniciado_por = ?, fecha_inicio = ?, `status` = 'en_proceso'
                                WHERE id = ? AND `status` = 'sin_atender' ;");
            $actualizar->bind_param("isi", $id_usuario, $fecha, $id);
            $resultado = $actualizar->execute();


            if ($actualizar->affected_rows === 0) {
                echo "ya fue tomado";
                exit;
            }
            $actualizar->close();

            echo "tomado correctamente.";
            echo json_encode($resultado);
            break;
        case 'atendido':
            if ($hallazgo['status'] !== 'en_proceso' && $hallazgo['status'] !== 'esperando_syma') {
                echo "no puede cambiarse de proceso.";
                exit;
            }
            if ($esResponsable) {
                if ((int) $hallazgo['iniciado_por'] !== (int) $id_usuario) {
                    echo "ya ha sido iniciado por otra persona.";
                    exit;
                }
            }

            $actualizar = $conexion->prepare("UPDATE seguridad_syma
                                SET modificado_por = ?, fecha_modificacion = ?, `status` = 'atendido'
                                WHERE id = ? AND `status` = 'en_proceso' OR `status` = 'esperando_syma';");
            $actualizar->bind_param("isi", $id_usuario, $fecha, $id);
            $resultado = $actualizar->execute();

            if ($actualizar->affected_rows === 0) {
                echo "ya fue tomado";
                exit;
            }
            $actualizar->close();
            echo json_encode($resultado);
            break;
        case 'esperando_syma':
            if ($hallazgo['status'] !== 'atendido') {
                echo "no puede cambiarse de proceso.";
                exit;
            }
            if ((int) $hallazgo['iniciado_por'] !== (int) $id_usuario) {
                echo "ya ha sido iniciado por otra persona.";
                exit;
            }
            $actualizar = $conexion->prepare("UPDATE seguridad_syma
                                SET modificado_por = ?, fecha_modificacion = ?, `status` = 'esperando_syma'
                                WHERE id = ? AND `status` = 'atendido' ;");
            $actualizar->bind_param("isi", $id_usuario, $fecha, $id);
            $resultado = $actualizar->execute();

            if ($actualizar->affected_rows === 0) {
                echo "ya fue tomado";
                exit;
            }
            $actualizar->close();
            echo json_encode($resultado);
            break;
        case 'finalizado':
            if ($hallazgo['status'] !== 'esperando_syma' && $hallazgo['status'] !== 'atendido') {
                echo "no puede cambiarse de proceso.";
                exit;
            }
            if ($esResponsable) {
                echo "\n No puedes finalizar, eres responsable";
                exit;
            }
            $actualizar = $conexion->prepare("UPDATE seguridad_syma
                                SET modificado_por = ?, fecha_modificacion = ?, `status` = 'finalizado'
                                WHERE id = ? AND `status` = 'esperando_syma' OR `status` = 'atendido' ;");
            $actualizar->bind_param("isi", $id_usuario, $fecha, $id);
            $resultado = $actualizar->execute();

            if ($actualizar->affected_rows === 0) {
                echo "no se pudo completar";
                exit;
            }
            $actualizar->close();
            echo json_encode($resultado);
            break;

        default:
            # code...
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
