<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$id_concentrado=$variables['id_concentrado'];
$folio=$variables['folio'];
$numero_nomina=$variables['numero_nomina'];
$puntos=$variables['puntos'];
$resultado = [];
include "conexionGhoner.php";

        $consulta = "SELECT * FROM no_factible_puntos WHERE folio ='$folio'";
        $query= $conexion->query($consulta);
        $datos = $query->fetch_row();
        if($datos>0){
                $insertando = "UPDATE no_factible_puntos SET puntos = '$puntos' WHERE folio ='$folio'";            
                $resul=$conexion->query($insertando);
                if($resul){
                    $resultado [0]= $resul;
                }else{
                    $resultado [0]= $resul;
                }
        }else{
            $insertar = "INSERT INTO no_factible_puntos(id_concentrado,folio,numero_nomina,puntos) VALUES ('$id_concentrado','$folio','$numero_nomina','$puntos')";
            $resul = $conexion->query($insertar);
            if($resul){
                $resultado [0]= $resul;
            }else{
                $resultado [0]= $resul;
            }
        }

       /* $actualizar= "UPDATE no_factible_puntos SET status = '$var_tipo_de_cierre', causa_no_factibilidad = '$causa_no_factibilidad' WHERE id='$id_concentrado'";
        $query = mysqli_query( $conexion, $actualizar);
        $resultado = $query;
        if($resultado){
            $resultado = "correcto";
        }else{
            $resultado = "mal";
        }*/
echo json_encode($resultado);
?>