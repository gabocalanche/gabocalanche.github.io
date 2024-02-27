<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema de Control</title>

    <!-- Fuentes personalizadas para esta plantilla -->
    
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Estilos personalizados para esta plantilla -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Envoltura de la página -->
    <div id="wrapper">

        <!-- Barra lateral -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Barra Lateral Logo -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php" style="margin-top: -10px;">
    <div class="sidebar-brand-icon rotate-n-15">
    </div>
    <div class="sidebar-brand-text mx-3">
        <img src="img/logo.png" alt="Logo Escuela" style="max-height: 200px; margin-top: 15px;">

            <!-- Separador -->
            <hr class="sidebar-divider my-0">

            <!-- Elemento de navegación - Panel de control -->
            <li class="nav-item active">
                <a class="nav-link" href="sistema_de_control.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Inicio</span></a>
            </li>

            <!-- Separador -->
            <hr class="sidebar-divider">

            <!-- Encabezado -->
            <div class="sidebar-heading">
                Interfaz
            </div>

            <!-- Elemento de navegación - Menú desplegable de Docentes -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Inscripcion</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Usuarios</h6>
                        <a class="collapse-item" href="ins_nuevo_ingreso.php">Nuevo Ingreso</a>
                        <a class="collapse-item" href="ins_regular.php">Regular</a>
                        <a class="collapse-item" href="ins_ver_estudiantes.php">Ver Estudiantes</a>
                    </div>
                </div>
            </li>

        <!-- Elemento de navegación - Menú desplegable de Alumnos -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReports"
                aria-expanded="true" aria-controls="collapseReports">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Reportes</span>
            </a>
            <div id="collapseReports" class="collapse" aria-labelledby="headingReports"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="utilities-color.html">Matricula</a>
                    <a class="collapse-item" href="utilities-color.html">Constancia de Estudio</a>
                    <a class="collapse-item" href="utilities-border.html">Const. de Inscripcion</a>
                    <a class="collapse-item" href="utilities-animation.html">Constancia de Retiro</a>
                </div>
            </div>
        </li>

        <!-- Elemento de navegación - Menú desplegable de Configuración -->
<!--         <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseConfig"
                aria-expanded="true" aria-controls="collapseConfig">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Configuración</span>
            </a>
            <div id="collapseConfig" class="collapse" aria-labelledby="headingConfig"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="utilities-color.html">Periodo Escolar</a>
                    <a class="collapse-item" href="utilities-color.html">Aulas</a>
                    <a class="collapse-item" href="utilities-border.html">Grado</a>
                    <a class="collapse-item" href="utilities-animation.html">Seccion</a>
                </div>
            </div>
        </li> -->

        <!-- Elemento de navegación - Menú desplegable de Usuarios -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
                aria-expanded="true" aria-controls="collapseUsers">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Usuarios</span>
            </a>
            <div id="collapseUsers" class="collapse" aria-labelledby="headingUsers"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="utilities-color.html">Ver Usuarios</a>
<!--                     <a class="collapse-item" href="utilities-border.html">Secretaria</a>
                    <a class="collapse-item" href="utilities-animation.html">Docente</a> -->
                </div>
            </div>
        </li>

            <!-- Separador -->
            <hr class="sidebar-divider">

            <!-- Encabezado -->
            <div class="sidebar-heading">
                Complementos
            </div>

            <!-- Elemento de navegación - Menú desplegable de Páginas -->

            <!-- Elemento de navegación - Gráficos -->
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Configuarion</span></a>

            <!-- Separador -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Botón de alternar barra lateral (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Mensaje Final de la barra lateral -->
            <div class="sidebar-card d-none d-lg-flex">

                <p class="text-center mb-2"><strong></strong></p>
                <a class="" href=""></a>
            </div>

        </ul>
        <!-- Fin de la barra lateral -->

        <!-- Envoltura del contenido -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Contenido principal -->
            <div id="content">

                <!-- Barra superior -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Botón de alternar barra lateral (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Barra de navegación superior -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Elemento de navegación - Menú desplegable de búsqueda (Solo visible en XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Menú desplegable - Búsqueda -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Buscar..." aria-label="Buscar"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Elemento de navegación - Información de usuario -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Administrador</span>
                                <img class="img-profile rounded-circle"
                                    src="img/usuario.png">
                            </a>
                            <!-- Menú desplegable - Información de usuario -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Configuración
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar sesión
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
</html>