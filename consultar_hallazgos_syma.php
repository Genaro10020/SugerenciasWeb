<?php
    session_start();
    header('Content-Type: application/json');
    $variables = json_decode(file_get_contents('php://input'), true);
    include "conexionGhoner.php";
    $user = $_SESSION['usuario'];
    $resultado= [];
    $tipo = $variables['tipo'];

    if($tipo == "admin"){

        $consulta = "SELECT usuarios_colocaboradores_sugerencias.colaborador, usuarios_colocaboradores_sugerencias.numero_nomina, seguridad_syma.id, seguridad_syma.descripcion_hallazgo, seguridad_syma.tipo_hallazgo, seguridad_syma.planta,seguridad_syma.area, seguridad_syma.fecha_hallazgo, seguridad_syma.status
        FROM usuarios_colocaboradores_sugerencias
        INNER JOIN seguridad_syma
        ON usuarios_colocaboradores_sugerencias.numero_nomina = seguridad_syma.numero_nomina
        ORDER BY seguridad_syma.id DESC";
        $query = mysqli_query($conexion,$consulta);
        while($fila=mysqli_fetch_array($query)){
            $resultado[]= $fila; 
        }

    }else if($tipo == "usuarios"){
        
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
    }


echo json_encode($resultado);
?>
