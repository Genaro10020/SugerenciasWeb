<?php
    session_start();
    header('Content-Type: application/json');
    include "conexionGhoner.php";
    $resultado = [];
    $nombre= $_SESSION['nombre'];

    $consulta = "SELECT * FROM concentrado_sugerencias WHERE status='Implementada' AND analista_de_factibilidad='$nombre' AND status_impacto='Midiendo' ORDER BY id DESC";
    $query = mysqli_query($conexion,$consulta);
    while ($fila=$query -> fetch_array()) {
        $fecha_compromiso=$fila['fecha_compromiso'];
        $arreglo=explode("-",$fecha_compromiso); 
        $anio=$arreglo[0];
        $mes=$arreglo[1];
        $dia=$arreglo[2];
     
                $fecha_base = "$anio-01-$dia";
                $enero = date("Y-m-d",strtotime($fecha_base)); 
                $febrero = date("Y-m-d",strtotime($enero."+ 30 days"));
                $marzo = date("Y-m-d",strtotime($febrero."+ 30 days"));
                $abril = date("Y-m-d",strtotime($marzo."+ 30 days"));
                $mayo = date("Y-m-d",strtotime($abril."+ 30 days"));
                $junio = date("Y-m-d",strtotime($mayo."+ 30 days"));
                $julio = date("Y-m-d",strtotime($junio."+ 30 days"));
                $agosto = date("Y-m-d",strtotime($julio."+ 30 days"));
                $septiembre = date("Y-m-d",strtotime($agosto."+ 30 days"));
                $octubre = date("Y-m-d",strtotime($septiembre."+ 30 days"));
                $noviembre = date("Y-m-d",strtotime($octubre."+ 30 days"));
                $diciembre = date("Y-m-d",strtotime($noviembre."+ 30 days"));

           
        
        $resultado[] =["Afecha_compromiso"=>$fecha_compromiso,"Afecha_base"=>$fecha_base, "Anio"=>$anio,"Mes"=>(int)$mes,"Dia"=>$dia,
        "enero"=>$enero, "febrero"=>$febrero, "marzo"=>$marzo,"abril"=>$abril, "mayo"=>$mayo, "junio"=>$junio, "julio"=> $julio, 
        "agosto"=>$agosto, "septiembre"=>$septiembre, "octubre"=> $octubre, "noviembre"=>$noviembre, "diciembre"=>$diciembre]+$fila;
        
    }
    echo json_encode($resultado);
    $query -> close();
?>