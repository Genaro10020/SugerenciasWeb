<?php
 include "conexionGhoner.php";  
// Para almacenar la ruta de los archivos cargados
$files_arr = array();

if(isset($_FILES['files']['name'])){

///////////////////////////header("Content-Type: application/json");
$cantidad=0;
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
                            if($cual_documento=="sugerencia"){
                                $valid_ext = array("png","jpeg","jpg","pdf");//entension valida para 
                            }
                            if($cual_documento=="ppt"){
                                $valid_ext = array("docx","ppt","pptx");
                            }
                            if($cual_documento=="nofactibleopcional"){
                                $valid_ext = array("png","jpeg","jpg","pdf","doc","docx","ppt","pptx");
                            }
                           

                            // Revisar extension
                            if(in_array($ext, $valid_ext)){

                            //subir cantidad de documentos existentes en BD
                           
                            if($cual_documento=="sugerencia"){
                                $actualizar = "UPDATE concentrado_sugerencias SET cantidadDOC='$suma' WHERE id = '$id_concentrado'";
                                $query = mysqli_query($conexion,$actualizar);
                            }
                            if($cual_documento=="ppt"){
                                date_default_timezone_set('America/Mexico_City');
                                $fecha_cierre = date("Y-m-d");
                                
                                $hay_fecha_cierre="";
                                $consulta = "SELECT * FROM concentrado_sugerencias WHERE id = '$id_concentrado'";
                                $query = mysqli_query($conexion,$consulta);
                                while($datos = mysqli_fetch_array($query)){
                                    $hay_fecha_cierre=$datos['fecha_real_cierre'];
                                }
                                if(empty($hay_fecha_cierre)){// si no hay fecha cierre agregar
                                    $actualizar = "UPDATE concentrado_sugerencias SET cumplimiento ='100', status='Implementada', fecha_real_cierre='$fecha_cierre', cantidadPPT='$suma', status_impacto = 'Midiendo' WHERE id = '$id_concentrado'";//actauliando cantidad de documetos en BD.
                                    $query = mysqli_query($conexion,$actualizar);
                                }else{
                                    $actualizar = "UPDATE concentrado_sugerencias SET cumplimiento ='100', status='Implementada', cantidadPPT='$suma', status_impacto = 'Midiendo' WHERE id = '$id_concentrado'";//actauliando cantidad de documetos en BD.
                                    $query = mysqli_query($conexion,$actualizar);

                                }
                                
                            }
                           
                            
                            // Ruta de archivo
                            //$newfilename = time()."_".$filename;
                            $filename = str_replace(" ","_", $filename);
                            $newfilename = $filename;
                            $ruta_y_doc= $path.$newfilename;

                            // Subir archivos
                            if(move_uploaded_file($_FILES['files']['tmp_name'][$index],$ruta_y_doc)){
                            $files_arr[] = "http://localhost/sugerencias/".$ruta_y_doc;
                            }
                        }
                    }
            }

}

echo json_encode($files_arr);
?>