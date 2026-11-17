
<?php
session_start();
if ($_SESSION["usuario"]){
        header('Content-Type: application/json; charset=utf-8');
        if (isset($_SESSION['nombre'])) {
            $arreglo = json_decode(file_get_contents('php://input'), true);

            if (isset($arreglo['nombre']) && isset($arreglo['nomina']) && isset($arreglo['planta'])) {
                $nombre = $arreglo['nombre'];
                $nomina = $arreglo['nomina'];
                $planta = $arreglo['planta'];

                include "conexionGhoner.php";

                $consulta = "SELECT COUNT(*) FROM usuarios_colocaboradores_sugerencias WHERE colaborador = ? OR numero_nomina = ?";
                $stmt = $conexion->prepare($consulta);

                if (!$stmt) {
                    echo json_encode("Error: " . $conexion->error);
                    exit;
                }

                $stmt->bind_param("ss", $nombre, $nomina);
                $stmt->execute();
                $stmt->bind_result($count);
                $stmt->fetch();
                $stmt->close();

                if ($count == 0) {
                    $insertar = "INSERT INTO usuarios_colocaboradores_sugerencias (colaborador, numero_nomina, `password`, planta) VALUES (?, ?, '123456', ?)";
                    $stmt = $conexion->prepare($insertar);

                    if (!$stmt) {
                        echo json_encode("Error: " . $conexion->error);
                        exit;
                    }

                    $stmt->bind_param("sss", $nombre, $nomina, $planta);

                    if ($stmt->execute()) {
                        $respuesta = ($stmt->affected_rows > 0) ? true : "No se insertó el registro";
                    } else {
                        $respuesta = "Error al insertar: " . $stmt->error;
                    }

                    $stmt->close();
                } else {
                    $respuesta = "Existe";
                }

                echo json_encode($respuesta);
            } else {
                echo json_encode("Faltan datos");
            }
        } else {
            http_response_code(401);
            echo json_encode("Sesión no válida");
        }
} else {
    header("Location: index.php");
}
?>
