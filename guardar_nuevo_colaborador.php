
<?php
session_start();
            $arreglo = json_decode(file_get_contents('php://input'), true);
            header("Content-Type: application/json");
            

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
                   $insertar = "INSERT INTO usuarios_colocaboradores_sugerencias (colaborador, numero_nomina, planta, `password`) 
                        VALUES (?, ?, ?, '123456')";

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
?>