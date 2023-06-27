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

        if($puntos_cuanti!=0){
            $producto = $puntos_cuanti;
        }else if($puntos_cuali!=0){
                $producto = $puntos_cuali;
        }else if($no_factible!=0){
            $producto = $no_factible;
        }
        

    echo json_encode((int)$producto);
    $query -> close();
?>