<?php
include("conexion.php");
header('Content-Type: application/json');

try {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellidop = $_POST['apellidop'];
    $apellidom = $_POST['apellidom'];
    $materia = $_POST['materia'];
    $calificacion = $_POST['calificacion'];

    $sql = "UPDATE calificaciones SET 
            nombre=?, apellidop=?, apellidom=?, materia=?, calificacion=? 
            WHERE id=?";

    $stmt = $conexion->prepare($sql);
    // "ssssdi" -> string, string, string, string, double/float, integer (id)
    $stmt->bind_param("ssssdi", $nombre, $apellidop, $apellidom, $materia, $calificacion, $id);
    $stmt->execute();

    echo json_encode(["status" => "ok", "mensaje" => "Datos actualizados para $nombre"]);

} catch (Exception $e) {
    echo json_encode(["status" => "error", "mensaje" => $e->getMessage()]);
}
?>