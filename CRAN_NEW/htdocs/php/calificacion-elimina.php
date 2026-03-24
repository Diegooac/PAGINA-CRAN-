<?php
require_once __DIR__ . "/lib/manejaErrores.php";
require_once __DIR__ . "/lib/recibeEnteroObligatorio.php";
require_once __DIR__ . "/lib/devuelveNoContent.php";
require_once __DIR__ . "/Bd.php";

$id = recibeEnteroObligatorio("id");

$bd = Bd::pdo();

$stmt = $bd->prepare("DELETE FROM CALIFICACION WHERE CAL_ID = :CAL_ID");
$stmt->execute([
  ":CAL_ID" => $id
]);

devuelveNoContent();