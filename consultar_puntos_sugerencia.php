<?php
    session_start();
    header('Content-Type: application/json');
    $datos = json_decode(file_get_contents('php://input'), true);
    $id_concentrado = $datos['id_concentrado'];
    include "conexionGhoner.php";
    $producto = 0;
    $puntos_cuanti=0;
    $puntos_cuali=0;
    $no_factible=0;
    $no_factible_analista = 0;
    $pts_factible = 0;
    $punto_inicial = 0;

        $consulta = "SELECT * FROM impacto_cuantitativo_sugerencias WHERE id_concentrado = '$id_concentrado'";
        $query = mysqli_query($conexion,$consulta);
        if(mysqli_num_rows($query)>0){
            while ($fila=$query -> fetch_array()) {
            $puntos_cuanti = $fila['puntos_asignados'];
            }
        }

        $consulta = "SELECT * FROM impacto_cualitativo_sugerencias WHERE id_concentrado = '$id_concentrado'";
        $query = mysqli_query($conexion,$consulta);
        if(mysqli_num_rows($query)>0){
            while ($fila=$query -> fetch_array()){
                $puntos_cuali = $fila['puntos'];
            }
        }

        $consulta = "SELECT * FROM no_factible_puntos WHERE id_concentrado = '$id_concentrado'";
        $query = mysqli_query($conexion,$consulta);
        if(mysqli_num_rows($query)>0){
            while ($fila=$query -> fetch_array()){
                $no_factible = $fila['puntos'];
            }
        }

        $consulta = "SELECT puntos_factible, validacion_calificada,puntos FROM concentrado_sugerencias 
        WHERE id = '$id_concentrado' AND validacion_calificada = 0";
        
        $query = mysqli_query($conexion,$consulta);
        if(mysqli_num_rows($query)>0){
            while ($fila=$query -> fetch_array()){
                $pts_factible += intval($fila['puntos_factible']);
                $punto_inicial = $fila['puntos'];
            }
        }


        if($puntos_cuanti!=0){ //Si le dan pts cuantitativos
            $producto =   intval($puntos_cuanti) - intval($pts_factible) + 1;
        }else if($puntos_cuali!=0){ //Si le dan pts cualitativos
                $producto = intval($puntos_cuali) - intval($pts_factible) + 1;
        }else if($no_factible!=0){ //Si es no factible y le dan pts
            $producto =  intval($no_factible) + intval($no_factible_analista) + intval($punto_inicial);
        }else if($pts_factible == 0){
            $producto =  intval($punto_inicial);
        }else{
            $producto =  intval($no_factible) + intval($no_factible_analista) + intval($pts_factible) + intval($punto_inicial);
        }

    echo json_encode((int)$producto);
    $query -> close();
?>