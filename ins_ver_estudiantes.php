<?php
require_once "./vistas/parte_superior.php";
include("database/db.php");

$sql = "SELECT * FROM estudiantes_nuevo_ingreso";
$query = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <!-- Inicio de la Tabla -->
    <table class="table">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">Grado</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Nombres</th>
                <th scope="col">Edad</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($query)) : ?>
                <tr>
                    <td><?= $row['grado'] ?></td>
                    <td><?= $row['apellidos'] ?></td>
                    <td><?= $row['nombres'] ?></td>
                    <td><?= $row['edad'] ?></td>
                    <td>
                        <a href="update.php?id=<?= $row['id'] ?>" class='btn btn-small btn-warning'><i class='fas fa-pen'></i></a>
                        <a href="eliminar_estudiante.php?id=<?= $row['id'] ?>" class='btn btn-small btn-danger'><i class='fas fa-trash'></i></a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <!-- Fin de la Tabla -->

    <!-- Fin del Contenido Principal -->

    <?php require_once "./vistas/parte_inferior.php"; ?>

</body>
</html>
