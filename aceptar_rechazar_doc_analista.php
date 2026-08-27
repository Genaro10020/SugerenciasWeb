<?php
 include "conexionGhoner.php";  
// Para almacenar la ruta de los archivos cargados
$files_arr = array();

///////////////////////////header("Content-Type: application/json");
$accion = $_POST['accion_'];

if(isset($_POST['id_concentrado'])){
    $id_concentrado=$_POST['id_concentrado']; 
}

$folio=$_POST['folio_']; 


// Ciclo todos los archivos
                    
    if($accion=="aceptar"){ //se da 100% en cumplimiento y se pone como implementacion

        $actualizar = "UPDATE concentrado_sugerencias SET cumplimiento ='100', status='Implementada', status_impacto = 'Midiendo',  status_PPT = 'Aceptada' WHERE id = '$id_concentrado'";//actauliando cantidad de documetos en BD.
        $query = mysqli_query($conexion,$actualizar);
        
    }else if($accion == "rechazar"){ //se queda en 99 el cumplimiento
        $actualizar = "UPDATE concentrado_sugerencias SET status_PPT = 'Rechazado' WHERE id = '$id_concentrado'";//actauliando cantidad de documetos en BD.
        $query = mysqli_query($conexion,$actualizar);
    }

echo json_encode($files_arr);
?>