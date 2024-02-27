<?php
session_start();

$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];

include("db.php");

$consulta = "SELECT * FROM usuarios WHERE usuario = ? AND contraseña = ?";
$statement = mysqli_prepare($conexion, $consulta);

if (!$statement) {
    die("Error en la preparación de la consulta: " . mysqli_error($conexion));
}

mysqli_stmt_bind_param($statement, "ss", $usuario, $contraseña);
mysqli_stmt_execute($statement);

$resultado = mysqli_stmt_get_result($statement);

if (!$resultado) {
    die("Error al obtener el resultado de la consulta: " . mysqli_error($conexion));
}

$filas = mysqli_fetch_array($resultado);

if ($filas['id_cargo'] == 1) { // administrador
    header("location: ../sistema_de_control.php");
} else if ($filas['id_cargo'] == 2) { // secretaria
    header("location: ../sistema_de_control.php");
} else if ($filas['id_cargo'] == 3) { // docente
    header("location: ../sistema_de_control.php");
} else {
    // En caso de error en la autenticación
    include("login.php");
    echo "<h1 class='bad'>ERROR EN LA AUTENTIFICACION</h1>";
}

mysqli_stmt_close($statement);
mysqli_close($conexion);
?>