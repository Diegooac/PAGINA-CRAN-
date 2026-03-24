<?php
require_once __DIR__ . "/lib/manejaErrores.php";
require_once __DIR__ . "/lib/recibeTextoObligatorio.php";
require_once __DIR__ . "/lib/devuelveCreated.php";
require_once __DIR__ . "/Bd.php";

$nombre = recibeTextoObligatorio("nombre");
$apellidop = recibeTextoObligatorio("apellidop");
$apellidom = recibeTextoObligatorio("apellidom");
$materia = recibeTextoObligatorio("materia");
$calificacion = recibeTextoObligatorio("calificacion");

$bd = Bd::pdo();

$stmt = $bd->prepare(
  "INSERT INTO CALIFICACION (
    CAL_NOMBRE,
    CAL_APELLIDOP,
    CAL_APELLIDOM,
    CAL_MATERIA,
    CAL_CALIFICACION
   ) VALUES (
    :CAL_NOMBRE,
    :CAL_APELLIDOP,
    :CAL_APELLIDOM,
    :CAL_MATERIA,
    :CAL_CALIFICACION
   )"
);

$stmt->execute([
  ":CAL_NOMBRE" => $nombre,
  ":CAL_APELLIDOP" => $apellidop,
  ":CAL_APELLIDOM" => $apellidom,
  ":CAL_MATERIA" => $materia,
  ":CAL_CALIFICACION" => $calificacion
]);

$id = $bd->lastInsertId();
$encodeId = urlencode($id);

devuelveCreated(
  "/php/calificacion-vista-modifica.php?id=$encodeId",
  [
    "id" => ["value" => $id],
    "nombre" => ["value" => $nombre],
    "apellidop" => ["value" => $apellidop],
    "apellidom" => ["value" => $apellidom],
    "materia" => ["value" => $materia],
    "calificacion" => ["value" => $calificacion]
  ]
);