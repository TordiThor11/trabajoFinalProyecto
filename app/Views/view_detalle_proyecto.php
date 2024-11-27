<!-- Contenido Principal del Proyecto -->
<div class="main-content bg-light py-4">
    <div class="container">
        <!-- Navegación de Ruta (Breadcrumb) -->
        <div class="mb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('') ?>" class="text-decoration-none">Proyectos</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $proyecto->nombre ?></li>
                </ol>
            </nav>
            <h1 class="display-5 fw-bold mb-0"><?= $proyecto->nombre ?></h1>
        </div>

        <!-- Contenido Principal - División en Columnas -->
        <div class="row g-4">
            <!-- Columna Principal - Información Detallada -->
            <div class="col-lg-8">
                <!-- Imagen Principal del Proyecto -->
                <img src="<?= base_url('uploads/proyectos/' . $proyecto->imagen_principal) ?>" 
                     class="d-block w-100 img-fluid" 
                     alt="Imagen del Proyecto" 
                     style="object-fit: cover; height: 800px;">

                <!-- Sección de Pestañas de Información -->
                <div class="card border-0 shadow-sm">
                    <!-- Encabezado de Pestañas -->
                    <div class="card-header bg-white">
                        <ul class="nav nav-tabs card-header-tabs" role="tablist">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#detalle">Detalle</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#recompensas">Recompensas</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#objetivo">Objetivo</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#impacto">Impacto</button>
                            </li>
                        </ul>
                    </div>

                    <!-- Contenido de las Pestañas -->
                    <div class="card-body">
                        <div class="tab-content">
                            <!-- Pestaña de Detalle -->
                            <div class="tab-pane fade show active" id="detalle">
                                <h4 class="fw-bold mb-3">Detalle del Proyecto</h4>
                                <p class="text-muted"><?= $proyecto->detalle ?></p>
                            </div>

                            <!-- Pestaña de Recompensas -->
                            <div class="tab-pane fade" id="recompensas">
                                <h4 class="fw-bold mb-3">Plan de Recompensas</h4>
                                <p class="text-muted"><?= $proyecto->plan_recompensas ?></p>
                            </div>

                            <!-- Pestaña de Objetivo -->
                            <div class="tab-pane fade" id="objetivo">
                                <h4 class="fw-bold mb-3">Objetivo del Proyecto</h4>
                                <p class="text-muted"><?= $proyecto->objetivo ?></p>
                            </div>

                            <!-- Pestaña de Impacto -->
                            <div class="tab-pane fade" id="impacto">
                                <h4 class="fw-bold mb-3">Impacto Esperado</h4>
                                <p class="text-muted"><?= $proyecto->impacto_esperado ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Columna Lateral - Información del Proyecto -->
            <div class="col-lg-4">
                <!-- Tarjeta del Autor -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <!-- Información del Autor -->
                       
                        <div class="d-flex align-items-center mb-4">
                            <img src="https://via.placeholder.com/60x60" class="rounded-circle me-3" alt="Avatar del Autor">
                            <div>
                                <h5 class="fw-bold mb-0"><?= $proyecto->author_name ?? 'Nombre del Autor' ?></h5>
                                <small class="text-muted">Publicado: <?= date('d M Y') ?></small>
                            </div>
                        </div>

                        <!-- Barra de Progreso de Recaudación -->
                        <div class="progress mb-3" style="height: 10px;">
                            <?php
                            // Calcular porcentaje de recaudación con límite de 3 decimales
                            $porcentaje = ($proyecto->montoTotal / $proyecto->presupuesto_requerido) * 100;
                            $porcentaje = min($porcentaje, 100);
                            $porcentaje = number_format($porcentaje, 3);
                            ?>
                            <div class="progress-bar bg-success" style="width: <?= $porcentaje ?>%"></div>
                        </div>

                        <!-- Métricas de Recaudación -->
                        <div class="d-flex justify-content-between mb-4">
                            <div class="text-center">
                                <h5 class="fw-bold mb-0">$<?= number_format($proyecto->montoTotal, 0, '.', ',') ?></h5>
                                <small class="text-muted">Recaudado</small>
                            </div>
                            <div class="text-center">
                                <h5 class="fw-bold mb-0">$<?= number_format($proyecto->presupuesto_requerido, 0, '.', ',') ?></h5>
                                <small class="text-muted">Meta</small>
                            </div>
                            <div class="text-center">
                                <h5 class="fw-bold mb-0"><?= $porcentaje ?>%</h5>
                                <small class="text-muted">Completado</small>
                            </div>
                        </div>

                        <!-- Fecha Límite -->
                        <div class="alert alert-info mb-4">
                            <i class="bi bi-calendar-event me-2"></i>
                            Fecha límite: <?= date('d M Y', strtotime($proyecto->fecha_limite)) ?>
                        </div>

                        <!-- Botones de Acción -->
                        <div class="d-grid gap-2">
                            <?php
                            $session = session();
                            $tipoUsuario = $session->get('tipo_usuario');
                            ?>

                            <?php if ($proyecto->activo == 1): ?>
                                <?php if ($tipoUsuario != 1): // Usuario común ?>
                                    <!--<button class="btn btn-outline-danger">
                                        <i class="bi bi-heart me-2"></i>Favorito
                                    </button>
                                -->
                                    <a href="<?= base_url('proyectos/ventanaDePago/' . $proyecto->id_proyecto) ?>"
                                        class="btn btn-primary">
                                        <i class="bi bi-star me-2"></i>Patrocinar Proyecto
                                    </a>
                                <?php else: // Super usuario ?>
                                    <a href="<?= base_url('proyectos/ventanaDePago/' . $proyecto->id_proyecto) ?>"
                                        class="btn btn-primary">
                                        <i class="bi bi-star me-2"></i>Patrocinar Proyecto
                                    </a>

                                    <a href="<?= base_url('proyectos/darBaja/' . $proyecto->id_proyecto) ?>"
                                        class="btn btn-outline-danger" 
                                        onclick="return confirm('¿Está seguro que desea dar de baja este proyecto?')">
                                        <i class="bi bi-x-circle me-2"></i>Dar de baja Proyecto
                                    </a>
                                    
                                    <!-- Cartel de estado SOLO visible para super usuario -->
                                    <div class="alert alert-success d-flex align-items-center mt-2" role="alert">
                                        <i class="bi bi-check-circle-fill me-2"></i>
                                        <div>
                                            Este proyecto se encuentra activo
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php else: // Proyecto inactivo ?>
                                <?php if ($tipoUsuario != 1): // Usuario común ?>
                                    <button class="btn btn-outline-secondary" disabled>
                                        <i class="bi bi-heart me-2"></i>No disponible
                                    </button>
                                    
                                    <button class="btn btn-secondary" disabled>
                                        <i class="bi bi-lock me-2"></i>Patrocinio no disponible
                                    </button>
                                <?php else: // Super usuario ?>
                                    <button class="btn btn-outline-secondary" disabled>
                                        <i class="bi bi-x-circle-fill me-2"></i>Proyecto dado de baja
                                    </button>
                                    
                                    <!-- Cartel de estado SOLO visible para super usuario -->
                                    <div class="alert alert-danger d-flex align-items-center mt-2" role="alert">
                                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                        <div>
                                            Este proyecto fue dado de baja y no está disponible para patrocinio
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>