<?php
include("conexion.php");
include("lib/devuelveJson.php");

$result = $conexion->query("SELECT * FROM calificaciones");

$data = [];

while($row = $result->fetch_assoc()){
    $data[] = $row;
}

devuelveJson($data);
?>