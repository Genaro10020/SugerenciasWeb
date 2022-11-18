<?php

include('conexionGhoner.php');



//$files_arr = array();
            
$message="";
$resultado="";
            if($_FILES["files"]["name"][0]){
                                            // Ciclo todos los archivos
                                            $countfiles=1;
                                for($index = 0;$index < $countfiles;$index++)
                                        {
                                            if(isset($_FILES['files']['name'][$index]) && $_FILES['files']['name'][$index] != '')
                                                {

                                                    $targetPath = "subidas/".$_FILES["files"]["name"][$index];
                                                    if(move_uploaded_file($_FILES['files']['tmp_name'][$index], $targetPath)){

                                                                /// leer el archivo excel
                                                                /*include('PHPExcel/Classes/PHPExcel.php');
                                                                $archivo =  $targetPath;
                                                                $inputFileType = PHPExcel_IOFactory::identify($archivo);
                                                                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                                                                $objPHPExcel = $objReader->load($archivo);
                                                                $sheet = $objPHPExcel->getSheet(0); 
                                                                $highestRow = $sheet->getHighestRow(); 
                                                                $highestColumn = $sheet->getHighestColumn();
                                                                for ($row = 2; $row <= $highestRow; $row++){ 
                                                                    $colaborador = $sheet->getCell("A".$row)->getValue();
                                                                    $numero_nomina = $sheet->getCell("B".$row)->getValue();
                                                                    $password = $sheet->getCell("C".$row)->getValue();
                                                                    $sql = "INSERT INTO usuarios_colocaboradores_sugerencias (colaborador, numero_nomina, password) VALUES ('$colaborador','$numero_nomina', '$password')";
                                                                    $query = mysqli_query( $conexion, $sql);
                                                                    $resultado=$query;
                                                                }
                                                                
                                                                if($resultado==true){
                                                                    $message = $resultado;
                                                                }*/
                                                                    /* Leer y recorrer el fichero */

                                                                    $csv = file($targetPath);


                                                                   foreach ($csv as $columna) {
                                                                        $columna = str_getcsv($columna, ",");
                                                                         if($columna[0]!="" && $columna[1]!="" && $columna[2]!="")
                                                                            {
                                                                                $sql = "INSERT INTO usuarios_colocaboradores_sugerencias (colaborador, numero_nomina, password) VALUES ('$columna[0]','$columna[1]', '$columna[2]')";
                                                                                $query = mysqli_query( $conexion, $sql);
                                                                            }
                                                                    }

                                                                  // sizeof($csv);
                                                                    if($query){
                                                                        $message = $query;
                                                                    }


                                                }else{
                                                    $message = "No se movio el archivo";
                                                }  
                                            }
                                    }
                                  
            }else{ 
                    //$type = "error";
                    $message = "El archivo enviado es invalido. Por favor vuelva a intentarlo";
            }


echo json_encode($message);
?>