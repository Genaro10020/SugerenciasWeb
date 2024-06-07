<?php
session_start();

// Verifica si se recibió la imagen base64 y el ID del EAD
if(isset($_POST['imagen']) && isset($_POST['id_ead'])) {
    // Obtiene los datos de la imagen en formato base64
    $imagen_base64 = $_POST['imagen'];
    // Obtiene el ID del EAD
    $id_ead = $_POST['id_ead'];
    
    // Directorio donde se guardará la imagen
    $target_dir = $id_ead . '/' . date('Y-m-d') . '/'; // Utiliza el formato de fecha ISO 8601
    
    // Crea el directorio si no existe
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    
    // Decodifica los datos de la imagen de base64 a un archivo
    $imagen_data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imagen_base64));
    
    // Genera un nombre único para el archivo de imagen
    $filename = uniqid('imagen_') . '.png'; // Usamos un nombre único para evitar conflictos
    
    // Ruta completa del archivo de imagen
    $ruta_y_doc = $target_dir . $filename;
    
    // Guarda la imagen en el directorio de destino
    if (file_put_contents($ruta_y_doc, $imagen_data)) {
        $salida = "La imagen se ha guardado correctamente en: " . $ruta_y_doc;
    } else {
        $salida = "Error al guardar la imagen.";
    }
} else {
    $salida = "No se recibieron datos de imagen o ID de EAD.";
}

// Devuelve la respuesta como JSON
echo json_encode($salida);
?>
