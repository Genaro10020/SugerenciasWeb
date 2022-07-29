


<?php
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$respuesta = [];
$folio="";

$folio=$variables['folio_carpeta_doc'];
$cual_documento=$variables['cual_documento'];

//ruta para buacar
$ruta = "documentos/".$folio."/".$cual_documento;

if (is_dir($ruta)){
    // Abre un gestor de directorios para la ruta indicada
    $gestor = opendir($ruta);

    // Recorre todos los archivos del directorio
    while (($archivo = readdir($gestor)) !== false)  {
        // Solo buscamos archivos sin entrar en subdirectorios
        if (is_file($ruta."/".$archivo)) {
            if($cual_documento!="ppt"){
                $respuesta [] =  "http://localhost/sugerencias/".$ruta."/".$archivo;
            }else{
                $respuesta [] =  $ruta."/".$archivo;
            }
           
        }            
    }
    // Cierra el gestor de directorios
    closedir($gestor);
} else {
    $respuesta = [];
}
echo json_encode($respuesta);
?>