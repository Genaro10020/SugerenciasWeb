<?php
 include "conexionGhoner.php";  
// Para almacenar la ruta de los archivos cargados
$files_arr = array();

if(isset($_FILES['files']['name'])){

///////////////////////////header("Content-Type: application/json");
$id_concentrado=$_POST['id_concentrado']; 
$folio=$_POST['folio']; 
$cual_documento=$_POST['cual_documento'];    
$cantidad=0;
$suma=0;
$cantidad=$_POST['cantidad'];   
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
                            }else{
                                $valid_ext = array("docx","ppt","pptx");
                            }
                           

                            // Revisar extension
                            if(in_array($ext, $valid_ext)){

                            //subir cantidad de documentos existentes en BD
                           
                            if($cual_documento=="sugerencia"){
                                $actualizar = "UPDATE concentrado_sugerencias SET cantidadDOC='$suma' WHERE id = '$id_concentrado'";
                                $query = mysqli_query($conexion,$actualizar);
                            }
                            if($cual_documento=="ppt"){
                                $actualizar = "UPDATE concentrado_sugerencias SET cantidadPPT='$suma' WHERE id = '$id_concentrado'";
                                $query = mysqli_query($conexion,$actualizar);
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