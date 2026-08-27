<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$resultado=[];
$consulta1 = "";
$consulta2 = "";
$consulta3 = "";
$consulta4 = "";
//formulario
$impacto_primario=$variables['impacto_primario'];
$impacto_secundario=$variables['impacto_secundario'];
$tipo_desperdicio=$variables['tipo_desperdicio'];
$objetivos_de_calidadMA = $variables['objetivos_de_calidadMA'];
$objetivo_de_calidadMA_cadena=implode(',', $objetivos_de_calidadMA);

$numero_nomina = $variables['numero_nomina'];
$folio = $variables['folio'];
$tipo_impacto= $variables['tipo_impacto'];
//formulario Cuantitativo
$indicador= $variables['indicador_cuanti'];
$linea_base= $variables['linea_base_cuanti'];
$resultado_esperado = $variables['resultado_esperado_cuanti'];

//formulario cualitativo
$impacto = $variables['impacto_cualitativo'];

//plan
$id_concentrado=$variables['id_concentrado'];
$enviado_o_no=$variables['enviado_o_no'] ;
$check=$variables['check_mc'] ;
if($check=="Pendiente" || $check=="" || $check==" "){
        $check = "Pendiente";
}else if($check=="Rechazado"){
        $check = "Corregido";
}else if($check=="Aceptado"){
        $check = "Corregido";
}else{
        $check = "Pendiente";
}
include "conexionGhoner.php";

        $actualizar1 = "UPDATE plan_trabajo_sugerencias SET enviado_o_no='$enviado_o_no' WHERE id_concentrado = '$id_concentrado'";
        $query1 = mysqli_query( $conexion, $actualizar1);
        $consulta1=$query1;

        $actualizar2 = "UPDATE concentrado_sugerencias SET impacto_primario = '$impacto_primario', impacto_secundario = '$impacto_secundario', tipo_de_desperdicio = '$tipo_desperdicio', objetivo_de_calidad_ma = '$objetivo_de_calidadMA_cadena', check_mc='$check' WHERE id = '$id_concentrado'";
        $query2 = mysqli_query( $conexion, $actualizar2);
        $consulta2=$query2;

        if($tipo_impacto=="Cuantitativo"){
                $consulta = "SELECT * FROM impacto_cuantitativo_sugerencias WHERE id_concentrado = '$id_concentrado'";
                $query = mysqli_query( $conexion, $consulta);
                if(mysqli_num_rows($query)>0){//SI EXISTE EL REGISTRO ACTUALIZA NADA MAS.
                        $actualizar = "UPDATE impacto_cuantitativo_sugerencias SET numero_nomina ='$numero_nomina' ,indicador='$indicador', linea_base='$linea_base',	resultado_esperado='$resultado_esperado' WHERE id_concentrado = '$id_concentrado'"; ;
                        $querys = mysqli_query( $conexion, $actualizar);
                        $consulta3 = $querys;
                        
                }else{//SI NO EXISTE EL REGISTRO INSERTA.
                        $insertar = "INSERT INTO impacto_cuantitativo_sugerencias (id_concentrado, folio,numero_nomina, indicador, linea_base,	resultado_esperado) 
                        VALUES ('$id_concentrado', '$folio','$numero_nomina','$indicador', '$linea_base', '$resultado_esperado')";
                        $quer = mysqli_query( $conexion, $insertar);
                        $consulta3 = $quer;
                }

                $actualizar = "UPDATE concentrado_sugerencias SET validacion_de_impacto ='$tipo_impacto' WHERE id = '$id_concentrado'";
                $actualizando = mysqli_query( $conexion, $actualizar);
                $consulta4 = $actualizando;
        }

        if($tipo_impacto == "Cualitativo"){
                $consulta = "SELECT * FROM impacto_cualitativo_sugerencias WHERE id_concentrado = '$id_concentrado' AND folio = '$folio'";
                $query = mysqli_query( $conexion, $consulta);
                if(mysqli_num_rows($query)>0){//SI EXISTE EL REGISTRO ACTUALIZA NADA MAS. id_concentrado = '$id_concentrado', folio = '$folio',
                        $actualizar = "UPDATE impacto_cualitativo_sugerencias SET  numero_nomina = '$numero_nomina', impacto ='$impacto' WHERE id_concentrado = '$id_concentrado'"; ;
                        $querys = mysqli_query( $conexion, $actualizar);
                        $consulta3 = $querys;
        
                }else{//SI NO EXISTE EL REGISTRO INSERTA.

                        $insertar = "INSERT INTO impacto_cualitativo_sugerencias (id_concentrado, folio, numero_nomina,impacto) 
                        VALUES ('$id_concentrado', '$folio','$numero_nomina','$impacto')";
                        $quer = mysqli_query( $conexion, $insertar);
                        $consulta3 = $quer;
                }

                $actualizar = "UPDATE concentrado_sugerencias SET validacion_de_impacto ='$tipo_impacto' WHERE id = '$id_concentrado'"; ;
                $actualizando = mysqli_query( $conexion, $actualizar);
                $consulta4 = $actualizando;

        }

        $resultado = [$check,$consulta1,$consulta2,$consulta3,$consulta4];
echo json_encode($resultado);
?>