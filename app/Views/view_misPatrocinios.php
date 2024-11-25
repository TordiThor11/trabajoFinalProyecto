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
                    <div class="item d-flex justify-content-between align-items-center p-3 border-bottom">
                        <div>
                            <i class="fas fa-hand-holding-usd me-2"></i>
                            <span class="fw-medium"><?= htmlspecialchars($proyecto->nombre) ?></span>
                            <span class="ms-2 text-muted">
                                -- Monto Invertido: $<?= number_format($proyecto->monto, 2) ?>
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
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
</div>