<?php
require_once __DIR__ . "/Bd.php";

$bd = Bd::pdo();

$stmt = $bd->prepare(
  "INSERT INTO CALIFICACION (
    CAL_NOMBRE,
    CAL_APELLIDOP,
    CAL_APELLIDOM,
    CAL_MATERIA,
    CAL_CALIFICACION
  ) VALUES (
    'TEST',
    'PRUEBA',
    'UNO',
    'BD',
    10
  )"
);

$stmt->execute();

echo "Insertado correctamente";