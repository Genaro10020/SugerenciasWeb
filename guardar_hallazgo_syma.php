<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
include "conexionGhoner.php";

$resultado = "";

$descripcion = $variables['descripcion'];
$tipoHallazgo = $variables['tipo'];
$planta = $variables['planta'];
$area = $variables['area'];
$user = $_SESSION['usuario'];
$fechaHoy = date('Y-m-d H:m:s');


$insertar = "INSERT INTO seguridad_syma (numero_nomina, descripcion_hallazgo, tipo_hallazgo, planta, area, fecha_hallazgo,status) 
    VALUES ('$user','$descripcion','$tipoHallazgo','$planta','$area','$fechaHoy','Sin Atender')";
$query = mysqli_query($conexion, $insertar);
if ($query) {
    
    $ultimoId = mysqli_insert_id($conexion);  //Ultimo ID
    $resultado = [
        "success" => true,
        "ultimo_id" => $ultimoId
    ];

    //Solo funciona el correo cuando esta en linea
    /*use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require_once 'PHPMailVendor/vendor/autoload.php';
    $mail = new PHPMailer(true);
    try {
        // Configure PHPMailer
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
    
        // Configure SMTP Server
        $mail->Host = 'mx98.hostgator.mx';
        $mail->Username = 'soporte@vvnorth.com';
        $mail->Password = 'eBZ6_$H2Sl-z';
    
        // Configure Email
        $envia =  utf8_decode('Se encontro un hallazgo.');
        $mail->setFrom('soporte@vvnorth.com', $envia);
        $mail->addAddress($correo_auditor);
        //$mail->AddCC($correo_responsable);
        if(isset($_SESSION['empresa']) && $_SESSION['empresa'] =='Enerya'){
            $mail->AddCC('kbmoreno@riasa.com.mx');
        }else if(isset($_SESSION['empresa']) && $_SESSION['empresa'] =='SyMA'){
            $mail->AddCC('jgyanez@enerya.com.mx');
        }
        $mail->AddCC('gvillanuevap@enerya.com');
        //$mail->addAttachment($numeroAuditoria.'.xls',$numeroAuditoria.'.xls');
        $asunto = '(LPAs) Asignación Nueva Aditoría';
        $mail->Subject = utf8_decode($asunto);
        $mail->isHTML(true);
        $Body = 'Se asignó una nueva auditoría.<br><br>
        <b>Código:</b> '.$codigo.'<br>
        <b>Título:</b> '.$titulo.'<br>
        <b>Área:</b> '.$area.'<br>
        <b>Proceso:</b> '.$proceso.'<br>
        <b>Descripción:</b> '.$descripcion.'<br>
        <b>Fecha:</b> '.$fecha;
        $mail->Body=utf8_decode($Body);
        // send mail
        if($mail->Send()){
               // echo "CORREO ENVIADO CON EXITO, AL CORREO AUDITOR: ".$correo_auditor." Y CORREO RESPONSABLE: ".$correo_responsable;
            }else{
               // echo 'NO SE ENVIO EL CORREO.';
            }
        } catch (Exception $e) {
            echo 'NO PUDIMOS ENVIARLO A TU CORREO: '. $mail->ErrorInfo;
        }*/
    




} else {
    $resultado = [
        "success" => false,
        "error" => mysqli_error($conexion), 
        "analizando respuesta" => 'otro resultado'
    ];
}


echo json_encode($resultado);
