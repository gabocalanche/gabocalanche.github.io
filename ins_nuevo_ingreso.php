<?php
// Incluir archivo de conexión a la base de datos
include("database/db.php");

// Verificar la conexión a la base de datos
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$registro_exitoso = false; // Inicializar la variable antes de usarla
$mensaje = ''; // Inicializar la variable del mensaje

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["registrar"]) && $_POST["registrar"] == 1) {
        // Validar campos
        $campos_validos = true;
        $campos_obligatorios = ["nombres", "apellidos", "lugar_nacimiento", "fecha_nacimiento", "nacionalidad", "edad", "persona_que_suministra", "parentesco", "direccion_calle", "direccion_linea2", "pais", "ciudad", "estado", "codigo_postal"];

        foreach ($campos_obligatorios as $campo) {
            if (empty($_POST[$campo])) {
                $mensaje = 'Uno de los campos se encuentra vacío';
                $campos_validos = false;
                break;
            }
        }

        if ($campos_validos) {
            // Datos del estudiante
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
            $grados = $_POST["grado"];
            $periodos = $_POST["periodo"];
            $fechas = $_POST["fecha"];
            $tallas_camisas = $_POST["talla_camisa"];
            $tallas_pantalones = $_POST["talla_pantalon"];
            $tallas_zapatos = $_POST["talla_zapato"];
            $pesos = $_POST["peso"];
            $estaturas = $_POST["estatura"];

            // Preparar la consulta
            $stmt = $conexion->prepare("INSERT INTO estudiantes_nuevo_ingreso (nombres, apellidos, lugar_nacimiento, fecha_nacimiento, nacionalidad, edad, persona_que_suministra, parentesco, direccion_calle, direccion_linea2, pais, ciudad, estado, codigo_postal, grado, periodo, fecha, talla_camisa, talla_pantalon, talla_zapato, peso, estatura) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            // Vincular parámetros
            $stmt->bind_param("ssssssssssssssssssssss", $nombres, $apellidos, $lugar_nacimiento, $fecha_nacimiento, $nacionalidad, $edad, $persona_que_suministra, $parentesco, $direccion_calle, $direccion_linea2, $pais, $ciudad, $estado, $codigo_postal, $grado, $periodo, $fecha, $talla_camisa, $talla_pantalon, $talla_zapato, $peso, $estatura);

            // Iterar sobre los arrays y ejecutar la consulta para cada elemento
            $registro_exitoso = true; // Variable para verificar si al menos un registro fue exitoso

            for ($i = 0; $i < count($grados); $i++) {
                $grado = $grados[$i];
                $periodo = $periodos[$i];
                $fecha = $fechas[$i];
                $talla_camisa = $tallas_camisas[$i];
                $talla_pantalon = $tallas_pantalones[$i];
                $talla_zapato = $tallas_zapatos[$i];
                $peso = $pesos[$i];
                $estatura = $estaturas[$i];

                // Ejecutar la consulta
                if ($stmt->execute()) {
                    $registro_exitoso = true;
                } else {
                    $registro_exitoso = false;
                    break; // Si hay un error, salir del bucle
                }
            }

            // Verificar si al menos un registro fue exitoso
            if ($registro_exitoso) {
                $mensaje = 'Estudiante registrado correctamente';
            } else {
                $mensaje = 'Error al registrar estudiante(s)';
            }
            
            // Redirigir a la página actual con el mensaje como parámetro
            header("Location: {$_SERVER['PHP_SELF']}?mensaje=" . urlencode($mensaje));
            exit();
        }
    }
}
?>

<?php include_once("./vistas/parte_superior.php"); ?>

<style>

    .input-box input,
    .formulario__input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px; /* Ajusta aquí para bordes redondos */
        box-sizing: border-box;
    }

    .formulario__grupo-input {
        border-radius: 5px; /* Ajusta aquí para bordes redondos */
        position: relative;
    }
    .registro-container {
        max-width: 900px;
        margin: 20px auto;
        padding: 20px;
        background-color: #f4f4f4;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .registro-container h2 {
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }

    .registro-form {
        padding: 15px;
        border: 0px solid #ccc;
        border-radius: 5px;
        margin-top: 20px;
    }

    .datos-estudiante h4 {
        color: #535353;
        margin-bottom: 25px;
    }

    .input-box {
        margin-bottom: 20px;
    }

    .input-box label {
        display: block;
        margin-bottom: 5px;
    }

    .input-box input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    .input-box.address {
    margin-bottom: 20px;
    }

    .input-box.address input {
        margin-bottom: 15px;
    }

    .select-box label {
        display: block;
        margin-bottom: 5px;
    }

    .select-box select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    .registro-button {
        background-color: #4caf50;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    /* Estilos para la tabla de Datos Adicionales */
    .datos-registro-adicional {
        margin-top: 20px;
        overflow-x: auto; /* Agregar scroll horizontal si el contenido es demasiado ancho */
    }

    .table-registro {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
        border-radius: 8px;  /* Borde redondo */
        overflow: hidden;   /* Evitar que los bordes redondeados afecten las celdas internas */
    }

    .table-registro th, .table-registro td {
        border: 1px solid #ccc;
        padding: 10px;  /* Ajusta según tus preferencias */
        text-align: center;
    }

    .table-registro th {
        background-color: #f4f4f4;  /* Ajusta según tus preferencias */
    }

    .table-registro input {
        width: 100%;
        padding: 8px;
        margin: 0;  /* Eliminar el margen predeterminado de los input */
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        display: block; /* Hacer que los inputs ocupen el 100% del ancho del contenedor */
    }

    @media (max-width: 768px) {
        .table-registro th, .table-registro td {
            display: block; /* Mostrar las celdas en bloques para que ocupen el ancho completo */
            width: 100%;
            box-sizing: border-box;
        }
    }

/* Estilos para campos correctos */
.formulario_grupo-correcto .formulario__input {
    border: 3px solid #75E06C; /* Bordes verdes para indicar correcto */
}

.formulario_grupo-correcto .formulario__validacion-estado {
    color: #7DD176; /* Color verde para el icono de validación */
}

/* Estilos para campos incorrectos (ya proporcionados en tu CSS) */

.formulario__input-error {
    font-size: 12px; /* Tamaño de fuente más pequeño */
    opacity: 0.7; /* Transparencia */
    margin-top: 5px; /* Espaciado superior para separar del campo de entrada */
    color: #DAADAD; /* Color del texto de error */
}
.formulario_grupo-incorrecto .formulario__input {
    border: 3px solid #FE6F6F;
}

.formulario_grupo-incorrecto .formulario__validacion-estado {
    color: #FE6F6F;
}
</style>



<!-- Inicio del Contenido Principal (formulario) -->


<div class="registro-container">
    <h2>Inscripción Nuevo Ingreso</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="registro-form" id="formulario">

        <?php
        if (isset($_GET['mensaje'])) {
            $mensaje = urldecode($_GET['mensaje']);
            echo '<div style="background-color: #d4edda; border-color: #c3e6cb; color: #155724; padding: 0.75rem 1.25rem; margin-bottom: 1rem; border: 1px solid transparent; border-radius: 0.25rem;">' . $mensaje . '</div>';
        }
        ?>

        <div class="datos-estudiante">
            <h4>Datos del Estudiante:</h4>
            <div class="row">
                <div class="col-md-4">
                    <div class="formulario__grupo" id="grupo_nombres">
                        <label class="formulario__label">Nombres:</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="nombres" id="nombres" placeholder="Ingresar Nombres" required oninput="validarFormulario(event)">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">El nombre debe contener solo letras y espacios, máximo 20 caracteres.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="formulario__grupo" id="grupo_apellidos">
                        <label class="formulario__label">Apellidos:</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="apellidos" id="apellidos" placeholder="Ingresar Apellidos" required oninput="validarFormulario(event)">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">El apellido debe contener solo letras y espacios, máximo 20 caracteres.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="formulario__grupo" id="grupo_lugar_nacimiento">
                        <label class="formulario__label">Lugar de Nacimiento:</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="lugar_nacimiento" id="lugar_nacimiento" placeholder="Ingresar Lugar de Nacimiento" required oninput="validarFormulario(event)">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">Letras, números, guion y guion bajo, longitud entre 5 y 45 caracteres.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="formulario__grupo" id="grupo_fecha_nacimiento">
                        <label class="formulario__label">Fecha de Nacimiento:</label>
                        <div class="formulario__grupo-input">
                            <input type="date" class="formulario__input" name="fecha_nacimiento" id="fecha_nacimiento" required oninput="validarFormulario(event)">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">Ingrese Fecha Valida.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="formulario__grupo" id="grupo_nacionalidad">
                        <label class="formulario__label">Nacionalidad:</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="nacionalidad" id="nacionalidad" placeholder="Nacionalidad" required oninput="validarFormulario(event)">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">Solo letras y espacios, pueden llevar acentos.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="formulario__grupo" id="grupo_edad">
                        <label class="formulario__label">Edad:</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="edad" id="edad" placeholder="Ingresar Edad del Estudiante" required oninput="validarFormulario(event)">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">Debe contener solo números.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="formulario__grupo" id="grupo_persona_que_suministra">
                        <label class="formulario__label">Quien Suministra los Datos:</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="persona_que_suministra" id="persona_que_suministra" placeholder="Nombre de Persona que Suministra los datos" required oninput="validarFormulario(event)">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">Letras y espacios, máximo 40 caracteres.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="formulario__grupo" id="grupo_parentesco">
                        <label class="formulario__label">Parentesco:</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="parentesco" id="parentesco" placeholder="Parentesco" required oninput="validarFormulario(event)">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">Letras y espacios, máximo 40 caracteres.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="formulario__grupo" id="grupo_direccion_calle">
                        <label class="formulario__label">Dirección</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="direccion_calle" id="direccion_calle" placeholder="urb los molinos 1 y 2" required oninput="validarFormulario(event)">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">Letras, números, espacios, guiones y almohadillas.</p>
                    </div>
                    <div class="formulario__grupo" id="grupo_direccion_linea2">
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="direccion_linea2" id="direccion_linea2" placeholder="calle 9, casa nro 123" required oninput="validarFormulario(event)">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">Letras, números, espacios, guiones y almohadillas.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="formulario__grupo" id="grupo_pais">
                        <label class="formulario__label">País</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="pais" id="pais" placeholder="Pais" required oninput="validarFormulario(event)">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">Letras y espacios, máximo 40 caracteres.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="formulario__grupo" id="grupo_ciudad">
                        <label class="formulario__label">Ciudad</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="ciudad" id="ciudad" placeholder="Ciudad de Residencia" required oninput="validarFormulario(event)">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">Letras y espacios, máximo 40 caracteres.</p>
                    </div>
                    <div class="formulario__grupo" id="grupo_estado">
                        <label class="formulario__label">Estado</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="estado" id="estado" placeholder="Estado de Residencia" required oninput="validarFormulario(event)">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">Letras y espacios, máximo 40 caracteres.</p>
                    </div>
                    <div class="formulario__grupo" id="grupo_codigo_postal">
                        <label class="formulario__label">Código Postal</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="codigo_postal" id="codigo_postal" placeholder="Código Postal" required oninput="validarFormulario(event)">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">Código Postal válido de 5 dígitos.</p>
                    </div>
                </div>
            </div>
            <div class="datos-registro-adicional">
                <h4>Datos de Registro Adicional:</h4>
                <table class="table-registro">
                    <thead>
                        <tr>
                            <th>Grado</th>
                            <th>Periodo</th>
                            <th>Fecha</th>
                            <th>Talla (Camisa)</th>
                            <th>Talla (Pantalón)</th>
                            <th>Talla (Zapato)</th>
                            <th>Peso</th>
                            <th>Estatura</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $numero_de_filas = 1;

                        for ($i = 0; $i < $numero_de_filas; $i++) {
                            echo '<tr>';
                            echo '<td><div class="formulario__grupo" id="grupo_grado[]"><input type="text" name="grado[]" class="formulario__input" placeholder="Grado" required oninput="validarFormulario(event)"><i class="formulario__validacion-estado fas fa-times-circle"></i></div></td>';
                            echo '<td><div class="formulario__grupo" id="grupo_periodo[]"><input type="text" name="periodo[]" class="formulario__input" placeholder="Periodo" required oninput="validarFormulario(event)"><i class="formulario__validacion-estado fas fa-times-circle"></i></div></td>';
                            echo '<td><div class="formulario__grupo" id="grupo_fecha[]"><input type="date" name="fecha[]" class="formulario__input" placeholder="Fecha" required oninput="validarFormulario(event)"><i class="formulario__validacion-estado fas fa-times-circle"></i></div></td>';
                            echo '<td><div class="formulario__grupo" id="grupo_talla_camisa[]"><input type="text" name="talla_camisa[]" class="formulario__input" placeholder="Talla (Camisa)" required oninput="validarFormulario(event)"><i class="formulario__validacion-estado fas fa-times-circle"></i></div></td>';
                            echo '<td><div class="formulario__grupo" id="grupo_talla_pantalon[]"><input type="text" name="talla_pantalon[]" class="formulario__input" placeholder="Talla (Pantalón)" required oninput="validarFormulario(event)"><i class="formulario__validacion-estado fas fa-times-circle"></i></div></td>';
                            echo '<td><div class="formulario__grupo" id="grupo_talla_zapato[]"><input type="text" name="talla_zapato[]" class="formulario__input" placeholder="Talla (Zapato)" required oninput="validarFormulario(event)"><i class="formulario__validacion-estado fas fa-times-circle"></i></div></td>';
                            echo '<td><div class="formulario__grupo" id="grupo_peso[]"><input type="text" name="peso[]" class="formulario__input" placeholder="00.0kl" required oninput="validarFormulario(event)"><i class="formulario__validacion-estado fas fa-times-circle"></i></div></td>';
                            echo '<td><div class="formulario__grupo" id="grupo_estatura[]"><input type="text" name="estatura[]" class="formulario__input" placeholder="0.00" required oninput="validarFormulario(event)"><i class="formulario__validacion-estado fas fa-times-circle"></i></div></td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <br>
            <button type="submit" class="registro-button" name="registrar" value="1">Enviar</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="./js/formulario.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<?php require_once "./vistas/parte_inferior.php"?>
<!-- Fin del Contenido Principal -->

<?php require_once "./vistas/parte_inferior.php"?>
