<?php
 include "conexionGhoner.php";  
// Para almacenar la ruta de los archivos cargados
$files_arr = array();

if(isset($_FILES['files']['name'])){

///////////////////////////header("Content-Type: application/json");
$cantidad=0;
$usuarioTipo = $_POST['tipo_usuario'];
$suma=0;
    if(isset($_POST['id_concentrado'])){
        $id_concentrado=$_POST['id_concentrado']; 
    }
    if(isset($_POST['cantidad'])){
        $cantidad=$_POST['cantidad'];     
    }
$cual_documento=$_POST['cual_documento']; 
$folio=$_POST['folio']; 


// Contar archivos totales
$countfiles = count($_FILES['files']['name']);
$suma=$countfiles + $cantidad;
//ruta

    $path = "documentos/".$folio."/".$cual_documento."/";



//verificar si existe directorio de$path = "sample/path/newfolder";
if (!file_exists($path)) {
    mkdir($path, 0777, true);
}

// Ciclo todos los archivos
    for($index = 0;$index < $countfiles;$index++)
            {
                if(isset($_FILES['files']['name'][$index]) && $_FILES['files']['name'][$index] != '')
                    {
                            // Nombre del archivo
                            $filename = $_FILES['files']['name'][$index];
                            
                            // Obtener la extensión del archivo
                            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

                            // Validar extensiones permitidas
                            if($cual_documento=="sugerencia" || $cual_documento=="reto" ){
                                $valid_ext = array("png","jpeg","jpg","pdf");//entension valida para 
                            }
                            if($cual_documento=="premio" ||  $cual_documento=="entregado"){
                                $valid_ext = array("png","jpeg","jpg");//entension valida para 
                            }
                            if($cual_documento=="ppt"){
                                $valid_ext = array("docx","ppt","pptx","xls","xlsx");
                            }
                            if($cual_documento=="nofactibleopcional"){
                                $valid_ext = array("png","jpeg","jpg","pdf","doc","docx","ppt","pptx");
                            }
                           

                            // Revisar extension
                            if(in_array($ext, $valid_ext)){

                            //subir cantidad de documentos existentes en BD
                            
                            // Ruta de archivo
                            //$newfilename = time()."_".$filename;
                            $filename = str_replace(" ","_", $filename);
                            $newfilename = $filename;
                            $ruta_y_doc= $path.$newfilename;

                            // Subir archivos
                            if(move_uploaded_file($_FILES['files']['tmp_name'][$index],$ruta_y_doc)){
                           // $files_arr[] = "http://localhost/sugerencias/".$ruta_y_doc;
                           $files_arr[] = $ruta_y_doc;


                           ///////
                                    if($cual_documento=="reto"){
                                        $actualizar = "UPDATE concentrado_retos_segerencias SET cantidad_img='$suma' WHERE id = '$id_concentrado'";
                                        $query = mysqli_query($conexion,$actualizar);
                                        }
                                    
                                        if($cual_documento=="sugerencia"){
                                            $actualizar = "UPDATE concentrado_sugerencias SET cantidadDOC='$suma' WHERE id = '$id_concentrado'";
                                            $query = mysqli_query($conexion,$actualizar);
                                        }
                                        if($cual_documento=="ppt"){

                                            if($usuarioTipo == "analista"){

                                                $status_actual="";
                                                $consulta = "SELECT * FROM concentrado_sugerencias WHERE id = '$id_concentrado'";
                                                $query = mysqli_query($conexion,$consulta);
                                                while($datos = mysqli_fetch_array($query)){
                                                    $status_actual=$datos['status_PPT'];
                                                }

                                                if($status_actual == "Rechazado" || $status_actual == 'Eliminado' || $status_actual == 'Corregido' || $status_actual == 'Por Validar'){

                                                    date_default_timezone_set('America/Mexico_City');
                                                    $fecha_cierre = date("Y-m-d");
                                                    
                                                    $hay_fecha_cierre="";
                                                    $consulta = "SELECT * FROM concentrado_sugerencias WHERE id = '$id_concentrado'";
                                                    $query = mysqli_query($conexion,$consulta);
                                                    while($datos = mysqli_fetch_array($query)){
                                                        $hay_fecha_cierre=$datos['fecha_real_cierre'];
                                                    }
                                                    
                                                    if(empty($hay_fecha_cierre)){// si no hay fecha cierre agregar
                                                        $actualizar = "UPDATE concentrado_sugerencias SET  fecha_real_cierre='$fecha_cierre', cantidadPPT='$suma', status_PPT = 'Corregido' WHERE id = '$id_concentrado'";//actauliando cantidad de documetos en BD.
                                                        $query = mysqli_query($conexion,$actualizar);
                                                    }else{
                                                        $actualizar = "UPDATE concentrado_sugerencias SET cantidadPPT='$suma', status_PPT = 'Corregido' WHERE id = '$id_concentrado'";//actauliando cantidad de documetos en BD.
                                                        $query = mysqli_query($conexion,$actualizar);
                                                    }
                                                    
                                                }else if($status_actual == ''){ //primera vez que se sube un documento

                                                    date_default_timezone_set('America/Mexico_City');
                                                    $fecha_cierre = date("Y-m-d");
                                                    
                                                    $hay_fecha_cierre="";
                                                    $consulta = "SELECT * FROM concentrado_sugerencias WHERE id = '$id_concentrado'";
                                                    $query = mysqli_query($conexion,$consulta);
                                                    while($datos = mysqli_fetch_array($query)){
                                                        $hay_fecha_cierre=$datos['fecha_real_cierre'];
                                                    }
                                                    if(empty($hay_fecha_cierre)){// si no hay fecha cierre agregar
                                                        $actualizar = "UPDATE concentrado_sugerencias SET fecha_real_cierre='$fecha_cierre', cantidadPPT='$suma', status_PPT = 'Por Validar' WHERE id = '$id_concentrado'";//actauliando cantidad de documetos en BD.
                                                        $query = mysqli_query($conexion,$actualizar);
                                                    }else{
                                                        $actualizar = "UPDATE concentrado_sugerencias SET cantidadPPT='$suma', status_PPT = 'Por Validar' WHERE id = '$id_concentrado'";//actauliando cantidad de documetos en BD.
                                                        $query = mysqli_query($conexion,$actualizar);
                                                    }
                                                }


                                            }else{
                                                date_default_timezone_set('America/Mexico_City');
                                                $fecha_cierre = date("Y-m-d");
                                                
                                                $hay_fecha_cierre="";
                                                $consulta = "SELECT * FROM concentrado_sugerencias WHERE id = '$id_concentrado'";
                                                $query = mysqli_query($conexion,$consulta);
                                                while($datos = mysqli_fetch_array($query)){
                                                    $hay_fecha_cierre=$datos['fecha_real_cierre'];
                                                }
                                                
                                                if(empty($hay_fecha_cierre)){// si no hay fecha cierre agregar
                                                    $actualizar = "UPDATE concentrado_sugerencias SET cumplimiento ='100', `status`='Implementada', cantidadPPT='$suma', status_impacto = 'Midiendo' WHERE id = '$id_concentrado'";//actauliando cantidad de documetos en BD. se quito  fecha_real_cierre='$fecha_cierre', solo Analis.
                                                    $query = mysqli_query($conexion,$actualizar);
                                                }else{
                                                    $actualizar = "UPDATE concentrado_sugerencias SET cumplimiento ='100', `status`='Implementada', cantidadPPT='$suma', status_impacto = 'Midiendo' WHERE id = '$id_concentrado'";//actauliando cantidad de documetos en BD.
                                                    $query = mysqli_query($conexion,$actualizar);

                                                }
                                            }
                                        } 
                           /////

                                    if($cual_documento=="premio"){
                                        $actualizar = "UPDATE concentrado_premios_sugerencias SET cant_img='$suma', url_premio='$ruta_y_doc' WHERE id = '$id_concentrado'";
                                        $query = mysqli_query($conexion,$actualizar);
                                    }

                                    if($cual_documento=="entregado"){
                                        $id_premio=$id_concentrado;
                                        $actualizar = "UPDATE canjer_premios_colaborador_sugerencias SET  cant_img_evidencia='$suma', fecha_entrega = NOW(), `status`='Entregado' WHERE id = '$id_premio'";
                                        $query = mysqli_query( $conexion, $actualizar);
                                    }
                            }
                        }
                    }
            }

}

echo json_encode($files_arr);
?>