<!-- Contenido Principal -->
<div class="main-content">
    <div class="container-fluid mt-4">
        <div class="row">
            <!-- Carrusel de imágenes -->
            <div class="col-md-8">
                <h1><?= $proyecto->nombre ?></h1>
                <div id="projectCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://via.placeholder.com/800x600" class="d-block w-100" alt="Project Image 1">
                        </div>
                        <div class="carousel-item">
                            <img src="https://via.placeholder.com/800x600" class="d-block w-100" alt="Project Image 2">
                        </div>
                        <div class="carousel-item">
                            <img src="https://via.placeholder.com/800x600" class="d-block w-100" alt="Project Image 3">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#projectCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#projectCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>
            </div>

            <!-- Barra lateral -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <!-- Información del autor -->
                        <div class="d-flex align-items-center mb-4">
                            <img src="https://via.placeholder.com/60x60" class="rounded-circle me-3"
                                alt="Author avatar">
                            <div>
                                <h5 class="mb-0"><?= $project->author_name ?? 'Nombre del Autor' ?></h5>
                                <small class="text-muted">Published: <?= date('M d, Y') ?></small>
                            </div>
                        </div>

                        <!-- Botones de acción -->
                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-danger" onclick="alert('Funcionalidad en desarrollo')">
                                <i class="bi bi-heart"></i>
                                Favorito
                            </button>
                            <button class="btn btn-primary" onclick="alert('Funcionalidad en desarrollo')">
                                <i class="bi bi-star"></i>
                                Patrocinar
                            </button>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Presupuesto Requerido</h5>
                                        <div class="project-description">
                                            <?= $proyecto->presupuesto_requerido ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Fecha Limite</h5>
                                        <div class="project-description">
                                            <?= $proyecto->fecha_limite ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Monto Recaudado</h5>
                                        <div class="project-description">
                                            <?=  $proyecto->montoTotal ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Descripción del proyecto -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Detalle</h3>
                        <div class="project-description">
                            <?= $proyecto->detalle ?>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Plan Recompensas</h3>
                        <div class="project-description">
                            <?= $proyecto->plan_recompensas ?>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Objetivo</h3>
                        <div class="project-description">
                            <?= $proyecto->objetivo ?>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Impacto Esperado</h3>
                        <div class="project-description">
                            <?= $proyecto->impacto_esperado?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript para el carrusel -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Inicializar carrusel
        const carousel = new bootstrap.Carousel(document.querySelector('#projectCarousel'), {
            interval: 5000,
            wrap: true,
            keyboard: true
        });
    });
</script>