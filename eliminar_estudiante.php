<?php
// Incluir la conexión a la base de datos y otras configuraciones necesarias
require_once "database/db.php";

// Obtener el ID del estudiante a eliminar desde la URL
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Verificar si se proporciona un ID válido
if ($id !== null) {
    // Preparar la consulta para eliminar el estudiante
    $sqlDelete = "DELETE FROM estudiantes_nuevo_ingreso WHERE id=$id";

    // Ejecutar la consulta de eliminación
    $result = mysqli_query($conexion, $sqlDelete);

    if ($result) {
        // Redirigir a la página de visualización después de eliminar
        header("Location: ins_ver_estudiantes.php");
        exit();
    } else {
        // Manejar errores si la consulta de eliminación falla
        echo "Error al eliminar el estudiante: " . mysqli_error($conexion);
        echo "<br>Consulta: " . $sqlDelete; // Mostrar la consulta para depuración
    }
} else {
    // Manejar el caso en el que 'id' no está presente en la URL
    echo "Error: No se proporcionó un ID válido.";
}
?>