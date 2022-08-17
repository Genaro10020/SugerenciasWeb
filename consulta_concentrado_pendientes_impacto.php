<?php
    session_start();
    header('Content-Type: application/json');
    include "conexionGhoner.php";
    $resultado = [];
    $nombre= $_SESSION['nombre'];

    $consulta = "SELECT * FROM concentrado_sugerencias WHERE status='Implementada' AND analista_de_factibilidad='$nombre' AND status_impacto='Midiendo' ORDER BY id DESC";
    $query = mysqli_query($conexion,$consulta);
    while ($fila=$query -> fetch_array()) {
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



                $resultado[] =["Afecha_compromiso"=>$fecha_compromiso,"Afecha_base"=>$fecha_base, "anio"=>$anio,"mes"=>(int)$mes,"dia"=>$dia,
                "mes1"=>$mes1, "mes2"=>$mes2, "mes3"=>$mes3,"mes4"=>$mes4, "mes5"=>$mes5, "mes6"=>$mes6, "mes7"=> $mes7, 
                "mes8"=>$mes8, "mes9"=>$mes9, "mes10"=> $mes10, "mes11"=>$mes11, "mes12"=>$mes12]+$fila;
                
            }
            echo json_encode($resultado);
            $query -> close();

            
                //$fecha_base = "$anio-02";
                /*$febrero_mes = date("Y-m-d",strtotime("{$enero}+ 1 month")); 
                $febrero = date('Y-m-d', strtotime("{$febrero_mes} - 1 day"));

                $fecha_base = "$anio-03";
                $agregando_mes = date("Y-m-d",strtotime("{$fecha_base}+ 1 month")); 
                $marzo = date('Y-m-d', strtotime("{$agregando_mes} - 1 day"));

                $fecha_base = "$anio-04";
                $agregando_mes = date("Y-m-d",strtotime("{$fecha_base}+ 1 month")); 
                $abril = date('Y-m-d', strtotime("{$agregando_mes} - 1 day"));

                $fecha_base = "$anio-05";
                $agregando_mes = date("Y-m-d",strtotime("{$fecha_base}+ 1 month")); 
                $mayo = date('Y-m-d', strtotime("{$agregando_mes} - 1 day"));

                $fecha_base = "$anio-06";
                $agregando_mes = date("Y-m-d",strtotime("{$fecha_base}+ 1 month")); 
                $junio = date('Y-m-d', strtotime("{$agregando_mes} - 1 day"));

                $fecha_base = "$anio-07";
                $agregando_mes = date("Y-m-d",strtotime("{$fecha_base}+ 1 month")); 
                $julio = date('Y-m-d', strtotime("{$agregando_mes} - 1 day"));

                $fecha_base = "$anio-08";
                $agregando_mes = date("Y-m-d",strtotime("{$fecha_base}+ 1 month")); 
                $agosto = date('Y-m-d', strtotime("{$agregando_mes} - 1 day"));

                $fecha_base = "$anio-09";
                $agregando_mes = date("Y-m-d",strtotime("{$fecha_base}+ 1 month")); 
                $septiembre = date('Y-m-d', strtotime("{$agregando_mes} - 1 day"));

                $fecha_base = "$anio-10";
                $agregando_mes = date("Y-m-d",strtotime("{$fecha_base}+ 1 month")); 
                $octubre = date('Y-m-d', strtotime("{$agregando_mes} - 1 day"));

                $fecha_base = "$anio-11";
                $agregando_mes = date("Y-m-d",strtotime("{$fecha_base}+ 1 month")); 
                $noviembre = date('Y-m-d', strtotime("{$agregando_mes} - 1 day"));

                $fecha_base = "$anio-12";
                $agregando_mes = date("Y-m-d",strtotime("{$fecha_base}+ 1 month")); 
                $diciembre = date('Y-m-d', strtotime("{$agregando_mes} - 1 day"));*/

                
                /*$fecha_base = "$anio-01";
                $agregando_mes = date("Y-m-d",strtotime("{$fecha_base}+ 1 month")); 
                $enero = date('Y-m-d', strtotime("{$agregando_mes} - 1 day"));

                $fecha_base = "$anio-02";
                $agregando_mes = date("Y-m-d",strtotime("{$fecha_base}+ 1 month")); 
                $febrero = date('Y-m-d', strtotime("{$agregando_mes} - 1 day"));

                $fecha_base = "$anio-03";
                $agregando_mes = date("Y-m-d",strtotime("{$fecha_base}+ 1 month")); 
                $marzo = date('Y-m-d', strtotime("{$agregando_mes} - 1 day"));

                $fecha_base = "$anio-04";
                $agregando_mes = date("Y-m-d",strtotime("{$fecha_base}+ 1 month")); 
                $abril = date('Y-m-d', strtotime("{$agregando_mes} - 1 day"));

                $fecha_base = "$anio-05";
                $agregando_mes = date("Y-m-d",strtotime("{$fecha_base}+ 1 month")); 
                $mayo = date('Y-m-d', strtotime("{$agregando_mes} - 1 day"));

                $fecha_base = "$anio-06";
                $agregando_mes = date("Y-m-d",strtotime("{$fecha_base}+ 1 month")); 
                $junio = date('Y-m-d', strtotime("{$agregando_mes} - 1 day"));

                $fecha_base = "$anio-07";
                $agregando_mes = date("Y-m-d",strtotime("{$fecha_base}+ 1 month")); 
                $julio = date('Y-m-d', strtotime("{$agregando_mes} - 1 day"));

                $fecha_base = "$anio-08";
                $agregando_mes = date("Y-m-d",strtotime("{$fecha_base}+ 1 month")); 
                $agosto = date('Y-m-d', strtotime("{$agregando_mes} - 1 day"));

                $fecha_base = "$anio-09";
                $agregando_mes = date("Y-m-d",strtotime("{$fecha_base}+ 1 month")); 
                $septiembre = date('Y-m-d', strtotime("{$agregando_mes} - 1 day"));

                $fecha_base = "$anio-10";
                $agregando_mes = date("Y-m-d",strtotime("{$fecha_base}+ 1 month")); 
                $octubre = date('Y-m-d', strtotime("{$agregando_mes} - 1 day"));

                $fecha_base = "$anio-11";
                $agregando_mes = date("Y-m-d",strtotime("{$fecha_base}+ 1 month")); 
                $noviembre = date('Y-m-d', strtotime("{$agregando_mes} - 1 day"));

                $fecha_base = "$anio-12";
                $agregando_mes = date("Y-m-d",strtotime("{$fecha_base}+ 1 month")); 
                $diciembre = date('Y-m-d', strtotime("{$agregando_mes} - 1 day"));*/


                /*$febrero = date("Y-m-d",strtotime($enero."+ 1  month"));
                $marzo = date("Y-m-d",strtotime($febrero."+ 1  month"));
                $abril = date("Y-m-d",strtotime($marzo."+ 1  month"));
                $mayo = date("Y-m-d",strtotime($abril."+ 1  month"));
                $junio = date("Y-m-d",strtotime($mayo."+ 1  month"));
                $julio = date("Y-m-d",strtotime($junio."+ 1  month"));
                $agosto = date("Y-m-d",strtotime($julio."+ 1  month"));
                $septiembre = date("Y-m-d",strtotime($agosto."+ 1 month"));
                $octubre = date("Y-m-d",strtotime($septiembre."+ 1  month"));
                $noviembre = date("Y-m-d",strtotime($octubre."+ 1  month"));
                $diciembre = date("Y-m-d",strtotime($noviembre."+ 1  month"));*/

           
        

?>