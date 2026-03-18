<?php

function recibeTexto($parametro) {

  if (!isset($_POST[$parametro])) {
    http_response_code(400);
    echo "Falta el parámetro $parametro";
    exit;
  }

  $valor = trim($_POST[$parametro]);

  if ($valor === "") {
    http_response_code(400);
    echo "El parámetro $parametro está vacío";
    exit;
  }

  return $valor;
}