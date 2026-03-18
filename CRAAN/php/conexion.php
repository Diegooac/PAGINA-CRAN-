<?php
$conexion = new mysqli("localhost", "root", "Jodoncio#05", "escuela");

if ($conexion->connect_error) {
    die("Error de conexión");
}
?>