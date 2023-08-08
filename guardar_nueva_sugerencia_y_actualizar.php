<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$tipo=$variables['tipo_nueva_o_actualizar'];
$id=$variables['id'];
$cumplimiento=$variables['cumplimiento'];
$sindicalizado_empleado=$variables['sindicalizado_empleado'];
$nombre_sugerencia=$variables['nombre_sugerencia'];
$folio=$variables['folio'];
$status= $variables['status'];
//$causa_no_factibilidad= $variables['causa_no_factibilidad'];
$situacion_actual= $variables['situacion_actual'];
$idea_propuesta= $variables['idea_propuesta'];
$nomina= $variables['nomina'];
$colaborador= $variables['colaborador'];
$puesto= $variables['puesto'];
$planta= $variables['planta'];
$area= $variables['area'];
$area_participante= $variables['area_participante'];
$subarea= $variables['subarea'];
$impacto_primario= $variables['impacto_primario'];
$impacto_secundario= $variables['impacto_secundario'];
$tipo_desperdicio= $variables['tipo_desperdicio'];
$objetivo_de_calidadMA= $variables['objetivo_de_calidadMA'];
$objetivo_de_calidadMA_cadena=implode(',', $objetivo_de_calidadMA);
$fecha_sugerencia= $variables['fecha_sugerencia'];
$fecha_sugerencia = date("Y-m-d", strtotime($fecha_sugerencia));
$fecha_inicio= $variables['fecha_inicio'];
$fecha_inicio = date("Y-m-d", strtotime($fecha_inicio));
$fecha_compromiso= $variables['fecha_compromiso'];
$fecha_real_de_cierre= $variables['fecha_real_de_cierre'];
$analista_de_factibilidad= $variables['analista_de_factibilidad'];
$impacto_planeado= $variables['impacto_planeado'];
$impacto_real= $variables['impacto_real'];
$creado_o_modificado= date('Y-m-d');
$creado_por_o_modificado_por=$variables['usuario'];
$fecha_limite= date("Y-m-d",strtotime($fecha_inicio."+ 8 days")); //agregando 7 dias
include "conexionGhoner.php";
    if($tipo=="nueva"){
        $consulta = "INSERT INTO concentrado_sugerencias (cumplimiento, sindicalizado_empleado, nombre_sugerencia, folio, status, causa_no_factibilidad, situacion_actual, idea_propuesta,
        numero_nomina,password, colaborador,puesto,planta,area,area_participante,subarea,impacto_primario,impacto_secundario,tipo_de_desperdicio,objetivo_de_calidad_ma, 
        fecha_de_sugerencia, fecha_de_inicio, fecha_limite, fecha_compromiso, fecha_real_cierre, analista_de_factibilidad, impacto_planeado, impacto_real, creado_por, creado, modificado_por, modificado) 
        VALUES ('$cumplimiento','$sindicalizado_empleado','$nombre_sugerencia','$folio','$status', '','$situacion_actual','$idea_propuesta','$nomina','123456','$colaborador','$puesto','$planta','$area','$area_participante',
        '$subarea','$impacto_primario','$impacto_secundario','$tipo_desperdicio','$objetivo_de_calidadMA_cadena','$fecha_sugerencia','$fecha_inicio','$fecha_limite','$fecha_compromiso','$fecha_real_de_cierre','$analista_de_factibilidad','$impacto_planeado','$impacto_real','$creado_por_o_modificado_por','$creado_o_modificado','modificado por','modificado')";
        $query = mysqli_query( $conexion, $consulta);
        if($query==true){
            $resultado="agregada";

            $consulta = "SELECT * FROM usuarios_sugerencias WHERE nombre = '$analista_de_factibilidad' && tipo = 'Analista'";
            $resultado = mysqli_query($conexion,$consulta);
            if (mysqli_num_rows($resultado)>0)
            {
               
                while ($row = mysqli_fetch_array($resultado)){
                    $email = $row['email'];
                }
                
                    //header('Content-Type: text/html; charset=utf-8'); 
                    // Varios destinatarios
                    $para  = $email . ', '; // atención a la coma
                    //$para .= 'iscgenarovp@gmail.com';
                    // título
                    $título = 'Cuenta con un nueva sugerencia.';
                    // mensaje
                    $mensaje = '
                    <html>
                        <head>
                        <title>Datos para de la sugerencia</title>
                        </head>
                        <body>
                        <p>¡Recomendado no exceder la fecha, para su factibilidad '.$fecha_limite.'.<br>
                        <table>
                            <tr>
                                <td>Ruta del sistema: </td><td> https://vvnorth.com/Sugerencia/</td> 
                            </tr>
                            <tr>
                                <th colspan="2">Información básica de la sugerencia:</th>
                            </tr>
                            <tr>
                                <td>Nombre de la sugerencia: </td><td> '.$nombre_sugerencia.'</td>
                            </tr>
                            <tr>
                                <td>Folio: </td><td> '.$folio.'</td>
                            </tr>
                        </table>
                        </body>
                    </html>';
                    // Para enviar un correo HTML, debe establecerse la cabecera Content-type
                    $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
                    $cabeceras .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    //$cabeceras .= 'Content-Type: text/html; charset=utf-8' . "\r\n";
                    //$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                    // Cabeceras adicionales
                    //$cabeceras .= 'To: Genaro <gvillanuevap@enerya.com>' . "\r\n";
                    $cabeceras .= 'From: Sugerencias <iscgenarovp@gmail.com>' . "\r\n";
                    //$cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
                    //$cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";
                    // Enviarlo
                    $mail=mail($para,$título, $mensaje, $cabeceras);
                    $mail?"correcto":"<h1>El envío de correo falló.</h1>";
                    //echo "correcto";
            }



           

        }
    }else if($tipo=="actualizar"){
        $consulta= "UPDATE concentrado_sugerencias SET sindicalizado_empleado='$sindicalizado_empleado', nombre_sugerencia='$nombre_sugerencia', folio = '$folio', status = '$status', 
        situacion_actual = '$situacion_actual', idea_propuesta =  '$idea_propuesta', numero_nomina = '$nomina', colaborador =  '$colaborador', puesto = '$puesto', planta = '$planta', 
        area = '$area', area_participante = '$area_participante', subarea = '$subarea', impacto_primario = '$impacto_primario', impacto_secundario = '$impacto_secundario',
        tipo_de_desperdicio = '$tipo_desperdicio', objetivo_de_calidad_ma = '$objetivo_de_calidadMA_cadena', fecha_de_sugerencia =  '$fecha_sugerencia', 
        fecha_de_inicio = '$fecha_inicio', fecha_limite= '$fecha_limite', fecha_compromiso = '$fecha_compromiso', fecha_real_cierre =  '$fecha_real_de_cierre', analista_de_factibilidad  = '$analista_de_factibilidad', 
        impacto_planeado = '$impacto_planeado', impacto_real = '$impacto_real', modificado_por = '$creado_por_o_modificado_por', modificado = '$creado_o_modificado'  WHERE id='$id'";
        
        $query = mysqli_query( $conexion, $consulta);
        if($query==true){
            //$resultado="actualizada";

                    $consulta = "SELECT * FROM usuarios_sugerencias WHERE nombre = '$analista_de_factibilidad' && tipo = 'Analista'";
                    $resultado = mysqli_query($conexion,$consulta);
                    if (mysqli_num_rows($resultado)>0)
                    {
                        while ($row = mysqli_fetch_array($resultado)){
                            $email = $row['email'];
                        }
                        
                            //header('Content-Type: text/html; charset=utf-8'); 
                            // Varios destinatarios
                            $para  = $email . ', '; // atención a la coma
                            //$para .= 'iscgenarovp@gmail.com';
                            // título
                            $título = 'Cuenta con un nueva sugerencia. (Reasignada)';
                            // mensaje
                            $mensaje = '
                            <html>
                                <head>
                                <title>Datos para de la sugerencia</title>
                                </head>
                                <body>
                                <p>¡Recomendado no exceder la fecha, para su factibilidad '.$fecha_limite.'.<br>
                                <table>
                                    <tr>
                                        <td>Ruta del sistema: </td><td> https://vvnorth.com/Sugerencia/</td> 
                                    </tr>
                                    <tr>
                                        <th colspan="2">Información básica de la sugerencia:</th>
                                    </tr>
                                    <tr>
                                        <td>Nombre de la sugerencia: </td><td> '.$nombre_sugerencia.'</td>
                                    </tr>
                                    <tr>
                                        <td>Folio: </td><td> '.$folio.'</td>
                                    </tr>
                                </table>
                                </body>
                            </html>';
                            // Para enviar un correo HTML, debe establecerse la cabecera Content-type
                            $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
                            $cabeceras .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                            //$cabeceras .= 'Content-Type: text/html; charset=utf-8' . "\r\n";
                            //$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                            // Cabeceras adicionales
                            //$cabeceras .= 'To: Genaro <gvillanuevap@enerya.com>' . "\r\n";
                            $cabeceras .= 'From: Sugerencias <iscgenarovp@gmail.com>' . "\r\n";
                            //$cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
                            //$cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";
                            // Enviarlo
                            $mail=mail($para,$título, $mensaje, $cabeceras);
                            $mail?"correcto":"<h1>El envío de correo falló.</h1>";
                            //echo "correcto";
                    }

                }
        $resultado = $query;
    }else{

    }

echo json_encode($resultado);
?>