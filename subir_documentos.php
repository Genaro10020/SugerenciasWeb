<?php

// Para almacenar la ruta de los archivos cargados
$files_arr = array();

if(isset($_FILES['files']['name'])){

///////////////////////////header("Content-Type: application/json");
$folio=$_POST['folio'];    
// Contar archivos totales
$countfiles = count($_FILES['files']['name']);

//ruta
$path = "documentos/".$folio."/";
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
                            $valid_ext = array("png","jpeg","jpg","pdf","txt","doc","docx");

                            // Revisar extension
                            if(in_array($ext, $valid_ext)){

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