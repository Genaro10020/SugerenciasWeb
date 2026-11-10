
<?php
session_start();
header("Content-Type: application/json; charset=UTF-8");

ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $variables = json_decode(file_get_contents('php://input'), true);
    if (!$variables) throw new Exception("JSON inválido o vacío.");

    $id_concentrado = $variables['id_concentrado'] ?? null;
    $check = $variables['aceptado_rechazado'] ?? null;
    $status = $variables['status'] ?? null;

    if (!$id_concentrado || !$check || !$status) throw new Exception("Faltan parámetros.");

    include "conexionGhoner.php";

    $nuevo_status = null;

        if ($status != "Implementada" && $check == "Aceptado") {
                $nuevo_status = "En Implementación";
        } elseif ($status != "En Implementación" && $status != "Implementada" && $check == "Rechazado") {
                $nuevo_status = "En Factibilidad";
        } elseif (($status == "En Implementación" || $status == "Implementada") && $check == "Rechazado") {
                $nuevo_status = $status;
        } else {
                throw new Exception("No existe una regla de actualización para estos datos.");
        }

                $sql = "UPDATE concentrado_sugerencias SET status = ?, check_mc = ? WHERE id = ?";
                $stmt = $conexion->prepare($sql);
                $stmt->bind_param("ssi", $nuevo_status, $check, $id_concentrado);
                $stmt->execute();

                        $sql = "SELECT nombre_sugerencia, folio, analista_de_factibilidad FROM concentrado_sugerencias WHERE id = ?";
                        $stmt = $conexion->prepare($sql);
                        $stmt->bind_param("i", $id_concentrado);
                        $stmt->execute();
                        $resultado = $stmt->get_result();

                        if ($resultado->num_rows == 0) throw new Exception("No se encontró la sugerencia.");

                        $row = $resultado->fetch_assoc();
                        $analista_de_factibilidad = $row['analista_de_factibilidad'];
                        $nombre_sugerencia = $row['nombre_sugerencia'];
                        $folio = $row['folio'];

                        $sql = "SELECT email FROM usuarios_sugerencias WHERE nombre = ? AND tipo = 'Analista' LIMIT 1";
                        $stmt = $conexion->prepare($sql);
                        $stmt->bind_param("s", $analista_de_factibilidad);
                        $stmt->execute();
                        $resultado2 = $stmt->get_result();

                                if ($resultado2->num_rows == 0) throw new Exception("No se encontró el correo del analista.");

                                $row2 = $resultado2->fetch_assoc();
                                $email = $row2['email'];

                                if ($check == "Rechazado") {
                                        $accion_recomendada = "Verificar el rechazo de plan de trabajo.";
                                        $estado_correo = "Rechazado";
                                } elseif ($check == "Aceptado") {
                                        $accion_recomendada = "Para su conocimiento.";
                                        $estado_correo = "Aceptado";
                                }

                                $titulo = 'Su plan de trabajo fue ' . $estado_correo . '.';

                                $mensaje = '
                                <html><head><title>Datos de la sugerencia</title></head><body>
                                <p>¡Información sobre el estatus del plan de trabajo!</p>
                                <table>
                                <tr><td>Ruta del sistema:</td><td>https://vvnorth.com/Sugerencia/</td></tr>
                                <tr><th colspan="2">Información básica de la sugerencia:</th></tr>
                                <tr><td>Folio:</td><td>' . htmlspecialchars($folio, ENT_QUOTES, 'UTF-8') . '</td></tr>
                                <tr><td>Acción:</td><td>' . htmlspecialchars($accion_recomendada, ENT_QUOTES, 'UTF-8') . '</td></tr>
                                <tr><td>Nombre de la sugerencia:</td><td>' . htmlspecialchars($nombre_sugerencia, ENT_QUOTES, 'UTF-8') . '</td></tr>
                                </table></body></html>';

                                $cabeceras = "MIME-Version: 1.0\r\n";
                                $cabeceras .= "Content-Type: text/html; charset=UTF-8\r\n";
                                $cabeceras .= "From: Sugerencias <iscgenarovp@gmail.com>\r\n";
                                $cabeceras .= "Cc: agonzalezd@enerya.com, gvillanuevap@enerya.com\r\n";

                                $mail = mail($email, $titulo, $mensaje, $cabeceras);

                                if (!$mail) throw new Exception("Se actualizó el registro, pero falló el envío del correo.");

                                echo json_encode([
                                        "success" => true,
                                        "message" => "Registro actualizado y correo enviado correctamente.",
                                        "status" => $nuevo_status
                        ]);

        } catch (mysqli_sql_exception $e) {
                error_log("Error MySQL: " . $e->getMessage());
                http_response_code(500);
                echo json_encode(["success" => false, "error" => "Error de base de datos.", "detalle" => $e->getMessage()]);
        } catch (Throwable $e) {
                error_log("Error PHP: " . $e->getMessage());
                http_response_code(500);
                echo json_encode(["success" => false, "error" => $e->getMessage()]);
}
?>
