<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
$variables['cumplimiento'];
echo json_encode($variables);
?>