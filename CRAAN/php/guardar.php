<?php
header('Content-Type: application/json');

// ACTIVAR ERRORES (clave para debug)
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {

    $conexion = new mysqli("localhost", "root", "Jodoncio#05", "escuela");

    $nombre = $_POST["nombre"] ?? "";
    $apellidop = $_POST["apellidop"] ?? "";
    $apellidom = $_POST["apellidom"] ?? "";
    $materia = $_POST["materia"] ?? "";
    $calificacion = $_POST["calificacion"] ?? "";

    if(!$nombre || !$apellidop || !$materia || !$calificacion){
        echo json_encode(["mensaje" => "Faltan datos"]);
        exit;
    }

    $sql = "INSERT INTO calificaciones 
    (nombre, apellidop, apellidom, materia, calificacion)
    VALUES (?, ?, ?, ?, ?)";

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssss", $nombre, $apellidop, $apellidom, $materia, $calificacion);
    $stmt->execute();

    echo json_encode([
    "status"=> "ok",
    "mensaje" => "Guardado correctamente",
    "nombre" => $nombre,
    "apellidop" => $apellidop,]);

} catch (Exception $e) {
    echo json_encode([
        "mensaje" => "Error en servidor",
        "error" => $e->getMessage()
    ]);
}
?>