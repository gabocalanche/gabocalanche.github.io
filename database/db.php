<?php
$conexion = mysqli_connect("localhost", "root", "", "rol");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
