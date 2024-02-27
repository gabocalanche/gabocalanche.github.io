<?php require_once "./vistas/parte_superior.php";
ob_start();
include("database/db.php");

// Obtener id de la URL
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["registrar"])) {
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $lugar_nacimiento = $_POST["lugar_nacimiento"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $nacionalidad = $_POST["nacionalidad"];
    $edad = $_POST["edad"];
    $persona_que_suministra = $_POST["persona_que_suministra"];
    $parentesco = $_POST["parentesco"];
    $direccion_calle = $_POST["direccion_calle"];
    $direccion_linea2 = $_POST["direccion_linea2"];
    $pais = $_POST["pais"];
    $ciudad = $_POST["ciudad"];
    $estado = $_POST["estado"];
    $codigo_postal = $_POST["codigo_postal"];

    // Datos adicionales
    $grado = $_POST["grado"][0];
    $periodo = $_POST["periodo"][0];
    $fecha = $_POST["fecha"][0];
    $talla_camisa = $_POST["talla_camisa"][0];
    $talla_pantalon = $_POST["talla_pantalon"][0];
    $talla_zapato = $_POST["talla_zapato"][0];
    $peso = $_POST["peso"][0];
    $estatura = $_POST["estatura"][0];

// Preparar la consulta
    $sqlUpdate = "UPDATE estudiantes_nuevo_ingreso SET 
    nombres='$nombres', apellidos='$apellidos', 
    lugar_nacimiento='$lugar_nacimiento', fecha_nacimiento='$fecha_nacimiento', 
    nacionalidad='$nacionalidad', edad=$edad, 
    persona_que_suministra='$persona_que_suministra', parentesco='$parentesco', 
    direccion_calle='$direccion_calle', direccion_linea2='$direccion_linea2', 
    pais='$pais', ciudad='$ciudad', estado='$estado', codigo_postal='$codigo_postal', 
    grado='$grado', periodo='$periodo', fecha='$fecha', 
    talla_camisa='$talla_camisa', talla_pantalon='$talla_pantalon', 
    talla_zapato='$talla_zapato', peso='$peso', estatura='$estatura' 
    WHERE id=$id";

// Ejecutar la consulta de actualización
    $result = mysqli_query($conexion, $sqlUpdate);

    if ($result) {
        // Redirigir usando JavaScript después de la actualización
        echo '<script>window.location.href = "ins_ver_estudiantes.php";</script>';
        exit();
    } else {
        // Manejar errores si la consulta de actualización falla
        echo "Error al actualizar los datos: " . mysqli_error($conexion);
        echo "<br>Consulta: " . $sqlUpdate; // Mostrar la consulta para depuración
        print_r($_POST); // Mostrar datos del formulario para depuración
    }
    }

    if ($id !== null) {
    $sql = "SELECT * FROM estudiantes_nuevo_ingreso WHERE id='$id'";
    $query = mysqli_query($conexion, $sql);
    $row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>

<div class="registro-container">
    <h2>Editar Datos del Estudiante</h2>
    <form action="<?php echo $_SERVER['PHP_SELF'] . "?id=" . $id; ?>" method="post" class="registro-form" id="formulario">
        <!-- Datos del Estudiante -->
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="text" name="nombres" placeholder="Ingresar Nombres" value="<?= $row['nombres'] ?>">
        <input type="text" name="apellidos" placeholder="Ingresar Apellidos" value="<?= $row['apellidos'] ?>">
        <input type="text" name="lugar_nacimiento" placeholder="Ingresar Lugar de Nacimiento" value="<?= $row['lugar_nacimiento'] ?>">
        <input type="date" name="fecha_nacimiento" value="<?= $row['fecha_nacimiento'] ?>">
        <input type="text" name="nacionalidad" placeholder="Nacionalidad" value="<?= $row['nacionalidad'] ?>">
        <input type="text" name="edad" placeholder="Ingresar Edad del Estudiante" value="<?= $row['edad'] ?>">
        <input type="text" name="persona_que_suministra" placeholder="Nombre de Persona que Suministra los datos" value="<?= $row['persona_que_suministra'] ?>">
        <input type="text" name="parentesco" placeholder="Parentesco" value="<?= $row['parentesco'] ?>">
        <input type="text" name="direccion_calle" placeholder="urb los molinos 1 y 2" value="<?= $row['direccion_calle'] ?>">
        <input type="text" name="direccion_linea2" placeholder="calle 9, casa nro 123" value="<?= $row['direccion_linea2'] ?>">
        <input type="text" name="pais" placeholder="Pais" value="<?= $row['pais'] ?>">
        <input type="text" name="ciudad" placeholder="Ciudad de Residencia" value="<?= $row['ciudad'] ?>">
        <input type="text" name="estado" placeholder="Estado de Residencia" value="<?= $row['estado'] ?>">
        <input type="text" name="codigo_postal" placeholder="Código Postal" value="<?= $row['codigo_postal'] ?>">

        <!-- Datos de Registro Adicional -->
        <input type="text" name="grado[]" placeholder="Grado" value="<?= $row['grado'] ?>">
        <input type="text" name="periodo[]" placeholder="Periodo" value="<?= $row['periodo'] ?>">
        <input type="date" name="fecha[]" placeholder="Fecha" value="<?= $row['fecha'] ?>">
        <input type="text" name="talla_camisa[]" placeholder="Talla (Camisa)" value="<?= $row['talla_camisa'] ?>">
        <input type="text" name="talla_pantalon[]" placeholder="Talla (Pantalón)" value="<?= $row['talla_pantalon'] ?>">
        <input type="text" name="talla_zapato[]" placeholder="Talla (Zapato)" value="<?= $row['talla_zapato'] ?>">
        <input type="text" name="peso[]" placeholder="00.0kl" value="<?= $row['peso'] ?>">
        <input type="text" name="estatura[]" placeholder="0.00" value="<?= $row['estatura'] ?>">

        <button type="submit" class="registro-button" name="registrar" value="Actualizar Informacion">Actualizar Datos</button>
        </form>
    </div>

    </body>
    </html>

    <?php
} else {
    // Manejar el caso en el que 'id' no está presente en la URL
    echo "Error: No se proporcionó un ID válido. URL: " . $_SERVER['REQUEST_URI'];
}
ob_end_flush();
?>