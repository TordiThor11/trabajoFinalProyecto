<div class="container mt-3">
    <?php if (empty($proyectos)): ?>
        <div class="alert alert-info text-center p-4">
            <i class="fas fa-hand-holding-heart mb-3" style="font-size: 3rem;"></i>
            <h4>Aún no has patrocinado ningún proyecto</h4>
            <p class="mb-0">Explora los proyectos disponibles y apoya a los emprendedores que más te interesen</p>
        </div>
    <?php else: ?>
        <div class="card shadow-sm">
            <div class="card-header bg-light">
                <h5 class="card-title mb-0">Mis Patrocinios</h5>
            </div>
            <div class="card-body p-0">
                <?php foreach ($proyectos as $proyecto): ?>
                    <div class="item p-3 border-bottom">
                        <!-- Nombre y Monto Invertido -->
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fas fa-hand-holding-usd me-2"></i>
                                <span class="fw-medium"><?= htmlspecialchars($proyecto->nombre_proyecto) ?></span>
                                <span class="ms-2 text-muted">
                                    -- Monto Invertido: $<?= number_format($proyecto->monto_total, 2) ?>
                                </span>
                            </div>
                            <div>
                                <a href="<?= base_url() ?>detalleProyecto/<?= $proyecto->id_proyecto; ?>"
                                    class="btn btn-primary btn-sm">
                                    <i class="fas fa-eye me-1"></i>
                                    Ver Proyecto
                                </a>
                            </div>
                        </div>

                        <!-- Barra de Progreso y Valoración -->
                        <div class="d-flex align-items-center mt-3">
                            <!-- Mitad izquierda: Barra de progreso -->
                            <div class="w-50">
                                <div class="progress" style="height: 10px;">
                                    <div class="progress-bar" role="progressbar"
                                        style="width: <?= $proyecto->avance_total ?>%;"
                                        aria-valuenow="<?= $proyecto->avance_total ?>"
                                        aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                                <p class="text-center mt-1 mb-0">
                                    Avance: <?= $proyecto->avance_total ?>%
                                </p>
                            </div>
                            <!-- Mitad derecha: Valoración -->
                            <div class="w-50 d-flex justify-content-end">
                                <form action="<?= base_url('guardarPuntuacion') ?>" method="POST" class="d-flex align-items-center">
                                    <input type="hidden" name="id_proyecto" value="<?= $proyecto->id_proyecto ?>">
                                    <label for="puntuacion-<?= $proyecto->id_proyecto ?>" class="me-2 mb-0">Valorar:</label>
                                    <select name="puntuacion" id="puntuacion"
                                        class="form-select form-select-sm w-auto me-2">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    <button type="submit" class="btn btn-success btn-sm">
                                        <i class="fas fa-star"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
</div>