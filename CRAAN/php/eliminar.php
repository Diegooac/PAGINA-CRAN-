<?php
include("conexion.php");
header('Content-Type: application/json');

$id = $_GET['id'] ?? null;

if (!$id) {
    echo json_encode(["status" => "error", "mensaje" => "ID no proporcionado"]);
    exit;
}

try {
    $stmt = $conexion->prepare("DELETE FROM calificaciones WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    echo json_encode(["status" => "ok", "mensaje" => "Alumno eliminado correctamente"]);
} catch (Exception $e) {
    echo json_encode(["status" => "error", "mensaje" => "Error al eliminar: " . $e->getMessage()]);
}
?>