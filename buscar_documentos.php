


<?php
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$respuesta = [];
$folio="";

$folio=$variables['folio_carpeta_doc'];

//ruta para buacar
$ruta = "documentos/".$folio;

if (is_dir($ruta)){
    // Abre un gestor de directorios para la ruta indicada
    $gestor = opendir($ruta);

    // Recorre todos los archivos del directorio
    while (($archivo = readdir($gestor)) !== false)  {
        // Solo buscamos archivos sin entrar en subdirectorios
        if (is_file($ruta."/".$archivo)) {
            $respuesta [] =  "http://localhost/sugerencias/".$ruta."/".$archivo;
           /* echo "<img src='".$ruta."/".$archivo."' width='200px' alt='".$archivo."' title='".$archivo."'>";*/
        }            
    }
    // Cierra el gestor de directorios
    closedir($gestor);
} else {
    $respuesta = [];
}
echo json_encode($respuesta);
?>