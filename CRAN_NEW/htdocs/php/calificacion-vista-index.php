<?php
require_once __DIR__ . "/lib/manejaErrores.php";
require_once __DIR__ . "/lib/devuelveJson.php";
require_once __DIR__ . "/Bd.php";

$bd = Bd::pdo();

$stmt = $bd->query(
  "SELECT * FROM CALIFICACION
   ORDER BY CAL_NOMBRE, CAL_APELLIDOP, CAL_APELLIDOM"
);

$lista = $stmt->fetchAll(PDO::FETCH_ASSOC);

$render = "";

foreach ($lista as $modelo) {

  $id = htmlentities(urlencode($modelo["CAL_ID"]));
  $nombre = htmlentities($modelo["CAL_NOMBRE"]);
  $apellidop = htmlentities($modelo["CAL_APELLIDOP"]);
  $apellidom = htmlentities($modelo["CAL_APELLIDOM"]);
  $materia = htmlentities($modelo["CAL_MATERIA"]);
  $calificacion = htmlentities((string)$modelo["CAL_CALIFICACION"]);

  $render .=
    "<li>
      <a href='modifica.html?id=$id'>
        $nombre $apellidop $apellidom - $materia: <b>$calificacion</b>
      </a>
    </li>";
}

devuelveJson([
  "lista" => ["innerHTML" => $render]
]);