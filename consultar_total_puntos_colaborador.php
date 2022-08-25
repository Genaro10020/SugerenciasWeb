<?php
    session_start();
    header('Content-Type: application/json');
    $datos = json_decode(file_get_contents('php://input'), true);
    $numero_nomina = $_SESSION['usuario'];
    include "conexionGhoner.php";
    $producto = 0;
    $puntos_cuanti=0;
    $puntos_cuali=0;
    $puntos_usados=0;
    $total = 0;
    
            $consulta = "SELECT * FROM impacto_cuantitativo_sugerencias WHERE numero_nomina = '$numero_nomina'";
            $query = mysqli_query($conexion,$consulta);
            if(mysqli_num_rows($query)>0){
                while ($fila=$query -> fetch_array()) {
                 $puntos_cuanti = (int)$fila['puntos_asignados']+$puntos_cuanti;
                }
            }

            $consulta = "SELECT * FROM impacto_cualitativo_sugerencias WHERE numero_nomina = '$numero_nomina'";
            $query = mysqli_query($conexion,$consulta);
            if(mysqli_num_rows($query)>0){
                while ($fila=$query -> fetch_array()){
                    $puntos_cuali = (int)$fila['puntos']+$puntos_cuali;
                }
            }

            $consulta = "SELECT * FROM canjer_premios_colaborador_sugerencias WHERE numero_nomina = '$numero_nomina' AND status='Pte. de entrega' || numero_nomina = '$numero_nomina' AND status='Entregado'";
            $query = mysqli_query($conexion,$consulta);
            if(mysqli_num_rows($query)>0){
                while ($fila=$query -> fetch_array()){
                    $puntos_usados = (int)$fila['puntos_para_canjear']+$puntos_usados;
                }
            }
            
            $total=$puntos_cuanti + $puntos_cuali;
            $producto=$total-$puntos_usados;
        

    echo json_encode(($producto));
    $query -> close();
?>