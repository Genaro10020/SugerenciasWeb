<?php
    session_start();
    header('Content-Type: application/json');
    $variables = json_decode(file_get_contents('php://input'), true);
    include "conexionGhoner.php";
    $user = $_SESSION['usuario'];
    $resultado= [];
    $tipo = $variables['tipo'];

    if($tipo == "admin"){

        $secciones = $conexion->query("SELECT * FROM secciones_syma");
        $areas = $conexion->query("
            SELECT id_seccion, area FROM areas_enerya_syma
            UNION ALL
            SELECT id_seccion, area FROM areas_riasa_syma
        ");
        $responsables = $conexion->query("SELECT id, id_seccion, usuario, email FROM responsables_secciones_syma");

        $resultado = [];
        while ($s = $secciones->fetch_assoc()) {
            $resultado[$s['id']] = [
                'id_seccion' => $s['id'],
                'seccion' => $s['seccion'],
                'planta' => $s['planta'],
                'areas' => [],
                'usuarios' => [],
                'emails' => []
            ];
        }

        while ($a = $areas->fetch_assoc()) {
            $resultado[$a['id_seccion']]['areas'][] = $a['area'];
        }

        while ($r = $responsables->fetch_assoc()) {
            $resultado[$r['id_seccion']]['usuarios'][] = $r['usuario'];
            $resultado[$r['id_seccion']]['emails'][] = $r['email'];
            $resultado[$r['id_seccion']]['ids_usuarios'][] = $r['id'];
        }
    }     
        /* $consulta = "SELECT * FROM secciones_syma"; */

        /* $consulta = "SELECT 
            s.id AS id_seccion,
            s.seccion AS nombre_seccion,
            ae.area AS nombre_area_enerya,
            ar.area AS nombre_area_riasa
        FROM secciones_syma s
        INNER JOIN areas_enerya_syma ae
            ON s.id = ae.id_seccion
        INNER JOIN areas_riasa_syma ar
            ON s.id = ar.id_seccion
 */     
        
       /*  $consulta = $consulta = "SELECT 
                s.id AS id_seccion,
                s.seccion AS nombre_seccion,
                s.planta AS empresa,
                ae.area AS nombre_area
            FROM secciones_syma s
            INNER JOIN areas_enerya_syma ae
                ON s.id = ae.id_seccion
            WHERE s.planta = 'Enerya'

            UNION ALL

            SELECT 
                s.id AS id_seccion,
                s.seccion AS nombre_seccion,
                s.planta AS empresa,
                ar.area AS nombre_area
            FROM secciones_syma s
            INNER JOIN areas_riasa_syma ar
                ON s.id = ar.id_seccion
            WHERE s.planta = 'Riasa' */

            /* UNION ALL

            SELECT rs.id AS id_seccion,
            rs.usuario AS nombre_seccion,
            rs.email AS empresa,
            '' AS nombre_area
            FROM secciones_syma s
            INNER JOIN responsables_secciones_syma rs
            ON s.id = rs.id_seccion */


           /*  ORDER BY id_seccion, empresa, nombre_area;
        ";
        $query=$conexion->query($consulta);
        $resultado = [];
        while ($fila= $query->fetch_array()) {
            $nombre_seccion = $fila['nombre_seccion'];
            
            if(!isset($resultado[$nombre_seccion])){
                $resultado[$nombre_seccion] = [
                    'id_seccion'=> $fila['id_seccion'],
                    'seccion'=> $fila['nombre_seccion'],
                    'planta'=> $fila['empresa'],
                    'areas'=>[],
                    'usuarios'=>[],
                    'emails'=>[]
                ];
            }else{
           
            }

            if (!empty($fila['nombre_area'])) {
                $resultado[$nombre_seccion]['areas'][] = $fila['nombre_area'];
            }

            // Agregar usuarios y correos (sólo si son válidos)
            if (!empty($fila['empresa']) && filter_var($fila['empresa'], FILTER_VALIDATE_EMAIL)) {
                $resultado[$nombre_seccion]['usuarios'][] = $fila['nombre_seccion'];
                $resultado[$nombre_seccion]['emails'][] = $fila['empresa'];
            }
            
            $resultado[$nombre_seccion]['areas'][] = $fila['nombre_area'];
            $resultado[$nombre_seccion]['usuarios'][] = $fila['nombre_seccion']; // en vez de 'nombre_resp'
            $resultado[$nombre_seccion]['emails'][] = $fila['empresa']; 
          
        }*/
        /* UNION ALL

        SELECT 
            s.id_seccion,
            s.nombre AS nombre_seccion,
            a.nombre AS nombre_area,
            'Riasa' AS origen
        FROM secciones_syma s
        INNER JOIN areas_riasa_syma a 
            ON s.id_seccion = a.id_seccion

        ORDER BY id_seccion";        

        $query=$conexion->query($consulta);
        while ($fila= $query->fetch_array()) {
            $resultado[] = [
                'seccion'=> $fila['seccion'],
                'id'=> $fila['id'],
                'planta'=> $fila['planta'],
        }
        /* $consulta = "SELECT usuarios_colocaboradores_sugerencias.colaborador, usuarios_colocaboradores_sugerencias.numero_nomina, seguridad_syma.id, seguridad_syma.descripcion_hallazgo, seguridad_syma.tipo_hallazgo, seguridad_syma.planta,seguridad_syma.area, seguridad_syma.fecha_hallazgo, seguridad_syma.status
        FROM usuarios_colocaboradores_sugerencias
        INNER JOIN seguridad_syma
        ON usuarios_colocaboradores_sugerencias.numero_nomina = seguridad_syma.numero_nomina
        ORDER BY seguridad_syma.id DESC ";
        $query = mysqli_query($conexion,$consulta);
        while($fila=mysqli_fetch_array($query)){
            $areaID=$fila['area'];
            $planta = $fila['planta'];
            
            
            if($planta=="Enerya"){
                $tabla = "areas_enerya_syma";
            }
            if($planta=="Riasa"){
                $tabla = "areas_riasa_syma";
            }
                    $consulta = "SELECT * FROM $tabla WHERE id='$areaID'";
                    $query1 = mysqli_query($conexion,$consulta);
                    while($fila1=mysqli_fetch_array($query1)){
                        $fila['nombreArea']= $fila1['area']; 
                    } 

            $resultado[] = $fila;   
        }*/
        /*Con lo siguientes inner join quiero traer la informacion de areas_enerya_syma o areas_riasa_syma dependiendo cual sea la planta  */
    /* else if($tipo == "usuarios"){
        
        $consulta = "SELECT * FROM seguridad_syma WHERE numero_nomina='$user' ORDER BY id DESC";
        $query = mysqli_query($conexion,$consulta);
        while($fila=mysqli_fetch_array($query)){
            $resultado[]= $fila; 
        }
    }else if($tipo == "status_btn"){
        $consulta = "SELECT status FROM seguridad_syma 
        ORDER BY id DESC";
        $query = mysqli_query($conexion,$consulta);
        while($fila=mysqli_fetch_array($query)){
            $resultado[]= $fila; 
        }
    } */


echo json_encode($resultado);
?>
