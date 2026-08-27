<?php



$hostname='localhost';

$database='bsoapp';

$username='root';

$password='';



$conexion=new mysqli($hostname,$username,$password,$database);

if($conexion->connect_errno){

 echo "lo sentimos ha ocurrido un error de conexion";

}





?>