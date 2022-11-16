<?php

include('conexionGhoner.php');
require_once('vendor/php-excel-reader/excel_reader2.php');
require_once('vendor/SpreadsheetReader.php');


$files_arr = array();
            $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
$message="";
            if($_FILES["files"]["name"]){
                                            // Ciclo todos los archivos
                                            $countfiles=1;
                                for($index = 0;$index < $countfiles;$index++)
                                        {
                                            if(isset($_FILES['files']['name'][$index]) && $_FILES['files']['name'][$index] != '')
                                                {

                                                    $targetPath = "subidas/".$_FILES["files"]["name"][$index];
                                                    if(move_uploaded_file($_FILES['files']['tmp_name'][$index], $targetPath)){
                                                  
                                                    
                                                    $Reader = new SpreadsheetReader($targetPath);
                                                    
                                                    $sheetCount = count($Reader->sheets());
                                                    for($i=0;$i<$sheetCount;$i++)
                                                    {
                                                        
                                                        $Reader->ChangeSheet($i);
                                                        
                                                        foreach ($Reader as $Row)
                                                        {
                                                    
                                                            $colaborador = "";
                                                            if(isset($Row[0])) {
                                                                $colaborador = mysqli_real_escape_string($conexion,$Row[0]);
                                                            }
                                                            
                                                            $numero_nomina = "";
                                                            if(isset($Row[1])) {
                                                                $numero_nomina = mysqli_real_escape_string($conexion,$Row[1]);
                                                            }
                                                            
                                                            $password = "";
                                                            if(isset($Row[2])) {
                                                                $password = mysqli_real_escape_string($conexion,$Row[2]);
                                                            }
                                                            
                                                            if (!empty($nombres) || !empty($cargo) || !empty($celular) || !empty($descripcion)) {
                                                                $query = "INSERT INTO usuarios_colocaboradores_sugerencias(colaborador,numero_nomina, password) VALUES('".$colaborador."','".$numero_nomina."','".$password."')";
                                                                $resultados = mysqli_query($conexion, $query);
                                                            
                                                                if (! empty($resultados)) {
                                                                    //$type = "success";
                                                                    $message = "Excel importado correctamente";
                                                                } else {
                                                                    //$type = "error";
                                                                    $message = "Hubo un problema al importar registros";
                                                                }
                                                            }
                                                        }
                                                    
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