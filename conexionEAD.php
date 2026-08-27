<?php
$hostname = 'localhost';
$database = 'ead';
$username = 'root';
$password = '';

$conexionEAD = new mysqli($hostname, $username, $password,$database);

if ($conexionEAD->connect_errno) {
    echo "Error al conectarse con la BD";
}

?>