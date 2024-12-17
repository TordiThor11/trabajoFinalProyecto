<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impulsa</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <!-- Header/Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>">Inicio</a>
                    </li>
                    <?php if (session()->get('isLoggedIn')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url("misProyectos") ?>">Mis Proyectos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url("misPatrocinios") ?>">Mis Patrocinios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url("crear_proyecto") ?>">Crear Proyecto</a>
                        </li>
                    <?php endif; ?>
                </ul>
                <div class="d-flex align-items-center">
                    <?php if (session()->get('isLoggedIn')): ?>

                        <!-- Sección de Notificaciones -->
                        <div class="nav-item dropdown me-3">
                            <a class="nav-link dropdown-toggle text-light position-relative" href="#"
                                id="notificacionesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <!-- Ícono de campana para las notificaciones -->
                                <i class="bi bi-bell fs-4"></i>

                                <!-- Contador de notificaciones no leídas, se saco esa funcion -->
                                <?php /*if (count($notificaciones_no_leidas) > 0): ?>
                                    <!-- Badge para el contador de notificaciones no leídas -->
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        <?= count($notificaciones_no_leidas) ?>
                                    </span>
                                <?php endif; */ ?>
                                <!-- FIN Contador-->

                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificacionesDropdown">
                                <?php if (empty($notificaciones)): ?>
                                    <!-- Mensaje cuando no hay notificaciones -->
                                    <li class="dropdown-item text-muted">No tienes notificaciones</li>
                                    <li><a class="dropdown-item text-center" href="<?= base_url('/notificaciones') ?>">Ver todas las notificaciones</a></li>
                                <?php else: ?>
                                    <!-- Mostrar lista de notificaciones -->
                                    <?php foreach ($notificaciones as $notificacion): ?>
                                        <li>
                                            <a class="dropdown-item <?= $notificacion->leida ? '' : 'fw-bold' ?>"
                                                href="<?= base_url('/detalleProyecto/' . $notificacion->id_proyecto) ?>">
                                                <?= htmlspecialchars($notificacion->mensaje) ?>
                                                <small class="text-muted d-block"><?= date('d M Y H:i', strtotime($notificacion->fecha_creacion)) ?></small>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                    <!-- Divider y botón para ver todas las notificaciones -->
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-center" href="<?= base_url('/notificaciones') ?>">Ver todas las notificaciones</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <!-- Fin de la sección de Notificaciones -->

                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center text-light nav-hover-effect" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle me-2 text-light fs-4"></i>
                                <span class="text-light fw-bold"><?= session()->get('mail'); ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item text-dark" href="<?= base_url('configuracion_perfil') ?>">
                                        <i class="bi bi-gear me-2"></i>
                                        Configurar Perfil
                                    </a></li>
                                <li><a class="dropdown-item text-dark" href="<?= base_url('logout') ?>">
                                        <i class="bi bi-box-arrow-right me-2"></i>
                                        Cerrar sesión
                                    </a></li>
                            </ul>
                        </div>
                    <?php else: ?>
                        <a class="btn btn-outline-light" href="<?= base_url('login') ?>">
                            <i class="bi bi-person-circle me-2"></i>
                            Iniciar sesión
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>