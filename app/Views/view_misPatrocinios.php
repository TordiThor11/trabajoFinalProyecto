<div class="container py-5">
    <?php if (empty($proyectos)): ?>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-center bg-light rounded-3 p-5 shadow-sm">
                    <i class="fas fa-hand-holding-heart display-1 text-primary mb-4"></i>
                    <h3 class="fw-bold mb-3">Aún no has patrocinado ningún proyecto</h3>
                    <p class="lead text-muted mb-0">Explora los proyectos disponibles y apoya a los emprendedores que más te interesen</p>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow">
                    <div class="card-header bg-white border-0 py-3">
                        <h4 class="card-title mb-0">
                            <i class="fas fa-hand-holding-usd text-primary me-2"></i>
                            Mis Patrocinios
                        </h4>
                    </div>
                    <div class="card-body p-0">
                        <?php foreach ($proyectos as $proyecto): ?>
                            <div class="p-4 border-bottom">
                                <div class="row align-items-center">
                                    <!-- Información del Proyecto -->
                                    <div class="col-md-6">
                                        <h5 class="fw-bold mb-2">
                                            <?= htmlspecialchars($proyecto->nombre_proyecto) ?>
                                        </h5>
                                        <p class="mb-0 text-primary fw-semibold">
                                            <i class="fas fa-coins me-2"></i>
                                            Inversión: $<?= number_format($proyecto->monto_total, 2) ?>
                                        </p>
                                    </div>
                                    
                                    <!-- Botón Ver Proyecto -->
                                    <div class="col-md-6 text-md-end">
                                        <a href="<?= base_url() ?>detalleProyecto/<?= $proyecto->id_proyecto; ?>"
                                            class="btn btn-primary">
                                            <i class="fas fa-eye me-2"></i>
                                            Ver Proyecto
                                        </a>
                                    </div>
                                </div>

                                <!-- Barra de Progreso y Valoración -->
                                <div class="row mt-4 align-items-center">
                                    <!-- Barra de progreso -->
                                    <div class="col-md-6">
                                        <div class="progress bg-light" style="height: 15px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                                role="progressbar"
                                                style="width: <?= $proyecto->avance_total ?>%;"
                                                aria-valuenow="<?= $proyecto->avance_total ?>"
                                                aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                        <p class="text-center mt-2 mb-0 text-muted">
                                            <i class="fas fa-chart-line me-2"></i>
                                            Avance del proyecto: <?= $proyecto->avance_total ?>%
                                        </p>
                                    </div>
                                    
                                    <!-- Valoración -->
                                    <div class="col-md-6">
                                        <form action="<?= base_url('guardarPuntuacion') ?>" method="POST" 
                                            class="d-flex justify-content-md-end align-items-center mt-3 mt-md-0">
                                            <input type="hidden" name="id_proyecto" value="<?= $proyecto->id_proyecto ?>">
                                            <label for="puntuacion-<?= $proyecto->id_proyecto ?>" 
                                                class="me-3 mb-0 text-muted fw-semibold">
                                                <i class="fas fa-star text-warning me-2"></i>
                                                Valorar:
                                            </label>
                                            <select name="puntuacion" id="puntuacion-<?= $proyecto->id_proyecto ?>"
                                                class="form-select form-select-sm w-auto me-2">
                                                <?php for($i = 1; $i <= 5; $i++): ?>
                                                    <option value="<?= $i ?>"><?= $i ?></option>
                                                <?php endfor; ?>
                                            </select>
                                            <button type="submit" class="btn btn-warning btn-sm">
                                                <i class="fas fa-save me-1"></i>
                                                Guardar
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>