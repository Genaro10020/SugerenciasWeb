<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$var_tipo_de_cierre=$variables['var_tipo_de_cierre'];
$causa_no_factibilidad=$variables['causa_no_factibilidad'];
$id_concentrado=$variables['id_concentrado'];
$no_factible = $variables['no_factible'];
$folio = $variables['folio'];
$nombre_sugerencia = $variables['nombre_sugerencia'];
$resultado = "";
$resultados =[]; 
include "conexionGhoner.php";
        $actualizar= "UPDATE concentrado_sugerencias SET cumplimiento=99, status = '$var_tipo_de_cierre', causa_no_factibilidad = '$causa_no_factibilidad' WHERE id='$id_concentrado'";
        $query = mysqli_query( $conexion, $actualizar);
        $resultado = $query;
        if($resultado){
            $resultados[0] = "correcto";

            if($no_factible==true){
                $analista_de_factibilidad = $_SESSION["usuario"];
                $planta = $_SESSION["planta"];

                $consulta = "SELECT * FROM usuarios_sugerencias WHERE planta = '$planta' && tipo = 'Gerente'";
                $dato = mysqli_query($conexion,$consulta);
                if (mysqli_num_rows($dato)>0)
                {
                        $row = mysqli_fetch_assoc($dato);  // Recupera solo una fila
                        $email = $row['email'];  // Extrae el correo electrónico
                        //header('Content-Type: text/html; charset=utf-8'); 
                        // Varios destinatarios
                        //$para  = $email . ', gvillanuevap@enerya.com'; // atención a la coma
                        if (preg_match("/prueba/i", $folio)) {
                            $para = 'gvillanuevap@enerya.com,practicantexpo@enerya.com';
                        } else {
                            $para = $email . ', gvillanuevap@enerya.com';;
                        }
                        
                        // título
                        $título = 'Analista '.$analista_de_factibilidad.' envió Sugerencia a no factibilidad';
                        $mensaje = '
                        <html>
                            <head>
                            <title>Datos de la sugerencia</title>
                            </head>
                            <body>
                            <p>¡Sugerencia enviada a no factibilidad!.<br>
                            <table>
                                <tr>
                                    <th colspan="2">Información básica de la sugerencia:</th>
                                </tr>
                                 <tr>
                                    <td>Analista:</td><td>'.$analista_de_factibilidad.'</td>
                                </tr>
                                 <tr>
                                    <td>Folio: </td><td>'.$folio.'</td>
                                </tr>
                                <tr>
                                    <td>Nombre de la sugerencia:</td><td>'.$nombre_sugerencia.'</td>
                                </tr>
                                <tr>
                                    <td>Causa no factibilidad:</td><td>'.$causa_no_factibilidad.'</td>
                                </tr>
                                 <tr>
                                    <td>Ruta del sistema: </td><td> https://vvnorth.com/Sugerencia/</td> 
                                </tr>
                            </table>
                            </body>
                        </html>';
                        $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
                        $cabeceras .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                        $cabeceras .= 'From: Sugerencias <iscgenarovp@gmail.com>' . "\r\n";
                        $mail=mail($para,$título, $mensaje, $cabeceras);
                        if($mail){
                            $resultados[] = "enviado";
                        }else{
                            $resultados[] = "no se envio";
                        }
                }
            }
        }else{
            $resultados[] = "mal";
        }
echo json_encode($resultados);
?>