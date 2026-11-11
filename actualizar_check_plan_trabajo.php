<?php
session_start();
ini_set('display_errors', 0);
error_reporting(E_ALL);
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
$analista_de_factibilidad= $_SESSION['nombre'];
$numero_nomina = $variables['numero_nomina'];

$correo_enviado = false;
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
                $mail = false;


                $selecto = "SELECT * FROM concentrado_sugerencias WHERE id = '$id_concentrado'";
                $query0 = mysqli_query( $conexion, $selecto);

                while ($fila = mysqli_fetch_array($query0)) {
                        $estatus_actual= $fila['status'];
                }

                if($estatus_actual == "En Factibilidad"){
                        $actualizar = "UPDATE concentrado_sugerencias SET fecha_factibilidad = NOW() WHERE id = '$id_concentrado'";
                        $query = mysqli_query( $conexion, $actualizar);
                        $resultado = $query;
                }

                $actualizar1 = "UPDATE plan_trabajo_sugerencias SET enviado_o_no='$enviado_o_no' WHERE id_concentrado = '$id_concentrado'";
                $query1 = mysqli_query( $conexion, $actualizar1);
                $consulta1=$query1;

                $actualizar2 = "UPDATE concentrado_sugerencias SET 
                status = 'En Implementación',
                impacto_primario = '$impacto_primario', 
                impacto_secundario = '$impacto_secundario', 
                tipo_de_desperdicio = '$tipo_desperdicio', 
                objetivo_de_calidad_ma = '$objetivo_de_calidadMA_cadena', 
                check_mc='$check' 
                WHERE id = '$id_concentrado'";
                $query2 = mysqli_query( $conexion, $actualizar2);
                $consulta2=$query2;

                
         if($query1==true){
            //$resultado="actualizada";
                        if ($check == "Pendiente") {
                                $accion_recomendada = "Favor de revisar el plan de trabajo.";
                                $info = "Sugerencia de Mejora - Revisar Plan de Trabajo";
                                $status= "Nuevo";
                        } else if ($check == "Corregido") {
                                $accion_recomendada = "Verificar los cambios realizados en el plan de trabajo.";
                                $info = "Sugerencia de Mejora - Se corrigio el plan de trabajo";
                                $status= "Corregido";
                        } else {
                                $accion_recomendada = "El estatus de su sugerencia ha sido actualizado.";
                                $info = "Sugerencia de Mejora - Actualización de Plan de Trabajo";
                                $status= "Desconocido";
                        }
                // Destinatario principal
                $para = 'agonzalezd@enerya.com';
                // Título
                $título = $info;
                // Mensaje
                $mensaje = '
                <html>
                <head>
                        <title>Datos del plan de trabajo</title>
                </head>
                <body>
                        <p>¡Revisar plan de trabajo!</p>
                        <table>
                        <tr>
                                <td>Ruta del sistema:</td>
                                <td>https://vvnorth.com/Sugerencia/</td>
                        </tr>
                        <tr>
                                <th colspan="4">Información del plan de trabajo:</th>
                        </tr>
                        <tr>
                                <td>Estatus:</td>
                                <td>'.$status.'</td>
                        </tr>
                        <tr>
                                <td>Analista:</td>
                                <td>'.$analista_de_factibilidad.'</td>
                        </tr>
                        <tr>
                                <td>Folio:</td>
                                <td>'.$folio.'</td>
                        </tr>
                        <tr>
                                <td>Acción:</td>
                                <td>'.$accion_recomendada.'</td>
                        </tr>
                        </table>
                </body>
                </html>';
                // Cabeceras
                $cabeceras  = "MIME-Version: 1.0\r\n";
                $cabeceras .= "Content-Type: text/html; charset=UTF-8\r\n";
                $cabeceras .= "From: Sugerencias <iscgenarovp@gmail.com>\r\n";
                $cabeceras .= "Cc: gvillanuevap@enerya.com\r\n";

                // Enviar correo
                $mail = mail($para, $título, $mensaje, $cabeceras);

                if ($mail) {
                        error_log("correcto");
                } else {
                        error_log("El envío de correo falló.");
                }
        }
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

        $resultado = [$check,$consulta1,$consulta2,$consulta3,$consulta4,$correo_enviado,$analista_de_factibilidad, $para,$mail];
echo json_encode($resultado);
?>