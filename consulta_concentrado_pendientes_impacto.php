<?php
    session_start();
    header('Content-Type: application/json');
    include "conexionGhoner.php";
    $resultado = [];
    $nombre= $_SESSION['nombre'];

    if($_SESSION['tipo']=="Admin"){
        $consulta = "SELECT * FROM concentrado_sugerencias WHERE status='Implementada' AND fecha_real_cierre!='' ORDER BY id DESC";

    }else{
        $consulta = "SELECT * FROM concentrado_sugerencias WHERE status='Implementada' AND fecha_real_cierre!='' AND analista_de_factibilidad='$nombre' AND status_impacto='Midiendo' ORDER BY id DESC";
        
    }

   
    $query = mysqli_query($conexion,$consulta);
    while ($fila=$query -> fetch_array()) {
        $id_concentrado=$fila['id'];
        $fecha_compromiso=$fila['fecha_real_cierre'];
        $arreglo=explode("-",$fecha_compromiso); 
        $anio=$arreglo[0];
        $mes=$arreglo[1];
        $dia=$arreglo[2];
        
        $mes1="";$mes2="";$mes3="";$mes4="";$mes5="";$mes6="";$mes7="";$mes8="";$mes9="";$mes10="";$mes11="";$mes12="";
                //$fecha_base = "$anio-01-$dia";

                $fecha_base = "$anio-$mes";
                $mes_inicial = date("Y-m-d",strtotime("{$fecha_base}+ 2 month")); 
                $mes1 = date('Y-m-d', strtotime("{$mes_inicial} - 1 day"));

                $agregando_mes = date("Y-m-d",strtotime("{$mes_inicial}+ 1 month")); 
                $mes2 = date('Y-m-d', strtotime("{$agregando_mes} - 1 day"));

                $agregando_mes = date("Y-m-d",strtotime("{$agregando_mes}+ 1 month")); 
                $mes3 = date('Y-m-d', strtotime("{$agregando_mes} - 1 day"));

                $agregando_mes = date("Y-m-d",strtotime("{$agregando_mes}+ 1 month")); 
                $mes4 = date('Y-m-d', strtotime("{$agregando_mes} - 1 day"));

                $agregando_mes = date("Y-m-d",strtotime("{$agregando_mes}+ 1 month")); 
                $mes5 = date('Y-m-d', strtotime("{$agregando_mes} - 1 day"));

                $agregando_mes = date("Y-m-d",strtotime("{$agregando_mes}+ 1 month")); 
                $mes6 = date('Y-m-d', strtotime("{$agregando_mes} - 1 day"));

                $agregando_mes = date("Y-m-d",strtotime("{$agregando_mes}+ 1 month")); 
                $mes7 = date('Y-m-d', strtotime("{$agregando_mes} - 1 day"));

                $agregando_mes = date("Y-m-d",strtotime("{$agregando_mes}+ 1 month")); 
                $mes8 = date('Y-m-d', strtotime("{$agregando_mes} - 1 day"));

                $agregando_mes = date("Y-m-d",strtotime("{$agregando_mes}+ 1 month")); 
                $mes9 = date('Y-m-d', strtotime("{$agregando_mes} - 1 day"));

                $agregando_mes = date("Y-m-d",strtotime("{$agregando_mes}+ 1 month")); 
                $mes10 = date('Y-m-d', strtotime("{$agregando_mes} - 1 day"));

                $agregando_mes = date("Y-m-d",strtotime("{$agregando_mes}+ 1 month")); 
                $mes11 = date('Y-m-d', strtotime("{$agregando_mes} - 1 day"));

                $agregando_mes = date("Y-m-d",strtotime("{$agregando_mes}+ 1 month")); 
                $mes12 = date('Y-m-d', strtotime("{$agregando_mes} - 1 day"));

                    $consultar = " SELECT * FROM concentrado_impacto_sugerencias WHERE id_concentrado = '$id_concentrado' ";//Verificar que exista por lo menos uno
                    $quer = mysqli_query($conexion,$consultar);
                    if($row = mysqli_num_rows($quer) > 0){
 
                                    $consultando = " SELECT * FROM concentrado_impacto_sugerencias WHERE id_concentrado = '$id_concentrado' ORDER BY orden DESC";//Verificar que exista por lo menos uno
                                    $quer = mysqli_query($conexion,$consultando);
                                    while($datos = $quer-> fetch_array()){
                                        $orden=$datos['orden'];
                                        if($orden!="1" && $orden!="2"){
                                            $resultado[] =["Afecha_compromiso"=>$fecha_compromiso,"Afecha_base"=>$fecha_base, "anio"=>$anio,"mes"=>(int)$mes,"dia"=>$dia,
                                            "mes1"=>$mes1, "mes2"=>$mes2, "mes3"=>$mes3,"mes4"=>$mes4, "mes5"=>$mes5, "mes6"=>$mes6, "mes7"=> $mes7, 
                                            "mes8"=>$mes8, "mes9"=>$mes9, "mes10"=> $mes10, "mes11"=>$mes11, "mes12"=>$mes12, "orden"=>$orden]+$fila;
                                        }
                                    }

                            for($i = 0; $i < 2; $i++)
                            {
                                $resultado[] =["Afecha_compromiso"=>$fecha_compromiso,"Afecha_base"=>$fecha_base, "anio"=>$anio,"mes"=>(int)$mes,"dia"=>$dia,
                                "mes1"=>$mes1, "mes2"=>$mes2, "mes3"=>$mes3,"mes4"=>$mes4, "mes5"=>$mes5, "mes6"=>$mes6, "mes7"=> $mes7, 
                                "mes8"=>$mes8, "mes9"=>$mes9, "mes10"=> $mes10, "mes11"=>$mes11, "mes12"=>$mes12, "orden"=>(int)$i+1]+$fila;
                                //$resultado[] = "Vuelta"+$i;
                            }

                    }else{
                            for($i = 0; $i < 2; $i++)
                            {
                                $resultado[] =["Afecha_compromiso"=>$fecha_compromiso,"Afecha_base"=>$fecha_base, "anio"=>$anio,"mes"=>(int)$mes,"dia"=>$dia,
                                "mes1"=>$mes1, "mes2"=>$mes2, "mes3"=>$mes3,"mes4"=>$mes4, "mes5"=>$mes5, "mes6"=>$mes6, "mes7"=> $mes7, 
                                "mes8"=>$mes8, "mes9"=>$mes9, "mes10"=> $mes10, "mes11"=>$mes11, "mes12"=>$mes12, "orden"=>(int)$i+1]+$fila;
                                //$resultado[] = "Vuelta"+$i;
                            }
                           
                        
                    }
                
            }
            echo json_encode($resultado);
            $query -> close();
?>