<?php
include("conexion.php");
$id = $_GET['id'];

$result = $conexion->query("SELECT * FROM calificaciones WHERE id = $id");
$alumno = $result->fetch_assoc();

echo json_encode($alumno);
?>