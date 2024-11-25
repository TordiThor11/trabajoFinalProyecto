<div class="main-content bg-light py-4">
    <div class="container">
        <!-- Encabezado del Proyecto -->
        <div class="mb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('') ?>" class="text-decoration-none">Proyectos</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $proyecto->nombre ?></li>
                </ol>
            </nav>
            <h1 class="display-5 fw-bold mb-0"><?= $proyecto->nombre ?></h1>
        </div>

        <div class="row g-4">
            <!-- Columna Principal -->
            <div class="col-lg-8">
                <!-- Carrusel de imágenes -->
                <div class="card border-0 shadow-sm mb-4">
                    <div id="projectCarousel" class="carousel slide" data-bs-ride="carousel" style="max-height: 800px;">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#projectCarousel" data-bs-slide-to="0"
                                class="active"></button>
                            <button type="button" data-bs-target="#projectCarousel" data-bs-slide-to="1"></button>
                            <button type="button" data-bs-target="#projectCarousel" data-bs-slide-to="2"></button>
                        </div>
                        <div class="carousel-inner rounded-top">
                            <div class="carousel-item active">
                                <img src="<?= base_url('uploads/proyectos/' . $proyecto->imagen_principal) ?>"
                                    class="d-block w-100 img-fluid" alt="Imagen del Proyecto"
                                    style="object-fit: cover; height: 800px;">
                            </div>
                            <div class="carousel-item">
                                <img src="https://via.placeholder.com/800x500" class="d-block w-100"
                                    alt="Project Image 2">
                            </div>
                            <div class="carousel-item">
                                <img src="https://via.placeholder.com/800x500" class="d-block w-100"
                                    alt="Project Image 3">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#projectCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#projectCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>

                <!-- Tabs de Información -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white">
                        <ul class="nav nav-tabs card-header-tabs" role="tablist">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#detalle">Detalle</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#recompensas">Recompensas</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#objetivo">Objetivo</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#impacto">Impacto</button>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="detalle">
                                <h4 class="fw-bold mb-3">Detalle del Proyecto</h4>
                                <p class="text-muted"><?= $proyecto->detalle ?></p>
                            </div>
                            <div class="tab-pane fade" id="recompensas">
                                <h4 class="fw-bold mb-3">Plan de Recompensas</h4>
                                <p class="text-muted"><?= $proyecto->plan_recompensas ?></p>
                            </div>
                            <div class="tab-pane fade" id="objetivo">
                                <h4 class="fw-bold mb-3">Objetivo del Proyecto</h4>
                                <p class="text-muted"><?= $proyecto->objetivo ?></p>
                            </div>
                            <div class="tab-pane fade" id="impacto">
                                <h4 class="fw-bold mb-3">Impacto Esperado</h4>
                                <p class="text-muted"><?= $proyecto->impacto_esperado ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Barra Lateral -->
            <div class="col-lg-4">
                <!-- Tarjeta del Autor -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <img src="https://via.placeholder.com/60x60" class="rounded-circle me-3"
                                alt="Author avatar">
                            <div>
                                <h5 class="fw-bold mb-0"><?= $proyecto->author_name ?? 'Nombre del Autor' ?></h5>
                                <small class="text-muted">Publicado: <?= date('d M Y') ?></small>
                            </div>
                        </div>

                        <!-- Métricas del Proyecto -->
                        <div class="progress mb-3" style="height: 10px;">
                            <?php
                            $porcentaje = ($proyecto->montoTotal / $proyecto->presupuesto_requerido) * 100;
                            $porcentaje = min($porcentaje, 100);
                            ?>
                            <div class="progress-bar bg-success" style="width: <?= $porcentaje ?>%"></div>
                        </div>
                        <div class="d-flex justify-content-between mb-4">
                            <div class="text-center">
                                <h5 class="fw-bold mb-0">$<?= number_format($proyecto->montoTotal, 0, '.', ',') ?></h5>
                                <small class="text-muted">Recaudado</small>
                            </div>
                            <div class="text-center">
                                <h5 class="fw-bold mb-0">
                                    $<?= number_format($proyecto->presupuesto_requerido, 0, '.', ',') ?></h5>
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
                            <button class="btn btn-outline-danger">
                                <i class="bi bi-heart me-2"></i>Favorito
                            </button>
                            <a href="<?= base_url('proyectos/ventanaDePago/' . $proyecto->id_proyecto) ?>"
                                class="btn btn-primary">
                                <i class="bi bi-star me-2"></i>Patrocinar Proyecto
                            </a>

                            <?php
                            $session = session();
                            $tipoUsuario = $session->get('tipo_usuario');

                            if ($tipoUsuario == 1):
                                ?>
                                <a href="<?= base_url('proyectos/darBaja/' . $proyecto->id_proyecto) ?>"
                                    class="btn btn-primary">
                                    <i class="bi bi-star me-2"></i>Dar de baja Proyecto
                                </a>

                                <?php if ($proyecto->activo == 1):?>
                                    <h1>Esta activo</h1>
                                <?php else: ?>
                                    <h1>Fue dado de baja</h1>
                                <?php endif ?>

                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Inicializar carrusel
        new bootstrap.Carousel(document.querySelector('#projectCarousel'), {
            interval: 5000,
            wrap: true,
            keyboard: true
        });

        // Inicializar tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    });
</script>