<?php
require_once __DIR__ . "/lib/manejaErrores.php";
require_once __DIR__ . "/lib/recibeEnteroObligatorio.php";
require_once __DIR__ . "/lib/recibeTextoObligatorio.php";
require_once __DIR__ . "/lib/devuelveJson.php";
require_once __DIR__ . "/Bd.php";

$id = recibeEnteroObligatorio("id");

$nombre = recibeTextoObligatorio("nombre");
$apellidop = recibeTextoObligatorio("apellidop");
$apellidom = recibeTextoObligatorio("apellidom");
$materia = recibeTextoObligatorio("materia");
$calificacion = recibeTextoObligatorio("calificacion");

$bd = Bd::pdo();

$stmt = $bd->prepare(
  "UPDATE CALIFICACION
   SET
    CAL_NOMBRE = :CAL_NOMBRE,
    CAL_APELLIDOP = :CAL_APELLIDOP,
    CAL_APELLIDOM = :CAL_APELLIDOM,
    CAL_MATERIA = :CAL_MATERIA,
    CAL_CALIFICACION = :CAL_CALIFICACION
   WHERE
    CAL_ID = :CAL_ID"
);

$stmt->execute([
  ":CAL_NOMBRE" => $nombre,
  ":CAL_APELLIDOP" => $apellidop,
  ":CAL_APELLIDOM" => $apellidom,
  ":CAL_MATERIA" => $materia,
  ":CAL_CALIFICACION" => $calificacion,
  ":CAL_ID" => $id
]);

devuelveJson([
  "id" => ["value" => $id],
  "nombre" => ["value" => $nombre],
  "apellidop" => ["value" => $apellidop],
  "apellidom" => ["value" => $apellidom],
  "materia" => ["value" => $materia],
  "calificacion" => ["value" => $calificacion]
]);