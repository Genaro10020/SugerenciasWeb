<?php



$hostname='localhost';

$database='ead';

$username='root';

$password='';



$con=new mysqli($hostname,$username,$password,$database);

if($con->connect_errno){

 echo "lo sentimos ha ocurrido un error de conexion";

}





?>