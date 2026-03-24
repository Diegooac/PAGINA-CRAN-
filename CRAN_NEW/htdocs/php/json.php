<?php

header("Content-Type: application/json; charset=utf-8");

$texto = file_get_contents("php://input");
$json = json_decode($texto);

$saludo = $json->saludo ?? "Hola";
$nombre = $json->nombre ?? "Usuario";

$resultado = "{$saludo} {$nombre}.";

echo json_encode($resultado);