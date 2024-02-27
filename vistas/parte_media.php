<?php
include("database/db.php");

// Realizar consulta para obtener el número de estudiantes
$consulta_estudiantes = $conexion->query("SELECT COUNT(*) as total_estudiantes FROM estudiantes_nuevo_ingreso");

// Verificar si la consulta fue exitosa
if (!$consulta_estudiantes) {
    // Si hay un error en la consulta, muestra un mensaje de error
    die("Error en la consulta: " . $conexion->error);
}

// Obtener el resultado de la consulta
$fila = $consulta_estudiantes->fetch_assoc();
$total_estudiantes = $fila['total_estudiantes'];
?> 

<!-- Contenido de la página -->

<style>
    /* Estilos para los botones */
    .custom-btn {
        cursor: pointer;
        transition: transform 0.3s ease-in-out;
        text-decoration: none !important;
        color: inherit;
    }

    /* Estilos adicionales al pasar el cursor sobre los botones */
    .custom-btn:hover {
        transform: scale(1.05);
    }

    .custom-link {
        text-decoration: none !important;
        color: inherit;
    }

    .custom-link:hover {
        text-decoration: none !important;
        color: inherit;
    }
</style>

<div class="container-fluid">

    <!-- Encabezado de la página -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Bienvenido al Sistema de Control Escolar</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generar Informe</a>
    </div>

    <!-- Fila de contenido -->
    <div class="row">

        <!-- Recuadro de Grados -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2 custom-btn custom-link">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 custom-link">
                                Asignaturas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">8</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recuadro de Estudiantes -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="ins_ver_estudiantes.php" class="card border-left-info shadow h-100 py-2 custom-btn custom-link">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1 custom-link">Estudiantes</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800 custom-link">
                                        <?php echo $total_estudiantes; ?>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300 btn-icon"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Recuadro de Profesores -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2 custom-btn custom-link">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1 custom-link">
                                Profesores</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">12</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recuadro de Usuarios -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2 custom-btn custom-link">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1 custom-link">
                                Usuarios</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">6</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Supongamos que $total_estudiantes contiene el número total de estudiantes
    // Puedes ajustar esto según cómo obtienes la cantidad de estudiantes en tu PHP

    // Mapea el rango del número de estudiantes al rango de la barra de progreso
    function map(value, inMin, inMax, outMin, outMax) {
        return (value - inMin) * (outMax - outMin) / (inMax - inMin) + outMin;
    }

    // Obtén el elemento de la barra de progreso
    var progressBar = document.querySelector('.progress-bar');

    // Ajusta el valor del ancho de la barra de progreso según el número de estudiantes
    function updateProgressBar(totalEstudiantes) {
        var minValue = 0;  // Mínimo número de estudiantes
        var maxValue = 50;  // Máximo número de estudiantes (ajústalo según tus necesidades)

        // Calcula el porcentaje de estudiantes en relación con el rango de la barra de progreso
        var percentage = map(totalEstudiantes, minValue, maxValue, 0, 100);

        // Establece el ancho de la barra de progreso
        progressBar.style.width = percentage + '%';
    }

    // Llama a la función con el valor actual de estudiantes (puedes ajustar este valor)
    updateProgressBar(<?php echo $total_estudiantes; ?>);
</script>
