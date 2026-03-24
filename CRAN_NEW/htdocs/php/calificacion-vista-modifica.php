<?php
require_once __DIR__ . "/lib/manejaErrores.php";
require_once __DIR__ . "/lib/recibeEnteroObligatorio.php";
require_once __DIR__ . "/lib/validaEntidadObligatoria.php";
require_once __DIR__ . "/lib/devuelveJson.php";
require_once __DIR__ . "/Bd.php";

$id = recibeEnteroObligatorio("id");

$bd = Bd::pdo();

$stmt = $bd->prepare("SELECT * FROM CALIFICACION WHERE CAL_ID = :CAL_ID");
$stmt->execute([
  ":CAL_ID" => $id
]);

$modelo = $stmt->fetch(PDO::FETCH_ASSOC);
$modelo = validaEntidadObligatoria("Calificación", $modelo);

devuelveJson([
  "id" => ["value" => $id],
  "nombre" => ["value" => $modelo["CAL_NOMBRE"]],
  "apellidop" => ["value" => $modelo["CAL_APELLIDOP"]],
  "apellidom" => ["value" => $modelo["CAL_APELLIDOM"]],
  "materia" => ["value" => $modelo["CAL_MATERIA"]],
  "calificacion" => ["value" => $modelo["CAL_CALIFICACION"]]
]);