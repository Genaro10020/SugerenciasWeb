<?php
session_start();
header('Content-Type: application/json');
$variables = json_decode(file_get_contents('php://input'), true);
include "conexionGhoner.php";
$user = $_SESSION['usuario'];
$resultado = [];
$tipo = $variables['tipo'];




// echo "Esto es consultar";
// var_dump($variables);

// if ($_SESSION["esResponsableHallazgo"]) {
//     $tipo = "responsableHallazgo";
// } else {
//     $tipo = $variables['tipo'];
// }

// die();
if ($tipo == "admin") {


    $consulta = "SELECT usuarios_colocaboradores_sugerencias.colaborador,
            seguridad_syma.*,
            rss.usuario
        FROM usuarios_colocaboradores_sugerencias
        INNER JOIN seguridad_syma ON usuarios_colocaboradores_sugerencias.numero_nomina = seguridad_syma.numero_nomina
        LEFT JOIN responsables_secciones_syma AS rss ON rss.nomina = seguridad_syma.iniciado_por
        
        ORDER BY seguridad_syma.id DESC LIMIT 40;";

    $query = mysqli_query($conexion, $consulta);
    while ($fila = mysqli_fetch_array($query)) {
        $areaID = $fila['area'];
        $planta = $fila['planta'];

        if ($planta == "Enerya") {
            $tabla = "areas_enerya_syma";
        }
        if ($planta == "Riasa") {
            $tabla = "areas_riasa_syma";
        }
        $consulta = "SELECT * FROM $tabla WHERE id='$areaID'";
        $query1 = mysqli_query($conexion, $consulta);
        while ($fila1 = mysqli_fetch_array($query1)) {
            $fila['nombreArea'] = $fila1['area'];
        }

        $resultado[] = $fila;
    }
    /*Con lo siguientes inner join quiero traer la informacion de areas_enerya_syma o areas_riasa_syma dependiendo cual sea la planta  */
} elseif ($tipo === "responsableHallazgo") {

    $ids_areas = [];

    $consulta = $conexion->prepare("SELECT rss.id_seccion, sy.seccion, sy.planta
                FROM responsables_secciones_syma AS rss
                INNER JOIN
                secciones_syma AS sy ON sy.id = rss.id_seccion
                WHERE rss.nomina = ?;");

    $consulta->bind_param("i", $user);
    $consulta->execute();
    $resultArea = $consulta->get_result();

    if ($resultArea->num_rows > 0) {
        while ($dato = $resultArea->fetch_assoc()) {
            $IDarea = $dato['id_seccion'];
            $planta = $dato['planta'];


            if ($planta == "Enerya") {
                $tabla = "areas_enerya_syma";
            }
            if ($planta == "Riasa") {
                $tabla = "areas_riasa_syma";
            }

            $areaTabla = $conexion->prepare("SELECT `id` FROM $tabla WHERE `id_seccion` = ?;");
            $areaTabla->bind_param("i", $IDarea);
            $areaTabla->execute();
            $resultAT = $areaTabla->get_result();

            if ($resultAT->num_rows > 0) {
                while ($datoa = $resultAT->fetch_assoc()) {
                    $ids_areas[] = $datoa['id'];
                }
            }
            $areaTabla->close();
        }

        $placeholderIdsAreas = implode(',', array_fill(0, count($ids_areas), '?'));

        $query = $conexion->prepare("SELECT ucs.colaborador,
                ucs.numero_nomina,
                seguridad_syma.*,
                rss.usuario,
                areas.area AS nombreArea
            FROM usuarios_colocaboradores_sugerencias As ucs
            INNER JOIN seguridad_syma ON ucs.numero_nomina = seguridad_syma.numero_nomina
            INNER JOIN $tabla AS areas ON areas.id = seguridad_syma.area
            LEFT JOIN responsables_secciones_syma AS rss ON rss.nomina = seguridad_syma.iniciado_por
            WHERE seguridad_syma.planta = ? AND seguridad_syma.area IN ($placeholderIdsAreas) 
            ORDER BY seguridad_syma.id DESC LIMIT 10;");


        $contenido = array_merge([$planta], $ids_areas);
        $tipos = "s" . str_repeat('i', count($ids_areas));

        if (!$query->bind_param($tipos, ...$contenido)) {
            error_log("Error en execute():" . $query->error);
            http_response_code(500);
            exit("Ocurrió un error interno.");
        }
        if (!$query->execute()) {
            error_log("Error en execute():" . $query->error);
            http_response_code(500);
            exit("Ocurrió un error interno.");
        }
        $result = $query->get_result();

        $resultado = $result->fetch_all(MYSQLI_ASSOC);

        $query->close();
    }
    $consulta->close();
} else if ($tipo == "usuarios") {

    $consulta = "SELECT * FROM seguridad_syma WHERE numero_nomina='$user' ORDER BY id DESC";
    $query = mysqli_query($conexion, $consulta);
    while ($fila = mysqli_fetch_array($query)) {
        $resultado[] = $fila;
    }
} else if ($tipo == "status_btn") {
    $consulta = "SELECT status FROM seguridad_syma 
        ORDER BY id DESC";
    $query = mysqli_query($conexion, $consulta);
    while ($fila = mysqli_fetch_array($query)) {
        $resultado[] = $fila;
    }
}


echo json_encode($resultado);
