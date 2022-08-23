<?php
    session_start();
    header('Content-Type: application/json');
    $datos = json_decode(file_get_contents('php://input'), true);
    $id_concentrado = $datos['id_concentrado'];
    include "conexionGhoner.php";
    $producto = "";
    $puntos_cuanti=0;
    $puntos_cuali=0;
    
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

        if($puntos_cuanti!=0){
            $producto = $puntos_cuanti;
        }else{
            if($puntos_cuali!=0){
                $producto = $puntos_cuali;
            }
        }
        

    echo json_encode($producto);
    $query -> close();
?>